<?php

namespace App\Repositories\Eloquent;

use App\Models\Group;
use App\Models\Student;
use App\Repositories\GroupRepositoryContract;

class GroupRepository extends BaseRepository implements GroupRepositoryContract
{
    public function __construct(Group $model)
    {
        parent::__construct($model);
    }

    public function show(int $id): Group
    {
        return Group::with('students')->find($id);
    }    

    public function update(array $validated, int $id): Group
    {
        $group = Group::findOrFail($id);
        $group->fill($validated);
        $group->save();
        return $group;
    }

    public function destroy(int $id)
    {
        Student::where('group_id', $id)->update(['group_id' => null]);
        $this->find($id)->delete();
        return ['message' => 'Group deleted'];
    }        
}
