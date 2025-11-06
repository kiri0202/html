<?php
// URLパラメータから年・月を取得（なければ現在）
$year = isset($_GET['year']) ? (int)$_GET['year'] : date('Y');
$month = isset($_GET['month']) ? (int)$_GET['month'] : date('m');

// 前月・翌月を計算
$prevMonth = $month - 1;
$nextMonth = $month + 1;
$prevYear = $year;
$nextYear = $year;

if ($prevMonth < 1) {
    $prevMonth = 12;
    $prevYear--;
}
if ($nextMonth > 12) {
    $nextMonth = 1;
    $nextYear++;
}

$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

// 見出し（ナビゲーション付き）
echo "<table border='1' style='border-collapse:collapse; text-align:center; width:100%;'>";
echo "<tr>
        <th colspan='7'>
            <a href='?year={$prevYear}&month={$prevMonth}' style='float:left;'>◀ 前の月</a>
            {$year}年{$month}月
            <a href='?year={$nextYear}&month={$nextMonth}' style='float:right;'>次の月 ▶</a>
        </th>
      </tr>";

echo "<tr><th>日</th><th>月</th><th>火</th><th>水</th><th>木</th><th>金</th><th>土</th></tr>";

$dayOfWeek = date('w', strtotime("{$year}-{$month}-01"));
echo "<tr>";

// 空白セル
for ($i = 0; $i < $dayOfWeek; $i++) {
    echo "<td></td>";
}

// 日付セル
for ($day = 1; $day <= $daysInMonth; $day++) {
    $currentDate = "{$year}-" . str_pad($month, 2, '0', STR_PAD_LEFT) . "-" . str_pad($day, 2, '0', STR_PAD_LEFT);

    // タスクがあるかチェック
    $hasTask = false;
    foreach ($tasks as $task) {
        if ($task->end_date && $task->end_date->format('Y-m-d') === $currentDate) {
            $hasTask = true;
            break;
        }
    }

    $style = $hasTask ? "background-color:#ffcccc;" : "";
    echo "<td style='{$style}'>{$day}</td>";

    // 土曜日で改行
    if (date('w', strtotime($currentDate)) == 6) {
        echo "</tr><tr>";
    }
}
echo "</tr></table>";
?>
