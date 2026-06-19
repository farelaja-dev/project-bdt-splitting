<?php

namespace App\Http\Controllers;

use App\Models\Post;

class LandingController extends Controller
{
    public function index()
    {
        $posts = Post::published()->latest('published_at')->get();

        return view('landing', [
            'posts' => $posts,
            'featuredPost' => $posts->first(),
            'publishedCount' => $posts->count(),
        ]);
    }
}