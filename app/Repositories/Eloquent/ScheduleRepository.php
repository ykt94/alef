<?php

namespace App\Repositories\Eloquent;

use App\Models\GroupLecture;
use App\Models\Group;
use App\Repositories\ScheduleRepositoryContract;

class ScheduleRepository extends BaseRepository implements ScheduleRepositoryContract
{
    public function __construct(GroupLecture $model)
    {
        parent::__construct($model);
    }

    public function update(array $validated, int $id): GroupLecture
    {
        return $this->model->find($id)->update($validated);
    }

    public function getLectureId(int $group_id, int $lecture_id): int
    {
        if ($lecture = $this->model->where('group_id',$group_id)->where('lecture_id',$lecture_id)->first()){
            return $lecture->id;
        }
        return 0;
    }

    public function show(int $id): GroupLecture
    {
        return Group::with('lectures')->find($id);
    }

}