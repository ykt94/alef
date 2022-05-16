<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\EloquentRepositoryContract;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\ScheduleServiceContract;
use App\Services\ScheduleService;
use App\Repositories\GroupRepositoryContract;
use App\Repositories\Eloquent\GroupRepository;
use App\Repositories\StudentRepositoryContract;
use App\Repositories\Eloquent\StudentRepository;
use App\Repositories\LectureRepositoryContract;
use App\Repositories\Eloquent\LectureRepository;
use App\Repositories\ScheduleRepositoryContract;
use App\Repositories\Eloquent\ScheduleRepository;
use App\Repositories\GroupLectureRepositoryContract;
use App\Repositories\Eloquent\GroupLectureRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(EloquentRepositoryContract::class, BaseRepository::class);
        $this->app->singleton(ScheduleServiceContract::class, ScheduleService::class);
        $this->app->singleton(GroupRepositoryContract::class, GroupRepository::class);
        $this->app->singleton(StudentRepositoryContract::class, StudentRepository::class);
        $this->app->singleton(LectureRepositoryContract::class, LectureRepository::class);
        $this->app->singleton(ScheduleRepositoryContract::class, ScheduleRepository::class);
        $this->app->singleton(GroupLectureRepositoryContract::class, GroupLectureRepository::class);
    }
}
