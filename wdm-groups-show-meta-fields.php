<?php
/**
 * @wordpress-plugin
 * Plugin Name:       WDM Groups Show Meta Fields
 * Plugin URI:        https://github.com/arkaprrava-wisdmlabs/WDM-Groups-Show-Meta-Fields.git
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Arkaprava
 * Author URI:        https://arkaprava.wisdmlabs.net/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wdm-gsm
 */
if(!class_exists('WDM_Groups_Show_Meta_Fields')){
    class WDM_Groups_Show_Meta_Fields{
        /**
         * defines plugin directory path
         *
         * @var [type]
         */
        protected $plugin_dir_path;
        /**
         * defines plugin name
         *
         * @var [type]
         */
        protected $plugin_name;
        /**
         * defines class variables
         *
         * @param [type] $plugin_dir_path
         * @param [type] $plugin_name
         */
        public function __construct($plugin_dir_path, $plugin_name){
            $this->plugin_dir_path = $plugin_dir_path;
            $this->plugin_name = $plugin_name;
            $this->define_admin_hooks();
            $this->define_public_hooks();
        }
        /**
         * defines admin hooks
         *
         * @return void
         */
        public function define_admin_hooks(){
            require_once $this->plugin_dir_path.'admin\class-wdm-groups-show-meta-fields-admin.php';
            $admin = new WDM_Groups_Show_Meta_Fields_Admin($this->plugin_name);
            add_action( 'admin_init',array( $admin, 'wdm_has_dependencies' ) , 10, 0);
            add_action( 'woocommerce_email_order_meta_fields', array( $admin, 'wdm_add_email_order_meta_fields' ), 20, 3 );
        }
        /**
         * defines public hooks
         *
         * @return void
         */
        public function define_public_hooks(){
            require_once $this->plugin_dir_path.'public\class-wdm-groups-show-meta-fields-public.php';
            $public = new WDM_Groups_Show_Meta_Fields_Public();
            add_action( 'thwcfd_order_details_after_custom_fields_table', array( $public, 'wdm_show_custom_fields' ), 20, 1 );
            add_filter( 'woocommerce_form_field_args', array($public, 'wdm_change_demo_field_options'), 10, 3 );
        }
    }
}
new WDM_Groups_Show_Meta_Fields(plugin_dir_path( __FILE__ ), plugin_basename( __FILE__ ));
