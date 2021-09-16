<?php
/* Smarty version 3.1.39, created on 2021-09-16 05:39:59
  from 'C:\xampp\htdocs\xinyuancms5\resources\views\sub\show.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6142bc8f3da856_36533210',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '05ebefa2f5cb9142ae2e4a118518a323c309f9c8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xinyuancms5\\resources\\views\\sub\\show.html',
      1 => 1627999807,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6142bc8f3da856_36533210 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="as">
  <?php if ($_smarty_tpl->tpl_vars['article']->value) {?>
    <div class="as-title"><h1><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</h1></div>
    <div class="as-row">
      <span>欄目：
          <?php if ((isset($_smarty_tpl->tpl_vars['category_name']->value))) {?>
            <a href="/show?id=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['cid'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['category_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a>
          <?php } else { ?>
            無
          <?php }?>
        </span>
      <span>作者：<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['author'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</span>
      <span>發表時間：<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['created_at'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</span>
      <span>閱讀：<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['views'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
次</span>
    </div>
    <div class="as-content"><?php echo $_smarty_tpl->tpl_vars['article']->value['content'];?>
</div>
    <div class="as-change">
      <span>上一篇：
        <?php if ($_smarty_tpl->tpl_vars['article_prev']->value) {?>
          <a href="/show?id=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['article_prev']->value['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"
          title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['article_prev']->value['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['article_prev']->value['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a>
        <?php } else { ?>
          無
        <?php }?>
      </span>
      <span>下一篇：
        <?php if ($_smarty_tpl->tpl_vars['article_next']->value) {?>
          <a href="/show?id=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['article_next']->value['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"
          title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['article_next']->value['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['article_next']->value['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a>
        <?php } else { ?>
          無
        <?php }?>
      </span>
    </div>
  <?php } else { ?>
    <div class="as-message">
      您查看的文章不存在。<p><a href="/">點我返回首頁</a></p>
    </div>
  <?php }?>
</div><?php }
}
