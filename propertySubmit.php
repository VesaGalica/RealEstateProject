<?php 
    include('property.php');
    include('photo.php');
    include('address.php');
    

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $add=new Address($_POST['str'],$_POST['city'],$_POST['country'],$_POST['zip']);
        $prop=new Property($_POST['title'],$_POST['descp'],$_POST['baths'],$_POST['beds'],$_POST['area'],$_SESSION['user'],$_POST['price'],$add);
        $total=count($_FILES['image']['name']);
        $hasErrors=false;
        if(empty($_FILES['cover_image']['name']))
        {
            $_SESSION['errors']=array();
            array_push($_SESSION['errors'],"Duhet te shtosh foto");
            header("Location: addProperty.php");
        }
        

        for ($i=0; $i < $total; $i++) { 
            $photo =new Photo();
            if(!$photo->validate($_FILES['image']['name'][$i],$_FILES['image']['tmp_name'][$i],$_FILES['image']['size'][$i]))
            {
                if($hasErrors)
                {
                    $_SESSION['errors']=array_merge($_SESSION['errors'],$photo->getErrors());
                }
                else{
                    $_SESSION['errors']=$photo->getErrors();
                    $hasErrors=true;

                }
            }
        }



        if($prop->validate())
        {
           if($hasErrors)
           {
               header("Location:addProperty.php");
           }
           else
           {
                include('conn.php');
                $prop->submit();
                $propId=$prop->getId();
                for ($i=0; $i < $total; $i++) { 
                    $photo =new Photo();
                    $photo->validate($_FILES['image']['name'][$i],$_FILES['image']['tmp_name'][$i],$_FILES['image']['size'][$i]);
                    if($i == 0 )
                    {
                        $photo->submit($_FILES['image']['tmp_name'][$i],true);
                    }
                    else{
                        $photo->submit($_FILES['image']['tmp_name'][$i],false);
                    }
                    $photoId=$photo->getId();
                    $query=$conn->prepare("INSERT INTO photo_property(property_id,photo_id) VALUES (?,?)");
                    $query->bind_param("ii",$propId,$photoId);
                    $query->execute();
                    $query->close();
                    
                }
                $_SESSION['errors']=array();
                array_push($_SESSION['errors'],"Prona u shtua");
                header("Location: addProperty.php");

           }
        }
        else{
            if($hasErrors)
            {
                $_SESSION['errors']=array_merge($_SESSION['errors'],$prop->getErrors());
                
            }
            else{
                $_SESSION['errors']=$prop->getErrors();
            }
            header("Location: addProperty.php");
            

        }
    

    }


?>