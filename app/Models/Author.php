<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'pen_name',
        'name',
        'profile',
        'address',
        'phone_number',
        'status'
    ];
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'author_book', 'author_id', 'book_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($author) {
            $author->books()->detach();
        });
    }
}
