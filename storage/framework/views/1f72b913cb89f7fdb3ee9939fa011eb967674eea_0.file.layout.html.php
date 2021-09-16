<?php
/* Smarty version 3.1.39, created on 2021-08-05 11:17:24
  from 'C:\xampp\htdocs\xinyuancms5\resources\views\layout.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_610baca46ffe35_51014885',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f72b913cb89f7fdb3ee9939fa011eb967674eea' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xinyuancms5\\resources\\views\\layout.html',
      1 => 1627999705,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_610baca46ffe35_51014885 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 - 内容管理系统</title>
  <link rel="stylesheet" href="/static/css/style.css">
  <?php echo '<script'; ?>
 src="/static/js/jquery.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="/static/js/common.js"><?php echo '</script'; ?>
>
</head>
<body>
  <!--页面顶部-->
  <div class="top">
    <div class="top-container">
      <div class="top-logo">
        <a href="./">
          <img src="/static/images/logo.png" alt="内容管理系统">
        </a>
      </div>
      <div class="top-nav">
        <a href="/" class="<?php if ($_smarty_tpl->tpl_vars['id']->value == 0) {?>curr<?php }?>">首頁</a>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category']->value, 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
          <a href="/?id=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['value']->value['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="<?php if ($_smarty_tpl->tpl_vars['id']->value == $_smarty_tpl->tpl_vars['value']->value['id']) {?>curr<?php }?>"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['value']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </div>
      <div class="top-toggle jq-toggle-btn"><i></i><i></i><i></i></div>
    </div>
  </div>
  <!--页面内容-->
  <div class="main">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1142213767610baca46fdf12_26349136', "content");
?>

  </div>
  <!--页面尾部-->
  <div class="footer">PHP内容管理系统</div>
</body>
</html>
<?php }
/* {block "content"} */
class Block_1142213767610baca46fdf12_26349136 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1142213767610baca46fdf12_26349136',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "content"} */
}
