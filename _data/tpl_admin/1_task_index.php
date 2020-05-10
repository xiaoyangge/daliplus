<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<script type="text/javascript">
function edit_it(id)
{
	$("#update_"+id).ajaxSubmit({
		'url':get_url('task','save','id='+id),
		'type':'post',
		'dataType':'json',
		'success':function(rs){
			if(rs.status == 'ok'){
				if(id>0){
					$.dialog.tips('修改成功');
				}else{
					$.dialog.alert('添加计划任务成功',function(){
						$.phpok.reload();
					});
				}
			}else{
				$.dialog.alert(rs.content);
				return false;
			}
		}
	});
	return false;
}
function delete_id(id)
{
	$.dialog.confirm('确定要删除这条计划任务吗？',function(){
		var url = get_url('task','delete','id='+id);
		var rs = $.phpok.json(url);
		if(rs.status == 'ok'){
			$.dialog.alert('删除成功',function(){
				$.phpok.reload();
			});
		}else{
			$.dialog.alert(rs.content);
			return false;
		}
	})
}
</script>
<div class="layui-card">
	<div class="layui-card-body">
		<table class="layui-table">
		<thead>
		<tr>
			<th><?php echo P_Lang("年");?></th>
			<th><?php echo P_Lang("月");?></th>
			<th><?php echo P_Lang("日");?></th>
			<th><?php echo P_Lang("时");?></th>
			<th><?php echo P_Lang("分");?></th>
			<th><?php echo P_Lang("动作");?></th>
			<th><?php echo P_Lang("参数");?></th>
			<th><?php echo P_Lang("操作");?></th>
		</tr>
		</thead>
		<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
		<tr>
			<form method="post" class="layui-form" id="update_<?php echo $value['id'];?>" onsubmit="return false;">
			<td>
				<select name="year">
				<option value="*">每年</option>
				<?php $tmpid["num"] = 0;$yearlist=is_array($yearlist) ? $yearlist : array();$tmpid = array();$tmpid["total"] = count($yearlist);$tmpid["index"] = -1;foreach($yearlist as $k=>$v){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<option value="<?php echo $v;?>"<?php if($v == $value['year'] && $value['year'] != '*'){ ?> selected<?php } ?>><?php echo $v;?>年</option>
				<?php } ?>
				</select>
			</td>
			<td>
				<select name="month">
				<option value="*">每月</option>
				<?php $tmpid["num"] = 0;$monthlist=is_array($monthlist) ? $monthlist : array();$tmpid = array();$tmpid["total"] = count($monthlist);$tmpid["index"] = -1;foreach($monthlist as $k=>$v){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<option value="<?php echo $v;?>"<?php if($v == $value['month'] && $value['month'] != '*'){ ?> selected<?php } ?>><?php echo $v;?>月</option>
				<?php } ?>
				</select>
			</td>
			<td>
				<select name="day">
				<option value="*">每天</option>
				<?php $tmpid["num"] = 0;$daylist=is_array($daylist) ? $daylist : array();$tmpid = array();$tmpid["total"] = count($daylist);$tmpid["index"] = -1;foreach($daylist as $k=>$v){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<option value="<?php echo $v;?>"<?php if($v == $value['day'] && $value['day'] != '*'){ ?> selected<?php } ?>><?php echo $v;?>日</option>
				<?php } ?>
				</select>
			</td>
			<td>
				<select name="hour">
				<option value="*">每小时</option>
				<?php $tmpid["num"] = 0;$hourlist=is_array($hourlist) ? $hourlist : array();$tmpid = array();$tmpid["total"] = count($hourlist);$tmpid["index"] = -1;foreach($hourlist as $k=>$v){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<option value="<?php echo $v;?>"<?php if($v == $value['hour'] && $value['hour'] != '*'){ ?> selected<?php } ?>><?php echo $v;?>时</option>
				<?php } ?>
				</select>
			</td>
			<td>
				<select name="minute">
				<?php $tmpid["num"] = 0;$minutelist=is_array($minutelist) ? $minutelist : array();$tmpid = array();$tmpid["total"] = count($minutelist);$tmpid["index"] = -1;foreach($minutelist as $k=>$v){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<option value="<?php echo $v;?>"<?php if($v == $value['minute'] && $value['minute'] != '*'){ ?> selected<?php } ?>><?php echo $v;?>分</option>
				<?php } ?>
				</select>
			</td>
			<td>
				<select name="actionfile">
				<option value=""><?php echo P_Lang("请选择…");?></option>
				<?php $tmpid["num"] = 0;$filelist=is_array($filelist) ? $filelist : array();$tmpid = array();$tmpid["total"] = count($filelist);$tmpid["index"] = -1;foreach($filelist as $k=>$v){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<option value="<?php echo $v['id'];?>"<?php if($v['id'] == $value['action']){ ?> selected<?php } ?>><?php echo $v['txt'];?> - <?php echo $v['id'];?></option>
				<?php } ?>
				</select>
			</td>
			<td>
				<input type="text" name="param" value="<?php echo $value['param'];?>" />
			</td>
			<td>
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("编辑");?>" onclick="edit_it('<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("删除");?>" onclick="delete_id('<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" />
				</div>
			</td>
			</form>
		</tr>
		<?php } ?>
		<tr>
			<form method="post" class="layui-form" id="update_0" onsubmit="return false;">
			<td>
				<select name="year">
				<option value="*"><?php echo P_Lang("每年");?></option>
				<?php $tmpid["num"] = 0;$yearlist=is_array($yearlist) ? $yearlist : array();$tmpid = array();$tmpid["total"] = count($yearlist);$tmpid["index"] = -1;foreach($yearlist as $k=>$v){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<option value="<?php echo $v;?>"><?php echo $v;?><?php echo P_Lang("年");?></option>
				<?php } ?>
				</select>
			</td>
			<td>
				<select name="month">
				<option value="*"><?php echo P_Lang("每月");?></option>
				<?php $tmpid["num"] = 0;$monthlist=is_array($monthlist) ? $monthlist : array();$tmpid = array();$tmpid["total"] = count($monthlist);$tmpid["index"] = -1;foreach($monthlist as $k=>$v){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<option value="<?php echo $v;?>"><?php echo $v;?><?php echo P_Lang("月");?></option>
				<?php } ?>
				</select>
			</td>
			<td>
				<select name="day">
				<option value="*">每天</option>
				<?php $tmpid["num"] = 0;$daylist=is_array($daylist) ? $daylist : array();$tmpid = array();$tmpid["total"] = count($daylist);$tmpid["index"] = -1;foreach($daylist as $k=>$v){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<option value="<?php echo $v;?>"><?php echo $v;?>日</option>
				<?php } ?>
				</select>
			</td>
			<td>
				<select name="hour">
				<option value="*"><?php echo P_Lang("每小时");?></option>
				<?php $tmpid["num"] = 0;$hourlist=is_array($hourlist) ? $hourlist : array();$tmpid = array();$tmpid["total"] = count($hourlist);$tmpid["index"] = -1;foreach($hourlist as $k=>$v){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<option value="<?php echo $v;?>"><?php echo $v;?><?php echo P_Lang("时");?></option>
				<?php } ?>
				</select>
			</td>
			<td>
				<select name="minute">
				<?php $tmpid["num"] = 0;$minutelist=is_array($minutelist) ? $minutelist : array();$tmpid = array();$tmpid["total"] = count($minutelist);$tmpid["index"] = -1;foreach($minutelist as $k=>$v){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<option value="<?php echo $v;?>"><?php echo $v;?><?php echo P_Lang("分");?></option>
				<?php } ?>
				</select>
			</td>
			<td>
				<select name="actionfile">
				<option value=""><?php echo P_Lang("请选择…");?></option>
				<?php $tmpid["num"] = 0;$filelist=is_array($filelist) ? $filelist : array();$tmpid = array();$tmpid["total"] = count($filelist);$tmpid["index"] = -1;foreach($filelist as $k=>$v){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<option value="<?php echo $v['id'];?>"><?php echo $v['txt'];?>_<?php echo $v['id'];?></option>
				<?php } ?>
				</select>
			</td>
			<td>
				<input type="text" name="param" value="<?php echo $value['param'];?>" />
			</td>
			<td>
				<input type="button" value="<?php echo P_Lang("新增");?>" onclick="edit_it(0)" class="layui-btn layui-btn-sm" />
			</td>
			</form>
		</tr>
		</table>
		
	</div>
</div>
<?php $this->output("foot_lay","file",true,false); ?>