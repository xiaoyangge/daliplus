<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("nopadding","true"); ?><?php $this->output("head_lay","file",true,false); ?>
<?php if($sys['ctrl'] != 'res'){ ?>
<script type="text/javascript" src="<?php echo phpok_url(array('ctrl'=>'js','func'=>'ext','js'=>'admin.res.js'));?>"></script>
<?php } ?>
<script type="text/javascript">
function save()
{
	var obj = art.dialog.opener;
	$("#editopen").ajaxSubmit({
		'url':get_url('res','setok'),
		'type':'post',
		'dataType':'json',
		'success':function(rs){
			if(rs.status){
				$.dialog.close();
				$.dialog.tips(p_lang('附件信息修改成功'));
				return true;
			}
			$.dialog.alert(rs.info);
			return false;
		}
	});
	return true;
}
function download_it(id)
{
	var url = get_url("res","download") + "&id="+id;
	$.phpok.go(url);
}
</script>
<div class="layui-card">
	<div class="layui-card-body">
		<form method="post" id="editopen" class="layui-form" onsubmit="return false;">
		<input type="hidden" id="id" name="id" value="<?php echo $rs['id'];?>" />
		<div class="layui-form-item">
			<label class="layui-form-label">
				<i class="layui-icon layui-tips" lay-tips="<?php echo P_Lang("设置附件的名称，以方便管理");?>">&#xe702;</i>
				<?php echo P_Lang("附件名称");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" id="title" name="title" class="layui-input" value="<?php echo $rs['title'];?>" />
			</div>
			<?php if($file_is_local){ ?>
			<div class="layui-input-inline auto gray lh38"><input type="button" value="下载" onclick="download_it('<?php echo $rs['id'];?>')" class="layui-btn" /></div>
			<?php } ?>
		</div>
		<?php if($file_is_local){ ?>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("覆盖上传");?>
			</label>
			<div class="layui-input-block">
				<div id="upload_picker"></div>
				<div id="upload_progress"></div>
			</div>
			<div class="layui-input-block mtop">
				<?php echo P_Lang("使用此功能将直接覆盖上传原来附件信息，请慎用");?> <?php echo P_Lang("仅限");?> <span class="red b"><?php echo $rs['ext'];?></span>
			</div>
		</div>
		<?php } ?>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("上传时间");?>
			</label>
			<div class="layui-input-block">
				<input type="text" id="addtime" name="addtime" value="<?php echo date('Y-m-d H:i:s',$rs['addtime']);?>" class="layui-input" disabled />
			</div>
			<div class="layui-input-block mtop"><?php echo P_Lang("不支持修改，上传后自动生成");?></div>
		</div>


		<?php if($rs['attr'] && $rs['attr']['width'] && $rs['attr']['height']){ ?>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("附件宽高");?>
			</label>
			<div class="layui-input-block">
				<table>
				<tr>
					<td><input type="text" disabled name="attr[width]" value="<?php echo $rs['attr']['width'];?>" class="short" /></td>
					<td>&#215;</td>
					<td><input type="text" disabled name="attr[height]" value="<?php echo $rs['attr']['height'];?>" class="short" /></td>
					<?php if($resize){ ?>
					<?php if($rs['ext'] == 'jpg' || $rs['ext'] == 'jpeg'){ ?>
					<td>
						<div style="margin-left:10px;">
						<select id="ptype">
							<option value="60"><?php echo P_Lang("较小文件");?></option>
							<option value="80" selected><?php echo P_Lang("较大文件");?></option>
							<option value="100"><?php echo P_Lang("百分百精度");?></option>
						</select>
						</div>
					</td>
					<?php } ?>
					<td>
						<div style="margin-left:10px;">
						<select id="resize">
							<option value="0"><?php echo P_Lang("默认宽高");?></option>
							<?php if($rs['attr']['width'] > 2048){ ?>
							<option value="2048"><?php echo P_Lang("限宽");?>2048</option>
							<?php } ?>
							<?php if($rs['attr']['width'] > 1024){ ?>
							<option value="1024"><?php echo P_Lang("限宽");?>1024</option>
							<?php } ?>
							<?php if($rs['attr']['width'] > 800){ ?>
							<option value="800"><?php echo P_Lang("限宽");?>800</option>
							<?php } ?>
						</select>
						</div>
					</td>
					<td><div style="margin-left:10px;"><input type="button" value="<?php echo P_Lang("压缩图片");?>" onclick="$.admin_res.zipit('<?php echo $rs['id'];?>','<?php echo $rs['ext'];?>')" class="layui-btn" /></div></td>
					<?php } ?>
				</tr>
				</table>
			</div>
			<div class="layui-input-block mtop">
				<?php echo P_Lang("此参数不允许人工修改，系统自动读取");?>
			</div>
			<?php if($resize && $filesize){ ?>
			<div class="layui-input-block mtop"><?php echo P_Lang("当前文件大小是");?> <span class="red"><?php echo $filesize;?></span></div>
			<?php } ?>
		</div>
		<?php } ?>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("附件说明");?>
			</label>
			<div class="layui-input-block">
				<?php echo $content;?>
			</div>
			<div class="layui-input-block mtop"><?php echo P_Lang("如需对此附件进行说明，可在这里编写");?></div>
		</div>
	</div>
</div>
<?php if($file_is_local){ ?>
<script type="text/javascript">
$(document).ready(function(){
	obj_upload = new $.admin_upload({
		"multiple"	: 'false',
		"id" : "upload",
		'pick':{'id':'#upload_picker','multiple':false},
		'resize':false,
		"swf" : "js/webuploader/uploader.swf",
		"server": "<?php echo phpok_url(array('ctrl'=>'upload','func'=>'replace','oldid'=>$rs['id']));?>",
		"filetypes" : "<?php echo $rs['ext'];?>",
		'accept' : {'title':'附件','extensions':'<?php echo $rs['ext'];?>'},
		"formData" :{'<?php echo session_name();?>':'<?php echo session_id();?>'},
		'fileVal':'upfile',
		'auto':true,
		"success":function(){
			$.phpok.reload();
		}
	});
});
</script>
<?php } ?>


</form>
<?php $this->assign("is_open","true"); ?><?php $this->output("foot_lay","file",true,false); ?>