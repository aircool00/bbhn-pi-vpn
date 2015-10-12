<?php
class VpnSettingsController extends AppController{

	var $name = 'VpnSettings';
	public $uses = array();

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


        $file = new File(TMP.'test.txt',true);
        $file->write('options {
   type stand;
   port 5000;
   ifconfig /sbin/ifconfig;
   route  /sbin/route;
   firewall   /sbin/ipchains;
   syslog daemons;
   timeout 60;
}

default {
  compress yes;
  speed 0;
  stat yes;
}
');

	
return $this->redirect(array('action' => 'index'));	
	
}

}
?>	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	


