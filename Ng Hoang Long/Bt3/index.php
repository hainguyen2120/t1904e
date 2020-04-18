<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

  </head>

  <body>
	<?php
	session_start();
	$check_session = isset($_SESSION['user_name']) ? true : false;

	if(!$check_session) {
		header("Location: login.php");
	}


	?>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
			<li class="nav-item">
              <a class="nav-link" href="add.php">Add</a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
			<li class="nav-item">
				<!--<form method="POST" action="logout.php">
					<input type="submit" value="Logout" />
				</form>-->

              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">Shop Name</h1>
          <div class="list-group">
            <a href="#" class="list-group-item">Category 1</a>
            <a href="#" class="list-group-item">Category 2</a>
            <a href="#" class="list-group-item">Category 3</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9" style="margin-top: 10px">



          <div class="row">

			<?php
			include "dbconnection.php";
			$employee = getAllEmployees();

			$item_per_page = 3;
			$total_page = count($employee) / $item_per_page;

			$curent_page = isset($_GET['page']) ? $_GET['page'] : 1;

			$start = $item_per_page * ($curent_page - 1);
			$end = $start + $item_per_page;


			for($i = $start; $i < $end && $i < count($employee); $i++) {
				$employee = $employees[$i];
			?>


            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#"> <?php echo $employee['name']?> </a>
                  </h4>
                  <h5><?php echo $product['email']?></h5>
                  <h5><?php echo $product['address']?></h5>
                  <h5><?php echo $product['phone']?></h5>
                </div>
                <div class="card-footer">
					<a href="edit.php?id=<?php echo $employee['id']?>">Sửa</a>
					<!-- <a href="delete.php?id=<?php echo $product['id']?>">Xóa</a> -->
          <form class="" action="delete.php" method="GET" onsubmit="return confirm('Sure ?');" >
            <input type="hidden" name="id" value="<?php echo $employee['id'] ?>">
            <input type="submit" name="" value="Xoa">
          </form>
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

			<?php } ?>









          </div>
          <!-- /.row -->

			<nav aria-label="Page navigation example">
			  <ul class="pagination">
				<li class="page-item"><a class="page-link" href="#">Previous</a></li>
				<?php
				for($p = 0; $p < $total_page; $p++) {
				?>
					<li class="page-item">
						<a class="page-link" href="index.php?page=<?php echo $p + 1?>">  <?php echo $p + 1?> </a>
					</li>
				<?php
				}
				?>
				<li class="page-item"><a class="page-link" href="#">Next</a></li>
			  </ul>
			</nav>

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
