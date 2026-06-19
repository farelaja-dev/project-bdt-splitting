<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'email' => env('ADMIN_EMAIL', 'admin@tirta.id'),
        ], [
            'name' => 'Admin Tirta',
            'password' => Hash::make(env('ADMIN_PASSWORD', 'password')),
        ]);

        Post::updateOrCreate([
            'slug' => 'selamat-datang-di-tirta-id',
        ], [
            'title' => 'Selamat Datang di Tirta.id',
            'excerpt' => 'Contoh artikel pertama untuk landing page publik.',
            'content' => 'Ini adalah artikel awal untuk mengetes alur read publik dan write dari dashboard admin.',
            'published_at' => now(),
        ]);

        Post::updateOrCreate([
            'slug' => 'pg-pool-ii-read-write-demo',
        ], [
            'title' => 'PG Pool II Read Write Demo',
            'excerpt' => 'Artikel demo untuk menunjukkan query read mengarah ke host baca sedangkan tulis diarahkan ke host write.',
            'content' => 'Landing page dan detail artikel membaca data, sementara create, update, dan delete dari dashboard menulis ke host write.',
            'published_at' => now(),
        ]);
    }
}
