<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-body">
		<table class="layui-table">
		<thead>
		<tr>
			<th>ID</th>
			<th><?php echo P_Lang("名称");?></th>
			<th><?php echo P_Lang("计费方式");?></th>
			<th><?php echo P_Lang("货币");?></th>
			<th width="60"><?php echo P_Lang("排序");?></th>
			<th><?php echo P_Lang("操作");?></th>
		</tr>
		</thead>
		<tbody>
		<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
		<tr>
			<td class="center"><?php echo $value['id'];?></td>
			<td><input type="text" id="title_<?php echo $value['id'];?>" value="<?php echo $value['title'];?>" class="layui-input" /></td>
			<td>
				<select id="type_<?php echo $value['id'];?>">
					<?php $tmp["num"] = 0;$typelist=is_array($typelist) ? $typelist : array();$tmp = array();$tmp["total"] = count($typelist);$tmp["index"] = -1;foreach($typelist as $k=>$v){ $tmp["num"]++;$tmp["index"]++; ?>
					<option value="<?php echo $k;?>"<?php if($k == $value['type']){ ?> selected<?php } ?>><?php echo $v;?></option>
					<?php } ?>
				</select>
			</td>
			<td>
				<select id="currency_<?php echo $value['id'];?>">
					<?php $tmp["num"] = 0;$currency_list=is_array($currency_list) ? $currency_list : array();$tmp = array();$tmp["total"] = count($currency_list);$tmp["index"] = -1;foreach($currency_list as $k=>$v){ $tmp["num"]++;$tmp["index"]++; ?>
					<option value="<?php echo $v['id'];?>"<?php if($v['id'] == $value['currency_id']){ ?> selected<?php } ?>><?php echo $v['title'];?></option>
					<?php } ?>
				</select>
			</td>
			<td><input type="text" id="taxis_<?php echo $value['id'];?>" value="<?php echo $value['taxis'];?>" class="layui-input" /></td>
			<td>
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("提交修改");?>" onclick="$.admin_freight.update('<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("区域设置");?>" onclick="$.win('<?php echo P_Lang("区域设置");?>_#<?php echo $value['id'];?>','<?php echo phpok_url(array('ctrl'=>'freight','func'=>'zone','fid'=>$value['id']));?>')" class="layui-btn layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("价格设置");?>" onclick="$.admin_freight.price('<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_freight.del('<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" />
				</div>
			</td>
		</tr>
		<?php } ?>
		<tr>
			<td class="center"><?php echo P_Lang("添加");?></td>
			<td><input type="text" id="title_0" class="layui-input" /></td>
			<td>
				<select id="type_0">
					<?php $tmpid["num"] = 0;$typelist=is_array($typelist) ? $typelist : array();$tmpid = array();$tmpid["total"] = count($typelist);$tmpid["index"] = -1;foreach($typelist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<option value="<?php echo $key;?>"><?php echo $value;?></option>
					<?php } ?>
				</select>
			</td>
			<td>
				<select id="currency_0">
					<?php $tmp["num"] = 0;$currency_list=is_array($currency_list) ? $currency_list : array();$tmp = array();$tmp["total"] = count($currency_list);$tmp["index"] = -1;foreach($currency_list as $k=>$v){ $tmp["num"]++;$tmp["index"]++; ?>
					<option value="<?php echo $v['id'];?>"><?php echo $v['title'];?></option>
					<?php } ?>
				</select>
			</td>
			<td class="center"><input type="text" id="taxis_0" value="<?php echo $taxis;?>" class="layui-input" /></td>
			<td><input type="button" value="<?php echo P_Lang("添加");?>" onclick="$.admin_freight.add()" class="layui-btn layui-btn-sm" /></td>
		</tr>
		</tbody>
		</table>
	</div>
</div>
<?php $this->output("foot_lay","file",true,false); ?>