<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert([
            'nombre' => 'Admin',
            'url' => '#',
            'icono' => 'fa-user-shield',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('menu')->insert([
            'nombre' => 'Usuario',
            'url' => '#',
            'icono' => 'fa-users',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('menu')->insert([
            'nombre' => 'Menú',
            'url' => 'admin/menu',
            'icono' => 'fa-bars',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('menu')->insert([
            'nombre' => 'Rol',
            'url' => 'admin/rol',
            'icono' => 'fa-user-tag',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('menu')->insert([
            'nombre' => 'Menú - Rol',
            'url' => 'admin/menu-rol',
            'icono' => 'fa-address-card',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('menu')->insert([
            'nombre' => 'Permiso',
            'url' => 'admin/permiso',
            'icono' => 'fa-fingerprint',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('menu')->insert([
            'nombre' => 'Permiso - Rol',
            'url' => 'admin/permiso-rol',
            'icono' => 'fa-fingerprint',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
