<!-- File: /app/View/VPNsettings/index.ctp -->

<div class="page-header">
  <p><h1>VPN Settings</h1></p>
</div>

<span class="pull-right">
<?php echo $this->Form->submit(__('Save'), array('name' => 'submit', 'div' => false, 'class' => 'btn btn-primary')); ?>
</span>
<p></p>


<table class="table table-striped" >

        <colgroup>
                <col class="col-md-1">
                <col class="col-md-1">
                <col class="col-md-1">
                <col class="col-md-1">

        </colgroup

        <tbody>
        <tr></tr>
		<tr>
		<td>Client Settings</td>
		</tr>
        <tr>
        <th>Enabled</th>
        <th>Password</th>
        <th>Client IP Address</th>
        <th>Server IP Address</th>
        </tr>

         <td>
                <?php
                        echo $this->Form->input('client_enabled', array('label' => __(' '), 'type' => 'checkbox'));
                        ?>
        </td>

        <td>
                <?php
                        echo $this->Form->input('client_password', array('label' => __(' ')));
                        ?>
        </td>
        <td>
                <?php
                        echo $this->Form->input('client_ip', array('label' => __(' ')));
                        ?>
        </td>
        <td>
                <?php
                        echo $this->Form->input('client_server_ip', array('label' => __(' ')));
                        ?>
        </td>
</table>


	 

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
		<td>Server Settings</td>
		</tr>
				
		<tr>
	    <th>Clent Number</th>		
            <th>Enabled</th>
            <th>Client Callsign</th>
            <th>Password</th>
            <th>Client IP Address</th>  
            <th>Server IP Address</th>
            <th>Action</th> 
        </tr>
		
		<tr>
		<td>Client 1</td>
		<td>
		<?php
			echo $this->Form->input('client_one_enabled', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
 		<td>
		<?php
			echo $this->Form->input('client_one_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_password', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_ip', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_one_server_ip', array('label' => __(' ')));
			?>
		</td>
		<td>email</td>
		</tr>
		
		
		<tr>	
		<td>Client 2</td>
		<td>
		<?php
			echo $this->Form->input('client_two_enabled', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_two_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_two_password', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_two_ip', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_two_server_ip', array('label' => __(' ')));
			?>
		</td>
		<td>email</td>
		</tr>
		
		
		<tr>
		<td>Client 3</td>
		<td>
		<?php
			echo $this->Form->input('client_three_enabled', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_three_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_three_password', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_three_ip', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_three_server_ip', array('label' => __(' ')));
			?>
		</td>
		<td>email</td>
		</tr>

		
		<tr>
        <td>Client 4</td>
		<td>
		<?php
			echo $this->Form->input('client_four_enabled', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_four_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_four_password', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_four_ip', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_four_server_ip', array('label' => __(' ')));
			?>
		</td>
		<td>email</td>
		</tr>
		
		
		<tr>
        <td>Client 5</td>
		<td>
		<?php
			echo $this->Form->input('client_five_enabled', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_five_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_five_password', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_five_ip', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_five_server_ip', array('label' => __(' ')));
			?>
		</td>
		<td>email</td>
		</tr>
		
		
		<tr>
        <td>Client 6</td>
		<td>
		<?php
			echo $this->Form->input('client_six_enabled', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_six_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_six_password', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_six_ip', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_six_server_ip', array('label' => __(' ')));
			?>
		</td>
		<td>email</td>
		</tr>
		
		
		<tr>
        <td>Client 7</td>
		<td>
		<?php
			echo $this->Form->input('client_seven_enabled', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_seven_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_seven_password', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_seven_ip', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_seven_server_ip', array('label' => __(' ')));
			?>
		</td>
		<td>email</td>
		</tr>
		
		
		<tr>
        <td>Client 8</td>
		<td>
		<?php
			echo $this->Form->input('client_eight_enabled', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_eight_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_eight_password', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_eight_ip', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_eight_server_ip', array('label' => __(' ')));
			?>
		</td>
		<td>email</td>
        </tr>
		
		
		<tr>
        <td>Client 9</td>
		<td>
		<?php
			echo $this->Form->input('client_nine_enabled', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_nine_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_nine_password', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_nine_ip', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_nine_server_ip', array('label' => __(' ')));
			?>
		</td>
		<td>email</td>
		</tr>
		
		
		<tr>
        <td>Client 10</td>
		<td>
		<?php
			echo $this->Form->input('client_ten_enabled', array('label' => __(' '), 'type' => 'checkbox'));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_ten_callsign', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_ten_password', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_ten_ip', array('label' => __(' ')));
			?>
		</td>
		<td>
		<?php
			echo $this->Form->input('client_ten_server_ip', array('label' => __(' ')));
			?>
		</td>
		<td>email</td>
        </tr>

        </tbody>
    </table>
