<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>微信支付</title>
    <style>
        .wenx_xx {
            text-align: center;
            font-size: 16px;
            padding: 18px 0;
         }
         .wenx_xx .wxzf_price {
            font-size: 45px;
        }
        .skf_xinf {
            height: 100px
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            line-height: 43px;
            background: #FFF;
            font-size: 12px;
           
        }
        .all_w {
            width: 91.3%;
            margin: 0 auto;
        }
        .skf_xinf .bt {
            color: #767676;
            display: block;
            float: left;
        }
        .fr {
            float: right;
        }
        .ljzf_but {
            border-radius: 3px;
            height: 45px;
            line-height: 45px;
            background: #44bf16;
            display: block;
            text-align: center;
            font-size: 16px;
            margin-top: 14px;
            color: #fff;
            border: none;
        }
        .clearfix{
            clear:both;
        }
    </style>
    <script type="text/javascript">
        //调用微信JS api 支付
        function jsApiCall()
        {
            WeixinJSBridge.invoke(
                    'getBrandWCPayRequest',
                    {!! $json !!},
        function(res){
            WeixinJSBridge.log(res.err_msg);
            //alert(res.err_code+res.err_desc+res.err_msg);
            if(res.err_msg == "get_brand_wcpay_request:ok" ) {
                    location.href = '{{$target_url}}'+'?pay_status=success';
            }else if(res.err_msg == "get_brand_wcpay_request:cancel"){
                    //取消支付
                location.href = '{{$target_url}}'+'?pay_status=cancel';
            }

            }
        );
        }

        function callpay()
        {
            if (typeof WeixinJSBridge == "undefined"){
                if( document.addEventListener ){
                    document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
                }else if (document.attachEvent){
                    document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                    document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                }
            }else{
                jsApiCall();
            }
        }
    </script>

</head>
<body>
<br/>
<div class="wenx_xx">
  <div class="mz">{{$company_name}}</div>
  <div class="wxzf_price">￥{{$price/100}}</div>
</div>
<div class="skf_xinf">
  <div class="all_w"> 
    <span class="bt">收款方</span> <span class="fr">{{$company_name}}</span> 
    <div class="clearfix"></div>
    <span class="bt">商品名称</span> <span class="fr">{{$goods_name}}</span> 
  </div>
  
</div>
<div align="center">
    <button  class="ljzf_but all_w" type="button" onclick="callpay()" >立即支付</button>
</div>
</body>
</html>