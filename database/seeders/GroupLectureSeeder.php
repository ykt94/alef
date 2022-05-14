<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\GroupLecture;
use App\Models\Group;
use App\Models\Lecture;

class GroupLectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date_template = '2022-05-%d %d:00:00';
        $groups = Group::all();
        foreach ($groups as $group) {
            $count = rand(7, 12);
            $lectures = Lecture::orderBy(DB::raw('RAND()'))->take($count)->get();
            foreach ($lectures as $lecture) {
                GroupLecture::create([
                    'group_id' => $group->id,
                    'lecture_id' => $lecture->id,
                    'schedule' => sprintf($date_template, rand(1,30), rand(10,17)),
                ]);                
            }
        }
    }
}
