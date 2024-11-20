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
    protected $primaryKey = 'uuid';
    public $incrementing = false;

    protected $with = ['pathFile'];
    //TODO! Формат надо переделать на русский язык
    protected $casts = ['work_date' => 'date:j F Y'];

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

    public function pathFile()
    {
        return $this->hasOne(SignsPathFile::class, 'signs_uuid');
    }
}
