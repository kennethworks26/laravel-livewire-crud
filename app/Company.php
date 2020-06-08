<?php

namespace App;

use App\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    protected $guarded = [];
    protected $appends = ['logo_url'];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%' . $query . '%')
            ->orWhere('email', 'like', '%' . $query . '%');
    }

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
            : asset('images/default-logo.jpg');
    }

    public function getEmployeesCountAttribute()
    {
        return count($this->employees);
    }
}
