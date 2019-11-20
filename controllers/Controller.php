<?php
include_once("models/Model.php");

class Controller {
	public $model;
	
	public function __construct()  
    {  
        $this->model = new Model();
    } 
	
	public function index()	{
		require_once('views/index.php');
	}

	function store(){ 
		$params = [
			"account_number" =>$_POST['account_number'],
			"bank_code" => $_POST['bank_code'],
			"amount" =>$_POST['amount'],
			"remark" =>$_POST['remark'],
		];
		$this->model->storeData($params);
		$this->index(); 
		// require_once('views/page-disburse.php');

	}

	function getData(){
		$rs = $this->model->showData();
		require_once('views/page-disburse.php');
	}

	function getDetailData(){
		$rs = $this->model->showDataDetail($_GET['id']);
		require_once('views/page-detail-disburse.php');
	}
}
?>