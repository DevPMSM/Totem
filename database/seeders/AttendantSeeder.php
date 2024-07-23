<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AttendantSeeder extends Seeder
{
    public function run()
    {
        $attendants = [
            ['name' => 'Atendente Sala A', 'email' => 'sala_a@example.com', 'password' => 'password', 'queue' => 'Sala A'],
            ['name' => 'Atendente Sala B', 'email' => 'sala_b@example.com', 'password' => 'password', 'queue' => 'Sala B'],
            ['name' => 'Atendente Sala C', 'email' => 'sala_c@example.com', 'password' => 'password', 'queue' => 'Sala C'],
        ];

        foreach ($attendants as $attendant) {
            User::create([
                'name' => $attendant['name'],
                'email' => $attendant['email'],
                'password' => Hash::make($attendant['password']),
                'queue' => $attendant['queue'],
            ]);
        }
    }
}
