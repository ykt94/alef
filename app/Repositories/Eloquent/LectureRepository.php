<?php

namespace App\Repositories\Eloquent;

use App\Models\Lecture;
use App\Repositories\LectureRepositoryContract;

class LectureRepository extends BaseRepository implements LectureRepositoryContract
{
    public function __construct(Lecture $model)
    {
        parent::__construct($model);
    }

    public function show(int $id): Lecture
    {
        $lecture = Lecture::with('groups')->find($id);
        foreach($lecture->groups as $group) {
            $group->students;
        }
        return $lecture;
    }

    public function update(array $validated, int $id): Lecture
    {
        $lecture = Lecture::findOrFail($id);
        $lecture->fill($validated);
        $lecture->save();
        return $lecture;
    }

    public function destroy(int $id)
    {
        $lecture = $this->find($id)->groups()->detach();
        $lecture->delete();
        return ['message' => 'Lecture deleted'];        
    }    
}