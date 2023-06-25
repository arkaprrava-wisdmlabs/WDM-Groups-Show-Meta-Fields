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
        public function __construct(){
            
        }
        public function define_admin_hooks(){

        }
        public function define_public_hooks(){

        }
    }
}
new WDM_Groups_Show_Meta_Fields();