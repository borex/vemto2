# Table Class Documentation

## Overview

The `Table` class represents a database table within the application's schema modeling system. It extends `AbstractSchemaModel` and implements the `SchemaModel` interface. This class provides comprehensive functionality for managing database tables, including columns, indexes, relationships, and migrations.

## Class Definition

```typescript
export default class Table extends AbstractSchemaModel implements SchemaModel
```

## Properties

| Property | Type | Description |
|----------|------|-------------|
| `id` | `string` | Unique identifier for the table |
| `name` | `string` | The table name |
| `oldNames` | `string[]` | History of previous table names (for tracking renames) |
| `indexes` | `Index[]` | Collection of indexes defined on this table |
| `models` | `Model[]` | Models associated with this table |
| `project` | `Project` | The project this table belongs to |
| `removed` | `boolean` | Whether the table has been marked for removal |
| `projectId` | `string` | ID of the project this table belongs to |
| `columns` | `Column[]` | Collection of columns defined on this table |
| `migrations` | `TableMigration[]` | Migration history related to this table |
| `positionX` | `number` | X coordinate for visual positioning in the schema designer |
| `positionY` | `number` | Y coordinate for visual positioning in the schema designer |
| `labelColumn` | `Column` | The column used for displaying records |
| `labelColumnId` | `string` | ID of the label column |
| `section` | `SchemaSection` | Schema section this table belongs to |
| `sectionId` | `string` | ID of the schema section |
| `createdFromInterface` | `boolean` | Whether the table was created via the UI |
| `pivotRelationships` | `Relationship[]` | Pivot table relationships |

## TableMigration Interface

```typescript
interface TableMigration {
    createdTables: string[]
    changedTables: string[]
    datePrefix: string
    fullPrefix: string
    migration: string // the full migration path
    migrationName: string
    relativePath: string // the path relative to the project root
}
```

## Relationships

The `Table` class defines relationships similar to Laravel's Eloquent relationships:

```typescript
relationships() {
    return {
        project: () => this.belongsTo(Project),
        models: () => this.hasMany(Model).cascadeDelete(),
        indexes: () => this.hasMany(Index).cascadeDelete(),
        labelColumn: () => this.belongsTo(Column, "labelColumnId"),
        columns: () => this.hasMany(Column).cascadeDelete().orderBy('order'),
        pivotRelationships: () => this.hasMany(Relationship, 'pivotId').cascadeDelete(),
        section: () => this.belongsTo(SchemaSection, "sectionId"),
    }
}
```

## Static Methods

### Creating and Updating

| Method | Parameters | Return Type | Description |
|--------|------------|-------------|-------------|
| `creating` | `data: any` | `any` | Prepares data for table creation, adding section ID if necessary |
| `created` | `table: Table` | `void` | Called after table creation, centers the table position |
| `updating` | `data: any` | `any` | Prepares data for table updating, adding section ID if necessary |
| `addSectionToTableDataIfNecessary` | `data: any` | `any` | Adds default section ID to table data if not specified |
| `nonTouchableProperties` | - | `string[]` | Returns an array of properties that cannot be modified externally |

## Instance Methods

### Core Operations

| Method | Parameters | Return Type | Description |
|--------|------------|-------------|-------------|
| `isValid` | - | `boolean` | Checks if the table has a valid name |
| `saveFromInterface` | `addModel: boolean = false` | `Table` | Saves table from UI, creating default columns and model if specified |
| `remove` | - | `void` | Marks the table for removal or deletes if new |
| `undoRemove` | - | `void` | Undoes a removal mark |
| `applyChanges` | `data: any` | `boolean` | Applies schema changes to the table |
| `saveSchemaState` | - | `void` | Saves the current schema state |
| `fillSchemaState` | - | `void` | Fills the schema state with current data |
| `buildSchemaState` | - | `object` | Builds the schema state object |
| `dataComparisonMap` | `comparisonData: any` | `object` | Creates a comparison map between schema states |

### Change Detection

