<?php

namespace App;

use App\Company;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
    * Get the company of an employee
    */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
