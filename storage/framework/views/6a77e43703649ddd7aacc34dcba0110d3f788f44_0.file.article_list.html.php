<?php
/* Smarty version 3.1.39, created on 2021-08-05 11:17:44
  from 'C:\xampp\htdocs\xinyuancms5\resources\views\admin\article_list.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_610bacb895a661_20262479',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a77e43703649ddd7aacc34dcba0110d3f788f44' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xinyuancms5\\resources\\views\\admin\\article_list.html',
      1 => 1627992891,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_610bacb895a661_20262479 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="main-title">
  <h2>文章管理</h2>
</div>
<div class="main-section form-inline">
  <a href="/admin/article/edit" class="btn btn-success">+ 新增</a>
</div>
<div class="main-section">
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>標題</th>
        <th>作者</th>
        <th>已發布</th>
        <th>閱讀量</th>
        <th>創建時間</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($_smarty_tpl->tpl_vars['article']->value) {?>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['article']->value, 'v');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
      <tr>
        <td>
          <a href="/admin/article/edit?id=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a>
        </td>
        <td><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['author'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
        <td><?php if ($_smarty_tpl->tpl_vars['v']->value['show']) {?>是<?php } else { ?>否<?php }?></td>
        <td><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['views'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
        <td><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['created_at'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
        <td>
          <a href="/admin/article/edit?id=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" style="margin-right:5px;">编辑</a>
          <a href="/admin/article/delete?id=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="j-del text-danger">删除</a>
        </td>
      </tr>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      <?php } else { ?>
      <tr>
        <td colspan="6" class="text-center">列表為空</td>
      </tr>
      <?php }?>
    </tbody>
  </table>
  <div class="text-center"><?php echo $_smarty_tpl->tpl_vars['page_html']->value;?>
</div>
</div>
<?php echo '<script'; ?>
>
  main.menuActive('article');
  $('.j-del').click(function() {
    if (confirm('您確定要刪除此項？')) {
      main.ajaxPost($(this).attr('href'), function() {
        main.contentRefresh();
      });
    }
    return false;
  });
<?php echo '</script'; ?>
><?php }
}
