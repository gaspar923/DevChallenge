<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Role::truncate();
        Permission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Usuario']);

        Permission::create(['name' => 'Admin.competition.index']);
        Permission::create(['name' => 'Admin.competition.show']);
        Permission::create(['name' => 'Admin.competition.create']);
        Permission::create(['name' => 'Admin.competition.update']);
        Permission::create(['name' => 'Admin.competition.destroy']);

        Permission::create(['name' => 'Admin.team.index']);
        Permission::create(['name' => 'Admin.team.show']);
        Permission::create(['name' => 'Admin.team.create']);
        Permission::create(['name' => 'Admin.team.update']);
        Permission::create(['name' => 'Admin.team.destroy']);

        Permission::create(['name' => 'Admin.player.index']);
        Permission::create(['name' => 'Admin.player.show']);
        Permission::create(['name' => 'Admin.player.create']);
        Permission::create(['name' => 'Admin.player.update']);
        Permission::create(['name' => 'Admin.player.destroy']);

        Permission::create(['name' => 'Usuario.competition.index']);
        Permission::create(['name' => 'Usuario.competition.show']);

        Permission::create(['name' => 'Usuario.team.index']);
        Permission::create(['name' => 'Usuario.team.show']);

        Permission::create(['name' => 'Usuario.player.index']);
        Permission::create(['name' => 'Usuario.player.show']);

        // php artisan db:seed --class=RoleSeeder
    }
}
