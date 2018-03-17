<?php
/* Smarty version 3.1.30, created on 2018-02-24 16:31:24
  from "D:\WAMPServer\Demo\MVC_Example_2.20\tpl\index\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a9122dcd3bb40_09892365',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fbd8f0eeaf83f7f094034b95d44630b14ecc9379' => 
    array (
      0 => 'D:\\WAMPServer\\Demo\\MVC_Example_2.20\\tpl\\index\\index.html',
      1 => 1519461031,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a9122dcd3bb40_09892365 (Smarty_Internal_Template $_smarty_tpl) {
?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新闻管理系统</title>
</head>
<style type="text/css">
	*{
		padding: 0px;
		margin: 0px;
	}
	.nav{
		background: lightgreen;
		width: 100%;
		height: 200px;
	}
	.nav ul{
		background: black;
		color: white;
		overflow: hidden;
	}
	.nav li{
		float: left;
		list-style: none;
		line-height: 45px;
		margin-left: 10%;
	}
	.nav .spe{
		margin-left:5%;
	}
	a{
		text-decoration: none;
		color: inherit;
		font-weight: bolder;
	}
	.content{
		width: 80%;
		margin: 0 auto;
		box-shadow: 0 0 10px lightgreen;
		padding-bottom: 40px;
		z-index: 3;
		position: absolute;
		background: white;
		top:150px;
		left:50%;
		margin-left: -40%;
		overflow: hidden;
	}
	.newslist{
		width: 70%;
		float: left;
		
	}
	.aboutus{
		width: 30%;
		box-sizing: border-box;
		border-left: 2px solid lightgray;
		height: 100px;
		float: left;
		margin-top: 30px;
		padding: 10px;
	}
	.seek{
		width: 30%;
		box-sizing: border-box;
		border-left: 2px solid lightgray;
		height: 80px;
		float: left;
		margin-top:40px;
		padding: 10px;
	}
	.list{
		width: 80%;
		margin: 40px auto;
		border: 1px dotted #ccc;
		padding: 10px;
	}
	.list h3{
		line-height: 30px;
		font-size: 20px;
		font-family:"楷体";
	}
	.list span{
		border-left:1px solid #ccc;
		padding: 0 5px;
		font-size: 14px;
		color: #ccc;
		font-family:"楷体";
	}
	.list p{
		text-indent: 2em;
		padding: 20px;
		font-size: 14px;
	}
</style>
<body>
	<div class="nav">
		<ul>
			<li><a href=''>首页</a></li>
			<li class='spe'><a href='#'>关于我们</a></li>
			<li class='spe'><a href='index.php?controller=admin&method=login'>后台管理</a></li>
		</ul>
		<p style='color:white;font-size: 28px;font-family:"楷体";margin-top:30px;margin-left:10%;'><b>这算什么新闻</b></p>
	</div>
	<div class="content">
		<div class='newslist'>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'news');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['news']->value) {
?>
			<div class="list">
				<h3><a href="index.php?controller=index&method=newsInfo&id=<?php echo $_smarty_tpl->tpl_vars['news']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['news']->value['title'];?>
</a></h3>
				<span>作者:<?php echo $_smarty_tpl->tpl_vars['news']->value['author'];?>
</span><span>:<?php echo $_smarty_tpl->tpl_vars['news']->value['dateline'];?>
</span><span>点击标题查看文章内容</span>
				<p><?php echo $_smarty_tpl->tpl_vars['news']->value['content'];?>
</p>
			</div>
			<?php
}
} else {
?>

			<div class="list">
				<p>暂无文章，敬请期待！</p>
			</div>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</div>
		<div class='seek'>
		<form action="index.php?controller=index&method=index" method="post">
			<h4 style='font-family:"楷体";'>文章搜索</h3>
			<input type="text" name="seek"/>
			<input type="submit" value="搜索" />
		</form>
		</div>
		<div class='aboutus'>
			<h3 style='font-family:"楷体";'>关于我们</h3>
			<br/>
			<p style='font-family:"楷体";'><?php echo $_smarty_tpl->tpl_vars['about']->value;?>
</p>
		</div>
		
	</div>
</body>
</html><?php }
}
