<?php

namespace App\Console\Commands;

use App\Models\Permission;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use function Laravel\Prompts\info;
use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\spin;

class CrudGenerator extends Command
{
    protected $signature = 'make:crud {resource}';
    protected $description = 'Generate CRUD operations for a given resource';

    protected string $resource;

    protected string $resourceSingularPascal;
    protected string $resourceSingularCamel;
    protected string $resourceSingularKebab;
    protected string $resourceSingularSnake;
    protected string $resourceSingularTitle;

    protected string $resourcePluralPascal;
    protected string $resourcePluralCamel;
    protected string $resourcePluralKebab;
    protected string $resourcePluralSnake;
    protected string $resourcePluralTitle;

    public function handle()
    {
        $this->resource = $this->argument('resource');

        $this->resourceSingularPascal = $this->transform($this->resource, 'singular', 'pascal');
        $this->resourceSingularCamel = $this->transform($this->resource, 'singular', 'camel');
        $this->resourceSingularKebab = $this->transform($this->resource, 'singular', 'kebab');
        $this->resourceSingularSnake = $this->transform($this->resource, 'singular', 'snake');
        $this->resourceSingularTitle = $this->transform($this->resource, 'singular', 'title');

        $this->resourcePluralPascal = $this->transform($this->resource, 'plural', 'pascal');
        $this->resourcePluralCamel = $this->transform($this->resource, 'plural', 'camel');
        $this->resourcePluralKebab = $this->transform($this->resource, 'plural', 'kebab');
        $this->resourcePluralSnake = $this->transform($this->resource, 'plural', 'snake');
        $this->resourcePluralTitle = $this->transform($this->resource, 'plural', 'title');

        $itemsSelected = multiselect(
            scroll: 20,
            label: 'Which resources should be generated?',
            options: [
                'permissions'         => 'Permissions',
                'migration'          => 'Migration',
                'model'               => 'Model',
                'controller'          => 'Controller',
                'store_request'       => 'Store Request',
                'update_request'      => 'Update Request',
                'service'             => 'Service',
                'livewire_components' => 'Livewire Components',
                'views'               => 'Views',
                'routes'              => 'Routes',
                'translations'        => 'Translations',
            ],
            default: [
                'permissions',
                'migration',
                'model',
                'controller',
                'store_request',
                'update_request',
                'service',
                'livewire_components',
                'views',
                'routes',
                'translations',
            ],
            required: true,
        );

        $itemsSelected = $this->convertToAssociative($itemsSelected);

        if (isset($itemsSelected['permissions'])) $this->generatePermissions();
        if (isset($itemsSelected['migration'])) $this->generateMigration();
        if (isset($itemsSelected['model'])) $this->generateModel();
        if (isset($itemsSelected['controller'])) $this->generateController();
        if (isset($itemsSelected['store_request'])) $this->generateStoreRequest();
        if (isset($itemsSelected['update_request'])) $this->generateUpdateRequest();
        if (isset($itemsSelected['service'])) $this->generateService();
        if (isset($itemsSelected['livewire_components'])) $this->generateLivewireComponent();
        if (isset($itemsSelected['views'])) $this->generateViews();
        if (isset($itemsSelected['routes'])) $this->generateRoutes();
        if (isset($itemsSelected['translations'])) $this->generateTranslations();

        $this->outputAdditionalInformation();
    }

    protected function generatePermissions()
    {
        spin(
            function () {
                sleep(1);

                $permissions = [
                    [
                        'category' => "backend.$this->resourcePluralSnake",
                        'name'     => "backend.list_$this->resourcePluralSnake",
                        'code'     => "list_$this->resourcePluralSnake",
                    ],
                    [
                        'category' => "backend.$this->resourcePluralSnake",
                        'name'     => "backend.create_$this->resourcePluralSnake",
                        'code'     => "create_$this->resourcePluralSnake",
                    ],
                    [
                        'category' => "backend.$this->resourcePluralSnake",
                        'name'     => "backend.view_$this->resourcePluralSnake",
                        'code'     => "view_$this->resourcePluralSnake",
                    ],
                    [
                        'category' => "backend.$this->resourcePluralSnake",
                        'name'     => "backend.edit_$this->resourcePluralSnake",
                        'code'     => "edit_$this->resourcePluralSnake",
                    ],
                    [
                        'category' => "backend.$this->resourcePluralSnake",
                        'name'     => "backend.delete_$this->resourcePluralSnake",
                        'code'     => "delete_$this->resourcePluralSnake",
                    ],
                ];

                Permission::insert($permissions);

            }, 'Generating permissions...'
        );

        info('Permissions generated successfully!');
    }

