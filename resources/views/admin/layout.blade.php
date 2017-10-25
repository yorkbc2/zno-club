<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>

	<link rel="stylesheet" href="/css/styles.css">
	<link rel="stylesheet" href='/css/app.css'>
</head>
<body>
	<div class="wrapper">

		<nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="#">ЗНО<sup>Панель</sup></a>
		    </div>
		    <ul class="nav navbar-nav">
		      <li><a href="/admin">Головна</a></li>
		      <li>
		      	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Керування блогом
		      		&nbsp;&nbsp;&nbsp;&nbsp;
		        <span class="caret"></span></a>
		        <ul class="dropdown-menu">
		          <li><a href="/admin/posts">Пости</a></li>
		          <li><a href='/admin/categories'>Категорії</a></li>
		          <li><a href="/admin/uploads">Завантаження</a></li>
		          <li><a href="/admin/profile/commentaries">Комментарі</a></li>
		        </ul>
		      </li>
		      
		      <li>
		      	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Інформація на сайті
		      		&nbsp;&nbsp;&nbsp;&nbsp;
		        <span class="caret"></span></a>
		        <ul class="dropdown-menu">
		          <li><a href="/admin/info/category">Додати рубрику</a></li>
		          <li><a href='/admin/info'>Додати сторінку</a></li>
		        </ul>
		      </li>
		      <li>
		      	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Форум
		      		&nbsp;&nbsp;&nbsp;&nbsp;
		        <span class="caret"></span></a>
		        <ul class="dropdown-menu">
		          <li><a href="/admin/forum/category">Додати категорію</a></li>
		        </ul>
		      </li>
		    </ul>
		  </div>
		</nav>

		@yield('imported_content')


	</div>

	<script src='/js/app.js'></script>
	
</body>
</html>