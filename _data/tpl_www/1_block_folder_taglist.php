<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><div class="am-panel am-panel-default">
	<div class="am-panel-hd">
		<h3 class="am-panel-title">TAG标签</h3>
	</div>
	<div class="am-panel-bd">
		<div class="tags">
			<?php $list = phpok("_taglist","psize=60");?>
	        <?php $tmpid["num"] = 0;$list=is_array($list) ? $list : array();$tmpid = array();$tmpid["total"] = count($list);$tmpid["index"] = -1;foreach($list as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
	        <a href="<?php echo $value['url'];?>" target="<?php echo $value['target'];?>" alt="<?php echo $value['at'];?>"><?php echo $value['title'];?></a>
	        <?php } ?>
		</div>
	</div>
</div>
<style type="text/css">
.tags{ width:95%; margin:0 auto; padding-top:6px; padding-bottom:6px;}
.tags a{line-height:26px;padding-right:6px;}
.tags .tags0{}
.tags .tags1{color:#C00; font-size:24px;}
.tags .tags2{color:#030; font-size:16px;}
.tags .tags3{color:#00F;}
.tags .tags4{ font-size:16px;}
.tags .tags5{color:#C00; font-size:20px;}
.tags .tags6{color:#F06 font-size:20px;}
.tags .tags7{color:#030; font-weight:bold; font-size:18px;}
.tags .tags8{color:#F06; font-weight:bold;}
.tags .tags9{color:#C00; font-weight:bold;font-size:16px;}
.tags .tags10{color:#090; font-weight:bold;font-size:18px;}
.tags .tags11{color:#09F;}
.tags .tags12{color:#F90;font-size:14px;}
.tags a:hover{ color:#F00; text-decoration:underline;}
</style>
<script type="text/javascript">
$(document).ready(function() {
	var tags_a = $(".tags a");
	tags_a.each(function(){
		var x = 12;
		var y = 0;
		var rand = parseInt(Math.random() * (x - y + 1) + y);
		$(this).addClass("tags"+rand);
	});
});
</script>