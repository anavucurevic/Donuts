

<?php


list($iNowYear, $iNowMonth, $iNowDay) = explode('-', date('Y-m-d'));

if (isset($_GET['month'])) {
    list($iMonth, $iYear) = explode('-', $_GET['month']);
    $iMonth = (int)$iMonth;
    $iYear = (int)$iYear;
} else {
    list($iMonth, $iYear) = explode('-', date('n-Y'));
}

$iTimestamp = mktime(0, 0, 0, $iMonth, $iNowDay, $iYear);
list($sMonthName, $iDaysInMonth) = explode('-', date('F-t', $iTimestamp));

$iPrevYear = $iYear;
$iPrevMonth = $iMonth - 1;
if ($iPrevMonth <= 0) {
    $iPrevYear--;
    $iPrevMonth = 12; // set to December
}
// Get next year and month
$iNextYear = $iYear;
$iNextMonth = $iMonth + 1;
if ($iNextMonth > 12) {
    $iNextYear++;
    $iNextMonth = 1;
}
// Get number of days of previous month
$iPrevDaysInMonth = (int)date('t', mktime(0, 0, 0, $iPrevMonth, $iNowDay, $iPrevYear));
// Get numeric representation of the day of the week of the first day of specified (current) month
$iFirstDayDow = (int)date('w', mktime(0, 0, 0, $iMonth, 1, $iYear));
// On what day the previous month begins
$iPrevShowFrom = $iPrevDaysInMonth - $iFirstDayDow + 1;
// If previous month
$bPreviousMonth = ($iFirstDayDow > 0);
// Initial day
$iCurrentDay = ($bPreviousMonth) ? $iPrevShowFrom : 1;
$bNextMonth = false;
$sCalTblRows = '';
// Generate rows for the calendar
for ($i = 0; $i < 6; $i++) { // 6-weeks range
    $sCalTblRows .= '<tr>';
    for ($j = 0; $j < 7; $j++) { // 7 days a week
        $sClass = '';
        if ($iNowYear == $iYear && $iNowMonth == $iMonth && $iNowDay == $iCurrentDay && !$bPreviousMonth && !$bNextMonth) {
            $sClass = 'today';
        } elseif (!$bPreviousMonth && !$bNextMonth) {
            $sClass = 'current';
        }
        $sCalTblRows .= '<td class="'.$sClass.'"><a href="javascript: void(0)">'.$iCurrentDay.'</a></td>';
        // Next day
        $iCurrentDay++;
        if ($bPreviousMonth && $iCurrentDay > $iPrevDaysInMonth) {
            $bPreviousMonth = false;
            $iCurrentDay = 1;
        }
        if (!$bPreviousMonth && !$bNextMonth && $iCurrentDay > $iDaysInMonth) {
            $bNextMonth = true;
            $iCurrentDay = 1;
        }
    }
    $sCalTblRows .= '</tr>';
}
// Prepare replacement keys and generate the calendar
$aKeys = array(
    '__prev_month__' => "{$iPrevMonth}-{$iPrevYear}",
    '__next_month__' => "{$iNextMonth}-{$iNextYear}",
    '__cal_caption__' => $sMonthName . ', ' . $iYear,
    '__cal_rows__' => $sCalTblRows,
);
$sCalendarItself = strtr(file_get_contents('calendar.html'), $aKeys);
// AJAX requests - return the calendar
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' && isset($_GET['month'])) {
    header('Content-Type: text/html; charset=utf-8');
    echo $sCalendarItself;
    exit;
}
$aVariables = array(
    '__calendar__' => $sCalendarItself,
);
echo strtr(file_get_contents('kalendar.html'), $aVariables);

?>







<html>
<head>
<link href="thumbnail.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" href="style.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<?php include 'header.php'; ?>



<style>
    body {
     
       background-image: url('../krofne/slike/poz.jpg');
       background-size: cover;
      
   
    }
</style>

<div class="container">

<div class="thumbnail_div">
<form method="post" action="get_thumbnail.php">
<input  class="form-control" type="text" name="url" placeholder="Napisite url youtube videa">
<input class="dugme form-control  " type="submit" name="get_thumbnail" value="PREUZMITE SLIKU SA  YOUTUBE VIDEA">
</form>
<br>
<br>
</div>
</div>


<?php include 'footer.php'; ?>
</body>
</html>

