<?php
include_once("config/Connection.php");
include('environment/env.php');

class Model {
	function __construct()
	{
        $this->pdo = ConnectionDB::getInstance();
		
    }
	function storeData($params)
	{
		$API_URL = getenv("API_URL");
		$header = array(
			"Content-Type: application/x-www-form-urlencoded",
		);
		$result = self::post_request($params,$API_URL,$header);
		$result = json_decode($result); 	

		if (isset($result->status) === true) {
			$disburse_id 	= $result->id;
			$status 		= $result->status;
			$receipt 		= $result->receipt;
			$time_served 	= $result->time_served;
			$amount 		= $result->amount;
			$remark 		= $result->remark;
			$bank_code 		= $result->bank_code;
			$account_number = $result->account_number;
		}
		// $check_id = $this->pdo->query("SELECT disburse_id FROM disburse WHERE disburse_id =$disburse_id");
		// var_dump($check_id);
		// echo $check_id->rowCount();
		// if($check_id->rowCount()<1){
			$rs = $this->pdo->prepare("INSERT INTO disburse (
				amount, 
				status, 
				time_served, 
				bank_code, 
				account_number, 
				remark, 
				receipt, 
				disburse_id) 
			VALUES (
				:amount,
				:status,
				:time_served,
				:bank_code,
				:account_number,
				:remark,
				:receipt,
				:disburse_id)
			");
			$rs->bindParam(':amount',$amount);
			$rs->bindParam(':status',$status);
			$rs->bindParam(':time_served',$time_served);
			$rs->bindParam(':bank_code',$bank_code);
			$rs->bindParam(':account_number',$account_number);
			$rs->bindParam(':remark',$remark);
			$rs->bindParam(':receipt',$receipt);
			$rs->bindParam(':disburse_id',$disburse_id);
			$rs->execute();
		// }
		// else{
		// 	$rs = $this->pdo->prepare("UPDATE disburse SET
		// 		amount 			=:amount,
		// 		status 			=:status,
		// 		time_served 	=:time_served, 
		// 		account_number 	=:account_number, 
		// 		receipt			=:receipt
		// 		WHERE 
		// 		disburse_id =:disburse_id
		// 	");
		// 	$rs->bindParam(':amount',$amount);
		// 	$rs->bindParam(':status',$status);
		// 	$rs->bindParam(':time_served',$time_served);
		// 	$rs->bindParam(':account_number',$account_number);
		// 	$rs->bindParam(':receipt',$receipt);
		// 	$rs->bindParam(':disburse_id',$disburse_id);
		// 	$rs->execute();
		// }

		

	}

	function showData(){
		$rs = $this->pdo->query("SELECT * FROM disburse");
		return $rs;
	}

	function showDataDetail($transaction_id){
		$API_URL = getenv("API_URL");
		$header = array(
			"Content-Type: application/x-www-form-urlencoded",
		);
		$url = $API_URL.'/'.$transaction_id;
		$result = self::get_request($url,$header);
		$result = json_decode($result); 

		if (isset($result->status) === true) {
			$disburse_id 	= $result->id;
			$status 		= $result->status;
			$receipt 		= $result->receipt;
			$time_served 	= $result->time_served;
			$amount 		= $result->amount;
			$remark 		= $result->remark;
			$bank_code 		= $result->bank_code;
			$account_number = $result->account_number;
		}
		$rs = $this->pdo->prepare("UPDATE disburse SET
				amount 			=:amount,
				status 			=:status,
				time_served 	=:time_served, 
				account_number 	=:account_number, 
				receipt			=:receipt
				WHERE 
				disburse_id =:transaction_id
		");
		$rs->bindParam(':amount',$amount);
		$rs->bindParam(':status',$status);
		$rs->bindParam(':time_served',$time_served);
		$rs->bindParam(':account_number',$account_number);
		$rs->bindParam(':receipt',$receipt);
		$rs->bindParam(':transaction_id',$transaction_id);
		$rs->execute();
		$rs = $this->pdo->query("SELECT * FROM disburse WHERE disburse_id=".$transaction_id);
		return $rs->fetch();
	}

	public static function get_request($url,$header){
		$SECRET_KEY = getenv("SECRET_KEY");
		$ch = curl_init();	
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_USERPWD, $SECRET_KEY.":");
		$response = curl_exec($ch);
		curl_close($ch);
		return $response;
	}

	public static function post_request($param,$url,$header) {
		$SECRET_KEY = getenv("SECRET_KEY");
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($param));
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_USERPWD, $SECRET_KEY.":");
		$response = curl_exec($ch);
		curl_close($ch);
        return $response;
    }
}
?>