<?php

namespace App\Study;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;

class BsBonus extends Model
{
    //
    protected $table = "bs_bonus";
    public static  function getBounsInfo($id)
    {
        $bouns=self::where('id',$id)->first();
        return
    }
}
