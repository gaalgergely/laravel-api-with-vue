<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Contact extends Model
{
    use Searchable;

    protected $guarded = [];

    protected $dates = ['birthday'];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function path()
    {
        return '/contacts/' . $this->id;
    }

    public function scopeBirthdays($query)
    {
        return $query->whereRaw('birthday LIKE "%-' . now()->format('m') . '-%"');
    }

    public function setBirthdayAttribute($birthday)
    {
        $this->attributes['birthday'] = Carbon::parse($birthday);
    }
}
