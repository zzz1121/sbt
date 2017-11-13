<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"/Applications/MAMP/htdocs/start/sbt/application/admin/view/personal/index.html";i:1507795287;s:77:"/Applications/MAMP/htdocs/start/sbt/application/admin/view/common/header.html";i:1510106379;s:77:"/Applications/MAMP/htdocs/start/sbt/application/admin/view/common/footer.html";i:1509948237;}*/ ?>
<!DOCTYPE html>


<html><head>
    <title>后台首页-后台首页 -  Powered by HisiPHP</title>
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <link rel="stylesheet" href="__ADMIN_JS__/js/layui/css/layui.css">
    <link rel="stylesheet" href="__ADMIN_JS__/css/style.css">
    <script type="text/javascript">
        var ADMIN_PATH = "/index.php";
    </script>
    <script src="__PUBLIC__/assets/vendor/jquery/jquery.min.js?1"></script>
    <link id="layuicss-skinlayercss" rel="stylesheet" href="__ADMIN_JS__/js/layui/css/modules/layer/default/layer.css?v=3.0.3303" media="all"></head>
    <link id="layuicss-laydatecss" rel="stylesheet" href="__ADMIN_JS__/js/layui/css/modules/laydate/laydate.css" media="all">
<style>
    .page-toolbar{
        overflow: visible;
        height:40px;
    }
    .page-toolbar .layui-form-item{
        float:left;
        clear: none;
        margin-left:15px;
    }
    .page-toolbar .layui-form-select{
        float:left;
        width:100px;
        border:none;

    }
    .page-toolbar .layui-form-item{
        margin-left:0;
    }
    .page-toolbar .layui-select{
        float:left;
        width:100px;
        margin-top:-1px;
        padding:0px;
        margin-left:3px;
    }
    .page-filter{
        overflow: visible;
        width:100%;

    }
    .layui-form-switch em{
        width:33px;
        right: 2px;
        top: 1px;
    }
    .seach-btn{
        margin-right:10px;
    }
    #pageListForm{
        min-height:500px;
    }
    .layui-form-span{
        padding-left:10px;
        line-height:30px;
    }
    .layui-form-item .layui-input-inline{
        /*width:230px;*/
    }
    .layui-form-pane .layui-form-label{
        width:125px;
    }
