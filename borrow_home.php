<?php include "php/read_borrow_home.php"; ?>
<?php include "resource/env/header.php"; ?>



<body>
<?php include "resource/env/navbar.php"; ?>

	<div class="container">
		<div class="my-4">
			<h4 class="display-4 text-left">ยืม&คืน</h4>
		</div>

		<div class="link-right my-4">
			<a href="create.php" class="btn btn-info text-white"><i class="fas fa-plus"></i> Create</a>
		</div>
		<?php if (mysqli_num_rows($result)) { ?>
			<div class="table-responsive">
				<table class="table  table-striped table-hover border border-dark border-3 rounded shadow">
					<thead class="table-dark">
						<tr>
							<th scope="col" class="text-center">ลำดับ</th>
							<th scope="col" class="text-center">รหัสอุปกรณ์</th>
							<th scope="col" class="text-center">รหัสผู้ยืม</th>
							<th scope="col" class="text-center">วันเดือนปีที่ยืม</th>
							<th scope="col" class="text-center">ผู้อนุมัติ</th>
							<th scope="col" class="text-center">กำหนดส่ง</th>
							<th scope="col" class="text-center">สถานะ</th>
							<th scope="col" class="text-center">จัดการ</th>
						</tr>
					</thead>
					<tbody class="table-light">
						<?php
						$i = 0;
						while ($rows = mysqli_fetch_assoc($result)) {
							$i++;
						?>
							<tr>
								<th scope="row"><?= $i ?></th>
								<td class="text-center"><?= $rows['device_no'] ?></td>
								<td class="text-center"><?php echo $rows['student_id']; ?></td>
								<td class="text-center"><?php echo $rows['borrow_date']; ?></td>
								<td class="text-center"><?php echo $rows['t_name']; ?></td>
								<td class="text-center"><?php echo $rows['return_date']; ?></td>
								<td class="text-center">
									<?php
									$r = $rows['borrow_status'];
									if ($r == 0) {
										echo "ว่าง";
									} else {
										echo "ไม่ว่าง";
									}
									?>
								</td>
								<td class="text-center">
									<div class="d-grid gap-2 px-3">
										<a href="update.php?id=<?= $rows['b_id'] ?>" class="btn btn-success btn-md"> <i class="fas fa-edit"></i> Update</a>
										<a href="php/delete.php?id=<?= $rows['b_id'] ?>" class="btn btn-danger btn-md"> <i class="fas fa-minus-circle"></i> Delete</a>
									</div>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		<?php } ?>
	</div>

</body>

</html>