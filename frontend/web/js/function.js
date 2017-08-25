$( "a.add-cart" ).click(function( event ) {
  event.preventDefault();
  var href = $(this).attr('href');
  var name = $(this).data('name');
  
  $.ajax({
  	url: href,
  	type: 'GET',
  	data: {},
  	success:function(data){

  		if (data == "ok") {
        alert('Them thanh cong');
  			$("#alert-pro-name").html('San pham <strong>'+name+'</strong> da them thanh cong');
  			$("#modal-add-cart").modal();
  		}else{
  			alert('Them khong thanh cong');
        $("#alert-pro-name").html('San pham <strong>'+name+'</strong> da het hang');
  			$("#modal-add-cart").modal('show');
  		}
  	}
  });
});

//learnyii/cart/add-cart?slug=lap-trinh-yii"