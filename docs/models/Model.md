# Model Documentation

## Overview

The `Model` class extends `AbstractSchemaModel` and implements `SchemaModel`. It represents a data model in the system, similar to Laravel's Eloquent models. The class manages model-related information, relationships, properties, and behaviors needed for schema definitions and code generation.

## Class Definition

```typescript
export default class Model extends AbstractSchemaModel implements SchemaModel {
    // ...properties and methods...
}
```

## Properties

### Core Properties

| Property | Type | Description |
|----------|------|-------------|
| `id` | `string` | Unique identifier for the model |
| `name` | `string` | The singular name of the model |
| `plural` | `string` | The plural form of the model name |
| `path` | `string` | File path of the model |
| `table` | `Table` | Associated database table |
| `class` | `string` | Full class name including namespace |
| `namespace` | `string` | Namespace of the model |
| `tableId` | `string` | ID of the associated table |
| `fileName` | `string` | PHP file name of the model |
| `tableName` | `string` | Database table name |
| `projectId` | `string` | ID of the project this model belongs to |
| `createdFromInterface` | `boolean` | Whether the model was created via interface |
| `removed` | `boolean` | Whether the model is marked for removal |
| `project` | `Project` | The project this model belongs to |
| `schemaState` | `any` | Saved state of the schema |
| `pluralAndSingularAreSame` | `boolean` | Whether plural and singular names are identical |
| `ownRelationships` | `Relationship[]` | Relationships owned by this model |
| `relatedRelationships` | `Relationship[]` | Relationships where this model is the related entity |
| `hooks` | `any` | Model hooks configuration |
| `hooksWhenSchemaWasRead` | `any` | Initial state of hooks when schema was read |
| `cruds` | `Crud[]` | CRUD operations associated with this model |

### Settings Properties

| Property | Type | Description |
|----------|------|-------------|
| `callSeeder` | `boolean` | Whether to call seeder for this model |
| `seederQuantity` | `number` | Number of seed records to generate |
| `attributesComments` | `boolean` | Whether to include comments for attributes |
| `methodsComments` | `boolean` | Whether to include comments for methods |

### PHP Related Properties

| Property | Type | Description |
|----------|------|-------------|
| `parentClass` | `string` | Parent class of the model |
| `interfaces` | `string[]` | Interfaces implemented by the model |
| `traits` | `string[]` | Traits used by the model |
| `allImports` | `string[]` | All imports used in the model file |

### Laravel Related Properties

| Property | Type | Description |
|----------|------|-------------|
| `methods` | `string[]` | Methods defined in the model |
| `hasGuarded` | `boolean` | Whether model uses guarded attributes |
| `guarded` | `string[]` | Names of guarded attributes |
| `guardedColumns` | `Column[]` | Columns that are guarded |
| `hasFillable` | `boolean` | Whether model uses fillable attributes |
| `fillable` | `string[]` | Names of fillable attributes |
| `fillableColumns` | `Column[]` | Columns that are fillable |
| `hidden` | `string[]` | Names of hidden attributes |
| `hiddenColumns` | `Column[]` | Columns that are hidden |
| `dates` | `string[]` | Names of date attributes |
| `datesColumns` | `Column[]` | Columns that are treated as dates |
| `appends` | `string[]` | Names of appended attributes |
| `casts` | `any` | Attribute cast configurations |
| `castsColumns` | `Column[]` | Columns with type casts |
| `hasTimestamps` | `boolean` | Whether model uses timestamps |
| `hasSoftDeletes` | `boolean` | Whether model uses soft deletes |
| `isAuthenticatable` | `boolean` | Whether model is authenticatable |

## Relationships

The `relationships()` method defines the relationships between the model and other entities:

```typescript
relationships() {
    return {
        table: () => this.belongsTo(Table),
        project: () => this.belongsTo(Project),
        cruds: () => this.hasMany(Crud).cascadeDelete(),
        ownRelationships: () => this.hasMany(Relationship).cascadeDelete(),
        relatedRelationships: () => this.hasMany(Relationship, "relatedModelId").cascadeDelete(),
        fillableColumns: () => this.belongsToMany(Column, FillableModelColumn).cascadeDetach(),
        guardedColumns: () => this.belongsToMany(Column, GuardedModelColumn).cascadeDetach(),
        hiddenColumns: () => this.belongsToMany(Column, HiddenModelColumn).cascadeDetach(),
        datesColumns: () => this.belongsToMany(Column, DatesModelColumn).cascadeDetach(),
        castsColumns: () => this.belongsToMany(Column, CastsModelColumn).cascadeDetach(),
    }
}
```

