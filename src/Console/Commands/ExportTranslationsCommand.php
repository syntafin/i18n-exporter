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
        $frameworkType = config('i18n-exporter.type');

        foreach ($locales as $locale) {
            $path = config('i18n-exporter.path')."/$locale";
            $this->info("Exporting $locale as JSON from $path");
            $output = [];

            $files = glob("$path/*.php");

            foreach ($files as $file) {
                $filename = basename($file, '.php');
                $translations = require $file;

                $flattened = self::flatten_array($translations, $filename);
                $output = array_merge($output, $flattened);
            }

            // Sort by key or value
            $sortBy = config('i18n-exporter.sort_by');
            if ($sortBy === 'key') {
                ksort($output);
            } elseif ($sortBy === 'value') {
                asort($output);
            }

            $outputPath = base_path(config('i18n-exporter.export_path')."/$locale.json");

            // Handle existing files
            if (config('i18n-exporter.force') || !file_exists($outputPath)) {
                file_put_contents($outputPath, json_encode($output, JSON_UNESCAPED_UNICODE));
            } else {
                $this->warn("File $outputPath already exists. Use --force to overwrite.");
            }

            $this->info("File $outputPath created.");
        }
    }

    /**
     * Flattens a multidimensional array.
     *
     * @param  array  $array
     * @param  string  $prefix
     * @param string $frameworkType
     * @return array
     */
    private function flatten_array(array $array, string $prefix = '', string $frameworkType = 'vue'): array
    {
        $result = [];

        foreach ($array as $key => $value) {
            $new_key = $prefix . '.' . $key;
            if (is_array($value)) {
                $result += self::flatten_array($value, $new_key, $frameworkType);
            } else {
                $convertedValue = $this->convert_placeholders($value, $frameworkType);
                $result[$new_key] = $convertedValue;
            }
        }

        return $result;
    }

    /**
     * Convert Laravel Placeholder like :name to Vue/React/Svelte Placeholder like {{ name }}
     *
     * @param string $value
     * @param string $frameworkType
     * @return string
     */
     private function convert_placeholders(string $value, string $frameworkType = 'vue'): string
     {
         return match ($frameworkType) {
             'react', 'svelte' => preg_replace('/:([\w]+)/', '{$1}', $value),
             default => preg_replace('/:([\w]+)/', '{${1}}', $value),
         };
     }
}