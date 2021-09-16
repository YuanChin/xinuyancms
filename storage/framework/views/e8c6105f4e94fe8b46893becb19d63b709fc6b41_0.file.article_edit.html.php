<?php
/* Smarty version 3.1.39, created on 2021-08-05 11:22:22
  from 'C:\xampp\htdocs\xinyuancms5\resources\views\admin\article_edit.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_610badce404a04_71858560',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e8c6105f4e94fe8b46893becb19d63b709fc6b41' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xinyuancms5\\resources\\views\\admin\\article_edit.html',
      1 => 1627993468,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_610badce404a04_71858560 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="main-title">
  <h2><?php if ($_smarty_tpl->tpl_vars['id']->value) {?>修改<?php } else { ?>添加<?php }?>文章</h2>
</div>
<div class="main-section">
  <form method="post" action="/admin/article/save" class="j-form">
    <ul class="form-group form-inline">
      <li>
        <input type="text" class="form-control" name="title" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" required>
        <label>文章標題</label>
      </li>
      <li>
        <select name="cid" class="form-control" style="min-width:196px;">
          <option value="0">---</option>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category']->value, 'v');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
          <option value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['v']->value['id'] === $_smarty_tpl->tpl_vars['article']->value['cid']) {?>selected<?php }?>><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 </option>
          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
        <label>所屬分類</label>
      </li>
      <li>
        <input type="text" class="form-control" name="author" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['author'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" required>
        <label>作者</label>
      </li>
      <li>
        <label>封面圖</label>
        <input type="file" name="image">
      </li>
      <?php if ($_smarty_tpl->tpl_vars['article']->value['image']) {?>
      <li>
        <ul class="main-imglist">
          <li>
            <div class="main-imglist-item">
              <a href="/uploads/images/<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['image'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" target="_blank"><img src="/uploads/images/<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['image'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"></a>
            </div>
          </li>
        </ul>
      </li>
      <?php }?>
      <li>
        <label>文章內容</label>
        <div><textarea class="j-content" name="content" style="height:200px"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['content'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</textarea></div>
      </li>
      <li>
        <label><input type="checkbox" name="show" value="1" <?php if ($_smarty_tpl->tpl_vars['article']->value['show']) {?>checked<?php }?>> 發布</label>
      </li>
      <li>
        <input type="hidden" name="id" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
        <input type="submit" value="提交表單" class="btn btn-primary">
        <a href="/admin/article/index" class="btn btn-default">返回列表</a>
      </li>
    </ul>
  </form>
</div>
<?php echo '<script'; ?>
>
  main.menuActive('article');
  main.ajaxForm('.j-form', function () {
    main.content('/admin/article/index');
  });
  main.loadJS('/static/admin/editor/ueditor1.4.3.3/ueditor.config.js');
  main.loadJS('/static/admin/editor/ueditor1.4.3.3/ueditor.all.min.js');
  main.loadJS('/static/admin/editor/main.editor.js');
  main.editor($('.j-content'), 'article_edit', function(opt) {
    opt.UEDITOR_HOME_URL = '/static/admin/editor/ueditor1.4.3.3/'
  }, function(editor) {
    $('.j-form').submit(function() {
      editor.sync();
    });
  });
<?php echo '</script'; ?>
><?php }
}
