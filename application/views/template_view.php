<!DOCTYPE html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Love Socks</title>
  
  <style type="text/css">
   BODY { background:#FFF0F5; margin: 0; }
   .layout { width: 970px; margin: 0 auto 10px; background: #fff; }
   .content { margin-right: 350px; padding: 10px; }
   .sidebar { width: 320px; float: right; background: #EE82EE; }
   .footer {
    border-top: 1px solid #ccc; padding: 10px;
   }
   .sidebar{
    float: left;
    width: 25%;
    clear: both;
}
.container {
    float: left;
    width: 70%;
}
.product {
	float: left;
	width: 30%;
	padding: 5px;
	margin: 5px;
	border: 1px solid #ddd;
}
  </style>
 </head>
 <body>
  <div class="layout">

  <div class="content">
   <img src="images/logo.png" alt="love socks" />
	</div>
		<header class="main-header" role="banner" align="center" margin="20px">
 			 <img src="images/banner.gif" alt="Banner"/>
		</header>
		<div class="sidebar">
			<?php 
 	function PrintCategories($categories, $level=1) {
        if($categories) { // проверка лишней не бывает
            echo "<ul style='padding-left:". $level*10 ."px'>";
            foreach ($categories as $category) {
                if($category->visible) { //важная проверка, которая позволит выводит только включенные категории на сайте
                    echo "<li>
                    <a href='?module=categories&id=$category->id'>$category->name </a>
                    

                    </li>";
                    if($category->subcategories) {
                        // проверяем есть ли подкатегории и вызываем заново функцию для вывода
                        PrintCategories($category->subcategories, $level+1); // передаем в функцию уже массив обьектов покатегорий
                    }
                }
            }
            echo "</ul>";
        }
    }
    PrintCategories($categories);

			?>
		  </div>
				<div id="content" class="container">
					<div class="box">
						<?php include 'application/views/'.$content_view; ?>
					<br class="clearfix" />
				</div>
				<br class="clearfix" />
			</div>
			<div id="page-bottom">
				<div id="page-bottom-sidebar">
					<h3>Наши контакты</h3>
					<ul class="list">
						<li>+38(056)333-33-33</li>
						<li>+38(050)222-22-22</li>
						<li>+38(067)111-11-11</li>
					</ul>
				</div>
				<div id="page-bottom-content">
					<h3>О Нас</h3>
					<p>
					<br>Качественные носки для всей семьи
					<br>Прямые поставки из Европы
					<br>Доставка по Украине
					</p>
				</div>
				<br class="clearfix" />
			</div>
		</div>
		<div id="footer">
			<a href="/"> &copy; 2017</a>
		</div>
	</body>
</html>