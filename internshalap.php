<?php
$insert = false;
if(isset($_POST['name'])){
    // Setting connection variables
    $servername = "localhost";

    $username = "root";

    $password = "";

    // Creating a connection variable
    $con = mysqli_connect($servername, $username, $password);

    // Checking for connection success
    if(!$con){
        die("Connection to this database failed due to" . mysqli_connect_error());
    }

    // echo "Success connecting to the db";

    // Collecting Post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $other = $_POST['other'];

    $sql = "INSERT INTO `trip`.`trip1` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";

    // echo $sql;


    // Executing the query
    if($con->query($sql) == true){              // -> is an object operator.
        // echo "Successfully Inserted";

        // Flag for successfull insertion !
        $insert = true;
    }
    else{
        echo "Error!: $sql <br> $con->error";
    }

    // Closing the database connection !  Very important !!!
    $con->close();

}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>College Trip</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
      .img-fluid{
        width: 100%;
        height: 100%;
      }
    </style>
  </head>
  <body>

  <div class="container d-flex justify-content-center flex-column">
    <!-- Carousel wrapper -->
<div
  id="carouselVideoExample"
  class="carousel slide carousel-fade"
  data-mdb-ride="carousel"
>
  <!-- Indicators -->
  <div class="carousel-indicators">
    <button
      type="button"
      data-mdb-target="#carouselVideoExample"
      data-mdb-slide-to="0"
      class="active"
      aria-current="true"
      aria-label="Slide 1"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselVideoExample"
      data-mdb-slide-to="1"
      aria-label="Slide 2"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselVideoExample"
      data-mdb-slide-to="2"
      aria-label="Slide 3"
    ></button>
  </div>

  <!-- Inner -->
  <div class="carousel-inner">
    <!-- Single item -->
    <div class="carousel-item active">
      <video class="img-fluid" autoplay loop muted>
        <source src="https://iitb-wustl.org/images/homev.mp4" type="video/mp4" />
      </video>
      <div class="carousel-caption d-none d-md-block">
        <h5>IIT Bombay</h5>
        <p>
          Trip Form
        </p>
      </div>
    </div>

    
  <!-- Inner -->

  <!-- Controls -->
  <button
    class="carousel-control-prev"
    type="button"
    data-mdb-target="#carouselVideoExample"
    data-mdb-slide="prev"
  >
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button
    class="carousel-control-next"
    type="button"
    data-mdb-target="#carouselVideoExample"
    data-mdb-slide="next"
  >
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Carousel wrapper -->

  </div>





    <div class="container-fluid text-center my-3">
        <h1 class="text-primary">Welcome to IIT Mumbai US Trip Form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>

        <?php
        if($insert == true){
            echo "<p id='p1'>Thanks for submitting form. We are happy to see you joining us for the US trip</p>";
        }
        ?>

        <form action="internshalap.php" method="post" class="d-flex flex-column">
            <!--two from methods get and post , post is secure method, whereas get methods data is display in url.-->

            <input class="my-3" type="text" name="name" id="name" placeholder="Enter Your Name">
            <input class="my-3" type="text" name="age" id="age" placeholder="Enter Your Age">
            <input class="my-3" type="text" name="gender" id="gender" placeholder="Enter Your gender">
            <input class="my-3" type="email" name="email" id="email" placeholder="Enter Your Email">
            <input class="my-3" type="phone" name="phone" id="phone" placeholder="Enter Your Phone Number">
            <textarea class="my-3" name="other" id="other" cols="30" rows="10" placeholder="Enter Any Other Information Here"></textarea>
            <button class="btn btn-primary">Submit</button>
            <!-- <button class="btn">Reset</button> -->
        </form>
    </div>

    <script src="index.js"></script>

    <!-- INSERT INTO `trip1` (`sno`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('1', 'testName', '23', 'male', 'this@this.com', '1243748779', 'this is my first ever PHP myadmin message !', current_timestamp()); -->











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>