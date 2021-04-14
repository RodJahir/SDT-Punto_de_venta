<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Team;
use Laravel\Jetstream\HasTeams;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userPueba = User::create([
            'name' => 'SDTPunto',
            'email' => 'sdtpunto@gmail.com',
            'password' => Hash::make('admin1234'),
        ])->assignRole('Admin');

       /*  $userPueba = Team::create([
            'user_id' => '1',
            'name' => 'SDTPunto',
            'personal_team' => '1',
        ]); */

        $userPueba = User::create([
            'name' => 'SDTPuntod',
            'email' => 'sdtpuntod@gmail.com',
            'password' => Hash::make('admin1234'),
        ])->assignRole('Admin');

        $userPueba = User::create([
            'name' => 'SDTPuntode',
            'email' => 'sdtpuntode@gmail.com',
            'password' => Hash::make('admin1234'),
        ])->assignRole('Jefe de turno');

        $userPueba = User::create([
            'name' => 'SDTPuntodev',
            'email' => 'sdtpuntodev@gmail.com',
            'password' => Hash::make('admin1234'),
        ])->assignRole('Vendedor');

        $userPueba = User::create([
            'name' => 'SDTPuntodeve',
            'email' => 'sdtpuntdeveo@gmail.com',
            'password' => Hash::make('admin1234'),
        ])->assignRole('cliente');




    }
}
