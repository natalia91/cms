<h1>Корзина</h1>
<br>Ваш заказ
<?php if($data['cart']) :?>
    <table style="width: 100%" border="1" align="center">
        <th>Изображение товара</th>
        <th>Название</th>
        <th>Цена</th>
        <th>Количество</th>
        <th>Общая стоимость</th>
    <?php foreach ($data['cart'] as $product_id => $product) :?>
       <tr>
           <td><img width="100px" src="/images/<?php echo $product->image ?>"></td>
           <td><a href="?module=product&id=<?php echo $product->id ?>"><?php echo $product->name ?></a></td>
           <td><?php echo $product->price ?></td>
           <td><?php echo $product->amount ?></td>
           <td>
              <?php
              $price = $product->price;
              $amount = $product->amount;
              $total_price = $price*$amount;
              echo $total_price;
              ?>
           </td>
       </tr>

    <?php endforeach; ?>
    </table>
<?php else: ?>
    <div>Нет товаров в корзине</div>
<?php endif;?>
<h2>Информация о покупателе</h2>
<form method="post">
	<p>ФИО заказчика</p>
    <p><input type="text" name="name" value=""></p>
    <p>e-mail заказчика</p>
    <p><input type="email" name="email" value=""></p>
    <p>телефон заказчика</p>
    <p><input type="text" name="phone" value=""></p>
    <p>адрес доставки</p>
    <p><input type="text" name="address" value=""></p>
    <p>комментарий к заказу</p>
    <p><input type="text" name="comment" value=""></p>
    <p>введите символы с картинки:</p>
    <p><input class="input" type="text" name="captcha" id="captcha">
    <img src="captcha.php">
<?php
  if (isset($_POST['norobot']) && $_POST('norobot') == $_SESSION['captcha'])
  {
    echo 'Капча верна';
  }
  else
  {
    echo 'Вы ввели капчу неверно. Попробуйте еще раз';
  }
?>
  <p><input type="submit" name="order" value="Подтвердить заказ"></p>
</form>