<?php

namespace Modules\Link\Actions;

use Illuminate\Support\Str;
use Lorisleiva\Actions\Action;
use Modules\Link\Entities\Link;

class StoreNewLink extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        // return $this->user()->can('create-link');
        return true;
    }

    /**
     * Get the validation rules that apply to the action.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'application' => 'required',
            'resource_group' => 'required',
            'url' => 'required',
            'icon' => 'required',
            'active_pattern' => 'required',
            'order' => 'required',
        ];
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle()
    {
        $link = new Link();
        $link->id = Str::orderedUuid()->toString();
        $link->application_id = $this->application['id'];
        $link->resource_group_id = $this->resource_group['id'];
        $link->parent_link_id = $this->parent_link['id'] ?? null;
        $link->title = $this->title;
        $link->description = $this->description;
        $link->url = $this->url;
        $link->icon = $this->icon;
        $link->active_pattern = $this->active_pattern;
        $link->order = $this->order;
        $link->status = $this->status;
        $link->permission_id = $this->permission['id'] ?? null;
        $link->save();
        return $link;
    }

    public function afterValidator($validator)
    {
        if (Link::whereTitle($this->title)->whereApplicationId($this->application['id'])->count()) {
            $validator->errors()->add('title', 'The title has already been taken.');
        }
    }
}
