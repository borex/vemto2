# Documentation

## Table of Contents
1. [Model](#model)
2. [Index](#index)
3. [Relationship](#relationship)
4. [Project](#project)
5. [Column](#column)
6. [Table](#table)
7. [AbstractSchemaModel](#abstractschemamodel)
8. [SchemaModel](#schemamodel)

---

## Model

### Class: `Model`
Represents a database model with various Laravel-related properties and methods for managing schema states, relationships, and internal data.

#### Properties
- **id**: `string` - Unique identifier for the model.
- **name**: `string` - Name of the model.
- **plural**: `string` - Plural form of the model name.
- **table**: `Table` - Associated table.
- **class**: `string` - Fully qualified class name.
- **namespace**: `string` - Namespace of the model.
- **fillable**: `string[]` - List of fillable attributes.
- **guarded**: `string[]` - List of guarded attributes.
- **hidden**: `string[]` - List of hidden attributes.
- **casts**: `any` - Attribute casting definitions.
- **relationships**: `Relationship[]` - Relationships associated with the model.

#### Methods
- **relationships()**: Returns the relationships of the model.
- **saveFromInterface()**: Saves the model, initializing default settings if necessary.
- **generateDefaultImports()**: Sets default imports for the model.
- **generateDefaultSettings()**: Configures default settings for the model.
- **applyChanges(data: any)**: Applies changes to the model based on provided data.
- **logDataComparison()**: Logs data comparison for debugging.

#### Usage
```typescript
const model = new Model();
model.name = "User";
model.saveFromInterface();
```

---

## Index

### Class: `Index`
Represents a database index, including its type, columns, and relationships.

#### Properties
- **id**: `string` - Unique identifier for the index.
- **name**: `string` - Name of the index.
- **type**: `IndexType` - Type of the index (e.g., PRIMARY, UNIQUE).
- **columns**: `string[]` - Columns included in the index.
- **onTable**: `Table` - Table the index is associated with.

#### Methods
- **isPrimary()**: Checks if the index is a primary key.
- **isUnique()**: Checks if the index is unique.
- **applyChanges(data: any)**: Applies changes to the index.
- **logDataComparison()**: Logs data comparison for debugging.

#### Usage
```typescript
const index = new Index();
index.name = "user_email_unique";
index.type = IndexType.UNIQUE;
index.save();
```

---

## Relationship

### Class: `Relationship`
Represents a relationship between models, such as `BelongsTo`, `HasMany`, etc.

#### Properties
- **id**: `string` - Unique identifier for the relationship.
- **name**: `string` - Name of the relationship.
- **type**: `string` - Type of the relationship (e.g., `BelongsTo`, `HasMany`).
- **relatedModel**: `Model` - The related model.

#### Methods
- **isValid()**: Checks if the relationship is valid.
- **applyChanges(data: any)**: Applies changes to the relationship.
- **logDataComparison()**: Logs data comparison for debugging.

#### Usage
```typescript
const relationship = new Relationship();
relationship.name = "posts";
relationship.type = "HasMany";
relationship.save();
```

---

## Project

### Class: `Project`
Represents a project, including its models, tables, and settings.

#### Properties
- **id**: `string` - Unique identifier for the project.
- **name**: `string` - Name of the project.
- **models**: `Model[]` - List of models in the project.
- **tables**: `Table[]` - List of tables in the project.

#### Methods
- **findModelByName(name: string)**: Finds a model by its name.
- **getTables()**: Returns all tables in the project.
- **scheduleSchemaSync()**: Schedules schema synchronization.

#### Usage
```typescript
const project = Project.findOrCreate();
project.name = "MyProject";
project.save();
```

---

## Column

### Class: `Column`
Represents a column in a database table.

#### Properties
- **id**: `string` - Unique identifier for the column.
- **name**: `string` - Name of the column.
- **type**: `string` - Data type of the column.
- **nullable**: `boolean` - Indicates if the column is nullable.

#### Methods
- **isPrimaryKey()**: Checks if the column is a primary key.
- **applyChanges(data: any)**: Applies changes to the column.
- **logDataComparison()**: Logs data comparison for debugging.

#### Usage
```typescript
const column = new Column();
column.name = "email";
column.type = "string";
column.save();
```

---

## Table

### Class: `Table`
Represents a database table, including its columns, indexes, and relationships.

#### Properties
- **id**: `string` - Unique identifier for the table.
- **name**: `string` - Name of the table.
- **columns**: `Column[]` - List of columns in the table.
- **indexes**: `Index[]` - List of indexes in the table.

#### Methods
- **getColumns()**: Returns all columns in the table.
- **applyChanges(data: any)**: Applies changes to the table.
- **logDataComparison()**: Logs data comparison for debugging.

#### Usage
```typescript
const table = new Table();
table.name = "users";
table.save();
```

---

## AbstractSchemaModel

### Class: `AbstractSchemaModel`
Abstract base class for schema models, providing common functionality.

#### Properties
- **name**: `string` - Name of the schema model.
- **schemaState**: `any` - Current state of the schema.

#### Methods
- **isNew()**: Checks if the model is new.
- **wasRenamed()**: Checks if the model was renamed.
- **undoChanges()**: Reverts changes to the schema model.

---

## SchemaModel

### Interface: `SchemaModel`
Defines the structure and behavior of schema models.

#### Methods
- **hasSchemaChanges(comparisonData: any)**: Checks if there are schema changes.
- **applyChanges(data: any)**: Applies changes to the schema model.
- **logDataComparison()**: Logs data comparison for debugging.

---
