<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Kelas extends Model
{
    use HasUuids;
    protected $table = 'kelas';
    protected $guarded = ['id'];
}
