<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Store extends Model
{
    use HasFactory, Sortable;

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function favorited_users() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    const DAY_OF_WEEK = ['日','月','火','水','木','金','土'];

    public function setHolidayAttribute($holidays)
    {
        $results = [];
        foreach($holidays as $holiday){
            $results[] = Store::DAY_OF_WEEK[$holiday];
        }            
        $this->attributes['holiday'] = implode(",",$results);
    }

}

