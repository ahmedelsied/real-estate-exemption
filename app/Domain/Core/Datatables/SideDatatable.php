<?php

namespace App\Domain\Core\Datatables;

use App\Domain\Core\Models\Side;
use App\Support\Dashboard\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class SideDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Side::query();
    }

    protected function columns(): array
    {
        return [
            $this->column('id',__('ID')),
            $this->column('name',__('Name')),
        ];
    }
}
