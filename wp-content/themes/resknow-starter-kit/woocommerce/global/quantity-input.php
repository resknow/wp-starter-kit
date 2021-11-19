<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( $max_value && $min_value === $max_value ) {
	?>
	<div class="quantity hidden">
		<input type="hidden" id="<?php echo esc_attr( $input_id ); ?>" class="qty" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $min_value ); ?>" />
	</div>
	<?php
} else {
	/* translators: %s: Quantity. */
	$label = ! empty( $args['product_name'] ) ? sprintf( esc_html__( '%s quantity', 'woocommerce' ), wp_strip_all_tags( $args['product_name'] ) ) : esc_html__( 'Quantity', 'woocommerce' );
	?>
        <?php if ( is_product() ): ?>
            <div
                x-data="{ value: <?php echo esc_attr( $input_value ); ?>, minValue: 0 }"
                class="quantity c-quantity"
            >
                <?php do_action( 'woocommerce_before_quantity_input_field' ); ?>
                <label class="screen-reader-text c-quantity__label" for="<?php echo esc_attr( $input_id ); ?>">Quantity</label>
                <div class="c-quantity__controls">
                    <button x-cloak @click="value = value > minValue ? parseInt(value)-1 : 0" type="button">
                        <span aria-hidden="true">-</span>
                        <span class="screen-reader-text">Subtract 1 from quantity</span>
                    </button>
                    <input
                        type="text"
                        id="<?php echo esc_attr( $input_id ); ?>"
                        class="<?php echo esc_attr( join( ' ', (array) $classes ) ); ?>"
                        step="<?php echo esc_attr( $step ); ?>"
                        min="<?php echo esc_attr( $min_value ); ?>"
                        max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>"
                        name="<?php echo esc_attr( $input_name ); ?>"
                        value="<?php echo esc_attr( $input_value ); ?>"
                        title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ); ?>"
                        size="4"
                        placeholder="<?php echo esc_attr( $placeholder ); ?>"
                        inputmode="<?php echo esc_attr( $inputmode ); ?>"
                        x-model="value"
                        x-ref="input"
                    />
                    <button x-cloak @click="value = parseInt(value)+1" type="button">
                        <span aria-hidden="true">+</span>
                        <span class="screen-reader-text">Add 1 from quantity</span>
                    </button>
                </div>

                <?php do_action( 'woocommerce_after_quantity_input_field' ); ?>
            </div>
        <?php else: ?>
            <div class="quantity">
                <?php do_action( 'woocommerce_before_quantity_input_field' ); ?>

                    <label class="screen-reader-text" for="<?php echo esc_attr( $input_id ); ?>"><?php echo esc_attr( $label ); ?></label>
                    <input
                        type="text"
                        id="<?php echo esc_attr( $input_id ); ?>"
                        class="<?php echo esc_attr( join( ' ', (array) $classes ) ); ?>"
                        step="<?php echo esc_attr( $step ); ?>"
                        min="<?php echo esc_attr( $min_value ); ?>"
                        max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>"
                        name="<?php echo esc_attr( $input_name ); ?>"
                        value="<?php echo esc_attr( $input_value ); ?>"
                        title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ); ?>"
                        size="4"
                        placeholder="<?php echo esc_attr( $placeholder ); ?>"
                        inputmode="<?php echo esc_attr( $inputmode ); ?>"
                    />

                <?php do_action( 'woocommerce_after_quantity_input_field' ); ?>
            </div>
        <?php endif; ?>
	<?php
}
