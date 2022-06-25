<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Employe extends Model
{
    use HasFactory;

    public function CompanyName()
    {
    	return $this->belongsTo(Company::class,'company_id');
    }

}
