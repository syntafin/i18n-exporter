<?php

namespace Syntafin\LaravelI18nExporter\Console\Commands;

use Illuminate\Console\Command;

class ExportTranslationsCommand extends Command
{
    protected $signature = 'i18n:generate';
    protected $description = 'Convert all translations to JSON';

    public function handle(): void
    {
        $locales = config('i18n-exporter.locales');

        foreach ($locales as $locale) {
            $path = base_path("lang/$locale");
            $output = [];

            $files = glob($path . '/*.php');

            foreach ($files as $file) {
                $filename = basename($file, '.php');
                $translations = require $file;

                $flattened = flatten_array($translations, $filename);
                $output = array_merge($output, $flattened);
            }

            file_put_contents(base_path("lang/$locale.json"), json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

            echo "JSON export completed to lang/$locale.json\n";
        }
    }

    private function flatten_array(array $array, string $prefix = ''): array {
        $result = [];

        foreach ($array as $key => $value) {
            $new_key = $prefix . '.' . $key;
            if (is_array($value)) {
                $result += flatten_array($value, $new_key);
            } else {
                $result[$new_key] = $value;
            }
        }

        return $result;
    }
}