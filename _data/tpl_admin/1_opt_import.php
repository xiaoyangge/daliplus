<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_open","file",true,false); ?>
<script type="text/javascript">
var obj_upload = {};
var obj = art.dialog.opener;
var id = '<?php echo $id;?>';
var pid = '<?php echo $pid;?>';
$(document).ready(function(){
	obj_upload = new $.admin_upload({
		"multiple"	: false,
		"id" : "upload",
		'pick':{'id':'#upload_picker','multiple':false},
		'resize':false,
		"swf" : "js/webuploader/uploader.swf",
		"server": "<?php echo phpok_url(array('ctrl'=>'upload','func'=>'zip'));?>",
		'accept' : {'title':'<?php echo P_Lang("ZIP包");?>','extensions':'zip'},
		"formData" :{'<?php echo session_name();?>':'<?php echo session_id();?>'},
		'fileVal':'upfile',
		'sendAsBinary':true,
		'auto':false,
		"success":function(file,data){
			if(data.status != 'ok'){
				$.dialog.alert(data.info);
				return false;
			}else{
				var zipfile = data.info;
				var url = get_url('opt','import_data','zipfile='+$.str.encode(data.content));
				if(id){
					url += "&id="+id;
				}
				if(pid){
					url += "&pid="+pid;
				}
				var rs = $.phpok.json(url);
				if(rs.status){
					$.dialog.alert('<?php echo P_Lang("数据导入成功");?>',function(){
						obj.$.phpok.reload();
					});
				}else{
					$.dialog.alert(rs.info,function(){
						$.phpok.reload();
					});
				}
			}
			return true;
		}
	});
	obj_upload.uploader.on('uploadFinished',function(){
		return true;
	});
});
function save()
{
	var f = $("#upload_progress .phpok-upfile-list").length;
	if(f<1){
		$.dialog.alert('请选择要上传的文件');
		return false;
	}
	obj_upload.uploader.upload();
	return false;
}
function cancel()
{
	return obj_upload.uploader.stop();
}
</script>

<div class="table">
	<div class="title">
		<?php echo P_Lang("单个文件上传不能超过：");?>
		<span class="red"><?php echo get_cfg_var('upload_max_filesize');?></span>，仅支持ZIP上传
	</div>
	<div class="content"><div id="upload_picker" class=""></div></div>
</div>

<div class="table">
	<div class="content" id="upload_progress"></div>
</div>
<?php $this->output("foot_open","file",true,false); ?>