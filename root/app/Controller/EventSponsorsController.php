<?php

class EventSponsorsController extends AppController {
	public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');
	
	public function cms() {
        $this->set('eventSponsors', $this->EventSponsor->find('all'));
    }
	
	public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid event'));
        }

        $eventSponsor = $this->EventSponsor->findById($id);
        $this->set('eventSponsor', $eventSponsor);
        if (!$eventSponsor) {
            throw new NotFoundException(__('Invalid event'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->EventSponsor->id = $id;
            if ($this->EventSponsor->save($this->request->data)) {
                $this->Session->setFlash(__('Your sponsor for the event has been updated.'));
                return $this->redirect(array('action' => 'cms'));
            }
            $this->Session->setFlash(
                    'Unable to update your sponsor.', 'default', array('class' => 'flashError')
            );
        }

        if (!$this->request->data) {
            $this->request->data = $eventSponsor;
        }
    }
}