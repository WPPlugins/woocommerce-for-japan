<?php
/**
 * Plugin Name: WooCommerce For Japan
 * Framework Version : 1.0.2
 * Author: Artisan Workshop
 * Author URI: https://wc.artws.info/
 *
 * @category View
 * @author Artisan Workshop
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WC4JP_Admin_Setting {

	/**
	 * create checkbox input form.
	 * 
	 * @return mixed
	 */
	public function wc4jp_input_checkbox($slug, $descritpion, $prefix, $array_name = null){
		?>
		<label for="woocommerce_input_<?php echo $slug;?>">
		<?php 
			$wc4jp_options_setting = null;
			$wc4jp_meta_name = $prefix.$slug;
			if(get_option($wc4jp_meta_name)){
				$wc4jp_options_setting = get_option($wc4jp_meta_name);
			}elseif(get_option($array_name)){
				$setting = get_option($array_name);
				$wc4jp_options_setting = $setting[$slug];
			}
			?>
			<input type="checkbox" name="<?php echo $slug;?>" value="1" <?php checked( $wc4jp_options_setting, 1 ); ?>>
			<?php echo $descritpion; ?>
		</label>
		<?php
	}
	/**
	 * create input text form.
	 * 
	 * @return mixed
	 */
	 public function wc4jp_input_text($slug, $descritpion, $num, $default_value = null, $prefix, $array_name = null){
		 ?>
		<label for="woocommerce_input_<?php echo $slug;?>">
		<?php 
			$wc4jp_meta_name = $prefix.$slug;
			if(get_option($wc4jp_meta_name)){
				$wc4jp_options_setting = get_option($wc4jp_meta_name) ;
			}elseif(get_option($array_name)){
				$setting = get_option($array_name);
				$wc4jp_options_setting = $setting[$slug];
			}else{
				$wc4jp_options_setting = $default_value ;
			}
			?>
			<input type="text" name="<?php echo $slug;?>"  size="<?php echo $num;?>" value="<?php echo $wc4jp_options_setting; ?>" ><br />
			<?php echo $descritpion; ?>
		</label>
		<?php
	}
	/**
	 * create input number form.
	 * 
	 * @return mixed
	 */
	 public function wc4jp_input_number($slug, $descritpion, $default_value, $prefix, $array_name = null){
		 ?>
		<label for="woocommerce_input_<?php echo $slug;?>">
		<?php 
			$wc4jp_meta_name = $prefix.$slug;
			if(get_option($wc4jp_meta_name)){
				$wc4jp_options_setting = get_option($wc4jp_meta_name);
			}elseif(get_option($array_name)){
				$setting = get_option($array_name);
				$wc4jp_options_setting = $setting[$slug];
			}else{
				$wc4jp_options_setting = $default_value;
			}
			?>
			<input type="number" name="<?php echo $slug;?>" value="<?php echo $wc4jp_options_setting; ?>" ><br />
			<?php echo $descritpion; ?>
		</label>
		<?php
	}
	/**
	 * create input number form.
	 * 
	 * @return mixed
	 */
	 public function wc4jp_input_select($slug, $descritpion, $select_options, $prefix, $array_name = null){
		 ?>
		<label for="woocommerce_input_<?php echo $slug;?>">
		<?php 
			$wc4jp_meta_name = $prefix.$slug;
			$wc4jp_options_setting = '';
			if(get_option($wc4jp_meta_name)){
				$wc4jp_options_setting = get_option($wc4jp_meta_name);
			}elseif(get_option($array_name)){
				$setting = get_option($array_name);
				$wc4jp_options_setting = $setting[$slug];
			}
			echo '<select name="'.$slug.'">';
			foreach($select_options as $key => $value){
				$checked = '';
				if($wc4jp_options_setting == $key){
					$checked = ' selected="selected"';
				}
				echo '<option value="'.$key.'"'.$checked.'>'.$value.'</option>';
			}
			echo '</select><br />';
			echo $descritpion; ?>
			</select>
		</label>
		<?php
	}
	/**
	 * create description for check pattern.
	 * 
	 * @return mixed
	 */
	public function wc4jp_description_check_pattern($title){
		$descritpion = sprintf(__( 'Please check it if you want to use %s.', 'woocommerce-for-japan' ), $title);
		return $descritpion;
	}
	/**
	 * create description for payment pattern.
	 * 
	 * @return mixed
	 */
	public function wc4jp_description_payment_pattern($title){
		$descritpion = sprintf(__( 'Please check it if you want to use the payment method of %s.', 'woocommerce-for-japan' ), $title);
		return $descritpion;
	}
	/**
	 * create description for input pattern.
	 * 
	 * @return mixed
	 */
	public function wc4jp_description_input_pattern($title){
		$descritpion = sprintf(__( 'Please input %s.', 'woocommerce-for-japan' ), $title);
		return $descritpion;
	}
	/**
	 * create description for input pattern.
	 * 
	 * @return mixed
	 */
	public function wc4jp_description_select_pattern($title){
		$descritpion = sprintf(__( 'Please select one from these as %s.', 'woocommerce-for-japan' ), $title);
		return $descritpion;
	}
	/**
	 * Sidebar Support notice html
	 * 
	 * @return mixed
	 */
	public function wc4jp_support_notice($support_form_url){?>
		<h4 class="inner"><?php echo __( 'Need support?', 'woocommerce-for-japan' );?></h4>
		<p class="inner"><?php echo sprintf(__( 'If you are having problems with this plugin, talk about them in the <a href="%s" target="_blank" title="Support forum">Support forum</a>.', 'woocommerce-for-japan' ),$support_form_url.'?utm_source=wc4jp-settings&utm_medium=link&utm_campaign=top-support');?></p>
		<p class="inner"><?php echo sprintf(__( 'If you need professional support, please consider about <a href="%1$s" target="_blank" title="Site Construction Support service">Site Construction Support service</a> or <a href="%2$s" target="_blank" title="Maintenance Support service">Maintenance Support service</a>.', 'woocommerce-for-japan' ),'https://wc.artws.info/product-category/setting-support/?utm_source=wc4jp-settings&utm_medium=link&utm_campaign=setting-support','https://wc.artws.info/product-category/maintenance-support/?utm_source=wc4jp-settings&utm_medium=link&utm_campaign=maintenance-support');?></p>
     <?php
	}
	/**
	 * Sidebar Update notice html
	 * 
	 * @return mixed
	 */
	public function wc4jp_update_notice(){?>
		<h4 class="inner"><?php echo __( 'Finished Latest Update, WordPress and WooCommerce?', 'woocommerce-for-japan' );?></h4>
		<p class="inner"><?php echo sprintf(__( 'One the security, latest update is the most important thing. If you need site maintenance support, please consider about <a href="%s" target="_blank" title="Support forum">Site Maintenance Support service</a>.', 'woocommerce-for-japan' ),'https://wc.artws.info/shop/maintenance-support/woocommerce-professional-support-subscription/?utm_source=wc4jp-settings&utm_medium=link&utm_campaign=maintenance-support');?>
		</p>
     <?php
	}
	/**
	 * Sidebar Community information html
	 * 
	 * @return mixed
	 */
	public function wc4jp_community_info(){?>
		<h4 class="inner"><?php echo __( 'Where is the study group of Woocommerce in Japan?', 'woocommerce-for-japan' );?></h4>
		<p class="inner"><?php echo sprintf(__( '<a href="%s" target="_blank" title="Tokyo WooCommerce Meetup">Tokyo WooCommerce Meetup</a>.', 'woocommerce-for-japan' ),'http://meetup.com/ja-JP/Tokyo-WooCommerce-Meetup/?');?><br />
		<?php echo sprintf(__( '<a href="%s" target="_blank" title="Kansai WooCommerce Meetup">Kansai WooCommerce Meetup</a>.', 'woocommerce-for-japan' ),'http://meetup.com/ja-JP/Kansai-WooCommerce-Meetup/');?><br />
		<?php echo __('Join Us!', 'woocommerce-for-japan' );?>
		</p>
     <?php
	}
	/**
	 * Sidebar Footer Author infomation html
	 * 
	 * @return mixed
	 */
	public function wc4jp_author_info(){?>
					<p class="wc4jp-link inner"><?php echo __( 'Created by', 'woocommerce-for-japan' );?> <a href="https://wc.artws.info/?utm_source=wc4jp-settings&utm_medium=link&utm_campaign=created-by" target="_blank" title="Artisan Workshop"><img src="https://wc.artws.info/wp-content/uploads/2016/08/woo-logo.png" title="Artsain Workshop" alt="Artsain Workshop" class="wc4jp-logo" /></a><br />
					<a href="https://docs.artws.info/?utm_source=wc4jp-settings&utm_medium=link&utm_campaign=created-by" target="_blank"><?php echo __( 'WooCommerce Doc in Japanese', 'woocommerce-for-japan' );?></a>
					</p>
     <?php
	}
}
