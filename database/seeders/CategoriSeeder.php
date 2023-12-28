<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Edaran',
            'Evalusi',
            'Teguran',
            'Kontrak',
            'Peringatan',
            'Mutasi',
        ];

        foreach ($categories as $category) {
            \App\Models\Categories::create([
                'name' => $category,
            ]);
        }
    }
}
