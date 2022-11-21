<?php
    // memulai session yang disimpan pada browser
    session_start();

    //cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
    if($_SESSION['status']!="sudah_login"){
    //melakukan pengalihan
    header("location:formlogin.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/style-beta.css">
	<link rel="icon" type="image/png" href="assets/icon/favicon.png">
	<title>Account | just ramen</title>
</head>
<body>

	<?php
		require_once('koneksi.php');
		$sql = "SELECT * FROM toko";
		$result = mysqli_query($koneksi,$sql);
	?>

	<!-- SIDEBAR -->
	<section id="sidebar" class="hide">
		<ul class="side-menu top ps-0">
			<li class="active">
				<a href="account.php">
					<i class='bx bxs-user-badge'></i>
					<span class="text">Accounts</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu ps-0">
			<li>
				<a href="logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>

			<div class="ml-auto">
				<p class="title mb-0">Laundry Management System</p>
			</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Data</h1>
				</div>

				<button type="button" class="btn btn-green mt-2" data-bs-toggle="modal" data-bs-target="#addAccount">
				  <span><i class='bx bx-plus me-1' ></i></span>Tambah
				</button>

				<!-- Modal -->
				<div class="modal fade" id="addAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
				    <div class="modal-content" style="border: none; border-radius: 20px;">
				      <div class="modal-header">
				        <h5 class="modal-title">Tambah Data</h5>
				      </div>
				      <div class="modal-body">
								<form id="accountForm" method="POST" action="process/account_db/insert_data.php">
									<div class="">
										<input type="text" name="id" hidden>
									</div>
									<div class="mb-3">
								    <label for="name" class="form-label">Username</label>
								    <input type="text" name="username" class="form-control" id="name" required>
								  </div>
								  <div class="mb-3">
								    <label for="password" class="form-label">Password</label>
								    <input type="password" name="password" class="form-control" id="password" required>
								  </div>
								  <div class="mb-3">
								    <label for="Level" class="form-label">Level</label>
								    <input type="Level" name="Level" class="form-control" id="Level" required>
								  </div>
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
								  <button type="submit" id="submit" class="btn btn-green float-end">Add</button>
								</form>
				      </div>
				    </div>
				  </div>
				</div>
			</div>

			<div class="table-data">
				<div class="order">
					<table id="table">
						<thead class="">
							<tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Level</th>
                            <th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 
                            // $no = 1;
                            while($toko = mysqli_fetch_assoc($result)) { ?>
								<tr>
                                    <!-- <td><?php echo $no++; ?></td> -->
                                    <td><?php echo $toko['iduser']; ?></td>
                                    <td><?php echo $toko['username']; ?></td>
                                    <td><?php echo $toko['password']; ?></td>
                                    <td><?php echo $toko['level']; ?></td>
									<td class="text-center">
										<a class="btn btn-edit me-2" href="process/account_db/update_data_form.php?id=<?php echo $toko['iduser']; ?>"><i class="bx bxs-edit"></i></a>
										<a class="btn btn-danger" href="process/account_db/delete_data.php?id=<?php echo $toko['iduser']; ?>"><i class="bx bxs-trash"></i></a>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js" charset="utf-8"></script>
	<script type="text/javascript">
			$(document).ready( function () {
			$('#table').DataTable({
				pageLength: 5,
				lengthMenu: [[5, 10, 20, -1], [5, 10, 15, 'All']],
				paging: true,
				searching: true,
				ordering: true,
				stateSave: true,
				language: {
					search: '',
					searchPlaceholder: "Search",
					"lengthMenu": "Show _MENU_" },
			});
		} );
	</script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
	<script src="js/script.js"></script>
</body>
</html>
