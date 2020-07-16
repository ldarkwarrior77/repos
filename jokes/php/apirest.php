<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("curlclass.php");
var_dump("asdasdasd2");die;
class ApiRest extends Curl{

    function __construct($url) {
        parent::__construct($url);
    }

    protected function createCurlHandle() {
        if (false === $curl = curl_init()) {
            throw new ClientException('Unable to create a new cURL handle');
        }

        $ch = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        return $curl;
    }

    function curlDel($params = "") {

        $ch = self::createCurlHandle();

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

        if($params != "") {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        }

        curl_setopt($ch, CURLOPT_URL,$this->url);

        return $this->execCurl($ch);
    }


    function curlPut() {
        $ch = self::createCurlHandle();

        curl_setopt($ch, CURLOPT_PUT, true);

        if($params != "") {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        }

        return $this->execCurl($ch);

    }

    function curlPost($params = "") {

        $ch = self::createCurlHandle();

        curl_setopt($ch, CURLOPT_POST, TRUE);

        if($params != "") {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        }

        return $this->execCurl($ch);
    }


    function curlGet($params = "") {

        if($params != "") {
            $this->url .= '?' . http_build_query($params);
        }

        $ch = self::createCurlHandle();

        curl_setopt($ch, CURLOPT_URL,$this->url);

        return $this->execCurl($ch);
    }

    function execCurl($ch) {
        $result = curl_exec($ch);
        curl_close($ch);
        return $this->parseResponse($result);
    }

    function parseResponse($result) {
        return json_decode($result);;
    }

}



?>
