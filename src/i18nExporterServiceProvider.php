<?php

namespace Syntafin\LaravelI18nExporter;

use Illuminate\Support\ServiceProvider;
use Syntafin\LaravelI18nExporter\Console\Commands\ClearTranslationsCommand;
use Syntafin\LaravelI18nExporter\Console\Commands\ExportTranslationsCommand;

class i18nExporterServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/i18n-exporter.php', 'i18n-exporter');

        if ($this->app->runningInConsole()) {
            $this->commands([
                ExportTranslationsCommand::class,
                ClearTranslationsCommand::class
            ]);

            if (config('i18n-exporter.run_on_optimize')) {
                $this->optimizes(
                    optimize: 'i18n:generate',
                    clear: 'i18n:clear',
                );
            }
        }
    }
}