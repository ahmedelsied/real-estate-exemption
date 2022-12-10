<?php

namespace App\Domain\Core\Datatables;

use App\Domain\Core\Enums\RelationshipsEnums;
use App\Domain\Core\Models\TaxExemption;
use App\Support\Dashboard\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;


class TaxExemptionDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return TaxExemption::with('real_estate');
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
            'national_id'   =>  fn($model)  => '<a href="'.route('dashboard.core.duplicate-exemptions.index').'?national_id='.$model->national_id.'" target="_blank">'.$model->national_id.'</a>',
            'created_at'    =>  fn($model)  => $model->created_at?->diffForHumans()
        ];
    }
    
}
