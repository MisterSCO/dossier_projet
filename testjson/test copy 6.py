from functools import partial

import time
import pymysql.cursors
import geojson
import json
import pyproj
from shapely.geometry import Point
from shapely.ops import transform


start = time.time()

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

try:
    with connection.cursor() as cursor:
        # SQL
        sql = "SELECT * FROM `IPE_EURE` WHERE CodeInseeImmeuble =" + \
            data_read['citycode']

        # Exécutez la requête (Execute Query).
        cursor.execute(sql)
        for bat in cursor:
            if bat['TypeProjectionGeographique'] == 'RGF93':
        
                inProj = pyproj.Proj(init='epsg:2154')
                outProj = pyproj.Proj(init='epsg:4326')

                x1, y1 = data_read['x'], data_read['y']
                x_json, y_json = pyproj.transform(inProj, outProj, x1, y1)
                print(x_json, y_json)

                """ print(x1, y1) """

                lon, lat = x1, y1
                radius = 100  # en m


                local_azimuthal_projection = "+proj=aeqd +R=6371000 +units=m +x_0={} +y_0={}".format(
                    lat, lon
                )
                wgs84_to_aeqd = partial(
                    pyproj.transform,
                    pyproj.Proj("+proj=lcc +lat_1=49 +lat_2=44 +lat_0=46.5 +lon_0=3 +x_0=700000 +y_0=6600000 +ellps=GRS80 +towgs84=0,0,0,0,0,0,0 +units=m +no_defs "),
                    pyproj.Proj(local_azimuthal_projection),
                )
                aeqd_to_wgs84 = partial(
                    pyproj.transform,
                    pyproj.Proj(local_azimuthal_projection),
                    pyproj.Proj("+proj=lcc +lat_1=49 +lat_2=44 +lat_0=46.5 +lon_0=3 +x_0=700000 +y_0=6600000 +ellps=GRS80 +towgs84=0,0,0,0,0,0,0 +units=m +no_defs "),
                )

                center = Point(float(lon), float(lat))
                point_transformed = transform(wgs84_to_aeqd, center)
                buffer = point_transformed.buffer(radius)

                # Get the polygon with lat lon coordinates
                circle_poly = transform(aeqd_to_wgs84, buffer)
                print(geojson.dumps(circle_poly))

                lstbats1 = []
                inProj = pyproj.Proj(init='epsg:2154')
                outProj = pyproj.Proj(init='epsg:4326')


            for bat in cursor:
                x_bdd, y_bdd = bat['CoordonneeImmeubleX'], bat['CoordonneeImmeubleY']
                point = Point(x_bdd, y_bdd)

                if circle_poly.contains(point) == True:
                    x2, y2 = pyproj.transform(inProj, outProj, x_bdd, y_bdd)
                    pointgeo = Point((x2, y2))
                    adr = str(bat['NumeroVoieImmeuble']) + bat['ComplementNumeroVoieImmeuble']+" "+bat['TypeVoieImmeuble']+" "+bat['NomVoieImmeuble']


                    lstbats1.append(geojson.Feature(geometry=pointgeo, properties={
                        "CoordImmeuble": bat['IdentifiantImmeuble'], "Batiment": bat['BatimentImmeuble'], "INSEE": bat['CodeInseeImmeuble'], "RefHexaCle": bat['CodeAdresseImmeuble'], "Adresse": adr}))
                    
            lstb3 = geojson.FeatureCollection(lstbats1)
            with open('map copy.geojson', 'w') as outfile:
                geojson.dump(lstb3, outfile)
except:
    print("Il n'y a pas de point dans le cercle")

finally:
    # Closez la connexion (Close connection).
    connection.close()

end = time.time()
elapsed = end - start

print(f'Temps d\'exécution : {elapsed:1000}ms')
