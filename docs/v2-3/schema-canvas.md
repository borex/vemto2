# Working with the Schema Canvas in Vemto 2

The schema canvas is your main workspace for designing database structures. This guide explains how to use the canvas effectively.

## Understanding the Canvas

The schema canvas is where you:
- Visualize your database tables
- See relationships between tables
- Organize your schema layout
- Navigate your database design

## Canvas Navigation

### Panning

To move around the canvas:
- Click and drag on empty areas of the canvas
- The cursor will change to a "grab" icon when panning

### Zooming

To zoom in and out:
- Use the zoom controls in the toolbar (+ and - buttons)
- Use the mouse wheel while holding Ctrl
- The current zoom level is displayed in the toolbar

### Centering

To center the view:
- Click "Centralize View" in the toolbar dropdown menu
- This centers the canvas view

## Working with Tables on the Canvas

### Moving Tables

To move a table:
- Click and drag the table header
- The table will move with your cursor
- Release to place the table in its new position

### Selecting Tables

To select a table:
- Click anywhere on the table (except the header)
- The table will be highlighted
- The Table Options panel will open

### Table Visual Indicators

Tables on the canvas have visual indicators:

- **Border colors**: Indicate special properties
  - Yellow: Contains primary key
  - Red: Contains foreign keys
  - Blue: Contains indexes
- **Status indicators**:
  - "(Draft)": Newly created table
  - "(Changed)": Modified table
  - "(Removed)": Table marked for deletion

### Viewing Table Details

Each table displays:
- Table name in the header
- List of columns with their types
- Models associated with the table

## Managing Relationships

Relationships appear as lines connecting tables:
- **Solid lines**: Foreign key relationships
- **Dotted lines**: Model relationships without foreign keys

## Organizing the Canvas

### Auto-Arranging Tables

To automatically arrange tables:
- Click the menu in the toolbar
- Select "Organize Tables" for a grid layout
- Select "Organize Tables Horiz." for a horizontal layout

### Manually Arranging Tables

For precise control over table positions:
- Drag tables to specific positions
- Arrange related tables close to each other
- Consider using a hierarchical or grid layout

## Searching for Tables

To find a specific table:
- Click the search field in the toolbar
- Start typing the table name
- Select the table from the dropdown results
- The canvas will focus on that table

## Visual Customization

### Zoom to Focus

- Zoom in to focus on specific relationships
- Zoom out to see the big picture of your schema

### Section Management

- Use schema sections for different parts of your application
- Each section has its own layout and zoom settings

## Exporting the Schema (Coming Soon)

- Save your schema as an image
- Export for documentation or presentations

## Best Practices

- Keep related tables close to each other
- Use consistent spacing between tables
- Avoid overlapping tables and relationship lines
- Use schema sections for large projects
- Periodically reorganize your layout as the schema grows
- Save your schema changes regularly
