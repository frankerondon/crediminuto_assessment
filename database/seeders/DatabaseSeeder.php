<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear roles
        $vendedorRole = Role::create(['name' => 'vendedor']);
        $clienteRole = Role::create(['name' => 'cliente']);

        // Crear usuarios
        User::create([
            'name' => 'Vendedor Test',
            'email' => 'vendedor@test.com',
            'password' => bcrypt('password'),
            'role_id' => $vendedorRole->id
        ]);

        User::create([
            'name' => 'Cliente Test',
            'email' => 'cliente@test.com',
            'password' => bcrypt('password'),
            'role_id' => $clienteRole->id
        ]);

        // Crear productos
        Product::create([
            'name' => 'Producto 1',
            'description' => 'Descripción del producto 1',
            'price' => 100.00
        ]);

        Product::create([
            'name' => 'Producto 2',
            'description' => 'Descripción del producto 2',
            'price' => 200.00
        ]);
    }
}