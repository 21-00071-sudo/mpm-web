<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    protected $fillable = [
        'project_id',
        'user_id',
        'role_in_project',
    ];

    public function user() {
        
        return $this->belongsTo(User::class);
    }

    public function project() {

        return $this->belongsTo(Project::class);
    }

    public function projectUsers() {
        
        return $this->hasMany(ProjectUser::class);
    }
}
