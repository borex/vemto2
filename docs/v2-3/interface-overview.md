# Understanding the Vemto 2 Interface

This guide will help you understand the main components of the Vemto 2 interface.

## Schema Canvas

The schema canvas is the main workspace where you design your database schema:

- **Tables**: Displayed as boxes containing columns and model information
- **Relationships**: Shown as lines connecting related tables
- **Navigation**: Pan by dragging the canvas, zoom using the toolbar or mouse wheel

## Toolbar

Located at the top of the screen, the toolbar provides access to the following tools:

- **Add Table**: Creates a new table in your schema
- **Add Comment**: Adds a comment to your schema (coming soon)
- **Sync Schema**: Synchronizes your visual schema with the source code
- **Zoom Controls**: Increase or decrease the zoom level
- **Search**: Find tables in your schema
- **Schema Sections**: Switch between different schema sections or create new ones

## Schema Sections

Schema sections help you organize your database design into separate diagrams:

- Each section contains its own set of tables and relationships
- Tables can be moved between sections
- Use sections to group related functionality (e.g., "Authentication", "Blog", "E-commerce")

## Table Options Panel

When you select a table, the table options panel appears with tabs for:

1. **Columns**: Add, edit, and remove columns for your table
2. **Models**: Configure models associated with your table
3. **Indexes**: Manage database indexes
4. **Migrations**: View and configure migration options
5. **Settings**: Configure general table settings

## Changes Management

When making changes to your schema:

- Unsaved changes are indicated in the schema and table views
- A notification appears to save schema changes when modifications are made
- The Migration Saver dialog lets you review and save schema changes systematically

## Contextual Menus

Right-clicking on various elements provides contextual options:

- **Tables**: Move to different sections, delete, etc.
- **Columns**: Configure type-specific options
- **Models**: Access advanced configuration options

## Keyboard Shortcuts

Vemto 2 offers several keyboard shortcuts to improve your workflow:

- `Ctrl + Shift + T`: Add a new table
- `Ctrl + Shift + C`: Add a new column (when in the column editor)
- `Ctrl + Shift + I`: Add a new index (when in the index editor)
- `Esc`: Close the current panel or dialog