## Static Methods

| Method | Parameters | Return Type | Description |
|--------|------------|-------------|-------------|
| `creating` | `modelData: any` | `any` | Prepares data for model creation |
| `updating` | `modelData: any` | `any` | Prepares data for model updating |
| `updated` | `model: Model` | `void` | Performs actions after a model is updated |
| `fixData` | `modelData: any` | `any` | Initializes default values for model properties |
| `getValid` | none | `Model[]` | Returns all valid models |
| `calculatePluralName` | `modelData: any` | `string` | Calculates the plural form of a model name |
| `nonTouchableProperties` | none | `string[]` | Returns properties that cannot be modified directly |

## Instance Methods

### Core Operations

| Method | Parameters | Return Type | Description |
|--------|------------|-------------|-------------|
| `saveFromInterface` | none | `Model` | Saves a model created from the interface |
| `generateDefaultImports` | none | `void` | Sets default imports for the model |
| `generateDefaultSettings` | none | `void` | Sets default settings for the model |
| `generateDefaultData` | none | `void` | Generates default data based on model type |
| `remove` | none | `void` | Marks the model for removal or deletes it |
| `applyChanges` | `data: any` | `boolean` | Applies changes to the model from data |
| `calculateInternalData` | none | `void` | Calculates internal data based on model state |

### Schema State Management

| Method | Parameters | Return Type | Description |
|--------|------------|-------------|-------------|
| `saveSchemaState` | none | `void` | Saves the current schema state |
| `fillSchemaState` | none | `void` | Fills the schema state property |
| `buildSchemaState` | none | `any` | Builds the schema state object |
| `dataComparisonMap` | `comparisonData: any` | `any` | Creates a map for data comparison |
| `fillHooksForFutureComparison` | none | `void` | Stores current hooks for future comparison |

### Change Detection

| Method | Parameters | Return Type | Description |
|--------|------------|-------------|-------------|
| `isDirty` | none | `boolean` | Checks if the model has unsaved changes |
| `hasHooksChanges` | none | `boolean` | Checks if hooks have changed |
| `hasSchemaChanges` | `comparisonData: any` | `boolean` | Checks if schema has changed compared to data |
| `hasDataChanges` | `comparisonData: any` | `boolean` | Checks if data has changed |
| `hasLocalChanges` | none | `boolean` | Checks for local changes compared to schema state |
| `logDataComparison` | none | `void` | Logs data comparison information |
| `undoAllChanges` | none | `void` | Undoes all changes to the model |
| `undoAllOwnRelationshipsChanges` | none | `void` | Undoes changes to all relationships |

### Table and Columns Operations

| Method | Parameters | Return Type | Description |
|--------|------------|-------------|-------------|
| `hasNoTable` | none | `boolean` | Checks if the model has no table |
| `hasTable` | none | `boolean` | Checks if the model has a table |
| `tableNameIsDifferentFromDefault` | none | `boolean` | Checks if table name differs from default |
| `calculateDataByName` | `updateClassAndFileName?: boolean` | `void` | Calculates model data based on name |
| `getPrimaryKeyName` | none | `string` | Gets the primary key column name |
| `getPrimaryKeyColumn` | none | `Column` | Gets the primary key column |
| `getColumnByName` | `columnName: string` | `Column` | Gets a column by name |
| `addDeletedAtColumnIfNecessary` | none | `void` | Adds deleted_at column if soft deletes are enabled |

### Columns Management

