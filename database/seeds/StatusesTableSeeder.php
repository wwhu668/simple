<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids = [1, 2, 3];
        $faker = app(Faker\Generator::class);
        $statuses = factory(Status::class, 100)->make()->each(function ($status) use ($faker, $ids) {
            $status->user_id = $faker->randomElement($ids);
        });
        Status::insert($statuses->toArray());
    }
}
