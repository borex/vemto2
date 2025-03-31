# Project Model Documentation

The `Project` class is the central model in the Vemtoo application, representing a Laravel project with all its components including database schema, models, routes, and UI elements.

## Enums

### TranslationsFormat
- `LANG`: Uses language-based translation format
- `UNDERSCORE`: Uses underscore-based translation format

### ProjectFilesQueueStatus
- `IDLE`: The file queue is idle, not currently processing
- `PROCESSING`: The file queue is actively processing

### ProjectCssFramework
- `TAILWIND`: Tailwind CSS framework
- `BOOTSTRAP`: Bootstrap CSS framework
- `BULMA`: Bulma CSS framework
- `FOUNDATION`: Foundation CSS framework
- `OTHER`: Other CSS framework

### ProjectUIStarterKit
- `JETSTREAM`: Laravel Jetstream starter kit
- `BREEZE`: Laravel Breeze starter kit
- `LARAVEL_UI`: Laravel UI starter kit
- `EMPTY`: Empty starter kit
- `API`: API starter kit
- `OTHER`: Other starter kit

## Interfaces

### ProjectCodeGenerationSettings
Configuration for what components should be generated:
```typescript
interface ProjectCodeGenerationSettings {
    models: boolean,
    factories: boolean,
    seeders: boolean,
    policies: boolean,
    requests: boolean,
    controllers: boolean,
    routes: boolean,
    views: boolean,
    uiComponents: boolean,
    livewireLayout: boolean,
    translationsOnViews: boolean,
    translationsFormat: TranslationsFormat,
}
```

### ScheduledSchemaCheck
Configuration for scheduled schema synchronization:
```typescript
interface ScheduledSchemaCheck {
    tables: boolean
    models: boolean
}
```

### ProjectSettings
Configuration for Laravel project settings:
```typescript
interface ProjectSettings {
    cssFramework: ProjectCssFramework
    uiStarterKit: ProjectUIStarterKit,
    usesLivewire: boolean
    usesInertia: boolean
    usesVue: boolean
    usesReact: boolean
    usesSvelte: boolean
    isFreshLaravelProject: boolean,
    laravelVersion: string
    blueprintModeEnabled: boolean
    schemaReaderMode: string
    schemaReaderDbDriver: string
    schemaReaderDbHost: string
    schemaReaderDbPort: string
    schemaReaderDbDatabase: string
    schemaReaderDbUsername: string
    schemaReaderDbPassword: string
}
```

## Project Class

### Properties

| Property | Type | Description |
|----------|------|-------------|
| id | string | The primary identifier for the project |
| uuid | string | Universally unique identifier for the project |
| name | string | Project name |
| navs | Nav[] | Navigation components |
| cruds | Crud[] | CRUD operations |
| pages | Page[] | Pages in the project |
| tables | Table[] | Database tables |
| columns | Column[] | Table columns |
| indexes | Index[] | Table indexes |
| models | Model[] | Laravel models |
| routes | Route[] | Laravel routes |
| ownRelationships | Relationship[] | Model relationships |
| appSections | AppSection[] | Application sections |
| schemaSections | SchemaSection[] | Schema sections |
| schemaDataHash | string | Hash of schema data for change detection |
| lastReadSchemaDataHash | string | Previous schema data hash |
| schemaTablesDataHash | string | Hash of tables schema data |
| schemaModelsDataHash | string | Hash of models schema data |
| hasSchemaSourceChanges | boolean | Whether schema source has changes |
| canIgnoreNextSchemaSourceChanges | boolean | Whether to ignore next schema source changes |
| canShowSchemaSourceChangesAlert | boolean | Whether to show schema source changes alert |
| scheduledSchemaSync | ScheduledSchemaCheck | Configuration for scheduled schema sync |
| renderableFiles | RenderableFile[] | Files that can be rendered |
| currentRenderedFilesPaths | string[] | Paths of currently rendered files |
| vthemeCdn | string | CDN for vtheme |
| vthemeKeys | any | Keys for vtheme |
| currentSchemaError | string | Current schema error message |
| currentSchemaErrorStack | string | Current schema error stack trace |
| scrollX | number | Horizontal scroll position |
| scrollY | number | Vertical scroll position |
| codeGenerationSettings | ProjectCodeGenerationSettings | Settings for code generation |
| settings | ProjectSettings | Project settings |
| filesQueueStatus | ProjectFilesQueueStatus | Status of the files queue |
| currentZoom | number | Current zoom level |
| connectionFinished | boolean | Whether database connection is finished |
| translations | any | Translation data |
| defaultLanguage | string | Default language for translations |
| languages | string[] | Supported languages |
| codeChangesDetectorDisabled | boolean | Whether code changes detector is disabled |

