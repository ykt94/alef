<?php

namespace App\Repositories;

interface LectureRepositoryContract
{
    public function show(int $id): Model;

    public function update(array $validated, int $id): Model;

    public function destroy(int $id);   
}