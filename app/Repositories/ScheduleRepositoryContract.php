<?php

namespace App\Repositories;

interface ScheduleRepositoryContract
{
    public function show(int $id): Model;

    public function update(array $validated, int $id): Model;

    public function getLectureId(int $group_id, int $lecture_id): int;
}