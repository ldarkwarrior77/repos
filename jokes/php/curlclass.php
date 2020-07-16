<?php

abstract class Curl {

    protected $url;

    private function setUrl($url) {
        $this->url = $url;
    }

    function __construct($url) {
        $this->setUrl($url);
    }

    abstract protected function createCurlHandle();

    abstract protected function curlDel($params = "");

    abstract protected function curlPut();

    abstract protected function curlPost ($params = "");

    abstract protected function curlGet($params = "");

    abstract protected function execCurl($ch);

    abstract protected function parseResponse($result);

}

?>