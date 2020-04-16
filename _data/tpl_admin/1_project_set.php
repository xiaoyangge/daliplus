<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<form method="post" id="<?php echo $ext_module;?>" class="layui-form" onsubmit="return $.admin_project.save('<?php echo $ext_module;?>')">
<?php if($id){ ?><input type="hidden" id="id" name="id" value="<?php echo $id;?>" /><?php } ?>
<div class="layui-card">
	<div class="layui-card-header"><?php echo P_Lang("基本信息");?></div>
	<div class="layui-card-body">
		<input type="hidden" name="style" id="style" value="<?php echo $rs['style'];?>" />
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("名称");?></label>
			<div class="layui-input-inline default-auto">
				<input type="text" id="title" name="title" class="layui-input" value="<?php echo $rs['title'];?>" style="<?php echo $rs['style'];?>" />
			</div>
			<div class="layui-input-inline auto">
				<button type="button" class="layui-btn layui-btn-sm" onclick="$.admin_project.style_setting('style','title')">
					<i class="layui-icon">&#xe64e;</i> <?php echo P_Lang("样式");?>
				</button>
			</div>
			<div class="layui-input-inline auto gray"><?php echo P_Lang("设置名称，该名称将在网站前台导航中使用");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("项目别名");?></label>
			<div class="layui-input-inline default-auto">
				<input type="text" id="nick_title" name="nick_title" class="layui-input" value="<?php echo $rs['nick_title'];?>" />
			</div>
			<div class="layui-input-inline auto gray"><?php echo P_Lang("此别名功能仅限在后台使用，用于显示在按钮上，一般不要超过6个汉字");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("排序");?></label>
			<div class="layui-input-inline">
				<input type="text" id="taxis" name="taxis" class="layui-input" value="<?php echo $rs['taxis'] ? $rs['taxis'] : '255';?>" />
			</div>
			<div class="layui-input-inline auto gray"><?php echo P_Lang("自定义排序，值越小越往前靠");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("项目属性");?></label>
			<div class="layui-input-inline default-auto">
				<input type="checkbox" name="lock"<?php if(!$rs['status']){ ?> checked<?php } ?> title="<?php echo P_Lang("锁定");?>" class="layui-tips" lay-tips="<?php echo P_Lang("勾选此项后，前台将停用");?>" />
				<input type="checkbox" name="hidden"<?php if($rs['hidden']){ ?> checked<?php } ?> title="<?php echo P_Lang("隐藏");?>" />
			</div>
			<div class="layui-input-inline auto gray"><?php echo P_Lang("设置项目的一些功能，如停用，隐藏，打勾表示启用这个功能");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("父级栏目");?></label>
			<div class="layui-input-inline default-auto">
				<select id="parent_id" name="parent_id">
				<option value="0"><?php echo P_Lang("设为父栏目");?></option>
				<?php $parent_list_id["num"] = 0;$parent_list=is_array($parent_list) ? $parent_list : array();$parent_list_id = array();$parent_list_id["total"] = count($parent_list);$parent_list_id["index"] = -1;foreach($parent_list as $key=>$value){ $parent_list_id["num"]++;$parent_list_id["index"]++; ?>
				<?php if($rs['id'] != $value['id']){ ?>
				<option value="<?php echo $value['id'];?>"<?php if($rs['parent_id'] == $value['id']){ ?> selected<?php } ?>><?php echo $value['title'];?></option>
				<?php } ?>
				<?php } ?>
				</select>
			</div>
			<div class="layui-input-inline auto gray"><?php echo P_Lang("实现父子栏目可以实现数据交叉使用");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("标识");?></label>
			<div class="layui-input-inline default-auto">
				<input type="text" id="identifier" name="identifier" class="layui-input" value="<?php echo $rs['identifier'];?>" />
			</div>
			<div class="layui-input-inline auto" id="HTML-POINT-PHPOK-IDENTIFIER"></div>
			<div class="clear"></div>
			<div class="layui-input-block mtop"><?php echo P_Lang("限");?><span class="red"><?php echo P_Lang("字母、数字、下划线或中划线且必须是字母开头，");?></span><?php echo P_Lang("首页专用请设置为");?><span class="red">index</span></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label title"><?php echo P_Lang("绑定模块");?></label>
			<div class="layui-input-inline auto">
				<select id="module" name="module" onchange="$.admin_project.module_change(this)"lay-ignore>
				<option value="0"><?php echo P_Lang("不关联模块");?></option>
				<?php $module_list_id["num"] = 0;$module_list=is_array($module_list) ? $module_list : array();$module_list_id = array();$module_list_id["total"] = count($module_list);$module_list_id["index"] = -1;foreach($module_list as $key=>$value){ $module_list_id["num"]++;$module_list_id["index"]++; ?>
				<option value="<?php echo $value['id'];?>"<?php if($value['id'] == $rs['module']){ ?> selected<?php } ?> data-mtype="<?php echo $value['mtype'];?>"><?php echo $value['title'];?></option>
				<?php } ?>
				</select>
			</div>
			<div class="layui-input-inline auto gray"><?php echo P_Lang("实现类似新闻，产品等多条项目信息，绑定成功后建议不要修改，以防止数据混乱！");?></div>
		</div>
		<div id="module_set2" class="hidden">
			<div class="layui-form-item">
				<label class="layui-form-label"><?php echo P_Lang("默认主题数");?></label>
				<div class="layui-input-inline default-auto">
					<input type="text" id="psize2" name="psize2" value="<?php echo $rs['psize'] ? $rs['psize'] : 30;?>" class="layui-input" />
				</div>
				<div class="layui-input-inline auto gray"><?php echo P_Lang("设置每页默认的主题数量");?></div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><?php echo P_Lang("API 默认数");?></label>
				<div class="layui-input-inline default-auto">
					<input type="text" id="psize2_api" name="psize2_api" value="<?php echo $rs['psize_api'] ? $rs['psize_api'] : 10;?>" class="layui-input" />
				</div>
				<div class="layui-input-inline auto gray"><?php echo P_Lang("设置 API 默认数量");?></div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">
					<?php echo P_Lang("数据排序");?>
				</label>
				<div class="layui-input-block">
					<ul class="layout">
						<li class="long"><input type="text" id="orderby2" name="orderby2" class="layui-input" value="<?php echo $rs['orderby'] ? $rs['orderby'] : 'id DESC';?>" /></li>
						<li><input type="button" value="<?php echo P_Lang("清空");?>" class="layui-btn layui-btn-danger" onclick="$('input[name=orderby2]').val('')" /></li>
					</ul>
				</div>
				<div class="layui-input-block mtop">
					<div class="layui-btn-group" id="tmp_orderby_btn2">
						<input type="button" value="ID" onclick="phpok_admin_orderby('orderby2','id')" class="layui-btn layui-btn-sm" />
					</div>
				</div>
				<div class="layui-input-block"><?php echo P_Lang("设置好默认排序，有利于网站的管理（前后台一致）");?></div>
			</div>
		</div>

		<div id="module_set" class="hidden">
			<div class="layui-form-item">
				<label class="layui-form-label"><?php echo P_Lang("主题别名");?></label>
				<div class="layui-input-inline default-auto">
					<input type="text" id="alias_title" name="alias_title" class="layui-input" value="<?php echo $rs['alias_title'];?>" />
				</div>
				<div class="layui-input-inline auto gray"><?php echo P_Lang("在使用模块时，会有一个必填选项，即主题，您可在这里设置别名");?></div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><?php echo P_Lang("主题备注");?></label>
				<div class="layui-input-inline long">
					<input type="text" id="alias_note" name="alias_note" class="layui-input" value="<?php echo $rs['alias_note'];?>" />
				</div>
				<div class="layui-input-inline auto gray"><?php echo P_Lang("针对主题的别名设置相应的备注信息");?></div>
			</div>
			<div class="layui-form-item">
				<div id="ext_help" class="hide">
					<table class="layui-table">
						<thead>
						<tr>
							<th>扩展项</th>
							<th>备注</th>
						</tr>
						</thead>
						<tr>
							<td><?php echo P_Lang("主题属性");?></td>
							<td><?php echo P_Lang("相当于给主题增加标签，如精华，推荐，热荐等");?></td>
						</tr>
						<tr>
							<td><?php echo P_Lang("搜索");?></td>
							<td><?php echo P_Lang("勾选此项后，该项目在前台将支持搜索");?></td>
						</tr>
						<tr>
							<td><?php echo P_Lang("下级主题");?></td>
							<td><?php echo P_Lang("启用此项，主题将支持二级，多用于二级导航");?></td>
						</tr>
						<tr>
							<td><?php echo P_Lang("发布");?></td>
							<td><?php echo P_Lang("勾选此项，被授权的用户可以在前台有发布权限");?></td>
						</tr>
						<tr>
							<td><?php echo P_Lang("评论");?></td>
							<td><?php echo P_Lang("即回复功能，勾选后被授权的用户将支持回复，静态页无效");?></td>
						</tr>
						<?php if($config['biz_status']){ ?>
						<tr>
							<td><?php echo P_Lang("电子商务");?></td>
							<td><?php echo P_Lang("启用此项，该主题将支持交易功能");?></td>
						</tr>
						<?php } ?>
						<tr>
							<td><?php echo P_Lang("前台访问");?></td>
							<td><?php echo P_Lang("启用后，可直接在后台里点击进入前台，使用动态地址");?></td>
						</tr>
						<tr>
							<td><?php echo P_Lang("API访问");?></td>
							<td><?php echo P_Lang("启用后，可通过接口获取数据");?></td>
						</tr>
					</table>
					
				</div>
				<label class="layui-form-label"><i class="layui-icon hand" onclick="$.admin_project.ext_help()">&#xe702;</i> <?php echo P_Lang("扩展项");?></label>
				<div class="layui-input-inline" style="width:80%;">
					<ul class="layout">
						<li><input type="checkbox" name="is_attr" title="<?php echo P_Lang("主题属性");?>" class="layui-tips" id="is_attr"<?php if($rs['is_attr']){ ?> checked<?php } ?> /></li>
						<li><input type="checkbox" name="is_search" title="<?php echo P_Lang("搜索");?>" id="is_search"<?php if($rs['is_search']){ ?> checked<?php } ?> /></li>
						<li><input type="checkbox" name="subtopics" title="<?php echo P_Lang("下级主题");?>" id="subtopics"<?php if($rs['subtopics']){ ?> checked<?php } ?> /></li>
						<li><input type="checkbox" name="post_status" title="<?php echo P_Lang("发布");?>" id="post_status"<?php if($rs['post_status']){ ?> checked<?php } ?> /></li>
						<li><input type="checkbox" name="comment_status" title="<?php echo P_Lang("评论");?>" id="comment_status"<?php if($rs['comment_status']){ ?> checked<?php } ?> /></li>
						<?php if($config['biz_status']){ ?>
						<li><input type="checkbox" name="is_biz" title="<?php echo P_Lang("电子商务");?>" id="is_biz"<?php if($rs['is_biz']){ ?> checked<?php } ?> /></li>
						<?php } ?>
						<li><input type="checkbox" name="is_front" title="<?php echo P_Lang("前台访问");?>" id="is_front"<?php if($rs['is_front']){ ?> checked<?php } ?> /></li>
						<li><input type="checkbox" name="is_api" title="<?php echo P_Lang("API访问");?>" id="is_api"<?php if($rs['is_api']){ ?> checked<?php } ?> /></li>
					</ul>
					<div class="clear"></div>
				</div>
			</div>
		
			<div id="use_biz_setting"<?php if(!$rs['is_biz'] || !$config['biz_status']){ ?> style="display:none"<?php } ?>>
				<div class="layui-form-item">
					<label class="layui-form-label"><?php echo P_Lang("货币默认类型");?></label>
					<div class="layui-input-inline default-auto">
						<select name="currency_id" id="currency_id">
							<option value=""><?php echo P_Lang("请选择……");?></option>
							<?php $currency_list_id["num"] = 0;$currency_list=is_array($currency_list) ? $currency_list : array();$currency_list_id = array();$currency_list_id["total"] = count($currency_list);$currency_list_id["index"] = -1;foreach($currency_list as $key=>$value){ $currency_list_id["num"]++;$currency_list_id["index"]++; ?>
							<option value="<?php echo $value['id'];?>"<?php if($rs['currency_id'] == $value['id']){ ?> selected<?php } ?>><?php echo $value['title'];?>/<?php echo P_Lang("标识：");?><?php echo $value['code'];?>/<?php echo P_Lang("汇率：");?><?php echo $value['val'];?></option>
							<?php } ?>
						</select>
					</div>
					<div class="layui-input-inline auto gray"><?php echo P_Lang("此项主要是方便后台管理员添加产品时，默认使用的货币");?></div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><?php echo P_Lang("运费模板");?></label>
					<div class="layui-input-inline default-auto">
						<select name="freight" id="freight">
							<option value=""><?php echo P_Lang("请选择运费计算方式……");?></option>
							<?php $freight_id["num"] = 0;$freight=is_array($freight) ? $freight : array();$freight_id = array();$freight_id["total"] = count($freight);$freight_id["index"] = -1;foreach($freight as $key=>$value){ $freight_id["num"]++;$freight_id["index"]++; ?>
							<option value="<?php echo $value['id'];?>"<?php if($rs['freight'] == $value['id']){ ?> selected<?php } ?>><?php echo $value['title'];?></option>
							<?php } ?>
						</select>
					</div>
					<div class="layui-input-inline auto gray"><?php echo P_Lang("请选择这个项目的运费计算方式");?></div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><?php echo P_Lang("电商属性");?></label>
					<div class="layui-input-inline default-auto">
						<input type="radio" name="biz_attr" value="0"<?php if(!$rs['biz_attr']){ ?> checked<?php } ?> title="<?php echo P_Lang("不使用");?>" />
						<input type="radio" name="biz_attr" value="1"<?php if($rs['biz_attr']){ ?> checked<?php } ?> title="<?php echo P_Lang("使用");?>" />
					</div>
					<div class="layui-input-inline auto gray"><?php echo P_Lang("启用此项后，将允许设定可选产品的一些属性，如颜色，款式，支持价格浮动");?></div>
				</div>
			</div>

			<div id="email_set_post_status"<?php if(!$rs['post_status']){ ?> style="display:none"<?php } ?>>
				<div class="layui-form-item">
					<label class="layui-form-label"><i class="layui-icon layui-tips" lay-tips="<?php echo P_Lang("发布通知管理员及会员的邮件模板");?>">&#xe702;</i> <?php echo P_Lang("发布模板");?></label>
					<div class="layui-input-block">
						<select id="etpl_admin" name="etpl_admin">
							<option value=""><?php echo P_Lang("发布信息_管理员不通知");?></option>
							<?php $tmpid["num"] = 0;$emailtpl=is_array($emailtpl) ? $emailtpl : array();$tmpid = array();$tmpid["total"] = count($emailtpl);$tmpid["index"] = -1;foreach($emailtpl as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
							<option value="<?php echo $value['identifier'];?>"<?php if($rs['etpl_admin'] == $value['identifier']){ ?> selected<?php } ?>><?php echo P_Lang("发布信息_管理员模板");?>_<?php echo $value['title'];?>_<?php echo $value['identifier'];?><?php if($value['note']){ ?>_<?php echo $value['note'];?><?php } ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="layui-input-block" style="margin-top:10px;">
						<select id="etpl_user" name="etpl_user">
							<option value=""><?php echo P_Lang("发布信息_会员不通知");?></option>
							<?php $tmpid["num"] = 0;$emailtpl=is_array($emailtpl) ? $emailtpl : array();$tmpid = array();$tmpid["total"] = count($emailtpl);$tmpid["index"] = -1;foreach($emailtpl as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
							<option value="<?php echo $value['identifier'];?>"<?php if($rs['etpl_user'] == $value['identifier']){ ?> selected<?php } ?>><?php echo P_Lang("发布信息_会员模板");?>_<?php echo $value['title'];?>_<?php echo $value['identifier'];?><?php if($value['note']){ ?>_<?php echo $value['note'];?><?php } ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="layui-input-block gray"><?php echo P_Lang("通知管理员仅限启用【发布】后有效，通知会员仅限启用【发布】且已登录会员后有效");?></div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("发布间隔");?>
					</label>
					<div class="layui-input-inline short">
						<input type="text" name="limit_times" value="<?php echo $rs['limit_times'];?>" class="layui-input" />
					</div>
					<div class="layui-form-mid">
						<?php echo P_Lang("单位是秒，设置两篇文章发布的间隔时间，不限制请设置0，不能低于 10 秒");?>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("相似度");?>
					</label>
					<div class="layui-input-inline short">
						<select id="limit_similar" name="limit_similar">
							<option value="0"><?php echo P_Lang("不限制");?></option>
							<option value="60"<?php if($rs['limit_similar'] == 60){ ?> selected<?php } ?>>60%</option>
							<option value="70"<?php if($rs['limit_similar'] == 70){ ?> selected<?php } ?>>70%</option>
							<option value="80"<?php if($rs['limit_similar'] == 80){ ?> selected<?php } ?>>80%</option>
							<option value="90"<?php if($rs['limit_similar'] == 90){ ?> selected<?php } ?>>90%</option>
							<option value="95"<?php if($rs['limit_similar'] == 95){ ?> selected<?php } ?>>95%</option>
						</select>
					</div>
					<div class="layui-form-mid">
						<?php echo P_Lang("设置好一个相似度值，系统匹配最近10条内发送的信息，如果有一条符合即报警");?>
					</div>
				</div>
			</div>

			<div id="email_set_comment_status"<?php if(!$rs['comment_status']){ ?> style="display:none"<?php } ?>>
				<div class="layui-form-item">
					<label class="layui-form-label"><i class="layui-icon layui-tips" lay-tips="<?php echo P_Lang("评论通知管理员及会员的邮件模板");?>">&#xe702;</i> <?php echo P_Lang("评论模板");?></label>
					<div class="layui-input-block">
						<select id="etpl_comment_admin" name="etpl_comment_admin">
							<option value=""><?php echo P_Lang("回复信息_管理员不通知");?></option>
							<?php $tmpid["num"] = 0;$emailtpl=is_array($emailtpl) ? $emailtpl : array();$tmpid = array();$tmpid["total"] = count($emailtpl);$tmpid["index"] = -1;foreach($emailtpl as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
							<option value="<?php echo $value['identifier'];?>"<?php if($rs['etpl_comment_admin'] == $value['identifier']){ ?> selected<?php } ?>><?php echo P_Lang("回复信息_管理员模板");?>_<?php echo $value['title'];?>_<?php echo $value['identifier'];?><?php if($value['note']){ ?>_<?php echo $value['note'];?><?php } ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="layui-input-block" style="margin-top:10px;">
						<select id="etpl_comment_user" name="etpl_comment_user">
							<option value=""><?php echo P_Lang("回复信息_会员不通知");?></option>
							<?php $tmpid["num"] = 0;$emailtpl=is_array($emailtpl) ? $emailtpl : array();$tmpid = array();$tmpid["total"] = count($emailtpl);$tmpid["index"] = -1;foreach($emailtpl as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
							<option value="<?php echo $value['identifier'];?>"<?php if($rs['etpl_comment_user'] == $value['identifier']){ ?> selected<?php } ?>><?php echo P_Lang("回复信息_会员模板");?>_<?php echo $value['title'];?>_<?php echo $value['identifier'];?><?php if($value['note']){ ?>_<?php echo $value['note'];?><?php } ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="layui-input-block gray"><?php echo P_Lang("通知管理员仅限启用【评论】后有效，通知会员仅限启用【评论】且已登录会员后有效");?></div>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><?php echo P_Lang("默认主题数");?></label>
				<div class="layui-input-inline">
					<input type="text" id="psize" name="psize" value="<?php echo $rs['psize'] ? $rs['psize'] : 30;?>" class="layui-input" />
				</div>
				<div class="layui-input-inline auto gray"><?php echo P_Lang("设置每页默认的主题数量");?></div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><?php echo P_Lang("接口默认数");?></label>
				<div class="layui-input-inline">
					<input type="text" id="psize_api" name="psize_api" value="<?php echo $rs['psize_api'] ? $rs['psize_api'] : 10;?>" class="layui-input" />
				</div>
				<div class="layui-input-inline auto gray"><?php echo P_Lang("设置 API 接口读取的主题数量，仅限接口开启有效");?></div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><?php echo P_Lang("数据排序");?></label>
				<div class="layui-input-block">
					<input type="text" id="orderby" name="orderby" class="layui-input" value="<?php echo $rs['orderby'] ? $rs['orderby'] : 'l.sort ASC,l.dateline DESC,l.id DESC';?>" />
				</div>
				<div class="layui-input-block" style="margin-top:10px;">
					<div class="button-group">
						<input type="button" value="<?php echo P_Lang("清空");?>" class="phpok-btn" onclick="$('#orderby').val('')" />
						<input type="button" value="<?php echo P_Lang("点击");?>" onclick="phpok_admin_orderby('orderby','l.hits')" class="phpok-btn" />
						<input type="button" value="<?php echo P_Lang("时间");?>" onclick="phpok_admin_orderby('orderby','l.dateline')" class="phpok-btn" />
						<input type="button" value="<?php echo P_Lang("回复时间");?>" onclick="phpok_admin_orderby('orderby','l.replydate')" class="phpok-btn" />
						<input type="button" value="ID" onclick="phpok_admin_orderby('orderby','l.id')" class="phpok-btn" />
						<input type="button" value="<?php echo P_Lang("人工");?>" onclick="phpok_admin_orderby('orderby','l.sort')" class="phpok-btn" />
					</div>
					<div id="tmp_orderby_btn" class="button-group" style="margin-left:10px;"></div>
				</div>
				<div class="layui-input-block auto"><?php echo P_Lang("设置好默认排序，有利于网站的管理/前后台一致");?></div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><?php echo P_Lang("列表读取");?></label>
				<div class="layui-input-block">
					<input type="text" id="list_fields" name="list_fields" class="layui-input" value="<?php echo $rs['list_fields'];?>" />
				</div>
				<div class="layui-input-block" style="margin-top:10px;">
					<div class="layui-btn-group" id="tmp_fields_btn">
						<input type="button" value="<?php echo P_Lang("清空");?>" class="layui-btn layui-btn-sm layui-btn-normal" onclick="$('#list_fields').val('')" />
					</div>
				</div>
				<div class="layui-input-block auto"><?php echo P_Lang("当绑定了模块后，读取列表的数据默认为全部，请根据实际情况来设置，最多不能超过200字符");?></div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><?php echo P_Lang("关联根分类");?></label>
				<div class="layui-input-inline auto">
					<select id="cate" name="cate" onchange="update_show_select(this.value)" lay-ignore>
					<option value="0"><?php echo P_Lang("不关联分类");?></option>
					<?php $catelist_id["num"] = 0;$catelist=is_array($catelist) ? $catelist : array();$catelist_id = array();$catelist_id["total"] = count($catelist);$catelist_id["index"] = -1;foreach($catelist as $key=>$value){ $catelist_id["num"]++;$catelist_id["index"]++; ?>
					<option value="<?php echo $value['id'];?>"<?php if($value['id'] == $rs['cate']){ ?> selected<?php } ?>><?php echo $value['title'];?></option>
					<?php } ?>
					</select>
					<input type="button" value="<?php echo P_Lang("添加根分类");?>" onclick="cate_add(this.value)" class="phpok-btn" />
				</div>
				<div class="layui-input-inline auto gray"><?php echo P_Lang("启用此项后，添加内容时，需要选对相对应的分类，且不能为空");?></div>
			</div>

			<div id="cate_multiple_set"<?php if(!$rs['cate']){ ?> class="hide"<?php } ?>>
				<div class="layui-form-item">
					<label class="layui-form-label"><i class="layui-icon layui-tips" lay-tips="<?php echo P_Lang("设置分类是单选模式还是多选模式");?>">&#xe702;</i> <?php echo P_Lang("分类选项");?></label>
					<div class="layui-input-inline auto">
						<input type="radio" name="cate_multiple" value="0"<?php if(!$rs['cate_multiple']){ ?> checked<?php } ?> title="<?php echo P_Lang("单选");?>" />
						<input type="radio" name="cate_multiple" value="1"<?php if($rs['cate_multiple']){ ?> checked<?php } ?> title="<?php echo P_Lang("多选");?>" />
					</div>
					<div class="layui-input-inline auto gray"></div>
				</div>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("后台权限");?></label>
			<div class="layui-input-block">
				<ul class="layout" id="mylayout">
					<?php $popedom_list_id["num"] = 0;$popedom_list=is_array($popedom_list) ? $popedom_list : array();$popedom_list_id = array();$popedom_list_id["total"] = count($popedom_list);$popedom_list_id["index"] = -1;foreach($popedom_list as $kk=>$vv){ $popedom_list_id["num"]++;$popedom_list_id["index"]++; ?>
					<li><input type="checkbox" name="_popedom[]" lay-skin="primary" title="<?php echo $vv['title'];?>" value="<?php echo $vv['id'];?>"<?php if($popedom_list2 && in_array($vv['identifier'],$popedom_list2)){ ?> checked<?php } ?> /></li>
					<?php } ?>
				</ul>
			</div>
			<div class="layui-input-block mtop">
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("全选");?>" onclick="$.input.checkbox_all('mylayout')" class="layui-btn layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("全不选");?>" onclick="$.input.checkbox_none('mylayout')" class="layui-btn layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("反选");?>" onclick="$.input.checkbox_anti('mylayout')" class="layui-btn layui-btn-sm" />
				</div>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("前台权限");?></label>
			<?php $idx["num"] = 0;$grouplist=is_array($grouplist) ? $grouplist : array();$idx = array();$idx["total"] = count($grouplist);$idx["index"] = -1;foreach($grouplist as $key=>$value){ $idx["num"]++;$idx["index"]++; ?>
			<div class="layui-input-block<?php if($idx['index']){ ?> mtop<?php } ?>" id="group_<?php echo $value['id'];?>">
				<ul class="layout">
					<li style="margin-top:5px;min-width:80px;overflow:hidden;text-align:right;"><?php echo $value['title'];?></li>
					<li style="margin-top:5px;">
						<div class="button-group">
							<input type="button" value="<?php echo P_Lang("全选");?>" class="phpok-btn" onclick="$.input.checkbox_all('group_<?php echo $value['id'];?>')" />
							<input type="button" value="<?php echo P_Lang("全不选");?>" class="phpok-btn" onclick="$.input.checkbox_none('group_<?php echo $value['id'];?>')" />
							<input type="button" value="<?php echo P_Lang("反选");?>" class="phpok-btn" onclick="$.input.checkbox_anti('group_<?php echo $value['id'];?>')" />
						</div>
					</li>
					<li><input type="checkbox" name="p_read_<?php echo $value['id'];?>"<?php if($value['popedom']['read']){ ?> checked<?php } ?> title="<?php echo P_Lang("阅读");?>" /></li>
					<li name="f_post"<?php if(!$id || !$rs['module'] || ($rs['module'] && !$rs['post_status'])){ ?> style="display:none"<?php } ?>><input type="checkbox" name="p_post_<?php echo $value['id'];?>"<?php if($value['popedom']['post']){ ?> checked<?php } ?> title="<?php echo P_Lang("发布");?>" /></li>
					<li name="f_post"<?php if(!$id || !$rs['module'] || ($rs['module'] && !$rs['post_status'])){ ?> style="display:none"<?php } ?>><input type="checkbox" name="p_post1_<?php echo $value['id'];?>"<?php if($value['popedom']['post1']){ ?> checked<?php } ?> title="<?php echo P_Lang("发布免审核");?>" /></li>
					<li name="f_reply"<?php if(!$id || !$rs['module'] || ($rs['module'] && !$rs['comment_status'])){ ?> style="display:none"<?php } ?>><input type="checkbox" name="p_reply_<?php echo $value['id'];?>"<?php if($value['popedom']['reply']){ ?> checked<?php } ?> title="<?php echo P_Lang("回复");?>" /></li>
					<li name="f_reply"<?php if(!$id || !$rs['module'] || ($rs['module'] && !$rs['comment_status'])){ ?> style="display:none"<?php } ?>><input type="checkbox" name="p_reply1_<?php echo $value['id'];?>"<?php if($value['popedom']['reply1']){ ?> checked<?php } ?> title="<?php echo P_Lang("回复免审核");?>" /></li>
				</ul>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<div class="layui-card">
	<div class="layui-card-header"><?php echo P_Lang("扩展信息");?></div>
	<div class="layui-card-body">
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("自定义标识");?>
			</label>
			<div class="layui-input-inline default-auto">
				<select id="is_identifier" name="is_identifier">
				<option value="0"><?php echo P_Lang("不使用");?></option>
				<option value="1"<?php if($rs['is_identifier'] == 1){ ?> selected<?php } ?>><?php echo P_Lang("启用非必填");?></option>
				<option value="2"<?php if($rs['is_identifier'] == 2){ ?> selected<?php } ?>><?php echo P_Lang("启用且必填");?></option>
				</select>
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("启用此项后，允许管理员针对添加的主题设定一个标识，更便于用户记住及SEO优化");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("自定义模板");?>
			</label>
			<div class="layui-input-inline default-auto">
				<select id="is_tpl_content" name="is_tpl_content">
				<option value="0"><?php echo P_Lang("不使用");?></option>
				<option value="1"<?php if($rs['is_tpl_content'] == 1){ ?> selected<?php } ?>><?php echo P_Lang("启用非必填");?></option>
				<option value="2"<?php if($rs['is_tpl_content'] == 2){ ?> selected<?php } ?>><?php echo P_Lang("启用且必填");?></option>
				</select>
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("后台添加主题后允许绑定模板，此项仅限后台管理员操作");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("绑定会员");?>
			</label>
			<div class="layui-input-inline default-auto">
				<select id="is_userid" name="is_userid">
				<option value="0"><?php echo P_Lang("不使用");?></option>
				<option value="1"<?php if($rs['is_userid'] == 1){ ?> selected<?php } ?>><?php echo P_Lang("启用非必填");?></option>
				<option value="2"<?php if($rs['is_userid'] == 2){ ?> selected<?php } ?>><?php echo P_Lang("启用且必填");?></option>
				</select>
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("允许主题绑定相应的会员，会员在个人中心可以编辑相关主题，要求启用发布功能后，编辑才有效");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("Tag标签");?>
			</label>
			<div class="layui-input-inline default-auto">
				<select id="is_tag" name="is_tag">
				<option value="0"><?php echo P_Lang("不使用");?></option>
				<option value="1"<?php if($rs['is_tag'] == 1){ ?> selected<?php } ?>><?php echo P_Lang("启用非必填");?></option>
				<option value="2"<?php if($rs['is_tag'] == 2){ ?> selected<?php } ?>><?php echo P_Lang("启用且必填");?></option>
				</select>
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("允许用户自定义标签内容，以方便网站优化");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("自定义SEO");?>
			</label>
			<div class="layui-input-inline default-auto">
				<select id="is_seo" name="is_seo">
				<option value="0"><?php echo P_Lang("不使用");?></option>
				<option value="1"<?php if($rs['is_seo'] == 1){ ?> selected<?php } ?>><?php echo P_Lang("启用非必填，默认隐藏");?></option>
				<option value="2"<?php if($rs['is_seo'] == 2){ ?> selected<?php } ?>><?php echo P_Lang("启用非必填，默认显示");?></option>
				<option value="3"<?php if($rs['is_seo'] == 3){ ?> selected<?php } ?>><?php echo P_Lang("启用且必填");?></option>
				</select>
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("允许管理员针对主题自定义相关的SEO信息");?>
			</div>
		</div>
			
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("封面模板");?></label>
			<div class="layui-input-inline default-auto">
				<input type="text" id="tpl_index" name="tpl_index" class="layui-input" value="<?php echo $rs['tpl_index'];?>" />
			</div>
			<div class="layui-input-inline auto gray">
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("选择");?>" onclick="phpok_tpl_open('tpl_index')" class="layui-btn layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("清空");?>" onclick="$('#tpl_index').val('');" class="layui-btn layui-btn-sm layui-btn-warm" />
				</div>
			</div>
			<div class="layui-input-inline auto gray"><?php echo P_Lang("设定此模板将启用封面功能，不启用留空");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("列表模板");?></label>
			<div class="layui-input-inline default-auto">
				<input type="text" id="tpl_list" name="tpl_list" class="layui-input" value="<?php echo $rs['tpl_list'];?>" />
			</div>
			<div class="layui-input-inline auto">
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("选择");?>" onclick="phpok_tpl_open('tpl_list')" class="layui-btn layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("清空");?>" onclick="$('#tpl_list').val('');" class="layui-btn layui-btn-sm layui-btn-warm" />
				</div>
			</div>
			<div class="layui-input-inline auto gray"><?php echo P_Lang("仅限于绑定模块后才能生效");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("内容模板");?></label>
			<div class="layui-input-inline default-auto">
				<input type="text" id="tpl_content" name="tpl_content" class="layui-input" value="<?php echo $rs['tpl_content'];?>" />
			</div>
			<div class="layui-input-inline auto">
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("选择");?>" onclick="phpok_tpl_open('tpl_content')" class="layui-btn layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("清空");?>" onclick="$('#tpl_content').val('');" class="layui-btn layui-btn-sm layui-btn-warm" />
				</div>
			</div>
			<div class="layui-input-inline auto gray"><?php echo P_Lang("仅限于绑定模块后才能生效");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("发布模板");?></label>
			<div class="layui-input-inline default-auto">
				<input type="text" id="post_tpl" name="post_tpl" class="layui-input" value="<?php echo $rs['post_tpl'];?>" />
			</div>
			<div class="layui-input-inline auto">
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("选择");?>" onclick="phpok_tpl_open('post_tpl')" class="layui-btn layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("清空");?>" onclick="$('#post_tpl').val('');" class="layui-btn layui-btn-sm layui-btn-warm" />
				</div>
			</div>
			<div class="layui-input-inline auto"><?php echo P_Lang("仅限于绑定模块且启用发布功能后有效");?></div>
		</div>
		
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("图标");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" name="ico" id="ico" value="<?php echo $rs['ico'];?>" class="layui-input" />
			</div>
			<div class="layui-input-inline auto gray lh38">
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("选择图标");?>" onclick="$.admin_project.icolist()" class="layui-btn layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("预览");?>" onclick="$.phpokform.text_button_image_preview('ico')" class="layui-btn layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("清空");?>" onclick="$('#ico').val('');" class="layui-btn layui-btn-sm layui-btn-warm" />
				</div>
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("请选择一个直观的图标，大小为：48x48，建议使用PNG格式");?>
			</div>
		</div>
		
		<div class="layui-form-item">
			<label class="layui-form-label layui-tips" lay-tips="<?php echo P_Lang("将显示在内容管理布局区那里，用于提示编辑人员注意事项");?>"><?php echo P_Lang("后台备注");?></label>
			<div class="layui-input-block">
				<?php echo $note_content;?>
			</div>
		</div>
	</div>
</div>
<div class="layui-card">
	<div class="layui-card-header hand" onclick="$.admin.card(this)">
		<?php echo P_Lang("SEO优化");?>
		<i class="layui-icon layui-icon-right"></i>
	</div>
	<div class="layui-card-body hide">
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("SEO标题");?></label>
			<div class="layui-input-block">
				<input type="text" id="seo_title" name="seo_title" class="layui-input" value="<?php echo $rs['seo_title'];?>" />
			</div>
			<div class="layui-input-block mtop"><?php echo P_Lang("设置此标题后，网站 Title 将会替代默认定义的，不能超过85个汉字");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("SEO关键字");?></label>
			<div class="layui-input-block">
				<input type="text" id="seo_keywords" name="seo_keywords" class="layui-input" value="<?php echo $rs['seo_keywords'];?>" />
			</div>
			<div class="layui-input-block mtop"><?php echo P_Lang("多个关键字用英文逗号或英文竖线隔开");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("SEO描述");?></label>
			<div class="layui-input-block">
				<textarea name="seo_desc" id="seo_desc" class="layui-textarea"><?php echo $rs['seo_desc'];?></textarea>
			</div>
			<div class="layui-input-block mtop"><?php echo P_Lang("简单描述该主题信息，用于搜索引挈，不支持HTML，不能超过85个汉字");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("标签");?></label>
			<div class="layui-input-block">
				<input type="text" id="tag" name="tag" class="layui-input" value="<?php echo $rs['tag'];?>" />
			</div>
			<div class="layui-input-block mtop">
				<?php echo P_Lang("多个标签用 [title] 分开，最多不能超过10个",array('title'=>'<span style="color:red">'.$tag_config['separator'].'</span>'));?>
			</div>
		</div>
	</div>
</div>
<div class="submit-info">
	<div class="layui-container center">
		<input type="submit" value="<?php echo P_Lang("提交保存");?>" class="layui-btn layui-btn-lg layui-btn-danger" />
		<input type="button" value="<?php echo P_Lang("取消关闭");?>" class="layui-btn layui-btn-lg layui-btn-primary" onclick="$.admin.close()" />
	</div>
</div>
<div class="submit-info-clear"></div>
</form>


<?php $this->output("foot_lay","file",true,false); ?>