### Relationships

The Project model defines relationships with other models in a Laravel-like fashion:

```typescript
relationships() {
    return {
        navs: () => this.hasMany(Nav).cascadeDelete(),
        cruds: () => this.hasMany(Crud).cascadeDelete(),
        pages: () => this.hasMany(Page).cascadeDelete(),
        tables: () => this.hasMany(Table).cascadeDelete(),
        columns: () => this.belongsToMany(Column, Table),
        indexes: () => this.belongsToMany(Index, Table),
        models: () => this.hasMany(Model).cascadeDelete(),
        routes: () => this.hasMany(Route).cascadeDelete(),
        appSections: () => this.hasMany(AppSection).cascadeDelete(),
        schemaSections: () => this.hasMany(SchemaSection).cascadeDelete(),
        ownRelationships: () => this.hasMany(Relationship).cascadeDelete(),
        renderableFiles: () => this.hasMany(RenderableFile).cascadeDelete(),
    }
}
```

### Core Methods

#### Static Methods

| Method | Parameters | Returns | Description |
|--------|------------|---------|-------------|
| creating | data: any | any | Hook called when creating a project; adds UUID if not present |
| addUuidIfNotExists | data: any | any | Adds UUID to project data if not present |
| findOrCreate | - | Project | Finds project with ID 1 or creates a new one |
| defaultSchemaSection | - | SchemaSection | Gets the default schema section of the project |

#### Instance Methods

##### Project Setup and Configuration

| Method | Parameters | Returns | Description |
|--------|------------|---------|-------------|
| isEmpty | - | boolean | Checks if the project is empty |
| setPath | path: string | void | Sets the project path |
| getPath | - | string | Gets the project path |
| startCodeGenerationSettings | - | void | Initializes code generation settings |
| fixCodeGenerationSettings | - | void | Ensures all code generation settings exist |
| getDefaultCodeGenerationSettings | - | ProjectCodeGenerationSettings | Gets default code generation settings |

##### Application and Component Access

| Method | Parameters | Returns | Description |
|--------|------------|---------|-------------|
| getNonDetailApplications | - | any[] | Gets applications that are not details |
| getApplications | - | any[] | Gets all applications |
| getApplicationById | applicationId: string | any | Gets application by ID |
| getAuthModel | - | Model | Gets the authentication model |
| deleteAllApplications | - | void | Deletes all applications |

##### Table Management

| Method | Parameters | Returns | Description |
|--------|------------|---------|-------------|
| hasTable | tableName: string | boolean | Checks if a table exists by name |
| doesNotHaveTable | tableName: string | boolean | Checks if a table does not exist by name |
| findTableByName | tableName: string | Table | Finds a table by name |
| findTableBySchemaStateName | schemaStateName: string | Table | Finds a table by schema state name |
| findTableById | tableId: string | Table | Finds a table by ID |
| getTablesWithChangesIncludingRemoved | - | Table[] | Gets tables with changes including removed ones |
| getTablesWithChanges | - | Table[] | Gets tables with changes |
| getTablesNames | - | string[] | Gets all table names |
| getAllTablesKeyedByName | - | { [key: string]: Table } | Gets all tables indexed by name |
| getRenamedTables | - | Table[] | Gets all renamed tables |
| getRemovedTables | - | Table[] | Gets all removed tables |
| getNewTables | - | Table[] | Gets all new tables |
| getTables | - | Table[] | Gets all non-removed tables |
| undoAllTablesChanges | - | void | Reverts all changes to tables |

