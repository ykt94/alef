<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    protected $fillable = ['theme', 'description'];

    //protected $with = ['groups'];    

    public function groups()
    {
        return $this->belongsToMany(Group::class)->withPivot('schedule');
    }
}
