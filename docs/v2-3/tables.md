# Working with Tables in Vemto 2

Tables are the foundation of your database schema. This guide explains how to create and manage tables in Vemto 2.

## Creating Tables

To create a new table:

1. Click the "+" button in the toolbar or press `Ctrl + Shift + T`
2. Enter a table name (use singular nouns for best practices)
3. Decide whether to create a default model for this table (recommended)
4. Click "Create"

## Table Properties

Each table has several properties you can configure:

- **Name**: The name of your table in the database
- **Label Column**: The column used as the primary display field
- **Models**: The application models associated with this table

## Managing Columns

To add columns to your table:

1. Select your table to open the Table Options panel
2. Ensure you're on the "Columns" tab
3. Click "Add Column" or press `Ctrl + Shift + C`
4. Configure the column properties:
   - **Name**: Column name
   - **Type**: Data type (string, integer, etc.)
   - **Options**: Nullable, unique, index, etc.

### Column Properties

For each column, you can configure:

- **Name**: The column name
- **Type**: Data type (string, integer, date, etc.)
- **Nullable**: Whether the column can contain NULL values
- **Unique**: Whether values must be unique
- **Index**: Whether to create an index on this column
- **Default Value**: The default value for new records
- **Length/Precision**: For types that require size specification
- **Faker**: The formula used to generate fake data for testing

## Working with Indexes

Indexes help optimize database queries. To manage indexes:

1. Select your table and go to the "Indexes" tab
2. Click "Add Index" or press `Ctrl + Shift + I`
3. Configure the index properties:
   - **Type**: Common, unique, or foreign key
   - **Columns**: The columns included in this index
   - **Foreign key options**: For foreign key indexes

### Index Types

Vemto 2 supports several index types:

- **Common Index**: Improves search performance
- **Unique Index**: Ensures column values are unique
- **Foreign Key**: Creates a relationship with another table

## Table Positioning

You can organize your tables visually on the schema canvas:

- **Drag**: Click and drag a table to move it
- **Auto-arrange**: Use the "Organize Tables" option in the toolbar menu
- **Center View**: Use the "Centralize View" option to center the canvas

## Deleting Tables

To delete a table:

1. Right-click on the table and select "Remove"
2. Confirm the deletion
3. Choose whether to delete foreign keys and pivot tables

## Tips for Effective Table Design

- Use plural nouns for table names (e.g., "Users" not "User")
- Include timestamp columns for created_at/updated_at if you need tracking
- Consider adding soft delete capability for important tables
- Use appropriate column types to ensure data integrity
