<?php

namespace App\Http\Controllers\Dashboard\Core;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Support\Dashboard\Crud\WithDatatable;
use App\Support\Dashboard\Crud\WithDestroy;
use App\Support\Dashboard\Crud\WithForm;
use App\Support\Dashboard\Crud\WithStore;
use App\Support\Dashboard\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Core\Datatables\TaxExemptionDatatable;
use App\Domain\Core\Enums\CorePermissions;
use App\Domain\Core\Enums\RelationshipsEnums;
use App\Domain\Core\Models\DuplicateExemption;
use App\Domain\Core\Models\RealEstate;
use App\Domain\Core\Models\TaxExemption;

class TaxExemptionController extends DashboardController
{
    use WithDatatable,  WithForm , WithStore ,WithUpdate , WithDestroy;

    protected string $name = 'TaxExemption';
    protected string $path = 'dashboard.core.tax-exemptions';
    protected string $datatable = TaxExemptionDatatable::class;
    protected string $model = TaxExemption::class;
    protected array $permissions = [CorePermissions::class, 'tax_exemptions'];


    protected function rules()
    {
        return [
            'real_estate_id'    =>  'required|numeric|exists:real_estates,id',
            'assigned'    =>  'required|string|max:255',
            'beneficiary'    =>  'required|string|max:255',
            'real_estate_owner'    =>  'required|string|max:255',
            'assigned_same_beneficiary'    =>  'required|boolean',
            'relationship'    =>  'required|string|in:'.implode(',',RelationshipsEnums::toArray()),
            'national_id'    =>  'required|string|max:255',
            'exclusion_value'    =>  'required|string|max:255',
            'notes'    =>  'required|string',
        ];
    }

    protected function storeAction(array $validated)
    {
        $isNationalId = TaxExemption::whereNationalId($validated['national_id'])->exists();
        if($isNationalId){

            DuplicateExemption::create($validated);

            toast(__('We found this national id in the database so we added it in the duplication tax exemption'), 'success');

            return redirect(route("{$this->path}.index"));
        }else{
            ($this->model)::create($validated);
        }

        return null;
    }


    protected function formData(?Model $model = null): array
    {
        return [
            'realEstates'   =>  RealEstate::select(['id','file_number'])->limit(15)->get(),
            'relationships' =>  RelationshipsEnums::toLabels()
        ];
    }
}
