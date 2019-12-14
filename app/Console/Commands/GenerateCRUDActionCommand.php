<?php

namespace App\Console\Commands;

use Nwidart\Modules\Commands\ModuleMakeCommand;

class GenerateCRUDActionCommand extends ModuleMakeCommand
{
    protected $name = 'generate:module';

    protected $description = 'Generates module scaffolding.';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $names = $this->argument('name');
        $this->call('module:make', ['name'=>$names, '--force'=>true]);

        foreach ($names as $module) {
            $this->call("module:make-model", ['model'=>$module, 'module'=>$module]);
            $this->call("module:make-action", ['action'=>"DatatableOf$module", 'module'=>$module]);
            $this->call("module:make-action", ['action'=>"Create$module", 'module'=>$module]);
            $this->call("module:make-action", ['action'=>"View$module", 'module'=>$module]);
            $this->call("module:make-action", ['action'=>"Edit$module", 'module'=>$module]);
            $this->call("module:make-action", ['action'=>"Delete$module", 'module'=>$module]);
            $this->call("module:make-datatable", ['module'=>$module]);
        }
    }

}
