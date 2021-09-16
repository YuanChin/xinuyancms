<?php
/* Smarty version 3.1.39, created on 2021-08-05 11:17:24
  from 'C:\xampp\htdocs\xinyuancms5\resources\views\sub\list.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_610baca47424f9_46077895',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c2215e7a9dcabcee585f97d5469b6354cdb5cd2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xinyuancms5\\resources\\views\\sub\\list.html',
      1 => 1627999755,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_610baca47424f9_46077895 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="al">
  <?php if ((isset($_smarty_tpl->tpl_vars['category_name']->value))) {?>
    <div class="al-title"><h1><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['category_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</h1></div>
  <?php }?>
  <?php if ($_smarty_tpl->tpl_vars['article']->value) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['article']->value, 'v');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
      <div class="al-each">
        <div class="al-info">
          <a href="/show?id=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['v']->value['image']) {?>
          <div class="al-img">
            <a href="/show?id=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
              <img src="/uploads/images/<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['image'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" alt="点击阅读文章">
            </a>
          </div>
        <?php }?>
        <div class="al-more">
          <span>作者：<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['author'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 | 發表於：<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['created_at'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</span>
        </div>
      </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  <?php } else { ?>
    <div class="al-message">
      該欄目內暫時沒有內容。<p><a href="/">點擊返回首頁</a></p>
    </div>
  <?php }?>
</div>
<div class="pagelist"><?php echo $_smarty_tpl->tpl_vars['page_html']->value;?>
</div><?php }
}
