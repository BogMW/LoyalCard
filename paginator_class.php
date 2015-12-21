<?php
class paginator {
    public function checkRecordCount ($records, $recordsShown) {
        if ($records > 10) {
            echo "<td class='table-rows'>There is shown $recordsShown of $records records</td>";
            return 'There is shown ' . $recordsShown .  ' of ' . $records . ' records';
        }
    }
}