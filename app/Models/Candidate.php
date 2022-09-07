<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use HasFactory;

    // need to have this as this model would be
    // soft deleted. Delete operation would
    // 'mark' it as deleted.
    use SoftDeletes;
    protected $table = 'candidates';
}
