<?php
use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrador';
        $role->save();
        $role = new Role();
        $role->name = 'oficial';
        $role->description = 'Oficial_Partes';
        $role->save();
        $role = new Role();
        $role->name = 'contralor';
        $role->description = 'Contralor';
        $role->save();
        $role = new Role();
        $role->name = 'diligenciario';
        $role->description = 'Diligenciario';
        $role->save();
    }
}
