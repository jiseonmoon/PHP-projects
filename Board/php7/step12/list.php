<?php
session_start();

include __DIR__ . '/inc.common.php';

if ($_SESSION['user_id'] == '') {
	header('Location: login.php');
	exit;
}

if (strpos($_SESSION['priv'], 'L') === false) {
	header('Location: priv.php');
	exit;
}

$query = " SELECT * FROM tb_boards ORDER BY no desc ";
$result = mysqli_query($conn, $query);

if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		$aRet[] = $row;
	}
	mysqli_free_result($result);
}
$aAssign['list'] = $aRet;
?>
<html>

<head>
	<link rel="stylesheet" href="../css/common.css">
</head>

<body>
	<div class="header">
		<h3>게시판 목록</h3>
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
				<thead>
					<tr>
						<th>번호</th>
						<th>제목</th>
						<th>작성자</th>
						<th>조회수</th>
						<th>작성일</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($aAssign['list'] as $row) {
					?>
						<tr>
							<td><?= $row['no'] ?></td>
							<td><a href="view.php?no=<?= $row['no'] ?>"><?= $row['bd_title'] ?></a></td>
							<td><?= $row['bd_writer'] ?></td>
							<td><?= $row['bd_hit'] ?></td>
							<td><?= $row['bd_rgst_dt'] ?></td>
						</tr>
					<?php
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