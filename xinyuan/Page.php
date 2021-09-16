<?php

namespace Xinyuan;

class Page
{
    public static function html($url, $total, $page, $size, $num = 5)
    {
        $page = max((int)$page, 1);
        $maxpage = max(ceil($total / $size), 1);
        $num = floor($num / 2);
        if ($maxpage == 1) {
            return '';
        }
        $html = ["<ul class=\"pagination\">"];
        if ($page > 1) {
            $html[] = "<li><a href=\"{$url}1\">首頁</a></li>";
            $html[] = '<li><a href="' . $url . ($page - 1) . '">上一頁</a></li>';
        } else {
            $html[] = '<li class="disabled"><span>首頁</span></li>';
            $html[] = '<li class="disabled"><span>上一頁</span></li>';
        }
        $start = $page - $num;
        $end = $page + $num;
        if ($start < 1) {
            $end = $end + (1 - $start);
            $start = 1;
        }
        if ($end > $maxpage) {
            $start = $start - ($end - $maxpage);
            if ($start < 1) {
                $start = 1;
            }
            $end = $maxpage;
        }
        if ($start > 1) {
            $html[] = '<li class="disabled"><span>...</span></li>';
        }
        for ($i = $start; $i <= $end; $i++) {
            if ($i == $page) {
                $html[] = "<li class=\"active\"><span>$i</span></li>";
            } else {
                $html[] = "<li><a href=\"{$url}{$i}\">$i</a></li>";
            }
        }
        ($end < $maxpage) && $html[] = '<li class="disabled"><span>...</span></li>';
        if ($page == $maxpage) {
            $html[] = '<li class="disabled"><span>下一頁</span></li>';
            $html[] = '<li class="disabled"><span>尾頁</span></li>';
        } else {
            $html[] = '<li><a href="' . $url. ($page + 1) . '">下一頁</a></li>';
            $html[] = "<li><a href=\"{$url}{$maxpage}\">尾頁</a></li>";
        }
        $html[] = '</ul>';
        return implode('', $html);
    }
}