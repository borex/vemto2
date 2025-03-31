# Index Model

The `Index` model represents database indexes within a schema. It extends the `AbstractSchemaModel` class and implements the `SchemaModel` interface, providing functionality for managing different types of database indexes.

## Index Types

The model supports various index types through the `IndexType` enum:

```typescript
enum IndexType {
    PRIMARY = "primary",     // Primary key index
    FOREIGN = "foreign",     // Foreign key reference
    UNIQUE = "unique",       // Unique constraint index
    INDEX = "index",         // Regular index
    FULLTEXT = "fullText",   // Full-text search index
    FULLTEXT_CHAIN = "fulltext", // Full-text search chain
    SPATIAL = "spatialIndex" // Spatial index
}
```

## Properties

| Property | Type | Description |
|----------|------|-------------|
| `id` | string | Unique identifier for the index |
| `on` | string | The name of the table this index references (for foreign keys) |
| `onTableId` | string | ID of the referenced table |
| `onTable` | Table | Reference to the table this index points to |
| `name` | string | The name of the index |
| `type` | IndexType | The type of index |
| `table` | Table | The table that owns this index |
| `tableId` | string | ID of the table that owns this index |
| `language` | string | Language setting for fulltext indexes |
| `schemaState` | any | Stores the state of the index for detecting changes |
| `removed` | boolean | Flag indicating if the index has been marked for removal |
| `algorithm` | string | Algorithm used for the index |
| `columns` | string[] | Array of column names included in the index |
| `indexColumns` | Column[] | References to the Column objects in the index |
| `references` | string | For foreign keys, the name of the referenced column |
| `referencesColumnId` | string | ID of the referenced column |
| `referencesColumn` | Column | Reference to the Column object being referenced |
| `onUpdate` | string | Foreign key update action |
| `onDelete` | string | Foreign key delete action |

## Relationships

The `Index` model establishes the following relationships:

```typescript
relationships() {
    return {
        table: () => this.belongsTo(Table),
        onTable: () => this.belongsTo(Table, 'onTableId'),
        referencesColumn: () => this.belongsTo(Column, 'referencesColumnId'),
        indexColumns: () => this.belongsToMany(Column, IndexColumn).cascadeDetach()
    }
}
```

- **table**: Belongs to relationship with the table that owns this index
- **onTable**: Belongs to relationship with the table this index references (for foreign keys)
- **referencesColumn**: Belongs to relationship with the column this index references (for foreign keys)
- **indexColumns**: Many-to-many relationship with columns included in this index

## Methods

### Lifecycle Methods

- **static creating(data)**: Hook called before creation to check for circular relationships
- **static updating(data)**: Hook called before updating to ensure reference integrity
- **saveFromInterface()**: Saves the index from the UI interface
- **remove()**: Marks the index as removed or deletes if it's new
- **static nonTouchableProperties()**: Returns properties that cannot be modified directly

### Type Checking Methods

- **isPrimary()**: Checks if this is a primary key index
- **isForeign()**: Checks if this is a foreign key index
- **isNotForeign()**: Checks if this is not a foreign key index
- **isUnique()**: Checks if this is a unique index
- **isCommon()**: Checks if this is a common (regular) index
- **isFullText()**: Checks if this is a full-text search index
- **isFullTextChain()**: Checks if this is a full-text search chain
- **isSpatial()**: Checks if this is a spatial index

### Column Management Methods

- **hasValidColumns()**: Checks if the index has valid columns
- **isSingleColumn()**: Checks if the index has only one column
- **isMultipleColumns()**: Checks if the index has multiple columns
- **includesColumn(column)**: Checks if the index includes a specific column
- **includesOnlyColumn(column)**: Checks if the index includes only a specific column
- **hasColumn(column)**: Checks if the index has a specific column by name
- **updateColumns(columnsNames)**: Updates the columns in the index

### State Management Methods

- **isDirty()**: Checks if the index has local changes, is removed, or is new
- **wasOnlyRenamed()**: Checks if the index was only renamed
- **hasLocalChanges()**: Checks if the index has local changes
- **hasLanguage()**: Checks if the index has a language setting
- **hasOnUpdate()**: Checks if the index has an onUpdate action
- **hasOnDelete()**: Checks if the index has an onDelete action
- **calculateDefaultName()**: Calculates a default name for the index based on its columns
- **hasSchemaChanges(comparisonData)**: Checks if the index has schema changes
- **hasDataChanges(comparisonData)**: Checks if the index has data changes
- **logDataComparison()**: Logs data comparison for debugging
- **applyChanges(data)**: Applies changes to the index
- **calculateInternalData(data)**: Calculates internal data for the index
- **saveSchemaState()**: Saves the schema state
- **fillSchemaState()**: Fills the schema state
- **buildSchemaState()**: Builds the schema state
- **dataComparisonMap(comparisonData)**: Creates a map of data comparisons

### Other Methods

- **getForeignTable()**: Gets the foreign table referenced by this index
- **old()**: Creates an old version of the index based on schema state

## Usage Examples

### Creating a New Index

```typescript
// Create a primary key index
const primaryKeyIndex = new Index({
    name: 'users_pk',
    type: IndexType.PRIMARY,
    tableId: usersTable.id,
    columns: ['id']
});
primaryKeyIndex.save();

// Create a foreign key index
const foreignKeyIndex = new Index({
    name: 'posts_user_id_foreign',
    type: IndexType.FOREIGN,
    tableId: postsTable.id,
    columns: ['user_id'],
    on: 'users',
    references: 'id',
    onUpdate: 'CASCADE',
    onDelete: 'RESTRICT'
});
foreignKeyIndex.calculateInternalData(foreignKeyIndex);
foreignKeyIndex.save();
```

### Working with Index Columns

```typescript
// Add a column to an index
index.updateColumns([...index.columns, 'new_column']);

// Check if an index contains a specific column
if (index.hasColumn('user_id')) {
    // Do something with the index
}

// Get all indexes that include a specific column
const userIdIndexes = table.indexes.filter(index => index.includesColumn(userIdColumn));
```

### Checking Index Types

```typescript
// Check if an index is a primary key
if (index.isPrimary()) {
    console.log('This is a primary key index');
}

// Check if an index is a foreign key
if (index.isForeign()) {
    const foreignTable = index.getForeignTable();
    console.log(`This index references the ${foreignTable.name} table`);
}
```

### Managing Index State

```typescript
// Save the current state for change detection
index.saveSchemaState();

// Later, check if there are changes
if (index.hasLocalChanges()) {
    console.log('Index has been modified');
}

// Apply changes from an external source
const updatedData = {
    name: 'new_index_name',
    columns: ['col1', 'col2'],
    type: IndexType.UNIQUE
};

if (index.applyChanges(updatedData)) {
    console.log('Changes were applied successfully');
}
```