| Method | Parameters | Return Type | Description |
|--------|------------|-------------|-------------|
| `hasSchemaChanges` | `comparisonData: any` | `boolean` | Determines if the table has schema changes compared to provided data |
| `hasDataChanges` | `data: any` | `boolean` | Determines if the table has data changes compared to provided data |
| `isDirty` | - | `boolean` | Checks if the table or its resources have unsaved changes |
| `hasDirtyResources` | - | `boolean` | Checks if columns or indexes have unsaved changes |
| `hasDirtyColumns` | - | `boolean` | Checks if any columns have unsaved changes |
| `hasDirtyIndexes` | - | `boolean` | Checks if any indexes have unsaved changes |
| `hasLocalChanges` | - | `boolean` | Checks if the table has local schema changes |
| `logDataComparison` | - | `void` | Logs the data comparison for debugging |

### Column Management

| Method | Parameters | Return Type | Description |
|--------|------------|-------------|-------------|
| `hasColumn` | `columnName: string` | `boolean` | Checks if a column with the specified name exists |
| `hasColumnExceptId` | `columnName: string, columnId: string` | `boolean` | Checks if a column with the name exists except the one with the provided ID |
| `doesNotHaveColumn` | `columnName: string` | `boolean` | Checks if a column with the specified name does not exist |
| `findColumnByName` | `columnName: string` | `Column` | Finds a column by name |
| `findColumnById` | `id: string` | `Column` | Finds a column by ID |
| `getColumnByName` | `columnName: string` | `Column` | Gets a column by name (from all columns, including removed) |
| `getColumns` | - | `Column[]` | Gets all non-removed columns |
| `getValidColumns` | - | `Column[]` | Gets all valid columns (non-removed with type and name) |
| `getOrderedColumns` | - | `Column[]` | Gets all non-removed columns ordered by their order property |
| `getAllOrderedColumns` | - | `Column[]` | Gets all columns (including removed) ordered by their order property |
| `getColumnsNames` | - | `string[]` | Gets all column names |
| `getColumnsOrders` | - | `any[]` | Gets all column names and orders |
| `fixAllColumnsOrder` | - | `void` | Fixes the order of all columns |
| `getAllColumnsKeyedByName` | - | `{ [key: string]: Column }` | Gets all columns keyed by name |
| `getAllRemovedColumnsKeyedByName` | - | `{ [key: string]: Column }` | Gets all removed columns keyed by name |

### Special Column Access

| Method | Parameters | Return Type | Description |
|--------|------------|-------------|-------------|
| `hasPrimaryKey` | - | `boolean` | Checks if the table has a primary key column |
| `getPrimaryKeyColumn` | - | `Column` | Gets the primary key column |
| `getPrimaryKeyName` | - | `string` | Gets the primary key column name |
| `getCreatedAtColumn` | - | `Column` | Gets the created_at column |
| `getUpdatedAtColumn` | - | `Column` | Gets the updated_at column |
| `getLabelColumn` | - | `Column` | Gets the label column for displaying records |
| `getLabelColumnName` | - | `string` | Gets the label column name |
| `getFirstColumn` | - | `Column` | Gets the first column by order |
| `getLastColumn` | - | `Column` | Gets the last column by order |
| `getFirstDefaultDateColumn` | - | `Column` | Gets the first default date column |
| `getLastDefaultDateColumn` | - | `Column` | Gets the last default date column |

### Column State Analysis

| Method | Parameters | Return Type | Description |
|--------|------------|-------------|-------------|
| `getRenamedColumns` | - | `Column[]` | Gets columns that have been renamed |
| `getRemovedColumns` | - | `Column[]` | Gets columns that have been marked for removal |
| `getNewColumns` | - | `Column[]` | Gets newly created columns |
| `getChangedColumns` | - | `Column[]` | Gets columns with local changes |
| `getNotRenamedChangedColumns` | - | `Column[]` | Gets changed columns that were not renamed |
| `getColumnsWithRemovedUnique` | - | `Column[]` | Gets columns with removed unique constraint |
| `hasUniqueColumns` | - | `boolean` | Checks if the table has unique columns |
| `getUniqueColumns` | - | `Column[]` | Gets all unique columns |

### Index Management

