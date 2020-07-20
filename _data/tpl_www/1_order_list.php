<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title = "订单中心 - 会员中心";?>
<?php $this->assign("title",$title); ?><?php $this->output("header","file",true,false); ?>
<script type="text/javascript">
$(document).ready(function(){
	$(".o-dark").mouseover(function(){
		$(this).addClass('o-dark-over');
	}).mouseout(function(){
		$(this).removeClass('o-dark-over');
	});
	$(".o-white").mouseover(function(){
		$(this).addClass('o-white-over');
	}).mouseout(function(){
		$(this).removeClass('o-white-over');
	});
});
</script>
<div class="main">
	<?php $this->output("block/breadcrumb","file",true,false); ?>
	<div class="left"><?php $this->output("block/usercp_nav","file",true,false); ?></div>
	<div class="right am-panel-group">
		<div class="am-panel am-panel-default">
			<div class="am-panel-hd">相关说明</div>
			<div class="am-panel-bd">
				<ul>
					<li>如需要改单，请联系我们的管理员</li>
					<li>本站订单系统还不够强大的，如果您需要更加强大的功能，请联系官网进行定制</li>
				</ul>
			</div>
		</div>
		<div class="am-panel am-panel-default">
			<div class="am-panel-hd">订单列表</div>
			<table class="am-table am-table-striped am-table-hover am-table-centered">
			<tr>
				<th>下单时间</th>
				<th>订单编号</th>
				<th>数量</th>
				<th>金额</th>
				<th>审核</th>
				<th width="130">明细</th>
			</tr>
			<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
			<tr>
				<td><?php echo time_format($value['addtime']);?></td>
				<td><?php echo $value['sn'];?></td>
				<td><?php echo $value['qty'];?></td>
				<td><?php echo price_format($value['price'],$value['currency_id'],$value['currency_id']);?></td>
				<td><?php echo $value['status_info'];?></td>
				<td>
					<a class="am-btn am-btn-primary am-btn-xs" href="<?php echo phpok_url(array('ctrl'=>'order','func'=>'info','id'=>$value['id']));?>" target="_blank">查看</a>
					<a href="<?php echo phpok_url(array('ctrl'=>'order','func'=>'comment','id'=>$value['id']));?>" class="am-btn am-btn-default am-btn-xs">评论</a>
				</td>
			</tr>
			<?php } ?>
			</table>
		</div>
		
		<?php $this->output("block/pagelist","file",true,false); ?>
	</div>
	<div class="clear"></div>
</div>

<?php $this->output("footer","file",true,false); ?>