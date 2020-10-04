<?php 

	require_once 'DbConnect.php';
	
	$response = array();
	
	if(isset($_GET['apicall'])){
		
		switch($_GET['apicall']){
			
			case 'additem':

    if (isTheseParametersAvailable(array(
        'item_name',
        'item_q',
        'item_price',
    )))
    {
        $item_name = $_POST['item_name'];
        $item_q = $_POST['item_q'];
        $item_price = $_POST['item_price'];
      

        try{
        $stmt = $conn->prepare("INSERT INTO items (item_name, item_q,item_price) VALUES ( ?, ?, ?)");

        $stmt->bind_param("sss", $item_name, $item_q, $item_price);


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

