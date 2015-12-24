<?php
class zeroTransactionCheck {
    public function zeroCheck ($summ) {
        if ($summ <= 0) {
            return "Transaction can't equal or be less than zero";
        }
        else return $summ;
    }
}