    protected function generateMigration()
    {
        spin(
            function () {
                sleep(1);

                $nextMigrationNumber = $this->getNextMigrationNumber();
                $stubPath = 'backend/stubs/migration.stub';
                $filePath = "database/migrations/{$nextMigrationNumber}_create_{$this->resourcePluralSnake}_table.php";

                $this->generateFile($this->resource, $stubPath, $filePath);
                $this->openFile($filePath);

            }, 'Generating migration...'
        );

        info('Migration generated successfully!');
    }

    protected function generateModel()
    {
        spin(
            function () {
                sleep(1);

                $stubPath = 'backend/stubs/model.stub';
                $filePath = "app/Models/{$this->resource}.php";

                $this->generateFile($this->resource, $stubPath, $filePath);
                $this->openFile($filePath);

            }, 'Generating model...'
        );

        info('Model generated successfully!');

    }

    protected function generateController()
    {
        spin(
            function () {
                sleep(1);

                $stubPath = 'backend/stubs/controller.stub';
                $filePath = "app/Http/Controllers/Backend/{$this->resource}Controller.php";

                $this->generateFile($this->resource, $stubPath, $filePath);
                $this->openFile($filePath);

            }, 'Generating controller...'
        );

        info('Controller generated successfully!');
    }

    protected function generateStoreRequest()
    {
        spin(
            function () {
                sleep(1);

                $stubPath = 'backend/stubs/store-request.stub';
                $filePath = "app/Http/Requests/Backend/{$this->resource}StoreRequest.php";

                $this->generateFile($this->resource, $stubPath, $filePath);
                $this->openFile($filePath);

            }, 'Generating store request...'
        );

        info('Store request generated successfully!');
    }

    protected function generateUpdateRequest()
    {
        spin(
            function () {
                sleep(1);

                $stubPath = 'backend/stubs/update-request.stub';
                $filePath = "app/Http/Requests/Backend/{$this->resource}UpdateRequest.php";

                $this->generateFile($this->resource, $stubPath, $filePath);
                $this->openFile($filePath);

            }, 'Generating update request...'
        );

        info('Update request generated successfully!');
    }

    protected function generateService()
    {
        spin(
            function () {
                sleep(1);

                $stubPath = 'backend/stubs/service.stub';
                $filePath = "app/Services/Backend/{$this->resource}Service.php";

                $this->generateFile($this->resource, $stubPath, $filePath);
                $this->openFile($filePath);

            }, 'Generating service...'
        );

        info('Service generated successfully!');
    }

    protected function generateLivewireComponent()
    {
        spin(
            function () {
                sleep(1);

                $stubPath = 'backend/stubs/livewire/app-index.stub';
                $filePath = "app/Livewire/Backend/{$this->resource}/Index.php";

                $this->generateFile($this->resource, $stubPath, $filePath);
                $this->openFile($filePath);

                $stubPath = 'backend/stubs/livewire/view-index.stub';
                $filePath = "resources/views/backend/livewire/{$this->resourceSingularKebab}/index.blade.php";

                $this->generateFile($this->resource, $stubPath, $filePath);
                $this->openFile($filePath);

            }, 'Generating livewire components...'
        );

        info('Livewire components generated successfully!');
    }

