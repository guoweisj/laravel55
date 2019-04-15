<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GoodsSku extends Model
{
    //
    protected $table = "jy_goods_sku";
    public $timestamps=false;

    public function getSpuHandle($goodsId)
    {
        $spu = self::select('*')
                ->leftJoin('jy_goods_attr','jy_goods_attr.id','=','jy_goods_sku.attr_id')
                ->where('input_type',GoodsAttr::INPUT_HANDLE)
                ->where('goods_id',$goodsId)
                ->get()
                ->toArray();
        return $spu;
    }
    //获取商品已经绑定的sku的属性
    public function getSkuList($goodsId)
    {
        $sku = self::select('*')
            ->leftJoin('jy_goods_attr','jy_goods_attr.id','=','jy_goods_sku.attr_id')
            ->where('input_type', GoodsAttr::INPUT_LIST)
            ->where('goods_id',$goodsId)
            ->get()
            ->toArray();

        return $sku;
    }
}