</style>
<body>
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="fl header-logo">管理控制台</div>
        <div class="fl header-fold"><a href="javascript:;" title="打开/关闭左侧导航" class="aicon ai-caidan" id="foldSwitch"></a></div>
        <ul class="layui-nav fl nobg main-nav">
            <!--<li class="layui-nav-item layui-this">-->

                <!--<a href="javascript:;">首页</a></li>-->
            <li class="layui-nav-item layui-this">

                <a href="javascript:;">系统</a></li>
            <li class="layui-nav-item">

                <a href="javascript:;">插件</a></li>
        </ul>
        <ul class="layui-nav fr nobg head-info" lay-filter="">
            <li class="layui-nav-item"><a href="/" target="_blank">前台</a></li>
            <li class="layui-nav-item"><a href="javascript:void(0);" id="lockScreen">锁屏</a></li>
            <!--<li class="layui-nav-item"><a href="<?php echo url('admin/index/clear'); ?>">清缓存</a></li>-->
            <!--<li class="layui-nav-item">-->
                <!--<a href="javascript:void(0);">简体中文&nbsp;&nbsp;</a>-->
                <!--<dl class="layui-nav-child">-->
                    <!--<dd><a href="<?php echo url('admin/index/index'); ?>?lang="></a></dd>-->
                    <!--<dd><a href="<?php echo url('admin/language/index'); ?>">语言包管理</a></dd>-->
                <!--</dl>-->
            <!--</li>-->
            <li class="layui-nav-item">
                <a href="javascript:void(0);">超级管理员&nbsp;&nbsp;</a>
                <dl class="layui-nav-child">
                    <dd><a href="<?php echo url('personal/info'); ?>">个人设置</a></dd>
                    <dd><a href="<?php echo url('admin/publics/logout'); ?>">退出登陆</a></dd>
                </dl>
            </li>
        </ul>
    </div>
    <div class="layui-side layui-bg-black" id="switchNav">
        <div class="layui-side-scroll">
            <!--<ul class="layui-nav layui-nav-tree">-->
                <!--<li class="layui-nav-item layui-nav-itemed">-->
                    <!--<a href="javascript:;"><i class="aicon ai-shezhi"></i>快捷菜单<span class="layui-nav-more"></span></a>-->
                    <!--<dl class="layui-nav-child">-->
                        <!--<dd><a class="admin-nav-item" href="<?php echo url('personal/index'); ?>">后台首页</a></dd>-->
                    <!--</dl>-->
                <!--</li>-->
                <!--<li class="layui-nav-item" style="height: 30px; text-align: center"></li>-->
                <!--<span class="layui-nav-bar"></span></ul>-->
            <ul class="layui-nav layui-nav-tree" >
                <li class="layui-nav-item layui-nav-itemed">
                    <a href="javascript:;"><i class="aicon ai-shezhi"></i>系统功能<span class="layui-nav-more"></span></a>
                    <dl class="layui-nav-child">
                        <!--<dd><a class="admin-nav-item" href="<?php echo url('user/index'); ?>">系统设置</a></dd>-->
                        <!--<dd><a class="admin-nav-item" href="<?php echo url('user/index'); ?>">配置管理</a></dd>-->
                        <dd><a class="admin-nav-item" href="<?php echo url('statement/index'); ?>">平台统计</a></dd>
                        <!--<dd><a class="admin-nav-item" href="<?php echo url('user/index'); ?>">系统管理员</a></dd>-->
                        <!--<dd><a class="admin-nav-item" href="<?php echo url('config/index'); ?>">接口管理</a></dd>-->
                        <dd><a class="admin-nav-item" href="<?php echo url('charge/index'); ?>">平台费率设置</a></dd>
                        <!--<dd><a class="admin-nav-item" href="<?php echo url('apisetting/index'); ?>">接口管理</a></dd>-->
                    </dl>
                </li>
                <li class="layui-nav-item layui-nav-itemed">
                    <a href="javascript:;"><i class="aicon ai-shezhi"></i>会员管理<span class="layui-nav-more"></span></a>
                    <dl class="layui-nav-child">
                        <dd><a class="admin-nav-item" href="<?php echo url('level/index'); ?>">会员等级</a></dd>
                        <dd><a class="admin-nav-item" href="<?php echo url('user/index'); ?>">会员列表</a></dd>
                        <dd><a class="admin-nav-item" href="<?php echo url('merchant/audit'); ?>">升级审核</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item layui-nav-itemed">
                    <a href="javascript:;"><i class="aicon ai-shezhi"></i>运营管理<span class="layui-nav-more"></span></a>
                    <dl class="layui-nav-child">
                        <dd><a class="admin-nav-item" href="<?php echo url('orders/index'); ?>">交易查询</a></dd>
                        <dd><a class="admin-nav-item" href="<?php echo url('brokerage/index'); ?>">抽成记录</a></dd>
                        <dd><a class="admin-nav-item" href="<?php echo url('payorders/index'); ?>">提现记录</a></dd>
                        <dd><a class="admin-nav-item" href="<?php echo url('question/index'); ?>">客户反馈</a></dd>
                        <dd><a class="admin-nav-item" href="<?php echo url('activity/index'); ?>">活动管理</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item layui-nav-itemed">
                    <a href="javascript:;"><i class="aicon ai-shezhi"></i>代理商功能<span class="layui-nav-more"></span></a>
                    <dl class="layui-nav-child">
                        <dd><a class="admin-nav-item" href="<?php echo url('contract/index'); ?>">代理商列表</a></dd>
                        <dd><a class="admin-nav-item" href="<?php echo url('contract/add'); ?>">代理商签约</a></dd>
                        <!--<dd><a class="admin-nav-item" href="<?php echo url('user/index'); ?>">钩子管理</a></dd>-->
                        <!--<dd><a class="admin-nav-item" href="<?php echo url('user/index'); ?>">在线升级</a></dd>-->
                    </dl>
                </li>
                <li class="layui-nav-item" style="height: 30px; text-align: center"></li>
                <span class="layui-nav-bar"></span></ul>
            <ul class="layui-nav layui-nav-tree" style="display:none;">
                <li class="layui-nav-item layui-nav-itemed">
                    <a href="javascript:;"><i class="aicon ai-shezhi"></i>插件列表<span class="layui-nav-more"></span></a>
                    <dl class="layui-nav-child">
                    </dl>
                </li>
                <li class="layui-nav-item" style="height: 30px; text-align: center"></li>
                <span class="layui-nav-bar"></span></ul>
        </div>
    </div>
    <div class="layui-body" id="switchBody">
        <ul class="bread-crumbs">
            <li><a href="javascript:void(0);">快捷菜单</a></li>
            <li>&gt;</li>
            <li><a href="javascript:void(0);">后台首页</a></li>
            <li><a href="javascript:;" _href="/admin/menu/quick/id/24.html" title="添加到首页快捷菜单" id="addQuick">[+]</a></li>
        </ul>
        <div style="padding:0 10px;" class="mcolor"></div>
        <script src="__ADMIN_JS__/js/layui/layui.js"></script>
        <script src="__ADMIN_JS__/js/global.js"></script>
        <script>
            layui.config({
                base: '__ADMIN_JS__/js/',
                version: '1.0.0'
            }).use('global');
        </script>
        <div class="page-body">
            <div class="layui-tab layui-tab-card">
                <ul class="layui-tab-title">
                    <li>
                        <a href="javascript:;" id="curTitle"><?php echo $title; ?></a>
                    </li>
                    <!--<li class="layui-this">-->
                        <!--<a href="/admin/system/index/group/base.html">支付渠道</a>-->
                    <!--</li>-->
                    <!--<li >-->
                        <!--<a href="/admin/system/index/group/sys.html">系统</a>-->
                    <!--</li>-->
                    <!--<li>-->
                        <!--<a href="/admin/system/index/group/upload.html">上传</a>-->
                    <!--</li>-->
                    <!--<li>-->
                        <!--<a href="/admin/system/index/group/develop.html">开发</a>-->
                    <!--</li>-->
                    <!--<li>-->
                        <!--<a href="/admin/system/index/group/databases.html">数据库</a>-->
                    <!--</li>-->

                    <div class="tool-btns">
                        <a href="javascript:location.reload();" title="刷新当前页面" class="aicon ai-shuaxin2 font18"></a>
                        <a href="javascript:;" class="aicon ai-quanping1 font18" id="fullscreen-btn" title="打开/关闭全屏"></a>
                    </div>
                </ul>
                <div class="layui-tab-content page-tab-content">
                    <div class="layui-tab-item layui-show">
