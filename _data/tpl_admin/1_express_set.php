<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<script type="text/javascript">
function submit_save()
{
	
}
</script>
<form method="post" class="layui-form" id="postsave" onsubmit="return $.admin_express.save()">
<?php if($id){ ?><input type="hidden" name="id" id="id" value="<?php echo $id;?>" /><?php } ?>
<input type="hidden" name="code" id="code" value="<?php echo $code;?>" />
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("当前使用接口");?> <span class="red"><?php echo $extlist['title'];?></span>
	</div>
	<div class="layui-card-body">
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("物流名称");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" name="title" id="title" value="<?php echo $rs['title'];?>" class="layui-input" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("填写常用的名称，如顺丰快递，中通快递等易识别名称");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("公司名");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" id="company" name="company" class="layui-input" value="<?php echo $rs['company'];?>" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("填写该物流或快递所属公司全称");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("官方网站");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" id="homepage" name="homepage" class="layui-input" value="<?php echo $rs['homepage'];?>" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("请填写官方网站，建议以http://或https://开头");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				Logo
			</label>
			<div class="layui-input-inline default-auto">
				<?php echo form_edit('logo',$rs['logo'],'text','form_btn=image');?>
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("请上传物流快递Logo");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("公司介绍");?>
			</label>
			<div class="layui-input-block gray" style="line-height:38px;"><?php echo P_Lang("介绍该物流公司的一些情况");?></div>
			<div class="layui-input-block">
				<?php echo form_edit('content',$rs['content'],'editor','height=360&btn_image=1');?>
			</div>
		</div>
	</div>
</div>
<?php if($extlist['code']){ ?>


<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("接口涉及到的参数");?>
	</div>
	<div class="layui-card-body">
		<?php $extlist_code_id["num"] = 0;$extlist['code']=is_array($extlist['code']) ? $extlist['code'] : array();$extlist_code_id = array();$extlist_code_id["total"] = count($extlist['code']);$extlist_code_id["index"] = -1;foreach($extlist['code'] as $key=>$value){ $extlist_code_id["num"]++;$extlist_code_id["index"]++; ?>
		<?php $valinfo = ($rs['ext'] && $rs['ext'][$key]) ? $rs['ext'][$key] : $value['default'];?>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo $value['title'];?>
			</label>
			<div class="layui-input-block">
				<?php if($value['type'] == 'radio'){ ?>
					<?php $value_option_id["num"] = 0;$value['option']=is_array($value['option']) ? $value['option'] : array();$value_option_id = array();$value_option_id["total"] = count($value['option']);$value_option_id["index"] = -1;foreach($value['option'] as $k=>$v){ $value_option_id["num"]++;$value_option_id["index"]++; ?>
					<input type="radio" name="<?php echo $code;?>_<?php echo $key;?>" value="<?php echo $k;?>"<?php if($valinfo == $k){ ?> checked<?php } ?> title="<?php echo $v;?>" />
					<?php } ?>
				<?php }elseif($value['type'] == 'select'){ ?>
				<select name="<?php echo $code;?>_<?php echo $key;?>" id="<?php echo $code;?>_<?php echo $key;?>" lay-search>
					<option value=""><?php echo P_Lang("请选择…");?></option>
					<?php $value_option_id["num"] = 0;$value['option']=is_array($value['option']) ? $value['option'] : array();$value_option_id = array();$value_option_id["total"] = count($value['option']);$value_option_id["index"] = -1;foreach($value['option'] as $k=>$v){ $value_option_id["num"]++;$value_option_id["index"]++; ?>
					<option value="<?php echo $k;?>"<?php if($valinfo == $k){ ?> selected<?php } ?>><?php echo $v;?></option>
					<?php } ?>
				</select>
				<?php }elseif($value['type'] == 'checkbox'){ ?>
				<?php $valinfo = $valinfo ? explode(',',$valinfo) : array();?>
					<?php $value_option_id["num"] = 0;$value['option']=is_array($value['option']) ? $value['option'] : array();$value_option_id = array();$value_option_id["total"] = count($value['option']);$value_option_id["index"] = -1;foreach($value['option'] as $k=>$v){ $value_option_id["num"]++;$value_option_id["index"]++; ?>
					<input type="checkbox" name="<?php echo $code;?>_<?php echo $k;?>" value="<?php echo $k;?>"<?php if(in_array($k,$valinfo)){ ?> checked<?php } ?> title="<?php echo $v;?>" />
					<?php } ?>
				<?php } else { ?>
					<?php $input_name = $code.'_'.$key;?>
					<?php if($value['typebtn'] == 'file'){ ?>
					<?php echo form_edit($input_name,$valinfo,'text','form_btn=file&width=500');?>
					<?php }elseif($value['typebtn'] == 'image'){ ?>
					<?php echo form_edit($input_name,$valinfo,'text','form_btn=image&width=500');?>
					<?php }elseif($value['typebtn'] == 'video'){ ?>
					<?php echo form_edit($input_name,$valinfo,'text','form_btn=video&width=500');?>
					<?php } else { ?>
					<input type="text" id="<?php echo $code;?>_<?php echo $key;?>" name="<?php echo $code;?>_<?php echo $key;?>" class="layui-input" value="<?php echo $valinfo;?>" />
						<?php if($value['typebtn'] == 'tpl'){ ?>
						<input type="button" value="<?php echo P_Lang("选择");?>" onclick="phpok_tpl_open('<?php echo $code;?>_<?php echo $key;?>')" class="btn" />
						<input type="button" value="<?php echo P_Lang("清空");?>" onclick="$('#<?php echo $code;?>_<?php echo $key;?>').val('');" class="btn" />
						<?php } ?>
					<?php } ?>
				<?php } ?>
			</div>
			<?php if($value['note']){ ?><div class="layui-input-block mtop"><?php echo $value['note'];?></div><?php } ?>
		</div>
		<?php } ?>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("查询频率");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="radio" name="rate" value="2"<?php if($rs['rate'] == 2){ ?> checked<?php } ?> title="<?php echo P_Lang("两小时");?>" />
				<input type="radio" name="rate" value="4"<?php if($rs['rate'] == 4){ ?> checked<?php } ?> title="<?php echo P_Lang("四小时");?>" />
				<input type="radio" name="rate" value="6"<?php if($rs['rate'] == 6){ ?> checked<?php } ?> title="<?php echo P_Lang("六小时");?>" />
				<input type="radio" name="rate" value="8"<?php if($rs['rate'] == 8){ ?> checked<?php } ?> title="<?php echo P_Lang("八小时");?>" />
				<input type="radio" name="rate" value="10"<?php if($rs['rate'] == 10 || !$rs['rate']){ ?> checked<?php } ?> title="<?php echo P_Lang("十小时");?>" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("请选择间隔多长时间进行物流查询，以保证数据高效");?>
			</div>
		</div>
		
	</div>
</div>
<?php } ?>
<div class="submit-info-clear"></div>
<div class="submit-info">
	<div class="layui-container center">
		<input type="submit" value="<?php echo P_Lang("保存数据");?>" class="layui-btn layui-btn-danger" id="save_button" />
		<input type="button" value="<?php echo P_Lang("关闭");?>" class="layui-btn layui-btn-primary" onclick="$.admin.close()" />
		<?php if($id){ ?><span style="padding-left:2em;color:#ccc;">保存不会关闭页面，请手动关闭</span><?php } ?>
	</div>
</div>

</form>

<?php $this->output("foot_lay","file",true,false); ?>