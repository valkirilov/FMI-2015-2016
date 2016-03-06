<?php

/*
 * Add your classes here
 */

class Request {

    protected $server;

    public function __construct($serverDetails) {
        $this->server = $serverDetails;
    }

    public function getMethod() {
        return strtolower($this->server['REQUEST_METHOD']);
    }

    public function getPath() {
        return parse_url($this->server['REQUEST_URI'])['path'];
    }

    public function getUrl() {
        return $this->server['REQUEST_URI'];
    }

    public function getUserAgent() {
        return $this->server['HTTP_USER_AGENT'];
    }

}

class GetRequest extends Request {

    public function getData() {
        $array = array();
        parse_str($this->server['QUERY_STRING'], $array);
        return json_encode($array);
    }
}
