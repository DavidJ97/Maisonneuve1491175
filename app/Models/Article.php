<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'user_id'];

    protected $casts = [
        'title' => 'array',
        'content' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accesseurs pour obtenir le titre et le contenu dans la langue actuelle
    public function getTitleAttribute($value)
    {
        $value = json_decode($value, true);
        return $value[app()->getLocale()] ?? $value['fr'];
    }

    public function getContentAttribute($value)
    {
        $value = json_decode($value, true);
        return $value[app()->getLocale()] ?? $value['fr'];
    }
}