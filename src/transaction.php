
<?php


/**
*
*/
class Mpesa
{
  public $baseUrl = "https://linkoi.site";
  /**
  *
  */
  public function __construct($config = []) {
    // code...
  }
  public function c2b($params = []) {
    $dados = [
      "numero" => $params["numero"],
      "preco" => $params["valor"],
      "reference" => $params["referencia"]
    ];
    $endPoint = "/Mpesa/c2bTeste.php";
    $url = $this->baseUrl.$endPoint;
    return $this->makeRequest($url, $dados);
  }
  public function b2c($params = []) {
    $dados = [
      "numero" => $params["numero"],
      "preco" => $params["valor"],
      "reference" => $params["referencia"]
    ];
    $endPoint = "/Mpesa/b2cTeste.php";
    $url = $this->baseUrl.$endPoint;
    return $this->makeRequest($url, $dados);
  }
  public function makeRequest($url, $data) {
    /*
    $options = [
      'http_errors' => false,
      'headers' => $this->getHeaders(),
      'verify' => true,
      'json' => $data
    ];*/

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    /*curl_setopt($curl, CURLOPT_HTTPHEADER, $this->getHeaders());*/
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    $result = curl_exec($curl);
    $resposta = json_decode($result, true);
   // return new response($resposta);
    return $result;

  }
}

class response {
  
  public function __construct($response){

    $this->code = $response["output_ResponseCode"];
    $this->descricao = $response['output_ResponseDesc'];

    $this->TransactionID = $response['output_TransactionID'];
    $this->conversationID = $response['output_ConversationID'];
    $this->Estado = $response['output_ResponseTransactionStatus'];
  }

  public function getCode(): string
  {
    return $this->code;
  }

  public function getDescription(): string
  {
    return $this->descricao;
  }

  public function getTransactionID(): string
  {
    return $this->TransactionID;
  }

  public function getConversationID(): string
  {
    return $this->conversationID;
  }

  public function getTransactionStatus(): string
  {
    return $this->transaction_status;
  }


}

?>