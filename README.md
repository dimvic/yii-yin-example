# Example project for yii-yin

Example project for [yii-yin](https://github.com/dimvic/yii-yin).

Setup in less than a minute, uses sqlite for db, fully functional.
## Installation

```
$ git clone https://github.com/dimvic/yii-yin-example.git
$ cd yii-yin-example
$ curl -sS https://getcomposer.org/installer | php -- --install-dir=. --filename=composer
$ ./composer install
$ protected/yiic migrate
```

## Sample queries

### GET
```
curl -XGET 'http://localhost/yii-yin-example/api/books/1'
```

### POST
```
curl -XPOST 'http://localhost/yii-yin-example/api/books' -d '{
    "data": {
        "type": "books",
        "attributes": {
            "title": "My book",
            "pages": "1"
        }
    }
}'
```

```
curl -XPOST 'http://localhost/yii-yin-example/api/books' -d '{
    "data": {
        "type": "books",
        "attributes": {
            "title": "My book",
            "pages": "1"
        },
        "relationships": {
            "authors": {
                "data": [
                    {
                        "type": "authors",
                        "id": "1"
                    },
                    {
                        "type": "authors",
                        "id": 2
                    }
                ]
            },
            "publisher": {
                "data": {
                    "type": "publishers",
                    "id": "1"
                }
            }
        }
    }
}'
```

### PATCH
```
curl -XPATCH 'http://localhost/yii-yin-example/api/books/2' -d '{
    "data": {
        "type": "books",
        "id": "2",
        "attributes": {
            "title": "My book",
            "pages": 1
        },
        "relationships": {
            "authors": {
                "data": [
                    {
                        "type": "authors",
                        "id": "1"
                    }
                ]
            },
            "publisher": {
                "data": {
                    "type": "publishers",
                    "id": "1"
                }
            }
        }
    }
}'
```

### DELETE

```
curl -XDELETE 'http://localhost/yii-yin-example/api/books/1'
```
