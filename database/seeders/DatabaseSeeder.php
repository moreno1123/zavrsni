<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Idea;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Seeder;

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
            'email' => 'moreno123@mail.com',
            'password' => bcrypt('test123456'),
        ]);

        User::factory(19)->create();

        Category::factory()->create(['name' => 'Kategorija 1']);
        Category::factory()->create(['name' => 'Kategorija 2']);
        Category::factory()->create(['name' => 'Kategorija 3']);
        Category::factory()->create(['name' => 'Kategorija 4']);

        Idea::factory(100)->existing()->create();

        foreach (range(1, 20) as $user_id) {
            foreach (range(1, 100) as $idea_id) {
                if ($idea_id % 2 === 0) {
                    Vote::factory()->create([
                        'user_id' => $user_id,
                        'idea_id' => $idea_id,
                    ]);
                }
            }
        }

        foreach (Idea::all() as $idea) {
            Comment::factory(5)->existing()->create(['idea_id' => $idea->id]);
        }
    }
}
