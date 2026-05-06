<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class File extends Model
{
    protected $fillable = [
        'file_no',
        'reg_no',
        'patient_name',
        'unit',
        'wing',
        'status',
    ];


    public function statusHistories()
    {
        return $this->hasMany(FileStatusHistory::class)->latest();
    }
    public function statusLatest()
    {
        $history = FileStatusHistory::where('file_id', $this->id)->latest()->first();
        return $history;
    }

    protected static function booted()
    {
        static::creating(function ($file) {
            if (empty($file->file_no)) {
                $file->file_no = static::generateFileNo();
            }
        });
    }

    public static function generateFileNo()
    {
        $year = date('Y');
        $lastFile = static::where('file_no', 'like', $year . '-%')
            ->orderBy('file_no', 'desc')
            ->first();
        
        $number = 1;
        if ($lastFile && preg_match('/-(\d+)$/', $lastFile->file_no, $matches)) {
            $number = (int) $matches[1] + 1;
        }

        return sprintf('%s-%04d', $year, $number);
    }
}
