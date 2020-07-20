<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title = "我的推荐 - 会员中心";?><?php $this->assign("title",$title); ?><?php $this->output("header","file",true,false); ?>
<script type="text/javascript">
function relation_reload(val)
{
	var url = get_url('usercp','introducer');
	if(val){
		url = get_url('usercp','introducer','month='+val);
	}
	$.phpok.go(url);
}
</script>
<div class="main">
	<?php $this->output("block/breadcrumb","file",true,false); ?>
	<div class="left"><?php $this->output("block/usercp_nav","file",true,false); ?></div>
	<div class="right am-panel-group">
		<div class="am-panel am-panel-default">
			<div class="am-panel-hd">推广链接</div>
			<div class="am-panel-bd">
				<?php echo $vlink;?>
			</div>
		</div>
		<div class="am-panel am-panel-default">
			<div class="am-panel-hd">友情说明</div>
			<div class="am-panel-bd">
				<ul>
					<li>您可以把推广链接放到您适合的文章里嵌入，也可以发给好友分享</li>
				</ul>
			</div>
		</div>
		
		<?php if($monthlist){ ?>
		<div class="am-panel am-panel-default">
			<div class="am-panel-hd">月统计</div>
			<div class="am-panel-bd am-form">
				<select onchange="relation_reload(this.value)">
				<option value="">请选择</option>
				<?php $tmpid["num"] = 0;$monthlist=is_array($monthlist) ? $monthlist : array();$tmpid = array();$tmpid["total"] = count($monthlist);$tmpid["index"] = -1;foreach($monthlist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<option value="<?php echo $value['month'];?>"<?php if($month == $value['month']){ ?> selected<?php } ?>><?php echo substr($value['month'],0,'4');?>年<?php echo substr($value['month'],'-2');?>月 (<?php echo $value['total'];?>人)</option>
				<?php } ?>
				</select>
			</div>
		</div>
		<?php } ?>
		<?php if($rslist){ ?>
		<div class="am-panel am-panel-default">
			<div class="am-panel-hd">我推荐的会员</div>
			<table class="am-table am-table-centered am-table-hover">
				<thead>
					<tr>
						<th>会员账号</th>
						<th>注册时间</th>
						<th>姓名</th>
					</tr>
				</thead>
				<tbody>
					<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<tr>
						<td><?php echo $value['user'];?></td>
						<td><?php echo time_format($value['regtime']);?></td>
						<td><?php echo $value['fullname'];?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<?php } ?>
		<?php $this->output("block/pagelist","file",true,false); ?>
	</div>
	<div class="clear"></div>
</div>

<?php $this->output("footer","file",true,false); ?>