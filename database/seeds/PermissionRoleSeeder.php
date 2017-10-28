<?php

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // roles
        $admin = new Role([
            'name' => Role::ROLES['ADMIN'],
            'display_name' => 'System Administrator',
            'description' => 'Administrator is one that can do everything',
        ]);
        $admin->save();

        $manager = new Role([
            'name' => Role::ROLES['MANAGER'],
            'display_name' => 'Department Manager',
            'description' => 'Department Manager manage a department',
        ]);
        $manager->save();

        $employee = new Role([
            'name' => Role::ROLES['EMPLOYEE'],
            'display_name' => 'Employee',
            'description' => 'Employee is one that works at a department',
        ]);
        $employee->save();

        $humanResource = new Role([
            'name' => Role::ROLES['HUMAN_RESOURCE'],
            'display_name' => 'Human resource',
            'description' => 'Human Resources is also the organizational function that deals with the people and issues
             related to people such as compensation, hiring, performance management, and training.',
        ]);
        $humanResource->save();

        //// Permissions
        //$crudUser = new Permission([
        //    'name' => 'crud-user',
        //    'display_name' => 'CRUD user',
        //    'description' => 'Allow user to create, read, update, delete user',
        //]);
        //$crudUser->save();
        //
        //$attachRoleToUser = new Permission([
        //    'name' => 'attach-role-to-user',
        //    'display_name' => 'Attach a role to user',
        //    'description' => 'Allow user to attach a role to user',
        //]);
        //$attachRoleToUser->save();
        //
        //$editOtherUsers = new Permission([
        //    'name' => 'edit-other-users',
        //    'display_name' => 'Edit other users',
        //    'description' => 'Allow user to edit other users account',
        //]);
        //$editOtherUsers->save();
        //
        //$viewOtherUsers = new Permission([
        //    'name' => 'view-other-users',
        //    'display_name' => 'View other users info',
        //    'description' => 'Allow user to view other users info, manager only can view users in his department',
        //]);
        //$viewOtherUsers->save();
        //
        //$checkIn = new Permission([
        //    'name' => 'check-in',
        //    'display_name' => 'Check-in',
        //    'description' => 'Allow user to check-in',
        //]);
        //$checkIn->save();
        //
        //$checkOut = new Permission([
        //    'name' => 'check-out',
        //    'display_name' => 'Check-out',
        //    'description' => 'Allow user to check-out',
        //]);
        //$checkOut->save();
        //
        ////$createAndEditFeedback = new Permission([
        ////   'name' => 'create-and-edit-feedback',
        ////   'display_name' => 'create and edit feedback',
        ////   'description' => 'Allow user to create feedback and edit feedback if it has not replied yet',
        ////]);
        ////$createAndEditFeedback->save();
        //
        //$replyFeedback = new Permission([
        //    'name' => 'reply-feedback',
        //    'display_name' => 'reply feedback',
        //    'description' => 'Allow user to reply feedback',
        //]);
        //$replyFeedback->save();
        //
        ////$crudDailyLog = new Permission([
        ////    'name' => 'crud-daily-log',
        ////    'display_name' => 'crud daily log',
        ////    'description' => 'Allow user to create, read, edit, delete daily logs within 5 days after created',
        ////]);
        ////$crudDailyLog->save();
        //
        //$setRewardForUser = new Permission([
        //    'name' => 'set-reward-for-user',
        //    'display_name' => 'set reward for user',
        //    'description' => 'Allow user to set reward for an employee',
        //]);
        //$setRewardForUser->save();

        //// attach Permissions to Roles
        //$admin->attachPermissions([
        //    $crudUser,
        //    $attachRoleToUser,
        //    //$editOtherUsers,
        //    //$viewOtherUsers,
        //    //$checkIn,
        //    //$checkOut,
        //    ////$createAndEditFeedback,
        //    //$replyFeedback,
        //    ////$crudDailyLog,
        //    //$setRewardForUser,
        //]);
        //
        //$manager->attachPermissions([
        //    $viewOtherUsers,
        //    //$checkIn,
        //    //$checkOut,
        //    ////$createAndEditFeedback,
        //    ////$crudDailyLog,
        //    $setRewardForUser,
        //]);
        //
        //$humanResource->attachPermissions([
        //    $editOtherUsers,
        //    $viewOtherUsers,
        //    //$checkIn,
        //    //$checkOut,
        //    ////$createAndEditFeedback,
        //    ////$crudDailyLog,
        //    $replyFeedback,
        //]);
        //
        //$employee->attachPermission([
        //    $checkIn,
        //    $checkOut,
        //    ////$createAndEditFeedback,
        //    ////$crudDailyLog,
        //]);

        /** @noinspection PhpDynamicAsStaticMethodCallInspection */
        $adminUser = User::create([
            'name' => env('ADMIN_NAME', 'Admin'),
            'email' => env('ADMIN_EMAIL', 'admin@admin.com'),
            'password' => bcrypt(env('ADMIN_PASSWORD', 'password')),
            'gender' => 'Male',
        ]);
        //$adminUser->roles()->attach($admin->id);
        $adminUser->attachRole($admin);

        /** @noinspection PhpDynamicAsStaticMethodCallInspection */
        $employee = User::create([
            'name' => env('EMPLOYEE_NAME', 'Employee'),
            'email' => env('EMPLOYEE_EMAIL', 'employee@example.com'),
            'password' => bcrypt(env('EMPLOYEE_PASSWORD', 'password')),
            'gender' => 'Male',
        ]);
        //$employee->roles()->attach($employee->id);
        $employee->attachRole($employee);
    }
}
