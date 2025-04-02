# Working with Schema Sections in Vemto 2

Schema sections let you split your database design into separate diagrams. This makes complex projects easier to manage and understand.

## What Are Schema Sections?

Think of schema sections as different pages in your design notebook. Each section lets you:
- Break large database designs into smaller, focused views
- Group related tables together (like "Users", "Products", "Orders")
- Focus on one part of your application at a time
- See your database structure more clearly

## Creating a New Section

It only takes a few clicks to create a new section:

1. Click the "New Schema" button in the top toolbar
2. Type a descriptive name (like "Authentication" or "Product Management")
3. Click "Create"

Your new section appears as a button in the toolbar right away.

## Working with Different Sections

Managing your sections is easy:

- Click any section button to switch to that view
- The active section shows in red so you know where you are
- Each section displays the number of tables it contains (for example, "Users (4)")
- Each section remembers its own zoom level and table positions

## Moving Tables Between Sections

Need to reorganize? You can move tables between sections:

1. Right-click on any table
2. Choose "Move to [section name]" from the menu
3. The table instantly moves to that section

**Example:** If you created a "User" table in your main section but later added an "Authentication" section, you can move it there for better organization.

## Removing a Section

To delete a section you no longer need:

1. Hover your mouse over the section button
2. Click the "X" icon that appears
3. Confirm you want to delete it

Don't worry about losing your tables - they'll automatically move to the default section.

## Smart Ways to Use Sections

Here are real-world strategies for using sections effectively:

### By Feature Area

Group tables that work together for specific features:
- **User Management:** users, roles, permissions
- **Content System:** articles, categories, tags, comments
- **Store:** products, inventory, orders, payments

### By Relationship Groups

Group tables that form natural data families:
- **Customer-related:** customers, addresses, preferences
- **Product-related:** products, categories, attributes, images
- **Order-related:** orders, items, shipments, invoices

### By Development Phase

Organize based on your build schedule:
- **MVP Phase:** core tables needed for launch
- **Phase 2:** tables for features coming later
- **Future Features:** tables for planned enhancements

## Section Settings

Each section maintains its own view settings:

- **Zoom level:** Each section remembers how zoomed in or out you were
- **Canvas position:** Each section recalls where you were looking
- **Table layout:** Tables can be arranged differently in each section

## Best Practices for Schema Sections

- Use clear, specific names that describe the section's purpose
- Keep sections focused with 5-15 related tables each
- Consider color-coding tables by section (using table settings)
- Review and reorganize your sections as your project grows
- Use consistent naming patterns (like "Admin - Users" and "Admin - Roles")
