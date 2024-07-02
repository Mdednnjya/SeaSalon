<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\service;
use App\Models\Review;
use App\Models\Reservation;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalCustomers = User::where('role', 'customer')->count();
        $todaysReservations = Reservation::whereDate('appointment_time', today())->count();
        $totalReservations = Reservation::count();
        $services = Service::all();
        $branches = Branch::all();

        return view('admin.dashboard', compact('totalCustomers', 'todaysReservations', 'totalReservations', 'services', 'branches'));
    }

    public function addService(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'description' => 'required|string',
        ]);

        Service::create([
            'name' => $request->name,
            'duration' => $request->duration,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.show')->with('success', 'Service added successfully');
    }

    public function createBranch(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'opening_time' => 'required|date_format:H:i',
            'closing_time' => 'required|date_format:H:i|after:opening_time',
        ], [
            'closing_time.after' => 'The closing time must be after the opening time.',
        ]);

        $opening_time = \Carbon\Carbon::createFromFormat('H:i', $request->opening_time);
        $closing_time = \Carbon\Carbon::createFromFormat('H:i', $request->closing_time);

        if ($closing_time->lt($opening_time)) {
            $closing_time->addDay();
        }

        Branch::create([
            'name' => $request->name,
            'location' => $request->location,
            'opening_time' => $opening_time->format('H:i'),
            'closing_time' => $closing_time->format('H:i'),
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Branch created successfully');
    }

    public function addServiceToBranch(Request $request)
    {
        $request->validate([
            'branch_id' => 'required|exists:branches,id',
            'service_id' => 'required|exists:services,id',
        ]);

        $branch = Branch::findOrFail($request->branch_id);
        $branch->services()->attach($request->service_id);

        return redirect()->route('admin.dashboard')->with('success', 'Service added to branch successfully');
    }

    public function addServiceForm()
    {
        return view('admin.add_service');
    }

    public function createBranchForm()
    {
        return view('admin.create_branch');
    }

    public function addServiceToBranchForm()
    {
        $branches = Branch::all();
        $services = Service::all();
        return view('admin.add_service_to_branch', compact('branches', 'services'));
    }

    public function listAllBranches()
    {
        $branches = Branch::with('services')->orderBy('created_at', 'desc')->paginate(4);
        return view('admin.list_of_branch', compact('branches'));
    }

    public function getAvailableServicesForBranch($branchId)
    {
        try {
            $branch = Branch::findOrFail($branchId);
            $assignedServiceIds = $branch->services()->pluck('services.id')->toArray();
            $availableServices = Service::whereNotIn('id', $assignedServiceIds)->get();

            return response()->json($availableServices);
        } catch (\Exception $e) {
            \Log::error('Error in getAvailableServicesForBranch: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }

}
