from functools import partial

import pymysql.cursors
import geojson
import json
import pyproj
from shapely import geometry
from shapely.geometry import Point
from shapely.ops import transform

with open('testMap.json') as json_data:
    data_read = json.load(json_data)
    json_data.close()




inProj = pyproj.Proj(init='epsg:2154')
outProj = pyproj.Proj(init='epsg:4326')

x_json, y_json = data_read['x'], data_read['y']
x1, y1 = pyproj.transform(inProj, outProj, x_json, y_json)

print(x1, y1)

lon, lat = x1, y1
radius = 500  # en m


local_azimuthal_projection = "+proj=aeqd +R=6371000 +units=m +lat_0={} +lon_0={}".format(
    lat, lon
)
wgs84_to_aeqd = partial(
    pyproj.transform,
    pyproj.Proj("+proj=longlat +datum=WGS84 +no_defs"),
    pyproj.Proj(local_azimuthal_projection),
)
aeqd_to_wgs84 = partial(
    pyproj.transform,
    pyproj.Proj(local_azimuthal_projection),
    pyproj.Proj("+proj=longlat +datum=WGS84 +no_defs"),
)

center = Point(float(lon), float(lat))
point_transformed = transform(wgs84_to_aeqd, center)
buffer = point_transformed.buffer(radius)
# Get the polygon with lat lon coordinates
circle_poly = transform(aeqd_to_wgs84, buffer)

print(geojson.dumps(circle_poly))

connection = pymysql.connect(host='srv.ibloo.fr',
                             user='bdesmare',
                             password='LeB,m2e',
                             db='CommunesFTTH',
                             charset='utf8mb4',
                             cursorclass=pymysql.cursors.DictCursor)

print("connect successful!!")

try:
    

    with connection.cursor() as cursor:

        
        # SQL
        sql = "SELECT * FROM `IPE_EURE` WHERE CodeInseeImmeuble =" + data_read['citycode']

        # Exécutez la requête (Execute Query).
        cursor.execute(sql)

        print("cursor.description: ", cursor.description)

        print()

        inProj = pyproj.Proj(init='epsg:2154')
        outProj = pyproj.Proj(init='epsg:4326')


        for row in cursor:
            x_bdd, y_bdd = row['CoordonneeImmeubleX'], row['CoordonneeImmeubleY']
            x2, y2 = pyproj.transform(inProj, outProj, x_bdd, y_bdd)
            point = Point(x2, y2)

            if circle_poly.contains(point) == True:
                print(x2, y2)

            

finally:
    # Closez la connexion (Close connection).
    connection.close()


def GetBatsByTypeLibelleVoie(cinsee, tvoie, lvoie):

    lstbats1 = []
    inProj = Proj(init='epsg:2154')
    outProj = Proj(init='epsg:4326')

    #    oi = getSQLResOne('select OI from Communes where Code_INSEE='+cinsee)
    marche = getSQLResOne(
        'select MARCHE from Communes where Code_INSEE='+cinsee)

    sqlrequete2 = "SELECT IdentifiantImmeuble, CodeAdresseImmeuble, BatimentImmeuble, EtatImmeuble, ReferencePM, CoordonneeImmeubleX, CoordonneeImmeubleY, TypeProjectionGeographique, NumeroVoieImmeuble, ComplementNumeroVoieImmeuble, TypeVoieImmeuble, NomVoieImmeuble  FROM IPE_" + \
        marche+" where TypeVoieImmeuble='"+tvoie + "' AND NomVoieImmeuble='"+lvoie+"'"
    lstb = getSQLResAll(sqlrequete2)  # type: List[Any]

    #    print("liste batiments sql :"+str(lstb))

    for bat in lstb:

        x1, y1 = bat[5], bat[6]
        x2, y2 = transform(inProj, outProj, x1, y1)
        #    print(x2,y2)

        pointgeo = Point((x2, y2))
        #    print(str(pointgeo))
        adr = bat[8]+bat[9]+" "+bat[10]+" "+bat[11]

        lstbats1.append(Feature(geometry=pointgeo, properties={
                        "CoordImmeuble": bat[0], "Batiment": bat[2], "INSEE": cinsee, "RefHexaCle": bat[1], "Adresse": adr}))

    lstb3 = FeatureCollection(lstbats1)

    #    print(str(lstcomm2))

    return lstb3
