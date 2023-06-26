<?php
if(!class_exists('WDM_Groups_Show_Meta_Fields_Admin')){
    class WDM_Groups_Show_Meta_Fields_Admin{
        /**
         * defines plugin name
         *
         * @var [type]
         */
        protected $plugin_name;
        /**
         * defines class variables
         *
         * @param [type] $plugin_name
         */
        public function __construct($plugin_name){
            $this->plugin_name = $plugin_name;
        }
        /**
         * checks for the dependency plugins
         *
         * @return void
         */
        public function wdm_has_dependencies() {
            if ( is_admin() && current_user_can( 'activate_plugins' ) &&  (!is_plugin_active('wdm-customization/wdm-customization.php'))) {
                add_action( 'admin_notices',array( $this, 'wdm_admin_notice' ), 10, 0);

                deactivate_plugins( $this->plugin_name ); 

                if ( isset( $_GET['activate'] ) ) {
                    unset( $_GET['activate'] );
                }
            }
        }
        /**
         * echo out the admin notice on call
         *
         * @return void
         */
        public function wdm_admin_notice(){
            ?><div class="error"><p><?php _e( 'Sorry, but WDM Groups Show Meta Fields Plugin requires the Checkout Field Editor for WooCommerce and WDM Customization both plugins to be installed and active.' ); ?></p></div><?php
        }
        /**
         * add custom field to email content for the order
         *
         * @param [type] $fields
         * @param [type] $sent_to_admin
         * @param [type] $order
         * @return void
         */
        public function wdm_add_email_order_meta_fields( $fields, $sent_to_admin, $order ) {
            $order_id = $order->ID;
            $group_arr = get_post_meta( $order_id, 'inmedwdm_user_register_group', true );
            $val = 0;
            foreach( $group_arr as $key => $value ){
                $val = $value;
            }
            if( $val > 0 ){
                $fields['demo_field'] = array(
                    'label' => __('Demo Field', 'wdm_gsm'),
                    'value' => get_the_title($val)
                );
            }
            return $fields;
        }
    }
}
