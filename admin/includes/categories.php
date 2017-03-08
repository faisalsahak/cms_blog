<?php include "admin_header.php" ?>

<body>

  <div id="wrapper">
    <!-- Navigation -->
    <?php include "admin_navigation.php" ?>

    <div id="page-wrapper">

      <div class="container-fluid">
          <!-- Page Heading -->
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">
              Welcome To Dashboard
              <small>Author</small>
            </h1>
            <div class="col-xs-6">
              <?php
                if(isset($_POST['submit'])){
                  $cat_title = $_POST['cat-title'];
                  if($cat_title == "" || empty($cat_title)){
                    echo "<h1>This field cannot be empty</h1>";
                  }else{
                    $query = "INSERT INTO categories(cat_title) VALUE('{$cat_title}')";
                    $send_category = mysqli_query($connection, $query);
                    if(!$send_category){
                      die("Failed Query ". mysqli_error($connection));
                    }
                  }
                }

               ?>

              <form action="" method="post">
                <div class="form-group">
                  <lable for="cat-title">Category</lable>
                  <input type="text" class="form-control" name="cat-title" />
                </div>
                <div class="form-group">
                  <input class="btn btn-primary" type="submit" name="submit" value="Add Category"/>
                </div>
              </form>
            </div>


            <div class="col-xs-6">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Category Title</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                    $query = "SELECT * FROM categories";
                    $display_categories = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($display_categories)){
                      $cat_title = $row['cat_title'];
                      $cat_id = $row['id'];

                      echo "<tr>";
                      echo "<td>{$cat_id}</td>";
                      echo "<td>{$cat_title}</td>";
                      echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                      echo "</tr>";
                    }

                    if(isset($_GET['delete'])){
                      $cat_id = $_GET['delete'];
                      $query = "DELETE FROM categories WHERE id LIKE {$cat_id} ";
                      $delete_categorie = mysqli_query($connection, $query);
                      header("Location: categories.php");
                    }
                    ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>
          <!-- /.row -->

      </div>
        <!-- /.container-fluid -->

    </div>
      <!-- /#page-wrapper -->

  </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
