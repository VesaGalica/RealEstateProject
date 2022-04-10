<?php 
include('user.php');

class Property
{
    private $id;

    private $title;
  
    private $description;

    private $address;

    private $bathrooms;

    private $bedrooms;

    private $area;
  
    private $publisher;

    private $price;

    private $image=array();

    private $errors=array();

    public function __construct( $title, $description, $bathrooms, $bedrooms, $area, $publisher,$price,$address=null,$id=null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->address = $address;
        $this->bathrooms = $bathrooms;
        $this->bedrooms = $bedrooms;
        $this->area = $area;
        $this->publisher = $publisher;
        $this->price=$price;
    }

    public function  validate()
    {
      if(empty($this->title) || empty($this->description) ||empty($this->address) ||empty($this->bathrooms) ||empty($this->bedrooms) ||empty($this->area) ||empty($this->publisher)  ||empty($this->price))
      {
        array_push($this->errors,"All fields are required");
      }
      if($this->publisher->user_not_exists())
      {
        array_push($this->errors,"User dosent exists");
      }
      if(!is_numeric($this->bathrooms) || !is_numeric($this->bedrooms) || !is_numeric($this->area) || !is_numeric($this->price))
      {
        array_push($this->errors,"Bathrooms,bedrooms, area and price need to be numbers");
      }
      if($this->price < 0 )
      {
        array_push($this->errors,"Price cant be lower than  0");

      }
      if(!$this->address->validate())
      {
          $this->errors=array_merge($this->errors,$this->address->getErrors());
      }

      if(count($this->errors))
      {
          return false;
      }
      else{
          return true;
      }
    }

    public function exists()
    {
      include('conn.php');
        
      $query=$conn->prepare("SELECT * FROM property where id = ? ");
      $query->bind_param('i',$this->id);
      $query->execute();
      $res=$query->get_result();
      if($res->num_rows == 0)
      {
        return false;
      }
      return true;
    }


    public function submit()
    {
      include('conn.php');
      $publisherId=$this->publisher->getId();
      $addressId=$this->address->submit();
      $query=$conn->prepare("INSERT INTO property(publisher,title,description,address,bathrooms,bedrooms,area,price) VALUES (?,?,?,?,?,?,?,?)");
      $query->bind_param("issiiidd",$publisherId,$this->title,$this->description,$addressId,$this->bathrooms,$this->bedrooms,$this->area,$this->price);
      $query->execute();
      $query->close();
      $this->setId($conn->insert_id);
      if($query)
      {
        return true;
      }
      return false;

    }
    public function update()
    {
      include('conn.php');
      $query=$conn->prepare("UPDATE property SET title=?,description = ?, bathrooms=? ,bedrooms= ? ,area=?,price=? where id =? ");
      $query->bind_param("ssiiddi",$this->title,$this->description,$this->bathrooms,$this->bedrooms,$this->area,$this->price,$this->id);
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
      $query=$conn->prepare("SELECT * FROM property where id =  ? LIMIT 1");
      $query->bind_param("i",$this->id);
      $query->execute();
      $result=$query->get_result();
      $property=$result->fetch_assoc();
      return $property['publisher'] == $user->getId();
    }
    /**
     * Get the value of errors
     */ 
    public function getErrors()
    {
        return $this->errors;
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
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }
}
