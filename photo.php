<?php 

class Photo
{
    private $id;
    private $target_dir="img/properties/";
    private $target_file;
    private $errors=array();

    public function __construct($id=null)
    {
        $this->id=$id;
    }

    public function validate($filename,$tmpname,$size)
    {
        $this->target_file=$this->target_dir.basename($filename);
        $imageFileType=strtolower(pathinfo($this->target_file,PATHINFO_EXTENSION));
        $check=getimagesize($tmpname);
        if($check == false)
        {
            array_push($this->errors,"File is not an image");
        }
        if(file_exists($this->target_file))
        {
            array_push($this->errors,"File exists");

        }
        if($size > 3000000)
        {   
            array_push($this->errors,"File too big must be less 3mb");

        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"  && $imageFileType != "jfif") {
            array_push($this->errors,"Sorry, only JPG, JPEG, PNG & GIF files are allowed.");

        }
        

        if(count($this->errors))
        {
            return false;
        }
        else{
            return true;
        }
    }


    public function submit($tmpname,$is_thumbnail)
    {
        include('conn.php');
        move_uploaded_file($tmpname, $this->target_file);
        
        $is_thumbnail=(int)$is_thumbnail;
        $query=$conn->prepare("INSERT INTO photo(photo,thumbnail) VALUES (?,?)");
        $query->bind_param("si",$this->target_file,$is_thumbnail);
        $query->execute();
        $query->close();
        $this->setId($conn->insert_id);

        if($query)
        {
            return true;
        }
        return false;
    }

    public function photo_exists()
    {
        include('conn.php');
        
        $query=$conn->prepare("SELECT * FROM photo where id = ? ");
        $query->bind_param('i',$this->id);
        $query->execute();
        $res=$query->get_result();
        if($res->num_rows >0)
        {
            return true;
        }
        return false;
    }

    public function is_owner($user)
    {
        include('conn.php');

        $query=$conn->prepare("SELECT property.* from photo inner join photo_property on photo.id = photo_property.photo_id inner join property on property.id = photo_property.property_id where photo.id = ?");
        $query->bind_param('i',$this->id);
        $query->execute();
        $res=$query->get_result();
        $photo=$res->fetch_assoc();
        return $photo['publisher'] == $user->getId();
    }


    public function update($tmpname,$filename)
    {
        include('conn.php');
        $this->target_file=$this->target_dir.basename($filename);
        move_uploaded_file($tmpname, $this->target_file);
        $query=$conn->prepare("UPDATE photo SET photo.photo = ? WHERE id = ?");
        $query->bind_param("si",$this->target_file,$this->id);
        $query->execute();
        $query->close();
        if($query)
        {
            return true;
        }
        return false;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of errors
     */ 
    public function getErrors()
    {
        return $this->errors;
    }
}

?>