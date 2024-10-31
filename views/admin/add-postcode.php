
<?php if( current_user_can( 'edit_users' ) ) {		?>
		
  <div class="rsilitech_wrapper">	
	<?php if($data['notice']){ ?>
			<div class="notice notice-<?php echo $data['notice']['class'];?> is-dismissible">
				<p><?php echo $data['notice']['message'];?></p>
			</div>
		<?php } ?>
	<div class="rsilitech_row">
	<div class="rsilitech_card rsilitech_col_12">
	<form method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" id="_rsilitech_add_postcode_form" name="_rsilitech_add_postcode_form">
	
	<input type="hidden" name="action" value="rsilitech_add_postcode">
	 <input type="hidden" value="<?php echo $data['nonce']; ?>" name="_rsilitech_add_postcode_nonce" id="_rsilitech_add_postcode_nonce" />
	  <div class="rsilitech_card__header">
		<h3 class="rsilitech__title js-title"><?php esc_html_e('Add Postcode','rsilitech-postcode-availability-woocommerce'); ?></h3>
		<input type="submit" name="submit" class="save_btn flex_float_right" value="Save"/>
	  </div>
	  
	  <div class="rsilitech_card__body">
		
		
		  <div class="rsilitech-group">
			<label for="postcode"><?php esc_html_e('Postcode','rsilitech-postcode-availability-woocommerce'); ?> <span class="mendatory">*</span></label>
			<input type="text" name="postcode" class="rsilitech-control" id="postcode" placeholder="Enter potcode here">
		  </div>
		  <div class="rsilitech-group">
			<label for="city"><?php esc_html_e('City','rsilitech-postcode-availability-woocommerce'); ?></label>
			<input type="text" name="city" class="rsilitech-control" id="city" placeholder="Enter City here">
		  </div>
		  <div class="rsilitech-group">
			<label for="state"><?php esc_html_e('State','rsilitech-postcode-availability-woocommerce'); ?></label>
			<input type="text" name="state" class="rsilitech-control" id="state" placeholder="Enter State here">
		  </div>
		  <div class="rsilitech-group">
			<label for="country"><?php esc_html_e('Country','rsilitech-postcode-availability-woocommerce'); ?></label>
			<input type="text" name="country" class="rsilitech-control" id="country" placeholder="Enter Country here">
		  </div>
		  <div class="rsilitech-group">
			<label for="exampleFormControlSelect1"><?php esc_html_e('Cash On Delivery','rsilitech-postcode-availability-woocommerce'); ?></label>
			<select class="rsilitech-control" id="cash_on_delivery" name="delivered_in_days">
				<option value="yes" ><?php esc_html_e('Yes','rsilitech-postcode-availability-woocommerce'); ?></option>
				<option value="no"  selected ><?php esc_html_e('No','rsilitech-postcode-availability-woocommerce'); ?></option>
			</select>
		  </div>
		  <div class="rsilitech-group">
			<label for="exampleFormControlSelect1"><?php esc_html_e('Delivery Time (in days)','rsilitech-postcode-availability-woocommerce'); ?></label>
			<select class="rsilitech-control" id="delivered_in_days" name="delivered_in_days">
				<?php for ($days=1; $days<15; $days++) { ?>
				  <option value="<?php echo($days)?>"  ><?php echo($days)?></option>
				<?php } ?>		
			</select>
		  </div>
		  
		  <div class="rsilitech-group">
			<label for="note"><?php esc_html_e('Extra note','rsilitech-postcode-availability-woocommerce'); ?></label>
			<textarea class="rsilitech-control" id="note" rows="3" name="note" placeholder="Enter extra note here"></textarea>
		  </div>
		
	  </div>
	  <div class="rsilitech_card__footer">
		
	  </div>
	 </form>
	  
	</div>
	
	  
	</div>
	
</div>

<?php } else { echo __("You are not authorized to perform this action.", RSPA_PLUGIN_NAME); } ?>
	
