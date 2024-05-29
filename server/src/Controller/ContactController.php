<?php
namespace App\Controller;

use App\Controller\AppController;

class ContactController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
    }

    public function index()
    {
        $this->viewBuilder()->setClassName('Json');
        $this->response = $this->response->withType('application/json')
                                         ->withStringBody(json_encode(['message' => 'This endpoint does not have a view.']))
                                         ->withHeader('Access-Control-Allow-Origin', '*')
                                         ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE')
                                         ->withHeader('Access-Control-Allow-Headers', 'Authorization, Content-Type');
        return $this->response;
    }
    
    public function submitMessage()
    {
        if ($this->request->is('options')) {
            $this->response = $this->response->withType('application/json')
                                             ->withStringBody(json_encode(['message' => 'CORS pre-flight']))
                                             ->withHeader('Access-Control-Allow-Origin', '*')
                                             ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE')
                                             ->withHeader('Access-Control-Allow-Headers', 'Authorization, Content-Type');
            return $this->response;
        }
    
        $this->request->allowMethod(['post']);
    
        $messagesTable = $this->fetchTable('Messages');
        $message = $messagesTable->newEmptyEntity();
        $message = $messagesTable->patchEntity($message, $this->request->getData());
    
        if ($messagesTable->save($message)) {
            $this->set([
                'response' => ['status' => 'success', 'message' => 'Message envoyé avec succès.'],
                '_serialize' => 'response'
            ]);
        } else {
            $this->set([
                'response' => ['status' => 'error', 'message' => 'Erreur lors de l\'envoi du message.'],
                '_serialize' => 'response'
            ]);
        }
    }
}