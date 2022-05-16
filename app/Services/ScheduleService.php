<?php

namespace App\Services;

use App\Repositories\ScheduleServiceContract;
use App\Repositories\ScheduleRepositoryContract;

class ScheduleService implements ScheduleServiceContract
{
    private $scheduleRepository;

    public function __construct(ScheduleRepositoryContract $scheduleRepository)
    {
        $this->scheduleRepository = $scheduleRepository;
    }

    public function store($validated)
    {
        //TODO refactor date format
        $date_template = '2022-05-%d %d:00:00';
        $validated['schedule'] = sprintf($date_template, $validated['day'], $validated['hour']);
        $id = $this->scheduleRepository->getLectureId($validated['group_id'], $validated['lecture_id']);
        if($id > 0) {
            return $this->scheduleRepository->update($validated, $id);
        } 
        return $this->scheduleRepository->create($validated);
    }
}
