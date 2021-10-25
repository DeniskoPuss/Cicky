<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Table::query()->truncate();
        $tables = [
            ['name' => 'Stôl 1', 'people' => 2],
            ['name' => 'Stôl 2', 'people' => 2],
            ['name' => 'Stôl 3', 'people' => 2],
            ['name' => 'Stôl 4', 'people' => 3],
            ['name' => 'Stôl 5', 'people' => 3],
            ['name' => 'Stôl 6', 'people' => 3],
            ['name' => 'Stôl 7', 'people' => 4],
            ['name' => 'Stôl 8', 'people' => 4],
            ['name' => 'Stôl 9', 'people' => 6],
            ['name' => 'Stôl 10', 'people' => 6]
        ];

        foreach ($tables as $table) {
            Table::create([
                'name' => $table['name'],
                'people' => $table['people']
            ]);
        }
    }
}

