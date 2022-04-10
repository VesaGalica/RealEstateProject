<?php
    include_once('header.php');
    include('redirect.php');
    include_once('conn.php');
    $data = $_SESSION['user'];
    $sql = "SELECT * FROM user WHERE email = '" . $data->getEmail() . "'";
    $result = $conn->query($sql);

if($result->fetch_assoc()['is_superuser'] != 1){
    echo "
  <link rel='stylesheet' href='css/admin-dashboard.css'>
  <div class='forbiddenContainer'>
  <h1>Forbidden!</h1>
<h2>Code 403</h2>
<div id='jail'>
  <svg 
       viewBox='0 0 1000 1000'
       preserveAspectRatio='xMinYMin'
       id='spinner'
       >
    <defs>
      <path id='textPath' d='M 250 500 A 250,250 0 1 1 250 500.0001'/>
    </defs>
    <text x='0' y='0' text-anchor='left' style='font-size:90pt;'><textPath xlink:href='#textPath' startOffset='0%' >GO BACK</textPath><textPath xlink:href='#textPath' startOffset='50%' >GO BACK</textPath></text>
  </svg>
  <div id='cursor'></div>
</div>
</div>
";
    exit;
}

if(isset($_SESSION['user'])) :

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin-dashboard.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="container " style="margin-top: 10%;">
        <table class="table table-striped">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Profile Picture</th>
                <th scope="col">Is Admin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        
                    <?php
                        $sql = "SELECT * FROM user";
                        $result = $conn->query($sql);
                        $data = $result->fetch_all();
                        foreach($data as $row):
                            $sql2 = "select * from address where id = " . $row[6] ;
                            $addressResult = $conn->query($sql2);
                            $addressData = $addressResult->fetch_assoc();
                            ?>
                            <tr>
                            <td><?php echo $row[0] ?></td>
                            <td><?php echo $row[1] ?></td>
                            <td><?php echo $row[2] ?></td>
                            <td><?php echo $row[3] ?></td>
                            <td><?php echo $row[6] ?></td>
                            <td><?php echo $row[7] ?></td>
                            <td><?php echo $row[8] ?></td>
                            <td><?php echo $row[5] ? "Yes" : "No" ?></td>
                            <td class="d-flex">
<form method="get" action="admin-edit.php" class="d-inline" style="margin-right: 3%;">
<input type="hidden" name="id" value="<?php echo $row[0]; ?>">
<input type="hidden" name="is_superuser" value="<?php echo $row[5]; ?>">
<button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Change Admin Status">
<svg style="height: 20px;width:20px;margin-top:3px" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
</svg>
</button>
</form>
<form class="d-inline" style="margin-right: 3%;" method="POST" action="admin-delete.php" onsubmit="return confirm('Are you sure you want to delete this user?');">
<input type="hidden" name="id" value="<?php echo $row[0]; ?>">
<button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete User">
<svg style="height: 20px;width:20px;margin-top:3px" 
xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
</svg></button>
</form>
</td>
                            </tr>
                    <?php
                    endforeach;
                    
                        $conn->close();
                    ?>
        </tbody>
        </table>
 
    </div>


    <script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
    </script>
        
<?php
    include('footer.php');
    endif;
?>