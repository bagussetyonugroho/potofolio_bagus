<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'name',
        'role',
        'avatar_color',
        'content',
        'likes',
        'is_pinned',
    ];

    protected $casts = [
        'is_pinned' => 'boolean',
        'likes' => 'integer',
    ];

    /**
     * Get the two-letter initials of the commenter.
     */
    public function getInitialsAttribute(): string
    {
        $words = preg_split('/\s+/', trim($this->name));
        if (count($words) >= 2) {
            return strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
        }
        return strtoupper(substr($this->name, 0, 2));
    }
}
