<?php

namespace Modules\Role\Actions;

use Lorisleiva\Actions\Action;
use Modules\Role\Entities\Role;
use Modules\System\Entities\DatatableBuilder;

class DatatableOfRole extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('view-any-role');
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
            return datatables()->of(Role::query())
                ->editColumn('action', function ($role) {
                    return view('role::components.actions', compact(['role']));
                })
                ->toJson();
        }

        $builder->addColumn(['data'=>'id']);
        $builder->addActionColumn();
        $builder->setTableId('roles');

        return view('role::index', compact('builder'));
    }
}