    protected function generateViews()
    {
        spin(
            function () {
                sleep(1);

                $stubPath = 'backend/stubs/views/index.stub';
                $filePath = "resources/views/backend/{$this->resourcePluralKebab}/index.blade.php";

                $this->generateFile($this->resource, $stubPath, $filePath);

                $stubPath = 'backend/stubs/views/create.stub';
                $filePath = "resources/views/backend/{$this->resourcePluralKebab}/create.blade.php";

                $this->generateFile($this->resource, $stubPath, $filePath);

                $stubPath = 'backend/stubs/views/show.stub';
                $filePath = "resources/views/backend/{$this->resourcePluralKebab}/show.blade.php";

                $this->generateFile($this->resource, $stubPath, $filePath);

                $stubPath = 'backend/stubs/views/edit.stub';
                $filePath = "resources/views/backend/{$this->resourcePluralKebab}/edit.blade.php";

                $this->generateFile($this->resource, $stubPath, $filePath);

            }, 'Generating views...'
        );

        info('Views generated successfully!');

    }

    protected function generateRoutes()
    {
        spin(
            function () {
                sleep(1);

                $customRoutes = <<<EOL

                    use App\Http\Controllers\Backend\\{$this->resource}Controller;

                    Route::prefix('$this->resourcePluralKebab')->name('$this->resourcePluralKebab.')->group(function () {
                        Route::get('/', [{$this->resource}Controller::class, 'index'])->name('index');
                        Route::get('/create', [{$this->resource}Controller::class, 'create'])->name('create');
                        Route::post('/store', [{$this->resource}Controller::class, 'store'])->name('store');
                        Route::get('/{{$this->resourceSingularCamel}}', [{$this->resource}Controller::class, 'show'])->name('show');
                        Route::get('/{{$this->resourceSingularCamel}}/edit', [{$this->resource}Controller::class, 'edit'])->name('edit');
                        Route::patch('/{{$this->resourceSingularCamel}}/update', [{$this->resource}Controller::class, 'update'])->name('update');
                        Route::delete('/{{$this->resourceSingularCamel}}/delete', [{$this->resource}Controller::class, 'delete'])->name('delete');
                    });

                EOL;

                File::append(base_path('routes/backend.php'), $customRoutes);

            }, 'Generating routes...'
        );

        info('Routes generated successfully!');
    }

    protected function generateTranslations()
    {
        spin(
            function () {
                sleep(1);

                $translations = [
                    "{$this->resourceSingularSnake}"                                             => "{$this->resourceSingularTitle}",
                    "{$this->resourcePluralSnake}"                                               => "{$this->resourcePluralTitle}",
                    "list_{$this->resourcePluralSnake}"                                          => "List {$this->resourcePluralTitle}",
                    "create_{$this->resourceSingularSnake}"                                      => "Create {$this->resourceSingularTitle}",
                    "create_{$this->resourcePluralSnake}"                                        => "Create {$this->resourcePluralTitle}",
                    "{$this->resourceSingularSnake}_details"                                     => "{$this->resourceSingularTitle} Details",
                    "view_{$this->resourceSingularSnake}"                                        => "View {$this->resourceSingularTitle}",
                    "view_{$this->resourcePluralSnake}"                                          => "View {$this->resourcePluralTitle}",
                    "update_{$this->resourceSingularSnake}"                                      => "Update {$this->resourceSingularTitle}",
                    "update_{$this->resourcePluralSnake}"                                        => "Update {$this->resourcePluralTitle}",
                    "delete_{$this->resourceSingularSnake}"                                      => "Delete {$this->resourceSingularTitle}",
                    "delete_{$this->resourcePluralSnake}"                                        => "Delete {$this->resourcePluralTitle}",
                    "{$this->resourceSingularSnake}_created_successfully"                        => "{$this->resourceSingularTitle} created successfully",
                    "{$this->resourceSingularSnake}_updated_successfully"                        => "{$this->resourceSingularTitle} updated successfully",
                    "{$this->resourceSingularSnake}_deleted_successfully"                        => "{$this->resourceSingularTitle} deleted successfully",
                    "{$this->resourcePluralSnake}_deleted_successfully"                          => "{$this->resourcePluralTitle} deleted successfully",
                    "are_you_sure_you_want_to_delete_this_{$this->resourceSingularSnake}?"       => "Are you sure you want to delete this {$this->resourceSingularTitle}?",
                    "are_you_sure_you_want_to_delete_the_selected_{$this->resourcePluralSnake}?" => "Are you sure you want to delete the selected {$this->resourcePluralTitle}?",
                ];

                $langFilePath = resource_path('lang/en/backend.php');

                if (file_exists($langFilePath)) {
                    $existingTranslations = require $langFilePath;

                    // Merge the existing translations with new translations
                    $mergedTranslations = array_merge($existingTranslations, $translations);

                    // Convert the translations to a PHP array
                    $translationsArray = var_export($mergedTranslations, true);

                    // Write the updated translations to the file
                    file_put_contents($langFilePath, "<?php\n\nreturn $translationsArray;");
                }

            }, 'Generating translations...'
        );

        info('Translations generated successfully!');
    }

