<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><input type="hidden" name="ext_form_id" id="ext_form_id" value="form_btn,ext_format,ext_quick_words,ext_quick_type,ext_include_3" />
<div class="table">
	<div class="title">
		<?php echo P_Lang("扩展按钮：");?>
		<span class="note"><?php echo P_Lang("设置文本框后跟随的按钮");?></span>
	</div>
	<div class="content">
		<table>
		<tr>
			<td>
				<select name="form_btn" id="form_btn" onchange="$._configForm.text('form_btn',this.value)">
					<option value=""><?php echo P_Lang("默认");?></option>
					<option value="date"<?php if($rs['form_btn'] == "date"){ ?> selected<?php } ?>><?php echo P_Lang("日期选择器");?></option>
					<option value="datetime"<?php if($rs['form_btn'] == "datetime"){ ?> selected<?php } ?>><?php echo P_Lang("日期时间选择器");?></option>
					<option value="year"<?php if($rs['form_btn'] == "year"){ ?> selected<?php } ?>><?php echo P_Lang("年份选择器");?></option>
					<option value="month"<?php if($rs['form_btn'] == "month"){ ?> selected<?php } ?>><?php echo P_Lang("年月选择器");?></option>
					<option value="time"<?php if($rs['form_btn'] == "time"){ ?> selected<?php } ?>><?php echo P_Lang("时间选择器");?></option>
					<option value="file"<?php if($rs['form_btn'] == "file"){ ?> selected<?php } ?>><?php echo P_Lang("附件选择");?></option>
					<option value="image"<?php if($rs['form_btn'] == "image"){ ?> selected<?php } ?>><?php echo P_Lang("图片库");?></option>
					<option value="video"<?php if($rs['form_btn'] == "video"){ ?> selected<?php } ?>><?php echo P_Lang("影音列表");?></option>
					<option value="url"<?php if($rs['form_btn'] == "url"){ ?> selected<?php } ?>><?php echo P_Lang("网址");?></option>
					<option value="user"<?php if($rs['form_btn'] == "user"){ ?> selected<?php } ?>><?php echo P_Lang("会员");?></option>
					<option value="color"<?php if($rs['form_btn'] == "color"){ ?> selected<?php } ?>><?php echo P_Lang("颜色选择器");?></option>
				</select>
			</td>
		</tr>
		</table>
	</div>
</div>

<div id="ext_quick_words_html"<?php if($rs['form_btn']){ ?> class="hide"<?php } ?>>
	<div class="table">
		<div class="title">
			<?php echo P_Lang("快捷内容：");?>
			<span class="note"><?php echo P_Lang("一行一个值，使用此项可以通过点击来实现快速输入");?></span>
		</div>
		<div class="content"><textarea name="ext_quick_words" style="width:99%;height:180px;"><?php echo $rs['ext_quick_words'];?></textarea></div>
	</div>
	<div class="table">
		<div class="title">
			<?php echo P_Lang("分割符号：");?>
			<span class="note"><?php echo P_Lang("确认使用哪种分割，不清楚请使用覆盖");?></span>
		</div>
		<div class="content">
			<ul class="layout">
				<li><input type="text" name="ext_quick_type" id="ext_quick_type" value="<?php echo $rs['ext_quick_type'];?>" /></li>
				<li>
					<div class="button-group">
						<input type="button" value="<?php echo P_Lang("覆盖");?>" onclick="$._configForm.text('eqt','none')" class="layui-btn" />
						<input type="button" value="<?php echo P_Lang("逗号");?>" onclick="$._configForm.text('eqt',',')" class="layui-btn" />
						<input type="button" value="<?php echo P_Lang("斜杠");?>" onclick="$._configForm.text('eqt','/')" class="layui-btn" />
						<input type="button" value="<?php echo P_Lang("竖线");?>" onclick="$._configForm.text('eqt','|')" class="layui-btn" />
						<input type="button" value="<?php echo P_Lang("冒号");?>" onclick="$._configForm.text('eqt',':')" class="layui-btn" />
					</div>
				</li>
			</ul>
			
		</div>
	</div>
</div>
<div id="ext_color_html"<?php if(!$rs['form_btn'] || $rs['form_btn'] != 'color'){ ?> class="hide"<?php } ?>>
	<div class="table">
		<div class="title">
			<?php echo P_Lang("颜色值加井号");?>
			<span class="note"><?php echo P_Lang("请选择颜色值是否加 # 符号");?></span>
		</div>
		<div class="content">
			<ul class="layout">
				<li><label><input type="radio" name="ext_include_3" value="0"<?php if(!$rs['ext_include_3']){ ?> checked<?php } ?> /><?php echo P_Lang("不包含");?></label></li>
				<li><label><input type="radio" name="ext_include_3" value="1"<?php if($rs['ext_include_3']){ ?> checked<?php } ?> /><?php echo P_Lang("包含");?></label></li>
			</ul>
		</div>
	</div>
</div>