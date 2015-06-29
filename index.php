<?php

	/*
		Plugin Name: WC Pending Orders Count in AdminBar
		Plugin URI: https://wordpress.org/plugins/woocommerce-count-orders-in-adminbar/
		Description: نمایش تعداد سفارشات در انتظار تحویل ووکامرس در منوی ادمین وردپرس ...
		Version: 1.5
		Author: Nima Saberi
		Author URI: http://ideyeno.ir
	*/
    
	if ( ! defined( 'ABSPATH' ) ) {  exit; }

	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		
		function wc_pending_lng($text='') {
			$text = (empty($text) ? '' : strip_tags($text));
			if ( get_bloginfo("language") === "fa-IR" ) {
				$lng = array(
					'btn_adminbar' => 'در انتظار تحویل',
				);
			} else {
				$lng = array(
					'btn_adminbar' => 'Pending Orders',
				);
			}
			return (isset($lng[$text]) ? $lng[$text] : '');
		}
	
		function woo_count_order_shop($wp_admin_bar){
			$count = intval(wc_processing_order_count());
			$args = array(
				'id' => 'woo-count-order-shop',
				'title' => '<span class="dashicons dashicons-cart" style="font: 400 20px/1 dashicons;color: #999999;margin: 5px 0 0 5px;"></span> <span style="color: #878787;font: bold 12px tahoma;">'.$count.'</span>',
				'href' => admin_url('/edit.php?post_type=shop_order&post_status=wc-processing', 'http'),
				'meta' => array(
					'class' => 'woo-count-order-shop',
					'title' => wc_pending_lng('btn_adminbar')
				)
			);
			$wp_admin_bar->add_node($args);
		}
		add_action('admin_bar_menu', 'woo_count_order_shop', 50);
	
	}

?>