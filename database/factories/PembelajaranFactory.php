<?php

namespace Database\Factories;

use App\Models\Pembelajaran;
use Illuminate\Database\Eloquent\Factories\Factory;

class PembelajaranFactory extends Factory
{
    protected $model = Pembelajaran::class;

    public function definition()
    {
        $judul_samples = [
            'Bentuk dan Penulisan',
            'Pengucapan yang Benar',
            'Contoh Penggunaan',
            'Sejarah Asal Mula',
            'Teknik Penulisan',
            'Tips Mengingat',
            'Variasi Fonts',
        ];

        $deskripsi_samples = [
            'Pelajari bentuk dasar huruf, cara menulisnya dengan benar, dan aturan penulisan tangan.',
            'Dengarkan dan praktikkan pengucapan huruf ini secara mendalam dengan native speaker.',
            'Lihat contoh kalimat dan frasa yang menggunakan huruf ini dalam konteks nyata.',
            'Ketahui sejarah panjang huruf ini dari zaman kuno hingga penggunaan modern.',
            'Kuasai teknik penulisan yang tepat agar hasil tulisan terlihat rapi dan profesional.',
            'Gunakan mnemonik dan trik khusus untuk mudah mengingat huruf ini.',
            'Eksplorasi berbagai gaya penulisan dan font yang bisa digunakan untuk huruf ini.',
        ];

        return [
            'judul' => $this->faker->randomElement($judul_samples),
            'deskripsi' => $this->faker->randomElement($deskripsi_samples),
        ];
    }
}
