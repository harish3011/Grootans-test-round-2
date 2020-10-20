<?php  
include "dbConfig.php";
$db = new dbConfig();
if(isset($_POST["submit"])) {
  $valid = true;
  if(isset($_POST["name"])){
    $name = $_POST["name"];
  }else{
    $valid = false;
  }

  if(isset($_POST["age"])){
    $age = $_POST["age"];
  }else{
    $valid = false;
  }

  if(isset($_POST["country"])){
    $country = $_POST["country"];
  }else{
    $valid = false;
  }

  if(isset($_POST["dob"])){
    $date = $_POST["dob"];
  }else{
    $valid = false;
  }

  if(isset($_POST["gender"])){
    $gender = $_POST["gender"];
  }else{
    $valid = false;
  }

  if(isset($_POST["lang"])){
    $lang = $_POST["lang"];
  }else{
    $valid = false;
  }

  if(isset($_POST["color"])){
    $color = $_POST["color"];
  }else{
    $valid = false;
  }

  if(isset($_POST["email"])){
    $email = $_POST["email"];
  }else{
    $valid = false;
  }

  if(isset($_POST["time"])){
    $time = $_POST["time"];
  }else{
    $valid = false;
  }

  if(isset($_POST["web"])){
    $web = $_POST["web"];
  }else{
    $valid = false;
  }

  if(isset($_POST["cgpa"])){
    $cgpa = $_POST["cgpa"];
  }else{
    $valid = false;
  }

  if($valid){
    $values = '"'.$name.'","'.$age.'","'.$country.'","'.$date.'","'.$gender.'","'.$lang.'","'.$color.'","'.$email.'","'.$time.'","'.$web.'","'.$cgpa.'"';
    $ins=$db->Insert('grootan',"name,age,country,dob,gender,languagesKnown,favColor,email,startTime,webAdd,CGPA",$values);
  }


}
// $name = "h";
// $email = "h@h.com";
// $values = '"'.$name.'","'.$email.'"';
// $ins=$db->Insert('grootan',"name,email",$values);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div class="container border border-primary p-5 rounded mt-5">
  <div class="form-group">
    <label for="Name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter the Name" required>
  </div>
  <div class="form-group">
    <label for="age">Age</label>
    <input type="number" class="form-control" id="age" name="age" placeholder="Enter the Age" required>
  </div>
  <div class="form-group">
    <label for="country">Country</label>
    <select name="country" id="country">
      <option value="india">India</option>
      <option value="kenya">Kenya</option>
      <option value="Australia">Australia</option>
    </select>
  </div>
  <div class="form-group">
    <label for="dob">DOB</label>
    <input type="date" class="form-control" id="dob" name="dob" required>
  </div>
  <div class="form-group">
    <label for="gender">Gender</label><br>
    <input type="radio" class="mr-2" id="gender" name="gender" checked="checked">Male
    <input type="radio" class="mr-2" id="gender" name="gender">Female
  </div>
  <div class="form-group">
    <label for="lang">Language Known</label>
    <select name="lang" id="lang">
      <option value="java">Java</option>
      <option value="ruby">Ruby</option>
      <option value="python">Python</option>
    </select>
  </div>
  <div class="form-group">
    <label for="color">Favorite Color</label>
    <input type="text" class="form-control" id="color" name="color" required>
  </div>
  <div class="form-group">
    <label for="photo">Upload Photograph</label>
    <input type="file" class="form-control" id="photo" name="photo">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
  </div>  
  <div class="form-group">
    <label for="time">Start Time</label>
    <input type="time" class="form-control" id="time" name="time" required>
  </div>
  <div class="form-group">
    <label for="web">Website Address</label>
    <input type="text" class="form-control" id="web" name="web" placeholder="Enter your web address" required>
  </div>
  <div class="form-group">
    <label for="cgpa">CGPA</label>
    <input type="number" class="form-control" id="cgpa" required>
  </div>      
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
<?php

?>