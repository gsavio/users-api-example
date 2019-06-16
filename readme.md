# Simple Users Administration API

A simple API REST for users administration

## References
    
- [Instalation](#installation)
* [Show all users](#show-all-users)
* [Show user](#show-user)
* [Create user](#create-user)
* [Edit user](#edit-user)
* [Delete user](#delete-user)

## Instalation
Run the composer to install laravel and dependencies
```console
$ composer install
```

To generate your key
```console
$ php artisan key:generate
```

And then run the migrations to create the database tables along with the seeds to populate the tables

```console
$ php artisan migrate --seed
```

There is even a docker-compose file. You must have docker and docker-compose installed. And then run the command:
```console
$ docker-compose up -d
```

If you want to use docker, configure the .env file according to `docker-compose` or vice versa.

## Show all users

Return a json list of all users registered

* **URL**

    `
    /users
    `

* **Method**

    `
    GET
    `

* **Header**

    `
    Content-Type: application/x-www-form-urlencoded
    `

* **Data**

    None

* **Success Response**
    * Code: `200`<br />
    Content: `[{"id":1,"name":"John Doe","age":61,"email":"johndoe@example.com","phone":"(99) 99999-9999","city":"Porto Guilherme","state":"CE","created_at":"2019-06-16 02:47:53","updated_at":"2019-06-16 02:47:53"}]`

* **Error Response**
    * Code: `200` <br />
    Content: `{"error":"No registered users"}`
---

## Show user

Return json about a single user


* **URL**

    `
    /users/{id}
    `

* **Method**

    `
    GET
    `

* **Header**

    `
    Content-Type: application/x-www-form-urlencoded
    `
* **Data**

    None

* **Success Response**
    * Code: `200`<br />
    Content: `[{"id":1,"name":"John Doe","age":61,"email":"johndoe@example.com","phone":"(99) 99999-9999","city":"Porto Guilherme","state":"CE","created_at":"2019-06-16 02:47:53","updated_at":"2019-06-16 02:47:53"}]`

* **Error Response**
    * Code: `404` <br />
    Content: `{"error":"User not found"}`
---

## Create user

* **URL**

    `
    /users
    `

* **Method**

    `
    POST
    `

* **Header**

    `
    Content-Type: application/x-www-form-urlencoded
    `

* **Data**

    name `string`<br />
    age `int`<br />
    email `string`<br />
    phone `string`<br />
    city `string`<br />
    state `string`

* **Success Response**
    * Code: `201`<br />
    Content: `{"response": "User {name} created"}`

* **Error Response**
    * Code: `400` <br />
    Content: `{"error": ...}`
---

## Edit user

* **URL**

    `
    /users/{id}
    `

* **Method**

    `
    PUT
    `

* **Header**

    `
    Content-Type: application/x-www-form-urlencoded
    `

* **Data**

    name `string`<br />
    age `int`<br />
    email `string`<br />
    phone `string`<br />
    city `string`<br />
    state `string`

* **Success Response**
    * Code: `201`<br />
    Content: `{"response": "User {name} updated"}`

* **Error Response**
    * Code: `400` <br />
    Content: `{"error": ...}`
---

## Delete user

* **URL**

    `
    /users/{id}
    `

* **Method**

    `
    DELETE
    `

* **Header**

    `
    Content-Type: application/x-www-form-urlencoded
    `

* **Data**

    None

* **Success Response**
    * Code: `201`<br />
    Content: `{"response": "User deleted"}`

* **Error Response**
    * Code: `404` <br />
    Content: `{"error": "User not found"}`