<?php 
$this->title = 'Thông tin đặt hàng';
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$model->amount = $cost;
?>
<div class="container">
	<?php if($cartStore) : $n = 1 ?>
		<?php $form = ActiveForm::begin(); ?>
	<div class="col-md-5">
		<h3>Thông tin khách hàng</h3>
		<?php echo $form->field($model, 'full_name')->textInput(['placeholder'=>'Họ tên ..'],['class'=>'form-controll']);?>
		<?php echo $form->field($model, 'email')->textInput(['placeholder'=>'Email ..'],['class'=>'form-controll']);?>
		<?php echo $form->field($model, 'phone')->textInput(['placeholder'=>'Phone ..'],['class'=>'form-controll']);?>
		<?php echo $form->field($model, 'address')->textInput(['placeholder'=>'Address ..'],['class'=>'form-controll']);?>
		<?php echo $form->field($model, 'shipping_method')->textInput(['placeholder'=>'shipping_method ..'],['class'=>'form-controll']);?>
		<?php echo $form->field($model, 'payment_method')->textInput(['placeholder'=>'payment_method ..'],['class'=>'form-controll']);?>
		<?php echo $form->field($model, 'amount')->hiddenInput()->label(false);?>

		<input type="hidden" name="amount" value="<?php echo $cost?>">
	</div>
		

	<div class="col-md-7">
		<h3>Thông tin sản phẩm</h3>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>STT</th>
					<th>Name</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($cartStore as $item) : ?>
				<tr>
					<td><?php echo $n; ?></td>
					<td><?php echo $item->name; ?></td>
					<td><?php echo $item->qtt; ?></td>
					<td><?php echo number_format($item->price,0,' ',','); ?></td>
					<td><?php echo number_format($item->qtt*$item->price,0,' ',','); ?></td>
					
				</tr>
			<?php $n++; endforeach ?>
				<tr>
					<td align="right" colspan="4"><b>Tổng tiền:</b></td>
					<td ><b><?php echo number_format($cost,0,' ',',') ?></b></td>
				</tr>
			</tbody>
		</table>
		<div style="width: 100%;text-align: right;" > 
			<input align="right" type="submit" name="" value="Đặt hàng" class="btn btn-primary">
		</div>
	</div>
		<?php $form = ActiveForm::end(); ?>
	<?php endif ?>
</div>