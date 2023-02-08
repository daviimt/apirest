<?php

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
        factory(\App\Cicles::class, 100)->create();
        factory(\App\Articles::class, 100)->create();
        factory(\App\User::class)->create(['name' => 'Administrador', 'email' => 'admin@admin.com', 'password' => bcrypt('12345678'), 'type' => 'a', 'actived' => 1, 'email_verified_at' => "1999-01-01 00:00:00"]);
        factory(\App\User::class, 100)->create(['type'=>'U']);
        factory(\App\Offers::class, 100)->create();
        factory(\App\Requirements::class, 100)->create();
        factory(\App\Applied::class, 100)->create(); // $this->call(UsersTableSeeder::class);
    }
}
