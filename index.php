<?php 
$connect = mysqli_connect("localhost","root","","collg");

// select doctor




$select = "SELECT * FROM doctor";
$ALLDcotor= mysqli_query($connect , $select);


// print_r($_GET);

if(isset($_POST['Submit'])){

    $name = $_POST ['Dname'];

$insert = "INSERT INTO doctor VALUES ( null , '$name')";
$isnertStatus= mysqli_query( $connect , $insert );

}



// delete
if(isset($_GET['delete'])){

  $id = $_GET ['delete'];
  $delete = "DELETE FROM doctor WHERE  id= $id";
  $deleteStatus = mysqli_query ($connect , $delete);
  
// if($deleteStatus){
//     echo "treu";
// }
// else{
//     echo"false";
// }

}
// update 

$name='';
$flage = true ;
if(isset($_GET['edit'])){
  $flage = false ;
   $id = $_GET['edit'];
   echo $id;
   $selectoneDoctor ="SELECT * FROM doctor where id =$id";
   $Onedoctor = mysqli_query ($connect , $selectoneDoctor);
  $row = mysqli_fetch_assoc($Onedoctor);
  $name = $row['Name'];

  if (isset($_POST['update'])){
    $name = $_POST ['Dname'];
     $Update = "UPDATE doctor  SET  Name= '$name' WHERE  id =$id";
     $UpdateStatus =mysqli_query($connect , $Update);
if($UpdateStatus){
    echo "treu";
}
else{
    echo"false";
}

  }
 


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href ="./css/style.css">
</head>
<body class="bg-dark">


<h1 class="text-center text-info my-5" >Welcom TO our System</h1>


<!-- insret doctor -->

<!-- select doctor -->

<div class="container col-6  my-5">

<form method="POST" >
  <div class="form-group">
    <label class="text-light">Doctor Name</label>
    <input name="Dname" type="text" value="<?php echo $name;  ?>" class="form-control">
  </div>

  <?php if ($flage):  ?>
  <button name="Submit" type="submit" class="btn btn-primary">Submit</button> 
  <?php else: ?>
  <button name="update" type="submit" class="btn btn-primary">update</button> 
  <?php endif; ?>
</form>


</div>


<div class="container col-6">
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php  foreach ($ALLDcotor as $data ){?>
    <tr>
      <th scope="row"><?php echo $data ['id'] ?> </th>
      <td> <?php echo $data ['Name'] ?></td>
      <td> <a href="/project/index.php/?delete=<?php echo $data['id'] ?>" class="btn btn-danger btn-sm">Delete</a></td>
      <td> <a href="/project/index.php/?edit=<?php echo $data['id'] ?>" class="btn btn-primary btn-sm">Edit</a></td>

      <?php } ?>
    
    </tr>
    
  </tbody>
</table>

</div>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>