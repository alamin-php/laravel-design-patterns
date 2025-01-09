<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $fillable = [
        'code',
        'name',
        'parent_id'
    ];

    public function parent(){
        return $this->belongsTo(ProductType::class, 'parent_id');
    }

    public function children(){
        return $this->hasMany(ProductType::class, 'parent_id');
    }
}
