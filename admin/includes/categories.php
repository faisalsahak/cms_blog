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
              <form action="">
                <div class="form-group">
                  <lable for="cat-title">Category</lable>
                  <input type="text" class="form-control" name="cat-title" />
                </div>
                <div class="form-group">
                  <input class="btn btn-primary" type="submit" name="submit" value="Add Category"/>
                </div>
              </form>
            </div>

            <?php
              $query = "SELECT * FROM categories";
              $display_categories = mysqli_query($connection, $query);
             ?>

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
                      while($row = mysqli_fetch_assoc($display_categories)){
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['id'];

                        echo "<tr>";
                        echo "<td>{$cat_id}</td>";
                        echo "<td>{$cat_title}</td>";
                        echo "</tr>";
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
