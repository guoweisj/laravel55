<?php

namespace App\Http\Controllers\Study;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BonusController extends Controller
{
    //
    public  function index(){

    }
    public function getBouns(Request $request)
    {
        $params=$request->all();
        $return=[
            'code'=>2000,
            'msg'=>'获取成功',
            'data'=>[]
        ];
        if(!isset($params['user_id'])||empty($params['user_id'])){
            $return=[
                'code'=>4001,
                'msg'=>'用户未登录',
                'data'=>[]
            ];
            return json_encode($return);
        }
        if(!isset($params['bouns_id'])||empty($params['bouns_id'])){
            $return=[
                'code'=>4002,
                'msg'=>'请选择红包',
                'data'=>[]
            ];
            return json_encode($return);
        }



        return json_encode($return);
    }
}