| Method | Parameters | Return Type | Description |
|--------|------------|-------------|-------------|
| `getNotFillableColumns` | none | `Column[]` | Gets columns that are not fillable |
| `getFillableColumns` | none | `Column[]` | Gets all fillable columns |
| `getFillableColumnsWithoutInputs` | none | `Column[]` | Gets fillable columns without inputs |
| `columnIsFillable` | `column: Column` | `boolean` | Checks if a column is fillable |
| `columnIsGuarded` | `column: Column` | `boolean` | Checks if a column is guarded |
| `columnIsHidden` | `column: Column` | `boolean` | Checks if a column is hidden |
| `columnIsHiddenForCrudCreation` | `column: Column` | `boolean` | Checks if column is hidden for CRUD creation |
| `saveFillableColumns` | `columnsNames: string[]` | `void` | Saves fillable columns configuration |
| `saveGuardedColumns` | `columnsNames: string[]` | `void` | Saves guarded columns configuration |
| `saveHiddenColumns` | `columnsNames: string[]` | `void` | Saves hidden columns configuration |
| `saveDatesColumns` | `columnsNames: string[]` | `void` | Saves dates columns configuration |
| `saveAppendsColumns` | `columnsNames: string[]` | `void` | Saves appends columns configuration |
| `saveCastsColumns` | `newCastData: any` | `void` | Saves casts columns configuration |
| `attachCastsColumn` | `column: Column, type: string` | `void` | Attaches a column with specific cast type |
| `saveColumnsProperty` | `columnsNames: string[], type: string, relationshipName: string` | `void` | Generic method to save column properties |

### Relationship Management

| Method | Parameters | Return Type | Description |
|--------|------------|-------------|-------------|
| `getFreeSimilarRelationship` | `relationship: Relationship` | `Relationship` | Gets a similar relationship without inverse |
| `hasHasManyRelations` | none | `boolean` | Checks if model has HasMany relations |
| `getHasManyRelations` | none | `Relationship[]` | Gets all HasMany relationships |
| `getMorphManyRelations` | none | `Relationship[]` | Gets all MorphMany relationships |
| `getBelongsToManyRelations` | none | `Relationship[]` | Gets all BelongsToMany relationships |
| `getMorphToManyRelations` | none | `Relationship[]` | Gets all MorphToMany relationships |
| `getBelongsToRelations` | none | `Relationship[]` | Gets all BelongsTo relationships |
| `getRelationshipsNames` | none | `string[]` | Gets names of all relationships |
| `getAllRelationshipsKeyedByName` | none | `{ [key: string]: Relationship }` | Gets relationships keyed by name |
| `getRemovedRelationships` | none | `Relationship[]` | Gets relationships marked for removal |
| `getRenamedRelationships` | none | `Relationship[]` | Gets renamed relationships |
| `isObligatoryParentOfAnotherEntity` | `model: Model` | `boolean` | Checks if model is required parent of another model |
| `getSelfRelationshipsForeignsNames` | none | `string[]` | Gets foreign key names of self-relationships |
| `getSelfRelationshipsForeigns` | none | `Column[]` | Gets foreign key columns of self-relationships |
| `getSelfRelationships` | none | `Relationship[]` | Gets relationships where this model relates to itself |
| `getValidRelationships` | none | `Relationship[]` | Gets all valid relationships |
| `getPossibleInverseRelationships` | `relationship: Relationship` | `Relationship[]` | Gets possible inverse relationships |
| `getValidOwnRelationships` | none | `Relationship[]` | Gets valid relationships owned by this model |
| `findRelationship` | `type: string, relatedModelName: string` | `Relationship` | Finds a relationship by type and related model |
| `getFirstBelongsToRelation` | none | `Relationship` | Gets the first BelongsTo relationship |
| `getFirstCrud` | none | `Crud` | Gets the first CRUD operation |
| `getCommonMorphInverseRelationships` | none | `Relationship[]` | Gets common morph inverse relationships |
| `getCommonMorphRelatedRelationships` | none | `Relationship[]` | Gets common morph related relationships |
| `getMorphedToManyRelatedRelationships` | none | `Relationship[]` | Gets MorphToMany related relationships |

### Hooks Management

