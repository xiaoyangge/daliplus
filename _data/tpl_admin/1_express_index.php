<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="hide" id="express_select_info">
<select id="code">
	<option value=""><?php echo P_Lang("请选择…");?></option>
	<?php $codelist_id["num"] = 0;$codelist=is_array($codelist) ? $codelist : array();$codelist_id = array();$codelist_id["total"] = count($codelist);$codelist_id["index"] = -1;foreach($codelist as $key=>$value){ $codelist_id["num"]++;$codelist_id["index"]++; ?>
	<option value="<?php echo $value['id'];?>"><?php echo $value['title'];?><?php if($value['note']){ ?> / <?php echo $value['note'];?><?php } ?></option>
	<?php } ?>
</select>
</div>
<div class="layui-card">
	<div class="layui-card-header ">
		<?php echo P_Lang("物流管理");?>
		<div class="fr">
			<input type="button" value="<?php echo P_Lang("添加物流");?>" onclick="$.admin_express.add()" class="layui-btn layui-btn-sm layui-btn-normal" />
		</div>
	</div>

	<div class="layui-card-body">

		<table class="layui-table">
			<thead>
			<tr>
				<th>ID</th>
				<th><?php echo P_Lang("物流");?></th>
				<th><?php echo P_Lang("公司名称");?></th>
				<th><?php echo P_Lang("官方网站");?></th>
				<th><?php echo P_Lang("接口");?></th>
				<th>&nbsp;</th>
			</tr>
			</thead>
			<tbody>
			<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
			<tr>
				<td><?php echo $value['id'];?></td>
				<td id="title_<?php echo $value['id'];?>"><?php echo $value['title'];?></td>
				<td><?php echo $value['company'];?></td>
				<td><a href="<?php echo $value['url'];?>" target="_blank"><?php echo $value['homepage'];?></a></td>
				<td><?php echo $codelist[$value['code']]['title'];?></td>
				<td>
					<div class="layui-btn-group">
						<input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.admin_express.edit('<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm" />
						<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_express.del('<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" />
					</div>
				</td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>

</div>
<?php $this->output("foot_lay","file",true,false); ?>