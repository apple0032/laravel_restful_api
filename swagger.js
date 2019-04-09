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
                                    "id" : "3 //etc...."
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
            "parameters": [
                # {
                #     "required": false,
                #     "description": "",
                #     "type": "string",
                #     "name": "about",
                #     "in": "formData"
                # }
            ],
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
        }
    },
},
    "schemes": [
    "https",
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
      },
    ],
    "basePath": "/index.php",
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