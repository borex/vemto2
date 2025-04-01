Models and Tables
=================

***

You can add _Models and Tables_ on the **Schema Editor**. Each _Schema Entity_ supports the majority of [Laravel Migrations](https://laravel.com/docs/8.x/migrations) field types. Model entities also support adding [relationships](https://vemto.app/docs/1.x/relationships).

  

![Schema](https://user-images.githubusercontent.com/11933789/102497531-81dcdd80-4057-11eb-95b6-0a20d43e5ec1.png)

*   [\# Models and Tables](https://vemto.app/docs/1.x/models#-models-and-tables)
*   [Creating](https://vemto.app/docs/1.x/models#creating)
*   [Updating](https://vemto.app/docs/1.x/models#updating)
*   [Pivot Tables](https://vemto.app/docs/1.x/models#pivot-tables)

[Creating](https://vemto.app/docs/1.x/models#creating)
------------------------------------------------------

To create a new entity, you can click on the **Add Entity** button on the **Schema Editor**. Then, on the **Add Entity** modal, fill all the obligatory fields.

  

![image](https://user-images.githubusercontent.com/11933789/102497706-bc467a80-4057-11eb-8aa5-2fe3a76cfb47.png)

  

If you choose to add a Model entity, _Vemto_ will suggest the _Model Collection_ name and the _Model Table_ name using the following rules:

*   **Collection** \- The collection name, by default, is the English plural of the Model name. For example, for a model named _"User"_, the collection will be _"Users"_ by default
*   **Table** \- The table name, by default, is the English plural of the Model name, in lower case. For example, for a model named _"User"_, the table will be _"users"_ by default

> It is highly recommended to follow the [Eloquent Model Conventions](https://laravel.com/docs/8.x/eloquent#eloquent-model-conventions) when creating models and tables

  

However, you can change the Collection and Table names if necessary (for example, if you are not creating a Model with an English name).

> It is recommended to always use English when creating your models, fields, and relationships. If you choose to create a model that doesn't have an English name, be sure to enable the **Inline Routes** mode on [Project Settings](https://vemto.app/docs/1.x/projects#general-settings), or manually edit the _routes resources_, as you can see here on [Laravel Documentation](https://laravel.com/docs/8.x/controllers#restful-localizing-resource-uris).

The default _Vemto_ nomenclature for Models follows all Laravel nomenclature standards. Vemto also detects when you are using non-standard nomenclature and correctly generates the code with the recommended _Laravel_ practices for these cases (except for the routes, that need to be changed to _Inline mode_).

[Updating](https://vemto.app/docs/1.x/models#updating)
------------------------------------------------------

To update an entity, just fire a _"fast click"_ on it to open the _Entity Options_ panel (you can use a "click + drag" to move the Entity through the Schema Editor area)

  

![image](https://user-images.githubusercontent.com/11933789/102497754-ccf6f080-4057-11eb-882e-36b42afa7d3f.png)

To see how to add fields to the Model or Table, please check the [Fields documentation](https://vemto.app/docs/1.x/fields).

[Pivot Tables](https://vemto.app/docs/1.x/models#pivot-tables)
--------------------------------------------------------------

Please check the [Relationships Instructions for Pivot Tables](https://vemto.app/docs/1.x/relationships#pivot-table)