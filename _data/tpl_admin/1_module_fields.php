<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<script type="text/javascript">
function update_taxis(val,id)
{
	$.ajax({
		'url':get_url('module','field_taxis','taxis='+val+"&id="+id),
		'dataType':'json',
		'cache':false,
		'async':true,
		'beforeSend': function (XMLHttpRequest){
			XMLHttpRequest.setRequestHeader("request_type","ajax");
		},
		'success':function(rs){
			if(rs.status){
				$.phpok.reload();
			}else{
				$.dialog.alert(rs.info);
				return false;
			}
		}
	});
}
$(document).ready(function(){
	$("div[name=taxis]").click(function(){
		var oldval = $(this).text();
		var id = $(this).attr('data');
		$.dialog.prompt('<?php echo P_Lang("请填写新的排序：");?>',function(val){
			if(val != oldval){
				update_taxis(val,id);
			}
		},oldval);
	});
});
</script>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("列表");?>
		<div class="fr">
			<input type="button" value="<?php echo P_Lang("添加字段");?>" onclick="$.admin_module.field_create('<?php echo $id;?>')" class="layui-btn layui-btn-sm" />
		</div>
	</div>
	<div class="layui-card-body">
		<table class="layui-table">
		<thead>
			<tr>
				<th class="id">ID</th>
				<th><?php echo P_Lang("字段名");?></th>
				<th><?php echo P_Lang("名称");?></th>
				<th><?php echo P_Lang("备注");?></th>
				<th><?php echo P_Lang("字段类型");?></th>
				<th><?php echo P_Lang("表单");?></th>
				<th><?php echo P_Lang("格式化");?></th>
				<th class="center"><?php echo P_Lang("排序");?></th>
				<th></th>
			</tr>
		</thead>
		<?php $tmpid["num"] = 0;$used_list=is_array($used_list) ? $used_list : array();$tmpid = array();$tmpid["total"] = count($used_list);$tmpid["index"] = -1;foreach($used_list as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<tr>
			<td class="center"><?php echo $value['id'];?></td>
			<td><?php echo $value['identifier'];?></td>
			<td><?php echo $value['title'];?></td>
			<td><?php echo $value['note'];?></td>
			<td><?php echo $value['field_type_name'];?></td>
			<td><?php echo $value['form_type_name'];?></td>
			<td><?php echo $value['format_type_name'];?></td>
			<td><div class="gray i hand center" title="<?php echo P_Lang("点击调整排序");?>" name="taxis" data="<?php echo $value['id'];?>"><?php echo $value['taxis'];?></div></td>
			<td>
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.admin_module.field_edit('<?php echo $value['id'];?>')" class="layui-btn  layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_module.field_del('<?php echo $value['id'];?>','<?php echo $value['title'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" />
				</div>
			</td>
		</tr>
		<?php } ?>
		</table>
	</div>
</div>
<?php if($fields_list){ ?>
<ul class="layui-row layui-col-space15">
	<?php $tmpid["num"] = 0;$fields_list=is_array($fields_list) ? $fields_list : array();$tmpid = array();$tmpid["total"] = count($fields_list);$tmpid["index"] = -1;foreach($fields_list as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
	<div class="layui-col-md3">
      <div class="layui-card color-hover">
        <div class="layui-card-body ">
          <?php echo $value['title'];?><br /><?php echo $value['identifier'];?><span class=" layuiadmin-badge"> <input type="button" value="<?php echo P_Lang("添加");?>" onclick="$.admin_module.field_add('<?php echo $id;?>','<?php echo $value['identifier'];?>')" class="layui-btn  layui-btn-sm" /></span> 
        </div>
      </div>
    </div>
	<?php } ?>
</ul>
<?php } ?>


<?php $this->output("foot_lay","file",true,false); ?>