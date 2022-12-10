<?php

namespace App\Domain\Core\Datatables;

use App\Domain\Core\Enums\RelationshipsEnums;
use App\Domain\Core\Models\DuplicateExemption;
use App\Support\Dashboard\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;

class DuplicateExemptionDatatable extends BaseDatatable
{
    protected ?string $actionable = '';

    public function query(): Builder
    {
        $duplications = DuplicateExemption::with('real_estate');
        if(request()->has('national_id')){
            $duplications->where('national_id',request('national_id'));
        }
        return $duplications;
    }

    protected function columns(): array
    {
        return [
            $this->column('id',__('ID')),
            $this->column('real_estate',__('Real estate file number')),
            $this->column('assigned',__('Assigned')),
            $this->column('beneficiary',__('Beneficiary')),
            $this->column('real_estate_owner',__('Real estate owner')),
            $this->column('relationship',__('Relationship')),
            $this->column('national_id',__('National ID')),
            $this->column('exclusion_value',__('Exclusion value')),
            $this->column('notes',__('Notes')),
            $this->column('created_at',__('Created at')),
        ];
    }

    protected function customColumns(): array
    {
        return [
            'relationship'  =>  function($model){
                $relationship = $model->relationship;
                $relationships = RelationshipsEnums::toLabels();
                return $relationships[$relationship];
            },
            'real_estate'   =>  fn($model)  => $model->real_estate?->file_number,
            'created_at'    =>  fn($model)  => $model->created_at?->diffForHumans()
        ];
    }
}
