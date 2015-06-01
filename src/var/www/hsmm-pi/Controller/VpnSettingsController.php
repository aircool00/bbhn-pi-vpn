<?php
class VpnSettingsController extends AppController{

	var $name = 'VpnSettings';


	public $helpers = array('Html', 'Session');
	public $components = array('RequestHandler', 'Session');
	public function index() {
		
		$this->set('vpnsettings', $this->VpnSetting->find('all'));
		$this->loadmodel('VpnClient');
        $this->set('vpnclients', $this->VpnClient->find('all'));
		
		$this->loadmodel('VpnServer'); 
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

    $post = $this->VpnClient->findById($id);
    if (!$post) {
        throw new NotFoundException(__('Invalid post'));
    }

    if ($this->request->is(array('post', 'put'))) {
        $this->VpnClient->id = $id;
        if ($this->VpnClient->save($this->request->data)) {
            $this->Session->setFlash(__('Your post has been updated.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Unable to update your post.'));
    }

    if (!$this->request->data) {
        $this->request->data = $post;
    }
}

public function editvpn($id = null) {
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
 return $this->redirect(array('action' => 'index'));	
}

Public function createvpnconf(){
 $this->render_vtundstart();
 $this->render_vtun_config();
 
 return $this->redirect(array('action' => 'index'));

 
}


	private function create_first_vtund() {
	$file = new File(TMP.'test.txt', true);
    $file->write("options {\r\n");	
	$file->append("	type stand;\r\n");
	$file->append("	port 5000;\r\n");	
	$file->append("	ifconfig /sbin/ifconfig;\r\n");
	$file->append("	route  /sbin/route;\r\n");
	$file->append("	firewall  /sbin/ipchains;\r\n");
	$file->append("	syslog daemon;\r\n");
	$file->append("	timeout 60;\r\n");
	$file->append("}\r\n");
	$file->append("\r\n");
	$file->append("default {"\r\n");
	$file->append("	compress yes;\r\n");
	$file->append("	speed 0;\r\n");
	$file->append("	stat yes;\r\n");
	$file->append("	}\r\n");
	$file->append(['NetworkSetting']['server_password'])
	}

	
	
	
	
//this is a for vtund.conf to add the callsign, ip addresses, and passwords 
  private function render_vtundstart($network_setting)  {
	$vpnclient_conf = file_get_contents(WWW_ROOT . "/files/VTUND/vtundstart.conf.template");
	$vpnclient_conf_output = str_replace(array('{server_port}','{callsign}','{server_password}','{client_ip}','{server_ip}'),
												
						array( $vpnserver['VpnServer']['server_port'],
						       strtolower($network_setting['NetworkSetting']['callsign']),
							   $vpnclient['VpnClient']['password'],
							   $vpnclient['VpnClient']['client_ip'],
							   $vonclient['VpnClient']['server_ip']);
	
							
    file_put_contents('/files/VTUND/staging/vtund.conf', $vpnclient_conf_output);
	}
	
	private function render_vtun_config($network_setting) {
    $vtun_conf = file_get_contents(WWW_ROOT . "/files/VTUND/vtun.template");
    $vtun_conf_output = str_replace(array('{server_port}','{callsign}','{server_dns}'),
	                                     array($network_setting['NetworkSetting']['server_port'],
										 strtolower($network_setting['NetworkSetting']['callsign']),
										 $network_setting['NetworkSetting']['server_dns']), $vtun_conf);
										 
	file_put_contents('/files/VTUND/staging/vtun', $vtun_conf_output);
	}	
}
?>	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	


