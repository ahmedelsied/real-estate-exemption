<?php

namespace App\Http\Controllers\Dashboard\Core;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Core\Datatables\RealEstateDatatable;
use App\Domain\Core\Enums\CorePermissions;
use App\Domain\Core\Models\RealEstate;
use App\Domain\Core\Models\Side;
use App\Http\Requests\Dashboard\Core\RealEstateRequest;
use App\Support\Dashboard\Crud\WithCrud;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class RealEstateController extends DashboardController
{
    use WithCrud;

    protected string $name = 'RealEstate';
    protected string $path = 'dashboard.core.real-estates';
    protected string $datatable = RealEstateDatatable::class;
    protected string $model = RealEstate::class;
    protected string $formRequest = RealEstateRequest::class;
    protected array $permissions = [CorePermissions::class, 'real_estates'];

    protected function storeAction(array $validated)
    {
        $validated['type']  =   'residential';
        ($this->model)::create($validated);
        return null;
    }

    public function search(Request $request)
    {
        $validated = $request->validate([
            'q' =>  'nullable|string'
        ]);
        if(!Arr::has($validated,'q')) return [];
        $q = Arr::pull($validated,'q');
        $results = RealEstate::select(['id','file_number'])
                         ->where('estate','LIKE','%'.$q.'%')
                         ->orWhere('id',intval($q))
                         ->limit(20)
                         ->get();

        return response()->json(['data'=>$results]);
    }

    protected function formData(?Model $model = null): array
    {
        return [
            'sides' =>  toMap(Side::all())
        ];
    }
}
