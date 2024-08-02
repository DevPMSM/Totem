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
            ['name' => 'Atendente Assistência Social', 'email' => 'assistencia_social@totem.com', 'password' => 'Assistencia@2024', 'queue' => 'Assistência Social'],
            ['name' => 'Atendente Cadastro Imobiliário', 'email' => 'cadastro_imobiliario@totem.com', 'password' => 'Cadastro@2024', 'queue' => 'Cadastro Imobiliário'],
            ['name' => 'Atendente Protocolo', 'email' => 'protocolo@totem.com', 'password' => 'Protocolo@2024', 'queue' => 'Protocolo'],
            ['name' => 'Atendente Planejamento', 'email' => 'planejamento@totem.com', 'password' => 'Planejamento@2024', 'queue' => 'Planejamento'],
            ['name' => 'Atendente Procuradoria', 'email' => 'procuradoria@totem.com', 'password' => 'Procuradoria@2024', 'queue' => 'Procuradoria'],
            ['name' => 'Atendente Tributário', 'email' => 'tributario@totem.com', 'password' => 'Tributario@2024', 'queue' => 'Tributário'],
            ['name' => 'Atendente SINE', 'email' => 'sine@totem.com', 'password' => 'Sine@2024', 'queue' => 'SINE'],
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
