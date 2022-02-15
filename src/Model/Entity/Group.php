<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Group Entity
 *
 * @property int $id
 * @property string $city
 * @property string $wa_link
 * @property string $tel_link
 * @property int $is_approved
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Group extends Entity
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
        'state_id' => true,
        'state' => true,
        'city' => true,
        'wa_name' => true,
        'wa_link' => true,
        'tel_name' => true,
        'tel_link' => true,
        'is_approved' => true,
        'created' => true,
        'modified' => true,
    ];
}
