<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
        'deadline',
    ];

    protected $casts = [
        'deadline' => 'datetime',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function users() {
        return $this->belongsToMany(User::class, 'project_users');
    }

    public function projectUsers() {
        return $this->hasMany(ProjectUser::class);
    }

    public function scopeUpdateOverdueProjects($query) {
        
        return $query->where('deadline', '<', now())
                     ->whereNotIn('status', ['delayed', 'completed'])
                     ->update(['status' => 'delayed']);
    }

    public function scopeForUser($query, $userId) {
        return $query->where(function($query) use ($userId) {
            $query->where('user_id', $userId)
                ->orWhereHas('users', function($subQuery) use ($userId) {
                    $subQuery->where('user_id', $userId);
                });
        });
    }

    public function getFormattedStatusAttribute() {
        return strtoupper(str_replace('_', ' ', $this->status));
    }

    public function getStatusColorAttribute() {
        $colors = [
            'completed' => 'bg-green-100 text-green-800',
            'in_progress' => 'bg-yellow-100 text-yellow-800',
            'pending' => 'bg-gray-100 text-gray-800',
            'delayed' => 'bg-red-100 text-red-800',
        ];

        return $colors[$this->status];
    }
}
