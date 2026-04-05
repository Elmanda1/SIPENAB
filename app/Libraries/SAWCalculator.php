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
            if ($max == 0) return array_fill(0, count($values), 0);
            return array_map(fn($v) => $v / $max, $values);
        }

        if ($type === 'cost') {
            $min = min($values);
            return array_map(fn($v) => $v == 0 ? 0 : $min / $v, $values);
        }

        return $values;
    }

    /**
     * Calculate preference scores for all alternatives
     * 
     * @param array $matrix   Matrix of [alternative_id => [val1, val2, ...]]
     * @param array $criteria List of criteria [['type' => 'benefit', 'weight' => 0.4], ...]
     * @return array Scores [alternative_id => score]
     */
    public function calculateScores(array $matrix, array $criteria): array
    {
        if (empty($matrix)) return [];

        $altIds = array_keys($matrix);
        $numCriteria = count($criteria);
        $normalizedMatrix = [];

        // 1. Normalize each criteria (column-wise)
        for ($j = 0; $j < $numCriteria; $j++) {
            $columnValues = array_column($matrix, $j);
            $normalizedColumn = $this->normalize($columnValues, $criteria[$j]['type']);
            
            foreach ($normalizedColumn as $i => $val) {
                $normalizedMatrix[$altIds[$i]][$j] = $val;
            }
        }

        // 2. Calculate Preference Values (sum of normalized * weight)
        $scores = [];
        foreach ($normalizedMatrix as $id => $row) {
            $score = 0;
            foreach ($row as $j => $val) {
                $score += $val * $criteria[$j]['weight'];
            }
            $scores[$id] = $score;
        }

        return $scores;
    }

    /**
     * Rank the results based on scores
     * 
     * @param array $scores [id => score]
     * @return array Ranked list [['id' => id, 'score' => score, 'rank' => rank], ...]
     */
    public function rank(array $scores): array
    {
        $ranked = [];
        foreach ($scores as $id => $score) {
            $ranked[] = ['id' => $id, 'score' => $score];
        }

        // Sort descending by score
        usort($ranked, fn($a, $b) => $b['score'] <=> $a['score']);

        // Add rank number
        foreach ($ranked as $i => &$item) {
            $item['rank'] = $i + 1;
        }

        return $ranked;
    }
}
