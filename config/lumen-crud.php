<?php
return [
    'namespaces'  => [
        'models' => 'App\Models\\', // include trailing slash here!
    ],
    'targets'     => [
        'controller' => app()->path() . '/Http/Controllers/{{modelNamePlural}}Controller.php',
        'routes'     => app()->path() . '/../routes/web.php',
        'tests'      => app()->path() . '/../tests/CRUD/{{modelNamePlural}}CrudTest.php',
    ],
    'write_flags' => [
        'routes'     => FILE_APPEND,
    ],
];