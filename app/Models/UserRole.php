<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRole extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'kode_role',
        'jenis_role',
        
    ];

    public function User()
    {

        return $this->hasMany(User::class);
    }

    public function Product()
    {

        return $this->hasMany(Product::class);
    }

    public function Package()
    {

        return $this->hasMany(PackageIncome::class);
    }



}