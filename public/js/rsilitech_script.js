jQuery(document).ready( function() {
   jQuery("#validate_postcode").click( function(e) {	 
      e.preventDefault(); 
      postcode = jQuery('#rsilitech_postcode').val();
	  rspa_product_id = jQuery('#rspa_product_id').val();
      nonce = jQuery('#rsilitech_postcode').attr("data-nonce");
	  var service_avaliable=jQuery('#rsilitech_card__footer').data('service-available');
	  var delevered_by=jQuery('#rsilitech_card__footer').data('delevered-by');
	  var cod_available=jQuery('#rsilitech_card__footer').data('cod-available');
	  var shipping_details=jQuery('#rsilitech_card__footer').data('shipping-details');	
	  var validate_postcode=jQuery('#validate_postcode').text();  	  
	  if(postcode.length>0){
		  jQuery("#validate_postcode").html('<div class="loader"></div>');
		  jQuery.ajax({
			 type : "post",
			 dataType : "json",
			 url : rsilitech_ajax.ajaxurl,
			 data : {action: "rspa_check_postcode", postcode : postcode, rspa_product_id : rspa_product_id, nonce: nonce},
			 success: function(response) {
				
				jQuery("#validate_postcode").text(validate_postcode);
				if(!response.error){
					var responsediv='<div id="service_avaliable"><p>'+service_avaliable+' : <b>'+postcode+'</b> <button id="rspa_change_postcode">Change</button></p><p> '+delevered_by+' : '+response.delivered+'</p><p> '+cod_available+' : '+response.postcodeRow.cash_on_delivery+'</p><p>'+response.postcodeRow.order_note+'</p></div>';					
					jQuery(".rsilitech_card__footer").html(responsediv).css('color','#333333');
					jQuery(".rsilitech_card__header").hide();
					jQuery(".rsilitech_card__body").hide();
				}else{
					jQuery("#rsilitech_response").text(response.message).css('color','#FF0000');
				}				
				if(!response.error) {
				   jQuery(".wc-proceed-to-checkout").load();               
				}				
			 }
		  })   
	  }else{
			jQuery("#rsilitech_response").text('Please enter a postcode').css('color','red');
	  }
   })
	jQuery(document).on("click", "#rspa_change_postcode", function() {
		jQuery("#service_avaliable").hide();	   
		jQuery(".rsilitech_card__header").show();
		jQuery(".rsilitech_card__body").show();	
	});
	
	jQuery('#rsilitech_postcode').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
			event.preventDefault();
				jQuery('#validate_postcode').click();
            }               
        event.stopPropagation();
    });
	
	var validate_postcode=jQuery('#validate_postcode').text();  
	var window_width=jQuery(window).width();
	var search_btn='<div class="search_icon">&#9906;</div>';		
	
	jQuery(window).on('resize', function(){		
		var window_width=jQuery(window).width();		
		if ( parseInt(window_width) < 1024) {		
		   jQuery('#validate_postcode').html(search_btn);	  
		}else{
			jQuery('#validate_postcode').text(validate_postcode);	
		}
	});
	if ( parseInt(window_width) < 1024) {		
		jQuery('#validate_postcode').html(search_btn);	  
	}else{
		jQuery('#validate_postcode').text(validate_postcode);	
	}
})