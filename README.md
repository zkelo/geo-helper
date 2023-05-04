# GEO helper
Simple class that helps you to work with coordinates.

## Install
```bash
composer require zkelo/geo-helper
```

## Usage
```php
use zkelo\helpers\Geo;

$pointA = [47.208734, 38.936660];
$pointB = [47.222097, 39.720340];

$distance = Geo::distance($pointA[0], $pointA[1], $pointB[0], $pointB[1]);
echo $distance; //
```

By default helper uses [Vincenty formula](https://en.wikipedia.org/wiki/Vincenty%27s_formulae) to calculate distance, but you can change it to [Haversine formula](https://en.wikipedia.org/wiki/Haversine_formula) by passing correspond constant to last parameter.

```php
$distance = Geo::distance($pointA[0], $pointA[1], $pointB[0], $pointB[1], Geo::DISTANCE_FORMULA_HAVERSINE);
echo $distance; //
```

## Reference
All code of this repo taken from this [Stack Overflow answer](https://stackoverflow.com/a/10054282/4933769).
