<?php

	require_once 'DbConnect.php';

	$response = array();

	if(isset($_GET['apicall'])){

		switch($_GET['apicall']){

			case 'addpackage':

    if (isTheseParametersAvailable(array(
        'order_id',
        'cust_id',
        'item_id',
		'item_q',
    )))
    {
        $order_id = $_POST['order_id'];
        $cust_id = $_POST['cust_id'];
        $item_id = $_POST['item_id'];
		$item_q = $_POST['item_q'];
        $status = "Placed";
        $statuscode = 0;

        try{
        $stmt = $conn->prepare("INSERT INTO orders (order_id, cust_id, item_id, item_q) VALUES ( ?, ?, ?, ?)");

        $stmt->bind_param("ssss", $order_id, $cust_id, $item_id, $item_q);


        if ($stmt->execute())
        {
            $response['error'] = false;
            $response['message'] = 'Package added successfully';
        }else{
        	$response['error'] = true;
            $response['message'] = 'Package addition failed';
        }
        }catch (Exception $e) {
    	echo 'Caught exception: ',  $e->getMessage(), "\n";
}


    }
    else
    {
        $response['error'] = true;
        $response['message'] = 'required parameters are not available';
    }
break;
	default:
				$response['error'] = true;
				$response['message'] = 'Invalid Operation Called';
		}
}
else
{
    $response['error'] = true;
    $response['message'] = 'Invalid API Call';
}

echo json_encode($response);

function isTheseParametersAvailable($params)
{

    foreach ($params as $param)
    {
        if (!isset($_POST[$param]))
        {
            return false;
        }
    }
    return true;
}
