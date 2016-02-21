# Example project for the yii-yin module 

Example project for [yii-yin](https://github.com/dimvic/yii-yin).

## Installation

```
git clone https://github.com/dimvic/yii-yin-example.git
cd yii-yin-example
git submodule init
git submodule update
composer install
protected/yiic migrate
```

## Sample queries

### GET
```
curl -XGET 'http://v/yii-yin-example/api/books/1'
```

### POST
```
curl -XPOST 'http://v/yii-yin-example/api/books' -d '{
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
curl -XPOST 'http://v/yii-yin-example/api/books' -d '{
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
curl -XPATCH 'http://v/yii-yin-example/api/books/2' -d '{
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
