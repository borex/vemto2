# Column Class Documentation

## Overview

The `Column` class represents a database table column in the schema. It extends `AbstractSchemaModel` and implements `SchemaModel` interface. This class is responsible for managing the properties, relationships, and behaviors of a database column.

## Properties

| Property | Type | Description |
|----------|------|-------------|
| `id` | string | Unique identifier for the column |
| `name` | string | Name of the column in the database |
| `type` | string | Data type of the column (e.g., 'string', 'integer', 'boolean') |
| `table` | Table | Reference to the parent table this column belongs to |
| `order` | number | Order/position of the column in the table |
| `index` | boolean | Whether this column is indexed |
| `length` | number | Length/size limitation for the column data |
| `unique` | boolean | Whether this column has a unique constraint |
| `tableId` | string | ID of the parent table |
| `removed` | boolean | Whether this column has been marked for removal |
| `schemaState` | any | Stores the original state of the column for tracking changes |
| `nullable` | boolean | Whether this column allows NULL values |
| `unsigned` | boolean | Whether this column is unsigned (for numeric types) |
| `default` | string | Default value for the column |
| `defaultIsRaw` | boolean | Whether the default value should be treated as raw SQL |
| `total` | number | Total digits for numeric types |
| `places` | number | Decimal places for floating-point types |
| `autoIncrement` | boolean | Whether this column auto-increments |
| `faker` | string | Faker expression for generating test data |
| `options` | string[] | Array of options (for enum/set types) |
| `inputs` | Input[] | Input fields associated with this column |
| `referencedIndexes` | Index[] | Indexes that reference this column |
| `columnIndexes` | Index[] | Indexes that include this column |

### Relationship Properties

| Property | Type | Description |
|----------|------|-------------|
| `relationshipsByForeignKey` | Relationship[] | Relationships where this column is a foreign key |
| `relationshipsByOwnerKey` | Relationship[] | Relationships where this column is an owner key |
| `relationshipsByParentKey` | Relationship[] | Relationships where this column is a parent key |
| `relationshipsByForeignPivotKey` | Relationship[] | Relationships where this column is a foreign pivot key |
| `relationshipsByRelatedPivotKey` | Relationship[] | Relationships where this column is a related pivot key |
| `relationshipsByMorphIdColumn` | Relationship[] | Relationships where this column is a morph ID column |
| `relationshipsByMorphTypeColumn` | Relationship[] | Relationships where this column is a morph type column |

## Constructor

```typescript
constructor(data: any = {})
```

Creates a new Column instance with the provided data. If no data is provided, it uses the default column data from `ColumnData.getDefault()`.

## Relationships

The `relationships()` method defines the relationships between this column and other model types:

```typescript
relationships() {
    return {
        table: () => this.belongsTo(Table),
        inputs: () => this.hasMany(Input).cascadeDelete(),
        referencedIndexes: () => this.hasMany(Index, 'referencesColumnId').cascadeDelete(),
        columnIndexes: () => this.belongsToMany(Index, IndexColumn).cascadeDetach(),

        // Relationships with Relationship class
        relationshipsByForeignKey: () => this.hasMany(Relationship, 'foreignKeyId').cascadeDelete(),
        relationshipsByOwnerKey: () => this.hasMany(Relationship, 'ownerKeyId').cascadeDelete(),
        relationshipsByParentKey: () => this.hasMany(Relationship, 'parentKeyId').cascadeDelete(),
        relationshipsByForeignPivotKey: () => this.hasMany(Relationship, 'foreignPivotKeyId').cascadeDelete(),
        relationshipsByRelatedPivotKey: () => this.hasMany(Relationship, 'relatedPivotKeyId').cascadeDelete(),
        relationshipsByMorphIdColumn: () => this.hasMany(Relationship, 'idColumnId').cascadeDelete(),
        relationshipsByMorphTypeColumn: () => this.hasMany(Relationship, 'typeColumnId').cascadeDelete(),
    }
}
```

## Lifecycle Methods

### Static Methods

| Method | Description |
|--------|-------------|
| `created(column: Column)` | Called when a column is created. Sets default faker value and updates the order. |
| `deleting(column: Column)` | Called before a column is deleted. Removes related indexes. |
| `nonTouchableProperties()` | Returns properties that cannot be modified by the application without enabling the `isSavingInternally` flag. |

