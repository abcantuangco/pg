<?php 

    include 'fizzbuzz.php';

    class FizzBuzzMod extends FizzBuzz {

        private $pass_counter;

        public function __construct() {
            $this->pass_counter = 0;
        }

        public function incrementCounter() {
            $this->pass_counter++;
        }

        public function getCounter() {
            return $this->pass_counter;
        }

        public function resetCounter() {
            $this->pass_counter = 0;
        }

        public function printFizzBuzz($counter) {
            $response = parent::printFizzBuzz($counter);
            if ($response)
                $this->incrementCounter();
            return $response;
        }

        public function printFizz($counter) {
            $response = parent::printFizz($counter);
            if ($response)
                $this->incrementCounter();
            return $response;
        }

        public function printBuzz($counter) {
            $response = parent::printBuzz($counter);
            if ($response)
                $this->incrementCounter();
            return $response;
        }

        public function printCounter($counter) {
            $response = parent::printCounter($counter);
            if ($response) {
                if ($this->getCounter() >= 2) {
                    $response = ' Bazz ';
                }
                $this->resetCounter();
            }
            return $response;
        }
    }

 ?>