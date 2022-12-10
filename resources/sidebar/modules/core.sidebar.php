<?php

use App\Domain\Core\Enums\CorePermissions;
use HsmFawaz\UI\Support\Sidebar\SidebarGenerator;

return static function (SidebarGenerator $sidebar) {
    $sidebar
        ->addModule('Core', 10)
        ->addLink(
            name: __('Real Estates'),
            url: route('dashboard.core.real-estates.index'),
            icon: 'fa fa-house-user',
            permission: CorePermissions::real_estates()->can('read')
        )
        ->addLink(
            name: __('Tax Exemptions'),
            url: route('dashboard.core.tax-exemptions.index'),
            icon: 'fas fa-coins',
            permission: CorePermissions::tax_exemptions()->can('read')
        )
        ->addLink(
            name: __('Duplicate Exemptions'),
            url: route('dashboard.core.duplicate-exemptions.index'),
            icon: 'fa fa-redo-alt',
            permission: CorePermissions::duplicate_exemptions()->can('read')
        )
        ->addLink(
            name: __('Sides'),
            url: route('dashboard.core.sides.index'),
            icon: 'fas fa-arrow-right',
            permission: CorePermissions::sides()->can('read')
        );
};
