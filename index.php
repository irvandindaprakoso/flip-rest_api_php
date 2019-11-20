<?php 
	include_once("controllers/Controller.php");
	$controller = new Controller();
	if(!isset($_GET['page']))
	{
		$controller->index();
	}
	else
	{
		switch($_GET['page'])
		{
			case 'home' : 
				$controller->index();
				break;
			
			case 'store' :
				$controller->store();
				break;
			case 'show-data' :
				$controller->getData();
                break;
            case 'detail-data':
                $controller->getDetailData();
				break;
			default : 
				$controller->index();
				break;
		}
	}
?>