<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || false === wc_get_loop_product_visibility( $product->get_id() ) || ! $product->is_visible() ) {
	return;
}
?>
<?php
$review_count = $product->get_review_count();
if ( $review_count == 0 || $review_count > 1 ) {
	$review_count_var = $review_count . esc_html__( ' Reviews', 'brator' );
} else {
	$review_count_var = $review_count . esc_html__( ' Review', 'brator' );
}
$newness_days = 30; // Number of days the badge is shown
$created      = strtotime( $product->get_date_created() );

$stock_quantity = $product->get_stock_quantity();

$sale_stock_quantity = get_post_meta( $product->get_id(), 'total_sales', true );
?>
<div class="splide__slide">
	<div <?php wc_product_class( 'brator-product-single-item-area design-one design-one-with-three style-four', $product ); ?>>
		<div class="brator-product-single-item-info content-flex">
			<div class="brator-product-single-item-info-left">
				<?php
				if ( $product->is_on_sale() ) {
					$prices   = brator_get_product_prices( $product );
					$returned = brator_product_special_price_calc( $prices );
					if ( isset( $returned['percent'] ) && $returned['percent'] ) {
						?>
					<div class="off-batch"><?php echo sprintf( esc_html__( '%d%% Off', 'brator' ), $returned['percent'] ); ?></div>
						<?php
					}
				}
				?>
			</div>
			<div class="brator-product-single-item-info-right">
				<?php if ( function_exists( 'activation_tinv_wishlist' ) ) { ?>
				<div class="brator-product-wishlist">
					<?php echo do_shortcode( '[ti_wishlists_addtowishlist loop=yes]' ); ?>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="brator-product-single-item-img">
			<a href="<?php esc_url( the_permalink() ); ?>"><?php echo brator_the_product_thumbnail(); ?></a>
		</div>
		<div class="brator-product-single-item-mini">
			<?php if ( $price_html = $product->get_price_html() ) : ?>
			<div class="brator-product-single-item-price">
				<p><?php echo wp_kses( $price_html, 'code_contxt' ); ?></p>
			</div>
			<?php endif; ?>
			<div class="brator-product-single-item-title">
				<h5><a href="<?php esc_url( the_permalink() ); ?>"> <?php the_title(); ?></a></h5>
			</div>
			<?php if ( $product->get_average_rating() ) : ?>
			<div class="brator-product-single-item-review">
				<div class="brator-review">
					<?php echo wc_get_rating_html( $product->get_average_rating() ); ?>
				</div>
				<div class="brator-review-text">
					<p><?php echo esc_html( $review_count_var ); ?></p>
				</div>
			</div>
			<?php endif; ?>
			<div class="brator-product-single-item-btn">
				<?php woocommerce_template_loop_add_to_cart(); ?>
			</div>
		</div>
	</div>
</div>