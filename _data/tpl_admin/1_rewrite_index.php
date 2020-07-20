<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("title","伪静态页规则管理"); ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("伪静态页规则管理");?>
		<div class="fr">
			<input type="button" value="<?php echo P_Lang("添加规则");?>" onclick="$.win('<?php echo P_Lang("添加规则");?>','<?php echo phpok_url(array('ctrl'=>'rewrite','func'=>'set'));?>')" class="layui-btn layui-btn-sm" />
		</div>
	</div>
	<div class="layui-card-body">
		<blockquote class="layui-elem-quote">
			<?php echo P_Lang("伪静态页规则顺序很重要，读伪静态页规则顺序从小到大依次读取，只要一符合条件即刻中止匹配");?><br>
			<?php echo P_Lang("标题是为了方便管理而设置，在伪静态页中无其他意义");?><br>
			<?php echo P_Lang("使用伪静态页功能，需要您的WEB服务器支持，同时您必须对此有所了解");?>
			<div class="clear"></div>
		</blockquote>
		<table class="layui-table">
		<thead>
		<tr>
			<th><?php echo P_Lang("主题");?></th>
			<th><?php echo P_Lang("正则");?></th>
			<th><?php echo P_Lang("目标网址");?></th>
			<th><?php echo P_Lang("格式化");?></th>
			<th><?php echo P_Lang("排序");?></th>
			<th><?php echo P_Lang("操作");?></th>
		</tr>
		</thead>
		<tbody>
		<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
		<tr id="edit_<?php echo $value['id'];?>">
			<td><?php echo $value['title'];?></td>
			<td><?php echo $value['rule'];?></td>
			<td><?php echo $value['val'];?></td>
			<td><?php echo $value['format'];?></td>
			<td><div class="gray i hand center" title="<?php echo P_Lang("点击调整排序");?>" name="taxis" data="<?php echo $value['id'];?>"><?php echo $value['sort'];?></div></td>
			<td>
				<div class="layui-btn-group">
					<?php if($popedom['set']){ ?>
					<input type="button" value="<?php echo P_Lang("编辑");?>" onclick="parent.layui.index.openTabsPage('<?php echo phpok_url(array('ctrl'=>'rewrite','func'=>'set','id'=>$value['id']));?>','编辑规则');" class="layui-btn  layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("复制");?>" onclick="$.admin_rewrite.copy('<?php echo $value['id'];?>')" class="layui-btn  layui-btn-sm" />
					<?php } ?>
					<?php if($popedom['delete']){ ?>
					<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_rewrite.del('<?php echo $value['id'];?>','<?php echo $value['title'];?>')" class="layui-btn  layui-btn-sm layui-btn-danger" />
					<?php } ?>
				</div>
			</td>
		</tr>
		<?php } ?>
		</tbody>
		</table>
	</div>
</div>

<?php $this->output("foot_lay","file",true,false); ?>
