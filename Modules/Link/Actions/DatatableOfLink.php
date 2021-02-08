<?php

namespace Modules\Link\Actions;

use Lorisleiva\Actions\Action;
use Modules\Link\Entities\Link;
use Modules\System\Entities\DatatableBuilder;

class DatatableOfLink extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        // return $this->user()->can('view-any-link');
        return true;
    }

    public function handle(DatatableBuilder $html)
    {
        // $links = Link::with(['resource_group', 'permission', 'application'])
        //         ->get();
        //     foreach ($links as $link) {
        //         print_r($link->resource_group->application->url . $link->url);
        //     }
        //     dd();
        if (request()->ajax()) {
            $links = Link::with(['resource_group', 'permission', 'application'])
                ->get();
            return datatables()->of($links)
                ->editColumn('title', function ($link) {

                    $path = ($link->resource_group->application->url ?? "") . $link->url;
                    return "<a target='_blank' href='{$path}'>{$link->title}</a>";
                })
                ->editColumn('resource_group.name', function ($link) {
                    return $link->resource_group->name ?? '';
                })
                ->editColumn('permission.name', function ($link) {
                    return $link->permission->name ?? '';
                })
                ->editColumn('action', function ($link) {
                    return view('link::components.actions', compact('link'));
                })
                ->rawColumns(['action', 'title'])
                ->toJson();
        }

        $html->addColumn(['data' => 'application.name', 'title'=>'Application']);
        $html->addColumn(['data' => 'resource_group.name', 'title'=>'Group']);
        $html->addColumn(['data' => 'title']);
        $html->addColumn(['data' => 'permission.name', 'title'=>'Permission']);
        $html->addColumn(['data' => 'status']);
        $html->addActionColumn();
        $html->orders([
            [1, 'asc'],
            [2, 'asc']
        ]);
        $html->setTableId('links');

        return view('link::index', compact('html'));
    }
}
