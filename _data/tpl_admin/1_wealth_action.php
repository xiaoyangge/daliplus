<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head","file",true,false); ?>
<script type="text/javascript">
function save()
{
	var opener = $.dialog.opener;
	var num = $("input[name=val]").val();
	if(!num || (num && parseFloat(num)<=0)){
		$.dialog.alert('未指定数值');
		return false;
	}
	var from_uid = $("select[name=from_uid]").val();
	if(from_uid == 'vouch'){
		var vouch = $("select[name=vouch]").val();
		if(!vouch){
			$.dialog.alert('请选择推荐人');
			return false;
		}
	}
	if(from_uid == 'other'){
		var username = $("input[name=username]").val();
		if(!username){
			$.dialog.alert('请填写会员账号');
			return false;
		}
	}
	var note = $("input[name=note]").val();
	if(!note || note == 'undefined'){
		$.dialog.alert('未填写备注');
		return false;
	}
	if(from_uid == 'admin' && note.indexOf('推荐')>-1){
		$.dialog.alert('系统检测到可能是推荐人提成，请选择推荐人');
		return false;
	}
	$("#post_save").ajaxSubmit({
		'url':get_url('wealth','val'),
		'type':'post',
		'dataType':'json',
		'success':function(rs){
			if(rs.status == 'ok'){
				$.dialog.alert('操作成功',function(){
					opener.$.phpok.reload();
				},'succeed');
			}else{
				$.dialog.alert(rs.content);
				return false;
			}
		}
	});
}
function update_from_uid(val)
{
	if(val == 'admin'){
		$("#from_uid_vouch,#from_uid_other").hide();
		return true;
	}
	if(val == 'vouch'){
		$("#from_uid_other").hide();
		$("#from_uid_vouch").show();
		return true;
	}
	if(val == 'other'){
		$("#from_uid_other").show();
		$("#from_uid_vouch").hide();
		return true;
	}
}
</script>
<form method="post" id="post_save" onsubmit="return false">
<input type="hidden" name="wid" id="wid" value="<?php echo $rs['id'];?>" />
<input type="hidden" name="uid" id="uid" value="<?php echo $uid;?>" />
<div class="table">
	<div class="content">
		<ul class="layout">
			<li style="width:60px;text-align:right">
				<select name="type">
					<option value="+">增加</option>
					<option value="-">减少</option>
				</select>
			</li>
			<li><input type="text" name="val" id="val" class="short" /></li>
			<li><?php echo $rs['unit'];?></li>
			<li>
				<div class="button-group">
					<input type="button" value="10" onclick="$('#val').val(10)" class="phpok-btn" />
					<input type="button" value="30" onclick="$('#val').val(30)" class="phpok-btn" />
					<input type="button" value="50" onclick="$('#val').val(50)" class="phpok-btn" />
					<input type="button" value="70" onclick="$('#val').val(70)" class="phpok-btn" />
					<input type="button" value="90" onclick="$('#val').val(90)" class="phpok-btn" />
					<input type="button" value="清空" onclick="$('#val').val('')" class="phpok-btn" />
				</div>
			</li>
		</ul>
	</div>
</div>
<div class="table">
	<div class="content">
		<ul class="layout">
			<li style="width:60px;text-align:right">会员：</li>
			<li>
				<select name="from_uid" onchange="update_from_uid(this.value)">
					<option value="admin">平台</option>
					<option value="vouch">推荐人</option>
					<option value="other">其他</option>
				</select>
			</li>
			<li id="from_uid_vouch" class="hide">
				<select name="vouch">
					<option value="">请选择会员…</option>
					<?php $tmpid["num"] = 0;$vlist=is_array($vlist) ? $vlist : array();$tmpid = array();$tmpid["total"] = count($vlist);$tmpid["index"] = -1;foreach($vlist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<option value="<?php echo $value['id'];?>"><?php echo $value['user'];?><?php if($value['mobile']){ ?>_<?php echo $value['mobile'];?><?php } ?></option>
					<?php } ?>
				</select>
			</li>
			<li id="from_uid_other" class="hide">
				<input type="text" name="username" id="username" placeholder="请填写会员账号" />
			</li>
		</ul>
	</div>
</div>
<div class="table">
	<div class="content">
		<ul class="layout">
			<li style="width:60px;text-align:right">备注：</li>
			<li>
				<div><input type="text" name="note" id="note" class="default" /></div>
				<div class="button-group" style="margin-top:5px;">
					<input type="button" value="赠送" onclick="$('#note').val('赠送')" class="phpok-btn" />
					<input type="button" value="提成" onclick="$('#note').val('提成')" class="phpok-btn" />
					<input type="button" value="返利" onclick="$('#note').val('返利')" class="phpok-btn" />
					<input type="button" value="<?php echo P_Lang("清空");?>" onclick="$('#note').val('')" class="phpok-btn" />
				</div>
			</li>
		</ul>
	</div>
</div>
<div class="table">
	<div class="content">
		<ul class="layout">
			<li style="width:60px;text-align:right">时间：</li>
			<li><input type="text" name="dateline" id="dateline" class="default" value="<?php echo date('Y-m-d H:i:s',$sys['time']);?>" /></li>
		</ul>
	</div>
</div>
</form>
<?php $this->output("foot_open","file",true,false); ?>