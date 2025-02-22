<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            PetTypeSeeder::class,
            CategorySeeeder::class,
            
            // SettingTableSeeder::class,
            // SliderSeeder::class,
            // ClinicSeeder::class,
            // StoreSeeder::class,
            // ProductSeeder::class,
            // HostingSeeder::class,
            // AccompanySeeder::class,
        ]);
    }
}
