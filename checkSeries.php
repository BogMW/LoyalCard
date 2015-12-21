<?php
class checkSeries {
    public function checkRecordSeries ($series) {
        if (preg_match('/[0-9]/', $series)) {
            return "Digits not allowed in Series";
        } elseif (preg_match('/[a-z]/', $series)) {
            $series = strtoupper($series);
            return $series;
        }
        else return $series;
    }
}