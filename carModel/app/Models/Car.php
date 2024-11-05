<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'is_public', 'preview_image', 'price'];
    protected $casts = ['is_public' => 'bool'];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value)
        );
    }
    protected function isPublic(): Attribute
    {
        return Attribute::make(
            get: fn($value) => (bool)$value,
        );
    }

}
