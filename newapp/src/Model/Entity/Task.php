<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Task Entity
 *
 * @property int $id
 * @property string|null $task
 * @property \Cake\I18n\FrozenTime $start_date
 * @property string|null $status
 * @property \Cake\I18n\FrozenDate|null $end_date
 * @property string|null $description
 */
class Task extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'id' => false,
        'task' => true,
        'start_date' => true,
        'status' => true,
        'end_date' => true,
        'description' => true,
        'user_id' => true,
    ];
}
