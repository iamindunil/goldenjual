<?php
     include 'connect.php';
     $id=$_GET['updateid'];
     $sql="select*from payment_1 where id=$id";
     $result=mysqli_query($con,$sql);
     $row=mysqli_fetch_assoc($result);
     $ownerName=$row['ownerName'];
     $cvvNumber=$row['cvvNumber'];
     $cardNumber=$row['cardNumber'];
     $expireMonth=$row['expireMonth'];
     $expireYear=$row['expireYear'];

     if(isset($_POST['submit'])){
        $ownerName=$_POST['ownerName'];
        $cvvNumber=$_POST['cvvNumber'];
        $cardNumber=$_POST['cardNumber'];
        $expireMonth=$_POST['expireMonth'];
        $expireYear=$_POST['expireYear'];

       $sql="update payment_1 set id=$id , ownerName='$ownerName', cvvNumber='$cvvNumber',
       expireMonth='$expireMonth' , expireYear='$expireYear ' where id=$id";
        $result=mysqli_query($con,$sql);
        if($result){
            //echo "Data updated successfully";
            header('location:display.php');
        }
        else{
            die(mysqli_error($con));
        }
        }
     
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" >

    <title>Accountant Workspace</title>
  </head>
  <body>
    <div class="container my-5">
    <form method="POST">
        <div class="form-group">
            <label >Owner</label>
            <input type="text" class="form-control" 
            placeholder="Enter owner name"
            name="ownerName" autocomplete="off" value=<?php echo $ownerName;?>>
        </div>

        <div class="form-group">
            <label >CVV</label>
            <input type="password" class="form-control" 
            placeholder="3-4 digit number"
            name="cvvNumber" autocomplete="off" value=<?php echo $cvvNumber;?>>
            
        </div>

        <div class="form-group">
            <label >Card Number</label>
            <input type="password" class="form-control" 
            placeholder="xxxx-xxxx-xxxx"
            name="cardNumber" autocomplete="off" value=<?php echo $cardNumber;?>>
        </div>

        <div class="form-group">
            <label >Expire Date</label>
            <div class="selection">
            <div class="date">
                        <select name="expireMonth" id="expireMonth" value=<?php echo $expireMonth;?>>
                            <option value="Jan">Jan</option>
                            <option value="Feb">Feb</option>
                            <option value="Mar">Mar</option>
                            <option value="Apr">Apr</option>
                            <option value="May">May</option>
                            <option value="Jun">Jun</option>
                            <option value="Jul">Jul</option>
                            <option value="Aug">Aug</option>
                            <option value="Sep">Sep</option>
                            <option value="Oct">Oct</option>
                            <option value="Nov">Nov</option>
                            <option value="Dec">Dec</option>
                        </select>
                        <select name="expireYear" id="expireYear" value=<?php echo $expireYear;?>>
                            <option value="2028">2028</option>
                            <option value="2027">2027</option>
                            <option value="2026">2026</option>
                            <option value="2025">2025</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                        </select>
            </div>
            
        </div>

        

  <button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>

    </div>

    
  </body>
</html>