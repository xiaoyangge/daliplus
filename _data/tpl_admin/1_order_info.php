<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("nopadding","true"); ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-body">
		<table class="layui-table">
		<tr>
			<td width="20%" align="right" height="25">订单编号：</td>
			<td width="30%"><?php echo $rs['sn'];?></td>
			<td width="20%" align="right">下单时间：</td>
			<td><?php echo time_format($rs['addtime']);?></td>
		</tr>
		<tr>
			<td align="right" height="25">总金额：</td>
			<td class="red"><?php echo price_format($rs['price'],$rs['currency_id'],$rs['currency_id']);?></td>
			<td align="right">订单状态：</td>
			<td class="darkblue"><?php echo $rs['status_title'];?></td>
		</tr>
		<tr>
			<td align="right" height="25">已支付：</td>
			<td class="darkblue"><?php echo price_format($paid_price,$rs['currency_id'],$rs['currency_id']);?></td>
			<td align="right">未支付：</td>
			<td class="red"><?php echo price_format($unpaid_price,$rs['currency_id'],$rs['currency_id']);?></td>
		</tr>
		<tr>
			<td align="right" height="25"><?php echo P_Lang("邮箱：");?></td>
			<td class="darkblue"><span><?php echo $rs['email'];?></span></td>
			<td align="right"><?php echo P_Lang("手机：");?></td>
			<td class="darkblue"><span><?php echo $rs['mobile'];?></span></td>
		</tr>
		<?php if($rs['ext']){ ?>
		<tr>
			<?php $tmpid["num"] = 0;$rs['ext']=is_array($rs['ext']) ? $rs['ext'] : array();$tmpid = array();$tmpid["total"] = count($rs['ext']);$tmpid["index"] = -1;foreach($rs['ext'] as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			<td align="right" height="25"><?php echo $key;?>：</td>
			<td<?php if($tmpid['total']%2 != '' && $tmpid['num'] == $tmpid['total']){ ?> colspan="3"<?php } ?> style="line-height:25px;"><?php echo $value;?></td>
				<?php if($tmpid['num']%2 == '' && $tmpid['num'] != $tmpid['total']){ ?>
				</tr><tr>
				<?php } ?>
			<?php } ?>
		</tr>
		<?php } ?>
		<?php if($user){ ?>
		<tr>
			<td class="darkblue" style="line-height:25px;text-align:right;">会员：</td>
			<td class="darkblue" colspan="3" style="line-height:25px;"><?php echo $user['user'];?>
				<?php if($user['mobile']){ ?><?php echo P_Lang("，");?><?php echo P_Lang("手机号：");?><?php echo $user['mobile'];?><?php } ?>
				<?php if($user['email']){ ?><?php echo P_Lang("，");?><?php echo P_Lang("邮箱：");?><?php echo $user['email'];?><?php } ?>
				，注册时间：<?php echo time_format($user['regtime']);?>
			</td>
		</tr>
		<?php } ?>
		<?php if($rs['note']){ ?>
		<tr>
			<td style="line-height:25px;text-align:right">备注：</td>
			<td colspan="3"><?php echo $rs['note'];?></td>
		</tr>
		<?php } ?>
		</table>
		<?php if($shipping){ ?>
		<table class="layui-table">
		<thead>
		<tr>
			<th colspan="3"><?php echo P_Lang("收件人信息");?></th>
		</tr>
		</thead>
		<tr>
			<td>
				<?php echo $shipping['fullname'];?>
				<?php if($shipping['mobile']){ ?>
				/ <?php echo P_Lang("手机号");?> <?php echo $shipping['mobile'];?>
				<?php } ?>
				<?php if($shipping['tel']){ ?>
				/ <?php echo P_Lang("电话");?> <?php echo $shipping['tel'];?>
				<?php } ?>
				<?php if($shipping['email']){ ?>
				/ <?php echo P_Lang("Email");?> <?php echo $shipping['email'];?>
				<?php } ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php if($shipping['country'] != '中国'){ ?><?php echo $shipping['country'];?> / <?php } ?>
				<?php echo $shipping['province'];?>
				<?php if($shipping['city']){ ?>
				<?php echo $shipping['city'];?>
				<?php } ?>
				<?php if($shipping['county']){ ?>
				<?php echo $shipping['county'];?>
				<?php } ?>
				<?php echo $shipping['address'];?>
				<?php if($shipping['zipcode']){ ?>
				/ <?php echo P_Lang("邮编");?> <?php echo $shipping['zipcode'];?>
				<?php } ?>
			</td>
		</tr>
		</table>
		<?php } ?>
		
		<table class="layui-table">
		<thead>
		<tr>
			<th width="120"><?php echo P_Lang("产品图片");?></th>
			<th><?php echo P_Lang("产品名称");?></th>
			<th><?php echo P_Lang("产品价格");?></th>
			<th><?php echo P_Lang("数量");?></th>
		</tr>
		</thead>
		<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
		<tr>
			<td class="center"><img src="<?php echo $value['thumb'] ? $value['thumb'] : 'images/picture_default.png';?>" width="80px" height="80px" border="0" /></td>
			<td>
				<div style="font-size:14px;"><?php echo $value['title'];?></div>
				<?php $tmpid2["num"] = 0;$value['ext']=is_array($value['ext']) ? $value['ext'] : array();$tmpid2 = array();$tmpid2["total"] = count($value['ext']);$tmpid2["index"] = -1;foreach($value['ext'] as $k=>$v){ $tmpid2["num"]++;$tmpid2["index"]++; ?>
				<div class="gray"><?php echo $v['title'];?>：<?php echo $v['content'];?></div>
				<?php } ?>
				<?php if($value['weight']){ ?><div class="gray"><?php echo P_Lang("重量：");?><?php echo $value['weight'];?>Kg</div><?php } ?>
				<?php if($value['volume']){ ?><div class="gray"><?php echo P_Lang("体积：");?><?php echo $value['volume'];?>M<sup>3</sup></div><?php } ?>
				<?php if($value['note']){ ?><div class="gray"><?php echo P_Lang("备注：");?><?php echo $value['note'];?></div><?php } ?>
			</td>
			<td><?php echo price_format($value['price'],$rs['currency_id'],$rs['currency_id']);?></td>
			<td><?php echo $value['qty'];?> <?php echo $value['unit'];?></td>
		</tr>
		<?php } ?>
		</table>
		<?php if($paylist){ ?>
		<table class="layui-table">
		<thead>
		<tr>
			<th class="lft">支付方法</th>
			<th class="lft">金额</th>
			<th>时间</th>
			<th>其他</th>
		</tr>
		</thead>
		<?php $tmpid["num"] = 0;$paylist=is_array($paylist) ? $paylist : array();$tmpid = array();$tmpid["total"] = count($paylist);$tmpid["index"] = -1;foreach($paylist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<tr>
			<td><?php echo $value['title'];?></td>
			<td><?php echo price_format($value['price'],$rs['currency_id'],$rs['currency_id']);?></td>
			<td class="center">
				<?php if($value['startdate']){ ?><div>始：<?php echo time_format($value['startdate']);?></div><?php } ?>
				<?php if($value['dateline']){ ?><div>结：<?php echo time_format($value['dateline']);?></div><?php } ?>
			</td>
			<td>
				<?php if(is_array($value['ext'])){ ?>
				<?php $tmpid2["num"] = 0;$value['ext']=is_array($value['ext']) ? $value['ext'] : array();$tmpid2 = array();$tmpid2["total"] = count($value['ext']);$tmpid2["index"] = -1;foreach($value['ext'] as $k=>$v){ $tmpid2["num"]++;$tmpid2["index"]++; ?>
				<div><?php echo $k;?>：<?php echo $v;?></div>
				<?php } ?>
				<?php } else { ?>
				<?php echo $value['ext'];?>
				<?php } ?>
			</td>
		</tr>
		<?php } ?>
		</table>
		<?php } ?>
		<?php if($loglist){ ?>
		<table class="layui-table">
		<thead>
		<tr>
			<th>日志时间</th>
			<th class="lft">日志内容</th>
			<th>操作人</th>
		</tr>
		</thead>
		<?php $loglist_id["num"] = 0;$loglist=is_array($loglist) ? $loglist : array();$loglist_id = array();$loglist_id["total"] = count($loglist);$loglist_id["index"] = -1;foreach($loglist as $key=>$value){ $loglist_id["num"]++;$loglist_id["index"]++; ?>
		<tr>
			<td class="center"><?php echo date('Y-m-d H:i:s',$value['addtime']);?></td>
			<td><?php echo $value['note'];?></td>
			<td class="center"><?php echo $value['who'];?></td>
		</tr>
		<?php } ?>
		</table>
		<?php } ?>
		<div>
			<input id="order_url" class="layui-input" value="<?php echo $sys['url'];?><?php echo $sys['www_file'];?>?<?php echo $sys['ctrl_id'];?>=order&<?php echo $sys['func_id'];?>=info&sn=<?php echo $rs['sn'];?>&passwd=<?php echo $rs['passwd'];?>" />
			<div class="layui-btn-group" style="margin-top:10px;">
				<input type="button" value="<?php echo P_Lang("复制");?>" data-clipboard-text="<?php echo $sys['url'];?><?php echo $sys['www_file'];?>?<?php echo $sys['ctrl_id'];?>=order&<?php echo $sys['func_id'];?>=info&sn=<?php echo $rs['sn'];?>&passwd=<?php echo $rs['passwd'];?>" class="layui-btn phpok-copy" />
				<input type="button" value="<?php echo P_Lang("访问");?>" onclick="window.open($('#order_url').val())" class="layui-btn" />
			</div>
		</div>
	</div>
</div>
<?php $this->output("foot_lay","file",true,false); ?>