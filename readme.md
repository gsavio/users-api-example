# Simple Users Administration API

A simple API REST for users administration

* URL
```url
/users
```

* Allowed HTTPs requests:
    - PUT: To update a user 
    - POST: To create a user
    - GET: Get all users or specific data of an only user
    - DELETE: To delete a user

* Description Of Usual Server Responses:
    - 200 `OK` - the request was successful.
    - 201 `Created` - the request was successful and a user was created.
    - 400 `Bad Request` - the request could not be understood or was missing required parameters.
    - 404 `Not Found` - resource was not found.
    - 405 `Method Not Allowed` - requested method is not supported for resource.

* Data Params

    To create a user

    Header:
    ```
    Content-type: application/x-www-form-urlencoded
    ```

    Body:
    ```json
        {
            'name' : 'Guilherme',
            'age' : 22,
            'email' : 'guilhermesavio96@gmail.com',
            'phone' : '(99) 99999-9999',
            'city' : 'São Paulo',
            'state' : 'SP'
        }
    ```