| Method | Parameters | Return Type | Description |
|--------|------------|-------------|-------------|
| `methodNotPresentInSomeHook` | `method: any` | `boolean` | Checks if a method is not present in any hook |
| `methodPresentInSomeHook` | `method: any` | `boolean` | Checks if a method is present in any hook |
| `contentNotPresentInSomeHook` | `content: string` | `boolean` | Checks if content is not present in any hook |
| `contentPresentInSomeHook` | `content: string` | `boolean` | Checks if content is present in any hook |
| `getAllHooksContent` | none | `string` | Gets all hooks content as a string |
| `getHooks` | `type: string` | `any` | Gets hooks by type |
| `getHooksWhenSchemaWasRead` | `type: string` | `any` | Gets hooks when schema was read by type |
| `getHookByName` | `type: string, name: string` | `any` | Gets a specific hook by type and name |
| `getHookWhenSchemaWasReadByName` | `type: string, name: string` | `any` | Gets a specific hook when schema was read |
| `saveHooks` | `type: string, hooks: any` | `void` | Saves hooks for a specific type |

### Model State Checking

| Method | Parameters | Return Type | Description |
|--------|------------|-------------|-------------|
| `isInvalid` | none | `boolean` | Checks if the model is invalid |
| `isValid` | none | `boolean` | Checks if the model is valid |
| `wasCreatedFromInterface` | none | `boolean` | Checks if model was created from interface |
| `isRemoved` | none | `boolean` | Checks if model is marked for removal |
| `isAuthModel` | none | `boolean` | Checks if model is the authentication model |
| `hasTimestampsColumns` | none | `boolean` | Checks if model has timestamps columns |

### PHP Related Methods

| Method | Parameters | Return Type | Description |
|--------|------------|-------------|-------------|
| `getClassString` | none | `string` | Gets the full class string |
| `hasParentClass` | none | `boolean` | Checks if model has a parent class |
| `getParentClass` | none | `string` | Gets the parent class name |
| `hasInterfaces` | none | `boolean` | Checks if model implements interfaces |
| `getInterfaces` | none | `string[]` | Gets interfaces implemented by the model |
| `hasTraits` | none | `boolean` | Checks if model uses traits |
| `getTraits` | none | `string[]` | Gets traits used by the model |
| `hasOtherImports` | none | `boolean` | Checks if model has other imports |
| `getOtherImports` | none | `string[]` | Gets other imports not related to traits/interfaces |
| `hasMethods` | none | `boolean` | Checks if model has methods |
| `getMethods` | none | `string[]` | Gets methods defined in the model |
| `getImportAlias` | `importName: string` | `string` | Gets the alias for an import |
| `getSeederQuantity` | none | `number` | Gets the seeder quantity |
| `getControllerName` | none | `string` | Gets the controller name for this model |

## Usage Examples

### Creating a Model

```typescript
const userModel = new Model({
  name: 'User',
  projectId: project.id,
  namespace: 'App\\Models',
  hasTimestamps: true,
  hasSoftDeletes: true,
  isAuthenticatable: true
});

userModel.saveFromInterface();
```

### Setting Up Fillable Attributes

```typescript
// Assuming columns is an array of Column objects
const fillableColumnNames = columns
  .filter(column => !column.isPrimaryKey() && column.name !== 'created_at' && column.name !== 'updated_at')
  .map(column => column.name);

userModel.saveFillableColumns(fillableColumnNames);
```

### Adding Relationships

```typescript
// Create a hasMany relationship from User to Post
const postRelationship = new Relationship({
  name: 'posts',
  type: 'HasMany',
  modelId: userModel.id,
  relatedModelId: postModel.id
});

postRelationship.save();
userModel.ownRelationships.push(postRelationship);
```

### Checking Model State

```typescript
if (userModel.isDirty()) {
  console.log('The model has unsaved changes');
}

if (userModel.isValid()) {
  console.log('The model is valid and can be used');
}
```

### Working with Hooks

```typescript
// Get and modify hooks
const modelHooks = userModel.getHooks('model');
modelHooks.creating = 'public static function creating($model) { $model->created_by = auth()->id(); }';
userModel.saveHooks('model', modelHooks);
```
```

## Notes

- The Model class is the core representation of database entities in the system
- It manages Laravel-like features such as fillable/guarded attributes, relationships, and casts
- Schema state management helps track changes between the model and its representation in code
- Relationship management methods help establish and maintain connections between models