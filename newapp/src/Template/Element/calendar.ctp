<?php
use Cake\Routing\Router;

$year = isset($_GET['year']) ? (int)$_GET['year'] : date('Y');
$month = isset($_GET['month']) ? (int)$_GET['month'] : date('m');

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

echo "<table border='1' style='border-collapse:collapse; text-align:center; width:100%; font-size:14px;'>";
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

// 空白セルを追加
for ($i = 0; $i < $dayOfWeek; $i++) {
    echo "<td></td>";
}

// 各日付を出力
for ($day = 1; $day <= $daysInMonth; $day++) {
    $currentDate = "{$year}-" . str_pad($month, 2, '0', STR_PAD_LEFT) . "-" . str_pad($day, 2, '0', STR_PAD_LEFT);

    // タスクがある日をチェック
    $hasTask = false;
    foreach ($tasks as $task) {
        if ($task->end_date && $task->end_date->format('Y-m-d') === $currentDate) {
            $hasTask = true;
            break;
        }
    }

    // 背景色（タスクあり：ピンク）
    $style = $hasTask ? "background-color:#ffcccc;" : "";

    // 日付クリックでその日のタスク一覧へ
    $url = Router::url(['controller' => 'Tasks', 'action' => 'index', '?' => ['date' => $currentDate]]);
    echo "<td style='{$style}'><a href='{$url}' style='text-decoration:none; color:black;'>{$day}</a></td>";

    // 土曜日で改行
    if (date('w', strtotime($currentDate)) == 6) {
        echo "</tr><tr>";
    }
}

echo "</tr></table>";
?>
