# Working with Models in Vemto 2

Models are the code representations of your database tables. In Vemto 2, you can configure how these models behave in your application.

## Understanding Models

A model:
- Represents a database table in your application code
- Defines relationships with other models
- Specifies special behaviors and properties
- Controls how data is accessed and manipulated

## Creating Models

Models are typically created automatically when you create a table. To add a model to an existing table:

1. Select your table to open the Table Options panel
2. Go to the "Models" tab
3. Click "Add Model"

## Model Configuration Tabs

When configuring a model, you'll work with several tabs:

### Data Tab

Configure basic model properties:

- **Namespace**: The code namespace for your model
- **Name**: The model class name
- **Collection**: The plural name used in your application (e.g., for routes)
- **Timestamps**: Whether to include created_at/updated_at fields
- **SoftDeletes**: Whether to enable soft deletes
- **Fillable/Guarded**: Control mass assignment protection
- **Hidden**: Fields that should be hidden from JSON/array output
- **Dates**: Fields that should be treated as dates
- **Casts**: How fields should be cast when retrieved

### Relationships Tab

Define how this model relates to others:

1. Click "Add Relationship"
2. Select the relationship type:
   - **Belongs To**: This model belongs to another model
   - **Has Many**: This model has many of another model
   - **Has One**: This model has one of another model
   - **Belongs To Many**: Many-to-many relationship
   - And other relationship types
3. Select the related model
4. Configure relationship-specific options

### Code Tab

Access and customize the generated code:

- **Model Hooks**: Customize the model code generation
- **Policy Hooks**: Customize authorization policies
- **Seeder Hooks**: Customize data seeding
- **Factory Hooks**: Customize test factories

### Imports Tab

Configure code imports and inheritance:

- **Parent Class**: The class your model extends
- **Traits**: Traits used by your model
- **Interfaces**: Interfaces implemented by your model

### Settings Tab

Adjust additional model settings:

- **Seeder Quantity**: Number of records to generate in seeders
- **Execute Seeder**: Whether to run the seeder automatically
- **Comment Attributes**: Whether to add comments for attributes
- **Comment Methods**: Whether to add comments for methods

## Working with Relationships

Relationships connect your models together. To add a relationship:

1. Go to the "Relationships" tab
2. Click "Add Relationship"
3. Select the relationship type
4. Choose the related model
5. Configure relationship options
6. Click "Save"

### Relationship Types

Vemto 2 supports all standard relationship types:

- **Belongs To**: This model belongs to another model
- **Has Many**: This model has many of another model
- **Has One**: This model has one of another model
- **Belongs To Many**: Many-to-many relationship with a pivot table
- **Has Many Through**: Relationship via an intermediate model
- **Morph relationships**: For polymorphic associations

## Model Hooks

Hooks allow you to customize the generated code:

1. Go to the "Code" tab
2. Select the hook type (Model, Policy, Seeder, Factory)
3. Edit the hooks to add custom code
4. The code will be included when the model is generated

## Best Practices

- Keep model names singular and in PascalCase (e.g., "User" not "users")
- Configure proper fillable/guarded attributes for security
- Use casts to ensure data is in the correct format
- Define clear, meaningful relationships
- Add comments to document complex functionality
