<?php

include ('connection.php');



    $id = $_GET['id'];

    $qury ="select * from student where id=$id";
    
    $run =mysqli_query($db,$qury);

   if($run->num_rows>0)
   {
    while($row = $run->fetch_assoc())
    {
       $name = $row['name']; 
       $address = $row['address']; 
       $email = $row['email']; 
    }
   }




?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <script>

function valid()
{
    var name=document.getElementById("name").value.trim();
    var address=document.getElementById("address").value.trim();
    var email=document.getElementById("email").value.trim();

    if(isEmpty(name))
    {
        x =document.getElementById("nameerror");
        x.innerHTML = "Name is required";
        x.style.color="red";
        return false;


        if(namecheck(name))
        x =document.getElementById("nameerror");
        x.innerHTML = "Nmae is not match with pattern";
        x.style.color="red";
        return false;
    }

    if(isEmpty(address) || addresscheck(address))
    {
        x =document.getElementById("adderror");
        x.innerHTML = "address is required";
        x.style.color="red";
    
        return false;
    }

    if(isEmpty(email) || emailcheck(name))
    {
        x =document.getElementById("emailerror");
        x.innerHTML = "email is required";
        x.style.color="red";
        return false;
       
    }

    
}

function isEmpty(x)
{
    if(x == "")
    {
        return true;
    }
}

function namecheck(x)
{
    namepattern=/^\w{5,12}$/;
    if(!x.match(namepattern))
    {
        return true;
    }
}

function addresscheck(x)
{
    adpattern=/^\w{5,12}$/;

    if(!x.match(adpattern))
    {
        return false;
    }
}

function emailcheck(x)
{
    epattern=/^([a-zA-Z0-9\.\_-])+@([A-Za-z0-9])+.([a-z]{1,3})$/;

    if(!x.match(epattern))
    {
        return false;
    }
}



</script>  

    </head>
    <body>
        
    <form action="" method="post" onsubmit="return valid()">
        <label>Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $name; ?>"><span id="nameerror"></span>
        <br><br>
        <label>Address:</label>
        <input type="address" name="address" id="address" value="<?php echo $address; ?>"><span id="adderror"></span>
        <br><br>
        <label>Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $email; ?>"><span id="emailerror"></span>
        <br><br>
        <input type="submit" name="update" value="update">
    

    </form>
    </body>
    </html>

    <?php

    if(isset($_POST['update']))
    {
        $name=$_POST['name'];
        $address=$_POST['address'];
        $email=$_POST['email'];

        $qury ="update student set name='$name', address='$address', email='$email'
        where id=$id";

        if(mysqli_query($db,$qury))
        {
            header('location:user.php');
        }else
        {
            header('location:user.php');
        }



    }

?>
