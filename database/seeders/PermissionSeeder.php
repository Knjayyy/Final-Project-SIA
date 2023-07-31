<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $studentRole = Role::create(['name' => 'student']);

        $createUserPermission = Permission::create(['name' => 'create-user']);
        $createStudentPermission = Permission::create(['name' => 'create-student']);
        $editStudentPermission = Permission::create(['name' => 'edit-student']);
        $viewStudentPermission = Permission::create(['name' => 'view-student']);
        $deleteStudentPermission = Permission::create(['name' => 'delete-student']);
        $listStudentPermission = Permission::create(['name' => 'list-student']);

        $adminRole->givePermissionTo($createUserPermission);
        $adminRole->givePermissionTo($createStudentPermission);
        $adminRole->givePermissionTo($editStudentPermission);
        $adminRole->givePermissionTo($viewStudentPermission);
        $adminRole->givePermissionTo($deleteStudentPermission);
        $adminRole->givePermissionTo($listStudentPermission);

        $studentRole->givePermissionTo($viewStudentPermission);

        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'montanezkien45@gmail.com',
            'password' => bcrypt('admin123')
        ]);

        $student = User::create([
            'name' => 'Student',
            'email' => 'montanezkien56@gmail.com',
            'password' => bcrypt('student123')
        ]);

        $admin->assignRole('admin');
        $student->assignRole('student');
    }
}
