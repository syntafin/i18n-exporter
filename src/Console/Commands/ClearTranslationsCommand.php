<?php

namespace Syntafin\LaravelI18nExporter\Console\Commands;

use Illuminate\Console\Command;

class ClearTranslationsCommand extends Command
{
    protected $signature = 'i18n:clear';
    protected $description = 'Clear all translations';

    public function handle(): void
    {
        $locales = config('i18n-exporter.locales');

        foreach ($locales as $locale) {
            $path = config('i18n-exporter.export_path');
            $files = glob("$path/$locale.json");
            foreach ($files as $file) {
                unlink($file);
            }
        }
    }
}