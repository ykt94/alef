<?php

namespace App\Repositories\Eloquent;

use App\Models\Student;
use App\Repositories\StudentRepositoryContract;
use Illuminate\Support\Collection;

class StudentRepository extends BaseRepository implements StudentRepositoryContract
{
    public function __construct(Student $model)
    {
        parent::__construct($model);
    }

    public function show(int $id): Student
    {
        $student = Student::with('group')->find($id);
        $student->group->lectures;
        return $student;
    }

    public function update(array $validated, int $id): Student
    {
        $student = Student::findOrFail($id);
        $student->fill($validated);
        $student->save();
        return $student;
    }

    public function destroy(int $id)
    {
        $this->find($id)->delete();
        return ['message' => 'Student deleted'];        
    }

}