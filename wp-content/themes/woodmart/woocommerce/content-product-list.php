<?php 
	global $product;

	//  error_log(print_r($product ,1));
	// error_log(print_r(get_class_methods($product->get_attributes()['pa_d_width']) ,1));
	// error_log(print_r($product->get_attributes()['pa_d_width']->get_terms() ,1));

	$get_size_name = function ($el)
	{
		return $el->name;
	};

	$width = $product->get_attributes()['pa_d_width'];

	if(empty($width)){
		$width = "N/A" ;
	} else {
		$width = array_map($get_size_name, $width->get_terms());
		$width = implode(", ", $width);
	}

	$sizes = [];

	$list = $product->get_attributes()['pa_size'];

	if (empty($list)){
		$sizes[0] = 'N/A';
		$sizes[1] = 'N/A';
	} else {
		$list = $list->get_terms();

		foreach ($list as $l) {
			$l = explode("*", $l->name);
			if (count($l) != 2 ){
				continue;
			}
			$sizes[0][] = $l[0]."мм";
			$sizes[1][] = $l[1]."мм";
		}
		$sizes[0] = implode(", ", $sizes[0]);
		$sizes[1] = implode(", ", $sizes[1]);
		
	}

	$list = $product->get_attributes()['pa_size'];

	$manufacturer = $product->get_attributes()['pa_manufacturer'];
	if (empty($manufacturer)){
		$manufacturer = 'N/A';
	} else {
		$manufacturer = $manufacturer->get_terms()[0]->name;
	}

	// error_log(print_r($sizes,1));

	do_action( 'woocommerce_before_shop_loop_item' ); 
?>

<div class="product-wrapper">
	<div class="col-12 col-md-2 product-element-top">
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="product-image-link">
			<?php
					/**
					 * woocommerce_before_shop_loop_item_title hook
					 *
					 * @hooked woocommerce_show_product_loop_sale_flash - 10
					 * @hooked woodmart_template_loop_product_thumbnail - 10
					 */
					 remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash' );
					
					 do_action( 'woocommerce_before_shop_loop_item_title');
					 
				?>
		</a>
		<?php woodmart_hover_image(); ?>
		<div class="woodmart-buttons">
			<?php woodmart_quick_view_btn( get_the_ID() ); ?>
			<?php woodmart_wishlist_btn(); ?>
			<?php woodmart_compare_btn(); ?>
		</div>
		<?php woodmart_quick_shop_wrapper(); ?>
	</div>

	<div class="product-list-content col-12 col-md-4">
		<?php
				/**
				 * woocommerce_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_template_loop_product_title - 10
				 */
				do_action( 'woocommerce_shop_loop_item_title' );
				
			?>
		<p class="single-line-attr">Производитель: <b title="<?php echo $manufacturer?>"><?php echo $manufacturer?></b>
		</p>
		<?php
				woodmart_product_categories();
				woodmart_product_brands_links();
			?>


	</div>
	<div class="col-12 col-md-2">
		<div class="row">
			<h5 class="col-12" style="padding-left: 0;">Размеры:</h5>
			<span class="col-5 single-line-attr">Толщина: </span><b class="col-7 single-line-attr"
				title="<?php echo $width?>"><?php echo $width?></b>
			<span class="col-5 single-line-attr">Ширина: </span><b class="col-7 single-line-attr"
				title="<?php echo $width?>"><?php echo $sizes[0]?></b>
			<span class="col-5 single-line-attr">Длина: </span><b class="col-7 single-line-attr"
				title="<?php echo $width?>"><?php echo $sizes[1]?></b>
		</div>

		<?php
				// woodmart_product_categories();
				// woodmart_product_brands_links();
				// woocommerce_template_single_rating();
				  ?>
		<?php 
				// echo woodmart_swatches_list();
			// woocommerce_template_single_excerpt(); 
			// woodmart_swatches_list(); 
		?>

		<?php // if ( woodmart_loop_prop( 'progress_bar' ) ): ?>
		<?php // woodmart_stock_progress_bar(); ?>
		<?php // endif ?>


	</div>
	<div class="col-12 col-md-2">

		<?php if ( woodmart_loop_prop( 'timer' ) ): ?>
		<?php woodmart_product_sale_countdown(); ?>
		<?php endif ?>
		<div class="woodmart-price"><?php woocommerce_template_loop_price(); ?>
		</div>
	</div>
	<div class="col-12 col-md-2">
		<div class="woodmart-add-btn"><?php do_action( 'woocommerce_after_shop_loop_item' ); ?></div>
	</div>
</div>