<?php
/**
 * Fired during plugin activation
 *
 * @since      1.0.0
 *
 * @package    Pk_Pdfgenerator
 * @subpackage Pk_Pdfgenerator/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code needed to run during  plugin's activation.
 *
 * @since      1.0.0
 * @package    Pk_Pdfgenerator
 * @subpackage Pk_Pdfgenerator/includes
 * @author     Phillip Karamagi <pkaramagi1@gmail.com>
 */

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


	/**
     * create plugin page on plugin activation
     *
     * @since    1.0.0
     *
     */

    public static function create_plugin_page(){

        $page_title = PK_PDFGENERATOR_PLUGIN_NAME;

        //set page content as plugin shortcode
        $page_content = '[pk_pdfgen]';
        //get current user, as page author

        $current_user = wp_get_current_user();

        //prepare plugin page args
        $page = array(
            'post_type' => 'page',
            'post_title' => $page_title,
            'post_content' => $page_content,
            'post_status' => 'publish',
            'post_author' => $current_user->ID
        );

            //create plugin page
            $page_id = wp_insert_post($page);

            //keep track of plugin page id
            update_option( 'pk-pdf-gen-page', $page_id );

    }



}