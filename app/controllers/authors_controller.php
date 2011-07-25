<?php

class AuthorsController extends AppController
{
    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('register', 'login');
    }

    public function index()
    {
        $id = $this->Author->id = $this->Auth->user('id');
        $me = $this->Author->read();
        // debug($me);die;
        $this->set('me', $me);
    }

    public function login()
    {
        
    }

    public function register()
    {
        if (!empty($this->data)) {
            if ($this->Author->save($this->data)) {
                $this->Session->setFlash('Rekisteröinti onnistui');
                $this->Session->setFlash('Voit nyt kirjautua sisään');
                $this->redirect(array('action' => 'login'));
            }
        }
    }

    public function logout()
    {
        $this->redirect($this->Auth->logout());
    }
}