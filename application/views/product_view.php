<?php //var_dump($data['product']); ?>
<h2><?php echo $data['product']->name?></h2>
<?php echo $data['product']->description ?>
<table border="1">
  <tr>
  	<th>Цена</th>
    <td><?php echo $data['product']->price ?></td>
  </tr>
  <tr>
  	<th>Количество</th>
	<td><?php echo $data['product']->amount ?></td>
  </tr>
</table>
<br>
<form method="post">
	<input type="number" name="amount" value="1">
	<input type="hidden" name="product_id" value="<?php echo $product->id ?>">
	<input type="submit" value="Купить" name="buy">
</form>