<div class="layui-tab layui-tab-card">
        <ul class="layui-tab-title">
          <li class="layui-this">
            <a href="javascript:;" id="curTitle">后台首页</a>
          </li>
          <div class="tool-btns">
            <a href="javascript:location.reload();" title="刷新当前页面" class="aicon ai-shuaxin2 font18"></a>
            <a href="javascript:;" class="aicon ai-quanping1 font18" id="fullscreen-btn" title="打开/关闭全屏"></a>
          </div>
        </ul>
        <div class="layui-tab-content page-tab-content">
          <div class="layui-tab-item layui-show">
            <div style="display:block;width:100%;overflow:hidden;">
            </div>
            <div class="fl" style="width:49%">
              <table class="layui-table" lay-skin="line">
                <colgroup>
                  <col width="160">
                  <col>
                </colgroup>
                <thead>
                <tr>
                  <th colspan="2">系统信息</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>系统版本</td>
                  <td>HisiPHP v1.0.0</td>
                </tr>
                <tr>
                  <td>服务器环境</td>
                  <td>Darwin / Apache</td>
                </tr>
                <tr>
                  <td>PHP/MySql版本</td>
                  <td>PHP 5.6.30 / MySql 5.6.35</td>
                </tr>
                <tr>
                  <td>ThinkPHP版本</td>
                  <td>5.0.10</td>
                </tr>
                </tbody>
              </table>
            </div>
            <div class="fr" style="width:49%">
              <table class="layui-table" lay-skin="line">
                <colgroup>
                  <col width="160">
                  <col>
                </colgroup>
                <thead>
                <tr>
                  <th colspan="2">产品信息</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>产品名称</td>
                  <td>HisiPHP开发框架(简单.快速、高效.稳定)</td>
                </tr>
                <tr>
                  <td>官方网站</td>
                  <td><a href="http://www.hisiphp.com" target="_blank" rel="noreferrer">http://www.hisiphp.com</a></td>
                </tr>
                <tr>
                  <td>官方QQ群</td>
                  <td><a href="http://shang.qq.com/wpa/qunwpa?idkey=f70e4d4e0ad2ed6ad67a8b467475e695b286d536c7ff850db945542188871fc6" target="_blank" rel="noreferrer">群①：50304283</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://shang.qq.com/wpa/qunwpa?idkey=7f77ff420f91ae529eef4045557d25553f3362f4c076d575a09974396597c88c" target="_blank" rel="noreferrer">群②：640279557</a></td>
                </tr>
                <tr>
                  <td>联系我们</td>
                  <td><a href="mailto:service@hisiphp.com" target="_blank" rel="noreferrer">service@hisiphp.com</a></td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="layui-footer footer">
    <span class="fl">Powered by <a href="http://www.hisiphp.com?v=thinkphp5" target="_blank">HisiPHP</a> v1.0.0</span>
    <span class="fr"> © 2017-2018 <a href="http://www.hisiphp.com?v=thinkphp5" target="_blank">HisiPHP.COM</a> All Rights Reserved.</span>
</div>
</div>
<script>
    layui.use(['form'], function() {
        var $ = layui.jquery, form = layui.form();
        form.on('select(group)', function(data) {
            $('#groupShow').html(data.value);
        });
		
    });
	
    layui.use(["form"], function(){
        var form= layui.form();
		
        form.on("select(SelectType)", function(data){
            var OptionIndex = data.elem.selectedIndex; //得到选中的下标
            var text = data.elem.options[OptionIndex].text; //得到选中下标的文本信息
            var elem=$(data.elem);
            if(elem.attr('data-href')){
                window.location.href=elem.attr('data-href')+"?"+elem.attr('name')+"="+elem.val();
            }
            //console.log(data.elem); //得到select原始DOM对象
            //console.log(data.value); //得到被选中的值
        });
		form.render();
    });
</script>

</body></html>