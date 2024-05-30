<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Caste extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'religion_id',
    ];

    public function religion()
    {
        return $this->belongsTo(Religion::class)->withTrashed();
    }

    public function sub_castes()
    {
        return $this->hasmany(SubCaste::class)->withTrashed();
    }

    public function spiritual_backgrounds()
    {
        return $this->hasmany(SpiritualBackground::class)->withTrashed();
    }
}