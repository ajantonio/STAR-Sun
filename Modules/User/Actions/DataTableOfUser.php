<?php

namespace Modules\User\Actions;

use Lorisleiva\Actions\Action;
use Modules\User\Entities\User;
use Modules\System\Entities\DatatableBuilder;

class DataTableOfUser extends Action
{

    public function authorize()
    {
        return $this->user()->can('view-user');
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
            return datatables()->of(User::query())
                ->editColumn('action', function ($user) {
                    return view('user::components.actions', compact(['user']));
                })
                ->toJson();
        }

        $builder->addColumn(['data'=>'id_number', 'title'=>'ID Number']);
        $builder->addColumn(['data'=>'name']);
        $builder->addColumn(['data'=>'email']);
        $builder->addColumn(['data'=>'type']);
        $builder->addActionColumn();
        $builder->buttons(['reload', 'reset']);
        $builder->setTableId('users');

        return view('user::index', compact('builder'));
    }
}
