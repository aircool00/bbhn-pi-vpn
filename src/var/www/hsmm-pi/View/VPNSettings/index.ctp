<!-- File: /app/View/VPNsettings/index.ctp -->

<div class="page-header">
  <p><h1>VPN Settings</h1></p>
</div>

<table class="table table-striped">
        <colgroup>
            <col class="col-md-1">
            <col class="col-md-1">
            <col class="col-md-1">
            <col class="col-md-1">
            <col class="col-md-1">
            <col class="col-md-1"> 
        </colgroup>
        <tbody>
        <tr>
	    <th>Clent Number</th>		
            <th>Enabled</th>
            <th>Client</th>
            <th>Password</th>
            <th>IP Address</th>  
            <th>Active</th>
            <th>Action</th> 
        </tr>
		
		<tr>
		<td>Client 1</td>
		<td>
		<?php
			echo $this->Form->input('mesh_olsrd_secure', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
 		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('mesh_olsrd_secure', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>email</td>
		</tr>
		
		
		<tr>	
		<td>Client 2</td>
		<td>
		<?php
			echo $this->Form->input('mesh_olsrd_secure', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('mesh_olsrd_secure', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>email</td>
		</tr>
		
		
		<tr>
		<td>Client 3</td>
		<td>
		<?php
			echo $this->Form->input('mesh_olsrd_secure', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('mesh_olsrd_secure', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>email</td>
		</tr>

		
		<tr>
        <td>Client 4</td>
		<td>
		<?php
			echo $this->Form->input('mesh_olsrd_secure', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('mesh_olsrd_secure', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>email</td>
		</tr>
		
		
		<tr>
        <td>Client 5</td>
		<td>
		<?php
			echo $this->Form->input('mesh_olsrd_secure', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('mesh_olsrd_secure', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>email</td>
		</tr>
		
		
		<tr>
        <td>Client 6</td>
		<td>
		<?php
			echo $this->Form->input('mesh_olsrd_secure', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('mesh_olsrd_secure', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>email</td>
		</tr>
		
		
		<tr>
        <td>Client 7</td>
		<td>
		<?php
			echo $this->Form->input('mesh_olsrd_secure', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('mesh_olsrd_secure', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>email</td>
		</tr>
		
		
		<tr>
        <td>Client 8</td>
		<td>
		<?php
			echo $this->Form->input('mesh_olsrd_secure', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('mesh_olsrd_secure', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>email</td>
        </tr>
		
		
		<tr>
        <td>Client 9</td>
		<td>
		<?php
			echo $this->Form->input('mesh_olsrd_secure', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('mesh_olsrd_secure', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>email</td>
		</tr>
		
		
		<tr>
        <td>Client 10</td>
		<td>
		<?php
			echo $this->Form->input('mesh_olsrd_secure', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('mesh_olsrd_secure', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>email</td>
        </tr>

        </tbody>
    </table>
