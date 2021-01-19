<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','style_id','project_address','phone','email','project_description'];


    public function files(){
        return $this->hasMany(File::class);
    }
    public function references(){
        return $this->hasMany(Reference::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
