<?php

	/*
		Plugin Name: WC Pending Orders Count in AdminBar
		Plugin URI: http://ideyeno.ir
		Description: نمایش تعداد سفارشات در انتظار تحویل ووکامرس در منوی ادمین وردپرس ...
		Version: 1.0.3
		Author: Nima Saberi
		Author URI: http://ideyeno.ir
	*/
    
	function woo_count_order_shop($wp_admin_bar){
		$count = intval(wc_processing_order_count());
		$args = array(
			'id' => 'woo-count-order-shop',
			'title' => '<span class="dashicons dashicons-cart" style="font: 400 20px/1 dashicons;color: #999999;margin: 5px 0 0 5px;"></span> <span style="color: #878787;font: bold 12px tahoma;">'.$count.'</span>',
			'href' => admin_url('/edit.php?post_type=shop_order', 'http'),
			'meta' => array(
				'class' => 'woo-count-order-shop',
				'title' => 'Pending Orders / در انتظار تحویل'
			)
		);
		$wp_admin_bar->add_node($args);
	}
	add_action('admin_bar_menu', 'woo_count_order_shop', 50);

?>