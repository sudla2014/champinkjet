<?php
function page_navi($total_item, $cur_page, $per_page=10, $query_str="", $min_page=5){

$total_page = ceil($total_item/$per_page);
$cur_page = (isset($cur_page))?$cur_page:1;
$diff_page = NULL;
if($cur_page>$min_page){
    $diff_page = $total_page-$cur_page;
}
$limit_page = $min_page;
$f_num_page = ($cur_page<=$min_page)?1:(floor($cur_page/$min_page)*$min_page)+1;
if($diff_page>$min_page){
    $limit_page = ($min_page + $f_num_page)-1;
}else{
    if(isset($diff_page)){
        $limit_page = $total_page;
    }else{
        $limit_page = $min_page;
    }
}
$show_page = ($total_page<=$min_page)?$total_page:$limit_page;
$l_num_page = 1;
$prev_page = $cur_page-1;
$next_page = $cur_page+1;
$temp_query_str = $query_str;
$query_str = "";
if($temp_query_str && is_array($temp_query_str) && count($temp_query_str)>0){
    array_pop($temp_query_str);
    $query_str = http_build_query($temp_query_str);
    if($query_str!=""){
        $query_str = "?".$query_str;
    }
}
$mark_char = ($query_str!="")?"&":"?";

  echo '<nav>
      <ul class="pagination justify-content-center">
        <li class="page-item">
        <a class="page-link" href="'.$query_str.$mark_char.'page=1"> First</a>
        </li>
        ';
    echo '
        <li class="page-item '.(($cur_page==1)?"disabled":"").'">
          <a class="page-link"  href="'.$query_str.$mark_char.'page='.$prev_page.'"> Previous</a>
        </li>
    ';
    for($i = $f_num_page; $i<=$show_page;$i++){
    echo '
        <li class="page-item '.(($i==$cur_page)?"active":"").'">
          <a class="page-link" href="'.$query_str.$mark_char.'page='.$i.'"> '.$i.' </a>
        </li>
    ';
    }
    echo '
        <li class="page-item '.(($next_page>$total_page)?"disabled":"").'">
            <a class="page-link"  href="'.$query_str.$mark_char.'page='.$next_page.'"> Next</a>
        </li>
    ';
    echo '
        <li class="page-item">
          <input type="number" class="form-control" min="1" max="'.$total_page.'"
                  style="width:70px;height:37px" onClick="this.select()" onchange="window.location=\''.$query_str.$mark_char.'page=\'+this.value"  value="'.$cur_page.'" />
        </li>
    ';
    echo '
        <li class="page-item">
            <a class="page-link"  href="'.$query_str.$mark_char.'page='.$total_page.'"> Last</a>
        </li>
      </ul>
    </nav>
    ';
}
?>
