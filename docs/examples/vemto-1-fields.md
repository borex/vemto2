Fields
=================

***

Fields can be added from the **Entity Options** panel (you can open this panel by clicking on the Entity). Vemto supports the majority of [Laravel Migrations](https://laravel.com/docs/8.x/migrations) field types and indexes.

  

![Schema](https://user-images.githubusercontent.com/11933789/102505324-9a9dc100-4060-11eb-96ca-380e3a3bef9f.png)

*   [\# Fields](https://vemto.app/docs/1.x/fields#-fields)
*   [Creating](https://vemto.app/docs/1.x/fields#creating)
*   [Field Options](https://vemto.app/docs/1.x/fields#field-options)
*   [Special faker definition](https://vemto.app/docs/1.x/fields#special-faker-definition)
*   [Foreign Key](https://vemto.app/docs/1.x/fields#foreign-key)

[Creating](https://vemto.app/docs/1.x/fields#creating)
------------------------------------------------------

To add a new field, you can click on the **Add Field** button under the **Entity Options**. Then, just type the name and choose the type.

> It is **highly recommended** to use _lower case_ field names

  

![image](https://user-images.githubusercontent.com/11933789/102508473-2cf39400-4064-11eb-94d6-17417c301e81.png)

> _Vemto_ has a huge internal **Fields Library** and will try to automatically identify the field type, the faker, and the options based on the field name you wrote. For example, if you type "slug" on the field name, and the field doesn't have a type yet, _Vemto_ automatically will suggest the _String_ type, and will add the _"$faker->slug"_ to the Faker property on the field options.

![image](https://user-images.githubusercontent.com/11933789/102507231-c8840500-4062-11eb-94a2-dbefef50f815.gif)

_An example of Vemto automatically suggesting the field type and options_

  

[Field Options](https://vemto.app/docs/1.x/fields#field-options)
----------------------------------------------------------------

The field options are accessible by clicking on the _gears_ icon right after the field type.

  

![Field Options](https://user-images.githubusercontent.com/11933789/102509532-6bd61980-4065-11eb-8a93-96a02411fed1.png)

The available options are:

*   **Nullable** \- Defines if the field is nullable or not
*   **Hidden** \- Defines if the field is hidden or not (for example, the password field is hidden by default)
*   **Fillable** \- Defines if the field is fillable or not (this option is visible when the project uses the [_Fillable Mass Assignment strategy_](https://vemto.app/docs/1.x/projects#general-settings))
*   **Guarded** \- Defines if the field is guarded or not (this option is visible when the project uses the [_Guarded Mass Assignment strategy_](https://vemto.app/docs/1.x/projects#general-settings))

> If you change the Mass Assignment strategy from _"Fillable"_ to _"Guarded"_, _Vemto_ automatically takes care of it and all the _fields mass assignment_ will be updated accordingly

*   **Unique** \- Defines if the field has a unique index
*   **Index** \- Defines if the field has a plane index
*   **Default Value** \- Sets the field default value
*   **Faker** \- Defines the field [faker](https://github.com/FakerPHP/Faker) to seed dummy data and run the tests
*   **Size** \- Defines the field size
*   **Options** \- Defines the field sizes (only for _Enum_ and _Set_ field types)
*   **Primary Key** \- Defines if the field is a primary key

> Entities can have only one _Primary Key_. If you change a field to a primary key type (ID, Big Increments, etc) or mark it as _Primary Key_, _Vemto_ will remove the primary key constraint from the latest _PK_ and will update all relationships and foreigns that relates to it to point to the new _PK_

*   **Foreign Key** \- Defines if the field is a Foreign Key

[Special faker definition](https://vemto.app/docs/1.x/fields#special-faker-definition)
--------------------------------------------------------------------------------------

Besides supporting [faker](https://github.com/FakerPHP/Faker), the fields support some special faker definitions too:

*   **PHP Code** \- you can set a faker as a custom PHP code. For example, a code that randomly set a value for each time you run your seeders or factories:

`array_rand(array_flip(['apple', 'banana']), 1)`

*   **'{DEFAULT\_OR\_FIRST}'** \- use this value on your faker to seed with the field default value, or optionally the first option if you are dealing with an ENUM field (it will use the first option if the field has no default value)
*   **{SIZE}** \- use this option to replace some section of your faker with the field size. For example, if you have a string field with a size of 64 characters, you can use **Str::random({SIZE})** on your faker, which will be translated to **Str::random(64)** on the generated code
*   **Fixed Value** \- you can use a fixed value too. Just add it to the faker input on your field options. Please remember to add quotes (' or ") if you are dealing with string values.

![image](https://user-images.githubusercontent.com/11933789/123297630-1d12ac00-d4ee-11eb-80a8-e1bbde94d32f.png)

[Foreign Key](https://vemto.app/docs/1.x/fields#foreign-key)
------------------------------------------------------------

When marking a field as Foreign Key, the following options are available:

  

![Foreign Key Options](https://user-images.githubusercontent.com/11933789/102513458-ffa9e480-4069-11eb-8e54-7a9b74dd6828.png)

*   **Reference Table/Model** \- Defines the foreign referenced table or model
*   **Reference Field** \- Defines the foreign referenced field
*   **On Update** \- Defines the SQL action to run when updating the foreign data. _E.g. CASCADE_
*   **On Delete** \- Defines the SQL action to run when deleting the foreign data. _E.g. CASCADE_

> It is highly recommended to follow the [Eloquent Model Conventions](https://laravel.com/docs/8.x/eloquent#eloquent-model-conventions) when creating foreign keys