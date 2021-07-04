<?php 

class Pk_Pdfgenerator_Deactivator{

    //runs on plugin deactivation
    public static function deactivate(){
        self::delete_plugin_page();
    }

    /**
     * delete plugin page on plugin deactivation
     *
     * @since    1.0.0
     *
     */

    public static function delete_plugin_page(){
        $plugin_page_id = get_option('pk-pdf-gen-page');
        wp_delete_post($plugin_page_id, true);

    }
    
}