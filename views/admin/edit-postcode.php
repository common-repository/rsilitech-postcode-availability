
<?php if( current_user_can( 'edit_users' ) ) {		?>
		
  <div class="rsilitech_wrapper">	
	<?php if($data['notice']){ ?>
			<div class="notice notice-<?php echo $data['notice']['class'];?> is-dismissible">
				<p><?php echo $data['notice']['message'];?></p>
			</div>
		<?php } ?>
	<div class="rsilitech_row">
	<div class="rsilitech_card rsilitech_col_12">
	<form method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" id="_rsilitech_edit_postcode_form" name="_rsilitech_edit_postcode_form">
	
	<input type="hidden" name="action" value="rsilitech_edit_postcode">
	 <input type="hidden" value="<?php echo $data['nonce']; ?>" name="_rsilitech_edit_postcode_nonce" id="_rsilitech_edit_postcode_nonce" />
	  <div class="rsilitech_card__header">
		<h3 class="rsilitech__title js-title"><?php esc_html_e('Edit Postcode : - ','rsilitech-postcode-availability'); ?> <?php esc_html_e($postcode_row['postcode'],'rsilitech-postcode-availability'); ?></h3>
		<input type="submit" name="submit" class="save_btn flex_float_right" value="Update"/>
	  </div>
	  
	  <div class="rsilitech_card__body">
		
		
		  <div class="rsilitech-group">
			
			<input type="hidden" name="postcode" class="rsilitech-control" id="postcode" placeholder="Enter potcode here" value="<?php echo $postcode_row['postcode']; ?>">
			<input type="hidden" name="postcode_id" class="rsilitech-control" id="postcode_id" value="<?php echo $postcode_row['id']; ?>">
		  </div>
		  <div class="rsilitech-group">
			<label for="city"><?php esc_html_e('City','rsilitech-postcode-availability'); ?></label>
			<input type="text" name="city" class="rsilitech-control" id="city" placeholder="Enter City here" value="<?php echo $postcode_row['city']; ?>">
		  </div>
		  <div class="rsilitech-group">
			<label for="state"><?php esc_html_e('State','rsilitech-postcode-availability'); ?></label>
			<input type="text" name="state" class="rsilitech-control" id="state" placeholder="Enter State here" value="<?php echo $postcode_row['state']; ?>">
		  </div>
		  <div class="rsilitech-group">
			<label for="country"><?php esc_html_e('Country','rsilitech-postcode-availability'); ?></label>
			<input type="text" name="country" class="rsilitech-control" id="country" placeholder="Enter Country here" value="<?php echo $postcode_row['country']; ?>">
		  </div>
		   <div class="rsilitech-group">
			<label for="exampleFormControlSelect1"><?php esc_html_e('Cash On Delivery','rsilitech-postcode-availability'); ?></label>
			<select class="rsilitech-control" id="cash_on_delivery" name="cash_on_delivery">
				<option value="yes"  <?php if($postcode_row['cash_on_delivery']==='yes') echo 'selected';?>><?php esc_html_e('Yes','rsilitech-postcode-availability'); ?></option>
				<option value="no" <?php if($postcode_row['cash_on_delivery']=='no') echo 'selected';?> ><?php esc_html_e('No','rsilitech-postcode-availability'); ?></option>
			</select>
		  </div>
		  <div class="rsilitech-group">
			<label for="exampleFormControlSelect1"><?php esc_html_e('Delivery Time (in days)','rsilitech-postcode-availability'); ?></label>
			<select class="rsilitech-control" id="delivered_in_days" name="delivered_in_days">
				<?php for ($days=1; $days<15; $days++) { ?>
				  <option value="<?php echo($days)?>" <?php if($postcode_row['delivered_in_days']==$days) echo 'selected';?> ><?php echo($days)?></option>
				<?php } ?>		  
			</select>
		  </div>
		  
		  <div class="rsilitech-group">
			<label for="note"><?php esc_html_e('Extra note','rsilitech-postcode-availability'); ?></label>
			<textarea class="rsilitech-control" id="note" rows="3" name="note" placeholder="Enter extra note here"><?php echo $postcode_row['order_note']; ?></textarea>
		  </div>
		
	  </div>
	  <div class="rsilitech_card__footer">
		
	  </div>
	 </form>
	  
	</div>
	
	  
	</div>
	
</div>

<?php } else { echo __("You are not authorized to perform this action.", RSPA_PLUGIN_NAME); } ?>
	
