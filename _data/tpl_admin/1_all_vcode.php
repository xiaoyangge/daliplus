<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
    <div class="layui-card-header"><?php echo P_Lang("验证码设置，打勾表示启用验证码，不打勾表示禁用验证码");?></div>
    <div class="layui-card-body layui-main">
        <form method="post" class="layui-form" id="post_save" onsubmit="return $.admin_all.vcode_save();">
            <?php $idx["num"] = 0;$vcodelist=is_array($vcodelist) ? $vcodelist : array();$idx = array();$idx["total"] = count($vcodelist);$idx["index"] = -1;foreach($vcodelist as $key=>$value){ $idx["num"]++;$idx["index"]++; ?>
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $value['title'];?></label>
                <div class="layui-input-block">
                    <?php $idxx["num"] = 0;$value['list']=is_array($value['list']) ? $value['list'] : array();$idxx = array();$idxx["total"] = count($value['list']);$idxx["index"] = -1;foreach($value['list'] as $k=>$v){ $idxx["num"]++;$idxx["index"]++; ?>
                    <input type="checkbox" id="<?php echo $key;?>-<?php echo $k;?>" name="<?php echo $key;?>-<?php echo $k;?>" <?php if($v['status']){ ?> checked<?php } ?> title="<?php echo $v['title'];?>">
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" type="submit"><?php echo P_Lang("提交");?></button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $this->output("foot_lay","file",true,false); ?>