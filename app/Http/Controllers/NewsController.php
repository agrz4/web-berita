<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewsCategory;

class NewsController extends Controller
{
    public function show($slug)
    {
        $news = News::where('slug', $slug)->first();
        $newest = News::orderBy('created_at', 'desc')->take(4)->get();

        return view('pages.news.show', compact('news', 'newest'));
    }

    public function category($slug)
    {
        $category = NewsCategory::where('slug', $slug)->first();

        return view('pages.news.category', compact('category'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $results = News::whereNotNull('title')
            ->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('content', 'like', "%{$query}%");
            })
            ->latest()
            ->get();
        return view('pages.news.search', compact('results', 'query'));
    }
}
