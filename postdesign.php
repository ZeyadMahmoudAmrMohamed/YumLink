<?php

      $ret = mysqli_query($conn, $sql);
      if (mysqli_num_rows($ret) > 0) {
        
        // $row = mysqli_fetch_assoc($ret);
          while ($row = mysqli_fetch_assoc($ret)) {
              // post design
              $sql = "Select * from page_user where uid = {$row['user_id']}";
              $ret2 = mysqli_query($conn, $sql);
              $row2 = mysqli_fetch_assoc($ret2);
              $sql = "SELECT ingredient_name FROM postingredient where post_id =  {$row['pid']}";
            //   echo "{$row['pid']}";

                  $ret3 = mysqli_query($conn, $sql);
            $Ingredients = (mysqli_fetch_assoc($ret3));
            // print_r($Ingredients);
            //  col-xxl-8 h-100 col-xl-8 row col-lg-8     style='width:63%;'
            
            // col-lg-8 col-md-8
            
            echo "
            <div class='col-12 ' >
                <div class='card shadow info-card customers-card'>

                    <div class='filter'>
                    <a class='icon' href='#' data-bs-toggle='dropdown'><i class='bi bi-three-dots'></i></a>
                    <ul class='dropdown-menu dropdown-menu-end dropdown-menu-arrow'>
                        <li class='dropdown-header text-start'>
                        <h6>Options</h6>
                        </li>

                    <!-- <li><a class='dropdown-item' href='#'>Save</a></li>
                        <li><a class='dropdown-item' href='#'>Delete(my post, admin any) or hide</a></li>
                        <li><a class='dropdown-item' href='#'>block , ban</a></li>
                        <li><a class='dropdown-item' href='#'>Shop Ingredients</a></li>-->
                    </ul>
                    </div>
                            <div class='card-body'>
                                <a href='./anotherProfilePage.php?uid={$row2['uid']}&role=user'><span><img alt='Profile Picture' src='./assets/img/profile-pictures/notjohn.jpg'  style='border-radius: 50%; margin: 2% 2% 2% 0%; width:8%; height: auto;' alt=''></span><h5 style='display: inline;' class='card-title'>{$row2['first_name']} {$row2['last_name']}</a>";
                                if($row2['isVerified']==1){
                                    echo "    <i class='bi bi-patch-check-fill'></i>";
                                }
                                echo "<span>  |  {$row['published_at']}</span></h5>
                                <p class='card-text'>{$row['caption']}</p>
                            </div>
                                <button style='color: #e0f7ffe3; background-color: #25424C; margin: 5px;' type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#verticalycentered'>
                                    Ingredients
                                </button>
                        <div class='modal fade' id='verticalycentered' tabindex='-1' >
                            <div class='modal-dialog modal-dialog-centered'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>Ingredients</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    <ul class='list-group'>";
                                    foreach ($Ingredients as $ing) {
                                        echo "<li class='list-group-item d-flex justify-content-between align-items-center'>{$ing}</li>";
                                    }
                                                // while ($row3 = mysqli_fetch_assoc($ret3)) {
                                                //     echo "<li class='list-group-item d-flex justify-content-between align-items-center'>{$row3['ingredient_name']}</li>";
                                                // }
                                                echo "</ul>
                                </div>
                                                <div class='modal-footer'>
                                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                    <button type='button' class='btn btn-primary'>Shop Ingredients</button>
                                                </div>
                        </div>
                </div>
            </div>
                    <div id='carouselExampleIndicators' class='carousel slide' data-bs-ride='carousel' style='overflow: hidden;'>
                    <div class='carousel-inner'>";
                                echo "<div class='carousel-item active'>
                                                <img src='{$row['img_url']}' class='d-block w-100 '  style='width: 100%; max-height:400px ;object-fit: cover; overflow:hidden' alt='...'>
                                        </div>";
                                //   while ($row = mysqli_fetch_assoc($ret)) {
                                //     echo "<div class='carousel-item active'>
                                //     <img src='./assets/img/{$row['img_url']}' class='d-block w-100 '  style='width: 100%; max-height:400px ;object-fit: cover; overflow:hidden' alt='...'>
                                //   </div>";
                                // }
            echo "</div>

                <button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide='prev'>
                <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                <span class='visually-hidden'>Previous</span>
                </button>
                <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide='next'>
                <span class='carousel-control-next-icon' aria-hidden='true'></span>
                <span class='visually-hidden'>Next</span>
                </button>
        </div>
        <hr> <p>";
$sql = "select count(pid) as count from post_like
where pid = {$row['pid']}";
        $ret4 = mysqli_query($conn, $sql);
        $count = mysqli_fetch_assoc($ret4);
        $sql = "SELECT * FROM post_like WHERE pid = {$row['pid']} AND uid = {$_SESSION['uid']}";
        $ret5 = mysqli_query($conn, $sql);
        echo "{$count['count']}";
        echo " Likes</p>
            <form action='./controllers/LCController.php'>
            <input type='submit' class='btn btn-outline-success' value='" . (mysqli_num_rows($ret5)>0 ? 'Unlike' : 'Like') . "' name='like'>
            <input type='submit' class='btn btn-outline-success' value='Comment' name='comm'>
            <input type='text' name='comment' >
            <input type = 'hidden' name='user' value='$_SESSION[uid]'>
            <input type = 'hidden' name='post' value='{$row['pid']}'>
            <input type = 'hidden' name='loc' value='home'>
            </form>

            <div class='coms'><b><u><p>Comments:</p></u></b>";
                    $sql = "select first_name, content
            from post_comment as pc
            join page_user as pu on pc.uid = pu.uid
            where pid = {$row['pid']}
            ";

            // echo "{$row['pid']}";

        $retCom = mysqli_query($conn, $sql);
        if (mysqli_num_rows($retCom) == 0) {
            echo "<p>No comments...</p>";
        } else {
            while ($coms = mysqli_fetch_assoc($retCom)) {
                echo "<p>{$coms['first_name']}: {$coms['content']}</p>";
            }
        }
        echo "</div></div></div>";//added div here
    }
    // </div></div></div>
      }

        ?>