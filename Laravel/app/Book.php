<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';
    protected $primaryKey = 'isbn';
    protected $fillable = ['isbn', 'title', 'author', 'publisher', 'description', 'cover', 'category_id'];
}
