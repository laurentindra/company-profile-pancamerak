<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    /**
     * Display a listing of news articles.
     */
    public function index(Request $request)
    {
        $query = News::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $news = $query->orderBy('published_date', 'desc')->orderBy('id', 'desc')->paginate(10);

        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new news article.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created news article in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'published_date' => 'required|date',
            'summary' => 'required|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:3072'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . str_replace(' ', '_', strtolower($file->getClientOriginalName()));
            $file->move(public_path('images/news'), $filename);
            $imagePath = 'images/news/' . $filename;
        }

        News::create([
            'title' => $validated['title'],
            'category' => strtoupper($validated['category']),
            'published_date' => $validated['published_date'],
            'summary' => $validated['summary'],
            'content' => $validated['content'] ?? $validated['summary'],
            'image_path' => $imagePath
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diterbitkan!');
    }

    /**
     * Show the form for editing the specified news article.
     */
    public function edit($id)
    {
        $article = News::findOrFail($id);
        return view('admin.news.edit', compact('article'));
    }

    /**
     * Update the specified news article in storage.
     */
    public function update(Request $request, $id)
    {
        $article = News::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'published_date' => 'required|date',
            'summary' => 'required|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:3072'
        ]);

        $imagePath = $article->image_path;
        if ($request->hasFile('image')) {
            if ($imagePath && File::exists(public_path($imagePath))) {
                File::delete(public_path($imagePath));
            }

            $file = $request->file('image');
            $filename = time() . '_' . str_replace(' ', '_', strtolower($file->getClientOriginalName()));
            $file->move(public_path('images/news'), $filename);
            $imagePath = 'images/news/' . $filename;
        }

        $article->update([
            'title' => $validated['title'],
            'category' => strtoupper($validated['category']),
            'published_date' => $validated['published_date'],
            'summary' => $validated['summary'],
            'content' => $validated['content'] ?? $validated['summary'],
            'image_path' => $imagePath
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Remove the specified news article from storage.
     */
    public function destroy($id)
    {
        $article = News::findOrFail($id);
        if ($article->image_path && File::exists(public_path($article->image_path))) {
            File::delete(public_path($article->image_path));
        }

        $article->delete();

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus!');
    }
}
