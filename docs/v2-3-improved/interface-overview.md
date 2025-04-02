# Understanding the Vemto 2 Interface

This guide will help you understand the main parts of the Vemto 2 interface so you can navigate the application with confidence.

## Schema Canvas: Your Design Workspace

The schema canvas is your main work area:

- **Tables:** Shown as rectangular boxes with all their columns and properties
- **Relationships:** Displayed as connecting lines between tables
- **Navigation:** Move around by dragging the canvas, zoom with controls or mouse wheel
- **Background:** The gridded background helps with alignment and spacing

## Toolbar: Quick Access to Tools

The toolbar sits at the top of your screen with essential tools:

- **Add Table button (+):** Creates a new table in your current schema section
- **Add Comment button (speech bubble):** Adds a text comment to your schema (coming soon)
- **Sync Schema button (refresh icon):** Updates your visual schema to match your code
- **Zoom Controls (+ and -):** Changes how close or far you view your schema
- **Search box:** Quickly find and focus on specific tables
- **Schema Sections buttons:** Switch between different views of your schema or create new ones
- **Menu (three dots):** Access additional features like auto-arrange and centering

## Schema Sections: Organize Your Design

Schema sections help you break a complex database into manageable parts:

- Each section appears as a button in the toolbar
- Sections act like separate pages in your design
- Tables can exist in only one section at a time
- The active section's button is highlighted in red
- Each button shows the section name and number of tables it contains
- Use sections to group related functionality (like "User Management" or "Blog System")

## Table Options Panel: Configure Your Tables

When you select a table, this panel opens on the right side with tabs for:

1. **Columns:** Add, edit, and delete table columns
   - Set data types, defaults, and constraints
   - Configure primary keys and indexes
   - Set column attributes like nullable and unique

2. **Models:** Set up application models for your table
   - Configure model properties and relationships
   - Set up model-specific features
   - Access advanced configuration options

3. **Indexes:** Create and manage database indexes
   - Improve query performance
   - Support unique constraints
   - Configure composite indexes

4. **Migrations:** View and configure migration settings
   - Control how changes are applied to your database
   - Review migration history
   - Configure migration-specific options

5. **Settings:** Adjust general table properties
   - Change table name and display options
   - Configure table-wide behaviors
   - Set advanced database options

## Changes Management: Track Your Work

Vemto helps you track and save your schema changes:

- **Visual indicators** show unsaved changes (tables marked as "Draft" or "Changed")
- **Save notification** appears when you have pending changes to save
- **Migration Saver dialog** helps you review and organize changes before saving
- **Change history** is accessible through the migrations panel

## Contextual Menus: Right-Click for Options

Right-clicking different elements shows context-specific options:

- **Right-click on tables:** Move to other sections, delete, duplicate, etc.
- **Right-click on columns:** Configure options specific to that column type
- **Right-click on relationship lines:** Edit or delete the relationship
- **Right-click on empty canvas:** Access canvas-specific options

## Keyboard Shortcuts: Work Faster

Speed up your workflow with these keyboard shortcuts:

- `Ctrl + Shift + T`: Create a new table
- `Ctrl + Shift + C`: Add a new column (when table is selected)
- `Ctrl + Shift + I`: Add a new index (when in the index editor)
- `Ctrl + S`: Save schema changes
- `Esc`: Close the current panel or dialog
- `Delete`: Remove the selected element
- `Ctrl + Z`: Undo last action
- `Ctrl + Y`: Redo last action
