<?php

namespace Syntafin\LaravelI18nExporter;

use Illuminate\Support\ServiceProvider;
use Syntafin\LaravelI18nExporter\Console\Commands\ExportTranslationsCommand;

class i18nExporterServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->mergeConfigFrom(__DIR__ . '/../config/i18n-exporter.php', 'i18n-exporter');

        if ($this->app->runningInConsole()) {
            $this->commands([
                ExportTranslationsCommand::class
            ]);

            if (config('i18n-exporter.run_on_optimize')) {
                $this->optimizes(
                    optimize: 'i18n:export',
                    clear: 'i18n:clear',
                );
            }
        }
    }
}