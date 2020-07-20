<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<script type="text/javascript" src="js/masonry-docs.min.js"></script>
<div class="layui-row layui-col-space15">
	<div class="layui-col-xs12 layui-col-sm6 layui-col-md4 prd">
		<div class="layui-card">
			<div class="layui-card-header">
				<?php echo P_Lang("会员基本信息");?>
			</div>
			<div class="layui-card-body">
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("会员ID");?>
					</label>
					<div class="layui-form-mid">
						<?php echo $rs['id'];?>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("账号");?>
					</label>
					<div class="layui-form-mid">
						<?php echo $rs['user'];?>
					</div>
				</div>
				<?php if($rs['avatar']){ ?>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("头像");?>
					</label>
					<div class="layui-form-mid">
						<img src="<?php echo $rs['avatar'];?>" style="width:50px;max-height:50px;" />
					</div>
				</div>
				<?php } ?>
				<?php if($rs['mobile']){ ?>
				
				
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("手机号");?>
					</label>
					<div class="layui-form-mid">
						<?php echo $rs['mobile'];?>
					</div>
				</div>
				<?php } ?>
				<?php if($rs['email']){ ?>
				
				
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("邮箱");?>
					</label>
					<div class="layui-form-mid">
						<?php echo $rs['email'];?>
					</div>
				</div>
				<?php } ?>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("状态");?>
					</label>
					<div class="layui-form-mid">
						<?php if($rs['status'] == 1){ ?>
						<span class="layui-bg-green"> <?php echo P_Lang("正常");?> </span>
						<?php }elseif($rs['status'] == 2){ ?>
						<span class="layui-bg-red"> <?php echo P_Lang("锁定");?> </span>
						<?php } else { ?>
						<span class="layui-bg-orange"> <?php echo P_Lang("等待审核");?> </span>
						<?php } ?>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("注册时间");?>
					</label>
					<div class="layui-form-mid">
						<?php echo date('Y-m-d H:i:s',$rs['regtime']);?>
					</div>
				</div>
				<?php if($rs['code']){ ?>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("邀请码");?>
					</label>
					<div class="layui-form-mid">
						<?php echo $rs['code'];?>
					</div>
				</div>
				<?php } ?>
				<?php if($relation){ ?>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("推荐人");?>
					</label>
					<div class="layui-form-mid">
						<?php echo $relation['user'];?>
						<input type="button" value="<?php echo P_Lang("查看");?>" onclick="$.win('<?php echo P_Lang("会员信息");?>_#<?php echo $relation['id'];?>','<?php echo phpok_url(array('ctrl'=>'user','func'=>'show','id'=>$relation['id']));?>')" class="layui-btn layui-btn-xs" />
					</div>
				</div>
				<?php } ?>
				<?php $tmpid["num"] = 0;$extlist=is_array($extlist) ? $extlist : array();$tmpid = array();$tmpid["total"] = count($extlist);$tmpid["index"] = -1;foreach($extlist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<?php if($value['content'] != ''){ ?>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo $value['title'];?>
					</label>
					<div class="layui-form-mid">
						<?php echo $value['content'];?>
					</div>
				</div>
				<?php } ?>
				<?php } ?>
				<div class="layui-form-item">
					<label class="layui-form-label">
						&nbsp;
					</label>
					<div class="layui-input-inline default-auto">
						<input type="button" value="<?php echo P_Lang("前台登录访问");?>" onclick="$.phpok.open('<?php echo phpok_url(array('ctrl'=>'user','f'=>'autologin','id'=>$rs['id']));?>')" class="layui-btn layui-btn-sm" />
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<?php if($wealth){ ?>
	
	
	<div class="layui-col-xs12 layui-col-sm6 layui-col-md4 prd">
		<div class="layui-card">
			<div class="layui-card-header">
				<?php echo P_Lang("会员财富");?>
			</div>
			<div class="layui-card-body">
				<?php $tmpid["num"] = 0;$wealth=is_array($wealth) ? $wealth : array();$tmpid = array();$tmpid["total"] = count($wealth);$tmpid["index"] = -1;foreach($wealth as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo $value['title'];?>
					</label>
					<div class="layui-form-mid">
						<?php echo $value['val'];?> <?php echo $value['unit'];?>
					</div>
					<div class="layui-input-inline auto gray lh38">
						<div class="layui-btn-group">
							<input type="button" value="编辑" onclick="$.admin_user.wealth_action('<?php echo $value['title'];?>','<?php echo $value['id'];?>','<?php echo $rs['id'];?>','<?php echo $value['unit'];?>')" class="layui-btn layui-btn-sm" />
							<input type="button" value="日志" onclick="$.admin_user.wealth_log('<?php echo $value['title'];?>','<?php echo $value['id'];?>','<?php echo $rs['id'];?>')" class="layui-btn layui-btn-sm" />
						</div>
					</div>
				</div>

				<?php } ?>
			</div>
		</div>
	</div>
	<?php } ?>
	<?php if($relation_count){ ?>
	<div class="layui-col-xs12 layui-col-sm6 layui-col-md4 prd">
		<div class="layui-card">
			<div class="layui-card-header">
				<?php echo P_Lang("我推荐的会员，共推荐了 [total] 人",array('total'=>'<span style="color:red">'.$relation_count.'</span>'));?>
			</div>
			<div class="layui-card-body">
				<table width="100%" class="layui-table" lay-size="sm">
				<thead>
				<tr>
					<th style="text-align:center;">ID</th>
					<th class="lft"><?php echo P_Lang("会员账号");?></th>
					<th class="lft"><?php echo P_Lang("会员组");?></th>
					<th width="120px"><?php echo P_Lang("注册时间");?></th>
				</tr>
				</thead>
				<?php $tmpid["num"] = 0;$rlist=is_array($rlist) ? $rlist : array();$tmpid = array();$tmpid["total"] = count($rlist);$tmpid["index"] = -1;foreach($rlist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<tr>
					<td align="center"><?php echo $value['id'];?></td>
					<td align="left"><?php echo $value['user'];?></td>
					<td align="left"><?php echo $value['group_title'];?></td>
					<td><?php echo date('Y-m-d H:i',$value['regtime']);?></td>
				</tr>
				<?php } ?>
				</table>
				<div align="center"><input type="button" class="layui-btn layui-btn-sm" value="<?php echo P_Lang("查看更多");?>" onclick="$.win('<?php echo P_Lang("推荐会员");?>_#<?php echo $rs['user'];?>','<?php echo phpok_url(array('ctrl'=>'user','func'=>'vouch','id'=>$rs['id']));?>')" /></div>
			</div>
		</div>
	</div>
	<div class="layui-col-xs12 layui-col-sm6 layui-col-md4 prd">
		<div class="layui-card">
			<div class="layui-card-header">
				<?php echo P_Lang("推荐人订单统计");?>
			</div>
			<div class="layui-card-body">
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("订单数量");?>
					</label>
					<div class="layui-form-mid red">
						<?php echo $relation_order_count ? $relation_order_count : '0';?>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("订单产品数");?>
					</label>
					<div class="layui-form-mid red">
						<?php echo $relation_product_count ? $relation_product_count : '0';?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<?php if($order_count){ ?>
	<div class="layui-col-xs12 layui-col-sm6 layui-col-md4 prd">
		<div class="layui-card">
			<div class="layui-card-header">
				<?php echo P_Lang("订单信息，订单数量：[total]，产品数量：[qty]",array('total'=>'<span style="color:red">'.$order_count.'</span>','qty'=>'<span style="color:red">'.$product_count.'</span>'));?>
			</div>
			<div class="layui-card-body">
				<table width="100%" class="layui-table" lay-size="sm">
				<thead>
				<tr>
					<th style="text-align:center;">ID</th>
					<th class="lft"><?php echo P_Lang("编号");?></th>
					<th><?php echo P_Lang("金额");?></th>
					<th width="120px"><?php echo P_Lang("下单时间");?></th>
				</tr>
				</thead>
				<?php $tmpid["num"] = 0;$olist=is_array($olist) ? $olist : array();$tmpid = array();$tmpid["total"] = count($olist);$tmpid["index"] = -1;foreach($olist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<tr>
					<td align="center"><?php echo $value['id'];?></td>
					<td align="left"><?php echo $value['sn'];?></td>
					<td align="left"><?php echo price_format($value['price'],$value['currency_id'],$value['currency_id']);?></td>
					<td><?php echo date('Y-m-d H:i',$value['addtime']);?></td>
				</tr>
				<?php } ?>
				</table>
				<div align="center"><input type="button" class="layui-btn layui-btn-sm" value="<?php echo P_Lang("查看更多");?>" onclick="$.win('<?php echo P_Lang("会员订单");?>_#<?php echo $rs['user'];?>','<?php echo phpok_url(array('ctrl'=>'order','keytype'=>'user','keywords'=>$rs['user']));?>')" /></div>
			</div>
		</div>
	</div>
	<?php } ?>
	<?php if($address_total){ ?>
	
	
	<div class="layui-col-xs12 layui-col-sm6 layui-col-md4 prd">
		<div class="layui-card">
			<div class="layui-card-header">
				<?php echo P_Lang("会员地址库");?>
			</div>
			<div class="layui-card-body">
				<table class="layui-table">
				<thead>
				<tr>
					<th><?php echo P_Lang("ID");?></th>
					<th><?php echo P_Lang("收件人");?></th>
					<th><?php echo P_Lang("联系方式");?></th>
				</tr>
				</thead>
				<tbody>
				<?php $tmpid["num"] = 0;$address_list=is_array($address_list) ? $address_list : array();$tmpid = array();$tmpid["total"] = count($address_list);$tmpid["index"] = -1;foreach($address_list as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<tr>
					<td rowspan="2"><?php echo $value['id'];?></td>
					<td>
						<?php echo $value['fullname'];?>
					<td>
						<?php if($value['mobile']){ ?><div><?php echo P_Lang("手机号");?> <?php echo $value['mobile'];?></div><?php } ?>
						<?php if($value['tel']){ ?><div style="margin-top:7px"><?php echo P_Lang("电话");?> <?php echo $value['tel'];?></div><?php } ?>
						<?php if($value['email']){ ?><div style="margin-top:7px"><?php echo P_Lang("邮箱");?> <?php echo $value['email'];?></div><?php } ?>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<?php echo $value['country'];?>
						<?php if($value['province'] != $value['city']){ ?>/ <?php echo $value['province'];?><?php } ?>
						<?php if($value['city'] != $value['county'] && $value['city']){ ?>/ <?php echo $value['city'];?><?php } ?>
						<?php if($value['county']){ ?>/ <?php echo $value['county'];?><?php } ?>
						/ <?php echo $value['address'];?>
						<?php if($value['is_default']){ ?><span class="layui-badge-rim"><?php echo P_Lang("默认");?></span><?php } ?>
					</td>
				</tr>
				<?php } ?>
				</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php } ?>
	<?php echo $app->plugin_html_ap("usershow");?>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('.layui-row').masonry({
		itemSelector: '.prd',
		columnWidth: '.prd',
		percentPosition: true
	})
});
</script>
<?php $this->output("foot_lay","file",true,false); ?>