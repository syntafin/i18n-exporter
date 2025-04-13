<?php

return [
    'path' => 'resources/lang',
    'locales' => ['en', 'de'],
    'exclude' => [],
    'include' => [],
    'force' => env('I18N_FORCE_OVERWRITE', true),
    'sort_by_key' => env('I18N_SORT_BY_KEY', false),
    'sort_by_value' => env('I18N_SORT_BY_VALUE',false),
];