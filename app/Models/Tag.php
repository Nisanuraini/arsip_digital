<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function archives()
    {
    return $this->belongsToMany(Archive::class, 'archive_tag', 'tag_id', 'archive_id');
    }


}
