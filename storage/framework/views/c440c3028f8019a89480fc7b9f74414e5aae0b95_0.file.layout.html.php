<?php
/* Smarty version 3.1.39, created on 2021-08-05 11:17:39
  from 'C:\xampp\htdocs\xinyuancms5\resources\views\admin\layout.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_610bacb3e1bbe2_57897598',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c440c3028f8019a89480fc7b9f74414e5aae0b95' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xinyuancms5\\resources\\views\\admin\\layout.html',
      1 => 1628063585,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_610bacb3e1bbe2_57897598 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/static/common/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="/static/common/font-awesome-4.2.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/static/common/toastr.js/2.1.4/toastr.min.css">
  <link rel="stylesheet" href="/static/admin/css/main.css">
  <?php echo '<script'; ?>
 src="/static/common/jquery/1.12.4/jquery.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="/static/common/twitter-bootstrap/3.4.1/js/bootstrap.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="/static/common/toastr.js/2.1.4/toastr.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="/static/admin/js/main.js"><?php echo '</script'; ?>
>
  <title>内容管理系统</title>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top main-nav" role="navigation">
      <div class="navbar-header">
        <!-- Bootstrap在小屏幕上显示的菜单折叠按钮 -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      <div class="navbar-brand">内容管理系统</div>
    </div>
    <div class="collapse navbar-collapse">
      <div class="main-sidebar">
        <ul class="nav main-menu">
          <li>
            <a href="/admin/index/index" data-name="index">
              <i class="fa fa-home fa-fw"></i>首页
            </a>
          </li>
          <li>
            <a href="/admin/category/index" data-name="category">
              <i class="fa fa-list fa-fw"></i>欄目管理
            </a>
          </li>
          <li>
            <a href="/admin/article/index" data-name="article">
              <i class="fa fa-file-o fa-fw"></i>文章管理
            </a>
          </li>
        </ul>
      </div>
      <ul class="nav navbar-right">
        <li>
          <a href="#"><i class="fa fa-user fa-fw"></i><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a>
        </li>
        <li>
          <a href="/admin/login/logout">
            <i class="fa fa-power-off fa-fw"></i>退出
          </a>
        </li>
      </ul>
    </div>
  </nav>       
  <div class="main-container">
    <!-- 内容区域 -->
    <div class="main-content"></div>
    <div class="main-loading" style="display:none">
      <div class="dot-carousel"></div>
    </div>
  </div>
  <?php echo '<script'; ?>
>
    main.layout();
    main.contentRefresh();	// 页面打开后，加载内容区域
  <?php echo '</script'; ?>
>
</body>
</html><?php }
}
