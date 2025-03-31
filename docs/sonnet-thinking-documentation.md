# Vemtoo2 Schema Model Documentation

This documentation provides detailed information about the schema modeling system in Vemtoo2, including classes, methods, properties, and their relationships.

## Table of Contents

- [Core Components](#core-components)
  - [SchemaModel Interface](#schemamodel-interface)
  - [AbstractSchemaModel](#abstractschemamodel)
- [Schema Components](#schema-components)
  - [Column](#column)
  - [Table](#table)
  - [Index](#index)
  - [Model](#model)
  - [Project](#project)
- [Relationships Between Components](#relationships-between-components)
- [Common Workflows](#common-workflows)

## Core Components

### SchemaModel Interface

The `SchemaModel` interface defines the contract for all schema-related models that need to track state and changes.

```typescript
interface SchemaModel {
    schemaState: any

    hasSchemaChanges(comparisonData: any): boolean
    hasDataChanges(comparisonData: any): boolean
    dataComparisonMap(comparisonData: any): any
    hasLocalChanges(): boolean
    applyChanges(data: any): boolean
    saveSchemaState(): void
    fillSchemaState(): void
    buildSchemaState(): any
    isNew(): boolean
    wasRenamed(): boolean
    getOldName(): string
    getCanonicalName(): string
    isRemoved(): boolean
    undoChanges(): void    
    logDataComparison(): void
}
```

#### Methods

- **hasSchemaChanges(comparisonData)**: Checks if the current schema differs from provided comparison data
- **hasDataChanges(comparisonData)**: Determines if data properties have changed compared to the provided data
- **dataComparisonMap(comparisonData)**: Returns a map of property names to boolean values indicating which properties have changed
- **hasLocalChanges()**: Checks if the current instance has unsaved changes
- **applyChanges(data)**: Updates the current instance with provided data
- **saveSchemaState()**: Captures the current state as the schema state
- **fillSchemaState()**: Populates the schema state
- **buildSchemaState()**: Creates the schema state object
- **isNew()**: Returns true if the entity is newly created
- **wasRenamed()**: Checks if the name has changed from its original
- **getOldName()**: Returns the original name
- **getCanonicalName()**: Returns the canonical name (usually the schema state name or current name)
- **isRemoved()**: Checks if the entity is marked for removal
- **undoChanges()**: Reverts local changes
- **logDataComparison()**: Logs data comparison information for debugging

### AbstractSchemaModel

`AbstractSchemaModel` is an abstract base class that implements common `SchemaModel` functionality for all schema-related models.

```typescript
abstract class AbstractSchemaModel extends RelaDB.Model {
    name: string
    schemaState: any
    removed: boolean
    static isSavingInternally = false

    abstract buildSchemaState(): any
    
    // ...various methods...
}
```

#### Properties

- **name**: The name of the schema entity
- **schemaState**: Stores the original state for tracking changes
- **removed**: Flag indicating if the entity has been marked for removal
- **isSavingInternally**: Static flag to enable saving protected properties

#### Methods

- **getOldName()**: Returns the original name from schema state
- **getCanonicalName()**: Returns the canonical name for this entity
- **isNew()**: Returns true if no schema state exists
- **wasRenamed()**: Checks if the name has changed
- **wasUpdatedOrRemoved()**: Returns true if the entity was updated or removed
- **wasUpdated()**: Returns true if the entity was updated
- **isRemoved()**: Returns true if the entity is marked for removal
- **markAsRemoved()**: Marks the entity for removal
- **markAsNotRemoved()**: Marks the entity as not removed
- **undoChanges()**: Reverts changes by restoring from schema state
- **getSchemaStateData()**: Returns the schema state data
- **static savingInternally()**: Enables internal saving mode
- **static notSavingInternally()**: Disables internal saving mode
- **static propertiesAreDifferent()**: Compares properties for differences
- **saveInternally()**: Saves with internal mode enabled
- **applyChangesDirectlyToSchemaState()**: Updates schema state with current values
- **deleteIfRemoved()**: Deletes the entity if it's marked for removal

## Schema Components

### Column

`Column` represents a database column within a table.

```typescript
class Column extends AbstractSchemaModel implements SchemaModel {
    id: string
    name: string
    type: string
    table: Table
    order: number
    index: boolean
    length: number
    unique: boolean
    tableId: string
    removed: boolean
    schemaState: any
    nullable: boolean
    unsigned: boolean
    default: string
    defaultIsRaw: boolean
    total: number
    places: number
    autoIncrement: boolean
    faker: string
    options: string[]
    inputs: Input[]
    referencedIndexes: Index[]
    columnIndexes: Index[]
    
    // Various relationship properties
    relationshipsByForeignKey: Relationship[]
    relationshipsByOwnerKey: Relationship[]
    relationshipsByParentKey: Relationship[]
    relationshipsByForeignPivotKey: Relationship[]
    relationshipsByRelatedPivotKey: Relationship[]
    relationshipsByMorphIdColumn: Relationship[]
    relationshipsByMorphTypeColumn: Relationship[]
    
    // ...many methods...
}
```

#### Key Properties

- **id**: Unique identifier
- **name**: Column name
- **type**: Column data type
- **table**: Parent table
- **order**: Position in the table
- **index**: Whether the column is indexed
- **unique**: Whether the column has a unique constraint
- **nullable**: Whether the column allows NULL values
- **unsigned**: Whether the column is unsigned (for numeric types)
- **default**: Default value
- **defaultIsRaw**: Whether the default value is a raw expression
- **autoIncrement**: Whether the column auto-increments
- **faker**: Faker expression for generating test data
- **options**: Array of options (for enum/set types)

#### Key Methods

- **relationships()**: Defines relationships with other models
- **reorder()**: Adjusts the column order in the table
- **saveFromInterface()**: Saves the column from the UI
- **remove()**: Marks the column for removal
- **isPrimaryKey()**: Checks if the column is a primary key
- **isForeignKey()**: Checks if the column is a foreign key
- **isUnique()**: Checks if the column has a unique constraint
- **isCreatedAt()/isUpdatedAt()/isDeletedAt()**: Checks if the column is a Laravel timestamp
- **getDefaultFaker()**: Gets the default Faker string for the column type
- **buildSchemaState()**: Builds the schema state for comparison
- **dataComparisonMap()**: Creates a comparison map for detecting changes
- **isValid()**: Checks if the column has valid settings

### Table

`Table` represents a database table that contains columns and indexes.

```typescript
class Table extends AbstractSchemaModel implements SchemaModel {
    id: string
    name: string
    oldNames: string[]
    indexes: Index[]
    models: Model[]
    project: Project
    removed: boolean
    projectId: string
    columns: Column[]
    migrations: TableMigration[]
    positionX: number
    positionY: number
    labelColumn: Column
    labelColumnId: string
    section: SchemaSection
    sectionId: string
    createdFromInterface: boolean
    pivotRelationships: Relationship[]
    
    // ...many methods...
}
```

#### Key Properties

- **id**: Unique identifier
- **name**: Table name
- **oldNames**: Previous names of the table
- **indexes**: Table indexes
- **models**: Models associated with this table
- **columns**: Columns in the table
- **migrations**: Migration history
- **positionX/positionY**: Position in the schema diagram
- **labelColumn**: Column used for labels/display
- **section**: Schema section this table belongs to

#### Key Methods

- **relationships()**: Defines relationships with other models
- **saveFromInterface()**: Saves the table from the UI
- **remove()**: Marks the table for removal
- **hasSchemaChanges()**: Checks for schema changes
- **isDirty()**: Checks if table or its children have changes
- **hasDirtyColumns()/hasDirtyIndexes()**: Checks for changes in columns/indexes
- **getPrimaryKeyColumn()**: Gets the primary key column
- **getColumns()/getIndexes()**: Gets valid columns/indexes
- **getRemovedColumns()/getRemovedIndexes()**: Gets columns/indexes marked for removal
- **getNewColumns()/getNewIndexes()**: Gets newly added columns/indexes
- **getChangedColumns()/getChangedIndexes()**: Gets columns/indexes with changes
- **getValidColumns()**: Gets columns with valid configuration
- **getOrderedColumns()**: Gets columns ordered by position
- **getRelationships()**: Gets all relationships associated with the table
- **hasChildrenTables()/getChildrenTables()**: Gets tables that depend on this table
- **hasParentTables()/getParentTables()**: Gets tables this table depends on
- **getRelatedTables()**: Gets all tables related to this one
- **addForeign()**: Adds a foreign key relationship

### Index

`Index` represents a database index, which can be primary, foreign, unique, etc.

```typescript
class Index extends AbstractSchemaModel implements SchemaModel {
    id: string
    on: string
    onTableId: string
    onTable: Table
    name: string
    type: IndexType
    table: Table
    tableId: string
    language: string
    schemaState: any
    removed: boolean
    algorithm: string
    columns: string[]
    indexColumns: Column[]
    references: string
    referencesColumnId: string
    referencesColumn: Column
    onUpdate: string
    onDelete: string
    
    // ...methods...
}
```

#### IndexType Enum

```typescript
enum IndexType {
    PRIMARY = "primary",
    FOREIGN = "foreign",
    UNIQUE = "unique",
    INDEX = "index",
    FULLTEXT = "fullText",
    FULLTEXT_CHAIN = "fulltext",
    SPATIAL = "spatialIndex"
}
```

#### Key Properties

- **id**: Unique identifier
- **name**: Index name
- **type**: Index type (primary, foreign, unique, etc.)
- **table**: Table the index belongs to
- **on**: Referenced table name (for foreign keys)
- **onTable**: Referenced table object
- **columns**: Column names in the index
- **indexColumns**: Column objects in the index
- **references**: Referenced column name (for foreign keys)
- **referencesColumn**: Referenced column object
- **onUpdate/onDelete**: Foreign key cascade actions

#### Key Methods

- **relationships()**: Defines relationships with other models
- **saveFromInterface()**: Saves the index from the UI
- **remove()**: Marks the index for removal
- **isPrimary()/isForeign()/isUnique()/isCommon()**: Type checks
- **hasSchemaChanges()**: Checks for schema changes
- **hasValidColumns()**: Checks if the index has valid columns
- **calculateDefaultName()**: Generates a default name for the index
- **buildSchemaState()**: Builds the schema state for comparison
- **dataComparisonMap()**: Creates a comparison map for detecting changes
- **getForeignTable()**: Gets the referenced table for foreign keys
- **updateColumns()**: Updates the columns in this index

### Model

`Model` represents a Laravel Eloquent model mapped to a database table.

```typescript
class Model extends AbstractSchemaModel implements SchemaModel {
    id: string
    name: string
    plural: string
    path: string
    table: Table
    class: string
    namespace: string
    tableId: string
    fileName: string
    schemaState: any
    removed: boolean
    project: Project
    tableName: string
    projectId: string
    createdFromInterface: boolean
    ownRelationships: Relationship[]
    relatedRelationships: Relationship[]
    hooks: any
    hooksWhenSchemaWasRead: any
    pluralAndSingularAreSame: boolean
    cruds: Crud[]
    
    // Settings
    callSeeder: boolean
    seederQuantity: number
    attributesComments: boolean
    methodsComments: boolean
    
    // PHP related properties
    parentClass: string
    interfaces: string[]
    traits: string[]
    allImports: string[]
    
    // Laravel related properties
    methods: string[]
    hasGuarded: boolean
    guarded: string[]
    guardedColumns: Column[]
    hasFillable: boolean
    fillable: string[]
    fillableColumns: Column[]
    hidden: string[]
    hiddenColumns: Column[]
    dates: string[]
    datesColumns: Column[]
    appends: string[]
    casts: any
    castsColumns: Column[]
    hasTimestamps: boolean
    hasSoftDeletes: boolean
    isAuthenticatable: boolean
    
    // ...many methods...
}
```

#### Key Properties

- **id**: Unique identifier
- **name**: Model name
- **plural**: Plural form of the model name
- **path**: File path for the model
- **table**: Associated database table
- **class**: Full class name including namespace
- **namespace**: PHP namespace
- **fileName**: PHP file name
- **hooks**: Custom code hooks for model generation
- **hasGuarded/hasFillable**: Whether to use guarded/fillable attributes
- **guarded/fillable/hidden/dates/appends**: Laravel model attributes
- **casts**: Type casting definitions
- **hasTimestamps/hasSoftDeletes**: Laravel timestamp and soft delete flags
- **isAuthenticatable**: Whether the model is used for authentication

#### Key Methods

- **relationships()**: Defines relationships with other models
- **saveFromInterface()**: Saves the model from the UI
- **remove()**: Marks the model for removal
- **isDirty()**: Checks if the model or relationships have changes
- **hasSchemaChanges()**: Checks for schema changes
- **buildSchemaState()**: Builds the schema state for comparison
- **dataComparisonMap()**: Creates a comparison map for detecting changes
- **getValidRelationships()**: Gets valid relationships
- **getBelongsToRelations()/getHasManyRelations()**: Gets specific relationship types
- **saveFillableColumns()/saveGuardedColumns()**: Updates fillable/guarded columns
- **columnIsFillable()/columnIsGuarded()/columnIsHidden()**: Column attribute checks
- **getPrimaryKeyName()/getPrimaryKeyColumn()**: Gets primary key information
- **getFreeSimilarRelationship()**: Finds similar relationships for linking
- **calculateDataByName()**: Updates model data based on name
- **getClassString()**: Gets the full class name with namespace

### Project

`Project` represents the entire project containing tables, models, and other components.

```typescript
class Project extends RelaDB.Model {
    id: string
    uuid: string
    name: string
    navs: Nav[]
    cruds: Crud[]
    pages: Page[]
    tables: Table[]
    columns: Column[]
    indexes: Index[]
    models: Model[]
    routes: Route[]
    ownRelationships: Relationship[]
    appSections: AppSection[]
    schemaSections: SchemaSection[]
    schemaDataHash: string
    lastReadSchemaDataHash: string
    schemaTablesDataHash: string
    schemaModelsDataHash: string
    hasSchemaSourceChanges: boolean
    canIgnoreNextSchemaSourceChanges: boolean
    canShowSchemaSourceChangesAlert: boolean
    scheduledSchemaSync: ScheduledSchemaCheck
    renderableFiles: RenderableFile[]
    currentRenderedFilesPaths: string[]
    vthemeCdn: string
    vthemeKeys: any
    currentSchemaError: string
    currentSchemaErrorStack: string
    scrollX: number
    scrollY: number
    codeGenerationSettings: ProjectCodeGenerationSettings
    settings: ProjectSettings
    filesQueueStatus: ProjectFilesQueueStatus
    currentZoom: number
    connectionFinished: boolean
    translations: any
    defaultLanguage: string
    languages: string[]
    codeChangesDetectorDisabled: boolean
    
    // ...many methods...
}
```

#### Enums and Interfaces

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

enum TranslationsFormat {
    LANG = "lang",
    UNDERSCORE = "underscore",
}

interface ScheduledSchemaCheck {
    tables: boolean
    models: boolean
}

enum ProjectFilesQueueStatus {
    IDLE = "idle",
    PROCESSING = "processing",
}

enum ProjectCssFramework {
    TAILWIND = "tailwind",
    BOOTSTRAP = "bootstrap",
    BULMA = "bulma",
    FOUNDATION = "foundation",
    OTHER = "other",
}

enum ProjectUIStarterKit {
    JETSTREAM = "jetstream",
    BREEZE = "breeze",
    LARAVEL_UI = "laravel_ui",
    EMPTY = "empty",
    API = "api",
    OTHER = "other",
}

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

#### Key Properties

- **id, uuid, name**: Identifiers and name
- **tables, models, columns, indexes**: Schema components
- **cruds, pages, routes**: Application components
- **appSections, schemaSections**: Organizational sections
- **schemaDataHash**: Hash of schema data for change detection
- **renderableFiles**: Files to be rendered
- **settings**: Project settings
- **codeGenerationSettings**: Code generation configuration
- **translations**: Localization strings

#### Key Methods

- **relationships()**: Defines relationships with other models
- **findOrCreate()**: Finds or creates the main project
- **setPath()/getPath()**: Sets/gets the project path
- **getApplications()**: Gets all applications (cruds and pages)
- **getTablesWithChanges()**: Gets tables with pending changes
- **getModelsNames()/getTablesNames()**: Gets model and table names
- **hasSchemaChanges()**: Checks for schema changes
- **hasSchemaTablesChanges()/hasSchemaModelsChanges()**: Checks for specific changes
- **getChangedTables()/getChangedModels()**: Gets components with changes
- **registerRenderableFile()**: Registers a file for rendering
- **hasRenderableFilesWithErrors()/hasRenderableFilesWithConflict()**: Checks render status
- **processRemovableFiles()**: Processes files marked for removal
- **undoAllTablesChanges()/undoAllModelsChanges()**: Reverts changes
- **setTranslation()/getTranslation()**: Manages translations
- **laravelVersionGreaterThan()/laravelVersionLessThan()**: Compares Laravel versions
- **isJetstream()/isBreeze()**: Checks UI starter kit
- **isBlueprintModeEnabled()/isSyncModeEnabled()**: Checks schema mode
- **organizeTablesHorizontally()/organizeTablesByRelations()**: Table layout methods

## Relationships Between Components

The components in the schema model system are highly interconnected:

1. **Project** is the root container that holds everything else.

2. **Table** belongs to a Project and has many:
   - Columns
   - Indexes
   - Models

3. **Column** belongs to a Table and has many relationships with:
   - Indexes (through IndexColumn pivot)
   - Models (through various pivot tables like FillableModelColumn)
   - Other relationships (as foreign key, owner key, etc.)

4. **Index** belongs to a Table and has many:
   - Columns (through IndexColumn pivot)
   - Can reference another Table (for foreign keys)

5. **Model** belongs to a Project and a Table, and has many:
   - Relationships (both own and related)
   - Columns (through various pivot tables)
   - CRUDs

The relationships follow Laravel-style conventions:
- `belongsTo`: One-to-one relationship where the current model belongs to another
- `hasMany`: One-to-many relationship where the current model has many of another
- `belongsToMany`: Many-to-many relationship through a pivot table
- `cascadeDelete`: When deleting a parent model, also delete related children
- `cascadeDetach`: When deleting a parent model, detach but don't delete related children

## Common Workflows

### Creating a New Table

1. Create a new Table instance
2. Set its properties
3. Call `saveFromInterface()`
4. Default columns will be created automatically

```typescript
const table = new Table({
  name: 'products',
  projectId: project.id,
  sectionId: project.getDefaultSchemaSection().id
});
table.saveFromInterface();
```

### Adding a Column to a Table

1. Create a new Column instance
2. Set its properties including tableId
3. Call `saveFromInterface()`
4. The column will be properly ordered in the table

```typescript
const column = new Column({
  name: 'price',
  type: 'decimal',
  tableId: table.id,
  nullable: false,
  total: 8,
  places: 2
});
column.saveFromInterface();
```

### Creating a Model for a Table

1. Create a new Model instance
2. Set its properties including tableId
3. Call `saveFromInterface()`
4. Model will be connected to the table

```typescript
const model = new Model({
  name: 'Product',
  projectId: project.id,
  tableId: table.id,
  namespace: 'App\\Models'
});
model.saveFromInterface(true); // true to add a default model
```

### Adding an Index

1. Create a new Index instance
2. Set its properties
3. Call `saveFromInterface()`
4. Connect columns to the index

```typescript
const index = new Index({
  name: 'products_sku_unique',
  type: IndexType.UNIQUE,
  tableId: table.id,
  columns: ['sku']
});
index.saveFromInterface();
```

### Tracking and Applying Changes

1. Make changes to a model
2. Use `hasSchemaChanges()` to check if there are changes
3. Use `dataComparisonMap()` to get a map of what changed
4. Use `applyChanges()` to apply changes from another source
5. Use `saveSchemaState()` to save the current state as the baseline

```typescript
// Check for changes
if (table.hasSchemaChanges()) {
  // Get what changed
  const changes = table.dataComparisonMap(table);
  console.log(changes);
  
  // Apply changes from an external source
  table.applyChanges(externalData);
  
  // Save current state as baseline
  table.saveSchemaState();
}
```

### Creating a Foreign Key Relationship

```typescript
// Add a foreign key to the order_items table that references products
const orderItemsTable = project.findTableByName('order_items');
const productsModel = project.findModelByName('Product');
orderItemsTable.addForeign('product_id', productsModel);
```
