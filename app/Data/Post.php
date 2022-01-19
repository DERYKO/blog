<?php

namespace App\Data;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'publication_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPublicationDateAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

}
