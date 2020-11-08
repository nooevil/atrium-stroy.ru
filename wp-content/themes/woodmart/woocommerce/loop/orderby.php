<?
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
	
}
// foreach ( $catalog_orderby_options as $id => $name ) {
// 	error_log("==========");
// 	error_log($id );
// 	error_log( $orderby." ".$id );
// 	error_log($name);
// 	error_log($orderby);
// }
?>
<div class="woodmart-ordering">
	<span class="ordering-title">По цене:</span>
	<form id="woocommerce-ordering" class="woocommerce-ordering<? if ( ! empty( $list ) ): ?>-list<? endif; ?>" method="get">
		<input type="radio" class="d-none" name="orderby" id="price" value="price" <? echo selected($orderby, "price" , false ) ?  "checked" : "" ; ?>/>
		<label for="price" class="woocommerce-ordering-icon-labels"><i class="fa fa-sort-amount-asc"></i></label>
		<input type="radio" class="d-none" name="orderby" id="price-desc" value="price-desc" <? echo selected($orderby, "price-desc" , false) ?  "checked" : ""; ?> />
		<label for="price-desc" class="woocommerce-ordering-icon-labels"><i class="fa fa-sort-amount-desc"></i></label>

		<?  //if ( ! empty( $list )):?>
		<!-- <ul>
			<?  //foreach ( $catalog_orderby_options as $id => $name ) : ?>
			<?
					// $link = woodmart_shop_page_link( true );
					// $link = add_query_arg( 'orderby', $id, $link );?>
			<li>
				<a href="<? // echo esc_url( $link ); ?>" data-order="<?// echo esc_attr( $id ); ?>"
					class="<? // if(selected( $orderby, $id, false ) ) echo 'selected-order'; ?>"><? // echo esc_html( $name ); ?></a>
			</li>
			<?  //endforeach; ?>
		</ul>
		<?  //else: ?>
		<select name="orderby" class="orderby" aria-label="<?  //esc_attr_e( 'Shop order', 'woocommerce' ); ?>">
			<? // foreach ( $catalog_orderby_options as $id => $name ) : ?>
			<option value="<?  //echo esc_attr( $id ); ?>" <?  //selected( $orderby, $id ); ?>>
				<?  //echo esc_html( $name ); ?></option>
			<? // endforeach; ?>
		</select>
		<?
			// Keep query string vars intact
			// foreach ( $_GET as $key => $val ) {
			// 	if ( 'orderby' === $key || 'submit' === $key ) {
			// 		continue;
			// 	}
			// 	if ( is_array( $val ) ) {
			// 		foreach( $val as $innerVal ) {
			// 			echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
			// 		}
			// 	} else {
			// 		echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
			// 	}
			// }
		?>
		<? // endif ?> -->
		<? wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged' ) ); ?>
	</form>
</div>