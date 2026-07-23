<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Ship;
use App\Models\Schedule;
use App\Models\News;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 0. SEED ADMIN USER
        User::firstOrCreate(
            ['email' => 'admin@pancamerak.co.id'],
            [
                'name' => 'Administrator PMS',
                'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
            ]
        );

        // 1. SEED SHIPS
        // A. Passenger Ships
        $cattleya = Ship::create([
            'name' => 'KM. Cattleya Express',
            'type' => 'passenger',
            'route' => 'Parepare - Bontang',
            'capacity' => '1.400 Penumpang',
            'gt' => 2000,
            'nt' => 600,
            'dimensions' => '-',
            'engine' => '-',
            'description' => 'Diakuisisi pada 29 Maret 2005. Kapal penumpang pertama milik PT PANCA MERAK SAMUDERA yang melayani rute Parepare ke Bontang.',
            'image_path' => 'images/ships/cattleya_express.jpg'
        ]);

        $queenSoya = Ship::create([
            'name' => 'KM. Queen Soya',
            'type' => 'passenger',
            'route' => 'Parepare - Samarinda',
            'capacity' => '1.500 Penumpang',
            'gt' => 3000,
            'nt' => 900,
            'dimensions' => '-',
            'engine' => '-',
            'description' => 'Dibeli pada November 2007, merupakan kapal penumpang kedua dari PT PANCA MERAK SAMUDERA dengan rute Parepare ke Samarinda.',
            'image_path' => 'images/ships/queen_soya.jpg'
        ]);

        $pantokrator = Ship::create([
            'name' => 'KM. Pantokrator',
            'type' => 'passenger',
            'route' => 'Parepare - Nunukan',
            'capacity' => '1.600 Penumpang',
            'gt' => 3500,
            'nt' => 1100,
            'dimensions' => '-',
            'engine' => '-',
            'description' => 'Ditambahkan pada tahun 2013, merupakan armada kapal penumpang ketiga yang dimiliki oleh PT PANCA MERAK SAMUDERA dengan fokus rute Parepare ke Nunukan.',
            'image_path' => 'images/ships/pantokrator_2.jpg,images/ships/pantokrator_1.png'
        ]);

        // B. Coal Barges (Tongkang Batu Bara)
        // Charles Class - 300 Feet
        Ship::create([
            'name' => 'Barge Charles 205',
            'type' => 'barge',
            'capacity' => '300 Feet',
            'gt' => 3233,
            'nt' => 970,
            'dimensions' => '87,84 x 24,40 x 5,50 m',
            'description' => 'Tongkang batu bara ukuran 300 Feet milik PT PANCA MERAK SAMUDERA untuk angkutan tambang curah.',
            'image_path' => 'images/ships/charles_205_1.jpg,images/ships/charles_205_2.png'
        ]);

        Ship::create([
            'name' => 'Barge Charles 207',
            'type' => 'barge',
            'capacity' => '300 Feet',
            'gt' => 3233,
            'nt' => 970,
            'dimensions' => '87,84 x 24,40 x 5,50 m',
            'description' => 'Tongkang batu bara ukuran 300 Feet milik PT PANCA MERAK SAMUDERA. Ditarik oleh Tugboat Hector 111.',
            'image_path' => 'images/ships/charles_207_1.jpg,images/ships/charles_207_2.png'
        ]);

        Ship::create([
            'name' => 'Barge Charles 209',
            'type' => 'barge',
            'capacity' => '300 Feet',
            'gt' => 3233,
            'nt' => 970,
            'dimensions' => '87,84 x 24,40 x 5,50 m',
            'description' => 'Tongkang batu bara ukuran 300 Feet milik PT PANCA MERAK SAMUDERA. Ditarik oleh Tugboat Hector 777.',
            'image_path' => 'images/ships/charles_205_2.png'
        ]);

        Ship::create([
            'name' => 'Barge Charles 210',
            'type' => 'barge',
            'capacity' => '300 Feet',
            'gt' => 3233,
            'nt' => 970,
            'dimensions' => '87,84 x 24,40 x 5,50 m',
            'description' => 'Tongkang batu bara ukuran 300 Feet milik PT PANCA MERAK SAMUDERA untuk logistik tambang laut.',
            'image_path' => 'images/ships/charles_210_1.jpg'
        ]);

        // PMS Class - 270 Feet
        Ship::create([
            'name' => 'Barge PMS 201',
            'type' => 'barge',
            'capacity' => '270 Feet',
            'gt' => 2400,
            'nt' => 720,
            'dimensions' => '82,30 x 21,34 x 4,88 m',
            'description' => 'Tongkang batu bara ukuran 270 Feet milik PT PANCA MERAK SAMUDERA untuk distribusi kargo laut.',
            'image_path' => 'images/ships/pms_201_1.jpg'
        ]);

        Ship::create([
            'name' => 'Barge PMS 202',
            'type' => 'barge',
            'capacity' => '270 Feet',
            'gt' => 2400,
            'nt' => 720,
            'dimensions' => '82,30 x 21,34 x 4,88 m',
            'description' => 'Tongkang batu bara ukuran 270 Feet milik PT PANCA MERAK SAMUDERA untuk logistik laut.',
            'image_path' => 'images/ships/pms_206_1.jpeg'
        ]);

        Ship::create([
            'name' => 'Barge PMS 203',
            'type' => 'barge',
            'capacity' => '270 Feet',
            'gt' => 2400,
            'nt' => 720,
            'dimensions' => '82,30 x 21,34 x 4,88 m',
            'description' => 'Tongkang batu bara ukuran 270 Feet milik PT PANCA MERAK SAMUDERA. Ditarik oleh Tugboat Hector 103.',
            'image_path' => 'images/ships/pms_203_1.jpg,images/ships/pms_203_2.jpg'
        ]);

        Ship::create([
            'name' => 'Barge PMS 206',
            'type' => 'barge',
            'capacity' => '270 Feet',
            'gt' => 2400,
            'nt' => 720,
            'dimensions' => '82,30 x 21,34 x 4,88 m',
            'description' => 'Tongkang batu bara ukuran 270 Feet bagian dari ekspansi armada logistik PT PANCA MERAK SAMUDERA.',
            'image_path' => 'images/ships/pms_206_1.jpeg'
        ]);

        // C. Tugboats (Kapal Tunda Hector)
        Ship::create([
            'name' => 'Tugboat Hector 102',
            'type' => 'tugboat',
            'gt' => 196,
            'nt' => 59,
            'dimensions' => '26,53 x 8,00 x 3,65 m',
            'engine' => '2 x 823 HP',
            'description' => 'Kapal tunda (TB H 102) bermesin ganda 823 HP milik PT PANCA MERAK SAMUDERA.',
            'image_path' => 'images/ships/hector_102_1.jpg,images/ships/hector_102_2.jpg'
        ]);

        Ship::create([
            'name' => 'Tugboat Hector 103',
            'type' => 'tugboat',
            'gt' => 182,
            'nt' => 55,
            'dimensions' => '26,53 x 8,00 x 3,60 m',
            'engine' => '2 x 823 HP',
            'description' => 'Kapal tunda (TB H 103) bermesin ganda 823 HP, dikhususkan menarik tongkang PMS 203.',
            'image_path' => 'images/ships/hector_103_1.jpg,images/ships/hector_103_2.jpeg'
        ]);

        Ship::create([
            'name' => 'Tugboat Hector 106',
            'type' => 'tugboat',
            'gt' => 200,
            'nt' => 60,
            'dimensions' => '24,64 x 8,00 x 3,70 m',
            'engine' => '2 x 820 HP',
            'description' => 'Kapal tunda (TB H 106) bermesin ganda 820 HP bertugas menarik tongkang logistik batu bara.',
            'image_path' => 'images/ships/hector_106_1.png'
        ]);

        Ship::create([
            'name' => 'Tugboat Hector 111',
            'type' => 'tugboat',
            'gt' => 211,
            'nt' => 64,
            'dimensions' => '25,51 x 8,00 x 3,65 m',
            'engine' => '2 x 820 HP',
            'description' => 'Kapal tunda (TB H 111) bermesin ganda 820 HP bertugas menarik tongkang Charles 207.',
            'image_path' => 'images/ships/hector_111_1.jpg,images/ships/hector_111_2.png'
        ]);

        Ship::create([
            'name' => 'Tugboat Hector 777',
            'type' => 'tugboat',
            'gt' => 166,
            'nt' => 62,
            'dimensions' => '24,82 x 7,65 x 4,05 m',
            'engine' => '2 x 820 HP',
            'description' => 'Kapal tunda (TB H 777) bertugas menarik tongkang Charles 209 dalam logistik laut.',
            'image_path' => 'images/ships/hector_777_1.jpeg,images/ships/hector_777_2.jpg'
        ]);

        Ship::create([
            'name' => 'Tugboat Hector 888',
            'type' => 'tugboat',
            'gt' => 215,
            'nt' => 65,
            'dimensions' => '25,50 x 8,00 x 3,65 m',
            'engine' => '2 x 850 HP',
            'description' => 'Kapal tunda (TB H 888) bermesin ganda 850 HP untuk operasional penarikan tongkang.',
            'image_path' => 'images/ships/hector_888_1.jpg'
        ]);

        Ship::create([
            'name' => 'Tugboat Hector 178',
            'type' => 'tugboat',
            'gt' => 220,
            'nt' => 66,
            'dimensions' => '26,00 x 8,00 x 3,70 m',
            'engine' => '2 x 850 HP',
            'description' => 'Kapal tunda (TB H 178) ditenagai mesin ganda 850 HP untuk menarik tongkang 300 Feet.',
            'image_path' => 'images/ships/hector_178_1.jpg,images/ships/hector_178_2.jpg'
        ]);


        // 2. SEED SCHEDULES FOR PASSENGER SHIPS

        // KM. Cattleya Express (Parepare <-> Bontang)
        Schedule::create([
            'ship_id' => $cattleya->id,
            'origin_port' => 'Parepare',
            'destination_port' => 'Bontang',
            'departure_time' => '14:00 WITA',
            'arrival_time' => '10:00 WITA (Besok)',
            'days_of_week' => 'Rabu',
            'price_vip' => 512000,
            'price_economy' => 442000,
            'price_vehicle' => 3400000
        ]);

        Schedule::create([
            'ship_id' => $cattleya->id,
            'origin_port' => 'Bontang',
            'destination_port' => 'Parepare',
            'departure_time' => '14:00 WITA',
            'arrival_time' => '10:00 WITA (Besok)',
            'days_of_week' => 'Jumat',
            'price_vip' => 512000,
            'price_economy' => 442000,
            'price_vehicle' => 3400000
        ]);

        // KM. Queen Soya (Parepare <-> Samarinda)
        Schedule::create([
            'ship_id' => $queenSoya->id,
            'origin_port' => 'Parepare',
            'destination_port' => 'Samarinda',
            'departure_time' => '14:00 WITA',
            'arrival_time' => '08:00 WITA (Besok)',
            'days_of_week' => 'Sabtu',
            'price_vip' => 512000,
            'price_economy' => 442000,
            'price_vehicle' => 3400000
        ]);

        Schedule::create([
            'ship_id' => $queenSoya->id,
            'origin_port' => 'Samarinda',
            'destination_port' => 'Parepare',
            'departure_time' => '14:00 WITA',
            'arrival_time' => '08:00 WITA (Besok)',
            'days_of_week' => 'Rabu',
            'price_vip' => 512000,
            'price_economy' => 442000,
            'price_vehicle' => 3400000
        ]);

        // KM. Pantokrator (Parepare <-> Nunukan)
        Schedule::create([
            'ship_id' => $pantokrator->id,
            'origin_port' => 'Parepare',
            'destination_port' => 'Nunukan',
            'departure_time' => '10:00 WITA',
            'arrival_time' => '22:00 WITA (Besok)',
            'days_of_week' => 'Rabu',
            'price_vip' => 672000,
            'price_economy' => 637000,
            'price_vehicle' => 5200000
        ]);

        Schedule::create([
            'ship_id' => $pantokrator->id,
            'origin_port' => 'Nunukan',
            'destination_port' => 'Parepare',
            'departure_time' => '10:00 WITA',
            'arrival_time' => '22:00 WITA (Besok)',
            'days_of_week' => 'Sabtu',
            'price_vip' => 672000,
            'price_economy' => 637000,
            'price_vehicle' => 5200000
        ]);

        // 3. SEED NEWS ARTICLES
        News::create([
            'title' => 'PMS Siap Hadapi Tantangan Distribusi Batubara Semester II',
            'category' => 'KORPORASI',
            'published_date' => '2026-07-12',
            'summary' => 'PT PANCA MERAK SAMUDERA mengoptimalkan jadwal pemeliharaan berkala BKI (Biro Klasifikasi Indonesia) bagi armada Tugboat Hector guna mengantisipasi puncak permintaan kargo batubara.',
            'content' => 'PT PANCA MERAK SAMUDERA mengoptimalkan jadwal pemeliharaan berkala BKI (Biro Klasifikasi Indonesia) bagi armada Tugboat Hector guna mengantisipasi puncak permintaan kargo batubara di pertengahan hingga akhir tahun. Seluruh armada dalam kondisi siap layar penuh.'
        ]);

        News::create([
            'title' => 'Audit ISM Code Penumpang: Cattleya Express Raih Predikat Sangat Baik',
            'category' => 'KESELAMATAN',
            'published_date' => '2026-06-29',
            'summary' => 'Audit keselamatan tahunan untuk sistem keselamatan operasional kapal penumpang Cattleya Express menyatakan kepatuhan 100% terhadap protokol mitigasi evakuasi darurat laut.',
            'content' => 'Audit keselamatan tahunan untuk sistem keselamatan operasional kapal penumpang Cattleya Express menyatakan kepatuhan 100% terhadap protokol mitigasi evakuasi darurat laut. Komitmen keselamatan pelayaran senantiasa menjadi prioritas utama perusahaan.'
        ]);

        News::create([
            'title' => 'PMS Rampungkan Konstruksi Perbaikan Tongkang Charles 205',
            'category' => 'LOGISTIK',
            'published_date' => '2026-05-15',
            'summary' => 'Perbaikan deck pelat baja tongkang Charles 205 selesai dilakukan di galangan kapal Surabaya, siap memperkuat kegiatan angkutan batubara korporasi pertambangan per Juni ini.',
            'content' => 'Perbaikan deck pelat baja tongkang Charles 205 selesai dilakukan di galangan kapal Surabaya, siap memperkuat kegiatan angkutan batubara korporasi pertambangan per Juni ini dengan kapasitas penuh 300 Feet.'
        ]);
    }
}
