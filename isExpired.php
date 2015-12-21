<?php
class isExpired {
    public function checkExpiredDate ($endDate, $dayToCheck) {

        if ($endDate < $dayToCheck) {
            return true;
        } else {
            return false;
        }
    }
}