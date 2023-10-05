<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'timestamp',
        'forecast',
        'previous',
        'actual',
        'importance',
        'country_id',
        'title',
        'body',
        'description',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
