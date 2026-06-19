<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::query()->latest()->get(),
            'dbHost' => config('database.connections.pgsql.host'),
            'dbPort' => config('database.connections.pgsql.port'),
        ]);
    }

    public function create()
    {
        return view('admin.posts.form', [
            'post' => new Post(),
            'mode' => 'create',
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validatePost($request);

        Post::create([
            'title' => $data['title'],
            'slug' => $data['slug'] ?: Str::slug($data['title']),
            'excerpt' => $data['excerpt'],
            'content' => $data['content'],
            'published_at' => $request->boolean('publish') ? now() : null,
        ]);

        return redirect()->route('admin.posts.index')->with('status', 'Posting berhasil dibuat.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.form', [
            'post' => $post,
            'mode' => 'edit',
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $data = $this->validatePost($request, $post->id);

        $post->update([
            'title' => $data['title'],
            'slug' => $data['slug'] ?: Str::slug($data['title']),
            'excerpt' => $data['excerpt'],
            'content' => $data['content'],
            'published_at' => $request->boolean('publish') ? ($post->published_at ?? now()) : null,
        ]);

        return redirect()->route('admin.posts.index')->with('status', 'Posting berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('status', 'Posting berhasil dihapus.');
    }

    private function validatePost(Request $request, ?Post $post = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('posts', 'slug')->ignore($post?->id),
            ],
            'excerpt' => ['required', 'string', 'max:320'],
            'content' => ['required', 'string'],
        ]);
    }
}