## Verificar ganador

Verificará si existe ganador.

### Definition

| Method | Path                           | Must be authenticated? |
| ------ | ------------------------------ | ---------------------- |
| POST   | /api/games/check-winner/{ id } | not                    |

### Route variables

| Name | Type   | Description  |
| ---- | ------ | ------------ |
| id   | number | id del juego |

### Payload variables

| Name    | Type   | Request  | Description    |
| ------- | ------ | -------- | -------------- |
| card_id | number | required | id de la carta |

### Payload

```
{
    "card_id": 1
}
```

### Error (status 500)

```
{
    "message": "Game not found"
}
```

```
{
    "message": "Card not found"
}
```

### Result (status 200)

```
{
    "is_winner": true,
    "gamer": "Marco Antonio Cuenca Dominguez"
}
```
