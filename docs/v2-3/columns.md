# Configuring Columns in Vemto 2

Columns define the fields in your database tables. This guide explains how to create and configure columns effectively.

## Adding Columns

To add a column to a table:

1. Select your table to open the Table Options panel
2. Ensure you're on the "Columns" tab
3. Click "Add Column" or press `Ctrl + Shift + C`
4. Configure the column properties

## Column Properties

Each column has several properties you can configure:

### Basic Properties

- **Name**: The column name in the database
- **Type**: Data type (string, integer, text, etc.)
- **Nullable**: Whether the column can contain NULL values

### Advanced Properties

Click the dropdown arrow on a column to access advanced properties:

- **Unique**: Whether values must be unique
- **Index**: Whether to create an index on this column
- **Unsigned**: For numeric types, whether to disallow negative values
- **Auto Increment**: For ID columns, whether to auto-increment
- **Length**: For types that require size specification (e.g., string, char)
- **Default Value**: The default value for new records
- **Raw Default**: Whether the default value should be treated as raw SQL
- **Precision/Scale**: For decimal/floating point numbers
- **Faker**: The formula used to generate fake data for testing

## Column Types

Vemto 2 supports a wide variety of column types:

### String Types
- **String**: Variable-length string (VARCHAR)
- **Char**: Fixed-length string
- **Text**: Longer text field
- **MediumText**: Medium-length text field
- **LongText**: Very long text field

### Numeric Types
- **Integer**: Whole number
- **BigInteger**: Large whole number
- **SmallInteger**: Small whole number
- **TinyInteger**: Very small whole number
- **Decimal**: Fixed-precision decimal number
- **Float**: Floating-point number
- **Double**: Double-precision floating-point

### Boolean Type
- **Boolean**: True/false value

### Date & Time Types
- **Date**: Date without time
- **DateTime**: Date and time
- **Time**: Time without date
- **Timestamp**: Timestamp (Unix time)
- **Year**: Year value

### Special Types
- **Enum**: List of predefined values
- **Set**: Collection of predefined values
- **Json**: JSON data
- **Jsonb**: Binary JSON data
- **Binary**: Binary data
- **Uuid**: Universally unique identifier

### Geo Types
- **Geometry**: Geometric shape
- **Geography**: Geographic data
- **Point**: Single point
- **LineString**: Line of points
- **Polygon**: Closed shape
- **MultiPoint**: Collection of points
- **MultiLineString**: Collection of lines
- **MultiPolygon**: Collection of polygons

### Network Types
- **IpAddress**: IP address
- **MacAddress**: MAC address

## Enum and Set Types

For Enum and Set types, you need to define the available options:

1. Select "enum" or "set" as the column type
2. Click the dropdown arrow to access advanced properties
3. Under "Options", click "Add Option" for each value
4. Enter the values that should be available in this enum/set

## Foreign Keys

Foreign keys create relationships between tables:

1. Create an index with type "Foreign Key"
2. Select the referenced table and column
3. Configure the ON UPDATE and ON DELETE behavior (cascade, restrict, etc.)

## Ordering Columns

You can reorder columns using drag and drop:

1. Click and hold the handle (three lines) to the left of a column
2. Drag the column to its new position
3. Release to place the column

## Column Indicators

Columns have visual indicators to show their properties:

- **Yellow**: Primary key column
- **Red**: Foreign key column
- **Orange**: Unique column
- **Blue**: Indexed column

## Removing Columns

To remove a column:

1. Click the trash icon on the right side of the column
2. Confirm the deletion if prompted

## Best Practices

- Use clear, descriptive column names
- Choose appropriate data types to ensure data integrity
- Index columns that will be frequently used in WHERE clauses
- Use foreign keys to maintain referential integrity
- Consider adding timestamp columns for created_at/updated_at
- Use nullable only when a column can legitimately be empty
