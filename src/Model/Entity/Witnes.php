<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Witnes Entity
 *
 * @property int $id
 * @property string $wi_name
 * @property string $wi_bu
 * @property string $wi_city
 * @property string $wi_location
 * @property string $wi_empid
 * @property string $email_id
 * @property string $relationship
 *
 * @property \App\Model\Entity\Email $email
 */
class Witnes extends Entity
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
        'wi_name' => true,
        'wi_bu' => true,
        'wi_city' => true,
        'wi_location' => true,
        'wi_empid' => true,
        'email_id' => true,
        'relationship' => true,
        'email' => true
    ];
}
