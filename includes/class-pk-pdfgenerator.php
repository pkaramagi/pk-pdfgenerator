<?php

class Pk_Pdfgenerator{

    /**
     *
     * @var      Pk_Pdfgenerator_Loader    $loader    Maintains and registers all hooks for the plugin.
     */
    protected $loader;
    protected $post_type;
    /**
     * The unique identifier of this plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $plugin_name    The string used to uniquely identify this plugin.
     */
    protected $plugin_name;

    /**
     * The current version of the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $version    The current version of the plugin.
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function __construct() {
        if ( defined( 'PK_PDFGENERATOR_VERSION' ) ) {
            $this->version = PK_PDFGENERATOR_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        if ( defined( 'PK_PDFGENERATOR_PLUGIN_NAME' ) ) {
            $this->plugin_name = PK_PDFGENERATOR_PLUGIN_NAME;
        }else{
            $this->plugin_name = 'pk-pdfgenerator';
        }

        $this->load_dependencies();
        $this->load_plugin_scripts();
        $this->load_plugin_post_type();
        $this->load_plugin_shortcodes();
        $this->process_plugin_form();
    }

    public function load_dependencies(){
        /**
         * The class responsible for orchestrating the actions and filters of the
         * core
         */

        require_once PK_PDFGENERATOR_PLUGIN_DIR. 'includes/class-pk-pdfgenerator-loader.php';

        /**
         * The class responsible for creating plugin custom post type
         */
        require_once PK_PDFGENERATOR_PLUGIN_DIR. 'includes/class-pk-pdfgenerator-posttype.php';
        /**
         * The class responsible for creating shortcodes
         */
        require_once PK_PDFGENERATOR_PLUGIN_DIR. 'includes/class-pk-pdfgenerator-shortcodes.php';

        /**
         * The class responsible for handling plugin scripts: css and javascript
         */
        require_once PK_PDFGENERATOR_PLUGIN_DIR. 'public/class-pk-pdfgenerator-public.php';


        $this->loader = new Pk_Pdfgenerator_Loader();
        $this->post_type = new Pk_Pdfgenerator_Posttype();

    }

    /**
     * handle form submission from shortcode
     * @since 1.0.0
     */

    public function process_plugin_form(){
        $this->loader->add_action('init',$this->post_type,'add_post');
    }


    /*
     * handle post type creation
     * @since 1.0.0
     */

    public function load_plugin_post_type(){
        $post_type = new Pk_Pdfgenerator_Posttype();
        $this->loader->add_action('init',$this->post_type, 'create_post_type');
    }


    /*
     * handle plugin shortcode creation
     * @since 1.0.0
     */

    public function load_plugin_shortcodes(){
        $shortcodes = new Pk_Pdfgenerator_Shortcodes();
        $this->loader->add_action('init',$shortcodes, 'pk_pdfgen_shortcode');
    }

    /*
     * handle plugin script loading
     * @since 1.0.0
     */


    private function load_plugin_scripts() {

        $plugin_public = new Pk_Pdfgenerator_Public( $this->get_plugin_name(), $this->get_version() );
        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since     1.0.0
     * @return    Pk_Pdfgenerator_Loader    Orchestrates the hooks of the plugin.
     */
    public function get_loader() {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since     1.0.0
     * @return    string    The version number of the plugin.
     */
    public function get_version() {
        return $this->version;
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since     1.0.0
     * @return    string    The name of the plugin.
     */
    public function get_plugin_name() {
        return $this->plugin_name;
    }

    public function run(){
        $this->loader->run();
    }
}

?>