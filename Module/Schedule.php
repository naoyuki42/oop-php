<?php

namespace Module;

class Schedule {
    public function scheduled($start_date, $end_date): string {
        printf("This is not scheduled\nbetween {$start_date} and {$end_date}\n");
        return false;
    }
}