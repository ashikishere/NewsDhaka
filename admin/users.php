<?php
include "header.php";

?>

<div class="page-heading">
    <h3>All Users Information</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12 col-md-12">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Profile Views</h6>
                                    <h6 class="font-extrabold mb-0">112.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Followers</h6>
                                    <h6 class="font-extrabold mb-0">183.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Following</h6>
                                    <h6 class="font-extrabold mb-0">80.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Save post</h6>
                                    <h6 class="font-extrabold mb-0">100</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content start here -->
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    if ($_SESSION['role'] == 1) {
                        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

                        if ($do == 'Manage') {
                            #Manage user code start
                    ?>
                    <div class="card card-success">
                        <div class="card-header">
                            <h4>All Users Info</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-dark table-striped">
                                <thead>
                                    <th>SL.</th>
                                    <th>Avater</th>
                                    <th>Full Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>User Role</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                            $select_query = "SELECT * FROM users";
                                            $result = mysqli_query($db, $select_query);
                                            $count = 0;
                                            while ($row =  mysqli_fetch_assoc($result)) {
                                                $id = $row['id'];
                                                $name = $row['name'];
                                                $username =    $row['username'];
                                                $email =    $row['email'];
                                                $password =   $row['password'];
                                                $phone =   $row['phone'];
                                                $adress =   $row['address'];
                                                $role =   $row['role'];
                                                $image =   $row['image'];
                                                $count++;
                                            ?>
                                    <tr>
                                        <td>
                                            <?php echo $count; ?>
                                        </td>
                                        <td>
                                            <?php
                                                        if (empty($image)) {
                                                        ?>
                                            <img src="assets/images/users/default.jpg" alt="defaultimg"
                                                class="img-avater">
                                            <?php
                                                        } else {
                                                        ?>
                                            <img src="assets/images/users/<?php echo $image; ?>" alt="avaterimg"
                                                class="img-avater">
                                            <?php
                                                        }
                                                        ?>
                                        </td>
                                        <td>
                                            <?php echo $name; ?>
                                        </td>
                                        <td>
                                            <?php echo $username; ?>
                                        </td>
                                        <td>
                                            <?php echo $email; ?>
                                        </td>
                                        <td>
                                            <?php

                                                        if (empty($phone)) {
                                                            echo "Empty";
                                                        } else {
                                                            echo $phone;
                                                        }

                                                        ?>
                                        </td>
                                        <td>
                                            <?php
                                                        if (empty($adress)) {
                                                            echo "Empty";
                                                        } else {
                                                            echo $adress;
                                                        }
                                                        ?>
                                        </td>
                                        <td>
                                            <?php

                                                        if ($role == 1) {
                                                        ?>
                                            <span class="badge bg-success">Super Admin</span>
                                            <?php
                                                        } else {
                                                        ?>
                                            <span class="badge bg-primary">Editor</span>
                                            <?php
                                                        }

                                                        ?>
                                        </td>
                                        <td> <a href="" data-bs-toggle="modal"
                                                data-bs-target="#delete<?php echo $id ?>"><i
                                                    class="bi bi-trash cicon"></i></a>
                                            <a href="users.php?do=Edit&id=<?php echo $id; ?>"><i
                                                    class="bi bi-pencil sicon "></i></a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="delete<?php echo $id ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are You Sure
                                                                Want To Delete The user?</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <a href="users.php?do=Delete&deleteUser=<?php echo $id ?>"
                                                                class="btn btn-danger">yes</a>
                                                            <a href="" class="btn btn-primary"
                                                                data-bs-dismiss="modal">No</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <?php
                                            }
                                            ?>

                                </tbody>

                            </table>
                            <div class="col-md-12 col-lg-12">
                                <a href="users.php?do=Add" class="btn btn-success btn-block">
                                    Add New User
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php

                            #Manage user code End
                        } else if ($do == 'Add') {
                            //addd new user by admin
                        ?>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-titile">Register New users</h3>
                        </div>
                        <div class="card-body">
                            <form action="users.php?do=Insert" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" id="username" class="form-control"
                                                autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Full Name</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone No</label>
                                            <input type="text" name="phone" id="phone" class="form-control"
                                                autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" id="address" class="form-control"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="password">Passowrd</label>
                                            <input type="password" name="password" id="password" class="form-control"
                                                autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="retypepassword">Retype Passowrd</label>
                                            <input type="password" name="retypepassword" id="retypepassword"
                                                class="form-control" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>User Role</label>
                                            <select class="form-select" name="role">
                                                <option selected>Select Role</option>
                                                <option value="0">Editor</option>
                                                <option value="1">Super Admin</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload User Avater</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <div class="form-group">

                                            <input type="submit" name="register" class="btn btn-primary"
                                                value="Register User">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                        } else if ($do == "Insert") {
                            //    insert code
                            if (isset($_POST['register'])) {
                                $username = $_POST['username'];
                                $name = $_POST['name'];
                                $email = $_POST['email'];
                                $phone = $_POST['phone'];
                                $address = $_POST['address'];
                                $password = $_POST['password'];
                                $retypepassword = $_POST['retypepassword'];
                                $role = $_POST['role'];
                                $profile_img = $_FILES['image']['name'];
                                $profile_tmp = $_FILES['image']['tmp_name'];

                                if ($password == $retypepassword) {
                                    # encripted pass
                                    $hassedpass = sha1($password);

                                    #image file name chnage and move image to the folder

                                    $rand_number = rand(0, 1000000);
                                    $image_file = $rand_number . $profile_img;
                                    move_uploaded_file($profile_tmp, "assets/images/users/" .  $image_file);

                                    $insert_query = "INSERT INTO users(name, username, email, password, phone, address, role, image) VALUES('$name','$username','$email','$hassedpass','$phone','$address','$role','$image_file')";
                                    $register_users = mysqli_query($db, $insert_query);
                                    if ($register_users) {
                                        header('Location: users.php');
                                    } else {
                                        die("Users insert error!!" . mysqli_error($db));
                                    }
                                }
                            }
                        } else if ($do == 'Edit') {
                            // edit code start here
                            if (isset($_GET['id'])) {
                                $users_id = $_GET['id'];
                                $users_edit_quray = "SELECT * FROM users WHERE id =' $users_id'";
                                $edit_result = mysqli_query($db, $users_edit_quray);

                                while ($row = mysqli_fetch_assoc($edit_result)) {
                                    $id =    $row['id'];
                                    $name =    $row['name'];
                                    $username =    $row['username'];
                                    $email =    $row['email'];
                                    $phone =    $row['phone'];
                                    $address =    $row['address'];
                                    $role =    $row['role'];
                                    $image =    $row['image'];
                            ?>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-titile">Edit User Info</h3>
                        </div>
                        <div class="card-body">
                            <form action="users.php?do=Update" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" id="username" class="form-control"
                                                autocomplete="off" value="<?php echo $username; ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Full Name</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                autocomplete="off" value="<?php echo $name; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                autocomplete="off" value="<?php echo $email; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone No</label>
                                            <input type="text" name="phone" id="phone" class="form-control"
                                                autocomplete="off" value="<?php echo $phone; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" id="address" class="form-control"
                                                autocomplete="off" value="<?php echo $address; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="password">Passowrd</label>
                                            <input type="password" name="password" id="password" class="form-control"
                                                autocomplete="off" placeholder="Please Enter New password">
                                        </div>
                                        <div class="form-group">
                                            <label for="retypepassword">Retype Passowrd</label>
                                            <input type="password" name="retypepassword" id="retypepassword"
                                                class="form-control" autocomplete="off"
                                                placeholder="Re Enter your password">
                                        </div>
                                        <div class="form-group">
                                            <label>User Role</label>
                                            <select class="form-select" name="role">
                                                <option value="0" <?php if ($role == 0) {
                                                                                        echo "selected";
                                                                                    }; ?>>Editor
                                                </option>
                                                <option value="1" <?php if ($role == 1) {
                                                                                        echo "selected";
                                                                                    }; ?>>Super
                                                    Admin</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="d-block">Upload User Avater</label>
                                            <?php

                                                            if (!empty($image)) {
                                                            ?>
                                            <img src="assets/images/users/<?php echo $image; ?>" alt=""
                                                style="width: 80px; height: 80px; margin-bottom:5px;" class="d-block">
                                            <?php
                                                            } else {
                                                            ?>
                                            <img src="assets/images/users/default.jpg" alt=""
                                                style="width: 80px; height: 80px; margin-bottom:5px;" class="d-block">
                                            <?php
                                                            }

                                                            ?>

                                            <input type="file" name="image" class="form-control-file">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="update" value="<?php echo $users_id ?>">
                                            <input type="submit" name="save" class="btn btn-primary"
                                                value="Update User">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                                }
                            }
                        } else if ($do == 'Update') {
                            // echo "Update user informations";
                            if (isset($_POST['update'])) {
                                # code...
                                $the_update_id = $_POST['update'];
                                $name = $_POST['name'];
                                $email = $_POST['email'];
                                $phone = $_POST['phone'];
                                $address = $_POST['address'];
                                $password = $_POST['password'];
                                $retypepassword = $_POST['retypepassword'];
                                $role = $_POST['role'];
                                $profile_img = $_FILES['image']['name'];
                                $profile_tmp = $_FILES['image']['tmp_name'];

                                //for password php code
                                if (!empty($password)) {
                                    if ($password == $retypepassword) {
                                        # encripted pass
                                        $hassedpass = sha1($password);
                                        $sql = "UPDATE users SET password = '$hassedpass' WHERE id ='$the_update_id' ";
                                        $update_pass = mysqli_query($db,  $sql);
                                    }
                                }
                                //for image code
                                if (!empty($profile_img)) {

                                    //Delete images from folder and database

                                    $del_id = $_GET['deleteUser'];

                                    //Delete images from folder and database
                                    $delete_img_query = "SELECT * FROM users WHERE id ='$del_id'";
                                    $del_img = mysqli_query($db, $delete_img_query);
                                    while ($row = mysqli_fetch_assoc($del_img)) {
                                        $user_img = $row['image'];
                                    }
                                    unlink("assets/images/users/$user_img");


                                    $rand_number = rand(0, 1000000);
                                    $imageFile = $rand_number . $profile_img;
                                    move_uploaded_file($profile_tmp, "assets/images/users/" . $imageFile);

                                    $sql = "UPDATE users SET name='$name',email ='$email',phone='$phone',address ='$address',role ='$role',image ='$imageFile' WHERE id ='$the_update_id' ";
                                    $update_info = mysqli_query($db, $sql);
                                    if ($update_info) {
                                        header("Location: users.php?do=Manage");
                                    } else {
                                        die("Update faild" . mysqli_error($db));
                                    }
                                } else {
                                    $sql = "UPDATE users SET name='$name',email ='$email',phone='$phone',address ='$address',role ='$role' 
                                    WHERE id ='$the_update_id' ";
                                    $update_info = mysqli_query($db, $sql);
                                    if ($update_info) {
                                        header("Location: users.php?do=Manage");
                                    } else {
                                        die("Update faild" . mysqli_error($db));
                                    }
                                }
                            }
                        } else if ($do == 'Delete') {
                            // Delete

                            if (isset($_GET['deleteUser'])) {
                                $del_id = $_GET['deleteUser'];

                                //Delete images from folder and database
                                $delete_img_query = "SELECT * FROM users WHERE id ='$del_id'";
                                $del_img = mysqli_query($db, $delete_img_query);
                                while ($row = mysqli_fetch_assoc($del_img)) {
                                    $user_img = $row['image'];
                                }
                                unlink("assets/images/users/$user_img");

                                //Delete users from data base
                                $delete_query = "DELETE FROM users WHERE id ='$del_id'";
                                $res = mysqli_query($db, $delete_query);

                                if ($res) {
                                    header('Location: users.php?do=Manage');
                                } else {
                                    die(" Delete Error!!" . mysqli_error($db));
                                }
                            }
                        }
                    } else {
                        echo '<div class="alert alert-danger" role="alert">You Don\'t have Access to this page</div>';
                    }



                    ?>
                </div>
            </div>
            <!-- content end here -->
        </div>
    </section>
</div>


<?php
include "footer.php";
?>