<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ship;
use App\Models\Schedule;
use App\Models\News;
use Carbon\Carbon;

class CompanyProfileController extends Controller
{
    public function home()
    {
        $featuredShips = Ship::where('type', 'passenger')->take(3)->get();
        
        $origins = Schedule::select('origin_port')->distinct()->pluck('origin_port');
        $destinations = Schedule::select('destination_port')->distinct()->pluck('destination_port');
        
        $newsList = News::orderBy('published_date', 'desc')->orderBy('id', 'desc')->take(3)->get();

        return view('home', compact('featuredShips', 'origins', 'destinations', 'newsList'));
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        return view('services');
    }

    public function schedules()
    {
    
        $origins = Schedule::select('origin_port')->distinct()->pluck('origin_port');
        $destinations = Schedule::select('destination_port')->distinct()->pluck('destination_port');
        

        $passengerShips = Ship::where('type', 'passenger')->with('schedules')->get();
        
        return view('schedules', compact('origins', 'destinations', 'passengerShips'));
    }

    public function fleets()
    {
        $ships = Ship::all();
        return view('fleets', compact('ships'));
    }

    public function fleetDetail($id)
    {
        $ship = Ship::with('schedules')->findOrFail($id);
        
        
        $relatedShips = Ship::where('type', $ship->type)
            ->where('id', '!=', $ship->id)
            ->take(3)
            ->get();
            
        return view('fleet_detail', compact('ship', 'relatedShips'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function searchSchedule(Request $request)
    {
        $request->validate([
            'origin' => 'required|string',
            'destination' => 'required|string',
            'date' => 'nullable|date'
        ]);

        $origin = $request->input('origin');
        $destination = $request->input('destination');
        $dateStr = $request->input('date');

        $query = Schedule::with('ship')
            ->where('origin_port', $origin)
            ->where('destination_port', $destination);

        if ($dateStr) {
            
            $dayEnglish = Carbon::parse($dateStr)->format('l');
            $dayMap = [
                'Monday' => 'Senin',
                'Tuesday' => 'Selasa',
                'Wednesday' => 'Rabu',
                'Thursday' => 'Kamis',
                'Friday' => 'Jumat',
                'Saturday' => 'Sabtu',
                'Sunday' => 'Minggu'
            ];
            $dayIndo = $dayMap[$dayEnglish] ?? '';

           
            if ($dayIndo) {
                $query->where('days_of_week', 'like', "%{$dayIndo}%");
            }
        }

        $schedules = $query->get();

        return response()->json([
            'success' => true,
            'schedules' => $schedules,
            'day_searched' => isset($dayIndo) ? $dayIndo : null
        ]);
    }
}   
