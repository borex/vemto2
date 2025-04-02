
# Managing Migrations in Vemto 2

Migrations are files that describe changes to your database structure. This guide explains how to create and manage migrations in Vemto 2.

## Understanding Migrations

Migrations:
- Define how your database structure changes over time
- Allow you to version control your database schema
- Can be run to create or update your database structure
- Can be reversed to undo changes

## The Migration Workflow

When you make changes to your schema in Vemto 2:

1. Changes are tracked in the schema design
2. The "Save Schema Changes" button appears
3. You review and confirm your changes
4. Vemto generates migration files for your changes
5. These migrations can be run in your application

## Saving Schema Changes

When you've made changes to your schema:

1. Click the "Save Schema Changes" button at the bottom left
2. Review the changes in the modal that appears
3. For each table, choose whether to:
   - Create a new migration
   - Update the latest migration (if possible)
4. For each model, review the code changes
5. If there are conflicts, resolve them using the conflict solver
6. Click "Save changes" to confirm

## Types of Changes

Vemto 2 tracks several types of changes:

### Table Changes

- **Created Tables**: New tables added to the schema
- **Changed Tables**: Existing tables that have been modified
- **Removed Tables**: Tables marked for deletion

### Model Changes

- **Created Models**: New models added to the schema
- **Changed Models**: Existing models that have been modified
- **Removed Models**: Models marked for deletion

## Migration Options

When saving changes, you have two main options for each table:

### Create New Migration

Creates a separate migration file for the changes:
- Best for significant changes
- Keeps your migration history clear and organized
- Allows for more precise version control

### Update Latest Migration

Updates the most recent migration for this table:
- Best for minor tweaks during development
- Reduces the number of migration files
- Only available if the original migration hasn't been committed/shared

## Reviewing Changes

Before saving, carefully review the changes:

1. Check each table and model for accuracy
2. Review the generated migration code
3. Ensure relationships are properly defined
4. Resolve any conflicts in model files

## Conflict Resolution

If a model file has changed both in Vemto and in your codebase:

1. Use the conflict solver to review differences
2. Choose which changes to keep
3. Merge the changes manually if needed
4. Save the resolved file

## Table Migrations Tab

Each table has a "Migrations" tab that shows:

- Migration history for this table
- Options for managing migrations
- Code preview for migrations

## Blueprint vs. Sync Mode

Vemto 2 has two modes for managing schema changes:

### Blueprint Mode

- Changes in Vemto are saved to the database structure directly
- The application code is updated to match
- Recommended for most situations

### Sync Mode

- Changes in Vemto are compared to the actual application code
- Any discrepancies are highlighted for resolution
- Useful when working with existing applications

## Best Practices

- Review changes carefully before saving
- Create new migrations for significant changes
- Update latest migrations for minor tweaks during early development
- Resolve conflicts thoughtfully to avoid data loss
- Keep migrations focused on specific changes
- Test migrations in a development environment before deployment
