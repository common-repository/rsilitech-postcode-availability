	<?php $data['notice']=get_transient('delete_postcode');if($data['notice']){ ?>
		<div class="notice notice-<?php echo $data['notice']['class'];?> is-dismissible">
			<p><?php echo $data['notice']['message'];?></p>
		</div>
	<?php } ?>	
	<div class="wrap">
		<h2><?php esc_html_e('Postcode List','rsilitech-postcode-availability-woocommerce'); ?>		
			<a class="rsilitech_link marginp-left-6 flex_float_right" href="?page=rsilitech-postcode"><?php esc_html_e('Add Postcode','rsilitech-postcode-availability-woocommerce'); ?></a>
			<a class="rsilitech_link marginp-left-6 flex_float_right" id="rspa_import_csv" href="javascript:void(0)"><?php esc_html_e('Import CSV','rsilitech-postcode-availability-woocommerce'); ?></a>
			<a class="rsilitech_link marginp-left-6 flex_float_right" href="?page=list-postcodes&export"><?php esc_html_e('Export CSV','rsilitech-postcode-availability-woocommerce'); ?></a>
		</h2>		
		<div id="post-body" class="metabox-holder columns-2">
			<div id="post-body-content">
				<div class="meta-box-sortables ui-sortable">
					<form method="post">
						<?php $table->display(); ?>
					</form>
				</div>
			</div>
		</div>
	</div>