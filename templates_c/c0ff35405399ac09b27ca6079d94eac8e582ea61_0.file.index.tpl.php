<?php
/* Smarty version 3.1.32, created on 2018-06-26 09:23:01
  from '/home/homework/app/mvc/views/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b3205f525a2e0_92942988',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c0ff35405399ac09b27ca6079d94eac8e582ea61' => 
    array (
      0 => '/home/homework/app/mvc/views/index.tpl',
      1 => 1530003090,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b3205f525a2e0_92942988 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
<title>Index smarty</title>
</head>
<body>
<div>User Name: <?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
</div>
<div>Password: <?php echo $_smarty_tpl->tpl_vars['user']->value['password'];?>
</div>
</body>
</html>
<?php }
}
