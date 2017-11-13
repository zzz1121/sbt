<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"/Applications/MAMP/htdocs/start/sbt/application/admin/view/user/index.html";i:1510043091;s:77:"/Applications/MAMP/htdocs/start/sbt/application/admin/view/common/header.html";i:1510106379;s:77:"/Applications/MAMP/htdocs/start/sbt/application/admin/view/common/footer.html";i:1509948237;}*/ ?>
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

<?php $role_id = \think\Request::instance()->get('role_id'); ?>
<div class="layui-tab-content page-tab-content">
    <div class="layui-tab-item layui-show">
<div class="page-toolbar">
    <div class="page-filter fr">
        <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" method="get">
            <div class="layui-form-item">
                <label class="layui-form-label">用户实名状态</label>
                <div class="layui-input-inline layui-select">
                    <select name="card_status" class="field-type" type="select">
                        <option value="-1" <?php if(\think\Request::instance()->get('card_status') == ''): ?>selected=selected<?php endif; ?>>请选择</option>
                        <option value="1" <?php if(\think\Request::instance()->get('card_status') == '1'): ?>selected=selected<?php endif; ?>>已认证</option>
                        <option value="0" <?php if(\think\Request::instance()->get('card_status') == '0'): ?>selected=selected<?php endif; ?>>未认证</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux"></div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">用户等级</label>
                <div class="layui-input-inline layui-select">
                    <select name="role_id" class="field-type" type="select">
                        <option value="-1">请选择</option>
                        <?php if(is_array($role_data) || $role_data instanceof \think\Collection || $role_data instanceof \think\Paginator): $i = 0; $__LIST__ = $role_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $v['role_id']; ?>" <?php if($v['role_id'] == \think\Request::instance()->get('role_id')): ?>selected=selected<?php endif; ?> ><?php echo $v['role_name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux"></div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">注册时间</label>
                <div class="layui-input-inline">
                    <input type="date" name="reg_time" value="<?php echo \think\Request::instance()->get('reg_time'); ?>" lay-verify="required" placeholder="姓名,手机号查找" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">搜索</label>
                <div class="layui-input-inline">
                    <input type="text" name="keyworld" value="<?php echo \think\Request::instance()->get('keyworld'); ?>" lay-verify="required" placeholder="姓名,手机号查找" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-inline">
                    <button type="submit" class="layui-btn seach-btn" >提交</button>
                </div>
            </div>

        </form>
    </div>
    <div class="layui-btn-group fl">
        <!--<a href="<?php echo url('add'); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加</a>-->
        <a data-href="<?php echo url('status?table=user&status=1'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
        <a data-href="<?php echo url('status?table=user&status=0'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
        <!-- <a data-href="<?php echo url('delUser'); ?>" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>-->
    </div>
</div>
<form id="pageListForm"  class="layui-form layui-form-pane">




    <div class="layui-form">
        <table class="layui-table mt10" lay-even="" lay-skin="row">
            <colgroup>
                <col width="50">
            </colgroup>
            <thead>
            <tr>
                <th><input type="checkbox" lay-skin="primary" lay-filter="allChoose"></th>
                <th>会员</th>
                <th>等级&交易量</th>
                <th>资金</th>
                <th>直属商户&间接商户</th>
                <th>注册时间</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>

            <?php if(is_array($user_list) || $user_list instanceof \think\Collection || $user_list instanceof \think\Paginator): $i = 0; $__LIST__ = $user_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><input type="checkbox" name="ids[]" class="layui-checkbox checkbox-ids" value="<?php echo $vo['user_id']; ?>" lay-skin="primary"></td>
                <td class="font12">
                    <img src="<?php if($vo['picture']): ?>http://__ROOT_PATH__/<?php echo $vo['picture']; else: ?>__ADMIN_JS__/image/avatar.png<?php endif; ?>" width="60" height="60" class="fl">
                    <p class="ml10 fl"><strong class="mcolor">
                        <?php if($vo['name']): ?>
                            <?php echo $vo['name']; else: ?>未认证<?php endif; ?>
                    </strong>
                        <br>手机：<?php echo $vo['user_id']; ?><br>上级代理：<?php echo $vo['merchant_id']; ?></p>
                </td>
                <td class="font12">

                    <?php if($vo['user_type'] == 1): ?>
                    用户等级:<?php echo $role_data[$vo['role_id']-1]['role_name']; endif; if($vo['user_type'] == 2): ?>
                    用户等级:
                        <?php if($vo['is_merchant'] == 2): ?>签约代理<?php endif; if($vo['is_merchant'] == 1): ?>代理下线<?php endif; endif; ?>
                    <br>
                    下属商户数：<?php echo $vo['underling']+$vo['indirect']; ?></td>
                <td class="font12">余额：<?php echo $vo['balance']; ?><br>交易量：<?php echo $vo['integral']; ?></td>
                <td class="font12">直属商户：<?php echo $vo['underling']; ?><br>间接商户：<?php echo $vo['indirect']; ?></td>
                <td class="font12">注册：<?php echo date('Y-m-d H:i:s', $vo['reg_time']); ?><br>登陆：<?php echo date('Y-m-d H:i:s', $vo['reg_time']); ?></td>
                <td><input type="checkbox"  <?php if($vo['login_status'] == 1): ?>checked=""<?php endif; ?> value="<?php echo $vo['login_status']; ?>" lay-skin="switch" lay-filter="switchStatus" lay-text="正常|锁定" data-href="<?php echo url('status?table=user&ids='.$vo['user_id']); ?>"></td>
                <td>
                    <div class="layui-btn-group">
                        <div class="layui-btn-group">
                            <a href="<?php echo url('edit?user_id='.$vo['user_id']); ?>" class="layui-btn layui-btn-primary layui-btn-small"><i class="layui-icon">&#xe642;</i></a>
                            <!--<a data-href="<?php echo url('edit?user_id='.$vo['user_id']); ?>" class="layui-btn layui-btn-primary layui-btn-small j-tr-del"><i class="layui-icon">&#xe640;</i></a>
							-->
						</div>
                    </div>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <?php echo $pages; ?>
    </div>
</form>




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

