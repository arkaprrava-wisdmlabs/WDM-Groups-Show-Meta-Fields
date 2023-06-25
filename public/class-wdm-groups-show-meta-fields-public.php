<?php
if(!class_exists('WDM_Groups_Show_Meta_Fields_Public')){
    class WDM_Groups_Show_Meta_Fields_Public{
        public function wdm_show_custom_fields($order){
            $order_id = THWCFD_Utils::get_order_id( $order );
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
    }
}