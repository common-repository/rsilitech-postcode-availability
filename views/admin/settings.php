<?php if (current_user_can('edit_users')) {		?>

	<div class="rsilitech_wrapper">
		<?php if ($data['notice']) { ?>
			<div class="notice notice-<?php echo $data['notice']['class']; ?> is-dismissible">
				<p><?php echo $data['notice']['message']; ?></p>
			</div>
		<?php } ?>
		<div class="rsilitech_row">
			<div class="rsilitech_card rsilitech_col_8">
				<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" id="_rsilitech_general_settings_form_none" name="_rsilitech_general_settings_form_none">

					<input type="hidden" name="action" value="rsilitech_rspa_add_update_layout_settings">
					<input type="hidden" value="<?php echo $data['nonce']; ?>" name="_rsilitech_general_settings_nonce" id="_rsilitech_general_settings_nonce" />
					<div class="rsilitech_card__header">
						<h3 class="rsilitech__title js-title"><?php esc_html_e('Availability layout Settings', 'rsilitech-postcode-availability-woocommerce'); ?></h3>
						<input type="submit" name="submit" class="save_btn flex_float_right" value="Save" />
					</div>

					<div class="rsilitech_card__body">

						<div class="rsilitech-group">
							<label for="rspa_postcode_check_availability_text"><?php esc_html_e('Check availability text', 'rsilitech-postcode-availability-woocommerce'); ?> </label>
							<input type="text" name="rspa_postcode_check_availability_text" class="rsilitech-control" id="rspa_postcode_check_availability_text" placeholder="Eg. Check Availability" value="<?php echo (isset($check_postcode_layout_row['rspa_postcode_check_availability_text'])) ? $check_postcode_layout_row['rspa_postcode_check_availability_text'] : ''; ?>">
						</div>

						<div class="rsilitech-group">
							<label for="rspa_postcode_unavailable_message"><?php esc_html_e('Postcode unavailable message', 'rsilitech-postcode-availability-woocommerce'); ?> </label>
							<input type="text" name="rspa_postcode_unavailable_message" class="rsilitech-control" id="rspa_postcode_unavailable_message" placeholder="Eg. Service is unavailable in your postcode" value="<?php echo (isset($check_postcode_layout_row['rspa_postcode_unavailable_message'])) ? $check_postcode_layout_row['rspa_postcode_unavailable_message'] : ''; ?>">
						</div>

						<div class="rsilitech-group">
							<label for="rspa_postcode_placeholder_text"><?php esc_html_e('Postcode input field placeholder message', 'rsilitech-postcode-availability-woocommerce'); ?> </label>
							<input type="text" name="rspa_postcode_placeholder_text" class="rsilitech-control" id="rspa_postcode_placeholder_text" placeholder="Eg. Enter your postcode Here" value="<?php echo (isset($check_postcode_layout_row['rspa_postcode_placeholder_text'])) ? $check_postcode_layout_row['rspa_postcode_placeholder_text'] : ''; ?>">
						</div>
						<div class="rsilitech-group">
							<label for="rspa_postcode_check_button_text"><?php esc_html_e('Check button text', 'rsilitech-postcode-availability-woocommerce'); ?> </label>
							<input type="text" name="rspa_postcode_check_button_text" class="rsilitech-control" id="rspa_postcode_check_button_text" placeholder="Eg. Check avialability" value="<?php echo (isset($check_postcode_layout_row['rspa_postcode_check_button_text'])) ? $check_postcode_layout_row['rspa_postcode_check_button_text'] : ''; ?>">
						</div>
						<div class="rsilitech-group">
							<label for="postcode"><?php esc_html_e('Postcode check panel paddings (Top, Right, Bottom, Left)', 'rsilitech-postcode-availability-woocommerce'); ?> </label>
							<div id="rspa_settings_padding">
								<input type="text" name="rspa_frontend_padding_top" class="rsilitech-control" id="rspa_frontend_padding_top" placeholder="Eg. 10" value="<?php echo (isset($check_postcode_layout_row['rspa_frontend_padding_top'])) ? $check_postcode_layout_row['rspa_frontend_padding_top'] : ''; ?>">
								<input type="text" name="rspa_frontend_padding_right" class="rsilitech-control" id="rspa_frontend_padding_right" placeholder="Eg. 15" value="<?php echo (isset($check_postcode_layout_row['rspa_frontend_padding_right'])) ? $check_postcode_layout_row['rspa_frontend_padding_right'] : ''; ?>">
								<input type="text" name="rspa_frontend_padding_bottom" class="rsilitech-control" id="rspa_frontend_padding_bottom" placeholder="Eg. 17" value="<?php echo (isset($check_postcode_layout_row['rspa_frontend_padding_bottom'])) ? $check_postcode_layout_row['rspa_frontend_padding_bottom'] : ''; ?>">
								<input type="text" name="rspa_frontend_padding_left" class="rsilitech-control" id="rspa_frontend_padding_left" placeholder="Eg. 21" value="<?php echo (isset($check_postcode_layout_row['rspa_frontend_padding_left'])) ? $check_postcode_layout_row['rspa_frontend_padding_left'] : ''; ?>">
							</div>
						</div>
						<div class="rsilitech-group">
							<label for="postcode"><?php esc_html_e('Postcode check panel border (1, solid, #ddd)', 'rsilitech-postcode-availability-woocommerce'); ?> </label>
							<div id="rspa_settings_padding">
								<input type="text" name="rspa_frontend_border" class="rsilitech-control" id="rspa_frontend_border" placeholder="Eg. 1" value="<?php echo (isset($check_postcode_layout_row['rspa_frontend_border'])) ? $check_postcode_layout_row['rspa_frontend_border'] : ''; ?>">
								<input type="text" name="rspa_frontend_border_patern" class="rsilitech-control" id="rspa_frontend_border_patern" placeholder="Eg. solid, dashed" value="<?php echo (isset($check_postcode_layout_row['rspa_frontend_border_patern'])) ? $check_postcode_layout_row['rspa_frontend_border_patern'] : ''; ?>">
								<input type="text" name="rspa_frontend_border_color" class="rsilitech-control" id="rspa_frontend_border_color" placeholder="Eg. #ddd" value="<?php echo (isset($check_postcode_layout_row['rspa_frontend_border_color'])) ? $check_postcode_layout_row['rspa_frontend_border_color'] : ''; ?>">
							</div>
						</div>
						<div class="rsilitech-group">
							<label for="postcode"><?php esc_html_e('Button Colors (Background color, Text color, Border color)', 'rsilitech-postcode-availability-woocommerce'); ?> </label>
							<div id="rspa_settings_padding">
								<input type="text" name="rspa_frontend_check_button_background_color" class="rsilitech-control" id="rspa_frontend_check_button_background_color" placeholder="Background Color" value="<?php echo (isset($check_postcode_layout_row['rspa_frontend_check_button_background_color'])) ? $check_postcode_layout_row['rspa_frontend_check_button_background_color'] : ''; ?>">
								<input type="color" name="rspa_frontend_check_button_background_color_chooser" class="rsilitech-control" id="rspa_frontend_check_button_background_color_chooser" placeholder="Eg. 15px" value="<?php echo (isset($check_postcode_layout_row['rspa_frontend_check_button_background_color_chooser'])) ? $check_postcode_layout_row['rspa_frontend_check_button_background_color_chooser'] : ''; ?>">
								<input type="text" name="rspa_frontend_check_button_text_color" class="rsilitech-control" id="rspa_frontend_check_button_text_color" placeholder="Text Color" value="<?php echo (isset($check_postcode_layout_row['rspa_frontend_check_button_text_color'])) ? $check_postcode_layout_row['rspa_frontend_check_button_text_color'] : ''; ?>">
								<input type="color" name="rspa_frontend_check_button_text_color_chooser" class="rsilitech-control" id="rspa_frontend_check_button_text_color_chooser" placeholder="Eg. 21px" value="<?php echo (isset($check_postcode_layout_row['rspa_frontend_check_button_text_color_chooser'])) ? $check_postcode_layout_row['rspa_frontend_check_button_text_color_chooser'] : ''; ?>">
								<input type="text" name="rspa_frontend_check_button_border_color" class="rsilitech-control" id="rspa_frontend_check_button_border_color" placeholder="Border Color" value="<?php echo (isset($check_postcode_layout_row['rspa_frontend_check_button_border_color'])) ? $check_postcode_layout_row['rspa_frontend_check_button_border_color'] : ''; ?>">
								<input type="color" name="rspa_frontend_check_button_border_color_chooser" class="rsilitech-control" id="rspa_frontend_check_button_border_color_chooser" placeholder="Eg. 21px" value="<?php echo (isset($check_postcode_layout_row['rspa_frontend_check_button_border_color_chooser'])) ? $check_postcode_layout_row['rspa_frontend_check_button_border_color_chooser'] : ''; ?>">
							</div>
						</div>

						<div class="rsilitech-group">
							<label for="rspa_postcode_service_available_in"><?php esc_html_e('Service is available in (Label)', 'rsilitech-postcode-availability-woocommerce'); ?> </label>
							<input type="text" name="rspa_postcode_service_available_in" class="rsilitech-control" id="rspa_postcode_service_available_in" placeholder="Eg. Service available in" value="<?php echo (isset($check_postcode_layout_row['rspa_postcode_service_available_in'])) ? $check_postcode_layout_row['rspa_postcode_service_available_in'] : ''; ?>">
						</div>
						<div class="rsilitech-group">
							<label for="rspa_postcode_delevered_by"><?php esc_html_e('Deliverd by (Label)', 'rsilitech-postcode-availability-woocommerce'); ?> </label>
							<input type="text" name="rspa_postcode_delevered_by" class="rsilitech-control" id="rspa_postcode_delevered_by" placeholder="Eg. Deliverd by" value="<?php echo (isset($check_postcode_layout_row['rspa_postcode_delevered_by'])) ? $check_postcode_layout_row['rspa_postcode_delevered_by'] : ''; ?>">
						</div>
						<div class="rsilitech-group">
							<label for="rspa_postcode_cod_available"><?php esc_html_e('COD available (Label)', 'rsilitech-postcode-availability-woocommerce'); ?> </label>
							<input type="text" name="rspa_postcode_cod_available" class="rsilitech-control" id="rspa_postcode_cod_available" placeholder="Eg. COD available" value="<?php echo (isset($check_postcode_layout_row['rspa_postcode_cod_available'])) ? $check_postcode_layout_row['rspa_postcode_cod_available'] : ''; ?>">
						</div>
						<div class="rsilitech-group">
							<label for="rspa_postcode_shipping_details"><?php esc_html_e('Shipping Details (Label)', 'rsilitech-postcode-availability-woocommerce'); ?> </label>
							<input type="text" name="rspa_postcode_shipping_details" class="rsilitech-control" id="rspa_postcode_shipping_details" placeholder="Eg. Shipping Details" value="<?php echo (isset($check_postcode_layout_row['rspa_postcode_shipping_details'])) ? $check_postcode_layout_row['rspa_postcode_shipping_details'] : ''; ?>">
						</div>

					</div>
					<div class="rsilitech_card__footer">

					</div>
				</form>

			</div>
			<div class="rsilitech_col_4">
				<div class="rsilitech_card ">
					<div class="rsilitech_card__header">
						<h3 class="rsilitech__title js-title"><?php esc_html_e('Frontent View', 'rsilitech-postcode-availability-woocommerce'); ?></h3>

					</div>

					<div class="rsilitech_card__body">
						<div class="rsilitech_wrapper">

							<div class="rsilitech_row">
								<div class="rsilitech_card" id="check_avilability_output" style="padding-top : <?php echo (isset($check_postcode_layout_row['rspa_frontend_padding_top'])) ? $check_postcode_layout_row['rspa_frontend_padding_top'] : ''; ?>px;padding-right : <?php echo (isset($check_postcode_layout_row['rspa_frontend_padding_right'])) ? $check_postcode_layout_row['rspa_frontend_padding_right'] : ''; ?>px;padding-bottom : <?php echo (isset($check_postcode_layout_row['rspa_frontend_padding_bottom'])) ? $check_postcode_layout_row['rspa_frontend_padding_bottom'] : ''; ?>px;padding-left : <?php echo (isset($check_postcode_layout_row['rspa_frontend_padding_left'])) ? $check_postcode_layout_row['rspa_frontend_padding_left'] : ''; ?>px;border : <?php echo (isset($check_postcode_layout_row['rspa_frontend_border'])) ? $check_postcode_layout_row['rspa_frontend_border'] : ''; ?>px <?php echo (isset($check_postcode_layout_row['rspa_frontend_border_patern'])) ? $check_postcode_layout_row['rspa_frontend_border_patern'] : ''; ?> <?php echo (isset($check_postcode_layout_row['rspa_frontend_border_color'])) ? $check_postcode_layout_row['rspa_frontend_border_color'] : ''; ?>; ">
									<div class="rsilitech_card__header display-block">
										<h3 class="rsilitech__title js-title" id="check_availability_title"><?php echo (isset($check_postcode_layout_row['rspa_postcode_check_availability_text'])) ? $check_postcode_layout_row['rspa_postcode_check_availability_text'] : ''; ?></h3>
										<span id="check_availability_service_unavailable">&nbsp;&nbsp;<?php echo (isset($check_postcode_layout_row['rspa_postcode_unavailable_message'])) ? $check_postcode_layout_row['rspa_postcode_unavailable_message'] : ''; ?></span>
									</div>
									<div class="rsilitech_card__body" style="display: block;">
										<form method="post" action="#" name="_rsilitech_add_postcode_form">
											<div class="rsilitech-group ">

												<input type="text" name="rsilitech_postcode" class="rsilitech-control " id="rspa_postcode_placeholder" placeholder="<?php echo (isset($check_postcode_layout_row['rspa_postcode_placeholder_text'])) ? $check_postcode_layout_row['rspa_postcode_placeholder_text'] : ''; ?>">
												<button type="button" name="check" id="validate_postcode" class="save_btn flex_float_right" style="background-color:<?php echo (isset($check_postcode_layout_row['rspa_frontend_check_button_background_color'])) ? $check_postcode_layout_row['rspa_frontend_check_button_background_color'] : ''; ?>;color:<?php echo (isset($check_postcode_layout_row['rspa_frontend_check_button_text_color'])) ? $check_postcode_layout_row['rspa_frontend_check_button_text_color'] : ''; ?>;border-color:<?php echo (isset($check_postcode_layout_row['rspa_frontend_check_button_border_color'])) ? $check_postcode_layout_row['rspa_frontend_check_button_border_color'] : ''; ?>"><?php echo (isset($check_postcode_layout_row['rspa_postcode_check_button_text'])) ? $check_postcode_layout_row['rspa_postcode_check_button_text'] : ''; ?></button>
											</div>
										</form>
									</div>
								</div>
							</div>

							<div class="rsilitech_row">

								<div class="rsilitech_card" style="padding-top : <?php echo (isset($check_postcode_layout_row['rspa_frontend_padding_top'])) ? $check_postcode_layout_row['rspa_frontend_padding_top'] : ''; ?>px;padding-right : <?php echo (isset($check_postcode_layout_row['rspa_frontend_padding_right'])) ? $check_postcode_layout_row['rspa_frontend_padding_right'] : ''; ?>px;padding-bottom : <?php echo (isset($check_postcode_layout_row['rspa_frontend_padding_bottom'])) ? $check_postcode_layout_row['rspa_frontend_padding_bottom'] : ''; ?>px;padding-left : <?php echo (isset($check_postcode_layout_row['rspa_frontend_padding_left'])) ? $check_postcode_layout_row['rspa_frontend_padding_left'] : ''; ?>px;border : <?php echo (isset($check_postcode_layout_row['rspa_frontend_border'])) ? $check_postcode_layout_row['rspa_frontend_border'] : ''; ?>px <?php echo (isset($check_postcode_layout_row['rspa_frontend_border_patern'])) ? $check_postcode_layout_row['rspa_frontend_border_patern'] : ''; ?> <?php echo (isset($check_postcode_layout_row['rspa_frontend_border_color'])) ? $check_postcode_layout_row['rspa_frontend_border_color'] : ''; ?>; ">
									<div class="rsilitech_card__footer" style="color: rgb(51, 51, 51);">
										<div id="service_avaliable">
											<p> <span id="service_available_in"> <?php echo (isset($check_postcode_layout_row['rspa_postcode_service_available_in'])) ? $check_postcode_layout_row['rspa_postcode_service_available_in'] : ''; ?> </span> : <b>SW111bd</b>
												<button id="rspa_change_postcode" style="background-color:<?php echo (isset($check_postcode_layout_row['rspa_frontend_check_button_background_color'])) ? $check_postcode_layout_row['rspa_frontend_check_button_background_color'] : ''; ?>;color:<?php echo (isset($check_postcode_layout_row['rspa_frontend_check_button_text_color'])) ? $check_postcode_layout_row['rspa_frontend_check_button_text_color'] : ''; ?>;border-color:<?php echo (isset($check_postcode_layout_row['rspa_frontend_check_button_border_color'])) ? $check_postcode_layout_row['rspa_frontend_check_button_border_color'] : ''; ?>">Change</button>
											</p>
											<p> <span id="deleverd_by"> <?php echo (isset($check_postcode_layout_row['rspa_postcode_delevered_by'])) ? $check_postcode_layout_row['rspa_postcode_delevered_by'] : ''; ?> </span> : 10th Mar, 2021</p>
											<p> <span id="cod_aviabale"> <?php echo (isset($check_postcode_layout_row['rspa_postcode_cod_available'])) ? $check_postcode_layout_row['rspa_postcode_cod_available'] : ''; ?> </span> : no</p>
											<p id="order_note">Delivery is available in your postcode</p>
											<p> <span id="shipping_details"> <?php echo (isset($check_postcode_layout_row['rspa_postcode_shipping_details'])) ? $check_postcode_layout_row['rspa_postcode_shipping_details'] : ''; ?> </span> : ₹ 0(Free Shipping)</p>
										</div>
									</div>
								</div>
							</div>
							<div class="rsilitech_row">

								<div class="rsilitech_card no-border rspa-card-with-padding">
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="rsilitech_card margin-top-1">
					<div class="rsilitech_card__header">
						<h3 class="rsilitech__title js-title"><?php esc_html_e('Shortcode', 'rsilitech-postcode-availability-woocommerce'); ?></h3>

					</div>

					<div class="rsilitech_card__body">
						<div class="rsilitech_wrapper">

						
							<div class="rsilitech_row">

								<div class="rsilitech_card no-border rspa-card-with-padding">
									
									<div class="mrgine-6">
										<h4>[rspa_postcode_availability]</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

<?php } else {
	echo __("You are not authorized to perform this action.", RSPA_PLUGIN_NAME);
} ?>