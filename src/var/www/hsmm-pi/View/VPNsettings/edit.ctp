<h2>Edit VPN Settings</h2>

<?php
echo $this->Form->create('VpnSetting', array(=>'edit'));
echo $this->Form->input('enabled');
echo $this->Form->input('callsign');
echo $this->Form->input('passowrd');
echo $this->Form->input('client_ip');
echo $this->Form->input('server_ip');
echo $this->Form->input('id', array('type'=>'hidden'));
echo $this->Form->end('Save Settings');

?> 

