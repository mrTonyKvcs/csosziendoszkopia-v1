<?php

namespace Database\Seeders;

use App\Models\InformationType;
use Illuminate\Database\Seeder;

class InformationTypesSeeder extends Seeder
{
    protected $types = ['Összes oldal', 'Főoldal', 'Időpontfoglaló oldal'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->types as $type) {
            InformationType::updateOrCreate(['name' => $type]);
        }
    }
}
