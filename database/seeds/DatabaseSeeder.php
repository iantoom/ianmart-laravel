<?php

use Illuminate\Database\Seeder;
use App\Model\Review;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class, 5)->create();
        factory(App\Model\Product::class, 20)->create();
        factory(Review::class, 50)->create();
    }
}