##### Model Management

| Method | Parameters | Returns | Description |
|--------|------------|---------|-------------|
| findModelByName | modelName: string | Model | Finds a model by name |
| findModelByClass | modelClass: string | Model | Finds a model by class |
| findModelById | modelId: string | Model | Finds a model by ID |
| getModelsNames | - | string[] | Gets all model names |
| getModelsPlurals | - | string[] | Gets all model plural names |
| getAllModelsKeyedByName | - | { [key: string]: Model } | Gets all models indexed by name |
| getModelsClasses | - | string[] | Gets all model class names |
| getValidModels | - | Model[] | Gets all valid models |
| getAllModelsKeyedByClass | - | { [key: string]: Model } | Gets all models indexed by class |
| deleteAllModelsWithoutTable | - | void | Deletes all models without tables |
| undoAllModelsChanges | - | void | Reverts all changes to models |

##### Schema Management

| Method | Parameters | Returns | Description |
|--------|------------|---------|-------------|
| scheduleSchemaTablesSync | - | void | Schedules tables schema sync |
| scheduleSchemaModelsSync | - | void | Schedules models schema sync |
| scheduleSchemaSync | tables: boolean, models: boolean | void | Schedules schema sync |
| hasScheduledSchemaSync | - | boolean | Checks if schema sync is scheduled |
| resetScheduledSchemaSync | - | void | Resets scheduled schema sync |
| ignoreNextSchemaSourceChanges | - | void | Sets flag to ignore next schema source changes |
| dontIgnoreNextSchemaSourceChanges | - | void | Sets flag to not ignore next schema source changes |
| setHasSchemaSourceChanges | hasChanges: boolean | void | Sets flag indicating schema source changes |
| hasSchemaChanges | - | boolean | Checks if schema has changes |
| hasSchemaTablesChanges | - | boolean | Checks if tables schema has changes |
| hasSchemaModelsChanges | - | boolean | Checks if models schema has changes |
| getChangedTables | - | Table[] | Gets tables with schema changes |
| getChangedModels | - | Model[] | Gets models with schema changes |

##### File Management

| Method | Parameters | Returns | Description |
|--------|------------|---------|-------------|
| registerRenderableFile | path: string, name: string, template: string, type: RenderableFileType, status: RenderableFileStatus, ignoreConflicts: boolean | RenderableFile | Registers a file for rendering |
| hasRenderableFilesWithErrors | - | boolean | Checks if any renderable files have errors |
| hasRenderableFilesWithConflict | - | boolean | Checks if any renderable files have conflicts |
| clearRemovedRenderableFiles | - | void | Clears removed renderable files |
| clearSkippedRenderableFiles | - | void | Clears skipped renderable files |
| clearCurrentRenderedFilesPaths | - | void | Clears current rendered file paths |
| registerCurrentRenderedFilePath | path: string | void | Registers a current rendered file path |
| getCurrentRenderedFilesPaths | - | string[] | Gets current rendered file paths |
| processRemovableFiles | - | void | Processes files marked for removal |
| getRemovableFiles | - | RenderableFile[] | Gets files that can be removed |
| getAllPendingRenderableFiles | - | RenderableFile[] | Gets all pending renderable files |
| getAllRenderableFiles | ordered: boolean | RenderableFile[] | Gets all renderable files |
| getNonRemovedRenderableFiles | ordered: boolean | RenderableFile[] | Gets non-removed renderable files |
| getRemovedRenderableFiles | ordered: boolean | RenderableFile[] | Gets removed renderable files |
| getIgnoredRenderableFiles | ordered: boolean | RenderableFile[] | Gets ignored renderable files |
| getConflictRenderableFiles | ordered: boolean | RenderableFile[] | Gets renderable files with conflicts |
| getSkippedRenderableFiles | ordered: boolean | RenderableFile[] | Gets skipped renderable files |
| getOrderedRenderableFiles | - | RenderableFile[] | Gets ordered renderable files |
| clearRemovedFiles | - | void | Clears removed files |
| getRenderableFileByTemplatePath | path: string | RenderableFile | Gets renderable file by template path |

