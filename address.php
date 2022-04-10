<?php 
class Address{
    private  $id;
    private $address;
    private $city;
    private $country;
    private $zip;
    private $errors=array();

    public function __construct($address,$city,$country,$zip,$id=null)
    {
        $this->id=$id;
        $this->address=$address;
        $this->city=$city;
        $this->country=$country;
        $this->zip=$zip;
    }

    public function validate()
    {
        if(empty($this->address))
        {
            array_push($this->errors,"Address field is required");
        }
        if(!is_numeric($this->zip))
        {
            
            array_push($this->errors,"ZIP code must contain only numbers");

        }

        if(count($this->errors))
        {
            return false;
        }
        else{
            return true;
        }
    }

    public function submit()
    {
        include('conn.php');
        $query=$conn->prepare("INSERT INTO address(city,country,street,zip_code) VALUES (?,?,?,?)");
        $query->bind_param("iiss",$this->city,$this->country,$this->address,$this->zip);
        $query->execute();
        $query->close();
        $this->setId($conn->insert_id);

        if($query)
        {
            return $this->getId();
        }
        return false;

    }

    public function update()
    {
        include('conn.php');
        $query=$conn->prepare("UPDATE address SET city=?,country=?,street=?,zip_code=? where id=?");
        $query->bind_param("iisii",$this->city,$this->country,$this->address,$this->zip,$this->id);
        $query->execute();
        $query->close();
        if($query)
        {
            return true;
        }
        return false;
    }

    public function is_owner($user)
    {
        include('conn.php');
        $query=$conn->prepare("SELECT property.* FROM address inner join property on property.address = address.id where address.id =  ?");
        $query->bind_param("i",$this->id);
        $query->execute();        
        $result=$query->get_result();

        if($result->num_rows > 0){
            $property=$result->fetch_assoc();
            return $property['publisher'] == $user->getId();
        }

        $userQuery=$conn->prepare("SELECT user.* FROM address inner join user on user.address = address.id where address.id =  ? ");
        $userQuery->bind_param("i",$this->id);
        $userQuery->execute();
        $userResult=$userQuery->get_result();
        
        if($userResult->num_rows > 0)
        {
            $usr=$userResult->fetch_assoc();
            return $usr['id'] == $user->getId();
        }

    }
    
    public function exists()
    {
      include('conn.php');
        
      $query=$conn->prepare("SELECT * FROM address where id = ? ");
      $query->bind_param('i',$this->id);
      $query->execute();
      $res=$query->get_result();
      if($res->num_rows == 0)
      {
        return false;
      }
      return true;
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