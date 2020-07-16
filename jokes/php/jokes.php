<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("apirest.php");

Class Jokes {
    var $api = "";
    var $offset = 0;
    var $limit = 0;

    function __construct($post) {
        $this->api = new ApiRest("api.icndb.com/jokes/");

        if (isset($post['limit'])) {
            $this->limit = $post['limit'];
        }

        if (isset($post['offset'])) {
            $this->offset = $post['offset'];
        }

        if(isset($post['action'])) {

            if($post['action'] == "GET") {
                $params = isset($post['params']) ? $post['params']:"";
                $this->getData($params);
            }

        }

    }

    function getData($params = "") {

        $resp = $this->api->curlGet($params);

        $arrResp = (array)$resp;

        if(count($arrResp['value']) > $this->offset) {
            $values = array_slice($arrResp['value'], $this->offset, $this->limit);
            echo json_encode($values);
        } else {
            echo json_encode(array("No hay mas contenidos."));
        }
    }

}

$jj = new Jokes($_POST);

?>
