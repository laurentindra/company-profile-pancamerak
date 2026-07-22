<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminShipController extends Controller
{
    public function index(Request $request)
    {
        $query = Ship::query();

        if ($request->has('type') && !empty($request->type)) {
            $query->where('type', $request->type);
        }

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('route', 'like', "%{$search}%");
            });
        }

        $ships = $query->orderBy('id', 'desc')->paginate(10)->withQueryString();

        return view('admin.ships.index', compact('ships'));
    }

    public function create()
    {
        return view('admin.ships.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:passenger,tugboat,barge',
            'route' => 'nullable|string|max:255',
            'capacity' => 'nullable|string|max:255',
            'gt' => 'nullable|integer',
            'nt' => 'nullable|integer',
            'dimensions' => 'nullable|string|max:255',
            'engine' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . str_replace(' ', '_', strtolower($validated['name'])) . '.' . $file->getClientOriginalExtension();
            
            $destinationPath = public_path('images/ships');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            
            $file->move($destinationPath, $filename);
            $validated['image_path'] = 'images/ships/' . $filename;
        }

        unset($validated['image']);

        Ship::create($validated);

        return redirect()->route('admin.ships.index')->with('success', 'Data armada kapal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $ship = Ship::findOrFail($id);
        return view('admin.ships.edit', compact('ship'));
    }

    public function update(Request $request, $id)
    {
        $ship = Ship::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:passenger,tugboat,barge',
            'route' => 'nullable|string|max:255',
            'capacity' => 'nullable|string|max:255',
            'gt' => 'nullable|integer',
            'nt' => 'nullable|integer',
            'dimensions' => 'nullable|string|max:255',
            'engine' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists and local
            if ($ship->image_path && File::exists(public_path($ship->image_path))) {
                File::delete(public_path($ship->image_path));
            }

            $file = $request->file('image');
            $filename = time() . '_' . str_replace(' ', '_', strtolower($validated['name'])) . '.' . $file->getClientOriginalExtension();
            
            $destinationPath = public_path('images/ships');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            
            $file->move($destinationPath, $filename);
            $validated['image_path'] = 'images/ships/' . $filename;
        }

        unset($validated['image']);

        $ship->update($validated);

        return redirect()->route('admin.ships.index')->with('success', 'Data armada kapal berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $ship = Ship::findOrFail($id);

        if ($ship->image_path && File::exists(public_path($ship->image_path))) {
            File::delete(public_path($ship->image_path));
        }

        $ship->delete();

        return redirect()->route('admin.ships.index')->with('success', 'Data kapal berhasil dihapus.');
    }
}
