<?php
/* Smarty version 3.1.30, created on 2018-02-25 16:11:53
  from "D:\WAMPServer\Demo\MVC_Example_2.20\tpl\admin\leftmenu.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a926fc91aa095_85570246',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '88a30a7c9ec842f58edafd1bdcd6c2f176711959' => 
    array (
      0 => 'D:\\WAMPServer\\Demo\\MVC_Example_2.20\\tpl\\admin\\leftmenu.html',
      1 => 1519374728,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a926fc91aa095_85570246 (Smarty_Internal_Template $_smarty_tpl) {
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
