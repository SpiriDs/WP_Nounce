
<?php

namespace Christian\WPNonce;

/**
 * @package Christian\WPNonce
 * @version 1.0
 * 
 */
class Nonce {

    /**
     * attributes
     * 
     */
    protected $action;          //String default '-1'
    protected $name;            //String default '_wpnonce'
    protected $nonce;
    protected $actionurl = '';
    protected $referer = 'false';
    protected $echo = ' false';
    
    /**
     * 
     * Getter and Setter for the attributes
     * 
     * @param string $action Default with constructor = '-1'
     * @param string $name Default with constructor = '_wpnonce'
     */
    
    public function set_action( $action ) {
        $this->action = $action;
    }

    public function get_action() {
        return $this->action;
    }

    public function set_name( $name ) {
        $this->name = $name;
    }

    public function get_name() {
        return $this->name;
    }

    public function set_nonce( $nonce ) {
        $this->nonce = $nonce;
    }

    public function get_nonce() {
        return $this->nonce;
    }
    
    public function set_actionurl( $actionurl ) {
        $this->url = trim( $actionurl );
    }

    public function get_actionurl() {
        return $this->actionurl;
    }

    public function set_referer( $referer ) {
        $this->referer = ( $referer );
    }

    public function get_referer() {
        return $this->referer;
    }

    public function set_echo( $echo ) {
        $this->echo = ( $echo );
    }

    public function get_echo() {
        return $this->echo;
    }

    /**
     * 
     * @param type $action
     * @param type $name
     */
    
    
    public function __construct( $action = '-1', $name = '_wpnonce') {
        $this->set_action( $action );
        $this->set_name( $name );
    }
    
    /**
     * 
     * @return type
     */

    public function nonce_url() {
        return wp_nonce_url( $this->get_actionurl(), $this->get_action(), $this->get_name() );
    }
    
    /**
     * 
     * @return type
     */
    
    public function nonce_field() {
        return wp_nonce_field( $this->get_action(), $this->get_name(), $this->get_referer(), $this->get_echo() );
    }

    public function value() {
        $nonce = wp_create_nonce( $this->get_action() );
        $this->set_nonce( $nonce );
    }

    public function ays() {
        return wp_nonce_ays( $this->get_action() );
    }
    
    public function verify() {
        return wp_verify_nonce( $this->get_nonce(), $this->get_action() );
    }

}


