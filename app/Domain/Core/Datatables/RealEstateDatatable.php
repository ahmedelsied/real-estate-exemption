<?php

namespace App\Domain\Core\Datatables;

use App\Domain\Core\Models\RealEstate;
use App\Support\Dashboard\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;

class RealEstateDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return RealEstate::with('side');
    }

    protected function columns(): array
    {
        return [
            $this->column('id',__('ID'))->orderable(),
            $this->column('file_number',__('File number'))->orderable(),
            $this->column('estate_number',__('Estate number'))->orderable(),
            $this->column('side',__('Side')),
            $this->column('created_at',__('Created at')),
        ];
    }

    protected function customColumns(): array
    {
        return [
            'side'  =>  fn($model)  =>  $model->side->name,
            'created_at'  =>  fn($model)  =>  $model->created_at->diffForHumans()
        ];
    }
}
