<?php
/* Smarty version 3.1.39, created on 2021-08-05 11:17:24
  from 'C:\xampp\htdocs\xinyuancms5\resources\views\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_610baca46d5593_78988738',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '20f59e4dd9c668460b97cf0d54174645742ca9f4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xinyuancms5\\resources\\views\\index.html',
      1 => 1625046864,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sub/slide.html' => 1,
    'file:sub/list.html' => 1,
    'file:sub/sidebar.html' => 1,
  ),
),false)) {
function content_610baca46d5593_78988738 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2030227491610baca46b4d25_56000328', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.html");
}
/* {block "content"} */
class Block_2030227491610baca46b4d25_56000328 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2030227491610baca46b4d25_56000328',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if (!$_smarty_tpl->tpl_vars['id']->value) {?>
  <?php $_smarty_tpl->_subTemplateRender("file:sub/slide.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}?>
<div class="main-body">
<div class="main-wrap">
  <div class="main-left">
    <!-- 文章列表 -->
    <?php $_smarty_tpl->_subTemplateRender("file:sub/list.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  </div>
  <div class="main-right">
    <!-- 侧边栏 -->
    <?php $_smarty_tpl->_subTemplateRender("file:sub/sidebar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  </div>
</div>
</div>
<?php
}
}
/* {/block "content"} */
}
