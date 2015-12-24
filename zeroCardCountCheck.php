<?php
class zeroCardCountCheck {
    public function zeroCountCheck ($count) {
        if ($count <= 0) {
            return "You must choose at least 1 card";
        }
        else return $count;
    }
}