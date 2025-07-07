<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public $categories = [
        'Romanzo',
        'Giallo/Noir',
        'Fantasy',
        'Storico',
        'Poesie',
        'Fumetto',
        'Teatro',
        'Saggio',
        'Commedia',
        'Altro'
    ];
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach ($this->categories as $category) {
            Category::create(['name' => $category]);
        }



        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
