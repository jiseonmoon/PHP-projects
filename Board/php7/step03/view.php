<?php
session_start();

if ($_SESSION['user_id'] == '') {
	header('Location: login.php');
	exit;
}

$db_host    = "localhost";
$db_user    = "scott";
$db_pass    = "tiger";
$db_name    = "DB_SIM_TRK";

$conn   = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die('cannot connect to mysql.');
mysqli_set_charset($conn, "utf8");

$no		= $_GET['no'];
?>
<html>

<head>
	<link rel="stylesheet" href="../css/common.css">
</head>

<body>
	<div class="header">
		<h3>게시판 보기</h3>
	</div>

	<div class="topnav">
		<a href='../'>메뉴</a>
	</div>

	<div class="row">
		<div class="column side">
			<h2>Side</h2>
		</div>

		<div class="column middle">
			<table border='1'>
				<?php
				$query = " SELECT * FROM tb_boards WHERE no = " . $no;
				$result = mysqli_query($conn, $query);

				if ($result) {
					$row = mysqli_fetch_assoc($result);
				?>
					<thead>
					</thead>
					<tbody>
						<tr>
							<th>번호</th>
							<td><?= $row['no'] ?></td>
						</tr>
						<tr>
							<th>제목</th>
							<td><?= $row['bd_title'] ?></td>
						</tr>
						<tr>
							<th>작성자</th>
							<td><?= $row['bd_writer'] ?></td>
						</tr>
						<tr>
							<th>조회수</th>
							<td><?= $row['bd_hit'] ?></td>
						</tr>
						<tr>
							<th>작성일</th>
							<td><?= $row['bd_rgst_dt'] ?></td>
						</tr>
						<tr>
							<th>내용</th>
							<td><?= $row['bd_content'] ?></td>
						</tr>
					<?php
					mysqli_free_result($result);
				}
					?>
					</tbody>
			</table>
		</div>
	</div>

	<div class="footer">
		<p>Footer</p>
	</div>
</body>

</html>