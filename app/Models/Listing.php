<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'company', 'title', 'location', 'email', 'website', 'tags', 'description', 'logo'];

    public function scopeFilter($query, array $filters) {
        // isset($filters['tag']) ? $filters['tag'] : false;

        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if ($filters['search'] ?? false) {
            $query
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }

    // Relationship to User
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
