<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function reacties()
    {
        return $this->hasMany(Reactie::class)->orderBy('punten', 'desc');
    }
}
