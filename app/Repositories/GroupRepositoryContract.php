<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface GroupRepositoryContract
{
    public function show(int $id): Model;

    public function update(array $validated, int $id): Model;

    public function destroy(int $id);
}