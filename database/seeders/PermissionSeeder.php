<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission; // Import the 'Permission' class

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'name' => 'Crear Usuarios'
        ]);

        Permission::create([
            'name' => 'Ver todos los usuarios'
        ]);

        Permission::create([
            'name' => 'Actualizar usuarios'
        ]);

        Permission::create([
            'name' => 'Eliminar usuarios'
        ]);
    }
}
