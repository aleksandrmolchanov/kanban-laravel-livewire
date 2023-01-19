<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sort', 'group_id'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
