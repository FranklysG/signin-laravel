<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Str;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();

        if ($user) {
            Address::create([
                'user_id' => $user->id,
                'street' => 'Rua Exemplo',
                'district' => 'Bairro Exemplo',
                'number' => '123',
                'city' => 'Cidade Exemplo',
                'state' => 'Estado Exemplo',
                'postal_code' => '12345-678',
                'country' => 'País Exemplo',
            ]);
        } else {
            $this->command->info('Nenhum usuário encontrado. Por favor, adicione usuários antes de rodar o seeder.');
        }
    }
}
