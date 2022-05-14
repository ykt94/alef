<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class GroupLecture extends Pivot
{
    use HasFactory;

    protected $table = 'group_lecture';
    protected $fillable = ['group_id', 'lecture_id', 'schedule'];
    public $incrementing = true;

}
