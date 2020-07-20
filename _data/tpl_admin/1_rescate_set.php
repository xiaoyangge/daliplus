<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<form method="post" class="layui-form" id="catesubmit">
<?php if($id && $rs){ ?><input type="hidden" name="id" id="id" value="<?php echo $rs['id'];?>" /><?php } ?>
<div class="layui-card">
	<div class="layui-card-body">
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("分类名称");?></label>
			<div class="layui-input-inline default-auto">
				<input type="text" name="title" id="title" value="<?php echo $rs['title'];?>" class="layui-input">
			</div>
			<div class="layui-form-mid layui-word-aux"><?php echo P_Lang("请设置附件分类名称，如图片库，影音库等，以方便管理");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("存储目录");?></label>
			<div class="layui-input-inline default-auto">
				<input type="text" name="root" id="root" value="<?php echo $rs['root'];?>" class="layui-input">
			</div>
			<div class="layui-form-mid layui-word-aux"><?php echo P_Lang("相对于程序的根目而设，建议设置在res/之下的目录");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("子文件夹");?></label>
			<div class="layui-input-inline default-auto">
				<select name="folder">
					<option value=""><?php echo P_Lang("不创建文件夹");?></option>
					<option value="Ym/d/"<?php if($rs['folder'] == 'Ym/d/'){ ?>selected<?php } ?>><?php echo P_Lang("年月/日/，示例");?> <?php echo date('Ym/d/');?></option>
					<option value="Y/m/d/"<?php if($rs['folder'] == 'Y/m/d/'){ ?>selected<?php } ?>><?php echo P_Lang("年/月/日/，示例");?> <?php echo date('Y/m/d/');?></option>
					<option value="Ymd/"<?php if($rs['folder'] == 'Ymd/'){ ?>selected<?php } ?>><?php echo P_Lang("年月日/，示例");?> <?php echo date('Ymd/');?></option>
					<option value="Y/m/"<?php if($rs['folder'] == 'Y/m/'){ ?>selected<?php } ?>><?php echo P_Lang("年/月/，示例");?> <?php echo date('Y/m/');?></option>
					<option value="Y/"<?php if($rs['folder'] == 'Y/'){ ?>selected<?php } ?>><?php echo P_Lang("年/，示例");?> <?php echo date('Y/');?></option>
				</select>
			</div>
			<div class="layui-form-mid layui-word-aux"><?php echo P_Lang("设置是否创建子文件夹");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("存储接口");?>
			</label>
			<div class="layui-input-inline default-auto">
				<select name="etype" id="etype" lay-filter="etype">
					<option value="0"><?php echo P_Lang("本地存储");?></option>
					<?php $tmpid["num"] = 0;$osslist=is_array($osslist) ? $osslist : array();$tmpid = array();$tmpid["total"] = count($osslist);$tmpid["index"] = -1;foreach($osslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<option value="<?php echo $value['id'];?>"<?php if($value['id'] == $rs['etype']){ ?> selected<?php } ?>><?php echo $value['title'];?></option>
					<?php } ?>
				</select>
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("启用云存储后，本地不保存资源");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("上传方式");?>
			</label>
			<div class="layui-input-inline default-auto">
				<select id="upload_binary" name="upload_binary">
					<option value="0"><?php echo P_Lang("传统上传方式");?></option>
					<option value="1"<?php if($rs['upload_binary']){ ?> selected<?php } ?>><?php echo P_Lang("使用二进制上传");?></option>
				</select>
			</div>
			<div class="layui-form-mid layui-word-aux">
				<?php echo P_Lang("仅限本地存储，上传方式才是有效的");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("是否默认");?></label>
			<div class="layui-input-inline auto">
				<input type="checkbox" name="is_default" id="is_default" lay-skin="switch" value="1" <?php if($rs['is_default']){ ?> checked<?php } ?>>
			</div>
			<div class="layui-form-mid layui-word-aux"><?php echo P_Lang("当前端或未指定附件分类时，将使用这个默认来读取。整个附件分类管理中仅限支持一个");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("附件类型");?></label>
			<div class="layui-input-inline default-auto">
				<input type="text" id="filetypes" name="filetypes" value="<?php echo $rs['filetypes'];?>" class="layui-input">
			</div>
			<div class="layui-form-mid layui-word-aux"><?php echo P_Lang("多种附件类型用英文逗号隔开，如jpg,gif,png，以此类推");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("类型说明");?></label>
			<div class="layui-input-inline auto">
				<input type="text" id="typeinfo" name="typeinfo" value="<?php echo $rs['typeinfo'];?>" class="layui-input">
			</div>
			<div class="layui-form-mid layui-word-aux"><?php echo P_Lang("描述附件类型信息，如jpg,gif,png，可以描述为图片，rar,zip等可以描述为压缩文件");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("大小限制");?></label>
			<div class="layui-input-inline short">
				<input type="text" id="filemax" name="filemax" value="<?php echo $rs['filemax'];?>" class="layui-input">
			</div>
			<div class="layui-form-mid layui-word-aux"><?php echo P_Lang("设置单个文件大小，单位是KB，只需填写数值，本地存储建议不超过系统限制");?> <span class="layui-bg-red"><?php echo get_cfg_var('upload_max_filesize');?>B</span></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("图片压缩");?>
			</label>
			<div class="layui-input-inline default-auto">
				<select id="compress" name="compress">
					<option value="0"><?php echo P_Lang("不压缩");?></option>
					<option value="500"><?php echo P_Lang("压缩图片仅当宽或高不小于");?> 500px</option>
					<option value="600"><?php echo P_Lang("压缩图片仅当宽或高不小于");?> 600px</option>
					<option value="700"><?php echo P_Lang("压缩图片仅当宽或高不小于");?> 700px</option>
					<option value="800"><?php echo P_Lang("压缩图片仅当宽或高不小于");?> 800px</option>
					<option value="900"><?php echo P_Lang("压缩图片仅当宽或高不小于");?> 900px</option>
					<option value="1000"><?php echo P_Lang("压缩图片仅当宽或高不小于");?> 1000px</option>
					<option value="1100"><?php echo P_Lang("压缩图片仅当宽或高不小于");?> 1100px</option>
					<option value="1200"><?php echo P_Lang("压缩图片仅当宽或高不小于");?> 1200px</option>
					<option value="1300"><?php echo P_Lang("压缩图片仅当宽或高不小于");?> 1300px</option>
					<option value="1400"><?php echo P_Lang("压缩图片仅当宽或高不小于");?> 1400px</option>
					<option value="1500"><?php echo P_Lang("压缩图片仅当宽或高不小于");?> 1500px</option>
					<option value="1600"><?php echo P_Lang("压缩图片仅当宽或高不小于");?> 1600px</option>
					<option value="1700"><?php echo P_Lang("压缩图片仅当宽或高不小于");?> 1700px</option>
					<option value="1800"><?php echo P_Lang("压缩图片仅当宽或高不小于");?> 1800px</option>
				</select>
			</div>
			<div class="layui-form-mid layui-word-aux">
				<?php echo P_Lang("仅限有图片时才执行，注意，这里压缩的是原图");?>
			</div>
		</div>	
		<input type="hidden" name="gdall" value="1" />
		<input type="hidden" name="ico" value="1" />
	</div>
</div>
<div class="submit-info-clear"></div>
<div class="submit-info">
	<div class="layui-container center">
		<input type="submit" value="<?php echo P_Lang("提交");?>" class="layui-btn layui-btn-lg layui-btn-danger" />
		<input type="button" value="<?php echo P_Lang("取消关闭");?>" class="layui-btn layui-btn-lg layui-btn-primary" onclick="$.admin.close()" />
	</div>
</div>
</form>
<?php $this->output("foot_lay","file",true,false); ?>