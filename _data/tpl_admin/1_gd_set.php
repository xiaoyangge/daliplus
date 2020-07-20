<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<script type="text/javascript" src="js/jscolor/jscolor.js"></script>
<form method="post" class="layui-form" id='gdsetting' onsubmit="return $.admin_gd.save()">
<?php if($id){ ?>
<input type="hidden" id="id" name="id" value="<?php echo $id;?>" />
<?php } ?>
<div class="layui-card">
	<div class="layui-card-body">
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("标识");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" id="identifier" name="identifier" class="layui-input<?php if($id){ ?> layui-btn-disabled<?php } ?>" value="<?php echo $rs['identifier'];?>"<?php if($id){ ?> disabled<?php } ?> />
			</div>
			<?php if(!$id){ ?>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("标识必须是唯一的，添加后不能修改");?></div>
			<?php } ?>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("图片宽高");?>
			</label>
			
			<div class="layui-input-inline" style="width:80px">
				<input type="text" id="width" name="width" class="layui-input" value="<?php echo $rs['width'];?>" />
			</div>
			<div class="layui-form-mid">-</div>
			<div class="layui-input-inline" style="width:80px">
				<input type="text" id="height" name="height" class="layui-input" value="<?php echo $rs['height'];?>" />
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("设置宽度及高度，仅支持数字，不限请设为0");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("水印");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" id="mark_picture" name="mark_picture" class="layui-input" value="<?php echo $rs['mark_picture'];?>" />
			</div>
			<div class="layui-input-inline auto">
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("选择");?>" onclick="phpok_pic('mark_picture')" class="layui-btn" />
					<input type="button" value="<?php echo P_Lang("预览");?>" onclick="phpok_pic_view('mark_picture')" class="layui-btn" />
					<input type="button" value="<?php echo P_Lang("清空");?>" onclick="$('#mark_picture').val('');" class="layui-btn layui-btn-warm" />
				</div>
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("设置水印图片，这里推荐使用PNG透明水印");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("水印位置");?>
			</label>
			<div class="layui-input-inline default-auto">
				<table>
				<tr>
					<td><input type="radio" name="mark_position" id="mark_position_1" value="top-left"<?php if($rs['mark_position'] == "top-left"){ ?> checked<?php } ?> title="<?php echo P_Lang("左上");?>" /></td>
					<td><input type="radio" name="mark_position" id="mark_position_2" value="top-middle"<?php if($rs['mark_position'] == "top-middle"){ ?> checked<?php } ?> title="<?php echo P_Lang("中上");?>" /></td>
					<td><input type="radio" name="mark_position" id="mark_position_3" value="top-right"<?php if($rs['mark_position'] == "top-right"){ ?> checked<?php } ?> title="<?php echo P_Lang("右上");?>" /></td>
				</tr>
				<tr>
					<td><input type="radio" name="mark_position" id="mark_position_4" value="middle-left"<?php if($rs['mark_position'] == "middle-left"){ ?> checked<?php } ?> title="<?php echo P_Lang("左中");?>" /></td>
					<td><input type="radio" name="mark_position" id="mark_position_5" value="middle-middle"<?php if($rs['mark_position'] == "middle-middle"){ ?> checked<?php } ?> title="<?php echo P_Lang("中间");?>" /></td>
					<td><input type="radio" name="mark_position" id="mark_position_6" value="middle-right"<?php if($rs['mark_position'] == "middle-right"){ ?> checked<?php } ?> title="<?php echo P_Lang("右中");?>" /></td>
				</tr>
				<tr>
					<td><input type="radio" name="mark_position" id="mark_position_7" value="bottom-left"<?php if($rs['mark_position'] == "bottom-left"){ ?> checked<?php } ?> title="<?php echo P_Lang("左下");?>" /></td>
					<td><input type="radio" name="mark_position" id="mark_position_8" value="bottom-middle"<?php if($rs['mark_position'] == "bottom-middle"){ ?> checked<?php } ?> title="<?php echo P_Lang("中下");?>" /></td>
					<td><input type="radio" name="mark_position" id="mark_position_9" value="bottom-right"<?php if($rs['mark_position'] == "bottom-right" || !$rs['mark_position']){ ?> checked<?php } ?> title="<?php echo P_Lang("右下");?>" /></td>
				</tr>
				</table>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("透明度");?>
			</label>
			<div class="layui-input-inline default-auto">
				<select name="trans" id="trans">
					<option value="0"<?php if(!$rs['trans']){ ?> selected<?php } ?>><?php echo P_Lang("完全透明");?></option>
					<option value="10"<?php if($rs['trans'] == "10"){ ?> selected<?php } ?>>10</option>
					<option value="20"<?php if($rs['trans'] == "20"){ ?> selected<?php } ?>>20</option>
					<option value="30"<?php if($rs['trans'] == "30"){ ?> selected<?php } ?>>30</option>
					<option value="40"<?php if($rs['trans'] == "40"){ ?> selected<?php } ?>>40</option>
					<option value="50"<?php if($rs['trans'] == "50"){ ?> selected<?php } ?>>50<?php echo P_Lang("（半透明）");?></option>
					<option value="60"<?php if($rs['trans'] == "60"){ ?> selected<?php } ?>>60</option>
					<option value="70"<?php if($rs['trans'] == "70"){ ?> selected<?php } ?>>70</option>
					<option value="80"<?php if($rs['trans'] == "80"){ ?> selected<?php } ?>>80</option>
					<option value="90"<?php if($rs['trans'] == "90"){ ?> selected<?php } ?>>90</option>
					<option value="100"<?php if($rs['trans'] == "100"){ ?> selected<?php } ?>><?php echo P_Lang("不透明");?></option>
				</select>
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("仅JPG水印有效，建议设为60");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("图片质量");?>
			</label>
			<div class="layui-input-inline default-auto">
				<select id="quality" name="quality">
					<option value="60"<?php if($rs['quality'] == "60"){ ?> selected<?php } ?>><?php echo P_Lang("较小文件");?></option>
					<option value="80"<?php if($rs['quality'] == "80" || !$rs['quality']){ ?> selected<?php } ?>><?php echo P_Lang("高质量");?></option>
					<option value="100"<?php if($rs['quality'] == "100"){ ?> selected<?php } ?>><?php echo P_Lang("百分百精度");?></option>
				</select>
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("仅JPG图片有效，建议设为高质量，兼顾大小及精度");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("缩图方式");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="radio" name="cut_type" title="<?php echo P_Lang("缩放法");?>" value="0"<?php if(!$rs['cut_type']){ ?> checked<?php } ?> />
				<input type="radio" name="cut_type" title="<?php echo P_Lang("裁剪法");?>" value="1"<?php if($rs['cut_type']){ ?> checked<?php } ?> />
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("建议大图用缩放法，小图用裁剪法");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("背景颜色");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" id="bgcolor" name="bgcolor" value="<?php echo $rs['bgcolor'];?>" class="layui-input color {pickerClosable:true}" />
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("即填充色，默认为白色");?></div>
		</div>		
	</div>
</div>
<div class="clear"></div>
<div class="submit-info">
	<div class="layui-container center">
		<input type="submit" value="<?php echo P_Lang("提交");?>" class="layui-btn layui-btn-lg layui-btn-danger" />
		<input type="button" value="<?php echo P_Lang("取消关闭");?>" class="layui-btn layui-btn-lg layui-btn-primary" onclick="$.admin.close()" />
	</div>
</div>

</form>
<?php $this->output("foot_lay","file",true,false); ?>