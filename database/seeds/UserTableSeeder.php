<?php
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
    $user = User::where('email','kennethirungu1800@gmail.com')->first();
        if(!$user){

            User::create([
                'name'=>'kenneth irungu',
                'email'=>'kennethirungu1800@gmail.com',
                'role'=>'admin',
                'password'=>Hash::make('proff1800')

            ]);
        }

    }
}
