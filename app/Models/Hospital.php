<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $primaryKey = 'hospital_id'; // Sesuaikan dengan nama primary key yang sesuai

    // Atau jika primary key menggunakan nama default 'id', maka tidak perlu menetapkan secara eksplisit

    // Secara opsional, tambahkan jika Anda ingin Eloquent mengatur timestamp secara otomatis
    public $timestamps = false;

    // Definisikan atribut yang dapat diisi secara massal (mass-assignment)
    protected $fillable = [
        'name',
        'bed_count',
        'patient_out',
        'care_days',
        'days_in_care',
        'bor',
        'bto',
        'toi',
        'alos',
    ];
}
