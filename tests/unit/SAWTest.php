<?php

namespace App\Unit;

use CodeIgniter\Test\CIUnitTestCase;
use App\Libraries\SAWCalculator;

class SAWTest extends CIUnitTestCase
{
    public function testNormalizationBenefit()
    {
        $calculator = new SAWCalculator();
        
        // Benefit: x_ij / max(x_j)
        // Data for one criteria: [3, 4, 5] -> max is 5
        // Normalized: [0.6, 0.8, 1.0]
        
        $data = [3, 4, 5];
        $result = $calculator->normalize($data, 'benefit');
        
        $this->assertEquals([0.6, 0.8, 1.0], $result);
    }

    public function testNormalizationCost()
    {
        $calculator = new SAWCalculator();
        
        // Cost: min(x_j) / x_ij
        // Data for one criteria: [200, 400, 500] -> min is 200
        // Normalized: [1.0, 0.5, 0.4]
        
        $data = [200, 400, 500];
        $result = $calculator->normalize($data, 'cost');
        
        $this->assertEquals([1.0, 0.5, 0.4], $result);
    }
}
