<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Rules\ZipCodeRule;

class Contact extends Model
{
    use HasFactory;

    protected $fillable =['fullname', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion'];


    public static function getDate($from, $until)
    {
        //created_atが20xx/xx/xx ~ 20xx/xx/xxのデータを取得
        $item = Contact::whereBetween("created_at", [$from, $until])->get();

        return $item;
    }

}



