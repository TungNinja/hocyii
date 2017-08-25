<?php 
	$this->title = ($book) ? $book->name: 'Not found title';
?>
<div class="container">
	<div class="row view-book">
	<?php if($book) : ?>
		<div class="col-md-4">
			<img src="<?php echo $book->image; ?>" class="img-responsive" alt="<?php echo $book->name; ?>">
		</div>
		<div class="col-md-8">
			<h1 class="book-title"><?php echo $book->name; ?></h1>
			<?php echo $book->content; ?>
			<a href="#" title="Thêm vào giỏ hàng" class="btn btn-success">Add to cart</a>
		</div>
	<?php else: ?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Error! 404</strong> Không có thông tin về sách...
		</div>
	<?php endif ?>
	</div>
</div>
<div style="clear: both;"></div>