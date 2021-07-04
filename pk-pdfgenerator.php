<?php

/*
Plugin Name: PK PDF Generator
Plugin URI: https://github.com/bftech-pdf-generator
Description: Used to generate a downloadable pdf file from url
Version: 1.0.0
Author: Phillip Karamagi
Author URI: https:://github.com/pkaramagi
License: GPLv2 or later
Text Domain: pk-pdf-generator

*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2021 Phillip Karamagi.
*/

/**
* define plugin version
*/
define('PK_PDFGENERATOR_VERSION','1.0.0');
define('PK_PDFGENERATOR_PLUGIN_NAME','pk-pdfgenerator');
/**
* define plugin directory path
*/
define('PK_PDFGENERATOR_PLUGIN_DIR', plugin_dir_path( __FILE__ ));


/**
 * this function runs on plugin activation
 * documentation can be found in includes/class-pk-pdfgenerator-activator.php
 */

function activate_pk_pdfgenerator(){
    require_once PK_PDFGENERATOR_PLUGIN_DIR.'includes/class-pk-pdfgenerator-activator.php';
    Pk_Pdfgenerator_Activator::activate();

}

/**
 * this function executes on plugin deactivation
 * documentation can be found in includes/class-pk-pdfgenerator-deactivator.php
 */

 function deactivate_pk_pdfgenerator(){
    require_once PK_PDFGENERATOR_PLUGIN_DIR.'includes/class-pk-pdfgenerator-deactivator.php';
    Pk_Pdfgenerator_Deactivator::deactivate();
 }



register_activation_hook( __FILE__, 'activate_pk_pdfgenerator'); 
register_deactivation_hook( __FILE__, 'deactivate_pk_pdfgenerator' ) ;


require PK_PDFGENERATOR_PLUGIN_DIR. 'includes/class-pk-pdfgenerator.php';


/**
 * Begins execution of the plugin.
 * @since    1.0.0
 */
function start_pk_pdfgenerator(){
    $plugin = new Pk_Pdfgenerator();
    $plugin->run();
}

start_pk_pdfgenerator();
?>