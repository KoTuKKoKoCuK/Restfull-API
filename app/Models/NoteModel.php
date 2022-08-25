<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoteModel extends Model
{
    protected $table="notefield";
    public $timestamps = false;
    protected $fillable=
    [
        'surname',
        'name',
        'patronymic',
        'company',
        'tel_number',
        'email_adress',
        'birthday',
        'person_image',
    ];
}
