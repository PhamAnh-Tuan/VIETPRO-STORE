<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Container\BindingResolutionException;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            CategoryTableSeeder::class,
            OrderTableSeeder::class,
            OrderDetailTableSeeder::class,
            ProductTableSeeder::class,
            InfoTableSeeder::class,
            CateroryProductTableSeeder::class,
            RolePermissionSeeder::class,
        ]);
    }
}
