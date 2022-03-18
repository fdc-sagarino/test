<?php
class RecordsController extends AppController {
    
    public $uses = array(
        'Records'
    );
    
    public function save() {
        if ($this->request->is('post')) {            
            if (!$this->Records->save($this->request->data)) {

                $this->Flash->error(json_encode($this->Records->validationErrors), array(
                    'key' => 'error',
                    'params' => $this->Records->validationErrors
                ));
            }
        }
        $this->redirect($this->referer());
    }
    
    public function delete() {
        $record_id = $this->request->query('record_id');
        
        if ($this->Records->delete($record_id)) {
            $this->redirect('/display');
        }
    }
    
    public function remove() {
        $record_id = $this->request->query('record_id');
        
        $this->Records->id = $record_id;
        $this->Records->set(array('status' => 'X'));
        if ($this->Records->save()) {
            $this->redirect('/display');
        }
	}
    
    public function restore() {
        $record_id = $this->request->query('record_id');
        
        $this->Records->id = $record_id;
        $this->Records->set(array('status' => 'A'));
        if ($this->Records->save()) {
            $this->redirect('/display');
        }   
	}
    
    public function edit() {
        $record_id = $this->request->query('record_id');
        
        $rows = $this->Records->find('first', array(
            'conditions' => array('Records.id' => $record_id)
        ));

        $this->set('records', $rows);
        $this->set('id', $record_id);
	}
    
    public function savechanges($id) {
        if ($this->request->is('post') && $id) {
            $this->Records->id = $id;
            if (!$this->Records->save($this->request->data)) {
                $this->Flash->error(json_encode($this->Records->validationErrors), array(
                    'key' => 'error',
                    'params' => $this->Records->validationErrors
                ));
                $this->redirect($this->referer());
            }
        }
        $this->redirect('/display');
	}
}