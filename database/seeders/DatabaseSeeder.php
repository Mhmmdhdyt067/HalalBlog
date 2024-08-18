<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Muhammad Hidayat',
            'username' => 'yayat',
            'is_admin' => true,
            'email' => 'muhhidayat050607@gmail.com',
            'password' => Hash::make('30081973scoth'),
        ]);

        User::factory()->create([
            'name' => 'Anas Akbar',
            'username' => 'anas',
            'is_admin' => true,
            'email' => 'anasvoldigoad@gmail.com',
            'password' => Hash::make('halal2017'),
        ]);

        User::factory()->create([
            'name' => 'Ahmad Fadil',
            'username' => 'ahmad',
            'is_admin' => true,
            'email' => 'ahmaddtiooo@gmail.com',
            'password' => Hash::make('halal2017'),
        ]);

        Category::factory()->create([
            'name' => 'Perkum',
            'slug' => 'perkum',
        ]);

        Category::factory()->create([
            'name' => 'Healing',
            'slug' => 'healing',
        ]);

        // Blog::factory()->create([
        //     'title' => 'Perkum Halal Lengkap',
        //     'slug' => 'bakar-bakar',
        //     'user_id' => 1,
        //     'category_id' => 1,
        //     'image' => 'halal1.jpg',
        //     'excerpt' => 'Bakar Bakar Lengkap Halal',
        //     'body' => '<p>Pada malam yang penuh kebahagiaan, HALAL mengadakan acara bakar-bakar untuk merayakan malam takbiran. Acara ini berlangsung dengan penuh suka cita dan kekeluargaan di halaman luas yang dikelilingi oleh lampu-lampu hias yang memancarkan cahaya hangat.</p>',
        // ]);
        // Blog::factory()->create([
        //     'title' => 'Lomba Semarak Ramadhan',
        //     'slug' => 'lomba-ramadhan',
        //     'user_id' => 2,
        //     'category_id' => 1,
        //     'image' => 'halal2.jpg',
        //     'excerpt' => 'Halal sebagai Panitia Lomba dalam rangka Ramadhan 1446 H',
        //     'body' => '<p>Sebagai panitia lomba semarak ramadhan, HALAL telah mempersiapkan berbagai jenis perlombaan yang dapat diikuti oleh semua kalangan, mulai dari anak-anak hingga remaja. Perlombaan ini tidak hanya menguji kemampuan, tetapi juga mengandung nilai-nilai Islami yang mendidik dan menginspirasi. Beberapa jenis lomba yang diadakan antara lain adalah lomba adzan, hafalan Al-Quran</p>',
        // ]);
        // Blog::factory()->create([
        //     'title' => 'Camping Taipa',
        //     'slug' => 'camping-taipa',
        //     'user_id' => 1,
        //     'category_id' => 2,
        //     'image' => 'halal3.jpg',
        //     'excerpt' => 'Halal camping di Pantai Taipa',
        //     'body' => '<p>Puncak dari Camping ini adalah saat peserta bersama-sama menikmati keindahan matahari terbit di Pantai Taipa. Keindahan alam yang disaksikan sambil mengucap syukur kepada Allah atas nikmat yang diberikan, memberikan kesan yang mendalam dan menambah kekuatan spiritual bagi setiap peserta.</p>',
        // ]);
        // Blog::factory()->create([
        //     'title' => 'Camping Alebo Part 3',
        //     'slug' => 'camping-alebo-3',
        //     'user_id' => 3,
        //     'category_id' => 2,
        //     'image' => 'halal4.jpg',
        //     'excerpt' => 'Halal camping di Bukit Alebo',
        //     'body' => '<p>Kegiatan Camping di Bukit Alebo ini tidak hanya menawarkan petualangan dan kesenangan, tetapi juga memberikan makna yang mendalam tentang kebersamaan, keindahan alam, dan pentingnya menjaga lingkungan. Semua peserta pulang dengan hati yang penuh kebahagiaan dan pengalaman yang tak terlupakan, berharap dapat kembali lagi di kesempatan berikutnya.</p>',
        // ]);
        // Blog::factory()->create([
        //     'title' => 'Ramadhan Hari-1',
        //     'slug' => 'perkum-ramadhan',
        //     'user_id' => 2,
        //     'category_id' => 1,
        //     'image' => 'halal5.jpg',
        //     'excerpt' => 'Halal di Malam Pertama Ramadhan',
        //     'body' => '<p>Malam pertama Ramadhan selalu menjadi momen yang istimewa bagi umat Muslim di seluruh dunia, tak terkecuali bagi HALAL. Untuk menyambut bulan suci ini, HALAL perkum untuk mengisi malam pertama Ramadhan dengan kebersamaan, keceriaan, dan refleksi spiritual.</p>',
        // ]);
        // Blog::factory()->create([
        //     'title' => 'Camping Alebo Part 1',
        //     'slug' => 'camping-alebo-1',
        //     'user_id' => 2,
        //     'category_id' => 2,
        //     'image' => 'halal6.jpg',
        //     'excerpt' => 'Halal camping di Bukit Alebo',
        //     'body' => '<p>Kegiatan Camping di Bukit Alebo ini tidak hanya menawarkan petualangan dan kesenangan, tetapi juga memberikan makna yang mendalam tentang kebersamaan, keindahan alam, dan pentingnya menjaga lingkungan. Semua peserta pulang dengan hati yang penuh kebahagiaan dan pengalaman yang tak terlupakan, berharap dapat kembali lagi di kesempatan berikutnya.</p>',
        // ]);
        // Blog::factory()->create([
        //     'title' => 'Perkum di Glory Home',
        //     'slug' => 'perkum-rmhnyaGlory',
        //     'user_id' => 1,
        //     'category_id' => 1,
        //     'image' => 'halal7.jpg',
        //     'excerpt' => 'Nongkrong di Rumah Glory ft. Dinda & Glory',
        //     'body' => '<p>MPada suatu malam yang penuh kehangatan, HALAL berkumpul di rumah sepupu nya Fadel, Glory, untuk acara nongkrong yang santai dan penuh keakraban. Rumah Glory, yang terletak di kawasan Langgea yang tenang dan asri, menjadi tempat yang sempurna untuk melepas penat dan menikmati kebersamaan sembari bermain UNO.</p>',
        // ]);
        // Blog::factory()->create([
        //     'title' => 'Trip to Waworaha',
        //     'slug' => 'trip-waworaha',
        //     'user_id' => 1,
        //     'category_id' => 2,
        //     'image' => 'halal8.jpg',
        //     'excerpt' => 'Healing ke Desa Wisata Waworaha ft 2NMA',
        //     'body' => '<p>HALAL  & 2NMA melakukan trip jalan-jalan bersama yang istimewa ke Desa Wisata Waworaha. Terletak di pedalaman dengan panorama alam yang menakjubkan dan budaya lokal yang kaya, desa ini menjadi tujuan sempurna untuk menikmati kebersamaan dan petualangan yang penuh makna.</p>',
        // ]);
        // Blog::factory()->create([
        //     'title' => 'Hari Raya Idul Adha 1446 H',
        //     'slug' => 'idul-adha-1446',
        //     'user_id' => 2,
        //     'category_id' => 1,
        //     'image' => 'halal9.jpg',
        //     'excerpt' => 'Halal di Hari Raya Idul Adha 1446 H/2024 M',
        //     'body' => '<p>Hari Raya Idul Adha selalu menjadi momen yang istimewa bagi umat Muslim di seluruh dunia. Tahun ini, HALAL merayakan Idul Adha dengan serangkaian kegiatan yang penuh makna, kebersamaan, dan kepedulian sosial, mencerminkan semangat pengorbanan dan keikhlasan dalam menjalankan ibadah.</p>',
        // ]);
        // Blog::factory()->create([
        //     'title' => 'Konser Tipe-x Halal',
        //     'slug' => 'konser-tipex',
        //     'user_id' => 1,
        //     'category_id' => 2,
        //     'image' => 'halal10.jpg',
        //     'excerpt' => 'Halal ikut meramaikan Konser Tipe-X',
        //     'body' => '<p>Suasana penuh semangat dan kegembiraan menyelimuti HALAL saat mereka bersiap untuk menghadiri konser band ska legendaris, Tipe-X. Konser yang dinanti-nantikan ini menjadi kesempatan sempurna bagi HALAL and friend untuk menikmati musik, mempererat kebersamaan, dan merayakan momen-momen berharga bersama.</p>',
        // ]);
        // Blog::factory()->create([
        //     'title' => 'Perkum di Spot.Coffe',
        //     'slug' => 'perkum-spotcoffe',
        //     'user_id' => 1,
        //     'category_id' => 1,
        //     'image' => 'halal11.jpg',
        //     'excerpt' => 'Halal nongki di salah satu coffe shop di Kendari',
        //     'body' => '<p>Nongkrong di Spotcoffe ini tidak hanya memberikan kesempatan untuk menikmati kopi dan makanan lezat, tetapi juga mempererat hubungan HALAL serta menjadi momen Fadel untuk PDKT dengan seseorang. Suasana santai dan nyaman di Spotcoffe menciptakan momen kebersamaan yang berharga, menjadikan kegiatan ini salah satu pengalaman tak terlupakan yang akan selalu dikenang.</p>',
        // ]);
        // Blog::factory()->create([
        //     'title' => 'Camping & Healing to Amarilis',
        //     'slug' => 'camping-amarilis',
        //     'user_id' => 3,
        //     'category_id' => 1,
        //     'image' => 'halal2.jpg',
        //     'excerpt' => 'Camping di Puncak Amarilis & Air Terjun',
        //     'body' => '<p>HALAL melakukan kegiatan camping yang seru dan memuaskan di Puncak Amarilis, sebuah destinasi alam yang menawarkan pemandangan indah dan udara segar. Sebagai bagian dari petualangan ini, mereka juga menikmati mandi-mandi di Air Terjun Amarilis, yang terkenal dengan keindahan dan kesejukan airnya.</p>',
        // ]);

        Blog::factory(200)->create();
    }
}
