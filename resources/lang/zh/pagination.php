<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Pagination Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the paginator library to build
    | the simple pagination links. You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */

    'previous' => '&laquo; 上一页',
    'next'     => '下一页 &raquo;',
    'i18n'     => json_encode([
        "sProcessing"   =>    "<img src='/backend/img/loading.gif'/> 玩命加载中...",
        "sLengthMenu"   =>    "显示 _MENU_ 项结果",
        "sZeroRecords"  =>   "没有匹配结果",
        "sInfo"     =>          "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
        "sInfoEmpty"    =>     "显示第 0 至 0 项结果，共 0 项",
        "sInfoFiltered"     =>  "(由 _MAX_ 项结果过滤)",
        "sInfoPostFix"  =>   "",
        "sSearch"   =>        "搜索:",
        "sUrl"  =>           "",
        "sEmptyTable"   =>      "暂无符合数据",
        "sLoadingRecords"   =>  "玩命载入中...",
        "sInfoThousands"    =>   ",",
        "oPaginate"     =>  [
            "sFirst"    =>     "首页",
            "sPrevious"     =>  "上页",
            "sNext"     =>      "下页",
            "sLast"     =>      "末页"
        ],
        "oAria" => [
            "sSortAscending"=>  ": 以升序排列此列",
            "sSortDescending"=> ": 以降序排列此列"
        ]
    ]),

];
