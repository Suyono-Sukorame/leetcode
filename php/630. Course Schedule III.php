class Solution {
    function scheduleCourse($courses) {
        usort($courses, function($a, $b) {
            return $a[1] - $b[1];
        });

        $taken = [];

        $startTime = 0;

        foreach ($courses as $course) {
            [$duration, $endTime] = $course;

            if ($startTime + $duration <= $endTime) {
                $startTime += $duration;
                $taken[] = $duration;
            } else {
                $maxIndex = -1;
                $maxDuration = 0;
                for ($i = 0; $i < count($taken); $i++) {
                    if ($taken[$i] > $maxDuration) {
                        $maxIndex = $i;
                        $maxDuration = $taken[$i];
                    }
                }
                
                if ($maxIndex != -1 && $taken[$maxIndex] > $duration) {
                    $startTime -= $taken[$maxIndex] - $duration;
                    $taken[$maxIndex] = $duration;
                }
            }
        }

        return count($taken);
    }
}
