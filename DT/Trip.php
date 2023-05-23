<?php

class Trip {
    private $bicycles;
    private $customers;
    private $vehicle;

    public function prepare($preparers): void {
        foreach($preparer as $preparers) {
            $preparer->prepare_trip($this);
        }
    }
}

class Mechanic {
    public function prepare_trip($trip): void {
        foreach($bicycle as $trip->bicycles) {
            $this->prepare_bicycle($bicycle);
        }
    }

    private function prepare_bicycle($bicycle) {
        /** */
    }
}

class TripCoordinator {
    public function prepare_trip($trip): void {
        $this->buy_food($trip->customers);
    }

    private function buy_food($customers) {
        /** */
    }
}

class Driver {
    public function prepare_trip($trip): void {
        $vehicle = $trip->vehicle;
        $this->gas_up($vehicle);
        $this->fill_water_tank($vehicle);
    }

    private function gas_up($vehicle) {
        /** */
    }

    private function fill_water_tank($vehicle) {
        /** */
    }
}