<?php
/* Smarty version 3.1.30, created on 2016-12-19 10:52:45
  from "/var/www/mvc/tpl/admin/leftmenu.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58574b7d3c7de8_92674194',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '414a09dd888ecb461a027464323eec528f0da1f7' => 
    array (
      0 => '/var/www/mvc/tpl/admin/leftmenu.html',
      1 => 1481815857,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58574b7d3c7de8_92674194 (Smarty_Internal_Template $_smarty_tpl) {
?>
<aside id="sidebar" class="column">
	<h3>新闻管理</h3>
	<ul class="toggle">
		<li class="icn_new_article"><a href="index.php?controller=admin&method=newsadd">添加新闻</a></li>
		<li class="icn_categories"><a href="index.php?controller=admin&method=newslist">管理新闻</a></li>
	</ul>
	<h3>管理员管理</h3>
	<ul class="toggle">
		<li class="icn_jump_back"><a href="index.php?controller=admin&method=logout">退出登录</a></li>
	</ul>
	
	<footer>
		
	</footer>
</aside><!-- end of sidebar --><?php }
}
