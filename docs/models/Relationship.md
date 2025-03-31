# Relationship Model Documentation

## Overview

The `Relationship` class extends `AbstractSchemaModel` and implements `SchemaModel`. It represents database relationships between models, similar to Laravel's Eloquent relationship system. This class manages different types of relationships such as BelongsTo, HasMany, HasOne, BelongsToMany, Morph relationships, and HasManyThrough.

## Properties

### Basic Properties

| Property | Type | Description |
|----------|------|-------------|
| `id` | string | Unique identifier for the relationship |
| `defaultName` | string | Default name for the relationship |
| `usingFirstDefaultName` | boolean | Indicates if using the first default name |
| `name` | string | Name of the relationship |
| `type` | string | Type of relationship (BelongsTo, HasMany, HasOne, etc.) |
| `relatedTableName` | string | Name of the related table |
| `relatedModelName` | string | Name of the related model |
| `parentTableName` | string | Name of the parent table |
| `parentModelName` | string | Name of the parent model |
| `localKeyName` | string | Name of the local key |
| `relatedKeyName` | string | Name of the related key |

### BelongsTo, HasMany, and HasOne Properties

| Property | Type | Description |
|----------|------|-------------|
| `foreignKeyName` | string | Name of the foreign key |
| `foreignKeyId` | string | ID of the foreign key |
| `foreignKey` | Column | Reference to the foreign key column |
| `ownerKeyName` | string | Name of the owner key |
| `ownerKeyId` | string | ID of the owner key |
| `ownerKey` | Column | Reference to the owner key column |
| `parentKeyId` | string | ID of the parent key |
| `parentKey` | Column | Reference to the parent key column |

### BelongsToMany Properties

| Property | Type | Description |
|----------|------|-------------|
| `foreignPivotKeyName` | string | Name of the foreign pivot key |
| `foreignPivotKeyId` | string | ID of the foreign pivot key |
| `foreignPivotKey` | Column | Reference to the foreign pivot key column |
| `relatedPivotKeyName` | string | Name of the related pivot key |
| `relatedPivotKeyId` | string | ID of the related pivot key |
| `relatedPivotKey` | Column | Reference to the related pivot key column |
| `pivotTableName` | string | Name of the pivot table |
| `pivotId` | string | ID of the pivot table |
| `pivot` | Table | Reference to the pivot table |
| `withPivotColumns` | boolean | Whether to include pivot columns |
| `includedPivotColumns` | string[] | Array of pivot column names to include |

### Morph Properties

| Property | Type | Description |
|----------|------|-------------|
| `idColumnId` | string | ID of the ID column |
| `idColumn` | Column | Reference to the ID column |
| `morphType` | string | Morph type |
| `morphToName` | string | Morph to name |
| `typeColumnId` | string | ID of the type column |
| `typeColumn` | Column | Reference to the type column |

### HasManyThrough Properties

| Property | Type | Description |
|----------|------|-------------|
| `firstKeyName` | string | Name of the first key |
| `secondKeyName` | string | Name of the second key |
| `throughId` | string | ID of the through model |
| `through` | Model | Reference to the through model |

### Relationship Models Properties

| Property | Type | Description |
|----------|------|-------------|
| `model` | Model | The model that owns this relationship |
| `modelId` | string | ID of the model |
| `relatedModel` | Model | The related model |
| `relatedModelId` | string | ID of the related model |

### Inverse Relationship Properties

| Property | Type | Description |
|----------|------|-------------|
| `inverseId` | string | ID of the inverse relationship |
| `inverse` | Relationship | Reference to the inverse relationship |
| `inverses` | Relationship[] | Array of inverse relationships |

### State Properties

| Property | Type | Description |
|----------|------|-------------|
| `schemaState` | any | State of the schema |
| `removed` | boolean | Whether the relationship is marked as removed |
| `project` | Project | Reference to the project |
| `projectId` | string | ID of the project |
| `createdFromInterface` | boolean | Whether created from the interface |

## Methods

### Relationship Definition

```typescript
relationships() {
    return {
        inverse: () => this.belongsTo(Relationship, 'inverseId'),
        inverses: () => this.hasMany(Relationship, 'inverseId'),
        model: () => this.belongsTo(Model),
        // other relationships...
    }
}
```

Defines the relationships this model has with other models.

### Lifecycle Methods

| Method | Parameters | Description |
|--------|------------|-------------|
| `static updated` | `relationship: Relationship` | Called when a relationship is updated |
| `static deleting` | `relationship: Relationship` | Called when a relationship is being deleted |
| `saveFromInterface` | none | Saves a relationship created from the interface |
| `remove` | none | Marks a relationship as removed or deletes it if new |
| `undoRemove` | none | Unmarks a relationship as removed |

### Validation Methods

| Method | Returns | Description |
|--------|---------|-------------|
| `isValid` | boolean | Checks if the relationship is valid |
| `isInvalid` | boolean | Checks if the relationship is invalid |
| `getLabel` | string | Gets a label for the relationship |

### Type Checking Methods

| Method | Returns | Description |
|--------|---------|-------------|
| `isSingular` | boolean | Checks if the relationship is singular (BelongsTo, HasOne, MorphOne) |
| `isCollection` | boolean | Checks if the relationship is a collection (HasMany, BelongsToMany, etc.) |
| `isThrough` | boolean | Checks if the relationship is a through relationship |
| `isManyToMany` | boolean | Checks if the relationship is many-to-many |
| `isCommon` | boolean | Checks if the relationship is common (BelongsTo, HasMany, HasOne) |
| `isCommonMorph` | boolean | Checks if the relationship is a common morph (MorphOne, MorphMany) |
| `isManyToManyMorph` | boolean | Checks if the relationship is many-to-many morph |
| `isMorph` | boolean | Checks if the relationship is any kind of morph |

