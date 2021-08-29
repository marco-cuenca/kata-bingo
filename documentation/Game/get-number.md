## Registrar serie

Creará una serie para una sucursal.

### Definition

| Method | Path                         | Must be authenticated? |
| ------ | ---------------------------- | ---------------------- |
| GET    | /api/games/get-number/{ id } | not                    |

### Route variables

| Name | Type   | Description  |
| ---- | ------ | ------------ |
| id   | number | id del juego |

### Error (status 500)

```
{
    "message": "Game not found"
}
```

```
{
    "message": "Game over"
}
```

### Result (status 200)

```
{
    "id": 2,
    "number_of_plays": 1,
    "last_number_obtained": 12,
    "numbers_left": "[45,42,36,47,59,3,29,62,55,15,26,22,24,41,19,13,38,40,48,33,23,20,31,35,51,75,1,49,61,11,66,64,6,74,50,28,27,54,70,68,44,16,53,5,32,71,25,67,65,63,14,72,30,58,60,73,4,9,39,10,69,37,56,7,2,57,21,43,52,8,46,18,17,34]",
    "created_at": "2021-08-29T05:53:20.000000Z",
    "updated_at": "2021-08-29T05:53:51.000000Z"
}
```
