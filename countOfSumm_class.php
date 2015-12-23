<?php
class countOfSumm_class {

      public function CountOfSumm($arr) {
        foreach ($arr as $value) {
            $sumCount += 1;
        }
        echo ('Count of transactions - ' . $sumCount);
        return $sumCount;
    }
}
