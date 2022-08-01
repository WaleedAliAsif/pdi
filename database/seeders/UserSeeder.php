<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Company;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     if(! User::find(1)){
            $user = new User();
            $user->first_name = 'Waleed';
            $user->last_name = 'Ali Asif';
            $user->username = 'Waleed';
            $user->status = 1;
            $user->password = bcrypt('admin');
            $user->email = 'waleed@gmail.com';
            $user->email_verified_at = now();
            // $user->ar_user = true;
            $user->assignRole('Admin','Super Admin');
            $user->save();
         }
         if(! User::find(2)){
            $user = new User();
            $user->first_name = 'Doctor';
            $user->last_name = 'Name';
            $user->username = 'doctor';
            $user->status = 1;
            $user->password = bcrypt('admin');
            $user->email = 'doctor@gmail.com';
            $user->email_verified_at = now();
            // $user->ar_user = true;
            $user->assignRole('Doctor');
            $user->save();
            $doctor = Doctor::create([
                'user_id' => $user->id,
                'cnic' => '009009',
                'specialization' => 'General',
                'address' => 'Address',
                'phone' => 'Address',
                'gender' => 'Male',

            ]);
         }

    }
    

}
