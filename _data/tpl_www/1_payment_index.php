<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title ="在线充值 - 会员中心";?>
<?php $this->assign("title",$title); ?><?php $this->output("header","file",true,false); ?>
<script type="text/javascript">
function checksubmit()
{
	
}
function checkmoney()
{
	
}
</script>
<div class="main">
	<?php $this->output("block/breadcrumb","file",true,false); ?>
	<div class="left"><?php $this->output("block/usercp_nav","file",true,false); ?></div>
	<div class="right">
		<div class="am-panel am-panel-default">
			<div class="am-panel-hd">在线充值</div>
			<div class="am-panel-bd">
				<form class="am-form am-form-horizontal" method="post" target="_blank" action="<?php echo phpok_url(array('ctrl'=>'payment','func'=>'create','type'=>'recharge'));?>" onsubmit="return checksubmit()">
				<div class="am-form-group">
					<label for="wealth" class="am-u-sm-2 am-form-label">充值目标</label>
					<div class="am-u-sm-10">
						<select name="wealth" style="padding:3px;">
							<?php if($id && $rs){ ?>
							<option value="<?php echo $rs['id'];?>"><?php echo $rs['title'];?> / 充值比：1元 = <?php echo $rs['pay_ratio'];?><?php echo $rs['unit'];?></option>
							<?php } else { ?>
							<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $k=>$v){ $tmpid["num"]++;$tmpid["index"]++; ?>
							<option value="<?php echo $v['id'];?>"><?php echo $v['title'];?> / 充值比：1元 = <?php echo $v['pay_ratio'];?><?php echo $v['unit'];?></option>
							<?php } ?>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="am-form-group">
					<label for="price" class="am-u-sm-2 am-form-label">充值金额</label>
					<div class="am-u-sm-2"><input type="text" name="price" id="price" value="<?php echo $price;?>" onchange="checkmoney()" /></div>
					<div class="am-u-sm-8">元</div>
				</div>
				<?php if($paylist){ ?>
				<div class="am-form-group">
					<label class="am-u-sm-2 am-form-label">请选择支付方式</label>
					<div class="am-u-sm-10">
						<div class="am-tabs" data-am-tabs>
							<ul class="am-tabs-nav am-nav am-nav-tabs">
								<?php $tmpid["num"] = 0;$paylist=is_array($paylist) ? $paylist : array();$tmpid = array();$tmpid["total"] = count($paylist);$tmpid["index"] = -1;foreach($paylist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
								<li<?php if(!$tmpid['index']){ ?> class="am-active"<?php } ?>><a href="javascript:void(0);"><?php echo $value['title'];?></a></li>
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
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				<div class="am-form-group">
					<label class="am-u-sm-2 am-form-label">&nbsp;</label>
					<div class="am-u-sm-10"><input type="submit" value="提交充值" class="am-btn am-btn-primary" /></div>
				</div>
				</form>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<?php $this->output("footer","file",true,false); ?>