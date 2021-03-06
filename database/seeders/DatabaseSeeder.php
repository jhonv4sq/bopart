<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $rol1 = Rol ::factory()->create([
            'name' => 'admin'
        ]);

        $rol2 = Rol::factory()->create([
            'name' => 'user'
        ]);
        
        $user1 = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345'),
        ]);
        $user1->Rol()->attach($rol1);
        
        $user2 = User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345'),
        ]);

        $user2->Rol()->attach($rol2);
        
        $events = Event::factory()->create();
        
        $users = User::factory(10)->create();

        $rol2->User()->attach($users);

        $events->User()->attach($users);

        $user1->Event()->attach(Event::factory(7)->create());
    }
}
