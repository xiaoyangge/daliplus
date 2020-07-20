<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<script type="text/javascript">
    function edit_price(code) {
        var url = get_url('site', 'price_status_save', 'id=' + code);
        var title = $("#price_title_" + code).val();
        if (title) {
            url += "&title=" + $.str.encode(title);
        }
        var action = $("#price_action_" + code).val();
        if (action) {
            url += "&action=" + $.str.encode(action);
        }
        var status = $("#price_status_" + code).val();
        if (status) {
            url += "&status=" + $.str.encode(status);
        }
        var taxis = $("#price_taxis_" + code).val();
        if (taxis) {
            url += "&taxis=" + $.str.encode(taxis);
        }
        $.phpok.json(url, function (rs) {
            if (rs.status == 'ok') {
                $.dialog.tips('标识：<span class="red">' + code + '</span> 配置更新成功');
            } else {
                $.dialog.alert(rs.content);
                return false;
            }
        });
    }
</script>
<div class="layui-card">
    <div class="layui-card-header"><?php echo P_Lang("前台订单状态");?></div>
    <div class="layui-card-body">
        <table class="layui-table">
            <thead>
            <tr>
                <th class="lft"><?php echo P_Lang("标识");?></th>
                <th><?php echo P_Lang("排序");?></th>
                <th class="lft"><?php echo P_Lang("名称");?></th>
                <th><?php echo P_Lang("状态");?></th>
                <th class="lft"><?php echo P_Lang("通知会员");?></th>
                <th class="lft"><?php echo P_Lang("通知管理员");?></th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
            <tr>
                <td><?php echo $value['identifier'];?></td>
                <td class="center"><?php echo $value['taxis'];?></td>
                <td><?php echo $value['title'];?></td>
                <td class="center">
	                <?php if($value['status']){ ?>
	                <?php echo P_Lang("启用");?>
	                <?php } else { ?>
	                <span class="red"><?php echo P_Lang("禁用");?></span>
                    <?php } ?>
                </td>
                <td>
                    <?php if(!$value['email_tpl_user'] && !$value['sms_tpl_user']){ ?>
                    <span class="red">不通知</span>
                    <?php } ?>
                    <?php if($value['email_tpl_user'] && $value['sms_tpl_user']){ ?>
                    邮件 + 短信
                    <?php } else { ?>
                    	<?php if($value['email_tpl_user']){ ?>邮件<?php } ?>
                    	<?php if($value['sms_tpl_user']){ ?>短信<?php } ?>
                    <?php } ?>
                </td>
                <td>
                    <?php if(!$value['email_tpl_admin'] && !$value['sms_tpl_admin']){ ?>
                    <span class="red">不通知</span>
                    <?php } ?>
                    <?php if($value['email_tpl_admin'] && $value['sms_tpl_admin']){ ?>
                    邮件 + 短信
                    <?php } else { ?>
                    	<?php if($value['email_tpl_admin']){ ?>邮件<?php } ?>
                    	<?php if($value['sms_tpl_admin']){ ?>短信<?php } ?>
                    <?php } ?>
                </td>
                <td>
	                <input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.admin_site.order_edit('<?php echo $value['identifier'];?>')" class="layui-btn"/>
	            </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="layui-card">
    <div class="layui-card-header"><?php echo P_Lang("后台订单状态");?></div>
    <div class="layui-card-body">
        <table class="layui-table">
            <thead>
            <tr>
                <th class="lft"><?php echo P_Lang("标识");?></th>
                <th><?php echo P_Lang("排序");?></th>
                <th class="lft"><?php echo P_Lang("名称");?></th>
                <th class="lft"><?php echo P_Lang("前台订单状态");?></th>
                <th><?php echo P_Lang("状态");?></th>
                <th><input type="button" value="<?php echo P_Lang("添加");?>" onclick="$.admin_site.adm_add_it()" class="layui-btn"/></th>
            </tr>
            </thead>
            <tbody>
            <?php $admin_statuslist_id["num"] = 0;$admin_statuslist=is_array($admin_statuslist) ? $admin_statuslist : array();$admin_statuslist_id = array();$admin_statuslist_id["total"] = count($admin_statuslist);$admin_statuslist_id["index"] = -1;foreach($admin_statuslist as $key=>$value){ $admin_statuslist_id["num"]++;$admin_statuslist_id["index"]++; ?>
            <tr>
                <td><?php echo $value['identifier'];?></td>
                <td class="center"><?php echo $value['taxis'];?></td>
                <td><?php echo $value['title'];?></td>
                <td><?php echo $value['ostatus'];?></td>
                <td class="center">
	                <?php if($value['status']){ ?>
	                <?php echo P_Lang("启用");?>
	                <?php } else { ?>
	                <span class="red"><?php echo P_Lang("禁用");?></span>
                    <?php } ?>
                </td>
                <td class="center">
	                <input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.admin_site.adm_edit_it('<?php echo $value['identifier'];?>')" class="layui-btn"/>
	                <input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_site.delete_it('<?php echo $value['identifier'];?>',this)" class="layui-btn"/>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="layui-card">
    <div class="layui-card-header"><?php echo P_Lang("订单价格方案");?></div>
    <div class="layui-card-body layui-form">
        <table class="layui-table">
            <colgroup>
                <col>
                <col>
                <col width="110">
                <col>
                <col>
                <col>
            </colgroup>
            <thead>
            <tr>
                <th width="100">标识</th>
                <th align="center">名称</th>
                <th align="center">默认值</th>
                <th align="center">金额动作</th>
                <th align="center">状态</th>
                <th align="center">排序</th>
                <th align="center">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php $pricelist_id["num"] = 0;$pricelist=is_array($pricelist) ? $pricelist : array();$pricelist_id = array();$pricelist_id["total"] = count($pricelist);$pricelist_id["index"] = -1;foreach($pricelist as $key=>$value){ $pricelist_id["num"]++;$pricelist_id["index"]++; ?>
            <tr>
                <td><?php echo $value['identifier'];?></td>
                <td><?php echo $value['title'];?></td>
                <td class="center">
	                <?php echo $value['default'];?>
                </td>
                <td class="center">
	                <?php if($value['action'] == 'add'){ ?>+<?php } else { ?>-<?php } ?>
                </td>
                <td class="center">
	                <?php if($value['status']){ ?>
	                <?php echo P_Lang("启用");?>
	                <?php } else { ?>
	                <span class="red"><?php echo P_Lang("禁用");?></span>
                    <?php } ?>
                </td>
                <td class="center">
	                <?php echo $value['taxis'];?>
                </td>
                <td><input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.admin_site.edit_price('<?php echo $value['identifier'];?>')" class="layui-btn"/></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    layui.use(['form']);

</script>
<?php $this->output("foot_lay","file",true,false); ?>