| Method | Parameters | Return Type | Description |
|--------|------------|-------------|-------------|
| `hasIndex` | `indexName: string` | `boolean` | Checks if an index with the specified name exists |
| `doesNotHaveIndex` | `indexName: string` | `boolean` | Checks if an index with the specified name does not exist |
| `findIndexByName` | `indexName: string` | `Index` | Finds an index by name |
| `getIndexes` | - | `Index[]` | Gets all non-removed indexes |
| `getIndexesNames` | - | `string[]` | Gets all index names |
| `getAllIndexesKeyedByName` | - | `{ [key: string]: Index }` | Gets all indexes keyed by name |
| `getForeignIndexes` | - | `Index[]` | Gets all foreign key indexes |
| `getUniqueIndexes` | - | `Index[]` | Gets all unique indexes |
| `hasPrimaryIndexForColumn` | `column: Column` | `boolean` | Checks if a primary index exists for the column |

### Index State Analysis

| Method | Parameters | Return Type | Description |
|--------|------------|-------------|-------------|
| `getRenamedIndexes` | - | `Index[]` | Gets indexes that have been renamed |
| `getRemovedIndexes` | - | `Index[]` | Gets indexes that have been marked for removal |
| `getNewIndexes` | - | `Index[]` | Gets newly created indexes |
| `getChangedIndexes` | - | `Index[]` | Gets indexes with local changes |
| `getNotRenamedChangedIndexes` | - | `Index[]` | Gets changed indexes that were not renamed |

### Model and Relationship Management

| Method | Parameters | Return Type | Description |
|--------|------------|-------------|-------------|
| `getModels` | - | `Model[]` | Gets non-removed models associated with this table |
| `getRelationships` | - | `Relationship[]` | Gets all valid relationships from all models |

### Foreign Key Operations

| Method | Parameters | Return Type | Description |
|--------|------------|-------------|-------------|
| `addForeign` | `name: string, relatedModel: Model` | `Index` | Adds a foreign key to the related model |
| `getOrCreateForeignColumn` | `name: string, relatedModel: Model` | `Column` | Gets or creates a foreign key column |

### Table Relationship Analysis

| Method | Parameters | Return Type | Description |
|--------|------------|-------------|-------------|
| `cannotBeChildrenOf` | `table: Table` | `boolean` | Checks if this table cannot be a child of the specified table |
| `canBeChildrenOf` | `table: Table` | `boolean` | Checks if this table can be a child of the specified table |
| `isParentOf` | `table: Table` | `boolean` | Checks if this table is a parent of the specified table |
| `isChildrenOf` | `table: Table` | `boolean` | Checks if this table is a child of the specified table |
| `hasChildrenTables` | - | `boolean` | Checks if this table has children tables |
| `getChildrenTables` | - | `Table[]` | Gets all children tables |
| `hasParentTables` | - | `boolean` | Checks if this table has parent tables |
| `getParentTables` | - | `Table[]` | Gets all parent tables |
| `hasRelatedTables` | - | `boolean` | Checks if this table has related tables |
| `getRelatedTables` | - | `Table[]` | Gets all related tables |
| `getRelatedTablesRelations` | - | `any[]` | Gets all related tables with relationship type |
| `getRelatedTablesRelationsOnSection` | `section: SchemaSection` | `any[]` | Gets related tables in a specific section |
| `hasNewRelatedTables` | - | `boolean` | Checks if related tables have new tables |
| `hasDirtyRelatedTables` | - | `boolean` | Checks if related tables have unsaved changes |

### Migration Management

| Method | Parameters | Return Type | Description |
|--------|------------|-------------|-------------|
| `hasMigrations` | - | `boolean` | Checks if the table has migrations |
| `getLatestMigration` | - | `any` | Gets the latest migration |
| `getLatestUpdaterMigration` | - | `any` | Gets the latest migration that updated but didn't create the table |
| `needsCreationMigration` | - | `boolean` | Determines if the table needs a creation migration |
| `hasCreationMigration` | - | `boolean` | Checks if the table has a creation migration |
| `getCreationMigration` | - | `any` | Gets the creation migration |
| `registerCreationMigration` | `name: string` | `void` | Registers a new creation migration |
| `latestMigrationCreatedTable` | - | `boolean` | Checks if the latest migration created the table |
| `probablyNeedsToUpdateLatestMigration` | - | `boolean` | Checks if the latest migration likely needs updating |
| `canUpdateLatestMigration` | - | `boolean` | Determines if the latest migration can be updated |
| `canCreateNewMigration` | - | `boolean` | Determines if a new migration can be created |

