<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'summary',
        'author_id',
        'price'
    ];

    public function getAuthorIdAttribute(int $id)
    {
        return Author::findOrFail($id)?->pen_name;
    }

    public function getPublisherIdAttribute(int $id)
    {
        return Publisher::findOrFail($id)?->name;
    }

    public function getEditionIdAttribute(int $id)
    {
        return Edition::findOrFail($id)?->name;
    }

    public function getCategoryIdAttribute(int $id)
    {
        return Category::findOrFail($id)?->name;
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_book');
    }

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'author_book');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }

    public function publishers(): BelongsToMany
    {
        return $this->belongsToMany(Publisher::class);
    }

    public function editions(): HasMany
    {
        return $this->hasMany(Edition::class);
    }
}
