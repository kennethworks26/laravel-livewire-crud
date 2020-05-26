<?php

namespace App;

use App\Company;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['first_name', 'last_name', 'company_id', 'email', 'phone'];

    /**
    * Get the company of an employee
    */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
