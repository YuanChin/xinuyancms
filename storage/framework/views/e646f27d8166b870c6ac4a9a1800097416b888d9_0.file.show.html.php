<?php
/* Smarty version 3.1.39, created on 2021-09-16 05:39:59
  from 'C:\xampp\htdocs\xinyuancms5\resources\views\show.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6142bc8f389be2_60051173',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e646f27d8166b870c6ac4a9a1800097416b888d9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xinyuancms5\\resources\\views\\show.html',
      1 => 1618478462,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sub/show.html' => 1,
    'file:sub/sidebar.html' => 1,
  ),
),false)) {
function content_6142bc8f389be2_60051173 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20072714236142bc8f37dea8_70788138', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.html");
}
/* {block "content"} */
class Block_20072714236142bc8f37dea8_70788138 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_20072714236142bc8f37dea8_70788138',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <div class="main-body">
    <div class="main-wrap">
      <div class="main-left">
        <?php $_smarty_tpl->_subTemplateRender("file:sub/show.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>
      <div class="main-right">
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
