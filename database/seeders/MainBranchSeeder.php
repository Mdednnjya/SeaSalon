<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branch;

class MainBranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::create([
            'name' => 'Main Branch',
            'location' => 'Milan',
            'opening_time' => '09:00:00',
            'closing_time' => '18:00:00'
        ]);
    }
}
