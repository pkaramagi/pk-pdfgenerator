<?php 

class Pk_Pdfgenerator_Activator{

    /**
     * function runs on plugin activation
     */
    public static function activate(){
        //check if current uer can create plugins
        if(!current_user_can('activate_plugins')){
            return;

        }else{
            //create plugin page
            self::create_plugin_page();
        }


    }

    /*
     *
     * */
    public static function create_plugin_page(){

        $page_title = null;
        $page_content = null;
        $page_check = get_page_by_title($page_title);
        $current_user = wp_get_current_user();
        $page = array(

            'post_type' => 'page',
            'post_title' => $page_title,
            'post_content' => $page_content,
            'post_author' => $current_user
        );

        if(!isset($page_check->ID)){
            //create plugin page
            wp_insert_post($page);
        }

    }

}