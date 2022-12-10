<?php

namespace App\Http\Controllers\Dashboard\Core;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Support\Dashboard\Crud\WithDatatable;
use App\Support\Dashboard\Crud\WithDestroy;
use App\Support\Dashboard\Crud\WithForm;
use App\Support\Dashboard\Crud\WithStore;
use App\Support\Dashboard\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Core\Datatables\SideDatatable;
use App\Domain\Core\Enums\CorePermissions;
use App\Domain\Core\Models\Side;

class SideController extends DashboardController
{
    use WithDatatable,  WithForm , WithStore ,WithUpdate , WithDestroy;

    protected string $name = 'Side';
    protected string $path = 'dashboard.core.sides';
    protected string $datatable = SideDatatable::class;
    protected string $model = Side::class;
    protected array $permissions = [CorePermissions::class, 'sides'];


    protected function rules()
    {
        return [
            'name'  =>  'required|string'
        ];
    }

    protected function formData(?Model $model = null): array
    {
        return [

        ];
    }
}
