<?php


use App\Models\CategoryDetails;
use Illuminate\Support\Str;

function getTranslatedName($id){
    $local = \Illuminate\Support\Facades\App::currentLocale();
    return ucwords(CategoryDetails::find($id)->translate($local)->name);
}
function isArabic(){
    if (\Illuminate\Support\Facades\App::currentLocale()=='ar')
        return true;
    return false;
}
