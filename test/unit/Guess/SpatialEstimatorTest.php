<?php
namespace ZxcvbnPhp\test\unit\Guess;

use PHPUnit\Framework\TestCase;
use Zxcvbn\Guess\SpatialEstimator;
use Zxcvbn\Match\DataProvider\AdjacencyGraphs;
use Zxcvbn\Scoring;

class SpatialEstimatorTest extends TestCase
{
    /**
     * @var SpatialEstimator
     */
    protected $spatialEstimator;

    public function setUp()
    {
        $this->spatialEstimator = new SpatialEstimator();
    }

    public function testGraphQwertyOrDvorak()
    {
        $this->assertEquals(2160, $this->spatialEstimator->estimate([
            'graph' => 'qwerty',
            'turns' => 1,
            'token' => 'qwedsa',
            'shifted_count' => 0,
        ]));
        $this->assertEquals(2160, $this->spatialEstimator->estimate([
            'graph' => 'dvorak',
            'turns' => 1,
            'token' => 'qwedsa',
            'shifted_count' => 0,
        ]));
    }

    public function testGraphNotQwertyOrDvorak()
    {
        $this->assertEquals(340, $this->spatialEstimator->estimate([
            'graph' => 'not_dvorak',
            'turns' => 1,
            'token' => '456123',
            'shifted_count' => 0,
        ]));
    }

    public function testShiftedCount()
    {
        $this->assertEquals(2040, $this->spatialEstimator->estimate([
            'graph' => 'not_dvorak',
            'turns' => 1,
            'token' => '456123',
            'shifted_count' => 1,
        ]));
    }
}
