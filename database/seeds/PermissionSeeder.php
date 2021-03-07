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
                'for' => "user"
            ],
            [
                'name' => "User Update",
                'for' => "user"
            ],
            [
                'name' => "User Edit",
                'for' => "user"
            ],
            [
                'name' => "User Delete",
                'for' => "user"
            ],
            [
                'name' => "Post Create",
                'for' => "post"
            ],
            [
                'name' => "Post Update",
                'for' => "post"
            ],
            [
                'name' => "Post Delete",
                'for' => "post"
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