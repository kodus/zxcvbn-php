<?php

namespace ZxcvbnPhp\Test;

use ZxcvbnPhp\Scorer;

class ScorerTest extends \PHPUnit_Framework_TestCase
{

    public function testScore()
    {
        $this->markTestSkipped('not ready for testing');

        $scorer = new Scorer();
        $this->assertEquals(0, $scorer->score(0), 'Score incorrect');
    }

    public function testCrackTime()
    {
        $this->markTestSkipped('not ready for testing');

        $scorer = new Scorer();
        $scorer->score(8);
        $metrics = $scorer->getMetrics();
        $this->assertEquals(0.0128, $metrics['crack_time'], 'Crack time incorrect');
    }
}