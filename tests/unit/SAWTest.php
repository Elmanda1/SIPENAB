<?php

namespace App\Unit;

use CodeIgniter\Test\CIUnitTestCase;
use App\Libraries\SAWCalculator;

class SAWTest extends CIUnitTestCase
{
    public function testNormalizationBenefit()
    {
        $calculator = new SAWCalculator();
        
        $data = [3, 4, 5];
        $result = $calculator->normalize($data, 'benefit');
        
        $this->assertEquals([0.6, 0.8, 1.0], $result);
    }

    public function testNormalizationCost()
    {
        $calculator = new SAWCalculator();
        
        $data = [200, 400, 500];
        $result = $calculator->normalize($data, 'cost');
        
        $this->assertEquals([1.0, 0.5, 0.4], $result);
    }

    public function testFullSAWCalculation()
    {
        $calculator = new SAWCalculator();

        // Manual Cross-check Data
        $matrix = [
            'A1' => [3, 400, 5],
            'A2' => [4, 200, 4],
            'A3' => [5, 500, 3],
        ];

        $criteria = [
            ['type' => 'benefit', 'weight' => 0.4],
            ['type' => 'cost', 'weight' => 0.3],
            ['type' => 'benefit', 'weight' => 0.3],
        ];

        // 1. Calculate Scores
        $scores = $calculator->calculateScores($matrix, $criteria);

        // Expected Scores (rounded to 2 decimal places for comparison)
        // V1 = 0.69, V2 = 0.86, V3 = 0.70
        $this->assertEqualsWithDelta(0.69, $scores['A1'], 0.0001);
        $this->assertEqualsWithDelta(0.86, $scores['A2'], 0.0001);
        $this->assertEqualsWithDelta(0.70, $scores['A3'], 0.0001);

        // 2. Rank Results
        $ranking = $calculator->rank($scores);

        $this->assertEquals('A2', $ranking[0]['id']);
        $this->assertEquals('A3', $ranking[1]['id']);
        $this->assertEquals('A1', $ranking[2]['id']);
    }
}
