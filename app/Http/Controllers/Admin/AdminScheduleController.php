<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Ship;
use Illuminate\Http\Request;

class AdminScheduleController extends Controller
{
    public function index(Request $request)
    {
        $query = Schedule::with('ship');

        if ($request->has('ship_id') && !empty($request->ship_id)) {
            $query->where('ship_id', $request->ship_id);
        }

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('origin_port', 'like', "%{$search}%")
                  ->orWhere('destination_port', 'like', "%{$search}%");
            });
        }

        $schedules = $query->orderBy('id', 'desc')->paginate(10)->withQueryString();
        $ships = Ship::where('type', 'passenger')->get();

        return view('admin.schedules.index', compact('schedules', 'ships'));
    }

    public function create()
    {
        $ships = Ship::where('type', 'passenger')->get();
        return view('admin.schedules.create', compact('ships'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ship_id' => 'required|exists:ships,id',
            'origin_port' => 'required|string|max:255',
            'destination_port' => 'required|string|max:255',
            'departure_time' => 'required|string|max:255',
            'arrival_time' => 'required|string|max:255',
            'days' => 'required|array|min:1',
            'price_vip' => 'required|numeric|min:0',
            'price_economy' => 'required|numeric|min:0',
            'price_vehicle' => 'nullable|numeric|min:0',
        ]);

        $validated['days_of_week'] = implode(', ', $request->days);
        unset($validated['days']);

        Schedule::create($validated);

        return redirect()->route('admin.schedules.index')->with('success', 'Jadwal pelayaran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        $ships = Ship::where('type', 'passenger')->get();
        $selectedDays = array_map('trim', explode(',', $schedule->days_of_week));

        return view('admin.schedules.edit', compact('schedule', 'ships', 'selectedDays'));
    }

    public function update(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);

        $validated = $request->validate([
            'ship_id' => 'required|exists:ships,id',
            'origin_port' => 'required|string|max:255',
            'destination_port' => 'required|string|max:255',
            'departure_time' => 'required|string|max:255',
            'arrival_time' => 'required|string|max:255',
            'days' => 'required|array|min:1',
            'price_vip' => 'required|numeric|min:0',
            'price_economy' => 'required|numeric|min:0',
            'price_vehicle' => 'nullable|numeric|min:0',
        ]);

        $validated['days_of_week'] = implode(', ', $request->days);
        unset($validated['days']);

        $schedule->update($validated);

        return redirect()->route('admin.schedules.index')->with('success', 'Jadwal pelayaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return redirect()->route('admin.schedules.index')->with('success', 'Jadwal pelayaran berhasil dihapus.');
    }
}
