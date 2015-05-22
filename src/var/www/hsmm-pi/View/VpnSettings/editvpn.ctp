<h2>Edit VPN Settings</h2>

<?php
echo $this->Form->create('VpnServer');
echo $this->Form->input('server_port');
echo $this->Form->input('server_network');
echo $this->Form->input('id', array('type'=>'hidden'));
echo $this->Form->end('Save Settings');

?> 

<?php
echo $this->Form->end();
    ?>