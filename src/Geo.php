<?php

namespace zkelo\helpers;

/**
 * Helper class to work with GEO coords
 *
 * @version 1.0.0
 * @see https://stackoverflow.com/a/10054282/4933769 Reference
 */
class Geo
{
    /**
     * Middle radius of the Earth _(in meters)_
     */
    const EARTH_RADIUS = 6371000;

    /**
     * Distance calculation formula: Vincenti formula
     *
     * @see https://en.wikipedia.org/wiki/Vincenty%27s_formulae
     */
    const DISTANCE_FORMULA_VINCENTY = 0;

    /**
     * Distance calculation formula: Haversine formula
     *
     * @see https://en.wikipedia.org/wiki/Haversine_formula
     */
    const DISTANCE_FORMULA_HAVERSINE = 1;

    /**
     * Calculates distance between two points
     *
     * @param float $latA First point latitude _(in degrees)_
     * @param float $lonA First point longitude _(in degrees)_
     * @param float $latB Second point latitude _(in degrees)_
     * @param float $lonB Second point longitude _(in degrees)_
     * @param integer $formula Calculation formula _(one of constants that starts with `DISTANCE_FORMULA`; Vincenti formula by default)_
     * @return float Distance between two points _(in meters)_
     */
    public static function distance(float $latA, float $lonA, float $latB, float $lonB, int $formula = self::DISTANCE_FORMULA_VINCENTY): float
    {
        $latA = deg2rad($latA);
        $lonA = deg2rad($lonA);

        $latB = deg2rad($latB);
        $lonB = deg2rad($lonB);

        $lonDelta = $lonB - $lonA;

        if ($formula == static::DISTANCE_FORMULA_VINCENTY) {
            $a = pow(cos($latB) * sin($lonDelta), 2) + pow(cos($latA) * sin($latB) - sin($latA) * cos($latB) * cos($lonDelta), 2);
            $b = sin($latA) * sin($latB) + cos($latA) * cos($latB) * cos($lonDelta);

            $angle = atan2(sqrt($a), $b);
        } else {
            $latDelta = $latB - $latB;

            $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latA) * cos($latB) * pow(sin($lonDelta / 2), 2)));
        }

        return $angle * static::EARTH_RADIUS;
    }
}
