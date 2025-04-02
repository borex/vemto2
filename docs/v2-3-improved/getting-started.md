# Getting Started with Vemto 2

Welcome to Vemto 2! This guide will help you take your first steps with this powerful visual database design tool.

## What is Vemto 2?

Vemto 2 is a visual tool that helps you design database structures and generate code. Instead of writing SQL or migration files by hand, you can:

- Design your database visually by creating and connecting tables
- Configure models that represent your database in your application
- Generate all the necessary code and migrations automatically
- Organize even complex database structures in a clear, visual way

## Your First Look at Vemto 2

When you first open Vemto 2, here's what you'll see:

1. **Schema Canvas** - The main area where you'll design your database tables and see how they connect
2. **Toolbar** - At the top of the screen, with buttons for creating tables, zooming, and more
3. **Schema Sections** - Buttons to organize your database into different views or categories
4. **Table Options Panel** - Opens when you select a table, showing settings for that table

![Vemto 2 Interface Overview](https://vemto.app/docs/v2/images/interface-overview.png)

## Creating Your First Table

Let's create your first database table:

1. Click the "+" button in the toolbar (or press `Ctrl + Shift + T`)
2. In the dialog that appears:
   - Enter a name for your table (like "Product" or "User")
   - Use singular form for table names (e.g., "User" not "Users")
   - Check "Create Model" to automatically create an application model
   - Click "Create"

Your new table appears on the canvas with default columns. Now you can:

### Add Columns to Your Table

1. Select your table by clicking on it
2. In the Table Options panel, go to the "Columns" tab
3. Click "Add Column" (or press `Ctrl + Shift + C`)
4. Enter column details:
   - Name (like "title" or "email")
   - Type (like "string" or "integer")
   - Set other options as needed (nullable, unique, etc.)
5. Click "Add" to create the column

### Create a Relationship Between Tables

Once you have multiple tables, you can connect them:

1. Create a second table (like "Category" if your first was "Product")
2. Select your first table
3. In the Columns tab, add a column like "category_id"
4. Set its type to "foreign"
5. Choose the table it references (like "Category")
6. Choose the column it references (usually "id")
7. Click "Add" to create the relationship

A line now connects your tables, showing their relationship.

## Saving Your Changes

After making changes:

1. Look for the "Save Schema Changes" notification
2. Click "Save Changes" to open the Migration Saver
3. Review your changes
4. Enter a descriptive name for your migration
5. Click "Save Migration" to apply your changes

## Next Steps

Now that you've created your first table and learned the basics, explore these guides:

- [Working with the Schema Canvas](./schema-canvas.md) - Learn to navigate and organize your design
- [Working with Tables](./tables.md) - Discover all table configuration options
- [Adding Columns](./columns.md) - Learn about different column types and settings
- [Creating Relationships](./relationships.md) - Connect your tables in different ways

## Quick Tips for Beginners

- **Use schema sections** to organize related tables (like "User Management" or "Product Catalog")
- **Right-click** on tables, columns, and other elements to see context-specific options
- **Hover** over buttons and options to see helpful tooltips
- **Save regularly** to avoid losing your design changes
- **Use the zoom controls** to see both details and the big picture of your design
