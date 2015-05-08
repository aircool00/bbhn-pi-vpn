<h2>VPN Settings</h2>

<table>
	<tr>
		<th>Enabled</th>
		<th>Client Callsign</th>
		<th>Password</th>
		<th>Client IP Address</th>
		<th>Server IP Address</th>
		<th>Action</th>
	</tr>
	<?php foreach ($vpnsettings as $vpnsetting): ?>
	<tr>	
		<td><?php echo $vpnsetting ['VpnSetting']['enabled']; ?> </td>
		<td><?php echo $vpnsetting ['VpnSetting']['callsign']; ?> </td>
		<td><?php echo $vpnsetting ['VpnSetting']['password']; ?> </td>
		<td><?php echo $vpnsetting ['VpnSetting']['client_ip']; ?> </td>
		<td><?php echo $vpnsetting ['VpnSetting']['server_ip']; ?> </td>
		<td>
		<?php echo $this->Html->link('Edit', array('action'=>'edit', $vpnsetting ['VpnSetting']['id'])); ?>
		<?php echo $this->Html->link('Delete', array('action'=>'delete', $vpnsetting ['VpnSetting']['id']), NULL, 'Are you sure you want to delete this client?'); ?>
		</td>	

	</tr>

	<?php endforeach; ?>
</table>
<p> <?php echo $this->Html->link('Add a Client', array('action'=>'add')); ?></p>
