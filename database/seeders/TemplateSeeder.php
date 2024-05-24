<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;

class TemplateSeeder extends Seeder {
    public function run(): void {
        Template::create([
            'name' => 'John Doe',
            'file_path' => storage_path('app/templates/sample1.xml'),
        ]);
        Template::create([
            'name' => 'HAMMOUMI Tarik',
            'file_path' => storage_path('app/templates/sample2.xml'),
        ]);
    }
}
