<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupLecture extends Model
{
    use HasFactory;

    protected $table = 'group_lecture';
    protected $fillable = ['group_id', 'lecture_id', 'schedule'];
    public $incrementing = true;

}
