<?php
     include('property.php');
     include('address.php');
    $add=new Address($_POST['str'],$_POST['city'],$_POST['country'],$_POST['zip'],$_GET['address_id']);
    $prop=new Property($_POST['title'],$_POST['descp'],$_POST['baths'],$_POST['beds'],$_POST['area'],$_SESSION['user'],$_POST['price'],$add,$_GET['id']);
    
    if($prop->validate())
    {   
        if($prop->exists() && $add->exists())
        {

            
            if($prop->is_owner($_SESSION['user']) && $add->is_owner($_SESSION['user']))
            {
                if($prop->update() && $add->update())
                {
                    $_SESSION['errors']=array();
                    array_push($_SESSION['errors'],"Prona u perditsua");
                }
                header("Location: propertyUpdate.php?id=".$_GET['id']."");
            }
            else{
                $_SESSION['errors']=array();
                array_push($_SESSION['errors'],"Po kryeni nje veprim te palejuar");
                header("Location: propertyUpdate.php?id=".$_GET['id']."");
            }
        }
        else{
         
            header("Location: index.php");
        }
    }
    else{
        $_SESSION['errors']=$prop->getErrors();
        header("Location: propertyUpdate.php?id=".$_GET['id']."");
    }
?>