##### Route Management

| Method | Parameters | Returns | Description |
|--------|------------|---------|-------------|
| getRoutesByRoutableType | type: string | Route[] | Gets routes by routable type |

##### Section Management

| Method | Parameters | Returns | Description |
|--------|------------|---------|-------------|
| getApplicationsBySection | section: AppSection | any[] | Gets applications by section |
| getDefaultSchemaSection | - | SchemaSection | Gets default schema section |
| getSchemaSectionByName | sectionName: string | SchemaSection | Gets schema section by name |
| hasSection | sectionName: string | boolean | Checks if a section exists by name |
| moveTableToSectionByName | table: Table, sectionName: string | void | Moves table to a section by name |
| moveTableToDefaultSection | table: Table | void | Moves table to default section |
| moveTableToSection | table: Table, section: SchemaSection | void | Moves table to a section |
| getTablesBySection | section: SchemaSection | Table[] | Gets tables by section |

##### UI and Navigation

| Method | Parameters | Returns | Description |
|--------|------------|---------|-------------|
| getRootNavs | - | Nav[] | Gets root navigation items |
| getVthemeCdn | - | string | Gets vtheme CDN URL |
| setVthemeCdn | vthemeCdn: string | void | Sets vtheme CDN URL |
| getVthemeKeys | - | { [key: string]: string } | Gets vtheme keys |
| getVthemeKey | keyName: string | string | Gets a specific vtheme key |
| hasVthemeKey | keyName: string | boolean | Checks if a vtheme key exists |
| setVthemeKey | keyName: string, value: any | void | Sets a vtheme key |
| saveVthemeKeys | vthemeKeys: any | void | Saves all vtheme keys |
| processingFilesQueue | - | boolean | Checks if files queue is processing |
| setFilesQueueStatusProcessing | - | void | Sets files queue status to processing |
| setFilesQueueStatusIdle | - | void | Sets files queue status to idle |
| setFilesQueueStatus | status: ProjectFilesQueueStatus | void | Sets files queue status |

##### Schema Error Handling

| Method | Parameters | Returns | Description |
|--------|------------|---------|-------------|
| hasCurrentSchemaError | - | boolean | Checks if there's a current schema error |
| setCurrentSchemaError | error: string, stack: string | void | Sets the current schema error |
| treatErrorStack | stack: string | string | Formats the error stack for display |
| clearCurrentSchemaError | - | void | Clears the current schema error |

##### Zoom and Scroll

| Method | Parameters | Returns | Description |
|--------|------------|---------|-------------|
| hasScroll | - | boolean | Checks if scroll position is set |
| centerScroll | canvasWidth: number, canvasHeight: number, baseSize: number | void | Centers the scroll position |
| saveScroll | x: number, y: number | void | Saves the scroll position |
| zoomIn | - | void | Increases zoom level |
| zoomOut | - | void | Decreases zoom level |
| initZoom | - | void | Initializes zoom level |
| getZoomAsScale | - | number | Gets zoom as a scale factor |
| getTabNameFor | key: string | string | Gets tab name for a key |

##### Translations

