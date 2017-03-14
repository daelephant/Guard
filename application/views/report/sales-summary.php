<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">
<title>在线进销存</title>
<link href="<?php echo base_url()?>statics/css/common.css?ver=20140430" rel="stylesheet">
<link href="<?php echo base_url()?>statics/css/<?php echo sys_skin()?>/ui.min.css?ver=20140430" rel="stylesheet">
<script src="<?php echo base_url()?>statics/js/common/seajs/2.1.1/sea.js?ver=20140430" id="seajsnode"></script>
<script src="<?php echo base_url()?>statics/js/common/libs/jquery/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
var WDURL = "";
var SCHEME= "<?php echo sys_skin()?>";
try{
	document.domain = '<?php echo base_url()?>';
}catch(e){
	//console.log(e);
}
 
//ctrl+F5 增加版本号来清空iframe的缓存的
$(document).keydown(function(event) {
	/* Act on the event */
	if(event.keyCode === 116 && event.ctrlKey){
		var defaultPage = Public.getDefaultPage();
		var href = defaultPage.location.href.split('?')[0] + '?';
		var params = Public.urlParam();
		params['version'] = Date.parse((new Date()));
		for(i in params){
			if(i && typeof i != 'function'){
				href += i + '=' + params[i] + '&';
			}
		}
		defaultPage.location.href = href;
		event.preventDefault();
	}
});
</script>
<link rel="stylesheet" href="<?php echo base_url()?>statics/css/report.css?2" />
<style>
.ui-icon-ellipsis{right:5px;}
#grid tr{cursor:pointer;}

</style>
</head>
<body>
<div class="wrapper">
<div class="mod-search cf" id="report-search">
    
  </div>

  
  <div class="ui-print">
    <span id="config">列设置</span>
    <div class="grid-wrap" id="grid-wrap">
			<div class="grid-title">销售汇总表（按商品）</div>
			<div class="grid-subtitle"></div>
	    	<table id="grid"></table>
	   	</div>
	</div>
    <div class="no-query"></div>
</div>
 <!--
  <div class="grid-wrap">
    <div class="grid">
      <table width=100% class="caption">
        <tr>
          <td class='H'>销售汇总表（按商品）</td>
        </tr>
        <tr>
          <td>日期：至</td>
        </tr>
      </table>
      <table width="1128px" class="list">
        <thead>
          <tr>
            <td>商品编号</td>
            <td width="150px">商品名称</td>
            <td>规格型号</td>
            <td>单位</td>
            <td>仓库</td>
            <td>数量</td>
            <td>单价</td>
            <td>销售收入</td>
            
          </tr>
        </thead>
        <tbody>
          
          <tr>
            <td colspan="5" class="R B">合计：</td>
            <td class="R B"></td>
            <td class="R B"></td>
            <td class="R B"></td>
            
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  -->
  
<script>
	seajs.use("dist/salesSummary");
</script>
</body>
</html>

 