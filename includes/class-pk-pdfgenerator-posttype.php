<?php 
/* Registers plugin post type and defines function for creating plugin post type posts*/
class Pk_Pdfgenerator_Posttype {

    /**
     * a string containing name of plugin post type
     * @since    1.0.0
     */

    protected $post_type = 'pk-pdfgen';


    /**
     * create plugin post type
     * @since 1.0.0
     */
    public function create_post_type(){
        $post_type  = $this->post_type;
        $post_type_args = array(
            'labels' => array(
                'name'=> __('Pk Pdf Generator Logs'),
                'singular_name' => __('Pk Pdf Generator Logs'),
            ),
            'public'=>true,
            'has_archive'=>false,
            'show_in_menu'=>true,
            'capability_type' => 'post',
            'capabilities' => array(
                'create_posts' => 'do_not_allow', // prevent users from creating plugin logs from admin side
            ),
            'map_meta_cap' => false, // users are not allowed to edit/delete existing logs

        );

        register_post_type($post_type,$post_type_args);
    }

    /**
     * create plugin logs
     * @since 1.0.0
     */

    public function add_post(){

        if ( isset( $_POST['pk-pdfgen-form'] ) ) {
            $url = $_POST['url'];

            //only capture user submitted url
            $title = $content = $url;

            $post_data = array (
                'post_type' => $this->post_type,
                'post_title' => $title,
                'post_content' => $content,
                'post_status' => 'publish',
                'comment_status' => 'closed',
                'ping_status' => 'closed',
             );

            wp_insert_post($post_data);
        }



    }

    /**
     * @return string of plugin post type
     * @since 1.0.0
     */
    public function getPostType()
    {
        return $this->post_type;
    }

}

?>