<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'parent_id'
    ];

    public function styles(){
        return $this->belongsToMany(Style::class,'category_styles','category_id','style_id');
    }
    public function categoryDetails(){
        return $this->hasOne(CategoryDetails::class);
    }
}
