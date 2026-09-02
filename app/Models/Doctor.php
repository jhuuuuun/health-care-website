<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Doctor extends Model
{
    protected $fillable = [
        'department_id',
        'fname',
        'mname',
        'lname',
        'slug',
        'specialization',
        'credentials',
        'biography',
        'photo',
        'schedule',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function getFullNameAttribute(): string
    {
        return trim(
            $this->fname . ' ' .
            ($this->mname ? $this->mname . ' ' : '') .
            $this->lname
        );
    }
}