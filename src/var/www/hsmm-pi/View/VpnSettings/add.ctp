<h2>Add A New VPN Client to the Server</h2>

<?php

echo $this->Form->create('VpnSetting', array('action' => 'add'));
echo $this->Form->input('enabled');
echo $this->Form->input('callsign');
echo $this->Form->input('password');
echo $this->Form->input('client_ip');
echo $this->Form->input('server_ip');
echo $this->Form->end('Save Client Data');


?>
<?php
echo $this->Form->end();
    ?>