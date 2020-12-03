<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => "User Create",
                'for' => "User"
            ],
            [
                'name' => "User Update",
                'for' => "User"
            ],
            [
                'name' => "User Edit",
                'for' => "User"
            ],
            [
                'name' => "User Delete",
                'for' => "User"
            ],
            [
                'name' => "Post Create",
                'for' => "Post"
            ],
            [
                'name' => "Post Update",
                'for' => "Post"
            ],
            [
                'name' => "Post Delete",
                'for' => "User"
            ],
            [
                'name' => "Category CRUD",
                'for' => "Other"
            ],
            [
                'name' => "Tag CRUD",
                'for' => "Other"
            ]
        ];
        DB::table('permissions')->insert($data);
    }
}