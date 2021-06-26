def GetBatsByCoordGeo(marche, coord):

    req2 = "select CoordonneeImmeubleX, CoordonneeImmeubleY, NumeroVoieImmeuble, ComplementNumeroVoieImmeuble,TypeVoieImmeuble, NomVoieImmeuble, IdentifiantImmeuble, BatimentImmeuble, CodeInseeImmeuble, CodeAdresseImmeuble, TypeProjectionGeographique from IPE_" + \
        marche+" where CodeInseeImmeuble = '"+coord['citycode']+"';"

    connection = getSQLResAll(req2)

    try:
        x1, y1 = coord['x'], coord['y']
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
                adr = str(bat[2]) + bat[3]+" "+bat[4]+" "+bat[5]

                lstbats1.append(geojson.Feature(geometry=pointgeo, properties={
                    "CoordImmeuble": bat[6], "Batiment": bat[7], "INSEE": bat[8], "RefHexaCle": bat[9], "Adresse": adr}))

        lstb3 = geojson.FeatureCollection(lstbats1)
        #print(geojson.dumps(lstb3))

    except:
        print("erreur")
        lstb3 = {"type": "FeatureCollection", "features": []}

    return lstb3
