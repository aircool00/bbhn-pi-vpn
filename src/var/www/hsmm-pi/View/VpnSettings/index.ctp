<h2>VPN Settings</h2>
<span class="pull-right">
  <?php echo $this->Form->submit(__('Apply Settings'), array('name' =>'submit', 'div' => false, 'class' => 'btn ntm-primary')); ?>
</span>
<br>
 <h4>VPN Client settings</h4>
<table>
 <tr>
	<th>Enabled</th>
	<th>Password</th>
	<th>Client IP Address</th>
	<th>Server IP Address</th>
	<th>Status</th>
	<th>Action</th>
</tr>
	<?php foreach ($vpnclients as $vpnclient): ?>
        
	<tr>
	<td><?php echo $vpnclient ['VpnClient']['enabled']; ?> </td>
        <td><?php echo $vpnclient ['VpnClient']['password']; ?> </td>
        <td><?php echo $vpnclient ['VpnClient']['client_ip']; ?> </td>
        <td><?php echo $vpnclient ['VpnClient']['server_ip']; ?> </td>
        <td>online</td>
        <td><?php echo $this->Html->link('Edit', array('action'=>'editclient', $vpnclient ['VpnClient']['id'])); ?></td>
</tr>
        <?php endforeach ?>

</table>
<br> </br>

<h4>Server Client settings</h4>
<table>
	<tr>
		<th>Enabled</th>
		<th>Client Callsign</th>
		<th>Password</th>
		<th>Client IP Address</th>
		<th>Server IP Address</th>
		<th>Status</th>
		<th>Action</th>
	</tr>
	<?php foreach ($vpnsettings as $vpnsetting): ?>
	<tr>	
		<td><?php echo $vpnsetting ['VpnSetting']['enabled']; ?> </td>
		<td><?php echo $vpnsetting ['VpnSetting']['callsign']; ?> </td>
		<td><?php echo $vpnsetting ['VpnSetting']['password']; ?> </td>
		<td><?php echo $vpnsetting ['VpnSetting']['client_ip']; ?> </td>
		<td><?php echo $vpnsetting ['VpnSetting']['server_ip']; ?> </td>
		<td>online</td>
		<td>
		<?php echo $this->Html->link('Edit', array('action'=>'edit', $vpnsetting ['VpnSetting']['id'])); ?> 	
		<?php echo $this->Html->link('Delete', array('action'=>'delete', $vpnsetting ['VpnSetting']['id']), NULL, 'Are you sure you want to delete this client?'); ?> 
		<?php echo $this->Html->link('Email', array('action'=>'email', $vpnsetting ['VpnSetting']['id'])); ?>
	</td>
	</tr>

	<?php endforeach; ?>
</table>
<p> <?php echo $this->Html->link('Add a Client  ', array('action'=>'add')); ?></p>
<br> </br>

<h4>Server Settings</h4>
<table>
	<tr>
		<th>Virtual Tunnel Server Network</th>
		<th>Outside WAN VPN server port</th>
		<th>Action</th>	

	</tr>
	<?php foreach ($vpnservers as $vpnserver): ?>
        <td><?php echo $vpnserver ['VpnServer']['server_network']; ?> </td>
        <td><?php echo $vpnserver ['VpnServer']['server_port']; ?> </td>
        
        <td><?php echo $this->Html->link('Edit', array('action'=>'editvpn', $vpnserver ['VpnServer']['id'])); ?></td>

        <?php endforeach ?>
	
	
	<?php
echo $this->Form->end();
    ?>
