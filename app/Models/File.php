<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ([
        'folder_id',
        'uploaded_by',
        'task_id',
        'project_id',
        'name',
        'path',
    ]);
}
