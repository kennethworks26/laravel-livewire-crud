<?php

namespace App;

use App\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    protected $fillable = ['name', 'email', 'logo', 'website'];
    protected $appends = ['logo_url'];

    /**
     * Get the employees of the company
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function getLogoUrlAttribute()
    {
        return $this->logo
            ? Storage::url('logos/' . $this->logo)
            : asset('images/default-logo.png');
    }
}
