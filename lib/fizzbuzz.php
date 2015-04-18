<?php 
    class FizzBuzz {

        private $input;

        public function __construct() {
        
        }

        public function setInput($index, $val) {
            $this->input[$index] = $val;
        }

        public function getInput($index) {
            if (! $index)
                return $this->input;
            return $this->input[$index];
        }

        public function nullFilter($input) {
            if ( ! isset($input) )
                throw new Exception("All fields are required.");
        }

        public function signedFilter($input) {
            if ( $input <= 0 )
                throw new Exception("Negative or zero input are not allowed");
        }

        public function numberFilter($input) {
            if ( ! ctype_digit($input) )
                throw new Exception("Only positive integers are allowed.");
        }

        public function greaterThanFilter() {
            if ( $this->getInput(1) > $this->getInput(2) )
                throw new Exception("The second input should be greater than the first input");
        }

        public function isMultipleOf($val,$multiple) {
            if ($val % $multiple == 0 )
                return true;
        }

        public function filterInputs() {
            try {
                foreach ($this->input as $input) {
                    $this->nullFilter($input);
                    $this->signedFilter($input);
                    $this->numberFilter($input);
                }
                $this->greaterThanFilter();
                $response   = array('code'=>200,'response'=>'');
            } catch (Exception $e) {
                $response = array('code' => (int)$e->getCode(),
                            'response' => $e->getMessage());
            }
            return  (object) $response;
        }

        public function printFizzBuzz($counter) {
            $html = '';
            if  ($this->isMultipleOf($counter,3) && $this->isMultipleOf($counter,5))
                $html = ' FizzBuzz ';
            return $html;
        }

        public function printFizz($counter) {
            $html = '';
            if  ($this->isMultipleOf($counter,3) && !$this->isMultipleOf($counter,5))
                $html = ' Fizz ';
            return $html;
        }

        public function printBuzz($counter) {
            $html = '';
            if  (!$this->isMultipleOf($counter,3) && $this->isMultipleOf($counter,5))
                $html = ' Buzz ';
            return $html;
        }

        public function printCounter($counter) {
            $html = '';
            if  (!$this->isMultipleOf($counter,3) && !$this->isMultipleOf($counter,5))
                $html = ' '.$counter.' ';
            return $html;
        }

        public function createResponse() {
            $html = '';
            for( $n = $this->getInput(1); $n <= $this->getInput(2); $n++ ) {
                $html .= $this->printFizzBuzz($n);
                $html .= $this->printFizz($n);
                $html .= $this->printBuzz($n);
                $html .= $this->printCounter($n);
            }
            $response = "<p><strong>Result for the range[".$this->getInput(1)."...".$this->getInput(2)."]</strong>:</p>";
            $response .= "<p>".$html."</p>";
            $response .= "<hr/>";

            return $response;
        }
    }
?>