| Method | Parameters | Returns | Description |
|--------|------------|---------|-------------|
| getDefaultTranslation | key: string | string | Gets default translation for a key |
| getTranslation | language: string, key: string | string | Gets translation for a language and key |
| setTranslation | language: string, key: string, value: string | void | Sets translation for a language and key |
| setTranslationOnAllLanguages | key: string, value: string | void | Sets translation for all languages |
| deleteTranslation | language: string, key: string | void | Deletes translation for a language and key |
| deleteTranslationOnAllLanguages | key: string | void | Deletes translation for all languages |

##### Laravel Version Checks

| Method | Parameters | Returns | Description |
|--------|------------|---------|-------------|
| laravelVersionEqualTo | version: string | boolean | Checks if Laravel version equals a specific version |
| laravelVersionGreaterThan | version: string | boolean | Checks if Laravel version is greater than a specific version |
| laravelVersionGreaterThanOrEqualTo | version: string | boolean | Checks if Laravel version is greater than or equal to a specific version |
| laravelVersionLessThan | version: string | boolean | Checks if Laravel version is less than a specific version |
| laravelVersionLessThanOrEqualTo | version: string | boolean | Checks if Laravel version is less than or equal to a specific version |
| getLaravelVersion | - | string | Gets the Laravel version |

##### Starter Kit Checks

| Method | Parameters | Returns | Description |
|--------|------------|---------|-------------|
| isJetstream | - | boolean | Checks if starter kit is Jetstream |
| isBreeze | - | boolean | Checks if starter kit is Breeze |
| isEmptyStarterKit | - | boolean | Checks if starter kit is empty |
| isApiStarterKit | - | boolean | Checks if starter kit is API |
| isOtherStarterKit | - | boolean | Checks if starter kit is other |
| starterKitDoesNotNeedViewsAndUiComponents | - | boolean | Checks if starter kit doesn't need views and UI components |
| starterKitNeedsViewsAndUiComponents | - | boolean | Checks if starter kit needs views and UI components |
| isFreshLaravelProject | - | boolean | Checks if it's a fresh Laravel project |
| isSyncModeEnabled | - | boolean | Checks if sync mode is enabled |
| isBlueprintModeEnabled | - | boolean | Checks if blueprint mode is enabled |

##### Table Organization

| Method | Parameters | Returns | Description |
|--------|------------|---------|-------------|
| organizeTablesHorizontally | schemaSection: SchemaSection | void | Organizes tables horizontally |
| organizeTablesOfAllSectionsByRelations | - | void | Organizes tables of all sections by relations |
| organizeTablesByRelations | schemaSection: SchemaSection | void | Organizes tables by relations |

## Usage Examples

### Creating a new project

```typescript
// Create a new project instance
const project = new Project();
project.name = "My Laravel Project";
project.save();

// Or use the findOrCreate method
const project = Project.findOrCreate();
```

### Working with tables

```typescript
// Create a new table
const userTable = new Table();
userTable.name = "users";
userTable.projectId = project.id;
userTable.save();

// Check if a table exists
if (project.hasTable("users")) {
  console.log("Users table exists");
}

// Find a table by name
const table = project.findTableByName("users");
```

### Working with models

```typescript
// Create a new model
const userModel = new Model();
userModel.name = "User";
userModel.class = "User";
userModel.projectId = project.id;
userModel.save();

// Find a model by class name
const model = project.findModelByClass("User");
```

### Schema synchronization

```typescript
// Schedule schema sync
project.scheduleSchemaSync(true, true);

// Check if schema sync is needed
if (project.hasSchemaChanges()) {
  console.log("Schema has changes");
}
```

### Organizing tables

```typescript
// Get a schema section
const defaultSection = project.getDefaultSchemaSection();

// Organize tables horizontally
project.organizeTablesHorizontally(defaultSection);

// Organize tables by relations
project.organizeTablesByRelations(defaultSection);
```

### Working with translations

```typescript
// Set a translation
project.setTranslation("en", "welcome", "Welcome to the application");

// Get a translation
const welcomeMessage = project.getTranslation("en", "welcome");
```
