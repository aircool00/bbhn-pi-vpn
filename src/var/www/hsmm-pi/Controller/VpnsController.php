<?php
class VpnsController extends AppController{
	
	var $name = 'Vpns';


	public $helpers = array('Html', 'Session');
	public $components = array('RequestHandler', 'Session');
	public function index() {
		
		$this->set('vpns', $this->Vpns->find('all'));


}



Public function edit($id = null){
	 if($this->request->is('post')) {
		$this->data = $this->Vpns->read(NULL, $id);
		} else {
		  if($this->Vpns->save($this->data)) {
			$this->Session->setFlash('The Client data has been updated');
			$this->redirect(array('action'=>'index'));
		}
	}
}
}
?>
