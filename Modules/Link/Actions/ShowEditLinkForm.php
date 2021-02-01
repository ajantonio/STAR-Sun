<?php

namespace Modules\Link\Actions;

use Lorisleiva\Actions\Action;

class ShowEditLinkForm extends Action
{
    public function authorize()
    {
        // return $this->user()->can('edit-link');
        return true;
    }

    public function handle($id)
    {
        return view('link::edit', compact('id'));
    }
}
