<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Ship;
use App\Models\Schedule;

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
        $cattleya = Ship::create([
            'name' => 'Cattleya Express',
            'type' => 'passenger',
            'route' => 'Pare-Pare - Nunukan',
            'capacity' => '1.400 Penumpang',
            'gt' => 2000,
            'nt' => 600,
            'dimensions' => '-',
            'engine' => '-',
            'description' => 'Diakuisisi pada 29 Maret 2005. Kapal penumpang pertama milik PT PANCA MERAK SAMUDERA yang melayani rute Pare-Pare ke Nunukan. Kapal ini mampu membawa lebih dari 1.400 penumpang sekaligus.',
            'image_path' => 'images/ships/cattleya_express.jpg'
        ]);

        $queenSoya = Ship::create([
            'name' => 'MV Queen Soya',
            'type' => 'passenger',
            'route' => 'Pare-Pare - Samarinda',
            'capacity' => '1.500 Penumpang',
            'gt' => 3000,
            'nt' => 900,
            'dimensions' => '-',
            'engine' => '-',
            'description' => 'Dibeli pada November 2007, merupakan kapal penumpang kedua dari PT PANCA MERAK SAMUDERA dengan rute Pare-Pare ke Samarinda. Kapal ini berkapasitas lebih dari 1.500 penumpang.',
            'image_path' => 'images/ships/queen_soya.jpg'
        ]);

        $pantokrator = Ship::create([
            'name' => 'MV Pantokrator',
            'type' => 'passenger',
            'route' => 'Samarinda - Pare-Pare',
            'capacity' => '1.600 Penumpang',
            'gt' => 3500,
            'nt' => 1100,
            'dimensions' => '-',
            'engine' => '-',
            'description' => 'Ditambahkan pada tahun 2013, merupakan armada kapal penumpang ketiga yang dimiliki oleh PT PANCA MERAK SAMUDERA dengan fokus rute pelayaran Samarinda ke Pare-Pare.',
            'image_path' => 'images/ships/pantokrator.png'
        ]);

        // Coal Barges
        $b1 = Ship::create([
            'name' => 'Barge Charles 205',
            'type' => 'barge',
            'capacity' => '300 Feet',
            'gt' => 3233,
            'nt' => 970,
            'dimensions' => '87,84 x 24,40 x 5,50 m',
            'description' => 'Tongkang batu bara 300 kaki yang dibeli pada Oktober 2010. Digunakan untuk mendistribusikan hasil pertambangan batu bara di Kalimantan dan sekitarnya.',
            'image_path' => 'images/ships/barge_charles_205.png'
        ]);

        $b2 = Ship::create([
            'name' => 'Barge Charles 207',
            'type' => 'barge',
            'capacity' => '300 Feet',
            'gt' => 3233,
            'nt' => 970,
            'dimensions' => '87,84 x 24,40 x 5,50 m',
            'description' => 'Tongkang batu bara 300 kaki yang dibeli pada 30 Oktober 2010. Ditarik oleh Tugboat Hector 111.',
            'image_path' => 'images/ships/barge_charles_207.png'
        ]);

        $b3 = Ship::create([
            'name' => 'Barge Charles 208',
            'type' => 'barge',
            'capacity' => '300 Feet',
            'gt' => 3233,
            'nt' => 970,
            'dimensions' => '87,84 x 24,40 x 5,50 m',
            'description' => 'Tongkang batu bara 300 kaki yang dibeli pada 30 Oktober 2010. Ditarik oleh Tugboat Hector 101 atau Hector 102.',
            'image_path' => 'images/ships/barge.jpg'
        ]);

        $b4 = Ship::create([
            'name' => 'Barge PMS 206',
            'type' => 'barge',
            'capacity' => '300 Feet',
            'gt' => 3200,
            'nt' => 960,
            'dimensions' => '87,84 x 24,40 x 5,50 m',
            'description' => 'Bagian dari ekspansi armada tongkang milik PT PANCA MERAK SAMUDERA untuk logistik batu bara.',
            'image_path' => 'images/ships/barge_pms_206.jpeg'
        ]);

        // Tugboats
        Ship::create([
            'name' => 'Tugboat Hector 101',
            'type' => 'tugboat',
            'gt' => 218,
            'nt' => 66,
            'dimensions' => '26,53 x 8,00 x 3,65 m',
            'engine' => '2 x 823 HP',
            'description' => 'Dioperasikan sejak tahun 2010 untuk menarik tongkang Charles 208 dalam pengiriman batu bara pertambangan.',
            'image_path' => 'images/ships/tugboat_hector_101.png'
        ]);

        Ship::create([
            'name' => 'Tugboat Hector 102',
            'type' => 'tugboat',
            'gt' => 196,
            'nt' => 59,
            'dimensions' => '26,53 x 8,00 x 3,65 m',
            'engine' => '2 x 823 HP',
            'description' => 'Kapal tunda tahun 2010 yang berfungsi menarik tongkang Charles 208 dengan kekuatan mesin ganda 823 HP.',
            'image_path' => 'images/ships/tugboat_hector_102.png'
        ]);

        Ship::create([
            'name' => 'Tugboat Hector 103',
            'type' => 'tugboat',
            'gt' => 182,
            'nt' => 55,
            'dimensions' => '26,53 x 8,00 x 3,60 m',
            'engine' => '2 x 823 HP',
            'description' => 'Kapal tunda tahun 2010 yang dikhususkan menarik tongkang PMS 203.',
            'image_path' => 'images/ships/tugboat_hector_103.jpeg'
        ]);

        Ship::create([
            'name' => 'Tugboat Hector 106',
            'type' => 'tugboat',
            'gt' => 200,
            'nt' => 60,
            'dimensions' => '24,64 x 8,00 x 3,70 m',
            'engine' => '2 x 820 HP',
            'description' => 'Ditambahkan pada tahun 2011, bertugas menarik tongkang Marine Bay 303 untuk logistik batu bara.',
            'image_path' => 'images/ships/tugboat_hector_106.png'
        ]);

        Ship::create([
            'name' => 'Tugboat Hector 108',
            'type' => 'tugboat',
            'gt' => 198,
            'nt' => 60,
            'dimensions' => '26,48 x 8,00 x 3,60 m',
            'engine' => '2 x 610 HP',
            'description' => 'Kapal tunda tahun 2011 dengan mesin 2x 610 HP yang berfungsi menarik tongkang Charles 210.',
            'image_path' => 'images/ships/tugboat_hector_108.png'
        ]);

        Ship::create([
            'name' => 'Tugboat Hector 777',
            'type' => 'tugboat',
            'gt' => 166,
            'nt' => 62,
            'dimensions' => '24,82 x 7,65 x 4,05 m',
            'engine' => '2 x 820 HP',
            'description' => 'Kapal tunda Hector 777, bertugas menarik tongkang Charles 209 dalam logistik laut.',
            'image_path' => 'images/ships/tugboat_hector_777.jpeg'
        ]);

        Ship::create([
            'name' => 'Tugboat Hector 111',
            'type' => 'tugboat',
            'gt' => 211,
            'nt' => 64,
            'dimensions' => '25,51 x 8,00 x 3,65 m',
            'engine' => '2 x 820 HP',
            'description' => 'Kapal tunda Hector 111, bertugas menarik tongkang Charles 207 secara reguler.',
            'image_path' => 'images/ships/tugboat_hector_111.png'
        ]);

        Ship::create([
            'name' => 'Tugboat Hector 117',
            'type' => 'tugboat',
            'gt' => 206,
            'nt' => 62,
            'dimensions' => '24,10 x 8,00 x 3,00 m',
            'engine' => '2 x 826 HP',
            'description' => 'Tugboat kelas berat yang ditenagai mesin ganda 826 HP untuk menarik tongkang Charles 209.',
            'image_path' => 'images/ships/tugboat_hector_117.jpeg'
        ]);

        Ship::create([
            'name' => 'Tugboat Hector 115',
            'type' => 'tugboat',
            'gt' => 210,
            'nt' => 63,
            'dimensions' => '25,50 x 8,00 x 3,60 m',
            'engine' => '2 x 750 HP',
            'description' => 'Selesai dibangun Juni 2013. Berfungsi menarik tongkang yang bermuatan batu bara dan bijih besi.',
            'image_path' => 'images/ships/tugboat_hector_115.png'
        ]);

        Ship::create([
            'name' => 'Tugboat Hector 116',
            'type' => 'tugboat',
            'gt' => 210,
            'nt' => 63,
            'dimensions' => '25,50 x 8,00 x 3,60 m',
            'engine' => '2 x 750 HP',
            'description' => 'Selesai dibangun Juli 2013 untuk mendampingi armada logistik angkutan bijih tambang.',
            'image_path' => 'images/ships/tugboat.jpg'
        ]);

        Ship::create([
            'name' => 'Tugboat Hector 178',
            'type' => 'tugboat',
            'gt' => 220,
            'nt' => 66,
            'dimensions' => '26,00 x 8,00 x 3,70 m',
            'engine' => '2 x 850 HP',
            'description' => 'Armada kapal tunda terbaru yang dioperasikan pada Maret 2014, siap untuk menarik tongkang berukuran 300 hingga 330 kaki.',
            'image_path' => 'images/ships/tugboat_hector_178.jpg'
        ]);


        // 2. SEED SCHEDULES FOR PASSENGER SHIPS

        // Cattleya Express Schedules
        Schedule::create([
            'ship_id' => $cattleya->id,
            'origin_port' => 'Pare-Pare',
            'destination_port' => 'Nunukan',
            'departure_time' => '09:00 WITA',
            'arrival_time' => '21:00 WITA',
            'days_of_week' => 'Senin, Kamis',
            'price_vip' => 450000,
            'price_economy' => 300000,
            'price_vehicle' => 1200000
        ]);

        Schedule::create([
            'ship_id' => $cattleya->id,
            'origin_port' => 'Nunukan',
            'destination_port' => 'Pare-Pare',
            'departure_time' => '09:00 WITA',
            'arrival_time' => '21:00 WITA',
            'days_of_week' => 'Rabu, Sabtu',
            'price_vip' => 450000,
            'price_economy' => 300000,
            'price_vehicle' => 1200000
        ]);

        // MV Queen Soya Schedules
        Schedule::create([
            'ship_id' => $queenSoya->id,
            'origin_port' => 'Pare-Pare',
            'destination_port' => 'Samarinda',
            'departure_time' => '14:00 WITA',
            'arrival_time' => '08:00 WITA (Besok)',
            'days_of_week' => 'Selasa, Jumat',
            'price_vip' => 500000,
            'price_economy' => 350000,
            'price_vehicle' => 1500000
        ]);

        Schedule::create([
            'ship_id' => $queenSoya->id,
            'origin_port' => 'Samarinda',
            'destination_port' => 'Pare-Pare',
            'departure_time' => '14:00 WITA',
            'arrival_time' => '08:00 WITA (Besok)',
            'days_of_week' => 'Kamis, Minggu',
            'price_vip' => 500000,
            'price_economy' => 350000,
            'price_vehicle' => 1500000
        ]);

        // MV Pantokrator Schedules
        Schedule::create([
            'ship_id' => $pantokrator->id,
            'origin_port' => 'Samarinda',
            'destination_port' => 'Pare-Pare',
            'departure_time' => '10:00 WITA',
            'arrival_time' => '04:00 WITA (Besok)',
            'days_of_week' => 'Senin, Rabu, Sabtu',
            'price_vip' => 550000,
            'price_economy' => 380000,
            'price_vehicle' => 1600000
        ]);

        Schedule::create([
            'ship_id' => $pantokrator->id,
            'origin_port' => 'Pare-Pare',
            'destination_port' => 'Samarinda',
            'departure_time' => '10:00 WITA',
            'arrival_time' => '04:00 WITA (Besok)',
            'days_of_week' => 'Selasa, Kamis, Minggu',
            'price_vip' => 550000,
            'price_economy' => 380000,
            'price_vehicle' => 1600000
        ]);
    }
}
