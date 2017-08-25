<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'My Yii Application';

?>

<section class="listings">
    <div class="wrapper">
    <?php if($book) : ?>
        <ul class="properties_list">
        <?php foreach($book as $item) : ?>
            <li>
                <div style="width: 298px; height:  226px;">
                    <a href="javascript:void(0)">
                        <img style="width: 100%; height: 100% !important;" src="<?php echo $item->image ?>" alt="<?php echo $item->name ?>" title="<?php echo $item->name ?>" class="property_img"/>
                    </a>
                </div>
                <span class="price">$<?php echo $item->price ?></span>
                <div class="property_details">
                    <h1>
                        <?php echo Html::a($item->name, ['/book/view', 'slug'=>$item->slug,'id'=>$item->id]) ?>
                    </h1>
                    <h2>
                        Số lượng: <?php echo $item->quantity ?>, 
                        Số trang <?php echo $item->pages ?>
                        <span class="property_size">NXB(<?php echo date('d-m-Y',$item->publish_at ) ?>)</span>
                        <br/>
                        <?php echo Html::a('Add to cart', ['/cart/add-cart','slug'=>$item->slug], [ 'class'=>'btn btn-success add-cart','data-name'=>$item->name]); ?>
                    </h2>
                </div>
            </li>
        <?php endforeach ?>   
        </ul>
    <?php endif ?>
        <div class="more_listing">
            <a href="#" class="more_listing_btn">View More Listings</a>
        </div>
    </div>
</section>  <!--  end listing section  -->
<div class="modal fade" id="modal-add-cart" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thêm giỏ hàng</h4>
        </div>
        <div class="modal-body" id="alert-pro-name">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">View cart</button>
        </div>
      </div>
      
    </div>
</div>