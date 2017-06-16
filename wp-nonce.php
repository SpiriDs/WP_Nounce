
<?php

/**
 * @package Christian\WPNonce
 * @version 1.0
 * 
 */

namespace Christian\WPNonce;

class Nonce {

    /**
     * Class attributes
     * 
     */
    protected $action = '';          // default by constructor '-1'
    protected $name = '';            // default by constructor '_wpnonce'
    protected $actionurl = '';
    protected $referer = 'false';
    protected $echo = ' false';
    protected $query_arg = 'false';
    protected $die = 'true';
    
    
    /**
     * 
     * @param type $action (string)
     */
    public function set_action( $action ) {
        $this->action = $action;
    }
    
    public function get_action() {
        return $this->action;
    }

    /**
     * 
     * @param type $name (string)
     */
    public function set_name( $name ) {
        $this->name = $name;
    }

    public function get_name() {
        return $this->name;
    }
    
    /**
     * 
     * @param type $actionurl (string)
     */
    public function set_actionurl( $actionurl ) {
        $this->url = trim( $actionurl );
    }

    public function get_actionurl() {
        return $this->actionurl;
    }

    /**
     * 
     * @param type $referer (string)
     */
    public function set_referer( $referer ) {
        $this->referer = $referer;
    }

    public function get_referer() {
        return $this->referer;
    }

    /**
     * 
     * @param type $echo (string)
     */
    public function set_echo( $echo ) {
        $this->echo = $echo;
    }

    public function get_echo() {
        return $this->echo;
    }
    
    /**
     * 
     * @param type $query_arg (string)
     */
    public function set_query_arg( $query_arg ) {
        $this->query_arg = $query_arg;
    }

    public function get_query_arg() {
        return $this->query_arg;
    }
    
    /**
     * 
     * @param type $die (string)
     */
    public function set_die( $die ) {
        $this->die = $die;
    }

    public function get_die() {
        return $this->die;
    }

    /**
     * Constructor to set $action and $name to default
     * @param type (string)
     * @param type (string)
     */
    public function __construct( $action = '-1', $name = '_wpnonce') {
        $this->set_action( $action );
        $this->set_name( $name );
    }
    
    /**
     * Retrieve URL with nonce added to URL query.
     * https://codex.wordpress.org/Function_Reference/wp_nonce_url
     * @return type (string) 
     */
    public function nonce_url() {
        return wp_nonce_url( $this->get_actionurl(), $this->get_action(), $this->get_name() );
    }
    
    /**
     * Retrieves or displays the nonce hidden form field.
     * https://codex.wordpress.org/Function_Reference/wp_nonce_field
     * @return type (string)
     */
    public function nonce_field() {
        return wp_nonce_field( $this->get_action(), $this->get_name(), $this->get_referer(), $this->get_echo() );
    }
    
    /**
     * Generates and returns a nonce.
     * https://codex.wordpress.org/Function_Reference/wp_create_nonce
     * @return type (string)
     */
    public function create() {
        return wp_create_nonce( $this->get_action() );
    }

    /**
     * Display 'Are you sure you want to do this?' message to confirm the action being taken.
     * https://codex.wordpress.org/Function_Reference/wp_nonce_ays
     * @return type (void)
     */
    public function ays() {
        return wp_nonce_ays( $this->get_action() );
    }
    
    /**
     * Verify that a nonce is correct and unexpired with the respect to a specified action.
     * https://codex.wordpress.org/Function_Reference/wp_verify_nonce
     * @param type $nonce (string)
     * @param type $action (string/integer)
     * @return type (boolean/integer)
     */
    public function verify( $value ) {
        return wp_verify_nonce( $value, $this->get_action() );
    }
    
    /**
     *Tests either if the current request carries a valid nonce, 
     * or if the current request was referred from an administration screen.
     * https://codex.wordpress.org/Function_Reference/check_admin_referer 
     * @return type (boolean)
     */
    public function verify_admin() {
        return check_admin_referer( $this->get_action(), $this->get_name() );
    }
    
    /**
     * The function verifies the AJAX request
     * https://codex.wordpress.org/Function_Reference/check_ajax_referer
     * @return type (boolean)
     */
    public function verify_ajax() {
        return check_ajax_referer( $this->get_action(), $this->get_name(), $this->query_arg(), $this->get_die() );
    }
    
    /**
     * Retrieves or displays the referer hidden form field.
     * https://codex.wordpress.org/Function_Reference/wp_referer_field
     * @return type (string)
     */
    public function referer_field() {
        return wp_referer-field( $this->get_echo() );
    }
}
