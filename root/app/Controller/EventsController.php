<?php

class EventsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('countDown', 'getUpcomingEvents', 'getEventsByYear');
    }

    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    public function index() {
        $this->getUpcomingEvents();
        $this->getEventsByYear(date("Y"));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid event'));
        }

        $event = $this->Event->findById($id);
        if (!$event) {
            throw new NotFoundException(__('Invalid event'));
        }
        $this->set('event', $event);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Event->create();
            if ($this->Event->save($this->request->data)) {
                $this->Session->setFlash(__('Your event has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your event.'));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid event'));
        }

        $event = $this->Event->findById($id);
        if (!$event) {
            throw new NotFoundException(__('Invalid event'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Event->id = $id;
            if ($this->Event->save($this->request->data)) {
                $this->Session->setFlash(__('Your event has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your event.'));
        }

        if (!$this->request->data) {
            $this->request->data = $event;
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Event->delete($id)) {
            $this->Session->setFlash(
                    __('The event with id: %s has been deleted.', h($id))
            );
            return $this->redirect(array('action' => 'index'));
        }
    }

    public function getUpcomingEvents() {
        $upcomingEvents = $this->Event->find('all', array('order' => array('Date' => 'asc'),
            'conditions' => array('Date >= NOW()',
                'Year(Date) = ' . date("Y"))
        ));
        if (isset($this->params['requested']) && $this->params['requested'] == 1) {
            return $upcomingEvents;
        } else {
            $this->set('upcomingEvents', $upcomingEvents);
        }
    }

    // This function counts down to the first upcoming event
    public function countdown() {
        // Get the first upcoming event
        $event = $this->Event->find('first', array(
            'conditions' => array(
                'Date >= NOW()',
                'Year(Date) = ' . date("Y"))
                )
        );

        $daysUntilEvent = 0;
        $hoursUntilEvent = 0;

        // If an event has been found
        if ($event) {
            $eventDate = $event["Event"]["Date"];

            // Calculate the difference between the current date and the date of the first upcoming event
            $currentDate = date("Y-m-d H:i:s");

            // The difference between the two events in hours
            $timeUntilEvent = round((strtotime($eventDate) - strtotime($currentDate)) / 3600, 1);

            /* If the difference between the two is bigger than 24, there's more than a day difference, so we
              need to calculate the days / remaining hours */
            if ($timeUntilEvent > 24) {
                // The difference in days
                $daysUntilEvent = floor($timeUntilEvent / 24);

                // The remaining hours
                $hoursUntilEvent = $timeUntilEvent % 24;
            } else {
                $hoursUntilEvent = $timeUntilEvent;
            }

            // Round the hours
            $hoursUntilEvent = round($hoursUntilEvent, 0);

            // Make an array of both the hours and the time
            $timeUntilEventArray = array("Days" => $daysUntilEvent, "Hours" => $hoursUntilEvent);
        }

        if (isset($this->params['requested']) && $this->params['requested'] == 1) {
            return $timeUntilEventArray;
        }
    }

    // This function gets a racer's results
    public function getEventsByYear($id) {
        $events = $this->Event->find('all', array('order' => array('Date' => 'asc'),
            'conditions' => array('Year(Date) = ' . $id)
        ));

        if (isset($this->params['requested']) && $this->params['requested'] == 1) {
            return $events;
        } else {
            $this->set('yearEvents', $events);
        }
    }

}
