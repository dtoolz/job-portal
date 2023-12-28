<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    use HasFactory;

    public function rJob()
    {
        return $this->hasMany(Job::class);
    }

    public function rCompanyIndustry()
    {
        return $this->belongsTo(CompanyIndustry::class, 'company_industry_id');
    }

    public function rCompanyLocation()
    {
        return $this->belongsTo(CompanyLocation::class, 'company_location_id');
    }

    public function rCompanySize()
    {
        return $this->belongsTo(CompanySize::class, 'company_size_id');
    }
}
