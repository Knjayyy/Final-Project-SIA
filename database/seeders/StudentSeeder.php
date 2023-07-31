<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $stud = [
        //     [
        //         'last_name' => 'Montanez',
        //         'first_name' => 'Kien',
        //         'mid_name' => 'Juanich',
        //         'birthdate' => '2002-07-18',
        //         'age' => '21',
        //         'address' => 'Macaas, Tubigon, Bohol',
        //         'num' => '09510776229',
        //         'course' => 'BSIT',
        //         'year_level' => '3',
        //         'email' => 'sumipo231@gmail.com',
        //     ],

        // ];

        // foreach($stud as $s) {
        //     Student::create($s);
        // }
        Student::factory(10)->create();
    }
}

