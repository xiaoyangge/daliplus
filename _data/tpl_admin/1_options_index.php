<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<script type="text/javascript">

</script>
<div class="layui-card">
	<div class="layui-card-header"><?php echo P_Lang("产品属性管理");?></div>
	<div class="layui-card-body">
		<table class="layui-table">
			<thead>
			<tr>
				<th>ID</th>
				<th>名称</th>
				<th width="100">排序</th>
				<th>操作</th>
			</tr>
			</thead>
			<tbody>
			<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
			<tr>
				<td><?php echo $value['id'];?></td>
				<td><input type="text" id="title_<?php echo $value['id'];?>" value="<?php echo $value['title'];?>" class="layui-input" /></td>
				<td><input type="text" id="taxis_<?php echo $value['id'];?>" value="<?php echo $value['taxis'];?>" class="layui-input" /></td>
				<td>
					<div class="layui-btn-group">
						<input type="button" value="<?php echo P_Lang("提交修改");?>" onclick="$.admin_options.update('<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm" />
						<input type="button" value="<?php echo P_Lang("内容");?>" onclick="$.win('<?php echo P_Lang("属性内容维护");?>_#<?php echo $value['id'];?>','<?php echo phpok_url(array('ctrl'=>'options','func'=>'list','id'=>$value['id']));?>')" class="layui-btn layui-btn-sm" />
						<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_options.del('<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" />
					</div>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<td class="center"><?php echo P_Lang("添加");?></td>
				<td><input type="text" id="title_0" value="" class="layui-input" /></td>
				<td class="center"><input type="text" id="taxis_0" value="<?php echo $taxis;?>" class="layui-input" /></td>
				<td><input type="button" value="<?php echo P_Lang("添加");?>" onclick="$.admin_options.add()" class="layui-btn layui-btn-sm" /></td>
			</tr>
			</tbody>
		</table>
	</div>
</div>

<?php $this->output("foot_lay","file",true,false); ?>