<?php 
session_start();
class User {
    private $id;
    private $fname;
    private $lname;
    private $email;
    private $pass;
    private $address;
    private $profile_pic;
    private $phone_num;   
    private $errors=array();

    public function __construct($email,$pass,$fname=null,$lname=null,$address=null,$phone_num=null,$profile_pic="img/profile_pic/profile.png",$id=null)
    {
        $this->id=$id;
        $this->fname=$fname;
        $this->lname=$lname;
        $this->email=$email;
        $this->pass=$pass;
        $this->address=$address;
        $this->phone_num=$phone_num;
        $this->profile_pic=$profile_pic;
    }

    

  
    public function validateLogin()
    {
        if(empty($this->email) || empty($this->pass))
        {
            array_push($this->errors,"All fields required");
        }
        if(!filter_var($this->email,FILTER_VALIDATE_EMAIL))
        {
            array_push($this->errors,"Please use a valid email");
            
        }

        if(count($this->errors))
        {
            return false;
        }
        else{
            return true;
        }
    }

    public function validateRegister($cpass)
    {
        if(empty($this->fname) || empty($this->lname) || empty($this->email) || empty($this->pass) 
            || empty($this->address)  || empty($this->profile_pic)  || empty($this->phone_num))
        {
            array_push($this->errors,"All fields required");
        }
        if(!preg_match("/^[a-zA-Z-' ]*$/",$this->lname) || !preg_match("/^[a-zA-Z-' ]*$/",$this->fname))
        {
            array_push($this->errors,"Names need to contain only letters and spaces ");
        }
        if($this->pass != $cpass)
        {
            array_push($this->errors,"Two passwords didnt match");

        }
        if(!preg_match("/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/",$this->pass))
        {
            array_push($this->errors,"Password must contain 1 upper case letter 1 lower case 1 letter 1 digit 1 symbol and be 8 characters long");

        }
        if(!filter_var($this->email,FILTER_VALIDATE_EMAIL))
        {
            array_push($this->errors,"Please use a valid email");
            
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
 
    private function user_exists()
    {
        include('conn.php');
        
        $query=$conn->prepare("SELECT * FROM user where email = ? ");
        $query->bind_param('s',$this->email);
        $query->execute();
        $res=$query->get_result();
        if($res->num_rows >0)
        {
            return true;
        }
        return false;
    }


    public function user_not_exists()
    {
        include('conn.php');
        
        $query=$conn->prepare("SELECT * FROM user where email = ? ");
        $query->bind_param('s',$this->email);
        $query->execute();
        $res=$query->get_result();
        if($res->num_rows == 0)
        {
            return true;
        }
        return false;
    }


    public function register()
    {   
        $errors=array();
        if($this->user_exists())
        {
            array_push($this->errors,"User with that email exists");
            return false;
        }
        else{
            include('conn.php');
            $hashed_pass=password_hash($this->pass,PASSWORD_BCRYPT);
            $addId=$this->address->submit();

            $query=$conn->prepare("INSERT INTO user(first_name,last_name,email,user_password,address,phone_number,profile_pic) VALUES (?,?,?,?,?,?,?)");
            $query->bind_param("ssssiss",$this->fname,$this->lname,$this->email,$hashed_pass,$addId,$this->phone_num,$this->profile_pic);
            
            $query->execute();
            $query->close();
            $this->setId($conn->insert_id);

            if($query)
            {
                return true;
            }
            return false;

        }
    }

    


    public function authenticate()
    {
        include('conn.php');
       
        $query=$conn->prepare("SELECT * FROM user WHERE email = ? LIMIT 1");
        $query->bind_param("s",$this->email);        
        $query->execute();
        $res=$query->get_result();
        $usrDb=$res->fetch_assoc();
        
        if($usrDb['email'] == $this->email && password_verify($this->pass,$usrDb['user_password']))
        {
            $_SESSION['user']=$this;
            $this->setId($usrDb['id']);
            $this->setFname($usrDb['first_name']);
            $this->setLname($usrDb['last_name']);
            $this->setAddress($usrDb['address']);
            $this->setPhone_num($usrDb['phone_number']);
            $this->setProfile_pic($usrDb['profile_pic']);

            return true;
        }
        else{
            array_push($this->errors,"Email or password is incorrect");
            return false;
        }
    }

    

    /**
     * Get the value of phone_num
     */ 
    public function getPhone_num()
    {
        return $this->phone_num;
    }

    /**
     * Get the value of profile_pic
     */ 
    public function getProfile_pic()
    {
        return $this->profile_pic;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of fname
     */ 
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * Get the value of lname
     */ 
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of pass
     */ 
    public function getPass()
    {
        return $this->pass;
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
     * Set the value of fname
     *
     * @return  self
     */ 
    public function setFname($fname)
    {
        $this->fname = $fname;

        return $this;
    }

    /**
     * Set the value of lname
     *
     * @return  self
     */ 
    public function setLname($lname)
    {
        $this->lname = $lname;

        return $this;
    }

    /**
     * Set the value of profile_pic
     *
     * @return  self
     */ 
    public function setProfile_pic($profile_pic)
    {
        $this->profile_pic = $profile_pic;

        return $this;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Set the value of phone_num
     *
     * @return  self
     */ 
    public function setPhone_num($phone_num)
    {
        $this->phone_num = $phone_num;

        return $this;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}



?>