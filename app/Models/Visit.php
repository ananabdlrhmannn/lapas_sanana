<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'visitor_name',
        'nik',
        'phone',
        'email',
        'prisoner_name',
        'relationship',
        'visit_date',
        'session',
        'notes',
        'status',
    ];

    protected $casts = [
        'visit_date' => 'date',
    ];
       public function getWhatsappNumberAttribute(): string
    {
        $number = preg_replace('/\D+/', '', $this->phone ?? '') ?: '';

        if (str_starts_with($number, '0')) {
            return '62'.substr($number, 1);
        }

        if (str_starts_with($number, '8')) {
            return '62'.$number;
        }

        return $number;
    }
}