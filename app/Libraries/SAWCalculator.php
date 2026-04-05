<?php

namespace App\Libraries;

class SAWCalculator
{
    /**
     * Normalize values based on criteria type (benefit or cost)
     * 
     * @param array  $values List of values for a single criteria
     * @param string $type   'benefit' or 'cost'
     * @return array Normalized values
     */
    public function normalize(array $values, string $type): array
    {
        if (empty($values)) {
            return [];
        }

        if ($type === 'benefit') {
            $max = max($values);
            return array_map(fn($v) => $v / $max, $values);
        }

        if ($type === 'cost') {
            $min = min($values);
            return array_map(fn($v) => $min / $v, $values);
        }

        return $values;
    }
}
