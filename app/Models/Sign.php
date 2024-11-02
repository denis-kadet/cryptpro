<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sign extends Model
{
    use HasFactory, HasUuids;
    
    // Переопределение автоикремента на uuid
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'uuid',
        'request_id',
        'status_id',
        'name_org',
        'city',
        'surname',
        'name',
        'middle_name',
        'work_date',
        'work_position',
        'work_department',
        'place_requirement',
        'full_name_hr',
    ];

    protected $cast = ['work_date'=> 'datetime:d.m.Y'];
}
