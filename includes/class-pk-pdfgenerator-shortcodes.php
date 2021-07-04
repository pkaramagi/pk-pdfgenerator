<?php
/*Generates plugin shortcodes*/

class Pk_Pdfgenerator_Shortcodes
{
    /**
     *
     */
    public function pk_pdfgen_shortcode(){
        add_shortcode('pk_pdfgen', array($this, 'create_pk_pdfgen_shortcode'));
    }

    /**
     * handler for pdf generator and download shortcode
     * @return string
     * @since 1.0.0
     */

    public function create_pk_pdfgen_shortcode(){

        $form_url = get_the_permalink();
        $shortcode_content = <<<EOL

            <form method = "post" action="$form_url" target="" id="pk-pdfgen-form">
                <input type="hidden" name="pk-pdfgen-form" value="1"/>
                <input type="url" pattern="https?://.+" required name="url" title="Include http://"/>
                <input type="submit" name="" value="Download Pdf File">
            </form>

EOL;

return $shortcode_content;
    }


}

