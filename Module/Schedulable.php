<?php

namespace Module;

use Module\Schedule;

trait Schedulable {
    public $schedule;

    function schedule($args) {
        $this->schedule = $args["schedule"] ?? new Schedule();
    }

    public function schedulable($start_date, $end_date) {
        return !$this->scheduled($start_date, $end_date);
    }

    private function scheduled($start_date, $end_date) {
        return $this->schedule->scheduled($start_date, $end_date);
    }

    public function lead_days() {
        return 0;
    }
}