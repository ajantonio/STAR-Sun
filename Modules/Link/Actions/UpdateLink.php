<?php

namespace Modules\Link\Actions;

use Illuminate\Validation\Rule;
use Lorisleiva\Actions\Action;
use Modules\Link\Entities\Link;
use Modules\Permission\Entities\Permission;

class UpdateLink extends Action
{
    public function authorize()
    {
        // return $this->user()->can('edit-link');
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|' . Rule::unique('links')->ignore($this->id)->where('application_id', $this->application['id']),
            'application' => 'required',
            'resource_group' => 'required',
            'url' => 'required',
            'icon' => 'required',
            'active_pattern' => 'required',
            'order' => 'required',
        ];
    }

    public function handle(Link $link)
    {
        $link->application_id = $this->application['id'];
        $link->resource_group_id = $this->resource_group['id'];
        $link->parent_link_id = $this->parent_link['id'] ?? null;
        $link->title = $this->title;
        $link->description = $this->description;
        $link->url = $this->url;
        $link->icon = $this->icon;
        $link->active_pattern = $this->active_pattern;
        $link->order = $this->order;
        $link->permission_id = $this->permission['id'] ?? null;
        $link->status = $this->status;
        $link->save();

        if ($link->permission) {
            if ($link->status == 'Off') {
                Permission::find($link->permission_id)->update([
                    'active' => 'No'
                ]);
            }else{
                Permission::find($link->permission_id)->update([
                    'active' => 'Yes'
                ]);
            }
        }

        return $link;
    }
}
