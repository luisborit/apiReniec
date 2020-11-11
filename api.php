<?php
use Peru\Http\ContextClient;
use Peru\Jne\{Dni, DniParser};

require __DIR__ . './vendor/autoload.php';

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$token = "muniILO";
$data = file_get_contents("php://input");
$data = json_decode($data);
// print_r($data);
if ($data->token == $token) {
    switch ($data->action) {
        case 'reniec':
            $cs = new Dni(new ContextClient(), new DniParser());
			$person = $cs->get($data->document);
            print_r($person);
            break;
        
        default:
            echo "NO";
            break;
    }
}

?>