## Order Management Methods

| Method | Description |
|--------|-------------|
| `reorder(): void` | Fixes the order of all columns in the table and positions this column appropriately. |
| `incrementOrder(): void` | Increments the order value of the column. |
| `sendToBottom()` | Moves the column to the end of the table. |

## State Management Methods

| Method | Description |
|--------|-------------|
| `saveFromInterface()` | Saves the column when updated from the interface. Returns the column instance. |
| `remove()` | Marks the column as removed or deletes it if it's new. |
| `isDirty(): boolean` | Checks if the column has local changes, is removed, or is new. |
| `hasLocalChanges(): boolean` | Checks if the column has local changes compared to its schema state. |
| `hasSchemaChanges(schemaData: any): boolean` | Checks if there are changes between the current state and the provided schema data. |
| `hasDataChanges(comparisonData: any): boolean` | Checks if there are changes in the provided comparison data. |
| `applyChanges(data: any): boolean` | Applies changes from the provided data and returns whether changes were applied. |
| `saveSchemaState()` | Saves the current state as schema state. |
| `fillSchemaState()` | Fills the schema state with the current column state. |
| `buildSchemaState()` | Builds and returns the schema state object based on the current column state. |
| `dataComparisonMap(comparisonData: any): any` | Creates a map showing which properties are different between the schema state and the provided data. |
| `logDataComparison()` | Logs the column data comparison for debugging. |
| `old(): Column` | Returns a column instance based on the schema state (original values). |

## Type and Property Methods

| Method | Description |
|--------|-------------|
| `isDefaultLaravelPrimaryKey(): boolean` | Checks if the column is a default Laravel primary key (id, bigInteger, unsigned, auto-increment). |
| `isPrimaryKey(): boolean` | Checks if the column is a primary key (auto-increment or part of a primary index). |
| `isNotPrimaryKey(): boolean` | Checks if the column is not a primary key. |
| `isAutoIncrement(): boolean` | Checks if the column is auto-increment. |
| `isNotAutoIncrement(): boolean` | Checks if the column is not auto-increment. |
| `isForeignKey(): boolean` | Alias for `isForeign()`. |
| `isForeign(): boolean` | Checks if the column is a foreign key (part of a foreign index). |
| `isUniqueFromIndex(): boolean` | Checks if the column is part of a unique index. |
| `isUnique(): boolean` | Checks if the column is unique (implicitly or from an index). |
| `isImplicitlyUnique(): boolean` | Checks if the column is explicitly marked as unique. |
| `implicitUniqueWasRemoved(): boolean` | Checks if the column's unique property was removed in the current state. |
| `isSpecialPrimaryKey(): boolean` | Checks if the column is a special primary key type (uuid). |
| `isDefaultLaravelTimestamp(): boolean` | Checks if the column is a default Laravel timestamp (created_at or updated_at). |
| `isTextual(): boolean` | Checks if the column is a textual type. |
| `isDefaultDate(): boolean` | Checks if the column is a default date column (created_at, updated_at, deleted_at). |
| `isCreatedAt(): boolean` | Checks if the column is 'created_at'. |
| `isDeletedAt(): boolean` | Checks if the column is 'deleted_at'. |
| `isUpdatedAt(): boolean` | Checks if the column is 'updated_at'. |
| `hasFaker(): boolean` | Checks if the column has a faker expression. |
| `hasImplicitIndex(): boolean` | Checks if the column has an implicit index. |
| `changedOnlyImplicitUnique(): boolean` | Checks if only the 'unique' property has changed. |
| `isFloatingPointNumber(): boolean` | Checks if the column is a floating-point number type. |
| `isInvalid(): boolean` | Checks if the column is invalid. |
| `isValid(): boolean` | Checks if the column is valid (has name and type). |
| `isNotForeignIndex(): boolean` | Checks if the column has an index but is not a foreign key. |
| `mustHaveOptions(): boolean` | Checks if the column must have options (enum or set). |
| `isEnum(): boolean` | Checks if the column is an enum type. |
| `isJson(): boolean` | Checks if the column is a JSON type. |
| `isSet(): boolean` | Checks if the column is a set type. |
| `isUnsigned(): boolean` | Checks if the column is unsigned. |
| `hasDuplicatedName(): boolean` | Checks if there's another column in the table with the same name. |
| `hasInputs(): boolean` | Checks if the column has associated inputs. |

