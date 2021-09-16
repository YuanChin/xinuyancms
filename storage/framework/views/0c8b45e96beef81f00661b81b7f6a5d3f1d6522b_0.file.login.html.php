<?php
/* Smarty version 3.1.39, created on 2021-08-05 11:17:30
  from 'C:\xampp\htdocs\xinyuancms5\resources\views\admin\login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_610bacaab1b143_47906450',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c8b45e96beef81f00661b81b7f6a5d3f1d6522b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xinyuancms5\\resources\\views\\admin\\login.html',
      1 => 1627999671,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_610bacaab1b143_47906450 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/static/common/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
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
  <title>會員登入</title>
</head>
<body class="login">
  <div class="container">
    <form method="post" action="/admin/login/login" class="j-login">
      <h1>Xinyuan CMS</h1>
      <div class="form-group">
        <input type="text" name="username" class="form-control" placeholder="使用者" required>
      </div>
      <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="密碼" required>
      </div>
      <div class="form-group">
        <input type="text" name="captcha" class="form-control" placeholder="驗證碼" required>
      </div>
      <div class="form-group">
        <div class="login-captcha"><img src="/admin/login/captcha" alt="captcha"></div>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-lg btn-success" value="登入">
      </div>
    </form>
    <div class="main-loading" style="display:none">
      <div class="dot-carousel"></div>
    </div>
  </div>
  <?php echo '<script'; ?>
>
    $('.login-captcha img').click(function () {
      $(this).attr('src', '/admin/login/captcha?_=' + Math.random());
    });
    main.ajaxForm('.j-login', function() {
      location.href = '/admin/index/index';
    }, function() {
      $('.login-captcha img').click();
    });
  <?php echo '</script'; ?>
>
</body>
</html><?php }
}
