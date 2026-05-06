<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileStatusHistory extends Model
{
    protected $fillable = ['file_id', 'status', 'notes', 'date', 'user_id'];

    public function file()
    {
        return $this->belongsTo(File::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
