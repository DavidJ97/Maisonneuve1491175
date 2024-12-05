<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'file_path', 'user_id'];

    protected $casts = [
        'title' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTitleAttribute($value)
    {
        $value = json_decode($value, true);
        return $value[app()->getLocale()] ?? $value['fr'];
    }

    public function getFileNameAttribute()
    {
        return basename($this->file_path);
    }
}