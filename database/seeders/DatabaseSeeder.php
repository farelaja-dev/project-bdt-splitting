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
            'slug' => 'debit-sungai-kota-naik-saat-hujan-panjang',
        ], [
            'title' => 'Debit Sungai Kota Naik Saat Hujan Panjang',
            'excerpt' => 'Pemantauan dini di bantaran sungai diperketat setelah hujan merata mengguyur wilayah hulu dan pusat kota.',
            'content' => "Pemerintah kota memperketat pemantauan debit sungai setelah hujan panjang mengguyur kawasan hulu sejak Jumat malam.\n\nSejumlah pintu air dilaporkan masih berada pada status waspada. Warga di bantaran sungai diminta mengikuti informasi resmi dan menyiapkan dokumen penting apabila hujan kembali turun dengan intensitas tinggi.\n\nDinas terkait menyebut normalisasi saluran kecil dan pembersihan sedimen menjadi prioritas selama akhir pekan.",
            'published_at' => now(),
        ]);

        Post::updateOrCreate([
            'slug' => 'warga-mendorong-sumur-resapan-di-permukiman-padat',
        ], [
            'title' => 'Warga Mendorong Sumur Resapan di Permukiman Padat',
            'excerpt' => 'Inisiatif lingkungan di tingkat RT mulai digerakkan untuk menahan limpasan air hujan sebelum masuk ke drainase utama.',
            'content' => "Kelompok warga di beberapa permukiman padat mulai membuat sumur resapan sederhana di halaman rumah dan fasilitas umum.\n\nProgram swadaya tersebut muncul setelah genangan berulang terjadi pada awal musim hujan. Selain menahan limpasan air, warga berharap sumur resapan dapat membantu menjaga cadangan air tanah.\n\nPengurus lingkungan menyatakan kegiatan akan diperluas ke gang-gang kecil setelah pendataan titik rawan selesai dilakukan.",
            'published_at' => now(),
        ]);
    }
}
