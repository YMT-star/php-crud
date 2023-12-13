<?php
session_start();
require "connect.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>index page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    .container {
        padding: 50px;
    }
    </style>
</head>

<body>
    <div class=" container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="card-title">Post List</h2>
                            </div>

                            <div class="col-md-6  ">
                                <a href="post-create.php" class="btn btn-primary float-end ">+ Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if(isset($_SESSION["successMsg"])): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php 
                                    echo $_SESSION["successMsg"]; 
                                    unset($_SESSION["successMsg"]); 
                            ?>
                            <button type="button" class="close float-end border-0" data-dismiss="alert"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php endif ?>
                        <table class="table table-bordered">
                            <thead>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th class="text-center">Action</th>
                            </thead>
                            <tbody>
                                <!-- SLECT (column1,column2,...) FORM posts -->
                                <?php
                                    $query = "SELECT * FROM posts";
                                    $posts = mysqli_query($db,$query);
                                foreach($posts as $post){
                                ?>
                                <tr>
                                    <td><?php echo $post['id']; ?></td>
                                    <td><?php echo $post['title']; ?></td>
                                    <td><?php echo $post['description'];?></td>
                                    <td class="text-center">
                                        <button class="btn btn-success mx-2">
                                            <a href="post-edit.php?  postId=<?php echo $post['id']; ?>"
                                                class="text-decoration-none text-light">Edit</a>
                                        </button>
                                        <button class="delete_btn btn btn-danger mx-2">
                                            <a href="index.php? post_id_to_delete=<?php echo $post ['id'] ;?>"
                                                class="text-decoration-none text-light"
                                                onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                        </button>
                                    </td>
                                </tr>
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
    <!-- DELETE FROM tabl_name WHERE condition -->
    <?php
    if(isset($_GET['post_id_to_delete'])){
        $post_id_to_delete = $_GET["post_id_to_delete"];
        $query = "DELETE FROM posts WHERE id =$post_id_to_delete";
        mysqli_query($db,$query);
        $_SESSION["successMsg"] = "A post delete successfully";
        header("location:index.php");
    }
    
    ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>