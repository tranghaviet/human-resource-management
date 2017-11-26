<?php

if (! function_exists('working_days_in_month')) {
    /**
     * @param int $year
     * @param int $month
     * @param array $ignore days to ignore: 0 is sunday... 6 is saturday. e.g: [0, 6]
     * @return int number of working days
     */
    function working_days_in_month($year, $month, $ignore = [0, 6])
    {
        $count = 0;
        $counter = mktime(0, 0, 0, $month, 1, $year);
        while (date("n", $counter) == $month) {
            if (in_array(date("w", $counter), $ignore) == FALSE) {
                $count++;
            }
            $counter = strtotime("+1 day", $counter);
        }

        return $count;
    }
}
