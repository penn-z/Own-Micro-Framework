<?php
/* Smarty version 3.1.30, created on 2016-12-16 23:08:35
  from "/var/www/mvc/tpl/index/about.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58540373b2fea7_01687098',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd17816df4796e6bd7f7bfacb7e4eb0c559aeb884' => 
    array (
      0 => '/var/www/mvc/tpl/index/about.html',
      1 => 1481897766,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./header.html' => 1,
    'file:./sidebar.html' => 1,
    'file:./footer.html' => 1,
  ),
),false)) {
function content_58540373b2fea7_01687098 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>文章发布系统</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="/img/css/default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php $_smarty_tpl->_subTemplateRender("file:./header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">
	
		<div class="post">
			<h1 class="title">关于我</h1>
			<div class="entry">
				<?php echo $_smarty_tpl->tpl_vars['about']->value;?>

			</div>
			
		</div>
	
	</div>
	<!-- end content -->
	<?php $_smarty_tpl->_subTemplateRender("file:./sidebar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->
<?php $_smarty_tpl->_subTemplateRender("file:./footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
