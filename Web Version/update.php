<?php

require_once 'DbConnect.php';

$response = array();

if (isset($_GET['apicall']))
{

    switch ($_GET['apicall'])
    {
        case 'updatecust':

            if (isTheseParametersAvailable(array(
                'name',
                'city',
                'cnumber',
                'id'
            )))
            {
                $name = $_POST["name"];
                $address = $_POST["city"];
                $cnumber = $_POST["cnumber"];
                $id = $_POST['id'];

                $stmt = $conn->prepare("UPDATE customer SET cust_name = ?, cust_ph = ?, cust_city = ? WHERE cust_id = ?");
                $stmt->bind_param("ssss", $name, $cnumber, $address, $id);

                if ($stmt->execute())
                {

                    $response['error'] = false;
                    $response['message'] = 'User profile updated successfully';

                }
                else
                {
                    $response['error'] = true;
                    $response['message'] = 'User profile updation failed';
                }

            }
            else
            {
                $response['error'] = true;
                $response['message'] = 'required parameters are not available';
            }
      
            case 'updateitem':

                      if (isTheseParametersAvailable(array(
                          'name',
                          'q',
                          'price',
                          'id'
                      )))
                      {
                          $name = $_POST["name"];
                          $q = $_POST["q"];
                          $price = $_POST["price"];
                          $id = $_POST['id'];

                          $stmt = $conn->prepare("UPDATE item SET item_name = ?, item_q = ?, item_price = ? WHERE item_id = ?");
                          $stmt->bind_param("ssss", $name, $q, $price, $id);

                          if ($stmt->execute())
                          {

                              $response['error'] = false;
                              $response['message'] = 'User profile updated successfully';

                          }
                          else
                          {
                              $response['error'] = true;
                              $response['message'] = 'User profile updation failed';
                          }

                      }
                      else
                      {
                          $response['error'] = true;
                          $response['message'] = 'required parameters are not available';
                      }
                
            case 'updateware':

                      if (isTheseParametersAvailable(array(
                          'name',
                          'location',
                          'id'
                      )))
                      {
                          $name = $_POST["name"];
                          $location = $_POST["location"];
                        
                          $id = $_POST['id'];

                          $stmt = $conn->prepare("UPDATE ware SET ware_name = ?, location = ? WHERE ware_id = ?");
                          $stmt->bind_param("sss", $name,  $location, $id);

                          if ($stmt->execute())
                          {

                              $response['error'] = false;
                              $response['message'] = 'User profile updated successfully';

                          }
                          else
                          {
                              $response['error'] = true;
                              $response['message'] = 'User profile updation failed';
                          }

                      }
                      else
                      {
                          $response['error'] = true;
                          $response['message'] = 'required parameters are not available';
                      }
                
            case 'updatesupp':

                      if (isTheseParametersAvailable(array(
                          'name',
                          'city',
                          'cnumber',
                          'id'
                      )))
                      {
                          $name = $_POST["name"];
                          $address = $_POST["city"];
                          $cnumber = $_POST["cnumber"];
                          $id = $_POST['id'];

                          $stmt = $conn->prepare("UPDATE supp SET supp_name = ?, supp_ph = ?, supp_city = ? WHERE supp_id = ?");
                          $stmt->bind_param("ssss", $name, $cnumber, $city, $id);

                          if ($stmt->execute())
                          {

                              $response['error'] = false;
                              $response['message'] = 'User profile updated successfully';

                          }
                          else
                          {
                              $response['error'] = true;
                              $response['message'] = 'User profile updation failed';
                          }

                      }
                      else
                      {
                          $response['error'] = true;
                          $response['message'] = 'required parameters are not available';
                      }
                
            
            case 'updatemanu':

                      if (isTheseParametersAvailable(array(
                          'name',
                          'city',
                          'cnumber',
                          'id'
                      )))
                      {
                          $name = $_POST["name"];
                          $address = $_POST["city"];
                          $cnumber = $_POST["cnumber"];
                          $id = $_POST['id'];

                          $stmt = $conn->prepare("UPDATE manu SET manu_name = ?, manu_ph = ?, manu_city = ? WHERE manu_id = ?");
                          $stmt->bind_param("ssss", $name, $cnumber, $city, $id);

                          if ($stmt->execute())
                          {

                              $response['error'] = false;
                              $response['message'] = 'User profile updated successfully';

                          }
                          else
                          {
                              $response['error'] = true;
                              $response['message'] = 'User profile updation failed';
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

