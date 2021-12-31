<?php
include "header.php";

?>
<style>
.cicon:hover {
    color: red;
}

.sicon:hover {
    color: green;
}
</style>
<div class="page-heading">
    <h3>All Categories Information</h3>
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
    </section>
    <div class="row">
        <div class="col-12 col-lg-7 col-md-7">
            <div class="card">
                <div class="card-header">
                    <h4>Add New Category</h4>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <input type="text" name="cat_name" class="form-control" placeholder="Category Name"
                                required>
                            <textarea name="cat_desc" class="form-control my-3" rows="4"
                                placeholder="Category Description" required></textarea>
                            <label for="select" class="my-2">Select Category Status</label>
                            <select class="form-select" name="c_status" required>
                                <optgroup label="Select Status">
                                    <option value="1" selected>Active</option>
                                    <option value="0">inactive</option>
                                </optgroup>

                            </select>
                            <input type="submit" class="btn btn-md btn-success mt-3" value="Submit" name="submit_btn">
                        </div>
                    </form>


                    <?php 

                    // adding file to data base
        
        if(isset($_POST['submit_btn'])){
           $categ_name= $_POST['cat_name'];
           $categ_desc= $_POST['cat_desc'];
           $categ_status = $_POST['c_status'];
        //    echo $categ_name.' '.$categ_desc;

        $insert_query  = "INSERT INTO category (c_name,c_desc,c_status) VALUE ('$categ_name','$categ_desc','$categ_status')";
         $result = mysqli_query($db, $insert_query);

         if($result){
            header('Location: category.php');
         }else{
            die("Category insert error!!".mysqli_error($db));
         }

        }
        
        
        ?>

                </div>
            </div>
        </div>
        <div class="col-12 col-lg-5 col-md-5">
            <div class="card">
                <div class="card-header">
                    <h4>All categories</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                // reading file from data base
                                
                                $query= "SELECT * FROM category";
                                $result= mysqli_query($db, $query);
                                $count = 0;
                                
                                while ($row =  mysqli_fetch_assoc($result)) {
                                  $cat_id  =$row['c_id'];
                                  $cat_name=  $row['c_name'];
                                  $cat_desc=  $row['c_desc'];
                                  $cat_status=  $row['c_status'];
                                  $count++

                                //   echo $cat_id.' '.$cat_name.' '.$cat_desc.'<br>' ;
                                ?>
                                <tr>
                                    <td class="text-bold-500"><?php echo $count ?></td>
                                    <td class="text-bold-500"><?php echo $cat_name ?></td>
                                    <td class="text-bold-500">
                                        <?php 
                                        
                                        if($cat_status == 1){
                                            echo '<div class= "badge bg-success">active</div>';
                                        }else{
                                            echo '<div class= "badge bg-danger">inactive</div>';
                                        }
                                        
                                        ?>
                                    </td>
                                    <td class="text-bold-500">
                                        <!-- Button trigger modal -->
                                        <a href="" data-bs-toggle="modal"
                                            data-bs-target="#delete<?php echo $cat_id ?>"><i
                                                class="bi bi-trash cicon"></i></a>
                                        <a href="category.php?edit_id=<?php echo $cat_id ?>"><i
                                                class="bi bi-pencil sicon "></i></a>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="delete<?php echo $cat_id ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Are You Sure want to
                                                    Delete?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <a href="category.php?delete_id=<?php echo $cat_id ?>"
                                                    class="btn btn-danger">yes</a>
                                                <a href="" class="btn btn-primary" data-bs-dismiss="modal">No</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
                                
                                //Deleted item

                                if(isset($_GET['delete_id'])){
                                    $item_id = $_GET['delete_id'];

                                    $delete_query = "DELETE FROM category WHERE c_id ='$item_id'";
                                    $res = mysqli_query($db, $delete_query);

                                    if($res){
                                        header('Location: category.php');
                                    }else{
                                        die("category Delete Error!!".mysqli_error($db));
                                    }
                                }
                                
                                ?>

</div>

<?php
include "footer.php";
?>