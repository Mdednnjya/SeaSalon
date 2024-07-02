<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\service;
use App\Models\Review;
use App\Models\Reservation;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    public function create()
    {
        $branches = Branch::all();
        return view('reservations.create', compact('branches'));
    }

    public function store(Request $request)
    {
        Log::info('Reservation store method called', $request->all());

        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'phone_number' => 'required|string|max:255',
                'branch_id' => 'required|exists:branches,id',
                'service_id' => 'required|exists:services,id',
                'appointment_time' => 'required|date',
            ]);

            Log::info('Validation passed', $validatedData);

            $branch = Branch::findOrFail($request->branch_id);
            $service = Service::findOrFail($request->service_id);

            if (!$branch->services()->where('services.id', $service->id)->exists()) {
                Log::error('Service not offered by branch', ['branch_id' => $branch->id, 'service_id' => $service->id]);
                return back()->withErrors(['service' => 'This branch does not offer the selected service.']);
            }

            $appointmentTime = Carbon::parse($request->appointment_time);
            $openingTime = Carbon::parse($branch->opening_time);
            $closingTime = Carbon::parse($branch->closing_time);

            if ($appointmentTime->format('H:i') < $openingTime->format('H:i') ||
                $appointmentTime->format('H:i') > $closingTime->subMinutes($service->duration)->format('H:i')) {
                Log::error('Appointment time outside branch hours', ['appointment_time' => $appointmentTime, 'opening_time' => $openingTime, 'closing_time' => $closingTime]);
                return back()->withErrors(['appointment_time' => 'The selected time is outside of branch hours.']);
            }

            $overlappingReservations = Reservation::where('branch_id', $request->branch_id)
                ->where('appointment_time', '>=', $appointmentTime)
                ->where('appointment_time', '<', $appointmentTime->copy()->addMinutes($service->duration))
                ->exists();

            if ($overlappingReservations) {
                Log::error('Overlapping reservation', ['appointment_time' => $appointmentTime]);
                return back()->withErrors(['appointment_time' => 'This time slot is already booked.']);
            }

            $reservation = new Reservation;
            $reservation->user_id = Auth::id() ?? null;
            $reservation->name = $request->name;
            $reservation->phone_number = $request->phone_number;
            $reservation->branch_id = $request->branch_id;
            $reservation->service_id = $request->service_id;
            $reservation->appointment_time = $request->appointment_time;

            Log::info('Attempting to save reservation', $reservation->toArray());
            $reservation->save();
            Log::info('Reservation saved successfully', ['id' => $reservation->id]);

            return back()
                ->with('success', 'Reservation created successfully!')
                ->with('reservation_id', $reservation->id);
        } catch (\Exception $e) {
            Log::error('Error in reservation store method', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'An error occurred while creating the reservation. Please try again.']);
        }
    }

    public function history()
    {
        $customer = Auth::user();
        $reservations = Reservation::with(['service', 'branch'])
            ->where('user_id', $customer->id)
            ->orderBy('appointment_time', 'desc')
            ->paginate(6);

        return view('reservations.history', compact('reservations'));
    }

    public function detail($id)
    {
        $reservation = Reservation::with('service')->findOrFail($id);
        return view('reservations.detail', compact('reservation'));
    }

    public function getBranchServices(Branch $branch)
    {
        try {
            $services = $branch->services()->select('services.id', 'services.name')->get();
            \Log::info('Branch services for branch ' . $branch->id, $services->toArray());
            return response()->json($services);
        } catch (\Exception $e) {
            \Log::error('Error in getBranchServices: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }

}
