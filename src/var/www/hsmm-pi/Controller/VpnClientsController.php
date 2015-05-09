<?php
class VpnClientsController extends AppController{
	
	var $name = 'VpnClients';


	public $helpers = array('Html', 'Session');
	public $components = array('RequestHandler', 'Session');
	public function index() {
		
		$this->set('vpnclients', $this->VpnClient->find('all'));


}



Public function edit($id = null){
	 if($this->request->is('post')) {
		$this->data = $this->VpnClient->read(NULL, $id);
		} else {
		  if($this->VpnClient->save($this->data)) {
			$this->Session->setFlash('The Client data has been updated');
			$this->redirect(array('action'=>'index'));
		}
	}
}

}
?>