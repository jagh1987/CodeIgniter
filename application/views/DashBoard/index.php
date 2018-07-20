<?= $MainMenu; ?>
<h2>User List	</h2>
<div class="table-responsive">
<table class="table table-bordered table-hover table-stripped">
	<thead>
		<tr>
			<th>Id</th>
			<th>User Name</th>
			<th>Name</th>
			<th>Last Name</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if(isset($users))
		{
			foreach($users->result() as $user) {
				?>
				<tr>
					<td><?= $user->id ?></td>
					<td><?= $user->userName ?></td>
					<td><?= $user->Name ?></td>
					<td><?= $user->LastName ?></td>
					<td>
						<a href="<?= base_url() ?>DashBoard/viewUser/<?= $user->id ?>" target="_self" class="btn btn-primary" title="View Details">View</a>
						<a href="<?= base_url() ?>DashBoard/deleteUser/<?= $user->id ?>" target="_self" class="btn btn-danger" title="Delete This User">Delete</a>					
					</td>
				</tr>
				<?php
				}
			}
			else {
				?>
				<tr>
					<td colspan="5">No user registered yet. Please: <a href="<?= base_url() ?>DashBoard/addUserForm" target="_self" class="btn btn-primary" title="Add New User">Add New User</a></td>
				</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			</div>