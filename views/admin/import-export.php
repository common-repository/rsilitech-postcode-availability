	<div class="rsilitech_wrapper">
		<div class="rsilitech_row">			
			<?php $data['notice']=get_transient('delete_postcode');if($data['notice']){ ?>
				<div class="notice notice-<?php echo $data['notice']['class'];?> is-dismissible">
					<p><?php echo $data['notice']['message'];?></p>
				</div>
			<?php } ?>	
			<h1><?php esc_html_e('Import Export Postcode','rsilitech-postcode-availability-woocommerce'); ?></h1>			
		</div>
		<div class="rsilitech_row">
			<div class="rsilitech_col_6">
				<div class="rsilitech_row">
					<div class="rsilitech_col_12">
						<input type="button" name="import" class="rsilitech-btn rsilitech_col_3" value="CSV Import"/>
					</div>
				</div>
				<div class="rsilitech_row">
					<div class="rsilitech_card rsilitech_col_12 paddingp-6">
						<h3><?php esc_html_e('Importing Csv','rsilitech-postcode-availability-woocommerce'); ?></h3>						
					</div>
				</div>
			</div>
			<div class="rsilitech_col_6">
				<div class="rsilitech_row">
					<div class="rsilitech_col_12">
						<input type="button" name="import" class="rsilitech-btn rsilitech_col_3" value="CSV Export"/>
					</div>
				</div>
				<div class="rsilitech_row">
					<div class="rsilitech_card rsilitech_col_12 paddingp-6">
						<h3><?php esc_html_e('Export Csv','rsilitech-postcode-availability-woocommerce'); ?></h3>						
					</div>
				</div>
			</div>
		</div>
	</div>