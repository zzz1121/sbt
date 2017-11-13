<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"/Applications/MAMP/htdocs/start/sbt/application/index2/view/charge/rate.html";i:1510372611;s:78:"/Applications/MAMP/htdocs/start/sbt/application/index2/view/common/header.html";i:1509590836;s:78:"/Applications/MAMP/htdocs/start/sbt/application/index2/view/common/footer.html";i:1507794459;}*/ ?>
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
            <!--<li class="layui-nav-item"><a href="/" target="_blank">前台</a></li>-->
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
                <a href="javascript:void(0);">签约代理商&nbsp;&nbsp;</a>
                <dl class="layui-nav-child">
                    <dd><a href="<?php echo url('personal/info'); ?>">个人设置</a></dd>
                    <dd><a href="<?php echo url('publics/logout'); ?>">退出登陆</a></dd>
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
                        <dd><a class="admin-nav-item" href="<?php echo url('statement/index'); ?>">个人统计</a></dd>
                        <dd><a class="admin-nav-item" href="<?php echo url('charge/index'); ?>">代理费率设置</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item layui-nav-itemed">
                    <a href="javascript:;"><i class="aicon ai-shezhi"></i>代理功能<span class="layui-nav-more"></span></a>
                    <dl class="layui-nav-child">
                        <!--<dd><a class="admin-nav-item" href="<?php echo url('level/index'); ?>">会员等级</a></dd>-->
                        <dd><a class="admin-nav-item" href="<?php echo url('user/index'); ?>">推广列表</a></dd>
                        <dd><a class="admin-nav-item" href="<?php echo url('orders/index'); ?>">交易查询</a></dd>
                        <dd><a class="admin-nav-item" href="<?php echo url('brokerage/index'); ?>">抽成记录</a></dd>
                        <dd><a class="admin-nav-item" href="<?php echo url('payorders/index'); ?>">提现记录</a></dd>
                        <!--<dd><a class="admin-nav-item" href="<?php echo url('merchant/audit'); ?>">升级审核</a></dd>-->
                    </dl>
                </li>
                <!--<li class="layui-nav-item layui-nav-itemed">-->
                    <!--<a href="javascript:;"><i class="aicon ai-shezhi"></i>运营管理<span class="layui-nav-more"></span></a>-->
                    <!--<dl class="layui-nav-child">-->
                        <!--&lt;!&ndash;<dd><a class="admin-nav-item" href="<?php echo url('orders/index'); ?>">交易查询</a></dd>&ndash;&gt;-->
                        <!--&lt;!&ndash;<dd><a class="admin-nav-item" href="<?php echo url('brokerage/index'); ?>">抽成记录</a></dd>&ndash;&gt;-->
                        <!--&lt;!&ndash;<dd><a class="admin-nav-item" href="<?php echo url('payorders/index'); ?>">提现记录</a></dd>&ndash;&gt;-->
                        <!--&lt;!&ndash;<dd><a class="admin-nav-item" href="<?php echo url('question/index'); ?>">客户反馈</a></dd>&ndash;&gt;-->
                        <!--&lt;!&ndash;<dd><a class="admin-nav-item" href="<?php echo url('activity/index'); ?>">活动管理</a></dd>&ndash;&gt;-->
                    <!--</dl>-->
                <!--</li>-->
                <!--<li class="layui-nav-item layui-nav-itemed">-->
                    <!--<a href="javascript:;"><i class="aicon ai-shezhi"></i>系统扩展<span class="layui-nav-more"></span></a>-->
                    <!--&lt;!&ndash;<dl class="layui-nav-child">&ndash;&gt;-->
                        <!--&lt;!&ndash;<dd><a class="admin-nav-item" href="<?php echo url('user/index'); ?>">模块管理</a></dd>&ndash;&gt;-->
                        <!--&lt;!&ndash;<dd><a class="admin-nav-item" href="<?php echo url('user/index'); ?>">插件管理</a></dd>&ndash;&gt;-->
                        <!--&lt;!&ndash;<dd><a class="admin-nav-item" href="<?php echo url('user/index'); ?>">钩子管理</a></dd>&ndash;&gt;-->
                        <!--&lt;!&ndash;<dd><a class="admin-nav-item" href="<?php echo url('user/index'); ?>">在线升级</a></dd>&ndash;&gt;-->
                    <!--&lt;!&ndash;</dl>&ndash;&gt;-->
                <!--</li>-->
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
                        <a href="javascript:;" id="curTitle">会员列表</a>
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
    <?php if(is_array($user_rate) || $user_rate instanceof \think\Collection || $user_rate instanceof \think\Paginator): $i = 0; $__LIST__ = $user_rate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($pay_id == $vo['pay_id']): ?>
          <p>取现成本：<span style="color:red;"><?php echo $vo['settle_rate']*10000/100; ?>%</span></p>
          <p>取现费率设定必须大于 <span style="color:red;"><?php echo $vo['settle']*10000/100; ?>%</span></p>
          <p>服务费成本为：<span style="color:red;"><?php echo $vo['extra_rate']/100; ?>元</span></p>

        <?php endif; endforeach; endif; else: echo "" ;endif; ?>

    <form class="layui-form layui-form-pane" action="<?php echo url('update'); ?>" method="post" id="editForm">
      <div class="layui-form-item">
        <label class="layui-form-label">支付通道选择</label>
        <div class="layui-input-inline ">
          <select name="id" class="field-type" type="select" data-href="<?php echo url(''); ?>" lay-filter="SelectType">
              <?php if(is_array($user_rate) || $user_rate instanceof \think\Collection || $user_rate instanceof \think\Paginator): $i = 0; $__LIST__ = $user_rate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $vo['pay_id']; ?>" <?php if(\think\Request::instance()->get('id') == $vo['pay_id']): ?>selected="selected"<?php endif; ?>><?php echo $vo['pay_name']; ?></option>

              <?php endforeach; endif; else: echo "" ;endif; ?>
          </select>
        </div>
      </div>

      <?php if(is_array($rate) || $rate instanceof \think\Collection || $rate instanceof \think\Paginator): $i = 0; $__LIST__ = $rate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;switch($vo['user_lv']): case "2": ?>
          <p>通道：<?php echo $vo['pay_name']; ?></p>
          <input type="hidden" class="layui-input field-title" name="user_lv[]"
                 value="<?php echo $vo['user_lv']*100/100; ?>" lay-verify="required" autocomplete="off" placeholder="">
          <div class="layui-form-item">
            <label class="layui-form-label">直属费率，单位：%</label>
            <div class="layui-input-inline w300">
              <input type="number" class="layui-input field-title" name="settle_rate[]"
                     value="<?php echo $vo['settle_rate']*10000/100; ?>" lay-verify="required" autocomplete="off" placeholder="">
            </div>
            <div class="layui-form-mid layui-word-aux">直属用户费率，单位：%<br/>“0.3%” 代表费率千分之3</div>
          </div>

        <?php break; case "3": ?>
          <p>通道：<?php echo $vo['pay_name']; ?></p>
          <input type="hidden" class="layui-input field-title" name="user_lv[]"
                 value="<?php echo $vo['user_lv']*100/100; ?>" lay-verify="required" autocomplete="off" placeholder="">
          <div class="layui-form-item">
            <label class="layui-form-label">终端提现费率</label>
            <div class="layui-input-inline w300">
              <input type="number" class="layui-input field-title" name="settle_rate[]"
                     value="<?php echo $vo['settle_rate']*10000/100; ?>" lay-verify="required" autocomplete="off" placeholder="请输入最低手续费">
            </div>
            <div class="layui-form-mid layui-word-aux">终端提现费率，单位：%<br/>"0.3%” 代表费率千分之3,不可输入整数</div>
          </div>
        <?php break; endswitch; endforeach; endif; else: echo "" ;endif; ?>
      <div class="layui-form-item">
        <label class="layui-form-label">直属返利</label>
        <div class="layui-input-inline w300">
          <input type="number" class="layui-input field-title" name="parent"
                 value="<?php echo $vo['parent']*10000/100; ?>" lay-verify="required" autocomplete="off" placeholder="">
        </div>
        <div class="layui-form-mid layui-word-aux">直属返利<br/>"0.3%” 代表费率千分之3,不可输入整数</div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">间接返利，单位：%</label>
        <div class="layui-input-inline w300">
          <input type="number" class="layui-input field-title" name="superior"
                 value="<?php echo $vo['superior']*10000/100; ?>" lay-verify="required" autocomplete="off" placeholder="">
        </div>
        <div class="layui-form-mid layui-word-aux">间接返利，单位：%<br/>"0.3%” 代表费率千分之3,不可输入整数</div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">取现服务费</label>
        <div class="layui-input-inline w300">
          <input type="number" class="layui-input field-title" name="extra_rate"
                 value="<?php echo $vo['extra_rate']/100; ?>" lay-verify="required" autocomplete="off" placeholder="">
        </div>
        <div class="layui-form-mid layui-word-aux">取现服务费<br/>单位：元</div>
      </div>

      <div class="layui-form-item">
        <div class="layui-input-block">
          <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
        </div>
      </div>

    </form>


<div class="layui-footer footer">
    <span class="fl">Powered by <a href="http://www.hisiphp.com?v=thinkphp5" target="_blank">HisiPHP</a> v1.0.0</span>
    <span class="fr"> © 2017-2018 <a href="http://www.hisiphp.com?v=thinkphp5" target="_blank">HisiPHP.COM</a> All Rights Reserved.</span>
</div>
</div>
<script src="__ADMIN_JS__/js/global.js"></script>
<script>
    layui.use(['form'], function() {
        var $ = layui.jquery, form = layui.form();
        form.on('select(group)', function(data) {
            console.log(data);
            $('#groupShow').html(data.value);
        });
		
    });
	
    layui.use(["form"], function(){
        var form= layui.form();
		
        form.on("select(SelectType)", function(data){
            var OptionIndex = data.elem.selectedIndex; //得到选中的下标
            var text = data.elem.options[OptionIndex].text; //得到选中下标的文本信息
            var elem=$(data.elem);
            console.log(elem.attr('data-href'));
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
<!--<script src="__ADMIN_JS__/js/footer.js"></script>-->
