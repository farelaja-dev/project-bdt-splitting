<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::query()->latest()->get();

        return view('admin.dashboard', [
            'postCount' => $posts->count(),
            'publishedCount' => $posts->whereNotNull('published_at')->count(),
            'draftCount' => $posts->whereNull('published_at')->count(),
            'recentPosts' => $posts->take(5),
            'dbHost' => config('database.connections.pgsql.host'),
            'dbPort' => config('database.connections.pgsql.port'),
            'databaseName' => config('database.connections.pgsql.database'),
        ]);
    }
}