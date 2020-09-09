# System

## get companies list 
##### https://www.figma.com/file/iic430t96HnrmcKKitso97/%D0%90%D0%B2%D1%82%D0%BE%D0%BC%D0%BE%D0%B9%D0%BA%D0%B0-%D0%BE%D0%BD%D0%BB%D0%B0%D0%B9%D0%BD?node-id=5%3A1172
````
/api/V1/organization/search
POST
{
"time" : "2020-08-12 00:47:57"
}
````
## get companies boxes
##### https://www.figma.com/file/iic430t96HnrmcKKitso97/%D0%90%D0%B2%D1%82%D0%BE%D0%BC%D0%BE%D0%B9%D0%BA%D0%B0-%D0%BE%D0%BD%D0%BB%D0%B0%D0%B9%D0%BD?node-id=14%3A10
````
/api/V1/organization/info
POST
{
    "time" : "2020-08-12 00:47:57",
    "id" : 1
}
````

## Add car
````
/api/V1/car/add
POST
{
    "name" : "JAC",
    "license" : "070VMV02"
}
````

## Get my cars
````
/api/V1/car/get
GET
````


## Add Organization
````
/api/V1/organization/add
POST
{
    "name" : "Алатау",
    "longitude" : "123.123.123",
    "latitude" : "127.0.0.1",
    "boxes_count" : 8,
    "services" : [
        {
            "name" : "Мойка членом",
            "price" : 50000
        }
    ]
}
````
## Get Organization Services
````
/api/V1/organization/services
POST
{
    "id" : 17
}
````

## Make Order   

````
/api/V1/order/make
POST
{
   "box_id" : 58,
   "car_id" : 101,
   "start_date" : "2020-08-11 09:02:57",
   "end_date" : "2020-08-11 11:02:57",
   "services" : [
       {
            "id" : 101,
            "price" : 50000
       }
    ]
}
````


## Get orders (for user and for company)

````
/api/V1/order/get
get
RESPONSE
[
    {
        "order": {
            "id": 101,
            "car_id": 101,
            "box_id": 58,
            "overall_price": 50000,
            "start_date": "2020-08-11 09:02:57",
            "end_date": "2020-08-11 11:02:57",
            "status": "WAITING",
            "is_approved_by_client": 0,
            "deleted_at": null,
            "created_at": "2020-08-13 09:43:56",
            "updated_at": "2020-08-13 09:43:56",
            "organization": "Алатау",
            "box": "Бокс 8",
            "car": "JAC"
        },
        "services": [
            {
                "id": 101,
                "organization_id": 17,
                "name": "Мойка членом",
                "price": 50000,
                "deleted_at": null,
                "created_at": "2020-08-13 06:28:07",
                "updated_at": "2020-08-13 06:28:07"
            }
        ]
    }
]
````

## Ответить на заявку для комании 

````
/api/V1/order/answer
POST
{
   "order_id" : 101,
   "answer" : true || false,
}
````

## Подтвердить факт мойки пользоватем 

````
/api/V1/order/answer
POST
{
   "order_id" : 101,
   "answer" : true || false,
}
````


## Изменить машину 

````
/api/V1/car/edit
POST
{
   "car_id" : 101,
   "name" : "УАЗ ПАТРИОТ"
}
````

## Изменить пароль 

````
/api/V1/password/edit
POST
{
   "old_password" : "112233",
   "new_password" : "password",
}
````

