<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'tambah-pengguna']);
        Permission::create(['name' => 'edit-pengguna']);
        Permission::create(['name' => 'hapus-pengguna']);
        Permission::create(['name' => 'lihat-pengguna']);
        
        Permission::create(['name' => 'tambah-jurusan']);
        Permission::create(['name' => 'edit-jurusan']);
        Permission::create(['name' => 'hapus-jurusan']);
        Permission::create(['name' => 'lihat-jurusan']);
        
        Permission::create(['name' => 'tambah-kelas']);
        Permission::create(['name' => 'edit-kelas']);
        Permission::create(['name' => 'hapus-kelas']);
        Permission::create(['name' => 'lihat-kelas']);
        
        Permission::create(['name' => 'tambah-guru']);
        Permission::create(['name' => 'edit-guru']);
        Permission::create(['name' => 'hapus-guru']);
        Permission::create(['name' => 'lihat-guru']);
        
        Permission::create(['name' => 'tambah-siswa']);
        Permission::create(['name' => 'edit-siswa']);
        Permission::create(['name' => 'hapus-siswa']);
        Permission::create(['name' => 'lihat-siswa']);
        
        Permission::create(['name' => 'tambah-matpel']);
        Permission::create(['name' => 'edit-matpel']);
        Permission::create(['name' => 'hapus-matpel']);
        Permission::create(['name' => 'lihat-matpel']);
        
        Permission::create(['name' => 'tambah-jadwal-pelajaran']);
        Permission::create(['name' => 'edit-jadwal-pelajaran']);
        Permission::create(['name' => 'hapus-jadwal-pelajaran']);
        Permission::create(['name' => 'lihat-jadwal-pelajaran']);
      
        Permission::create(['name' => 'tambah-nilai-pelajaran']);
        Permission::create(['name' => 'edit-nilai-pelajaran']);
        Permission::create(['name' => 'hapus-nilai-pelajaran']);
        Permission::create(['name' => 'lihat-nilai-pelajaran']);

        Permission::create(['name' => 'lihat-jadwal-mengajar']);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'guru']);
        Role::create(['name' => 'siswa']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('tambah-pengguna');
        $roleAdmin->givePermissionTo('edit-pengguna');
        $roleAdmin->givePermissionTo('hapus-pengguna');
        $roleAdmin->givePermissionTo('lihat-pengguna');
       
        $roleAdmin->givePermissionTo('tambah-jurusan');
        $roleAdmin->givePermissionTo('edit-jurusan');
        $roleAdmin->givePermissionTo('hapus-jurusan');
        $roleAdmin->givePermissionTo('lihat-jurusan');
        
        $roleAdmin->givePermissionTo('tambah-kelas');
        $roleAdmin->givePermissionTo('edit-kelas');
        $roleAdmin->givePermissionTo('hapus-kelas');
        $roleAdmin->givePermissionTo('lihat-kelas');
       
        $roleAdmin->givePermissionTo('tambah-guru');
        $roleAdmin->givePermissionTo('edit-guru');
        $roleAdmin->givePermissionTo('hapus-guru');
        $roleAdmin->givePermissionTo('lihat-guru');
        
        $roleAdmin->givePermissionTo('tambah-siswa');
        $roleAdmin->givePermissionTo('edit-siswa');
        $roleAdmin->givePermissionTo('hapus-siswa');
        $roleAdmin->givePermissionTo('lihat-siswa');
        
        $roleAdmin->givePermissionTo('tambah-matpel');
        $roleAdmin->givePermissionTo('edit-matpel');
        $roleAdmin->givePermissionTo('hapus-matpel');
        $roleAdmin->givePermissionTo('lihat-matpel');
       
        $roleAdmin->givePermissionTo('tambah-jadwal-pelajaran');
        $roleAdmin->givePermissionTo('edit-jadwal-pelajaran');
        $roleAdmin->givePermissionTo('hapus-jadwal-pelajaran');
        $roleAdmin->givePermissionTo('lihat-jadwal-pelajaran');
       
        $roleAdmin->givePermissionTo('tambah-nilai-pelajaran');
        $roleAdmin->givePermissionTo('edit-nilai-pelajaran');
        $roleAdmin->givePermissionTo('hapus-nilai-pelajaran');
        $roleAdmin->givePermissionTo('lihat-nilai-pelajaran');

        $roleGuru = Role::findByName('guru');
        $roleGuru->givePermissionTo('tambah-nilai-pelajaran');
        $roleGuru->givePermissionTo('edit-nilai-pelajaran');
        $roleGuru->givePermissionTo('hapus-nilai-pelajaran');
        $roleGuru->givePermissionTo('lihat-nilai-pelajaran');

        $roleGuru->givePermissionTo('lihat-jadwal-mengajar');

    }
}
