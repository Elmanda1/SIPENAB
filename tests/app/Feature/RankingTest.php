<?php

namespace App\Feature;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Database\Seeds\SawCrossCheckSeeder;

class RankingTest extends CIUnitTestCase
{
    use FeatureTestTrait, DatabaseTestTrait;

    protected $refresh = true;
    protected $namespace = 'App';

    public function testRankingCalculationMatchesManualFormula()
    {
        // 1. Seed cross-check data
        $seeder = \Config\Database::seeder();
        $seeder->call(SawCrossCheckSeeder::class);

        // 2. Call calculation endpoint
        $result = $this->get('ranking/calculate');

        $result->assertStatus(200);
        $json = json_decode($result->getJSON(), true);

        // 3. Verify Results (Cross-check against manual formula)
        // Expected sorted by rank: Student 2 (0.86), Student 3 (0.70), Student 1 (0.69)
        $this->assertEquals('success', $json['status']);
        
        $results = $json['results'];
        $this->assertCount(3, $results);

        // Rank 1: Student 2 (A2)
        $this->assertEquals(1, $results[0]['rank']);
        $this->assertEqualsWithDelta(0.86, $results[0]['score'], 0.0001);

        // Rank 2: Student 3 (A3)
        $this->assertEquals(2, $results[1]['rank']);
        $this->assertEqualsWithDelta(0.70, $results[1]['score'], 0.0001);

        // Rank 3: Student 1 (A1)
        $this->assertEquals(3, $results[2]['rank']);
        $this->assertEqualsWithDelta(0.69, $results[2]['score'], 0.0001);

        // 4. Verify Database Persistence
        $this->seeInDatabase('hasil', [
            'mahasiswa_id' => $results[0]['id'],
            'ranking' => 1
        ]);
    }
}
