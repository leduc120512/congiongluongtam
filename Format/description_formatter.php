<?php
// helpers/description_formatter.php

function formatDescription($description)
{
    $formatted = '';
    $lines = explode("\n", trim($description));
    $inTable = false;
    $tableRows = [];

    foreach ($lines as $index => $line) {
        // Chuẩn hóa dòng: loại bỏ ký tự thừa và khoảng trắng không cần thiết
        $line = preg_replace('/\s+/', ' ', trim($line)); // Thay nhiều khoảng trắng bằng một khoảng
        $line = str_replace("\r", '', $line); // Loại bỏ ký tự \r
        if (empty($line)) continue;

        // Xử lý tiêu đề ($...$)
        if (preg_match('/^\$(.+?)\$\s*$/', $line, $matches)) {
            if ($inTable && !empty($tableRows)) {
                $formatted .= renderTable($tableRows);
                $tableRows = [];
                $inTable = false;
            }
            $formatted .= '<p class="font-bold text-black text-lg mb-2">' . htmlspecialchars($matches[1]) . '</p>';
            continue;
        }

        // Xử lý danh sách (*...*)
        if (preg_match('/^\*\s*(.+?)\s*\*$/', $line, $matches)) {
            if ($inTable && !empty($tableRows)) {
                $formatted .= renderTable($tableRows);
                $tableRows = [];
                $inTable = false;
            }
            $formatted .= '<li class="text-gray-600 text-base mb-1 ml-4 list-disc">' . htmlspecialchars(trim($matches[1])) . '</li>';
            continue;
        }

        // Xử lý bảng (dấu |)
        if (strpos($line, '|') !== false) {
            $inTable = true;
            $tableRows[] = $line;
            $nextLine = isset($lines[$index + 1]) ? trim($lines[$index + 1]) : '';
            if (!$nextLine || strpos($nextLine, '|') === false) {
                $formatted .= renderTable($tableRows);
                $tableRows = [];
                $inTable = false;
            }
            continue;
        }

        // Xử lý đoạn văn
        if ($inTable && !empty($tableRows)) {
            $formatted .= renderTable($tableRows);
            $tableRows = [];
            $inTable = false;
        }

        $length = strlen($line);
        $fontSize = $length > 100 ? 'text-xs' : ($length > 50 ? 'text-sm' : 'text-base');
        $formatted .= '<p class="text-gray-600 mb-2 ' . $fontSize . '">' . htmlspecialchars($line) . '</p>';
    }

    if ($inTable && !empty($tableRows)) {
        $formatted .= renderTable($tableRows);
    }

    // Gộp <li> thành <ul>
    $formatted = preg_replace_callback(
        '/((<li class="text-gray-600 text-base mb-1 ml-4 list-disc">.*?<\/li>\s*)+)/',
        fn($m) => '<ul>' . $m[1] . '</ul>',
        $formatted
    );

    return $formatted;
}

function renderTable($rows)
{
    $output = '<table class="table-auto w-full text-gray-600 mb-4 border-collapse">';
    $isFirstRow = true;
    foreach ($rows as $row) {
        $cells = explode('|', trim($row));
        $output .= '<tr>';
        foreach ($cells as $cell) {
            $tag = $isFirstRow ? 'th' : 'td';
            $style = $isFirstRow ? 'font-semibold text-lg bg-gray-100' : 'text-base';
            $output .= "<$tag class='border px-4 py-2 $style'>" . htmlspecialchars(trim($cell)) . "</$tag>";
        }
        $output .= '</tr>';
        $isFirstRow = false;
    }
    $output .= '</table>';
    return $output;
}
