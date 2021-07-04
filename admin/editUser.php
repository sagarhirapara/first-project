<?php
include "connection.php";
include 'checkLoged.php';
include 'checkAdmin.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php 
include "header.php";
        $userid = $_GET['user'];
        $query = "select * from user where user_id = {$userid}";
        $res = mysqli_query($conn,$query) or die("query failed");
    ?>
    <nav class="navbar post_detail">
        <div class="container-fluid">
            <a class="navbar-brand post_d_a">Edit the user detail</a>
        </div>
    </nav>
    <div class="container pt-2">

        <form action="saveEditUser.php?user=<?php echo $_GET['user']; ?>" method='POST'>
            <?php 
            if(mysqli_num_rows($res)>0)
            {
                while($x = mysqli_fetch_assoc($res))
                {
                    ?>

            <div class="form-group">
                <label for="exampleInputEmail1"><strong>firstname</strong></label>
                <input type="text" value="<?php echo $x['first_name']?>" name="firstname" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter first name" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1"><strong>lastname</strong></label>
                <input type="text" value="<?php echo $x['last_name']?>" name="lastname" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter last name" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1"><strong>user role</strong></label>
                <select name="userrole" class="form-control" id="exampleFormControlSelect1">
                    <?php
                if($x['role']==1){
                    echo '<option value="0">Noramal User</option>
                    <option value="1" selected>Admin</option>';
                }
                else
                {
                    echo '<option value="0" selected>Noramal User</option>
                    <option value="1">Admin</option>';
                }
                ?>
                </select>
            </div>
            <div class="d-flex justify-content-center">

                <button type="submit" name="login" class="btn btn-primary">Edit user</button>
            </div>

            <?php
                }
            }
        ?>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>


</body>

</html>