# projectFinal
 project Dicampus

# Untitled Diagram documentation
## Summary

- [Introduction](#introduction)
- [Database Type](#database-type)
- [Table Structure](#table-structure)
	- [order(i)](#order(i))
	- [listaorderes](#listaorderes)
- [Relationships](#relationships)
- [Database Diagram](#database-Diagram)

## Introduction

## Database type

- **Database system:** MySQL
## Table structure

### order(i)

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | INTEGER | 🔑 PK, not null , unique, autoincrement |  | |
| **nombre** | VARCHAR(255) | not null  |  | |
| **price** | DOUBLE | not null  |  | |
| **size** | DOUBLE | not null  |  | |
| **quantity** | INTEGER | not null  |  | |
| **code** | VARCHAR(255) | not null  |  | |
| **image** | VARCHAR(255) | not null  |  | |
| **nombre_order** | TEXT(65535) | not null  |  | | 


#### Indexes
| Name | Unique | Fields |
|------|--------|--------|
| personajes_index_0 |  | id_personajes |
| producto_index_1 |  |  |
| order(i)_index_2 |  |  |
### listaorderes

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id_order** | INTEGER | 🔑 PK, not null , unique, autoincrement |  | |
| **nombre_order** | TEXT(65535) | not null  | fk_listaorderes_nombre_order_order(i) | |
| **date_order** | DATE | not null  |  | |
| **delivery_order** | INTEGER | not null  |  | | 


## Relationships

- **listaorderes to order(i)**: one_to_one

## Database Diagram

```mermaid
erDiagram
	listaorderes ||--|| order(i) : references

	order(i) {
		INTEGER id
		VARCHAR(255) nombre
		DOUBLE price
		DOUBLE size
		INTEGER quantity
		VARCHAR(255) code
		VARCHAR(255) image
		TEXT(65535) nombre_order
	}

	listaorderes {
		INTEGER id_order
		TEXT(65535) nombre_order
		DATE date_order
		INTEGER delivery_order
	}
```