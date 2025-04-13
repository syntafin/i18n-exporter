<?php

namespace Syntafin\LaravelI18nExporter;

use Illuminate\Support\ServiceProvider;

class i18nExporterServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->mergeConfigFrom(__DIR__ . '/../config/i18n-exporter.php', 'i18n-exporter');
    }
}