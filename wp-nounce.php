
<?php

namespace Chris\WPNounce;

/**
 * WP_Nounce Implementation
 * 
 */
class Nounce {

    /**
     * attributes
     * 
     */
    protected $action;
    protected $name;
    protected $time;
    protected $actionurl = '';
    protected $referer = 'false';
    protected $echo = ' false';

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

    public function set_time( $time ) {
        $this->time = $time;
    }

    public function get_time() {
        return $this->time;
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

    public function __construct( $action = '-1', $name = '_wpnonce') {
        $this->set_action( $action );
        $this->set_name( $name );
    }

    public function nonce_url() {
        return wp_nonce_url( $this->get_actionurl(), $this->get_action(), $this->get_name() );
    }

    public function nonce_field() {
        return wp_nonce_field( $this->get_action(), $this->get_name(), $this->get_referer(), $this->get_echo() );
    }

    public function value() {
        return wp_create_nonce( $this->get_action() );
    }

    public function ays() {
        return wp_nonce_ays( $this->get_action() );
    }

}


