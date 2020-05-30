<?php

namespace App;

use App\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    protected $fillable = ['name', 'email', 'logo', 'website'];

    /**
     * Get the employees of the company
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function getCompanyImageAttribute()
    {
        return $this->logo
            ? Storage::disk('public')->url($this->logo)
            : asset('images/default-logo.png');
    }
}
