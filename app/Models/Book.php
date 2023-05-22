<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'summary',
        'author_id',
        'publisher_id',
        'edition_id',
        'category_id',
        'price',
        'status'
    ];

    // public function getAuthorIdAttribute(int $id)
    // {
    //     return Author::findOrFail($id)?->pen_name;
    // }

    // public function getPublisherIdAttribute(int $id)
    // {
    //     return Publisher::findOrFail($id)?->name;
    // }

    // public function getEditionIdAttribute(int $id)
    // {
    //     return Edition::findOrFail($id)?->name;
    // }

    // public function getCategoryIdAttribute(int $id)
    // {
    //     return Category::findOrFail($id)?->name;
    // }

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'author_book', 'book_id', 'author_id');
    }

    // public function authors(): BelongsToMany
    // {
    //     return $this->belongsToMany(Author::class, 'author_id', 'id');
    // }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class, 'publisher_id', 'id');
    }

    // public function publishers(): BelongsToMany
    // {
    //     return $this->belongsToMany(Publisher::class, 'publishers', 'id');
    // }

    public function edition(): BelongsTo
    {
        return $this->belongsTo(Edition::class, 'edition_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($book) {
            $book->authors()->detach();
        });
    }
}