## Relationship Query Methods

| Method | Description |
|--------|-------------|
| `hasBelongsToRelationsWithModel(model: Model): boolean` | Checks if the column has belongs-to relationships with the specified model. |
| `getFirstBelongsToRelationWithModel(model: Model): Relationship` | Gets the first belongs-to relationship with the specified model. |
| `getBelongsToRelationsWithModel(model: Model): Relationship[]` | Gets all belongs-to relationships with the specified model. |
| `hasBelongsToRelations(): boolean` | Checks if the column has any belongs-to relationships. |
| `getFirstBelongsToRelation(): Relationship` | Gets the first belongs-to relationship. |
| `getBelongsToRelations(): Relationship[]` | Gets all belongs-to relationships. |
| `referencesModel(model: Model): boolean` | Checks if the column references the specified model. |

## Column Position and References

| Method | Description |
|--------|-------------|
| `getAfter(): string` | Gets the name of the previous column for 'after' clauses in migrations. |
| `hasPreviousColumn(): boolean` | Checks if the column has a previous column in order. |
| `getPreviousColumn(): Column` | Gets the previous column in order. |

## Default and Faker Methods

| Method | Description |
|--------|-------------|
| `getDefaultFaker(): string` | Gets the default faker expression for the column. |
| `getDefaultInputType(): string` | Gets the default input type for the column. |
| `getInputTypeByColumnType(): string` | Gets the input type based on the column type. |
| `cannotGenerateDefaultInputByOptions(): boolean` | Checks if the column cannot generate default input by options. |
| `canGenerateDefaultInputByOptions(): boolean` | Checks if the column can generate default input by options. |
| `generateDefaultOptions(): void` | Generates default options for enum/set columns. |
| `getDefaultForTemplate(): string` | Gets the default value formatted for templates. |
| `getDefaultOptions(): string[]` | Gets the default options for the column. |
| `getDefaultSettingsByName(name?: string): ColumnDefaultData` | Gets default settings by column name. |
| `getFakerByType(): string` | Gets the faker expression based on column type. |
| `getDefaultUniqueFaker()` | Gets the default unique faker expression. |
| `getType(): any` | Gets the column type object from the type list. |
| `setDefaultSettingsByName()` | Sets default settings based on the column name. |
| `getFakerForTemplate()` | Gets the faker expression formatted for templates. |
| `getForeignType(): string` | Gets the foreign type for the column. |
| `isHiddenForCrudCreation(): boolean` | Checks if the column should be hidden for CRUD creation. |

## Usage Examples

### Creating a New Column

```typescript
// Create a new column for a users table
const userTable = Table.find('users-table-id');
const column = new Column({
    name: 'email',
    type: 'string',
    length: 255,
    nullable: false,
    unique: true
});
column.tableId = userTable.id;
column.save();
```

### Creating a Foreign Key Column

```typescript
// Create a foreign key column referencing users table
const postsTable = Table.find('posts-table-id');
const column = new Column({
    name: 'user_id',
    type: 'bigInteger',
    unsigned: true,
    nullable: false
});
column.tableId = postsTable.id;
column.save();

// Create a relationship
const relationship = new Relationship({
    type: 'BelongsTo',
    foreignKeyId: column.id,
    relatedModelId: User.id // Assuming User is a Model instance
});
relationship.save();
```

### Checking Column Types and Properties

```typescript
// Determine if a column is a primary key
const isPrimary = column.isPrimaryKey();

// Check if column is a timestamp
if (column.isDefaultDate()) {
    // Handle timestamp column
}

// Get appropriate faker for the column
const fakerExpression = column.getFakerForTemplate();
```

### Managing Schema Changes

```typescript
// Modify a column and track changes
column.length = 100;
column.nullable = true;
column.saveSchemaState(); // Save current state for comparison

// Later, check if the column has changes
if (column.hasLocalChanges()) {
    console.log('Column has unsaved changes');
}

// Apply changes from a form
const formData = {
    name: 'new_email',
    type: 'string',
    length: 150,
    nullable: false
};

if (column.applyChanges(formData)) {
    console.log('Changes applied successfully');
}
```
