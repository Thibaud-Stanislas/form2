<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Message Entity
 *
 * @property int $id
 * @property string $department
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property \Cake\I18n\DateTime $created_at
 */
class Message extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'department' => true,
        'first_name' => true,
        'last_name' => true,
        'email' => true,
        'subject' => true,
        'message' => true,
        'created_at' => true,
    ];
}
