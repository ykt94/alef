<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupLectureRequest;
use App\Repositories\ScheduleServiceContract;
use App\Repositories\ScheduleRepositoryContract;

class ScheduleController extends Controller
{
    private $scheduleRepository;

    public function __construct(ScheduleRepositoryContract $scheduleRepository)
    {
        $this->scheduleRepository = $scheduleRepository;
    }

    public function show($id)
    {
        return $this->scheduleRepository->show($id);
    }    

    public function store(GroupLectureRequest $request, ScheduleServiceContract $scheduleService)
    {
        return $scheduleService->store($request->validated());
    }   
}
