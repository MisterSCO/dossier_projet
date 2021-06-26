from functools import partial

import pymysql.cursors
import geojson
import json
import pyproj
from shapely.geometry import Point
from shapely.ops import transform


connection = pymysql.connect(host='srv.ibloo.fr',
                             user='bdesmare',
                             password='LeB,m2e',
                             db='CommunesFTTH',
                             charset='utf8mb4',
                             cursorclass=pymysql.cursors.DictCursor)

print("connect successful!!")

with open('testMap.json') as json_data:
    data_read = json.load(json_data)
    json_data.close()

sql = "SELECT * FROM `IPE_EURE` WHERE CodeInseeImmeuble =" + \
    data_read['citycode']
# Exécutez la requête (Execute Query).

    
try:
    with connection.cursor() as cursor:
        cursor.execute(sql)
        x1, y1 = data_read['x'], data_read['y']
        radius = 500  # en m
        lstbats1 = []

        center = Point(float(x1), float(y1))
        circle_poly = center.buffer(radius)

        if connection[0][10] == 'RGF93':
            inProj = pyproj.Proj(init='epsg:2154')
            outProj = pyproj.Proj(init='epsg:4326')

        bat = []
        for bat in connection:
            x_bdd, y_bdd = float(bat[0]), float(bat[1])
            point = Point(x_bdd, y_bdd)

            if circle_poly.contains(point) == True:
                x2, y2 = pyproj.transform(inProj, outProj, x_bdd, y_bdd)
                pointgeo = Point((x2, y2))
                adr = str(bat['NumeroVoieImmeuble']) + bat['ComplementNumeroVoieImmeuble'] +" "+bat['TypeVoieImmeuble']+" "+bat['NomVoieImmeuble']

                lstbats1.append(geojson.Feature(geometry=pointgeo, properties={
                    "CoordImmeuble": bat['IdentifiantImmeuble'], "Batiment": bat['BatimentImmeuble'], "INSEE": bat['CodeInseeImmeuble'], "RefHexaCle": bat['CodeAdresseImmeuble'], "Adresse": adr}))

        lstb3 = geojson.FeatureCollection(lstbats1)
        with open('map copy.geojson', 'w') as outfile:
            geojson.dump(lstb3, outfile)

except:
    print("erreur")
    lstb3 = {"type": "FeatureCollection", "features": []}

