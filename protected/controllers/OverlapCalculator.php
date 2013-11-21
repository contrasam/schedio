<?php
/**
 * Calculates the amount of overlap between a source time range and a variable number of compared time ranges.
 * Implements a subset of Allen's Interval Algebra.
 * With contributions by rdlowery.
 */
class OverlapCalculator {

    /**
     * @var int
     */
    private $timeIn;

    /**
     * @var int
     */
    private $timeOut;

    /**
     * @var int
     */
    private $totalOverlap = 0;

    /**
     * @param DateTime|int $timeIn
     * @param DateTime|int $timeOut
     */
    public function __construct($timeIn, $timeOut) {
        if( $timeIn instanceOf DateTime ) {
            $this->timeIn = $timeIn->getTimestamp();
        } else {
            $this->timeIn = $timeIn;
        }

        if( $timeOut instanceOf DateTime ) {
            $this->timeOut = $timeOut->getTimestamp();
        } else {
            $this->timeOut = $timeOut;
        }
    }

    /**
     * @param DateTime|int $periodStart
     * @param DateTime|int $periodEnd
     */
    public function addOverlapFrom($periodStart, $periodEnd) {
        if( $periodStart instanceOf DateTime ) {
            $periodStart = $periodStart->getTimestamp();
        }
        
        if( $periodEnd instanceOf DateTime ) {
            $periodEnd = $periodEnd->getTimestamp();
        }

        $this->totalOverlap += $this->calculateOverlap($periodStart, $periodEnd );
    }

    /**
     * @param $periodStart
     * @param $periodEnd
     * @return int
     */
    private function calculateOverlap($periodStart, $periodEnd)
    {
        if($periodStart >= $this->timeIn && $periodEnd <= $this->timeOut) {
            // The compared time range can be contained within borders of the source time range, so the over lap is the entire compared time range
            return $periodEnd - $periodStart;
        } elseif ($periodStart >= $this->timeIn && $periodStart <= $this->timeOut) {
            // The compared time range starts after or at the source time range but also ends after it because it failed the condition above
            return $this->timeOut - $periodStart;
        } elseif ($periodEnd >= $this->timeIn && $periodEnd <= $this->timeOut) {
            // The compared time range starts before the source time range and ends before the source end time
            return $periodEnd - $this->timeIn;
        } elseif($this->timeIn > $periodStart && $this->timeOut < $periodEnd) {
            // The compared time range is actually wider than the source time range, so the overlap is the entirety of the source range
            return $this->timeOut - $this->timeIn;
        }

        return 0;
    }

    /**
     * @return int
     */
    public function getOverlap() {
        return $this->totalOverlap;
    }
}

