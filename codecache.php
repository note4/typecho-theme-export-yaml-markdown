<?php
/**
 * 输出归档
 */
 ?>

<?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=100000')->to($archives);
    $year=0; $mon=0; $i=0; $j=0;
    $output = '<div id="archives">';
    while($archives->next()):
        $year_tmp = date('Y',$archives->created);
        $mon_tmp = date('m',$archives->created);
        $y=$year; $m=$mon;
        if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';
        if ($year != $year_tmp && $year > 0) $output .= '</ul>';
        if ($year != $year_tmp) {
            $year = $year_tmp;
            $output .= '<h3>'. $year .' 年</h3><ul>'; //输出年份
        }
        if ($mon != $mon_tmp) {
            $mon = $mon_tmp;
            $output .= '<li><span>'. $mon .' 月</span><ul>'; //输出月份
        }
        $output .= '<li>'.date('d日: ',$archives->created).'<a href="'.$archives->permalink .'" class="dw" download="'.$archives->cid .'.md">'. $archives->title .'</a> <em>('. $archives->commentsNum.')</em></li>'; //输出文章日期和标题
    endwhile;
    $output .= '</ul></li></ul></div>';
    echo $output;
?>