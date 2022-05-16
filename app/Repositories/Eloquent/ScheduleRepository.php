<?php

namespace App\Repositories\Eloquent;

use App\Models\GroupLecture;
use App\Repositories\ScheduleRepositoryContract;

class ScheduleRepository extends BaseRepository implements ScheduleRepositoryContract
{
    public function __construct(GroupLecture $model)
    {
        parent::__construct($model);
    }
}