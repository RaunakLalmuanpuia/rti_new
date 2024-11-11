<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::query()->upsert([
            ['id'=>1,'name'=>'admin','email'=>'admin@mail.com','password'=>Hash::make('password')],
            ['id'=>2,'name'=>'citizen','email'=>'citizen@mail.com','password'=>Hash::make('password')],
            ['id'=>3,'name'=>'aspio','email'=>'aspio@mail.com','password'=>Hash::make('password')],
            ['id'=>4,'name'=>'spio','email'=>'spio@mail.com','password'=>Hash::make('password')],
            ['id'=>5,'name'=>'daa','email'=>'daa@mail.com','password'=>Hash::make('password')],
            ['id'=>6,'name'=>'cic','email'=>'cic@mail.com','password'=>Hash::make('password')],
        ], ['id']);

        $admin=User::query()->find(1);
        $admin->assignRole('Admin');

        $citizen=User::query()->find(2);
        $citizen->assignRole('Citizen');

        $citizen=User::query()->find(3);
        $citizen->assignRole('Aspio');

        $citizen=User::query()->find(4);
        $citizen->assignRole('Spio');

        $citizen=User::query()->find(5);
        $citizen->assignRole('DAA');

        $citizen=User::query()->find(6);
        $citizen->assignRole('CIC');
    }
}
