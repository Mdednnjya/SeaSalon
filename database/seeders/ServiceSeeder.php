<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use Illuminate\Support\Facades\File;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'name' => 'Haircuts and Styling',
                'description' => 'Achieve your perfect look with precision cuts and creative styles from our expert stylists.',
                'image' => 'services/service-1.png',
                'duration' => 60,
            ],
            [
                'name' => 'Manicure and Pedicure',
                'description' => 'Indulge in a soothing manicure and pedicure for beautifully polished nails and soft, rejuvenated skin.',
                'image' => 'services/service-2.png',
                'duration' => 60,
            ],
            [
                'name' => 'Facial Treatments',
                'description' => 'Refresh your complexion with our revitalizing facials, designed to enhance your natural glow.',
                'image' => 'services/service-3.png',
                'duration' => 60,
            ],
        ];

        foreach ($services as $service) {
            $sourcePath = public_path('images/' . $service['image']);
            $destinationPath = storage_path('app/public/' . $service['image']);

            File::ensureDirectoryExists(dirname($destinationPath));

            File::copy($sourcePath, $destinationPath);

            Service::create($service);
        }
    }
}
