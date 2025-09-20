<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class InitialSeeder extends Seeder {
    public function run() {
        DB::table('users')->insert([
            'name'=>'Guru Utama',
            'email'=>'guru@example.test',
            'password'=>Hash::make('password123'),
            'role'=>'teacher',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('students')->insert([
            ['nisn'=>'1001','name'=>'Budi','class'=>'3A','status'=>'active','created_at'=>now(),'updated_at'=>now()],
            ['nisn'=>'1002','name'=>'Siti','class'=>'3A','status'=>'active','created_at'=>now(),'updated_at'=>now()],
            ['nisn'=>'1003','name'=>'Andi','class'=>'3B','status'=>'active','created_at'=>now(),'updated_at'=>now()]
        ]);

        DB::table('academic_years')->insert(['year_start'=>2025,'year_end'=>2026,'created_at'=>now(),'updated_at'=>now()]);

        DB::table('semesters')->insert([
            ['academic_year_id'=>1,'name'=>'Semester 1','start_date'=>Carbon::create(2025,1,1)->toDateString(),'end_date'=>Carbon::create(2025,6,30)->toDateString(),'created_at'=>now(),'updated_at'=>now()],
            ['academic_year_id'=>1,'name'=>'Semester 2','start_date'=>Carbon::create(2025,7,1)->toDateString(),'end_date'=>Carbon::create(2025,12,31)->toDateString(),'created_at'=>now(),'updated_at'=>now()]
        ]);
    }
}
