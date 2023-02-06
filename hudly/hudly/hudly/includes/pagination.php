<?php
        $number_of_pages = $script->productPagination();

        if (isset($_GET['page']) && $number_of_pages == 1) {
            $p = "?page=".$_GET['page'];
            $next = "?page=".$_GET['page'];
        } else {
            $p = "#";
            $next = "#";
        }
        ?>


    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">


            <?php
            $pnum = 1;
            if(isset($_GET['page'])) {
                $pnum = $_GET['page'];
            }
                
                for ($page = 1; $page<= $number_of_pages; $page++) { 
                    $aop = "";
                    if ($page == $pnum) {
                        $aop = " disabled";
                    }
                    echo '
                    <li class="page-item'.$aop.'"><a class="page-link " href="?page='.$page.'">'.$page.'</a></li>
                    ';
                }
            ?>

        </ul>
    </nav>