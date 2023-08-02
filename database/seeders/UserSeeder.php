<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Image;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = User::create([
            'name' => 'Jose Daniel Grijalba Osorio',
            'email' => 'jose.jdgo97@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $users = User::factory(2)->create();

        foreach($users as $user){
            Image::factory(1)->create([
                'imageable_id' => $user->id,
                'imageable_type' => User::class]);
        }
    }
}
