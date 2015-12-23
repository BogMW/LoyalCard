<?php
class checkNumberLength {
    public function checkNumber ($number) {
      if (strlen($number) != 10) {
          return "Number must contain 10 digits, but this number have ". strlen($number);
      }
      else return $number;
      }
}