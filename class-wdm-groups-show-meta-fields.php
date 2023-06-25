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
        protected $plugin_dir_url;
        public function __construct($plugin_dir_url){
            $this->plugin_dir_url = $plugin_dir_url;
            $this->define_admin_hooks();
            $this->define_public_hooks();
        }
        public function define_admin_hooks(){
            require_once $this->plugin_dir_url.'admin\class-wdm-groups-show-meta-fields-admin.php';
            $admin = new WDM_Groups_Show_Meta_Fields_Admin();
        }
        public function define_public_hooks(){
            require_once $this->plugin_dir_url.'public\class-wdm-groups-show-meta-fields-public.php';
            $public = new WDM_Groups_Show_Meta_Fields_Public();
        }
    }
}
new WDM_Groups_Show_Meta_Fields(plugin_dir_url( __FILE__ ));