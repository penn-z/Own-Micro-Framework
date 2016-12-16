<?php
/* Smarty version 3.1.30, created on 2016-12-16 22:33:16
  from "/var/www/mvc/tpl/index/sidebar.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5853fb2c681c86_95297976',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '585fe3ab1879d4cffb694aa9792ccb7889d3fabd' => 
    array (
      0 => '/var/www/mvc/tpl/index/sidebar.html',
      1 => 1481898780,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5853fb2c681c86_95297976 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- start sidebar -->
	<div id="sidebar">
		<ul>
			<li id="search">
				<h2><b class="text1">Search</b></h2>
				<form method="post" action="index.php?controller=index&method=search">
					<fieldset>
					<input type="text" id="s" name="key" value=""  style="border:1px solid grey"/>
					<input type="submit" id="x" value="Search" />
					</fieldset>
				</form>
			</li>
		</ul>
	</div>
	<!-- end sidebar -->
<?php }
}
