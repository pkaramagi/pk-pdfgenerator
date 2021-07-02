<?php 
/*

*/

/**
 * Current Plugin Version
 * version: 1.0.0
 */
define('PK_PDFGENERATOR_VERSION','1.0.0');

/**
 * this function executes on plugin activation
 */

function activate_pk_pdfgenerator(){
    require_once plugin_dir_path( __FILE__ ).'includes/class-pk-pdfgenerator-activator.php';
    Pk_Pdfgenerator_Activator::activate();
}

/**
 * this function executes on plugin deactivation
 */

 function deactivate_pk_pdfgenerator(){
    require_once plugin_dir_path( __FILE__ ).'includes/class-pk-pdfgenerator-deactivator.php';
    Pk_Pdfgenerator_Deactivator::deactivate();
 }

/**
 * 
 * */

register_activation_hook( __FILE__, 'activate_pk_pdfgenerator'); 
register_deactivation_hook( __FILE__, 'deactivate_pk_pdfgenerator' ) ;

?>