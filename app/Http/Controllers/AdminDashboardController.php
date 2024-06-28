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
        ]);

        Branch::create($request->all());

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
}
