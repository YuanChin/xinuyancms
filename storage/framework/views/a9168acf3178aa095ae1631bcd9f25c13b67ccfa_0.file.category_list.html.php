<?php
/* Smarty version 3.1.39, created on 2021-08-05 11:17:43
  from 'C:\xampp\htdocs\xinyuancms5\resources\views\admin\category_list.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_610bacb7373816_12492522',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a9168acf3178aa095ae1631bcd9f25c13b67ccfa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xinyuancms5\\resources\\views\\admin\\category_list.html',
      1 => 1627993636,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_610bacb7373816_12492522 (Smarty_Internal_Template $_smarty_tpl) {
?><div>
  <div class="main-title">
    <h2>欄目管理</h2>
  </div>
  <div class="main-section form-inline">
    <a href="/admin/category/edit" class="btn btn-success">+ 新增</a>
  </div>
  <div class="main-section">
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th>欄目名稱</th>
          <th>排序值</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($_smarty_tpl->tpl_vars['category']->value) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category']->value, 'v');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
        <tr>
          <td><a href="/admin/category/edit?id=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a></td>
          <td><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['sort'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
          <td>
            <a href="/admin/category/edit?id=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" style="margin-right:5px;">編輯</a>
            <a href="/admin/category/delete?id=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="j-del text-danger">刪除</a>
          </td>
        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php } else { ?>
        <tr>
          <td colspan="3" class="text-center">列表為空</td>
        </tr>
        <?php }?>
      </tbody>
    </table>
  </div>
</div>
<?php echo '<script'; ?>
>
  main.menuActive('category');
  $('.j-del').click(function () {
    if (confirm('您確定要刪除此項？')) {
      main.ajaxPost($(this).attr('href'), function () {
        main.contentRefresh();
      });
    }
    return false;
  });
<?php echo '</script'; ?>
><?php }
}
