<?php

namespace Modules\Permission\Actions;

use Lorisleiva\Actions\Action;
use Modules\Permission\Entities\Permission;
use Modules\System\Entities\DatatableBuilder;

class DatatableOfPermission extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('view-any-permission');
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
            return datatables()->of(Permission::query())
                ->editColumn('action', function ($permission) {
                    return view('permission::components.actions', compact(['permission']));
                })
                ->toJson();
        }

        $builder->addColumn(['data'=>'id']);
        $builder->addActionColumn();
        $builder->setTableId('permissions');

        return view('permission::index', compact('builder'));
    }
}
