<?php

namespace App\Http\Controllers\Dashboard\Core;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Support\Dashboard\Crud\WithDatatable;
use App\Domain\Core\Datatables\DuplicateExemptionDatatable;
use App\Domain\Core\Enums\CorePermissions;
use App\Domain\Core\Models\DuplicateExemption;

class DuplicateExemptionController extends DashboardController
{
    use WithDatatable;

    protected string $name = 'DuplicateExemption';
    protected string $path = 'dashboard.core.duplicate-exemptions';
    protected string $datatable = DuplicateExemptionDatatable::class;
    protected string $model = DuplicateExemption::class;
    protected array $permissions = [CorePermissions::class, 'duplicate_exemptions'];
}
