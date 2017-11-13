<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"/Applications/MAMP/htdocs/start/sbt/application/admin/view/orders/index.html";i:1508117928;s:77:"/Applications/MAMP/htdocs/start/sbt/application/admin/view/common/header.html";i:1510106379;s:77:"/Applications/MAMP/htdocs/start/sbt/application/admin/view/common/footer.html";i:1509948237;}*/ ?>
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


<div class="layui-tab-content page-tab-content">
  <div class="layui-tab-item layui-show">
    <div class="page-toolbar">
      <div class="page-filter fr" style="height: 98px;">
        <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" method="get">

          <div class="layui-form-item">
            <label class="layui-form-label">交易类型</label>
            <div class="layui-input-inline layui-select">
              <select name="order_type" class="field-type" type="select">
                <option value="0" <?php if(\think\Request::instance()->get('order_type') == ''): ?>selected=selected<?php endif; ?>>请选择</option>
                <option value="1" <?php if(\think\Request::instance()->get('order_type') == '1'): ?>selected=selected<?php endif; ?>>D+0</option>
                <option value="2" <?php if(\think\Request::instance()->get('order_type') == '2'): ?>selected=selected<?php endif; ?>>T+1</option>

              </select>
            </div>
            <div class="layui-form-mid layui-word-aux"></div>
          </div>

          <div class="layui-form-item">
            <label class="layui-form-label">支付通道</label>
            <div class="layui-input-inline layui-select">
              <select name="pay_prot_id" class="field-type" type="select">
                <option value="0" <?php if(\think\Request::instance()->get('pay_prot_id') == ''): ?>selected=selected<?php endif; ?>>请选择</option>
                <option value="1" <?php if(\think\Request::instance()->get('pay_prot_id') == '1'): ?>selected=selected<?php endif; ?>>上福支付</option>
                <option value="2" <?php if(\think\Request::instance()->get('pay_prot_id') == '2'): ?>selected=selected<?php endif; ?>>汇祥天成</option>
              </select>
            </div>
            <div class="layui-form-mid layui-word-aux"></div>
          </div>




          <div class="layui-form-item">
            <label class="layui-form-label">订单状态</label>
            <div class="layui-input-inline layui-select">
              <select name="order_status" class="field-type" type="select">
                <option value="0" <?php if(\think\Request::instance()->get('order_status') == ''): ?>selected=selected<?php endif; ?>>请选择</option>
                <option value="SUCCESS" <?php if(\think\Request::instance()->get('order_status') == 'SUCCESS'): ?>selected=selected<?php endif; ?>>已完成</option>
                <option value="FAIL" <?php if(\think\Request::instance()->get('order_status') == 'FALT'): ?>selected=selected<?php endif; ?>>已关闭</option>
                <option value="NOTPAY" <?php if(\think\Request::instance()->get('order_status') == 'NOTPAY'): ?>selected=selected<?php endif; ?>>未支付</option>
                <option value="PROCESSING" <?php if(\think\Request::instance()->get('order_status') == 'PROCESSING'): ?>selected=selected<?php endif; ?>>处理中</option>
              </select>
            </div>
            <div class="layui-form-mid layui-word-aux"></div>
          </div>


          <div class="layui-form-item">
            <label class="layui-form-label">开始时间</label>
            <div class="layui-input-inline">
              <input type="date" name="order_time" value="<?php echo \think\Request::instance()->get('order_time'); ?>" lay-verify="required"  autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">结束时间</label>
            <div class="layui-input-inline">
              <input type="date" name="end_time" value="<?php echo \think\Request::instance()->get('end_time'); ?>" lay-verify="required"  autocomplete="off" class="layui-input">
            </div>
          </div>

          <div class="layui-form-item">
            <label class="layui-form-label">搜索</label>
            <div class="layui-input-inline">
              <input type="text" name="keyworld" value="<?php echo \think\Request::instance()->get('keyworld'); ?>" lay-verify="required" placeholder="姓名、手机号、订单号" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <div class="layui-input-inline">
              <button type="submit" class="layui-btn seach-btn" >查找</button>
            </div>
          </div>
          <div class="layui-form-item">
            <div class="layui-input-inline">
              <a class="layui-btn seach-btn" href="<?php echo url('orders/load'); ?><?php echo $seach; ?>">下载excel</a>
            </div>
          </div>

        </form>
      </div>
      <div class="layui-btn-group fl">
        <!--<a href="<?php echo url('add'); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加</a>
        <a data-href="<?php echo url('status?table=user&status=1'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
        <a data-href="<?php echo url('status?table=user&status=0'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
        -->
		<a data-href="<?php echo url('delete'); ?>" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>一键关闭</a>
      </div>
      <div style="line-height:40px;padding-left:30px;">
        总笔数：<span style="color:red;"><?php echo $count; ?></span>&nbsp;&nbsp;&nbsp;
        总交易额 ：<span style="color:red;"><?php echo $data['orders_total']; ?></span> 元&nbsp;&nbsp;&nbsp;
        成功订单数：<span style="color:red;"><?php echo $data['success_count']; ?></span>&nbsp;
        成功订单金额 ：<span style="color:red;"><?php echo $data['success_total']; ?></span> 元&nbsp;&nbsp;&nbsp;
        失败订单数：<span style="color:red;"><?php echo $data['falt_count']; ?></span>&nbsp;
        失败订单金额 ：<span style="color:red;"><?php echo $data['falt_total']; ?></span> 元&nbsp;&nbsp;&nbsp;
        到账金额 ：<span style="color:red;"><?php echo $data['into_total']; ?></span> 元

      </div>

    </div>

    <form id="pageListForm">
      <div class="layui-form">
        <table class="layui-table mt10" lay-even="" lay-skin="row">
          <colgroup>
            <col width="50">
          </colgroup>
          <thead>
          <tr>
            <th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><i class="layui-icon"></i></div></th>
            <th>订单号</th>
            <th>提现手机号</th>
            <th style="width:72px;">用户姓名</th>
            <th style="width: 180px;">提现金额&&到账金额</th>
            <th>手续费&&服务费</th>
            <th>支付信息</th>
            <th>支付通道</th>
            <th>订单状态</th>
            <th>订单时间</th>
            <th>操作</th>
          </tr>
          </thead>
          <tbody>
          <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
              <td><input type="checkbox" name="ids[]" value="<?php echo $vo['id']; ?>" class="layui-checkbox checkbox-ids" lay-skin="primary"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><i class="layui-icon"></i></div></td>
              <td><?php echo $vo['order_id']; ?></td>
              <td><?php echo $vo['user_id']; ?></td>
              <td><?php echo $vo['name']; ?></td>


              <td  style="width: 180px;">
                <p>提现金额：<?php echo $vo['order_money']; ?>（元）</p>
                <p>到账金额：<?php echo $vo['arrival_amount']; ?>（元）</p>
              </td>
              <td>
                <p>手续费：<?php echo $vo['cover_charge']; ?>（元）</p>
                <p>服务费：<?php echo $vo['service_charge']; ?>（元）</p>
              </td>

              <td>
                <p>支付卡：<br/>&nbsp;&nbsp;&nbsp;<?php echo $vo['from_card']; ?></p>
                <p>到账卡：<br/>&nbsp;&nbsp;&nbsp;<?php echo $vo['to_card']; ?></p>

              </td>

              <td>

                <p><?php if($vo['pay_prot_id'] == '1'): ?>上福支付<?php endif; ?></p>
                <p><?php if($vo['pay_prot_id'] == '2'): ?>汇享天成<?php endif; ?></p>
              </td>


              <td>
                <?php switch($vo['order_status']): case "SUCCESS": ?>已完成<?php break; case "FAIL": ?>已关闭<?php break; case "NOTPAY": ?>未支付<?php break; case "PROCESSING": ?>处理中<?php break; endswitch; ?>
              </td>
              <td><?php echo date('Y-m-d H:i:s', $vo['order_time']); ?></td>

              <td>
                <div class="layui-btn-group">
                  <div class="layui-btn-group">
                    <a href="<?php echo url('edit?ids='.$vo['id']); ?>" class="layui-btn layui-btn-primary layui-btn-small"><i class="layui-icon"></i></a>
                    <a data-href="<?php echo url('delete?ids='.$vo['id']); ?>" class="layui-btn layui-btn-primary layui-btn-small j-tr-del"><i class="layui-icon"></i></a>
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


