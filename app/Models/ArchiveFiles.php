<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchiveFiles extends Model
{
    use HasFactory;

    protected $fillable = ['archive_id', 'file_path'];

    public function archive()
    {
        return $this->belongsTo(Archive::class);
    }
}
