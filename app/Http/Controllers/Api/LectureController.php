<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LectureRequest;
use App\Repositories\LectureRepositoryContract;

class LectureController extends Controller
{

    private $lectureRepository;

    public function __construct(LectureRepositoryContract $lectureRepository)
    {
        $this->lectureRepository = $lectureRepository;
    }

    public function index()
    {
        return $this->lectureRepository->all();
    }

    public function store(LectureRequest $request)
    {
        return $this->lectureRepository->create($request->validated()); 
    }

    public function show(int $id)
    {
        return $this->lectureRepository->show($id);
    }

    public function update(LectureRequest $request, int $id)
    {
        return $this->lectureRepository->update($request->validated(), $id);
    }

    public function destroy(int $id)
    {
        return $this->lectureRepository->destroy($id);
    }
}
