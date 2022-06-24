<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\State;

class Company extends Model
{
    use HasFactory;

    protected $table = "companies";

     public function countryname()
    {
    	return $this->belongsTo(Country::class,'country_id');
    }

    public function statename()
    {
    	return $this->belongsTo(State::class,'state_id');
    }



}
