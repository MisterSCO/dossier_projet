import time
import pymysql.cursors
import geojson
import json
import pyproj
from shapely.geometry import Point
from shapely.ops import transform


""" start = time.time() """

# Connexion a la base de donnée
connection = pymysql.connect(host='srv.ibloo.fr',
                             user='bdesmare',
                             password='LeB,m2e',
                             db='CommunesFTTH',
                             charset='utf8mb4',
                             cursorclass=pymysql.cursors.DictCursor)

print("connect successful!!")

# Ouverture et lecture du json de test
with open('testMap.json') as json_data:
    data_read = json.load(json_data)
    json_data.close()

try:
    with connection.cursor() as cursor:
        # Requete SQL
        sql = "SELECT CoordonneeImmeubleX, CoordonneeImmeubleY, NumeroVoieImmeuble, ComplementNumeroVoieImmeuble,TypeVoieImmeuble, NomVoieImmeuble, IdentifiantImmeuble, BatimentImmeuble, CodeInseeImmeuble, CodeAdresseImmeuble, TypeProjectionGeographique FROM `IPE_EURE` WHERE CodeInseeImmeuble =" + \
            data_read['citycode']

        # Exécutez la requête (Execute Query).
        cursor.execute(sql)

        # Lecture des coordonnées dans le json de teste
        x1, y1 = data_read['x'], data_read['y']

        # Rayon de recherche en mètres
        radius = 100
        # Initialisation d'un tableau vide
        lstbats1 = []


        center = Point(float(x1), float(y1))
        circle_poly = center.buffer(radius)

        # Réalisation du cercle
        print(geojson.dumps(circle_poly))

        # Type de projection à convertir (ici epsg:2154 = RGF93/Lambert-93)
        inProj = pyproj.Proj(init='epsg:2154')
        # Type de projection une fois convertie (epsg:4326 = WGS84 c'est à dire en longitude lattitude)
        outProj = pyproj.Proj(init='epsg:4326')


    for bat in cursor:
        # Récupération de toutes les coordonnées reçu via la requete SQL et les convertirs en points
        x_bdd, y_bdd = bat['CoordonneeImmeubleX'], bat['CoordonneeImmeubleY']
        point = Point(x_bdd, y_bdd)

        # Si les coordonnées sont à l'intèrieur du cercle alors je les concerve et les convertis en WGS84
        if circle_poly.contains(point) == True:
            x2, y2 = pyproj.transform(inProj, outProj, x_bdd, y_bdd)
            pointgeo = Point((x2, y2))

            adr = str(bat['NumeroVoieImmeuble']) + bat['ComplementNumeroVoieImmeuble']+" "+bat['TypeVoieImmeuble']+" "+bat['NomVoieImmeuble']

            # Remplir le tableau des infos souhaité  et l'intégré dans un objet FeatureCollection
            lstbats1.append(geojson.Feature(geometry=pointgeo, properties={
                "CoordImmeuble": bat['IdentifiantImmeuble'], "Batiment": bat['BatimentImmeuble'], "INSEE": bat['CodeInseeImmeuble'], "RefHexaCle": bat['CodeAdresseImmeuble'], "Adresse": adr}))
            
    lstb3 = geojson.FeatureCollection(lstbats1)

    # Enregistrement de l'objet dans un fichier geojson pour le teste (Sur le serveur de développement, la fonction retourne le geojson mais ne l'enregistre pas dans un fichier)
    with open('map.geojson', 'w') as outfile:
        geojson.dump(lstb3, outfile)
except:
    print("error")

finally:
    # Fermeture de la connexion a la base de donnée (Close connection).
    connection.close()

""" end = time.time()
elapsed = end - start

print(f'Temps d\'exécution : {elapsed:1000}ms') """
