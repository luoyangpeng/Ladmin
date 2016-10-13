<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>打赏</title>
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="/front/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="/front/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="/front/assets/css/style.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<script src="/front/assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
</head>
<style>
	.masking {
		position: fixed;
		width: 100%;
		height: 100%;
		top:0;
		left: 0;
		background-color: #000;
		opacity: 0.8;
		filter: alpha(opacity=80);
		z-index: 1;
	}
	.box{
		position: absolute;
		top:20%;
		width: 99%;
	}
	.money_title{
		font-size:16px;
		line-height: 50px;
		border-bottom: 1px solid #d2d2d2;
	}

	.reward_box{
		position: relative;
		padding: 10px;
		border-radius: 5px;
		z-index:8888;
		background-color: #e2e2e2;
		width: 300px;
		height: 300px;
		margin:0 auto;

	}
	.input_money{
		margin-top: 10px;
		margin-bottom:25px;
	}
	.mark_btn{
		width: 100%;
		background: #0da3e2;
		line-height: 30px;
		color:#fff;
	}
	.money_btn{
		margin: 5px;
		width: 80px;
		background: #fff;
		color:#000

	}
	.blue_btn{
		color:#fff !important;
		background: #0da3e2 !important;
		margin: 5px;
		width: 80px;
	}
</style>
<body >

 	<div class="masking">

	</div>
	<div class="box">
		<div class="reward_box">
			<p class="money_title">打赏金额</p>

			<div class="money">
				<a class="btn money_btn click" data-money="1">1元</a>
				<a class="btn money_btn click" data-money="21">21元</a>
				<a class="btn money_btn click" data-money="66">66元</a>
				<a class="btn money_btn click" data-money="88">88元</a>
				<a class="btn money_btn click" data-money="188">188元</a>
				<a class="btn money_btn click" data-money="520">520元</a>
			</div>

			<div class="input_money">
				<input class="form-control" id="money" name="money" value="" placeholder="手动输入打赏金额">
			</div>
			<div align="center">
				<a  class="btn mark_btn" href="javascript:void(0)" onclick="reward()">赏了</a>
			</div>

		</div>
	</div>
<script>
	$(function(){
		$(".click").click(function(){
			$("#money").val($(this).attr('data-money'));
			$(".click").removeClass("blue_btn");
			$(this).addClass("blue_btn");

		})


	});
	function reward(){
		var price = $("#money").val();
		if(price){
			location.href = "/wechat/pay?price="+price*100;
		}else{
			location.href = "/wechat/pay";
		}

	}
</script>
</body>
</html>