### Special Features and State Management

| Method | Parameters | Return Type | Description |
|--------|------------|-------------|-------------|
| `getFirstTableName` | - | `string` | Gets the first (original) table name |
| `hasTimestamps` | - | `boolean` | Checks if the table has timestamp columns |
| `hasSoftDeletes` | - | `boolean` | Checks if the table has soft delete functionality |
| `wasCreatedFromInterface` | - | `boolean` | Checks if the table was created from the interface |
| `undoAllChanges` | - | `void` | Undoes all changes to the table, columns, and indexes |
| `undoAllColumnsChanges` | - | `void` | Undoes all column changes |
| `undoAllIndexesChanges` | - | `void` | Undoes all index changes |

### Section and Position Management

| Method | Parameters | Return Type | Description |
|--------|------------|-------------|-------------|
| `belongsToASection` | - | `boolean` | Checks if the table belongs to a section |
| `moveToSection` | `section: SchemaSection` | `void` | Moves the table to a different section |
| `centerPosition` | - | `void` | Centers the table position |

### Special Table Types

| Method | Parameters | Return Type | Description |
|--------|------------|-------------|-------------|
| `isNovaTable` | - | `boolean` | Checks if the table is a Laravel Nova table |
| `isLaravelDefaultTable` | - | `boolean` | Checks if the table is a Laravel default table |
| `isJetstreamDefaultTable` | - | `boolean` | Checks if the table is a Laravel Jetstream table |

## Usage Examples

### Creating a New Table

```typescript
// Create a new table
const table = new Table({
  name: 'users',
  projectId: 'project-id'
});

// Save the table and create default columns
table.saveFromInterface(true);
```

### Adding Columns and Indexes

```typescript
// Add a new column
const column = new Column({
  tableId: table.id,
  name: 'email',
  type: 'string',
  unique: true
});
column.save();

// Add a unique index for the email column
const index = new Index({
  tableId: table.id,
  name: 'users_email_unique',
  columns: ['email'],
  type: 'unique'
});
index.save();
```

### Adding Foreign Key Relationships

```typescript
// Add a foreign key to the posts table's user_id column
const postsTable = getTableByName('posts');
const usersModel = getUsersModel();

// This will create a user_id column in the posts table
// and set up the foreign key constraint
const foreign = postsTable.addForeign('user_id', usersModel);
```

### Working with Migrations

```typescript
// Check if the table needs a migration
if (table.needsCreationMigration()) {
  // Register a creation migration
  table.registerCreationMigration('create_users_table');
}

// Get the latest migration
const latestMigration = table.getLatestMigration();
console.log(`Latest migration: ${latestMigration.migrationName}`);
```

### Finding Columns and Indexes

```typescript
// Find a column by name
const nameColumn = table.findColumnByName('name');
if (nameColumn) {
  console.log(`Found column: ${nameColumn.name}`);
}

// Find an index by name
const emailIndex = table.findIndexByName('users_email_unique');
if (emailIndex) {
  console.log(`Found index: ${emailIndex.name}`);
}
```

### Analyzing Table State

```typescript
// Check if the table has unsaved changes
if (table.isDirty()) {
  console.log('Table has unsaved changes');
}

// Check if columns have been changed
const changedColumns = table.getChangedColumns();
console.log(`${changedColumns.length} columns have been changed`);

// Check if columns have been removed
const removedColumns = table.getRemovedColumns();
console.log(`${removedColumns.length} columns have been removed`);
```

### Managing Table Relationships

```typescript
// Get all related tables
const relatedTables = table.getRelatedTables();
console.log(`Table has ${relatedTables.length} related tables`);

// Check if the table is a child of another table
const parentTable = getTableByName('roles');
if (table.isChildrenOf(parentTable)) {
  console.log('This table is a child of the roles table');
}

// Get all relationships
const relationships = table.getRelationships();
console.log(`Table has ${relationships.length} relationships`);
```