    protected function outputAdditionalInformation()
    {
        info("\nCode generation for {$this->resource} finished successfully \n");
        info("Don't forget to run the new migration!\n");
    }

    function convertToAssociative(array $indexedArray): array
    {
        $associativeArray = [];
        foreach ($indexedArray as $value) {
            $key = str_replace(' ', '_', strtolower($value)); // Convert "Update Request" to "update_request"
            $associativeArray[$key] = $value;
        }
        return $associativeArray;
    }

    protected function generateFile($resource, $stubPath, $storePath)
    {
        $stubVariables = [
            '{{resource}}',
            '{{resourceSingularPascal}}',
            '{{resourceSingularCamel}}',
            '{{resourceSingularKebab}}',
            '{{resourceSingularSnake}}',
            '{{resourcePluralPascal}}',
            '{{resourcePluralCamel}}',
            '{{resourcePluralKebab}}',
            '{{resourcePluralSnake}}',
        ];

        $stubVariableReplacements = [
            $this->resource,
            $this->resourceSingularPascal,
            $this->resourceSingularCamel,
            $this->resourceSingularKebab,
            $this->resourceSingularSnake,
            $this->resourcePluralPascal,
            $this->resourcePluralCamel,
            $this->resourcePluralKebab,
            $this->resourcePluralSnake
        ];

        $stubContents = file_get_contents(resource_path($stubPath));

        $contents = str_replace($stubVariables, $stubVariableReplacements, $stubContents);

        $this->makeDirectoryIfNotExists($storePath);

        file_put_contents(base_path($storePath), $contents);
    }

    protected function makeDirectoryIfNotExists($storePath)
    {
        $directoryPath = pathinfo($storePath)['dirname'];

        if (!is_dir($directoryPath)) {
            mkdir($directoryPath, 0755, true);
        }
    }

    protected function transform($resource, $type, $textCase)
    {
        // split $resource
        $resource = $this->splitCamelCase($resource);

        // Handle $type
        if ($type == 'singular')
            $resource = Str::singular($resource);

        if ($type == 'plural')
            $resource = Str::plural($resource);

        // Handle textCase
        if ($textCase == 'pascal')
            $resource = Str::studly($resource);

        if ($textCase == 'camel')
            $resource = Str::camel($resource);

        if ($textCase == 'kebab')
            $resource = Str::kebab($resource);

        if ($textCase == 'snake')
            $resource = Str::snake($resource);

        if ($textCase == 'title')
            $resource = Str::title($resource);

        return $resource;
    }

    protected function splitCamelCase($inputString)
    {
        $parts = preg_split('/(?=[A-Z])/', $inputString);
        return implode(' ', $parts);
    }

    protected function getNextMigrationNumber()
    {
        $migrationFiles = File::glob(database_path('migrations') . '/*_*.php');

        $latestMigration = collect($migrationFiles)->map(function ($file) {
            return pathinfo($file, PATHINFO_FILENAME);
        })->map(function ($fileName) {
            return (int)explode('_', $fileName)[0];
        })->max();

        return str_pad($latestMigration ? $latestMigration + 1 : 1, 5, '0', STR_PAD_LEFT);
    }

    // Only compatible with PHPStorm
    protected function openFile($filePath)
    {
        exec("open -na 'PhpStorm.app' --args $filePath");
    }
}
