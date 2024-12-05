<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = [
        'writer_id',
        'working_id',
        'title',
        'description',
        'deadline',
        'completed',
        'file'
    ];

    public function writer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'writer_id');
    }

    public function working(): BelongsTo
    {
        return $this->belongsTo(User::class, 'working_id');
    }
}
