<?php

namespace Modules\CityMunicipality\Actions;

use Lorisleiva\Actions\Action;
use Modules\CityMunicipality\Entities\CityMunicipality;
use Modules\System\Entities\DatatableBuilder;

class DataTableOfCityMunicipality extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('view-citymunicipality');
    }

    /**
     * Get the validation rules that apply to the action.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * Execute the action and return a result.
     *
     * @param DatatableBuilder $builder
     * @return mixed
     * @throws \Exception
     */
    public function handle(DatatableBuilder $builder)
    {
        if (request()->ajax()) {
            return datatables()->of(CityMunicipality::query())
                ->editColumn('action', function ($citymunicipality) {
                    return view('citymunicipality::components.actions', compact(['citymunicipality']));
                })
                ->toJson();
        }

        $builder->addColumn(['data'=>'city_municipality']);
        $builder->addColumn(['data'=>'province']);
        $builder->addColumn(['data'=>'population_density']);
        $builder->addColumn(['data'=>'barangay_count']);
        $builder->addColumn(['data'=>'psgc']);
        $builder->addColumn(['data'=>'class']);
        $builder->addActionColumn();
        $builder->setTableId('citymunicipalitys');

        return view('citymunicipality::index', compact('builder'));
    }
}
