<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Idea;
use App\Models\Vote;
use App\Models\User;
use Database\Factories\UserFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'moreno',
            'email' => 'moreno123@email.com',
            'password' => bcrypt('test123456'),
        ]);

        User::factory(19)->create();

        Category::factory()->create(['name' => 'category 1']);
        Category::factory()->create(['name' => 'category 2']);
        Category::factory()->create(['name' => 'category 3']);
        Category::factory()->create(['name' => 'category 4']);

        Idea::factory(100)->create();

        foreach (range(1, 20) as $user_id) {
            foreach (range(1, 100) as $idea_id) {
                if ($idea_id % 2 === 0) {
                    Vote::factory()->create([
                        'user_id' => $user_id,
                        'idea_id' => $idea_id
                    ]);
                }
            }
        }
    }
}
