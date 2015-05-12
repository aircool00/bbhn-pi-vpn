<?php
class VpnSettingsController extends AppController{
	
	var $name = 'VpnSettings';


	public $helpers = array('Html', 'Session');
	public $components = array('RequestHandler', 'Session');
	public function index() {
		
		$this->set('vpnsettings', $this->VpnSetting->find('all'));
		$this->loadmodel('VpnClient');
        $this->set('vpnclients', $this->VpnClient->find('all'));
		$this->loadmodel ('VpnServer');
		$this->set('vpnservers', $this->VpnServer->find('all'));


}

Public function add() {
	if($this->request->is('post')) {
		if($this->VpnSetting->save($this->data)){
		 $this->Session->setFlash('Successfully Saved');
		 $this->redirect(array('action'=>'index'));
		} else {
		 $this->Session->setFlash('The Data Was not saved, Please try again');
}
}
}

public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Invalid post'));
    }

    $post = $this->VpnSetting->findById($id);
    if (!$post) {
        throw new NotFoundException(__('Invalid post'));
    }

    if ($this->request->is(array('post', 'put'))) {
        $this->VpnSetting->id = $id;
        if ($this->VpnSetting->save($this->request->data)) {
            $this->Session->setFlash(__('Your post has been updated.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Unable to update your post.'));
    }

    if (!$this->request->data) {
        $this->request->data = $post;
    }
}

Public function delete($id = null){
        $this->VpnSetting->delete($id);
        $this->Session->setFlash('The Client data has been deleted');
        $this->redirect(array('action'=>'index'));
}

public function editclient($id = null) {
    $this->loadmodel('VpnClient');
	if (!$id) {
        throw new NotFoundException(__('Invalid post'));
    }

    $post = $this->VpnSetting->findById($id);
    if (!$post) {
        throw new NotFoundException(__('Invalid post'));
    }

    if ($this->request->is(array('post', 'put'))) {
        $this->VpnSetting->id = $id;
        if ($this->VpnSetting->save($this->request->data)) {
            $this->Session->setFlash(__('Your post has been updated.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Unable to update your post.'));
    }

    if (!$this->request->data) {
        $this->request->data = $post;
    }
}

public function editserver($id = null) {
    $this->loadmodel ('VpnServer');
	if (!$id) {
        throw new NotFoundException(__('Invalid post'));
    }

    $post = $this->VpnServer->findById($id);
    if (!$post) {
        throw new NotFoundException(__('Invalid post'));
    }

    if ($this->request->is(array('post', 'put'))) {
        $this->VpnServer->id = $id;
        if ($this->VpnServer->save($this->request->data)) {
            $this->Session->setFlash(__('Your post has been updated.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Unable to update your post.'));
    }

    if (!$this->request->data) {
        $this->request->data = $post;
    }
}


Public function email(){
	
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
}
?>	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	


