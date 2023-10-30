<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TableStatus;
use App\Models\Reservation;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Models\Table;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservations.index', compact('reservations'));
    }

    public function create()
    {
        $tables = Table::where('status', TableStatus::Avalaiable)->get();
        return view('admin.reservations.create', compact('tables'));
    }

    public function store(Request $request)
    {
        $table = Table::findOrFail($request->table_id);
        if ($request->guest_number > $table->guest_number) {
            return back()->with('warning', 'Please choose the table base on guests .');
        }
        $request_date = Carbon::parse($request->res_date);
        foreach ($table->reservations as $res) {
            if ($res->res_date->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('warning', 'This table is reserved for this date .');
            }
        }
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'unique:reservations,email'],
            'res_date' => ['required', 'date', new DateBetween, new TimeBetween],
            'mob_number' => ['required'],
            'table_id' => ['required'],
            'guest_number' => ['required']
        ]);

        $reservation = new Reservation();
        $reservation->first_name = $request->first_name;
        $reservation->last_name = $request->last_name;
        $reservation->email = $request->email;
        $reservation->mob_number = $request->mob_number;
        $reservation->res_date = $request->res_date;
        $reservation->table_id = $request->table_id;
        $reservation->guest_number = $request->guest_number;
        $reservation->save();
        return to_route('admin.reservation.index')->with('success', 'Reservation created successfully.');
    }

    public function edit(Request $request, $id)
    {
        $tables = Table::where('status', TableStatus::Avalaiable)->get();
        $reservation = Reservation::find($id);
        return view('admin.reservations.edit', compact('reservation','tables'));
    }

    public function update(Request $request, $id)
    {
        $table = Table::findOrFail($request->table_id);
        if ($request->guest_number > $table->guest_number) {
            return back()->with('warning', 'Please choose the table base on guests .');
        }
        $request_date = Carbon::parse($request->res_date);
        foreach ($table->reservations as $res) {
            if ($res->res_date->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('warning', 'This table is reserved for this date .');
            }
        }
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'unique:reservations,email'],
            'res_date' => ['required', 'date', new DateBetween, new TimeBetween],
            'mob_number' => ['required'],
            'table_id' => ['required'],
            'guest_number' => ['required']
        ]);
        $reservation = Reservation::find($id);
        $reservation->first_name = $request->first_name;
        $reservation->last_name = $request->last_name;
        $reservation->email = $request->email;
        $reservation->mob_number = $request->mob_number;
        $reservation->res_date = $request->res_date;
        $reservation->table_id = $request->table_id;
        $reservation->guest_number = $request->guest_number;
        $reservation->save();
        return to_route('admin.reservation.index')->with('success', 'Reservation updated successfully.');
    }

    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        return to_route('admin.reservation.index')->with('success', 'Reservation deleted successfully.');
    }
}
