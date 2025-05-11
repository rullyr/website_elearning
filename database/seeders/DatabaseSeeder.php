<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Kelas::factory(5)->create()->each(function ($class) {
            if (!$class->is_tryout) {
                \App\Models\Material::factory(3)->create(['class_id' => $class->id]);
            }
            \App\Models\Quiz::factory(5)->create(['class_id' => $class->id]);
        });

        // Assign all users to all classes
        $users = \App\Models\User::all();
        $classes = \App\Models\Kelas::all();
        foreach ($users as $user) {
            $user->classes()->attach($classes->pluck('id'));
        }
    }
}
