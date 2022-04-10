<?php 
    include('user.php');
    include('photo.php');
    $photo =new Photo($_POST['id']);

    if($photo->validate($_FILES['file']['name'],$_FILES['file']['tmp_name'],$_FILES['file']['size']))
    {
        if($photo->photo_exists() && $photo->is_owner($_SESSION['user']))
        {
            if($photo->update($_FILES['file']['tmp_name'],$_FILES['file']['name']))
            {
                $response['hasError']=false;
                $response['errors']=array("File uploaded");
                echo json_encode($response);
            }
        }
        else{
            $response['hasError']=true;
            $response['errors']=array("Oops something went wrong");
            echo json_encode($response);
        }
    }
    else
    {
        $response['hasError']=true;
        $response['errors']=$photo->getErrors();
        echo json_encode($response);
    }
?>