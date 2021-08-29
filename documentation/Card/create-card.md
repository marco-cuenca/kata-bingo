## Registrar serie

Creará una serie para una sucursal.

### Definition

| Method | Path       | Must be authenticated? |
| ------ | ---------- | ---------------------- |
| POST   | /api/cards | not                    |

### Payload variables

| Name    | Type   | Request  | Description        |
| ------- | ------ | -------- | ------------------ |
| gamer   | string | required | nombre del jugador |
| game_id | number | required | id del juego       |

### Payload

```
{
    "gamer": "Marco Antonio Cuenca Dominguez",
    "game_id": 1
}
```

### Error (status 500)

```
{
    "success": false,
    "message": "Game not found"
}
```

```
{
    "success": false,
    "message": "The game has already started"
}
```

### Error (status 422)

```
{
    "success": false,
    "message": {
        "gamer": [
            "The gamer field is required."
        ],
        "game_id": [
            "The game id field is required."
        ]
    }
}
```
