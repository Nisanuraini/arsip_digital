<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archives extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function files()
    {
        return $this->hasMany(ArchiveFile::class);
    }

    public function tags()
    {
    return $this->belongsToMany(Tag::class, 'archive_tag', 'archive_id', 'tag_id');
    }
}
