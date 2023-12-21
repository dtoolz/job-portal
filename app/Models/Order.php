<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function rCompany()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function rPackage()
    {
        return $this->belongsTo(PricingPackage::class, 'package_id');
    }
}
