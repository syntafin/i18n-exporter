<?php

return [
    /**
     * Path to the language files from Laravel.
     *
     * @var string
     */
    'path' => resource_path('lang'),

    /**
     * Set the path where locales should be exported.
     *
     * @var string
     */
    'export_path' => env('I18N_EXPORT_PATH', base_path("lang")),

    /**
     * List of locales that should be exported.
     *
     * @var array
     */
    'locales' => ['en', 'de'],

    /**
     * Set the type of framework you want to use the files with.
     *
     * options: vue, react, svelte
     */
    'type' => env('I18N_FRAMEWORK', 'vue'),

    /**
     * List of files that should be excluded from export.
     *
     * @var array
     */
    'exclude' => [],

    /**
     * Force overwrite of existing files.
     *
     * default: true
     * @var bool
     */
    'force' => env('I18N_FORCE_OVERWRITE', true),

    /**
     * Sort the exported files by key or value.
     *
     * default: key
     * options: key, value
     * @var string
     */
    'sort_by' => env('I18N_SORT_BY', 'key'),

    /**
     * Run the export command on optimize.
     *
     * default: false
     * @var bool
     */
    'run_on_optimize' => env('I18N_RUN_ON_OPTIMIZE', false),
];