<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Illuminate\Support\Facades\File;


class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Student::create([
            "name" => fake()->name(),
            "email"=> fake()->unique()->email()
        ]);

        // $json = File::get(path:'database/json/students.json');
        // $students = collect(json_decode($json));
        
        // $students->each(function($student){
        //     Student::create([
        //         "name" => $student->name,
        //         "email"=> $student->email
        //     ]);
        // });
        // $students = collect(
        //     [
        //         [
        //             'name'=> 'Fat Man',
        //             'email'=> '@fatman'
        //         ],
        //         [
        //             'name'=> 'Stew',
        //             'email'=> '@stew'
        //         ],
        //         [
        //             'name'=> 'Meg',
        //             'email'=> '@meg'
        //         ]
        //     ]
        // );

        // $students->each(function($student){
        //     Student::insert($student);
        // });
        
    }
}
