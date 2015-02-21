<?php if(!defined('ADMIN')) die("Access denied!");?>
		<h2>Users</h2>
		<table>
			<thead>
		        <tr>
		            <td></td>
		            <th>Username</th>
		            <th>Email</th>
		            <th>Connected</th>
		            <th>Type</th>
		            <th>Status</th>
		            <th>Joined</th>
		            <th>Actions</th>
		        </tr>
			</thead>
			<tbody>
			<?php 
			$users = User::GetUsers();
			if($users):
				$nr = 1;
				foreach ($users as $user) {?>
					<tr>
						<td><?php echo $nr;?></td>
			            <td><a href="../user/profile.php?id=<?php echo $user->Get('id'); ?>"><?php echo $user->Get('username'); ?></a></td>
			            <td><?php echo $user->Get('email');?></td>
			            <td><?php echo $user->Get('social_type');?></td>
			            <td><?php echo $user->Get('user_type');?></td>
			            <td><?php echo ($user->Get('activation_state') == '1') ? 'activated' : 'unactivated'; ?></td>
			            <td><?php echo substr($user->Get('join_date'), 0, 10); ?></td>
			            <td>
						    <a href="?page=edituser&id=<?php echo $user->Get('id'); ?>">Edit</a>
						    <a href="?page=compose&id=<?php echo $user->Get('id'); ?>">Mail</a>
						    <a href="?page=delete&id=<?php echo $user->Get('id'); ?>">Delete</a>
					    </td>
					</tr>
				<?php $nr++;}
				endif; ?>
			</tbody>
		</table>
	</div>
</div>
