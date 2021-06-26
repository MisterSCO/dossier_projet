
import geojson
import shapely
from shapely.geometry.point import Point

center = Point(2.607778310775757, 48.605133056640625)          # Null Island
circle = center.buffer(1.0).area  # Degrees Radius
print(geojson.dumps(shapely.geometry.mapping(circle)))
