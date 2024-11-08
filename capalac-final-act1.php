<?php

$selectedMonth = isset($_GET['month']) ? (int)$_GET['month'] : null;
$selectedDay = isset($_GET['day']) ? $_GET['day'] : null;

displayForm($selectedMonth, $selectedDay);

if (isValidMonth($selectedMonth) && isValidDay($selectedDay)) {
    $currentYear = date('Y');
    $totalDays = getTotalDaysInMonth($selectedMonth, $currentYear);
    $totalWeeks = getTotalWeeksInMonth($totalDays);
    $dayOccurrences = getDayOccurrencesInMonth($selectedMonth, $selectedDay, $currentYear);

    displayResults(getMonthName($selectedMonth), $selectedDay, $totalWeeks, $dayOccurrences);
}

function displayForm($selectedMonth, $selectedDay) {
    echo "<form method='GET'>";
    echo "<label for='month'>Select Month:</label>";
    echo "<select name='month' id='month'>";
    for ($i = 1; $i <= 12; $i++) {
        $monthName = getMonthName($i);
        $selected = ($selectedMonth === $i) ? "selected" : "";
        echo "<option value='$i' $selected>$monthName</option>";
    }
    echo "</select>";

    echo "<label for='day'>Select Day:</label>";
    echo "<select name='day' id='day'>";
    for ($i = 0; $i < 7; $i++) {
        $dayName = getDayName($i);
        $selected = ($selectedDay === $dayName) ? "selected" : "";
        echo "<option value='$dayName' $selected>$dayName</option>";
    }
    echo "</select>";

    echo "<button type='submit'>Show Date</button>";
    echo "</form>";
}

function getMonthName($month) {
    return date('M', mktime(0, 0, 0, $month, 1));
}

function getDayName($dayNumber) {
    return date('D', mktime(0, 0, 0, 1, $dayNumber + 1, 2023));
}

function isValidMonth($month) {
    return $month >= 1 && $month <= 12;
}

function isValidDay($day) {
    for ($i = 0; $i < 7; $i++) {
        if ($day === getDayName($i)) {
            return true;
        }
    }
    return false;
}

function getTotalDaysInMonth($month, $year) {
    return cal_days_in_month(CAL_GREGORIAN, $month, $year);
}

function getTotalWeeksInMonth($totalDays) {
    return ceil($totalDays / 7);
}

function getDayOccurrencesInMonth($month, $day, $year) {
    $totalDays = getTotalDaysInMonth($month, $year);
    $occurrences = [];

    for ($date = 1; $date <= $totalDays; $date++) {
        $currentDate = "$year-$month-$date";
        $dayOfWeek = date('D', strtotime($currentDate));

        if ($dayOfWeek === $day) {
            $occurrences[] = $date;
        }
    }

    return $occurrences;
}

function displayResults($monthName, $day, $totalWeeks, $dayOccurrences) {
    $dayCount = count($dayOccurrences);

    echo "<p>There are $totalWeeks weeks for $monthName and $dayCount $day(s) in this month.</p>";
    echo "<p>$day of $monthName:</p>";
    echo "<ul>";
    foreach ($dayOccurrences as $date) {
        echo "<li>$monthName $date</li>";
    }
    echo "</ul>";
}

?>
