<?php
if(!class_exists('WDM_Groups_Show_Meta_Fields_Public')){
    class WDM_Groups_Show_Meta_Fields_Public{
        /**
         * show custom fields value in the order received thank you page
         *
         * @param [type] $order
         * @return void
         */
        public function wdm_show_custom_fields($order){
            $order_id = $order -> ID;
            $group_arr = get_post_meta( $order_id, 'inmedwdm_user_register_group', true );
            $val = 0;
            foreach( $group_arr as $key => $value ){
                $val = $value;
            }
            if( $val > 0 ){
                $out = '<table class="woocommerce-table woocommerce-table--custom-fields shop_table custom-fields" style="margin-top: -25px;border-top: none;border-top-left-radius: 0px;border-top-right-radius: 0px;"><tbody>';
                $out .= '<tr><th>'.__('Demo Field', 'wdm_gsm').':</th><td style="padding-left: 745px;">'.get_the_title($val).'</td></tr>';
                $out .= '</tbody></table>';
                echo $out;
            }
        }
        /**
         * changes the demo fields options
         *
         * @param [type] $args
         * @param [type] $key
         * @param [type] $value
         * @return void
         */
        public function wdm_change_demo_field_options( $args, $key, $value ){
            foreach ( WC()->cart->get_cart() as $cart_item ) {
                $product_in_cart = $cart_item['product_id'];
                $product_variation_in_cart = $cart_item['variation_id'];
                $reflector = new \ReflectionClass('InmedWDM_Checkout_Function');
                $inmedwdm = $reflector->newInstanceWithoutConstructor();
                if ( empty( $product_variation_in_cart ) ) {
                    $chk_custom_field_mapping = $inmedwdm->inmedwdm_get_custom_field_enabled( $product_in_cart );
                    if ( ! empty( $chk_custom_field_mapping ) && ! empty( $chk_custom_field_mapping['related_course'] ) && ! empty( $chk_custom_field_mapping['chk_custom_field'] ) ) {
                        $chk_custom_field = $chk_custom_field_mapping['chk_custom_field'];
                        if($key === 'chk_custom_fields_'.$chk_custom_field ){
                            unset($args['options'][0]);
                        }
                    }
                } else {
                    $chk_custom_field_mapping = $this->inmedwdm_get_custom_field_enabled( $product_variation_in_cart );
                    if ( ! empty( $chk_custom_field_mapping ) && ! empty( $chk_custom_field_mapping['related_course'] ) && ! empty( $chk_custom_field_mapping['chk_custom_field'] ) ) {
                        $chk_custom_field = $chk_custom_field_mapping['chk_custom_field'];
                        if($key === 'chk_custom_fields_'.$chk_custom_field ){
                            unset($args['options'][0]);
                        }
                    }
                }
            }
            return $args;
        }
    }
}
