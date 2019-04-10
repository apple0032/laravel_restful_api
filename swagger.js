{
  "paths": {
    "/station": {
      "get": {
        "responses": {
          "200": {
            "examples": {
              "application/json": {
                "result": {
                  "status": "success",
                  "type": "Get all stations",
                  "total": 239,
                  "station": [
                    {
                      "id": 2,
                      "location_en": "Fu Shing Building",
                      "location_tc": "富盛大廈",
                      "lat": "22.4420719146729",
                      "lng": "114.027671813965",
                      "type": "3",
                      "area_id": "3",
                      "district_id": "13",
                      "address_en": "Fu Shing Building Carpark, 1/F\n9 Sai Ching Street, Yuen Long, NT",
                      "address_tc": "新界元朗西菁街9號富盛大廈停車場一樓 ",
                      "provider": "CLP",
                      "provider_user_id": null,
                      "parkingNo": "33-35",
                      "img": "/EV/PublishingImages/common/map/map_thumb/Entrance_Fu%20Shing%20Building.jpg",
                      "is_active": 1,
                      "is_delete": 0,
                      "created_at": "2019-04-08 04:14:57",
                      "updated_at": "2019-04-08 04:14:57",
                      "type_name": "SemiQuick",
                      "area_name_en": "New Territories",
                      "area_name_tc": "新界",
                      "district_name": "Yuen Long",
                      "district_name_tc": "元朗"
                    },
                    {
                      "id": "3 //etc...."
                    }
                  ]
                }
              }
            },
            "description": "Success output"
          },
          "500": {
            "examples": {
              "application/json": {
                "result": "error",
                "status": "404",
                "error_message": "Error has occurred!"
              }
            },
            "description": "Default Error Exception"
          }
        },
        "produces": [
          "application/json",
          "application/xml"
        ],
        "consumes": [
          "application/x-www-form-urlencoded"
        ],
        "summary": "Get all stations from system database",
        "tags": [
          "station"
        ]
      },
      "post": {
        "responses": {
          "200": {
            "examples": {
              "application/json": {
                "result": {
                  "status": "success",
                  "type": "New station created",
                  "station": {
                    "location_en": "eng",
                    "location_tc": "中文",
                    "lat": "22.4420719146729",
                    "lng": "114.027671813965",
                    "type": "1,2",
                    "district_id": "15",
                    "address_en": "en",
                    "address_tc": "中文",
                    "area_id": "3",
                    "provider": null,
                    "provider_user_id": null,
                    "parkingNo": null,
                    "img": null,
                    "is_active": 1,
                    "is_delete": 0,
                    "updated_at": "2019-04-09 10:04:47",
                    "created_at": "2019-04-09 10:04:47",
                    "id": 240
                  }
                }
              }
            },
            "description": "Success output"
          },
          "202": {
            "examples": {
              "application/json": {
                "result": "error",
                "status": "200",
                "error_message": {
                  "location_en": [
                    "The location en field is required."
                  ],
                  "location_tc": [
                    "The location tc field is required."
                  ],
                  "lat": [
                    "The lat field is required."
                  ],
                  "lng": [
                    "The lng field is required."
                  ],
                  "type": [
                    "The type field is required."
                  ],
                  "district_id": [
                    "The district id field is required."
                  ],
                  "address_en": [
                    "The address en field is required."
                  ],
                  "address_tc": [
                    "The address tc field is required."
                  ]
                }
              }
            },
            "description": "If required field not found."
          },
          "404": {
            "examples": {
              "application/json": {
                "result": "error",
                "status": "404",
                "error_message": "Error has occurred!"
              }
            },
            "description": "Default Error Exception"
          }
        },
        "parameters": [
          {
            "required": true,
            "description": "Name in english",
            "type": "string",
            "name": "location_en",
            "in": "formData"
          },
          {
            "required": true,
            "description": "Name in chinese",
            "type": "string",
            "name": "location_tc",
            "in": "formData"
          },
          {
            "required": true,
            "description": "Station latitude",
            "type": "string",
            "name": "lat",
            "in": "formData"
          },
          {
            "required": true,
            "description": "Station longitude",
            "type": "string",
            "name": "lng",
            "in": "formData"
          },
          {
            "required": true,
            "description": "type",
            "type": "string",
            "name": "type",
            "in": "formData"
          },
          {
            "required": true,
            "description": "district id",
            "type": "integer",
            "name": "district_id",
            "in": "formData"
          },
          {
            "required": true,
            "description": "Address in english",
            "type": "string",
            "name": "address_en",
            "in": "formData"
          },
          {
            "required": true,
            "description": "Address in chinese",
            "type": "string",
            "name": "address_tc",
            "in": "formData"
          },
          {
            "required": false,
            "description": "area id",
            "type": "integer",
            "name": "area_id",
            "in": "formData"
          },
          {
            "required": false,
            "description": "Parking number",
            "type": "string",
            "name": "parkingNo",
            "in": "formData"
          }
        ],
        "produces": [
          "application/json",
          "application/xml"
        ],
        "consumes": [
          "application/x-www-form-urlencoded"
        ],
        "summary": "Create new station from form data",
        "tags": [
          "station"
        ]
      }
    },
    "/station/{id}": {
      "get": {
        "responses": {
          "200": {
            "examples": {
              "application/json": {
                "result": {
                  "status": "success",
                  "type": "Get specific station by id",
                  "station": {
                    "id": 23,
                    "location_en": "Langham Place",
                    "location_tc": "朗豪坊",
                    "lat": "22.3174228668213",
                    "lng": "114.168731689453",
                    "type": "3",
                    "area_id": "2",
                    "district_id": "5",
                    "address_en": "Langham Place Carpark, B4/F, \n8 Argyle Street, Mongkok, Kln",
                    "address_tc": "九龍旺角亞皆老街8號朗豪坊停車場地庫四樓",
                    "provider": "CLP",
                    "provider_user_id": null,
                    "parkingNo": "22, 41, 64",
                    "img": "/EV/PublishingImages/common/map/map_thumb/Entrance_Langham%20Place.jpg",
                    "is_active": 1,
                    "is_delete": 0,
                    "created_at": "2019-04-08 04:14:57",
                    "updated_at": "2019-04-08 04:14:57",
                    "type_name": "SemiQuick",
                    "area_name_en": "Kowloon",
                    "area_name_tc": "九龍",
                    "district_name_en": "Yau Tsim Mong",
                    "district_name_tc": "油尖旺",
                    "username": null
                  }
                }
              }
            },
            "description": "Success output"
          },
          "500": {
            "examples": {
              "application/json": {
                "result": "error",
                "status": "404",
                "error_message": "Error has occurred!"
              }
            },
            "description": "Default Error Exception"
          }
        },
        "parameters": [
          {
            "required": true,
            "description": "Station ID",
            "type": "integer",
            "name": "id",
            "in": "path"
          }
        ],
        "produces": [
          "application/json",
          "application/xml"
        ],
        "consumes": [
          "application/x-www-form-urlencoded"
        ],
        "summary": "Get specific station by id",
        "tags": [
          "station"
        ]
      },
      "put": {
        "responses": {
          "200": {
            "examples": {
              "application/json": {
                "result": {
                  "status": "success",
                  "type": "Update station",
                  "station": {
                    "id": 23,
                    "location_en": "Langham Place",
                    "location_tc": "朗豪坊",
                    "lat": "22.3174228668213",
                    "lng": "114.168731689453",
                    "type": "3",
                    "area_id": "2",
                    "district_id": "5",
                    "address_en": "Langham Place Carpark, B4/F, \n8 Argyle Street, Mongkok, Kln",
                    "address_tc": "九龍旺角亞皆老街8號朗豪坊停車場地庫四樓",
                    "provider": "CLP",
                    "provider_user_id": null,
                    "parkingNo": "22, 41, 64",
                    "img": "123.png",
                    "is_active": 1,
                    "is_delete": 0,
                    "created_at": "2019-04-08 04:14:57",
                    "updated_at": "2019-04-10 06:47:34"
                  }
                }
              }
            },
            "description": "Success output"
          },
          "500": {
            "examples": {
              "application/json": {
                "result": "error",
                "status": "404",
                "error_message": "Error has occurred!"
              }
            },
            "description": "Default Error Exception"
          }
        },
        "parameters": [
          {
            "required": true,
            "description": "Station ID",
            "type": "integer",
            "name": "id",
            "in": "path"
          },
          {
            "required": false,
            "description": "Name in english",
            "type": "string",
            "name": "location_en",
            "in": "formData"
          },
          {
            "required": false,
            "description": "Name in chinese",
            "type": "string",
            "name": "location_tc",
            "in": "formData"
          },
          {
            "required": false,
            "description": "Station latitude",
            "type": "string",
            "name": "lat",
            "in": "formData"
          },
          {
            "required": false,
            "description": "Station longitude",
            "type": "string",
            "name": "lng",
            "in": "formData"
          },
          {
            "required": false,
            "description": "type",
            "type": "string",
            "name": "type",
            "in": "formData"
          },
          {
            "required": false,
            "description": "district id",
            "type": "integer",
            "name": "district_id",
            "in": "formData"
          },
          {
            "required": false,
            "description": "Address in english",
            "type": "string",
            "name": "address_en",
            "in": "formData"
          },
          {
            "required": false,
            "description": "Address in chinese",
            "type": "string",
            "name": "address_tc",
            "in": "formData"
          },
          {
            "required": false,
            "description": "area id",
            "type": "integer",
            "name": "area_id",
            "in": "formData"
          },
          {
            "required": false,
            "description": "Parking number",
            "type": "string",
            "name": "parkingNo",
            "in": "formData"
          }
        ],
        "produces": [
          "application/json",
          "application/xml"
        ],
        "consumes": [
          "application/x-www-form-urlencoded"
        ],
        "summary": "Update a station details from form data",
        "tags": [
          "station"
        ]
      },
      "delete": {
        "responses": {
          "200": {
            "examples": {
              "application/json": {
                "result": {
                  "status": "success",
                  "type": "Delete station",
                  "station": {
                    "id": 23,
                    "location_en": "Langham Place",
                    "location_tc": "朗豪坊",
                    "lat": "22.3174228668213",
                    "lng": "114.168731689453",
                    "type": "3",
                    "area_id": "2",
                    "district_id": "5",
                    "address_en": "Langham Place Carpark, B4/F, \n8 Argyle Street, Mongkok, Kln",
                    "address_tc": "九龍旺角亞皆老街8號朗豪坊停車場地庫四樓",
                    "provider": "CLP",
                    "provider_user_id": null,
                    "parkingNo": "22, 41, 64",
                    "img": "123.png",
                    "is_active": 1,
                    "is_delete": 0,
                    "created_at": "2019-04-08 04:14:57",
                    "updated_at": "2019-04-10 06:47:34"
                  }
                }
              }
            },
            "description": "Success output"
          },
          "500": {
            "examples": {
              "application/json": {
                "result": "error",
                "status": "404",
                "error_message": "Error has occurred!"
              }
            },
            "description": "Default Error Exception"
          }
        },
        "parameters": [
          {
            "required": true,
            "description": "Station ID",
            "type": "integer",
            "name": "id",
            "in": "path"
          }
        ],
        "produces": [
          "application/json",
          "application/xml"
        ],
        "consumes": [
          "application/x-www-form-urlencoded"
        ],
        "summary": "Delete specific station by id",
        "tags": [
          "station"
        ]
      }
    },
    "/station/search": {
      "post": {
        "responses": {
          "200": {
            "examples": {
              "application/json": {
                "result": {
                  "status": "success",
                  "type": "Search stations by requested criteria",
                  "total": 2,
                  "display": 2,
                  "station": [
                    {
                      "id": 26,
                      "location_en": "Hong Kong Science Park",
                      "location_tc": "香港科技園",
                      "lat": "22.4263610839844",
                      "lng": "114.209915161133",
                      "type": "2",
                      "area_id": "3",
                      "district_id": "16",
                      "address_en": "Hong Kong Science Park Carpark P2, B/F,\n8-10 Science Park West Avenue, Shatin, N.T. ",
                      "address_tc": "新界沙田香港科學園科技大道西8-10號香港科技園二期地庫停車場",
                      "provider": "CLP",
                      "provider_user_id": null,
                      "parkingNo": "D104",
                      "img": "/EV/PublishingImages/common/map/map_thumb/Entrance_HK%20Science%20Park_large.jpg",
                      "is_active": 1,
                      "is_delete": 0,
                      "created_at": "2019-04-08 04:14:57",
                      "updated_at": "2019-04-08 04:14:57",
                      "type_name": "Quick",
                      "area_name_en": "New Territories",
                      "area_name_tc": "新界",
                      "district_name_en": "Shatin",
                      "district_name_tc": "沙田",
                      "username": null
                    },
                    {
                      "id": 19,
                      "location_en": "Hong Kong Science Park",
                      "location_tc": "香港科技園",
                      "lat": "22.4262580871582",
                      "lng": "114.20987701416",
                      "type": "3",
                      "area_id": "3",
                      "district_id": "16",
                      "address_en": "Hong Kong Science Park Carpark P2, B/F,\n8-10 Science Park West Avenue, Shatin, N.T. ",
                      "address_tc": "新界沙田香港科學園科技大道西8-10號香港科技園二期地庫停車場",
                      "provider": "CLP",
                      "provider_user_id": null,
                      "parkingNo": "D042 - D052, D106 - D112",
                      "img": "/EV/PublishingImages/common/map/map_thumb/Entrance_HK%20Science%20Park_large.jpg",
                      "is_active": 1,
                      "is_delete": 0,
                      "created_at": "2019-04-08 04:14:57",
                      "updated_at": "2019-04-08 04:14:57",
                      "type_name": "SemiQuick",
                      "area_name_en": "New Territories",
                      "area_name_tc": "新界",
                      "district_name_en": "Shatin",
                      "district_name_tc": "沙田",
                      "username": null
                    }
                  ]
                }
              }
            },
            "description": "Success output searching name = 'science' "
          },
          "404": {
            "examples": {
              "application/json": {
                "result": "error",
                "status": "404",
                "error_message": "Error has occurred!"
              }
            },
            "description": "Default Error Exception"
          }
        },
        "parameters": [
          {
            "required": false,
            "description": "Name(can be en or tc)",
            "type": "string",
            "name": "name",
            "in": "formData"
          },
          {
            "required": false,
            "description": "type id related to type table",
            "type": "string",
            "name": "type",
            "in": "formData"
          },
          {
            "required": false,
            "description": "area id",
            "type": "integer",
            "name": "area_id",
            "in": "formData"
          },
          {
            "required": false,
            "description": "district id",
            "type": "integer",
            "name": "district_id",
            "in": "formData"
          },
          {
            "required": false,
            "description": "address(can be en or tc)",
            "type": "string",
            "name": "address_en",
            "in": "formData"
          },
          {
            "required": false,
            "description": "Parking number",
            "type": "string",
            "name": "parkingNo",
            "in": "formData"
          },
          {
            "required": false,
            "description": "limit of return result",
            "type": "integer",
            "name": "limit",
            "in": "formData"
          },
          {
            "required": false,
            "description": "offset of return result",
            "type": "integer",
            "name": "offset",
            "in": "formData"
          }
        ],
        "produces": [
          "application/json",
          "application/xml"
        ],
        "consumes": [
          "application/x-www-form-urlencoded"
        ],
        "summary": "Search stations by requested criteria",
        "tags": [
          "station"
        ]
      }
    },
    "/convert": {
      "get": {
        "responses": {
          "200": {
            "examples": {
              "application/json": {
                "result": "success"
              }
            },
            "description": "Success output"
          },
          "500": {
            "examples": {
              "application/json": {
                "result": "error",
                "status": "404",
                "error_message": "Error has occurred!"
              }
            },
            "description": "Default Error Exception"
          }
        },
        "parameters": [],
        "produces": [
          "application/json",
          "application/xml"
        ],
        "consumes": [
          "application/x-www-form-urlencoded"
        ],
        "summary": "Retrieve from XML data source then create table & store data",
        "tags": [
          "config"
        ]
      }
    },
    "/drop": {
      "get": {
        "responses": {
          "200": {
            "examples": {
              "application/json": {
                "result": "success"
              }
            },
            "description": "Success output"
          },
          "500": {
            "examples": {
              "application/json": {
                "result": "error",
                "status": "404",
                "error_message": "Error has occurred!"
              }
            },
            "description": "Default Error Exception"
          }
        },
        "parameters": [],
        "produces": [
          "application/json",
          "application/xml"
        ],
        "consumes": [
          "application/x-www-form-urlencoded"
        ],
        "summary": "Drop all tables in database and clear all data",
        "tags": [
          "config"
        ]
      }
    }
  },
  "schemes": [
    "http"
  ],
  "tags": [
    {
      "description": "Restful API call to manages all stations in system",
      "name": "station"
    },
    {
      "description": "Config API to retrieve data from XML or drop tables",
      "name": "config"
    }
  ],
  "host": "localhost",
  "basePath": "/laravel-restful",
  "info": {
    "license": {
      "url": "http://google.com",
      "name": "KenIp"
    },
    "contact": {
      "email": "kenip0813@gmail.com"
    },
    "termsOfService": "http://swagger.io/terms/",
    "title": "Electric Vehicle Charging Stations Restful API Documentation",
    "version": "1.0.0",
    "description": "This is Electric Vehicle Charging Stations Restful API Documentation written by software developer - Ken",
    "x-logo": {
      "url": "public/images/logo/api.png",
      "altText": "Restful"
    }
  },
  "swagger": "2.0"
}