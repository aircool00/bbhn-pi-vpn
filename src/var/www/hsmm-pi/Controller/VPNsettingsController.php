<?php
class VPNsettingsController extends AppController
	public $helpers = array('Html', 'Session');
	public $components = array('RequestHandler', 'Session');

public function edit($id = null) {
    $network_setting = $this->NetworkSetting->findById($id);

    if (!$network_setting) {
      throw new NotFoundException(__('Invalid setting'));
    }

    if ($this->request->isPost() || $this->request->isPut()) {
      if ($this->NetworkSetting->save($this->request->data)) {
	$latest_network_setting = $this->get_network_settings();
	$network_services = $this->get_network_services();
	$location = $this->get_location();

	
	
	$this->render_vpn_client_config($latest_network_setting);
	$this->render_vtun_config($latest_network_setting);
	
	$this->Session->setFlash('Your settings have been saved and will take effect on the next reboot: <a href="#rebootModal" data-toggle="modal" class="btn btn-primary">Reboot</a>',
				 'default', array('class' => 'alert alert-success'));
      } else {
	$this->Session->setFlash('Unable to update your settings, please review any validation errors.', 'default', array('class' => 'alert alert-error'));
      }
    } else {
      // perform some checks in the case of an HTTP GET
      if ($network_setting['NetworkSetting']['wifi_ip_address'] == NULL) {
	// if no WIFI IP is set, then use one derived from the adapter MAC address
	$mac_file = '/sys/class/net/'.$network_setting['NetworkSetting']['wifi_adapter_name'].'/address';
	if (file_exists($mac_file)) {
	  $mac_address = explode(':', file_get_contents($mac_file));
	  $network_setting['NetworkSetting']['wifi_ip_address'] = 
	    '10.'.
	    hexdec($mac_address[3]).'.'.
	    hexdec($mac_address[4]).'.'.
	    hexdec($mac_address[5]);
	}
      }
    }

    if (!$this->request->data) {
      $this->request->data = $network_setting;
    }

    $this->set('wired_interface_mode', $network_setting['NetworkSetting']['wired_interface_mode']);
  }

//this is a for vtund.conf to add the callsign, ip addresses, and passwords 
  private function render_vpn_client_config($network_setting)  {
	$vpnclient_conf = file_get_contents(WWW_ROOT . "/files/VPN/vtund.conf.template");
	$vpnclient_conf_output = str_replace(array('{server_port}','{callsign}','{server_password}','{client_ip}','{server_ip}',
	                                            '{client_one_callsign}','{client_one_password}','{client_one_server_ip}','{client_one_ip}',
												'{client_two_callsign}','{client_two_password}','{client_two_server_ip}','{client_two_ip}',
												'{client_three_callsign}','{client_three_password}','{client_three_server_ip}','{client_three_ip}',
												'{client_four_callsign}','{client_four_password}','{client_four_server_ip}','{client_four_ip}',
												'{client_five_callsign}','{client_five_password}','{client_five_server_ip}','{client_five_ip}',
												'{client_six_callsign}','{client_six_password}','{client_six_server_ip}','{client_six_ip}',
												'{client_seven_callsign}','{client_seven_password}','{client_seven_server_ip}','{client_seven_ip}',
												'{client_eight_callsign}','{client_eight_password}','{client_eight_server_ip}','{client_eight_ip}',
												'{client_nine_callsign}','{client_nine_password}','{client_nine_server_ip}','{client_nine_ip}',
												'{client_ten_callsign}','{client_ten_password}','{client_ten_server_ip}','{client_ten_ip}'),
												
						array( $network_setting['NetworkSetting']['server_port'],
						       strtolower($network_setting['NetworkSetting']['callsign']),
							   $network_setting['NetworkSetting']['server_password'],
							   $network_setting['NetworkSetting']['client_ip'],
							   $network_setting['NetworkSetting']['server_ip'],
							   
							   strtolower($network_setting['NetworkSetting']['client_one_callsign']),
							   $network_setting['NetworkSetting']['client_one_password'],
							   $network_setting['NetworkSetting']['client_one_server_ip'],
							   $network_setting['NetworkSetting']['client_one_ip'],
							   
							   strtolower($network_setting['NetworkSetting']['client_two_callsign']),
							   $network_setting['NetworkSetting']['client_two_password'],
							   $network_setting['NetworkSetting']['client_two_server_ip'],
							   $network_setting['NetworkSetting']['client_two_ip'],
							   
							   strtolower($network_setting['NetworkSetting']['client_three_callsign']),
							   $network_setting['NetworkSetting']['client_three_password'],
							   $network_setting['NetworkSetting']['client_three_server_ip'],
							   $network_setting['NetworkSetting']['client_three_ip'],
							   
							   strtolower($network_setting['NetworkSetting']['client_four_callsign']),
							   $network_setting['NetworkSetting']['client_four_password'],
							   $network_setting['NetworkSetting']['client_four_server_ip'],
							   $network_setting['NetworkSetting']['client_four_ip'],
							   
							   strtolower($network_setting['NetworkSetting']['client_five_callsign']),
							   $network_setting['NetworkSetting']['client_five_password'],
							   $network_setting['NetworkSetting']['client_five_server_ip'],
							   $network_setting['NetworkSetting']['client_five_ip'],
							   
							   strtolower($network_setting['NetworkSetting']['client_six_callsign']),
							   $network_setting['NetworkSetting']['client_six_password'],
							   $network_setting['NetworkSetting']['client_six_server_ip'],
							   $network_setting['NetworkSetting']['client_six_ip'],
							   
							   strtolower($network_setting['NetworkSetting']['client_seven_callsign']),
							   $network_setting['NetworkSetting']['client_seven_password'],
							   $network_setting['NetworkSetting']['client_seven_server_ip'],
							   $network_setting['NetworkSetting']['client_seven_ip'],
							   
							   strtolower($network_setting['NetworkSetting']['client_eight_callsign']),
							   $network_setting['NetworkSetting']['client_eight_password'],
							   $network_setting['NetworkSetting']['client_eight_server_ip'],
							   $network_setting['NetworkSetting']['client_eight_ip'],
							   
							   strtolower($network_setting['NetworkSetting']['client_nine_callsign']),
							   $network_setting['NetworkSetting']['client_nine_password'],
							   $network_setting['NetworkSetting']['client_nine_server_ip'],
							   $network_setting['NetworkSetting']['client_nine_ip'],
							   
							   strtolower($network_setting['NetworkSetting']['client_ten_callsign']),
							   $network_setting['NetworkSetting']['client_ten_password'],
							   $network_setting['NetworkSetting']['client_ten_server_ip'],
							   $network_setting['NetworkSetting']['client_ten_ip']), $vpnclient_conf);
	
							
    file_put_contents('/etc/vtund.conf', $vpnclient_conf_output);
	}
	
	private function render_vtun_config($network_setting) {
    $vtun_conf = file_get_contents(WWW_ROOT . "/files/VPN/vtun.template");
    $vtun_conf_output = str_replace(array('{server_port}','{callsign}','{server_dns}'),
	                                     array($network_setting['NetworkSetting']['server_port'],
										 strtolower($network_setting['NetworkSetting']['callsign']),
										 $network_setting['NetworkSetting']['server_dns']), $vtun_conf);
										 
	file_put_contents('/etc/default/vtun', $vtun_conf_output);
	
}
?>	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	


