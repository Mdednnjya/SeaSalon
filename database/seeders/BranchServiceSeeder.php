<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branch;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class BranchServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mainBranch = Branch::where('location', 'Milan')->first();
        $services = Service::all();

        if ($mainBranch) {
            foreach ($services as $service) {
                DB::table('branch_service')->insert([
                    'branch_id' => $mainBranch->id,
                    'service_id' => $service->id,
                ]);
            }
        }
    }
}
