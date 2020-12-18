<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDetails extends Model
{
    use HasFactory;
    protected $fillable =[
        'category_id',
        'name',
        'description',
        'hasStyles'
    ];



    public function styles(){
        return $this->hasMany(Style::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}