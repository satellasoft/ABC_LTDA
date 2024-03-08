# ABC LTDA Store

## Endpoins and documentation

All endspoint with documentation params is be here "**docs\Insomnia_2024-03-08.json**".

- Get Sales: **http://localhost:8000/api/sales/list?per_page=10&page=1**
- Get Sales By ID: **http://localhost:8000/api/sales/{id}**
- Store Sales: **http://localhost:8000/api/sales/**
- Add item to exists Sales: **http://localhost:8000/api/sales/{sales_id}/add**
- Cancel Sales: **http://localhost:8000/api/sales/{sales_id}/cancel**

- Get products: **http://localhost:8000/api/product/list?per_page=1&page=1**

### Store and add item body params

```
[
    {
        "product_id": 1,
        "amount": 1
    },
    {
        "product_id": 2,
        "amount": 2
    }
]
```

## Run unit test and features

To execute test, just run cli command bellow.

```
php artisan test
```

## Swagger Documentation

**Endpoint**: api/documentation

To generate doc, run the command bellow on CLI.

```
php artisan l5-swagger:generate
```