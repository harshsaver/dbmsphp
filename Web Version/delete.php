<?php

require_once 'DbConnect.php';

$response = array();

if (isset($_GET['apicall']))
{

    switch ($_GET['apicall'])
    {
        case 'deletecust':

            if (isTheseParametersAvailable(array(
                'id'
            )))
            {
                $id = $_POST['id'];

                $stmt = $conn->prepare("DELETE FROM customer WHERE cust_id = ?");
                $stmt->bind_param("s", $id);

                if ($stmt->execute())
                {

                    $response['error'] = false;
                    $response['message'] = 'User profile deleted successfully';

                }
                else
                {
                    $response['error'] = true;
                    $response['message'] = 'User profile deletion failed';
                }

            }
            else
            {
                $response['error'] = true;
                $response['message'] = 'required parameters are not available';
            }
		case 'deleteitem':

            if (isTheseParametersAvailable(array(
                'id'
            )))
            {
                $id = $_POST['id'];

                $stmt = $conn->prepare("DELETE FROM items WHERE item_id = ?");
                $stmt->bind_param("s", $id);

                if ($stmt->execute())
                {

                    $response['error'] = false;
                    $response['message'] = 'User profile deleted successfully';

                }
                else
                {
                    $response['error'] = true;
                    $response['message'] = 'User profile deletion failed';
                }

            }
            else
            {
                $response['error'] = true;
                $response['message'] = 'required parameters are not available';
            }
		case 'deleteware':

            if (isTheseParametersAvailable(array(
                'id'
            )))
            {
                $id = $_POST['id'];

                $stmt = $conn->prepare("DELETE FROM warehouse WHERE ware_id = ?");
                $stmt->bind_param("s", $id);

                if ($stmt->execute())
                {

                    $response['error'] = false;
                    $response['message'] = 'User profile deleted successfully';

                }
                else
                {
                    $response['error'] = true;
                    $response['message'] = 'User profile deletion failed';
                }

            }
            else
            {
                $response['error'] = true;
                $response['message'] = 'required parameters are not available';
            }
			
		case 'deletesupp':

            if (isTheseParametersAvailable(array(
                'id'
            )))
            {
                $id = $_POST['id'];

                $stmt = $conn->prepare("DELETE FROM supplier WHERE supp_id = ?");
                $stmt->bind_param("s", $id);

                if ($stmt->execute())
                {

                    $response['error'] = false;
                    $response['message'] = 'User profile deleted successfully';

                }
                else
                {
                    $response['error'] = true;
                    $response['message'] = 'User profile deletion failed';
                }

            }
            else
            {
                $response['error'] = true;
                $response['message'] = 'required parameters are not available';
            }
			
		case 'deletemanu':

            if (isTheseParametersAvailable(array(
                'id'
            )))
            {
                $id = $_POST['id'];

                $stmt = $conn->prepare("DELETE FROM manufacturer WHERE manu_id = ?");
                $stmt->bind_param("s", $id);

                if ($stmt->execute())
                {

                    $response['error'] = false;
                    $response['message'] = 'User profile deleted successfully';

                }
                else
                {
                    $response['error'] = true;
                    $response['message'] = 'User profile deletion failed';
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