### State Management Methods

| Method | Parameters | Returns | Description |
|--------|------------|---------|-------------|
| `isDirty` | none | boolean | Checks if the relationship has changes |
| `hasSchemaChanges` | `comparisonData: any` | boolean | Checks if there are schema changes |
| `hasDataChanges` | `comparisonData: any` | boolean | Checks if there are data changes |
| `hasLocalChanges` | none | boolean | Checks if there are local changes |
| `logDataComparison` | none | void | Logs data comparison details |
| `applyChanges` | `data: any` | boolean | Applies changes to the relationship |
| `saveSchemaState` | none | void | Saves the schema state |
| `fillSchemaState` | none | void | Fills the schema state |
| `buildSchemaState` | none | object | Builds the schema state object |
| `dataComparisonMap` | `comparisonData: any` | object | Creates a comparison map between states |

### Relationship Management Methods

| Method | Parameters | Returns | Description |
|--------|------------|---------|-------------|
| `updateInverse` | none | void | Updates the inverse relationship |
| `updateCommonInverse` | `inverse: Relationship` | void | Updates a common inverse relationship |
| `updateManyToManyInverse` | `inverse: Relationship` | void | Updates a many-to-many inverse relationship |
| `maybeInverseOf` | `relationship: Relationship` | boolean | Checks if potentially an inverse of the given relationship |
| `inverseTypes` | none | string[] | Returns the possible inverse types for this relationship |
| `fillRelationshipKeys` | none | void | Fills relationship keys |

### Data Calculation Methods

| Method | Parameters | Returns | Description |
|--------|------------|---------|-------------|
| `calculateDefaultData` | none | void | Calculates default data for the relationship |
| `processAndSave` | `createInverse: boolean` | void | Processes and saves the relationship |
| `getCalculatorService` | none | object | Gets the appropriate calculator service for the relationship type |

### Helper Methods

| Method | Returns | Description |
|--------|---------|-------------|
| `getParentModel` | Model | Gets the parent model based on relationship type |
| `hasRelatedModel` | boolean | Checks if the relationship has a related model |
| `hasInverse` | boolean | Checks if the relationship has an inverse |
| `hasDifferentInverse` | boolean | Checks if the relationship has a different inverse |
| `hasModel` | boolean | Checks if the relationship has a model |
| `hasType` | boolean | Checks if the relationship has a type |
| `getTypeCamelCase` | string | Gets the type in camel case |
| `hasTypeAndRelatedModel` | boolean | Checks if the relationship has a type and related model |
| `canCalculateDefaultData` | boolean | Checks if default data can be calculated |
| `getPivotTableColumns` | Column[] | Gets pivot table columns |
| `getRelatedColumns` | Column[] | Gets related columns |

## Relationship Types

The Relationship class supports the following relationship types:

1. **Common Relationships**
   - `BelongsTo`: A model belongs to another model
   - `HasMany`: A model has many instances of another model
   - `HasOne`: A model has one instance of another model

2. **Many-to-Many Relationships**
   - `BelongsToMany`: Models that belong to each other through a pivot table

3. **Morph Relationships**
   - `MorphOne`: A polymorphic one-to-one relationship
   - `MorphMany`: A polymorphic one-to-many relationship
   - `MorphToMany`: A polymorphic many-to-many relationship

4. **Through Relationships**
   - `HasManyThrough`: A relationship through an intermediate model

## Usage Examples

### Creating a Basic Relationship

```typescript
const relationship = new Relationship();
relationship.name = 'posts';
relationship.type = 'HasMany';
relationship.modelId = userModel.id;
relationship.relatedModelId = postModel.id;
relationship.projectId = project.id;
relationship.calculateDefaultData();
relationship.processAndSave();
```

### Creating an Inverse Relationship

```typescript
const hasMany = new Relationship();
hasMany.name = 'posts';
hasMany.type = 'HasMany';
hasMany.modelId = userModel.id;
hasMany.relatedModelId = postModel.id;
hasMany.projectId = project.id;

const belongsTo = new Relationship();
belongsTo.name = 'user';
belongsTo.type = 'BelongsTo';
belongsTo.modelId = postModel.id;
belongsTo.relatedModelId = userModel.id;
belongsTo.projectId = project.id;

// Link the relationships as inverses
hasMany.inverseId = belongsTo.id;
belongsTo.inverseId = hasMany.id;

// Process and save both
hasMany.processAndSave();
belongsTo.processAndSave();
```

### Checking Relationship Validity

```typescript
const relationship = getRelationship(); // Get a relationship from somewhere

if (relationship.isValid()) {
    // Relationship is valid, proceed
    relationship.processAndSave();
} else {
    // Relationship is invalid, handle accordingly
    console.error('Invalid relationship configuration');
}
```

### Handling Schema Changes

```typescript
const existingRelationship = getRelationship(); // Get an existing relationship
const schemaData = getSchemaData(); // Get schema data from somewhere

if (existingRelationship.hasSchemaChanges(schemaData)) {
    // Apply the changes
    existingRelationship.applyChanges(schemaData);
    console.log('Schema changes applied');
} else {
    console.log('No schema changes detected');
}
```
