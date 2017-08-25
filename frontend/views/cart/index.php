<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
	$this->title = 'Shopping cart';
?>

<div class="container">
<?php if($cartStore) : $n = 1?>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>STT</th>
				<th>Name</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Total</th>
				<th>Action</th>
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
				<td>
					<?php $form = ActiveForm::begin([
						'action' => Url::to('/learnyii/cart/update-cart'),
					]); ?>
						<input type="hidden" name="id" value="<?php echo $item->id; ?>" />
						<input style="width: 50px;" type="number" name="qtt" value="1" class="form-controll">
						<input type="submit" name="update" value="Update" class="btn btn-xs btn-success">
						<?php echo Html::a('Delete', ['/cart/remove','slug'=>$item->slug], ['class'=>'btn btn-xs btn-danger', 'onClick'=>'return confirm("Bạn chắc chắn muốn xóa không?")']); ?>
					<?php $form = ActiveForm::end(); ?>
				</td>
			</tr>
		<?php $n++; endforeach ?>
			<tr>
				<td align="right" colspan="5"><b>Tổng tiền:</b></td>
				<td ><b><?php echo number_format($cost,0,' ',',') ?></b></td>
			</tr>
		</tbody>
	</table>
	<div class="action clearfix" style="margin-bottom: 10px;">
		<?php echo Html::a('Tiếp tực mua hàng', ['/site'], ['class'=>'btn btn-success'])?>
		<?php echo Html::a('Đặt hàng', ['/checkout/index'], ['class'=>'btn btn-primary'])?>
		<?php echo Html::a('Xóa giỏ hàng', ['/cart/clear'], ['class'=>'btn btn-danger'])?>
	</div>
<?php else: ?>
	<div style="margin-top: 20px;" class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Thông báo! </strong> giỏ hàng bạn đang trống.... <?php echo Html::a('Tiếp tực mua hàng', ['/site'], ['class'=>'btn btn-success'])?>
	</div>
<?php endif ?>
</div>