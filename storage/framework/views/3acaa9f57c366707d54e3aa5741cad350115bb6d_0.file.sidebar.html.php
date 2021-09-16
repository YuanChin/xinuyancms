<?php
/* Smarty version 3.1.39, created on 2021-08-05 11:17:24
  from 'C:\xampp\htdocs\xinyuancms5\resources\views\sub\sidebar.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_610baca479dc00_30829136',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3acaa9f57c366707d54e3aa5741cad350115bb6d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xinyuancms5\\resources\\views\\sub\\sidebar.html',
      1 => 1626310591,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_610baca479dc00_30829136 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="si">
  <!-- 热门标签 -->
  <div class="si-each">
    <div class="si-title">熱門標籤</div>
    <div class="si-p1">
      <a href="#">PHP</a><a href="#">JavaScript</a>
      <a href="#">MySQL</a><a href="#">Python</a>
      <a href="#">Java</a><a href="#">C++</a>
      <a href="#">Linux</a><a href="#">shell</a>
    </div>
  </div>
  <!-- 最新文章 -->
  <div class="si-each">
    <div class="si-title">最新文章</div>
    <div class="si-p2">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['article_new']->value, 'v');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
        <p><a href="/show?id=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a></p>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
  </div>
  <!-- 最热文章 -->
  <div class="si-each">
    <div class="si-title">
      <span class="si-p3-top">TOP 10</span> 熱門文章
    </div>
    <div class="si-p3">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['article_hot']->value, 'v');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
        <p><a href="/show?id=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a></p>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
  </div>
</div><?php }
}
