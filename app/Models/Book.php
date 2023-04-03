<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

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
}
