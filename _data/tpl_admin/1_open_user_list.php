<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("nopadding","true"); ?><?php $this->output("head_lay","file",true,false); ?>
<script type="text/javascript">
var input_id = "#<?php echo $id;?>";
var multi = <?php echo $multi ? "1" : "0";?>;
var obj = $.dialog.opener;
function show_list()
{
	cid = $.dialog.data('phpok_user_<?php echo $id;?>');
	if(cid == "undefined" || cid == "0" || cid == ""){
		return false;
	}
	$("li[name=list]").show();
	var url = get_url("inp","","type=user&content="+$.str.encode(cid));
	$.phpok.json(url,function(data){
		if(data.status){
			var lst = data.info;
			var c = "";
			for(var i in lst){
				c += '<li id="user_<?php echo $id;?>_'+lst[i]['id']+'">';
				c += '<div class="layui-btn-group">';
				c += '<input type="button" value="'+lst[i]['user']+'" class="layui-btn layui-btn-xs" />';
				c += '<input type="button" value="×" title="删除会员：'+lst[i]['user']+'" onclick="delete_input(\''+lst[i]['id']+'\')" class="layui-btn layui-btn-xs layui-btn-danger" /></div>';
				c += '</li>';
				$("#user_"+lst[i]['id']).hide();
			}
			$("#selected_list").html(c).show();
			$.dialog.data("phpok_user_<?php echo $id;?>",cid);
			return true;
		}
		$("#selected_list").hide();
		$.dialog.removeData("phpok_user_<?php echo $id;?>");
	});
}
function add_input(val)
{
	if(multi){
		var old_c = $.dialog.data('phpok_user_<?php echo $id;?>');
		var c = (old_c && old_c != 'undefined') ? old_c+","+val : val;
		var lst = c.split(",");
		lst = $.unique(lst);
		$.dialog.data('phpok_user_<?php echo $id;?>',lst.join(","));
		show_list();
	}else{
		obj.$("#<?php echo $id;?>").val(val);
		obj.action_<?php echo $id;?>_show();
		$.dialog.removeData("phpok_user_<?php echo $id;?>");
		$.dialog.close();
	}
}
function delete_input(val)
{
	if(multi){
		var old_c = $.dialog.data('phpok_user_<?php echo $id;?>');
		if(!old_c){
			return true;
		}
		var lst = old_c.split(",");
		var n_list = new Array();
		var m=0;
		for(var i=0;i<lst.length;i++){
			if(lst[i] != val){
				n_list[m] = lst[i];
				m++;
			}
		}
		if(n_list.length<1){
			$.dialog.removeData("phpok_user_<?php echo $id;?>");
		}else{
			var str = n_list.join(",");
			$.dialog.data("phpok_user_<?php echo $id;?>",str);
		}
	}else{
		$.dialog.removeData("phpok_user_<?php echo $id;?>");
	}
	show_list();
}
$(document).ready(function(){
	if(multi == 1){
		var new_c = $.dialog.data("phpok_user_<?php echo $id;?>");
		if(!new_c || new_c == "undefined"){
			new_c = obj.$(input_id).val();
		}
		show_list();
	}
});
</script>

<div class="layui-card">
	<div class="layui-card-header">
		<form method="post" action="<?php echo phpok_url(array('ctrl'=>'open','func'=>'user','id'=>$id));?>">
		<ul class="layout" style="padding-top:2px;">
			<li><input type="text" class="layui-input" name="keywords" id="keywords" value="<?php echo $keywords;?>" /></li>
			<li><input type="submit" value="搜索" class="layui-btn" /></li>
		</ul>
		</form>
	</div>
	<div class="layui-card-body">
		<?php if($multi){ ?>
		<div class="list">
			<ul class="layout">
				<li>已选择：</li>
				<div id="selected_list"></div>
				<div class="clear"></div>
			</ul>
		</div>
		<?php } ?>
		<table width="100%" class="layui-table" lay-size="sm">
		<thead>
		<tr>
			<th style="text-align:center;">ID</th>
			<th width="20px">&nbsp;</th>
			<th width="35px"></th>
			<th class="lft"><?php echo P_Lang("会员账号");?></th>
			<th width="120px"><?php echo P_Lang("注册时间");?></th>
			<th></th>
		</tr>
		</thead>
		<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<tr>
			<td align="center"><?php echo $value['id'];?></td>
			<td><span class="status<?php echo $value['status'];?>" value="<?php echo $value['status'];?>"></span></td>
			<td align="center"><img src="<?php echo $value['avatar'] ? $value['avatar'] : 'images/user_default.png';?>" border="0" width="24px" height="24px" /></td>
			<td align="left"><?php echo $value['user'];?></td>
			<td><?php echo date('Y-m-d H:i',$value['regtime']);?></td>
			<td><input type="button" value="选择" onclick="add_input('<?php echo $value['id'];?>')" class="layui-btn layui-btn-xs" /></td>
		</tr>
		<?php } ?>
		</table>
		<?php $this->output("pagelist","file",true,false); ?>
	</div>
</div>
<?php $this->assign("is_open","true"); ?><?php $this->output("foot_lay","file",true,false); ?>