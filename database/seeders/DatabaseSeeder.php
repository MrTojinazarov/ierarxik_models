<?php

namespace Database\Seeders;

use App\Models\Agent;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        for($i = 1; $i <= 100; $i++){
            $a = rand(0, ($i-1));
            Agent::create([
                'parent_id' => $i == 1 ? 0 : $a,
                'name' => $i%3 == 0 ? 'Parent Agent' : 'Children Agent ' . $i,
                'phone' => '+998932025000' . $i
            ]);
        }
    }
}
