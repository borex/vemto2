# Working with Schema Sections in Vemto 2

Schema sections help you organize your database design into separate diagrams. This guide explains how to use schema sections effectively.

## Understanding Schema Sections

Schema sections allow you to:
- Divide large schemas into manageable parts
- Group related tables together
- Create focused views of specific parts of your application
- Improve visualization of complex systems

## Creating Schema Sections

To create a new schema section:

1. Click "New Schema" in the toolbar
2. Enter a name for your section
3. Click "Create"

Your new schema section will appear in the toolbar.

## Managing Schema Sections

Each schema section is represented by a button in the toolbar:

- Click a section button to switch to that section
- The active section is highlighted in red
- Each section shows the number of tables it contains

## Moving Tables Between Sections

To move a table to a different section:

1. Right-click on the table
2. Select "Move to [section name] schema"
3. The table will now appear in the selected section

## Deleting Schema Sections

To delete a schema section:

1. Hover over the section button
2. Click the "X" icon that appears
3. Confirm the deletion

When you delete a section:
- All tables in that section are moved to the default section
- The section is permanently removed

## Using Schema Sections Effectively

Here are some ways to use schema sections effectively:

### Functional Grouping

Group tables by functional area:
- Authentication (users, permissions, roles)
- Content (articles, categories, media)
- E-commerce (products, orders, payments)

### Entity Relationships

Group tables by entity relationships:
- User and profile-related tables
- Product and inventory-related tables
- Order and payment-related tables

### Development Phases

Group tables by development phase:
- Core functionality
- Phase 2 features
- Future enhancements

## Section-Specific Settings

Each schema section has its own settings:

- **Zoom level**: Each section remembers its own zoom level
- **Scroll position**: Each section remembers where you were scrolled to
- **Table arrangement**: Tables can be positioned differently in each section

## Best Practices

- Use clear, descriptive names for sections
- Limit each section to a reasonable number of tables (5-15)
- Create sections that focus on specific functional areas
- Consider color-coding or naming conventions for tables in different sections
- Review your section organization periodically as your project grows
