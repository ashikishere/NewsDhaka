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
                                        <td><?php echo $count; ?></td>
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
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $phone; ?></td>
                                        <td><?php echo $adress; ?></td>
                                        <td><?php echo $role; ?></td>
                                        <td> <a href="#"><i class="bi bi-trash cicon"></i></a>
                                            <a href="#"><i class="bi bi-pencil sicon "></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                        ?>

                                </tbody>

                            </table>
                        </div>
                    </div>
                    <?php

                        #Manage user code End
                    } else if ($do == 'Add') {
                        echo "Add user inforamtions";
                    } else if ($do == "Insert") {
                        echo "Insert user informations";
                    } else if ($do == 'Edit') {
                        echo "Edit user informations";
                    } else if ($do == 'Update') {
                        echo "Update user informations";
                    } else if ($do == 'Delete') {
                        echo "Delete user informations";
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