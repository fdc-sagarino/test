<?php
class DisplayController extends AppController {
    public function index() {
        $this->loadmodel('Records');
        $rows = $this->Records->find('all');

        $this->set('records', $rows);
    }
}
