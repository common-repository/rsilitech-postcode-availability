<div class="rsilitech_wrapper">	
	<div class="rsilitech_row">
		<div class="rsilitech_card" style="padding-top : <?php echo (isset($check_postcode_layout_row['rspa_frontend_padding_top'])) ? $check_postcode_layout_row['rspa_frontend_padding_top']: '';?>px;padding-right : <?php echo (isset($check_postcode_layout_row['rspa_frontend_padding_right'])) ? $check_postcode_layout_row['rspa_frontend_padding_right']: '';?>px;padding-bottom : <?php echo (isset($check_postcode_layout_row['rspa_frontend_padding_bottom'])) ? $check_postcode_layout_row['rspa_frontend_padding_bottom']: '';?>px;padding-left : <?php echo (isset($check_postcode_layout_row['rspa_frontend_padding_left'])) ? $check_postcode_layout_row['rspa_frontend_padding_left']: '';?>px; border : <?php echo (isset($check_postcode_layout_row['rspa_frontend_border'])) ? $check_postcode_layout_row['rspa_frontend_border']: '';?>px <?php echo (isset($check_postcode_layout_row['rspa_frontend_border_patern'])) ? $check_postcode_layout_row['rspa_frontend_border_patern']: '';?> <?php echo (isset($check_postcode_layout_row['rspa_frontend_border_color'])) ? $check_postcode_layout_row['rspa_frontend_border_color']: '';?>;">		
			<div class="rsilitech_card__header">
				<h3 class="rsilitech__title js-title"><?php $cahek_availability= (isset($check_postcode_layout_row['rspa_postcode_check_availability_text'])) ? $check_postcode_layout_row['rspa_postcode_check_availability_text']: '';?><?php esc_html_e($cahek_availability,'rsilitech-postcode-availability'); ?></h3>		
				 <span id="rsilitech_response"></span>
			</div>	  
			<div class="rsilitech_card__body">
			<form method="post" action="#" id="_rsilitech_add_postcode_form" name="_rsilitech_add_postcode_form">
				<div class="rsilitech-group ">
					<input type="hidden" id="rspa_product_id" value="<?php echo $rspa_product_id;?>"/>
					<input type="text" name="rsilitech_postcode" data-nonce="<?php echo $data['nonce'];?>" class="rsilitech-control " id="rsilitech_postcode" placeholder="<?php $place_holder= (isset($check_postcode_layout_row['rspa_postcode_placeholder_text'])) ? $check_postcode_layout_row['rspa_postcode_placeholder_text']: '';?><?php esc_html_e($place_holder,'rsilitech-postcode-availability'); ?>">
					<button type="button" name="check" id="validate_postcode" class="save_btn flex_float_right" style="background-color:<?php echo (isset($check_postcode_layout_row['rspa_frontend_check_button_background_color'])) ? $check_postcode_layout_row['rspa_frontend_check_button_background_color']: '';?>;color:<?php echo (isset($check_postcode_layout_row['rspa_frontend_check_button_text_color'])) ? $check_postcode_layout_row['rspa_frontend_check_button_text_color']: '';?>;border-color:<?php echo (isset($check_postcode_layout_row['rspa_frontend_check_button_border_color'])) ? $check_postcode_layout_row['rspa_frontend_check_button_border_color']: '';?>"><?php $btn_ext=(isset($check_postcode_layout_row['rspa_postcode_check_button_text'])) ? $check_postcode_layout_row['rspa_postcode_check_button_text']: 'Check Availability';?><?php esc_html_e($btn_ext,'rsilitech-postcode-availability'); ?></button>				
				</div>		
			</form>
			</div>
			<div class="rsilitech_card__footer" id="rsilitech_card__footer" 
			data-service-available="<?php echo (isset($check_postcode_layout_row['rspa_postcode_service_available_in'])) ? $check_postcode_layout_row['rspa_postcode_service_available_in']: '';?>"
			data-delevered-by="<?php echo (isset($check_postcode_layout_row['rspa_postcode_delevered_by'])) ? $check_postcode_layout_row['rspa_postcode_delevered_by']: '';?>"
			data-cod-available="<?php echo (isset($check_postcode_layout_row['rspa_postcode_cod_available'])) ? $check_postcode_layout_row['rspa_postcode_cod_available']: '';?>"
			data-shipping-details="<?php echo (isset($check_postcode_layout_row['rspa_postcode_shipping_details'])) ? $check_postcode_layout_row['rspa_postcode_shipping_details']: '';?>">
			</div>
		</div>	
	</div>	
</div>

