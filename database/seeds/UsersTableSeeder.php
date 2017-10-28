<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Department::class, 5)->create()->each(function ($department) {
            factory(App\Models\User::class, 5)->create([
                'department_id' => $department->id,
            ])->each(function ($u) {
                factory(\App\Models\DailyLog::class, 20)->create([
                    'user_id' => $u->id,
                ]);

                factory(\App\Models\Feedback::class, 1)->create([
                    'user_id' => $u->id,
                ]);
            });
        });
    }
}
