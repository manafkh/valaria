<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','user_id','style_id','project_name','project_description','project_address','files','links','budget_range'];


    public function files(){
        return $this->hasMany(File::class);
    }
    public function references(){
        return $this->hasMany(Reference::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
