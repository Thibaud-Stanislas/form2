<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class MessagesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        // Spécifiez le nom de la table
        $this->setTable('messages');
        $this->setDisplayField('id');
        // Spécifiez la clé primaire
        $this->setPrimaryKey('id');

        // Comportement de timestamps
        $this->addBehavior('Timestamp', [
            'created' => 'created_at',
            'modified' => false,
        ]);
    }
}