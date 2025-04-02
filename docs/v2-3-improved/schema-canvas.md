# Working with the Schema Canvas in Vemto 2

The schema canvas is your visual workspace for database design. This guide will help you work efficiently with the canvas.

## What is the Schema Canvas?

The schema canvas is like a digital whiteboard where you:
- See and arrange your database tables visually
- Create and view connections between related tables
- Organize your database layout in a way that makes sense to you
- Navigate through your entire database design

## Moving Around the Canvas

### Panning (Moving Your View)

To move around the canvas:
- Click and hold on any empty area (your cursor will turn into a hand ✋)
- Drag in any direction to move your view
- Release to stop panning

**Pro tip:** Panning is useful when you have many tables and need to see different areas.

### Zooming In and Out

Three easy ways to zoom:
- Click the "+" and "-" buttons in the toolbar
- Hold Ctrl (or Cmd on Mac) and scroll your mouse wheel
- Use Ctrl+Plus and Ctrl+Minus keyboard shortcuts

The current zoom percentage appears in the toolbar (like "100%" or "75%").

### Centering Your View

Lost in your schema? To reset your view:
- Click the menu (three dots) in the toolbar
- Select "Centralize View"
- Your view will automatically center on your tables

## Working with Tables

### Moving Tables Around

To arrange tables on your canvas:
- Click and drag a table's header bar (where the table name is)
- Move it to any position on the canvas
- Release to place it

**Pro tip:** Arrange related tables close to each other for clarity.

### Selecting a Table

To work with a specific table:
- Click anywhere on the table (except its header)
- The table will highlight to show it's selected
- The Table Options panel will open on the right side

### Understanding Table Visual Cues

Tables use colors and labels to show important information:

- **Border colors tell you about special features:**
  - Yellow border: Table has a primary key column
  - Red border: Table has foreign key columns
  - Blue border: Table has custom indexes

- **Status text shows recent changes:**
  - "(Draft)": A newly created table
  - "(Changed)": A table you've modified but haven't saved
  - "(Removed)": A table marked for deletion

### What's Shown in Each Table

Each table box displays:
- Table name in the header bar
- All columns with their data types
- Any related models (like "User Model")
- Primary and foreign key indicators

## Working with Relationships

Relationship lines connect related tables:
- **Solid lines:** Foreign key relationships (enforced at database level)
- **Dotted lines:** Model relationships (not using foreign keys)

**Pro tip:** Hover over any relationship line to see details about the connection.

## Organizing Your Tables

### Auto-Arrange Feature

Let Vemto organize your tables for you:
- Click the menu (three dots) in the toolbar
- Choose "Organize Tables" for a grid arrangement
- Select "Organize Tables Horiz." for a horizontal flow

This is perfect when your schema gets messy or has many tables.

### Manual Arrangement Tips

For hands-on control:
- Place related tables close to each other
- Arrange tables in a logical flow (like top-to-bottom or left-to-right)
- Leave space between table groups
- Consider arranging in a hierarchy (parent tables above child tables)

## Finding Tables Quickly

In large schemas, use the search feature:
- Click the search box in the toolbar
- Start typing a table name
- Select from matching results
- The view will automatically focus on that table

## Visual Tips and Tricks

### Use Zoom Strategically

- Zoom in (100-150%) when working on specific table details
- Zoom out (50-75%) to see the big picture and relationships
- Use 100% zoom for general work

### Leverage Schema Sections

For complex projects:
- Create separate sections for different parts of your app
- Each section maintains its own layout and zoom settings
- Switch between sections to focus on specific features

## Exporting Your Schema (Coming Soon)

Soon you'll be able to:
- Export your schema as a PNG or SVG image
- Share your design with team members
- Include in documentation or presentations

## Canvas Best Practices

- Keep your canvas organized by regularly arranging tables
- Group related tables together in logical clusters
- Avoid crossing relationship lines when possible
- Use schema sections for different functional areas
- Save your changes regularly
- Consider a consistent direction for your relationships (like left-to-right)
- Use enough zoom-out to see the relationships between tables
