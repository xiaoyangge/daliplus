<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("title","结算信息 - 购物车"); ?><?php $this->output("header","file",true,false); ?>
<script type="text/javascript">
var user_id = '<?php echo $session['user_id'] ? $session['user_id'] : 0;?>';
function check_it()
{
	var act = $.dialog.tips('正在创建订单，请稍候…',100);
	$("#saveorder").ajaxSubmit({
		'url':api_url('order','create'),
		'type':'post',
		'dataType':'json',
		'success':function(rs){
			if(rs.status){
				act.content('订单创建成功，订单号是：'+rs.info.sn);
				var ext = parseInt(user_id) > 0 ? 'id='+rs.info.id : 'sn='+rs.info.sn+"&passwd="+rs.info.passwd;
				var payment = $("input[name=payment]:checked").val();
				if(payment){
					ext += '&payment='+payment.toString();
					$("input[data-name=integral]").each(function(i){
						var name = $(this).attr('data-key');
						var val = $(this).val();
						if(parseInt(val) > 0){
							ext += "&integral_val["+name+"]="+val;
						}
					});
					url = get_url('payment','create',ext);
					$.phpok.go(url);
					return true;
				}
				var url = get_url('order','payment',ext);
				$.phpok.go(url);
				return true;
			}
			act.close();
			$.dialog.alert(rs.info);
			return false;
		}
	});
	return false;
}
function load_freight()
{
	$("#shipping_price").html('0.00');
	var id = new Array();
	$("input[data-name=product]").each(function(i){
		id.push($(this).val());
	});
	var url = api_url('cart','pricelist','ids='+id.join(","));
	if($("input[name=address_id]").length > 0){
		var address_id = $("input[name=address_id]:checked").val();
		if(address_id){
			url += "&address_id="+address_id;
		}
	}else{
		var province = $("#pca_p").val();
		var city = $("#pca_c").val();
		if(province && !city){
			url += "&province="+$.str.encode(province)+"&city="+$.str.encode(city);
		}
	}
	$.phpok.json(url,function(rs){
		if(rs.status){
			$("#shipping_price").html(rs.info.shipping);
			$("#all_price").html(rs.info.all);
			return true;
		}
		$.dialog.alert(rs.info);
		return false;
	})
}
function update_coupon()
{
	var code = $("#coupon").val();
	if(!code){
		$.dialog.alert('优惠码不能为空');
		return false;
	}
	var url = api_url('coupon','use','code='+$.str.encode(code));
	var tip = $.dialog.tips('正在检测优惠码，请稍候…',100).lock();
	$.phpok.json(url,function(rs){
		tip.close();
		if(!rs.status){
			$.dialog.alert(rs.info);
			return false;
		}
		$.dialog.tips('请稍候，正在刷新页面…',function(){
			$.phpok.reload();
		}).lock().time(2);
		return true;
	})
}
</script>
<div class="main">
	<?php $this->output("block/breadcrumb","file",true,false); ?>
	<form method="post" id="saveorder" onsubmit="return check_it()" class="am-form am-form-horizontal">
	<input type="hidden" name="is_virtual" id="is_virtual" value="<?php echo $is_virtual ? 1 : 0;?>" />
	<div class="am-panel-group">
		<?php if(!$session['user_id']){ ?>
		<div class="am-panel am-panel-default">
			<div class="am-panel-bd am-text am-text-center" style="padding:20px;">
				<strong class="red">友情提示：</strong>我们强烈建议成为我们的会员再下单<br /><br />
				<div class="am-g">
					<input type="button" value="您还未登录，请先登录" onclick="$.user.login()" class="am-btn am-btn-secondary am-btn-xs" />
					<a href="<?php echo phpok_url(array('ctrl'=>'register'));?>" target="_blank" class="am-btn am-btn-default am-btn-xs">还没有注册，请先注册</a>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php if($is_virtual){ ?>
		<div class="am-panel am-panel-default">
			<div class="am-panel-hd">收件人信息</div>
			<div class="am-panel-bd">
				<div class="am-form-group">
					<label for="email" class="am-u-sm-2 am-form-label">Email</label>
					<div class="am-u-sm-10">
						<input type="email" id="email" name="email" placeholder="输入你的电子邮件" value="<?php echo $address['email'];?>"/>
					</div>
				</div>
				<div class="am-form-group">
					<label for="mobile" class="am-u-sm-2 am-form-label">手机号</label>
					<div class="am-u-sm-10">
						<input type="tel" id="mobile" name="mobile" placeholder="填写手机号" value="<?php echo $address['mobile'];?>"/>
					</div>
				</div>
			</div>
		</div>
		<?php } else { ?>
			<?php $this->output("block/cart_checkout_address","file",true,false); ?>
		<?php } ?>
		<div class="am-panel am-panel-default">
			<div class="am-panel-hd">产品信息</div>
			<table class="am-table am-table-centered">
				<thead>
					<tr>
						<th>图片</th>
						<th class="am-text-left">名称</th>
						<th width="80px">数量</th>
						<th>售价</th>
					</tr>
				</thead>
				<tbody>
					<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<tr>
						<td><input type="hidden" name="id[]" data-name="product" value="<?php echo $value['id'];?>" /><img src="<?php echo $value['thumb'] ? $value['thumb'] : 'tpl/www/images/nopic.png';?>" width="80px" border="0" alt="<?php echo $value['title'];?>" /></td>
						<td class="am-text-left">
							<div><b><?php echo $value['title'];?></b></div>
							<?php $tmpid["num"] = 0;$value['_attrlist']=is_array($value['_attrlist']) ? $value['_attrlist'] : array();$tmpid = array();$tmpid["total"] = count($value['_attrlist']);$tmpid["index"] = -1;foreach($value['_attrlist'] as $k=>$v){ $tmpid["num"]++;$tmpid["index"]++; ?>
							<div><?php echo $v['title'];?>：<?php echo $v['content'];?></div>
							<?php } ?>
							<div>单价：<?php echo price_format($value['price'],$value['currency_id']);?></div>
						</td>
						<td><?php echo $value['qty'];?></td>
						<td class="am-text-danger"><?php echo price_format($value['price']*$value['qty'],$value['currency_id']);?></td>
					</tr>
					<?php } ?>
					<?php $tmpid["num"] = 0;$pricelist=is_array($pricelist) ? $pricelist : array();$tmpid = array();$tmpid["total"] = count($pricelist);$tmpid["index"] = -1;foreach($pricelist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<tr>
						<td colspan="3" class="am-text-right">
							<input type="hidden" name="ext_price[<?php echo $value['identifier'];?>]" id="ext_price_<?php echo $value['identifier'];?>" value="" />
							<?php echo $value['title'];?>：</td>
						<td id="<?php echo $value['identifier'];?>_price" class="am-text-danger am-text-left"><?php echo $value['price'];?></td>
					</tr>
					<?php } ?>
					<tr>
						<td colspan="3" class="am-text-right">
							总价：</td>
						<td id="all_price" class="am-text-danger am-text-left"><?php echo $price;?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="am-panel am-panel-default">
			<div class="am-panel-hd">优惠码</div>
			<div class="am-panel-bd">
				<div class="am-g am-g-collapse">
					<div class="am-u-sm-2"><input type="text" name="coupon" id="coupon" value="<?php echo $coupon_code;?>" /></div>
					<div class="am-u-sm-1"><input type="button" value="提交优惠码" onclick="update_coupon()" /></div>
					<div class="am-u-sm-8" id="coupon_tips"></div>
				</div>
			</div>
		</div>
		<div class="am-panel am-panel-default">
			<div class="am-panel-hd">留言，填写您对购买的商品特别要求，不能超过80字</div>
			<div class="am-panel-bd">
				<textarea name="note" id="note" style="resize:none;"></textarea>
			</div>
		</div>
		<?php if($integral){ ?>
		<div class="am-panel am-panel-default">
			<div class="am-panel-hd">积分抵扣，仅支持100的整数倍，不支持小数</div>
			<ul class="am-list am-list-static">
				<?php $integral_id["num"] = 0;$integral=is_array($integral) ? $integral : array();$integral_id = array();$integral_id["total"] = count($integral);$integral_id["index"] = -1;foreach($integral as $key=>$value){ $integral_id["num"]++;$integral_id["index"]++; ?>
			    <li>
				    <div class="am-g">
					    <div class="am-u-sm-9" style="margin-top:9px;">您当前的 <span class="am-text-danger"><?php echo $value['title'];?></span> 有 <span class="am-text-danger"><?php echo $value['val'];?></span><?php echo $value['unit'];?>，最多可抵现金<span class="red"><?php echo price_format($value['price']);?></span></div>
					    <div class="am-u-sm-2">
						    <table>
						    	<tr>
						    		<td style="width:50px;text-align:right;">支出：</td>
						    		<td><input type="text" name="integral_val[<?php echo $key;?>]" data-name="integral" data-key="<?php echo $key;?>" /></td>
						    		<td>&nbsp;<?php echo $value['unit'];?></td>
						    	</tr>
						    </table>
						    
						    
					    </div>
				    </div>
			    </li>
			    <?php } ?>
			</ul>
		</div>
		<?php } ?>
		<?php if($paylist || $balance){ ?>
		<div class="am-panel">
			<div class="am-panel-bd">
				<div class="am-tabs" data-am-tabs>
					<ul class="am-tabs-nav am-nav am-nav-tabs">
						<li style="line-height:1.6;padding:0.4rem 1rem;">请选择支付方式：</li>
						<?php $tmpid["num"] = 0;$paylist=is_array($paylist) ? $paylist : array();$tmpid = array();$tmpid["total"] = count($paylist);$tmpid["index"] = -1;foreach($paylist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
						<li<?php if(!$tmpid['index']){ ?> class="am-active"<?php } ?>><a href="javascript:void(0);"><?php echo $value['title'];?></a></li>
						<?php } ?>
						<?php if($balance){ ?>
						<li<?php if(!$paylist){ ?> class="am-active"<?php } ?>><a href="javascript:void(0);">余额支付</a></li>
						<?php } ?>
					</ul>
					<div class="am-tabs-bd">
						<?php $tmpid["num"] = 0;$paylist=is_array($paylist) ? $paylist : array();$tmpid = array();$tmpid["total"] = count($paylist);$tmpid["index"] = -1;foreach($paylist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
						<div class="am-tab-panel am-fade<?php if(!$tmpid['index']){ ?> am-in am-active<?php } ?>">
							<?php $idxx["num"] = 0;$value['paylist']=is_array($value['paylist']) ? $value['paylist'] : array();$idxx = array();$idxx["total"] = count($value['paylist']);$idxx["index"] = -1;foreach($value['paylist'] as $k=>$v){ $idxx["num"]++;$idxx["index"]++; ?>
							<div class="am-radio">
								<label><input type="radio" name="payment" value="<?php echo $v['id'];?>"<?php if(!$tmpid['index'] && !$idxx['index']){ ?> checked<?php } ?>/><?php echo $v['title'];?></label>
							</div>
							<?php } ?>
						</div>
						<?php } ?>
						<div class="am-tab-panel am-fade">
							<?php $balance_id["num"] = 0;$balance=is_array($balance) ? $balance : array();$balance_id = array();$balance_id["total"] = count($balance);$balance_id["index"] = -1;foreach($balance as $key=>$value){ $balance_id["num"]++;$balance_id["index"]++; ?>
							<div class="am-radio">
								<label><input name="payment" type="radio" value="<?php echo $value['identifier'];?>" data-price="<?php echo $price_val;?>" data-balance="<?php echo $value['price'];?>" />您当前的<?php echo $value['title'];?>有<span class="red"><?php echo $value['val'];?></span><?php echo $value['unit'];?>
								<?php if($price_val > $value['price']){ ?>
								，您的余额不够，请 <a href="<?php echo phpok_url(array('ctrl'=>'payment','id'=>$value['id']));?>" target="_blank"><b>在线充值</b></a>
								<?php } ?>
								</label>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	<div class="am-g am-g-collapse">
		<div class="am-u-sm-6"></div>
		<div class="am-u-sm-6"><input type="submit" value="提交订单" class="am-btn am-btn-primary am-fr" /></div>
	</div>
	</form>
</div>
<?php $this->output("footer","file",true,false); ?>