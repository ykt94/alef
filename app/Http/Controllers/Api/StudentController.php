<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Repositories\StudentRepositoryContract;

class StudentController extends Controller
{

    private $studentRepository;

    public function __construct(StudentRepositoryContract $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function index()
    {
        return $this->studentRepository->all();
    }

    public function store(StudentRequest $request)
    {
        return $this->studentRepository->create($request->validated());      
    }

    public function show(int $id)
    {
        return $this->studentRepository->show($id);
    }

    public function update(StudentRequest $request, int $id)
    {
        return $this->studentRepository->update($request->validated(), $id);
    }

    public function destroy(int $id)
    {
        return $this->studentRepository->destroy($id);
    }
}
