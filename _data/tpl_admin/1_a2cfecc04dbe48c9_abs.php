<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><script>
	$(function () {
		var html = '<input type="button" value="预览" class="phpok-btn" ' +
            'onclick="$.phpok.open(\'index.php?c=plugin&f=exec&id=bmap&exec=map\',' +
            '{\'lock\':true,width:\'1200px\',height:\'550px\'})">';
	    $("#status_bmap").parent().parent().find('.button-group').prepend(html);
    });
</script>