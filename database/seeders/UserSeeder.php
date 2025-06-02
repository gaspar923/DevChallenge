<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate(); // Elimina registros de la tabla
        User::create(
            [
                'name' => 'Prueba Admin',
                'email' => 'prueba_admin@gmail.com',
                'password' => Hash::make('qEFqD7y92CSLyZK'),
                'created_by' => '1',
                'updated_by' => '1',
            ]
        );
        User::create(
            [
                'name' => 'Prueba Usuario',
                'email' => 'prueba_usuario@gmail.com',
                'password' => Hash::make('qEFqD7y92CSLyZ'),
                'created_by' => '1',
                'updated_by' => '1',
            ]
        );

        $role1 = Role::find(1); // Admin
        $role2 = Role::find(2); // Usuario

        DB::table('model_has_roles')->truncate();

        User::find(1)->assignRole($role1);
        User::find(2)->assignRole($role2);

        // php artisan db:seed --class=UserSeeder
    }
}
