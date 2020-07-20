<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php if(!$page_rs['seo_title']){ ?>
<?php $title=$page_rs['title'].($cate_rs['title']? '_'.$cate_rs['title'] : '');?>
<?php } ?>
<?php $this->assign("title",$title); ?><?php $this->assign("menutitle",$page_rs['title']); ?><?php $this->output("head","file",true,false); ?>
<div class="tips">
    要预览请先提交信息,预览按钮在右下角
</div>
<form method="post" id="post_save">
    <div class="table">
        <div class="title">
            百度地图key：
        </div>
        <div class="content">
            <input class="long" type="text" id="apikey" name="apikey" value="<?php echo $rs['apikey'];?>" />
        </div>
    </div>
    <div class="table">
        <div class="title">
            地址：
            <span class="note">如果通过接口获取的地址误差大，<a href="//api.map.baidu.com/lbsapi/getpoint/index.html" target="_blank" class="red">请点这里拾坐标</a></span>
        </div>
        <div class="content">
            <input class="long" type="text" id="address" name="address" value="<?php echo $rs['address'];?>" />
            <input type="button" value="获取经纬度" class="phpok-btn" onclick="get_lng_lat()">
        </div>
    </div>

    <div class="table">
        <div class="title">
            电话：
        </div>
        <div class="content">
            <input class="long" type="text" id="tel" name="tel" value="<?php echo $rs['tel'];?>" />
        </div>
    </div>

    <div class="table">
        <div class="title">
            公司名称：
        </div>
        <div class="content">
            <input class="long" type="text" id="company" name="company" value="<?php echo $rs['company'];?>" />
        </div>
    </div>

    <div class="table">
        <div class="title">
            经度：
        </div>
        <div class="content">
            <input class="long" type="text" id="lng" name="lng" value="<?php echo $rs['lng'];?>" />
        </div>
    </div>
    <div class="table">
        <div class="title">
            维度：
        </div>
        <div class="content">
            <input class="long" type="text" id="lat" name="lat" value="<?php echo $rs['lat'];?>" />
        </div>
    </div>
    <div class="table">
        <div class="title">
            嵌入模板代码：<span class="note">此代码是系统生成，提交是不会保存</span>
        </div>
        <div class="content">
            <textarea id="iframeCode" class="long" style="height:100px;resize:none;"><div style="width:100%;height:600px"><iframe src="index.php?c=plugin&f=exec&id=bmap&exec=map" style="width:100%;height:100%;overflow:hidden;" frameborder="0" scrolling="no"></iframe></div></textarea>
            <div><input type="button" value="复制代码" class="phpok-btn phpok-copy" data-clipboard-target="#iframeCode" /></div>
        </div>
    </div>
    <div class="submit-info">
        <input type="submit" value="提交" class="submit2 phpok_submit_click">
        <input type="button" value="预览" class="phpok-btn" onclick="$.phpok.open('index.php?c=plugin&f=exec&id=bmap&exec=map')">
    </div>
</form>
<script type="text/javascript">
$(function () {
    $("#post_save").submit(function () {
        $(this).ajaxSubmit({
            'url':get_plugin_url('bmap','config_save'),
            'type':'post',
            'dataType':'json',
            'success':function(rs){
                if(rs.status){
                    $.dialog.alert('参数信息更新成功',function(){
                        $.phpok.reload();
                    },'succeed');
                    return true;
                }
                $.dialog.alert(rs.info);
                return false;
            }
        });
        return false;
    });
});
function get_lng_lat() {
    var address = $("#address").val();
    if (!address){
        $.dialog.alert('地址不能为空');
        return false;
    }
    var url =api_plugin_url('bmap','lnglat','address='+$.str.encode(address));
    var tip = $.dialog.tips('正在获取地址,请稍后...',100);
    $.phpok.json(url,function (data) {
        tip.close();
        if (data.status){
            $("#lng").val(data.info.lng);
            $("#lat").val(data.info.lat);
            return true;
        }
        $.dialog.alert(data.info);
        return false;
    })
}
</script>
<?php $this->output("foot","file",true,false); ?>