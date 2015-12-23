<?php
class addSumm_class {

    public function AddSumm($arr) {
        foreach ($arr as $value) {
            $sumByCard += $value;
        }
        echo ('Summ by card - ' . $sumByCard . '<br/>');
        return $sumByCard;
    }
}