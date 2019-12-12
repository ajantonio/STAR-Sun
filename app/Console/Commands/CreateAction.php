<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class CreateAction extends Command
{
    var $stub;
    var $filesystem;

    protected $signature = 'module:make-action {action} {module}';

    public function __construct(Filesystem $filesystem)
    {
        parent::__construct();

        $this->stub = base_path('app/Console/stubs/action.stub');
        $this->filesystem = $filesystem;
    }

    public function handle()
    {
        $module = $this->argument('module');
        $action = $this->argument('action');

        $stub = $this->filesystem->get($this->stub);

        $module_path = config('modules.paths.modules');
        $module_path .="/$module/Actions/$action.php";

        $template = str_replace(['$MODULE$', '$ACTIONCLASS$'],[$module, $action], $stub);

        $this->filesystem->put($module_path, $template);
    }
}
