<?php

    include 'connection.php';

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

            if(isEmpty(name) || namecheck(name))
            {
                x =document.getElementById("nameerror");
                x.innerHTML = "Name is required";
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
        <input type="text" name="name" id="name" placeholder="Enter your name"><span id="nameerror"></span>
        <br><br>
        <label>Address:</label>
        <input type="address" name="address" id="address" placeholder="Enter your address"><span id="adderror"></span>
        <br><br>
        <label>Email:</label>
        <input type="email" name="email" id="email" placeholder="Enter your email"><span id="emailerror"></span>
        <br><br>
        <input type="submit" name="submit" value="submit">
        <input type="reset" name="reset" value="reset">

    </form>



        
    <table border="1">

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Operations</th>
        </tr>

<?php
        $qry = "select * from student";
        $run = $db->query($qry);

        while($row=$run->fetch_assoc())
        {

            $id = $row['id'];
 ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                    <a href="edit.php? id=<?php echo $id; ?>">Edit</a>
                    <a href="delete.php? id=<?php echo $id; ?>" onclick="return confirm('Are you sure')">Delete</a>
                </td>
            </tr>

<?php

        }

?>
        <tr>
           
        </tr>


    </table>
        

    



</body>
</html>


<?php

    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $email = $_POST['email'];

        $qury = "insert into student values(null,'$name','$address','$email')";

        if(mysqli_query($db,$qury))
        {
            header('location:user.php');
        }else
        {
            echo mysqli_error($db);
        }
    }

?>