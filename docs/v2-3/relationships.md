# Managing Relationships in Vemto 2

Relationships connect your database tables and models together. This guide explains how to create and manage relationships in Vemto 2.

## Understanding Relationships

In database design, relationships define how records in different tables are connected:

- **One-to-One**: A record in one table is related to exactly one record in another table
- **One-to-Many**: A record in one table is related to multiple records in another table
- **Many-to-Many**: Records in both tables can be related to multiple records in the other table

## Creating Relationships

There are two ways to create relationships in Vemto 2:

### 1. Using Indexes (Database Level)

1. Select your table and go to the "Indexes" tab
2. Click "Add Index" or press `Ctrl + Shift + I`
3. Select "Foreign Key" as the index type
4. Choose the referenced table and column
5. Configure ON UPDATE and ON DELETE behavior

### 2. Using Model Relationships (Application Level)

1. Select your table and go to the "Models" tab
2. Select a model and go to the "Relationships" tab
3. Click "Add Relationship"
4. Configure the relationship:
   - **Type**: The relationship type
   - **Related Model**: The model this relationship connects to
   - **Name**: The method name that will be used in code

## Relationship Types

Vemto 2 supports all standard relationship types:

### Common Relationships

- **Belongs To**: This model belongs to another model (child to parent)
- **Has Many**: This model has many of another model (parent to children)
- **Has One**: This model has one of another model (parent to single child)

### Advanced Relationships

- **Belongs To Many**: Many-to-many relationship with a pivot table
- **Has Many Through**: Relationship via an intermediate model
- **Morph Relationships**: For polymorphic associations

## Configuring Relationships

Each relationship type has specific configuration options:

### Belongs To

- **Related Model**: The parent model
- **Foreign Key**: The column that stores the parent ID
- **Owner Key**: The key on the parent model (usually 'id')
- **Inverse Relationship**: The corresponding relationship on the related model

### Has Many / Has One

- **Related Model**: The child model
- **Foreign Key**: The column on the related model that references this model
- **Local Key**: The key on this model (usually 'id')
- **Inverse Relationship**: The corresponding relationship on the related model

### Belongs To Many

- **Related Model**: The model on the other side of the relationship
- **Pivot Table**: The intermediate table storing the relationship
- **Foreign Pivot Key**: The column in the pivot table referencing this model
- **Related Pivot Key**: The column in the pivot table referencing the related model
- **With Pivot Columns**: Additional columns from the pivot table to include

## Inverse Relationships

For most relationship types, you can define an inverse relationship:

- This creates the corresponding relationship on the related model
- Helps maintain consistency in your application
- Makes navigation between related models more intuitive

## Visualizing Relationships

On the schema canvas, relationships are displayed as lines between tables:

- **Solid lines**: Foreign key relationships defined at the database level
- **Dotted lines**: Relationships defined at the model level without a corresponding foreign key

## Pivot Tables

For many-to-many relationships, a pivot table is required:

- Vemto can automatically generate pivot tables
- You can select which columns from the pivot table to include in the relationship
- You can configure the pivot table name and column names

## Removing Relationships

To remove a relationship:

1. Navigate to the relationship in the model's Relationships tab
2. Click the "Delete" option
3. Choose whether to:
   - Delete just this relationship
   - Delete the inverse relationship as well
   - Delete associated foreign keys and pivot tables

## Best Practices

- Name relationships clearly to reflect their purpose
- Consider both sides of a relationship (define inverse relationships)
- Use appropriate relationship types for your data structure
- Ensure foreign keys have proper constraints (ON UPDATE, ON DELETE)
- For many-to-many relationships, consider what additional data the pivot table should store
