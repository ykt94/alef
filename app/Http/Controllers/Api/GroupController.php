<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupRequest;
use App\Repositories\GroupRepositoryContract;

class GroupController extends Controller
{
    private $groupRepository;

    public function __construct(GroupRepositoryContract $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    public function index()
    {
        return $this->groupRepository->all();
    }

    public function store(GroupRequest $request)
    {
        return $this->groupRepository->create($request->validated()); 
    }

    public function show(int $id)
    {
        return $this->groupRepository->show($id);
    }

    public function update(GroupRequest $request, int $id)
    {
        return $this->groupRepository->update($request->validated(), $id);
    }

    public function destroy(int $id)
    {
        return $this->groupRepository->destroy($id);
    }

    /**
     * Display a listing of the schedule.
     *
     * @return \Illuminate\Http\Response
     */
    // public function schedule($id)
    // {
    //     $group = Group::with('lectures')->find($id);
    //     return $group;
    // }    
}
