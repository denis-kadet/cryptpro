<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignsPathFile extends Model
{
    use HasFactory;

    protected $table = 'signs_path_file';

    protected $fillable = [
        'signs_uuid',
        'path_pdf_draft',
        'path_pdf_sign',
        'path_sig_file',
    ];
}
