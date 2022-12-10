<?php

namespace App\Domain\Core\Enums;

use HsmFawaz\UI\Services\RolesAndPermissions\PermissionEnum;

/**
 * @method static self buyer()
 * @method static self his_father()
 * @method static self his_mother()
 * @method static self his_sister()
 * @method static self his_brother()
 * @method static self same_person()
 * @method static self current_owner()
 */
class RelationshipsEnums extends PermissionEnum
{
    public static function toLabels(): array
    {
        return [
            'buyer'         =>  'Buyer',
            'his_father'    =>  'His father',
            'his_mother'    =>  'His mother',
            'his_sister'    =>  'His sister',
            'his_brother'   =>  'His brother',
            'same_person'   =>  'Same person',
            'current_owner' =>  'Current owner'
        ];
    }
}
