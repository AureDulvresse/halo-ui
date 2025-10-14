<?php

namespace Flux\UI\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallComponentCommand extends Command
{
    protected $signature = 'flux:install {component : Component name}
                            {--force : Overwrite existing module}';
    protected $description = 'Install one or more FluxUI components into your Laravel project.';

    public function handle(): void
    {
        $component = $this->argument('component');
        $sourceDir = __DIR__ . '/../../stubs/components';
        $targetDir = resource_path('views/components/flux');

        if (!File::exists($targetDir)) {
            File::makeDirectory($targetDir, 0755, true);
        }

        if ($component) {
            $this->installSingle($component, $sourceDir, $targetDir);
        } else {
            $this->installAll($sourceDir, $targetDir);
        }
    }

    private function installSingle(string $component, string $sourceDir, string $targetDir): void
    {
        $stub = "{$sourceDir}/{$component}.blade.php";
        $target = "{$targetDir}/{$component}.blade.php";

        if (!File::exists($stub)) {
            $this->error("❌ Component [{$component}] not found.");
            return;
        }

        if (File::exists($target)) {
            if (!$this->output->confirm("⚠️ Component [{$component}] already exists. Overwrite?")) {
                return self::FAILURE;
            }
        }

        File::copy($stub, $target);
        $this->info("✅ Installed [{$component}] component!");
    }

    private function installAll(string $sourceDir, string $targetDir): void
    {
        foreach (File::files($sourceDir) as $file) {
            $name = pathinfo($file, PATHINFO_FILENAME);
            $this->installSingle($name, $sourceDir, $targetDir);
        }
    }
}
