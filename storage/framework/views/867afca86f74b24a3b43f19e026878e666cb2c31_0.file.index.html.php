<?php
/* Smarty version 3.1.39, created on 2021-08-05 11:17:40
  from 'C:\xampp\htdocs\xinyuancms5\resources\views\admin\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_610bacb4e4af61_39274142',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '867afca86f74b24a3b43f19e026878e666cb2c31' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xinyuancms5\\resources\\views\\admin\\index.html',
      1 => 1628063808,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_610bacb4e4af61_39274142 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="main-title">
  <h2>首頁</h2>
</div>
<div class="main-section">
  <div class="panel panel-default">
    <div class="panel-heading">歡迎訪問</div>
    <div class="panel-body">歡迎進入Xinyuan CMS！</div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">伺服器訊息</div>
    <ul class="list-group">
      <li class="list-group-item">
        系統環境：<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['server_info']->value['server_version'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

      </li>
      <li class="list-group-item">
        MySQL版本：<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['server_info']->value['mysql_version'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

      </li>
      <li class="list-group-item">
        文件上傳限制：<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['server_info']->value['upload_max_filesize'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

      </li>
      <li class="list-group-item">
        腳本執行時限：<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['server_info']->value['max_execution_time'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

      </li>
      <li class="list-group-item">
        伺服器時間：<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['server_info']->value['server_time'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

      </li>
    </ul>
  </div>
</div>
<?php echo '<script'; ?>
>
  main.menuActive('index');
<?php echo '</script'; ?>
><?php }
}
