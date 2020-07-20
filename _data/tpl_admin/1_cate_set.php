<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<script type="text/javascript" src="<?php echo include_js('cate.js');?>"></script>
<form method="post" id="post_save" class="layui-form" onsubmit="return $.admin_cate.save()">
<?php if($id){ ?><input type="hidden" id="id" name="id" value="<?php echo $id;?>" /><?php } ?>
<div class="layui-card">
	<div class="layui-card-header"><?php echo P_Lang("基本设置");?></div>
	<div class="layui-card-body">
		<input type="hidden" name="style" id="style" value="<?php echo $rs['style'];?>" />
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("分类名称");?></label>
			<div class="layui-input-block">
				<div class="layui-col-md10">
					<input type="text" id="title" name="title" class="layui-input" value="<?php echo $rs['title'];?>" style="<?php echo $rs['style'];?>" placeholder="<?php echo P_Lang("在前台显示的名称信息");?>" />
				</div>
				<div class="layui-col-md1" style="margin-left:10px;">
					<button type="button" class="layui-btn layui-btn-sm" onclick="$.admin_cate.style_setting('style','title')">
						<i class="layui-icon">&#xe64e;</i> <?php echo P_Lang("样式");?>
					</button>
				</div>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<i class="layui-icon layui-tips" lay-tips="<?php echo P_Lang("字母、数字、下划线或中划线且必须是字母开头");?>">&#xe702;</i>
				<?php echo P_Lang("标识");?>
			</label>
			<div class="layui-input-inline default">
				<input type="text" id="identifier" name="identifier" class="layui-input" value="<?php echo $rs['identifier'];?>" />
			</div>
			<div class="layui-input-inline auto" id="HTML-POINT-PHPOK-IDENTIFIER"></div>
		</div>
		<?php if($parent_id){ ?>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("父级分类");?></label>
			<div class="layui-input-block">
				<select name="parent_id" id="parent_id">
					<?php $tmpid["num"] = 0;$parentlist=is_array($parentlist) ? $parentlist : array();$tmpid = array();$tmpid["total"] = count($parentlist);$tmpid["index"] = -1;foreach($parentlist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<option value="<?php echo $value['id'];?>"<?php if($value['id'] == $parent_id){ ?> selected<?php } ?>><?php echo $value['_space'];?><?php echo $value['title'];?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<?php } else { ?>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("模块");?>
			</label>
			<div class="layui-input-inline default-auto">
				<select name="module_id" id="module_id">
					<option value=""><?php echo P_Lang("请选择模块");?></option>
					<?php $tmpid["num"] = 0;$mlist=is_array($mlist) ? $mlist : array();$tmpid = array();$tmpid["total"] = count($mlist);$tmpid["index"] = -1;foreach($mlist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<option value="<?php echo $value['id'];?>"<?php if($value['id'] == $rs['module_id']){ ?> selected<?php } ?>><?php echo $value['title'];?></option>
					<?php } ?>
				</select>
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("绑定模块后，如果已添加了子分类，绑定的模块不能更新");?>
			</div>
		</div>
		<?php } ?>
		<?php $tmpid["num"] = 0;$clist=is_array($clist) ? $clist : array();$tmpid = array();$tmpid["total"] = count($clist);$tmpid["index"] = -1;foreach($clist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<div class="layui-form-item">
			<label class="layui-form-label" style="padding-top:0;">
				<?php echo $value['title'];?><div class="darkblue"><small>[<?php echo $value['identifier'];?>]</small></div>
			</label>
			<?php if($value['note']){ ?><div class="layui-input-block gray" style="line-height:38px;"><?php echo $value['note'];?></div><?php } ?>
			<div class="layui-input-block"><?php echo $value['html'];?></div>
		</div>
		<?php } ?>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("排序");?></label>
			<div class="layui-input-inline">
				<input type="number" id="taxis"  name="taxis" max="255" min="0" class="layui-input" value="<?php echo $rs['taxis'] ? $rs['taxis'] : 255;?>" />
			</div>
			<div class="layui-input-inline auto"><?php echo P_Lang("值越小越往前靠，最小值为0，最大值为255");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("状态");?></label>
			<div class="layui-input-block">
				<input type="radio" name="status" value="0" title="<?php echo P_Lang("禁用");?>"<?php if($id && !$rs['status']){ ?> checked<?php } ?> />
      			<input type="radio" name="status" value="1" title="<?php echo P_Lang("使用");?>" <?php if(!$id || $rs['status']){ ?> checked<?php } ?> />
			</div>
		</div>
		<?php $tmpid["num"] = 0;$extlist=is_array($extlist) ? $extlist : array();$tmpid = array();$tmpid["total"] = count($extlist);$tmpid["index"] = -1;foreach($extlist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo $value['title'];?>
				<div class="darkblue"><small>[<?php echo $value['identifier'];?>]</small></div>
			</label>
			<?php if($value['note']){ ?><div class="layui-input-block gray" style="line-height:38px;"><?php echo $value['note'];?></div><?php } ?>
			<div class="layui-input-block"><?php echo $value['html'];?></div>
			<?php if($popedom['ext'] && $session['adm_develop']){ ?>
			<div class="layui-input-block mtop">
				<div class="layui-btn-group">
					<?php if($ext_module != 'add-cate'){ ?>
					<input type="button" value="<?php echo P_Lang("编辑");?>" class="layui-btn layui-btn-xs" onclick="ext_edit('<?php echo $value['identifier'];?>','<?php echo $ext_module;?>')" />
					<?php } ?>
					<input type="button" value="<?php echo P_Lang("删除");?>" class="layui-btn layui-btn-xs layui-btn-danger" onclick="ext_delete('<?php echo $value['identifier'];?>','<?php echo $ext_module;?>','<?php echo $value['title'];?>')" />
				</div>
			</div>
			<?php } ?>
		</div>
		<?php } ?>
		<?php if($popedom['ext'] && $session['adm_develop']){ ?>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("扩展字段");?></label>
			<div class="layui-input-inline default">
				<select id="_tmp_select_add" style="padding:3px">
					<option value=""><?php echo P_Lang("请选择要添加的扩展字段…");?></option>
					<?php $extfields_id["num"] = 0;$extfields=is_array($extfields) ? $extfields : array();$extfields_id = array();$extfields_id["total"] = count($extfields);$extfields_id["index"] = -1;foreach($extfields as $key=>$value){ $extfields_id["num"]++;$extfields_id["index"]++; ?>
					<?php if(!$used_fields || ($used_fields && !in_array($value['identifier'],$used_fields))){ ?>
					<option value="<?php echo $value['identifier'];?>"><?php echo $value['title'];?> - <?php echo $value['identifier'];?></option>
					<?php } ?>
					<?php } ?>
				</select>
			</div>
			<div class="layui-input-inline auto">
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("快速添加");?>" onclick="$.admin_cate.ext_add('<?php echo $ext_module;?>')"  class="layui-btn" />
					<input type="button" value="<?php echo P_Lang("创建新的扩展字段");?>" onclick="ext_add('<?php echo $ext_module;?>')" class="layui-btn" />
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<div class="layui-card">
	<div class="layui-card-header"><?php echo P_Lang("分类属性");?></div>
	<div class="layui-card-body">
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("默认主题数");?></label>
			<div class="layui-input-inline">
				<input type="number" id="psize" min="0" max="999" name="psize" value="<?php echo $rs['psize'];?>" class="layui-input" />
			</div>
			<div class="layui-input-inline auto"><?php echo P_Lang("启用此项将替换项目中的设置，设为0表示读取项目中的设置");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("API 默认数");?></label>
			<div class="layui-input-inline">
				<input type="number" id="psize_api" min="0" max="999" name="psize_api" value="<?php echo $rs['psize_api'];?>" class="layui-input" />
			</div>
			<div class="layui-input-inline auto"><?php echo P_Lang("启用此项将替换项目中的设置，设为0表示读取项目中的设置");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("列表模板");?></label>
			<div class="layui-input-inline default">
				<input type="text" id="tpl_list" name="tpl_list" class="layui-input" value="<?php echo $rs['tpl_list'];?>" />
			</div>
			<div class="layui-input-inline">
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("选择");?>" onclick="phpok_tpl_open('tpl_list')" class="layui-btn" />
					<input type="button" value="<?php echo P_Lang("清空");?>" onclick="$('#tpl_list').val('');" class="layui-btn" />
				</div>
			</div>
			<div class="layui-input-inline auto"><?php echo P_Lang("此处设置自定义模板，将替代项目中的模板设置");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("内容模板");?></label>
			<div class="layui-input-inline default">
				<input type="text" id="tpl_content" name="tpl_content" class="layui-input" value="<?php echo $rs['tpl_content'];?>" />
			</div>
			<div class="layui-input-inline">
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("选择");?>" onclick="phpok_tpl_open('tpl_content')" class="layui-btn" />
					<input type="button" value="<?php echo P_Lang("清空");?>" onclick="$('#tpl_content').val('');" class="layui-btn" />
				</div>
			</div>
			<div class="layui-input-inline auto"><?php echo P_Lang("此处设置自定义模板，将替代项目中的模板设置");?></div>
		</div>
		<?php if($popedom['ext'] && $extfields && !$parent_id){ ?>
		<div class="layui-form-item">
			<label class="layui-form-label layui-tips" lay-tips="<?php echo P_Lang("此项用于配置默认的子项扩展字段属性，留空表示不添加子分类扩展字段");?>"><?php echo P_Lang("子类扩展");?></label>
			<div class="layui-input-block">
				<?php $tmpid["num"] = 0;$extfields=is_array($extfields) ? $extfields : array();$tmpid = array();$tmpid["total"] = count($extfields);$tmpid["index"] = -1;foreach($extfields as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<input type="checkbox" name="_extfields[]" value="<?php echo $key;?>"<?php if($ext2 && in_array($key,$ext2)){ ?> checked<?php } ?> lay-skin="primary" title="<?php echo $value['title'];?>" />
				<?php } ?>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<div class="layui-card">
	<div class="layui-card-header"><?php echo P_Lang("SEO优化");?></div>
	<div class="layui-card-body">
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("SEO标题");?></label>
			<div class="layui-input-inline long">
				<input type="text" id="seo_title" name="seo_title" class="layui-input" value="<?php echo $rs['seo_title'];?>" />
			</div>
			<div class="layui-input-inline auto"><?php echo P_Lang("设置此标题后，网站Title将会替代默认定义的，不能超过85个汉字");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("SEO关键字");?></label>
			<div class="layui-input-inline long">
				<input type="text" id="seo_keywords" name="seo_keywords" class="layui-input" value="<?php echo $rs['seo_keywords'];?>" />
			</div>
			<div class="layui-input-inline auto"><?php echo P_Lang("多个关键字用英文逗号或英文竖线隔开");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("SEO描述");?></label>
			<div class="layui-input-inline long">
				<textarea name="seo_desc" id="seo_desc" class="layui-textarea"><?php echo $rs['seo_desc'];?></textarea>
			</div>
			<div class="layui-input-inline auto"><?php echo P_Lang("简单描述该主题信息，不支持HTML，不能超过85个汉字");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("标签Tag");?></label>
			<div class="layui-input-inline long">
				<input type="text" id="tag" name="tag" class="layui-input" value="<?php echo $rs['tag'];?>" />
			</div>
			<div class="layui-input-inline auto"><?php echo P_Lang("多个标签用 [title] 分开，最多不能超过10个",array('title'=>'<span style="color:red">'.$tag_config['separator'].'</span>'));?></div>
		</div>
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