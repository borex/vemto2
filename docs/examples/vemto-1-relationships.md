Relationships
=============

***

Relationships can be added from the **Entity Options** panel (you can open this panel by clicking on the Entity).

  

![Schema](https://user-images.githubusercontent.com/11933789/102540939-896ba900-408e-11eb-9156-673063997419.png)

> _Vemto_ will automatically generate the **Foreign Keys**, **Pivot Tables**, and the **Inverse Relationship** for created relationships. It is not necessary to create this kind of stuff manually (but you can do it if you want).

*   [\# Relationships](https://vemto.app/docs/1.x/relationships#-relationships)
*   [Creating](https://vemto.app/docs/1.x/relationships#creating)
*   [Belongs To](https://vemto.app/docs/1.x/relationships#belongs-to)
*   [Has Many and Has One](https://vemto.app/docs/1.x/relationships#has-many-and-has-one)
*   [Belongs To Many](https://vemto.app/docs/1.x/relationships#belongs-to-many)
    *   [Pivot Table](https://vemto.app/docs/1.x/relationships#pivot-table)

[Creating](https://vemto.app/docs/1.x/relationships#creating)
-------------------------------------------------------------

To add a new relationship, you can click on the **Add Relationship** button under the **Entity Options**. Then, just select the _relationship type_ and the _related model_ to show the type-specific relationship options.

  

![image](https://user-images.githubusercontent.com/11933789/102539690-c8006400-408c-11eb-8fda-8dcc49dbae22.png)

[Belongs To](https://vemto.app/docs/1.x/relationships#belongs-to)
-----------------------------------------------------------------

A [Belongs To](https://laravel.com/docs/8.x/eloquent-relationships#one-to-many-inverse) relationship has the following options:

*   **Relationship Name** \- By default, is the related model name in lower case
*   **Foreign Key Name** \- _Vemto_ will suggest the _foreign key_ name following the Laravel standard (but you can change it if you want). If a field with this name exists in the local model, _Vemto_ will use it. Otherwise, the field/foreign will be automatically added to the local model.

  

![image](https://user-images.githubusercontent.com/11933789/102539977-29c0ce00-408d-11eb-9737-f3df5f236675.png)

> After saving a **"Belongs To"** relationship, an inverse **"Has Many"** relationship will be automatically added to the _related model_.

[Has Many and Has One](https://vemto.app/docs/1.x/relationships#has-many-and-has-one)
-------------------------------------------------------------------------------------

A [Has Many](https://laravel.com/docs/8.x/eloquent-relationships#one-to-many) or [Has One](https://laravel.com/docs/8.x/eloquent-relationships#one-to-many) relationship has the following options:

*   **Relationship Name** \- By default, is the related collection name in lower case
*   **Foreign Key Name** \- _Vemto_ will suggest the _foreign key_ name following the Laravel standard (but you can change it if you want). If a field with this name exists in the related model, _Vemto_ will use it. Otherwise, the field/foreign will be automatically added to the related model.

  

![image](https://user-images.githubusercontent.com/11933789/102542667-e36d6e00-4090-11eb-8c68-c8b85f3e66ff.png)

> After saving a **"Has Many"** or **"Has One"** relationship, an inverse **"Belongs To"** relationship will be automatically added to the _related model_.

[Belongs To Many](https://vemto.app/docs/1.x/relationships#belongs-to-many)
---------------------------------------------------------------------------

A [Belongs To Many](https://laravel.com/docs/8.x/eloquent-relationships#many-to-many) relationship has the following options:

*   **Relationship Name** \- By default, is the related collection name in lower case
*   **Pivot Table Name** \- Follows the default [Laravel Convention for pivot tables](https://laravel.com/docs/8.x/eloquent-relationships#many-to-many-table-structure). If you decide to don't follow the standard convention, _Vemto_ automatically sets the correct configuration inside the Model relationships (but it is always recommended to use the standard names). The pivot table will be created if it is not existing in the current schema
*   **Local Model Key Name** \- The FK name for the local model on the pivot table
*   **Joined Model Key Name** \- The FK name for the joined model on the pivot table

> _Vemto_ will automatically suggest _foreign names_ based on Laravel standards. If you are using a custom pivot table that doesn't follow the standards, it will be necessary to change the foreign names when creating the relationship

  

![image](https://user-images.githubusercontent.com/11933789/102544936-53312800-4094-11eb-93b6-fe7678e31812.png)

> After saving a **Belongs To Many** relationship, an inverse **Belongs To Many** relationship will be automatically added to the _related model_, and a **Pivot Table**, if necessary.

### Pivot Table

By default, _Vemto_ automatically generates _Pivot Tables_ when adding a _Belongs To Many_ relationship. So, it is highly recommended to let _Vemto_ take care of it.

  
But, if you want to add these pivot tables manually, please be sure to follow the [Laravel Many to Many Relationships conventions](https://laravel.com/docs/8.x/eloquent-relationships#many-to-many-table-structure) to make sure these tables work well with the _Eloquent ORM_.

  

![Pivot Table](https://user-images.githubusercontent.com/11933789/102630209-05b3ca00-412b-11eb-9e02-90ed80fb61e0.png)