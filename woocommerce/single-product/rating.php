<?php
/**
 * Single Product Rating
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$product = logancee_get_product();
global $woocommerce;

if ( 'no' === get_option( 'woocommerce_enable_review_rating' ) ) {
    return;
}

$rating = $product->get_average_rating();
$rating_html = $product->get_rating_html();
$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();
$count = 0;


if ( $rating_count > 0 ) : ?>
    <div class="review">
    <div class="rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
        <meta content="<?php echo $rating; ?>" itemprop="ratingValue" />
        <meta content="<?php echo $rating_count; ?>" itemprop="ratingCount" />
        <meta content="<?php echo $review_count; ?>" itemprop="reviewCount" />
        <meta content="5" itemprop="bestRating" />
        <span class="star" data-value="<?php echo esc_attr($rating) ?>" data-toggle="tooltip" data-title="<?php echo $rating ?>">
            <?php
            for ($i = 0; $i < (int)$rating; $i++) {
                $count++;
                echo '<i class="fa fa-star  active"></i>';
            }
            for ($i = $count; $i < 5; $i++) {
                $count++;
                echo '<i class="fa fa-star"></i>';
            } ?>
        </span>
		<?php if ( comments_open() ) : ?><a href="#reviews" class="woocommerce-review-link" rel="nofollow" onclick="$('a[href=\'#tab-reviews\']').trigger('click'); $('html, body').animate({scrollTop:$('#tab-reviews').offset().top}, '500', 'swing');">(<?php printf( _n( '%s customer review', '%s customer reviews', $review_count, 'woocommerce' ), '<span itemprop="reviewCount" class="count">' . $review_count . '</span>' ); ?>)</a><?php endif ?>
	    </div>

    </div>

<?php endif; ?>
