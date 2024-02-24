<?php

      $ret = mysqli_query($conn, $sql);
      if (mysqli_num_rows($ret) > 0) {
     while ($row = mysqli_fetch_assoc($ret)) {
              // post design
              $sql = "Select * from page_user where uid = {$row['user_id']}";
              $ret2 = mysqli_query($conn, $sql);
              $row2 = mysqli_fetch_assoc($ret2);
              $sql = "SELECT ingredient_name FROM postingredient where post_id =  {$row['pid']}";
              $ret3 = mysqli_query($conn, $sql);
              $Ingredients = (mysqli_fetch_assoc($ret3));
            // print_r($Ingredients);            
            echo "
            <div class='col-12' >
                <div class='card info-card customers-card'>

                    <div class='filter'>
                    <a class='icon' href='#' data-bs-toggle='dropdown'><i class='bi bi-three-dots'></i></a>
                    <ul class='dropdown-menu dropdown-menu-end dropdown-menu-arrow'>
                        <li class='dropdown-header text-start'>
                            <h6>Options</h6>
                        </li>

                        <li><a class='dropdown-item' href='./controllers/verifyUser.php?uid={$row['user_id']}&loc=home'>Verify</a></li>
                        <li><a class='dropdown-item' href='./controllers/unVerifyUser.php?uid={$row['user_id']}&loc=home'>UnVerify</a></li>
                        <li><a class='dropdown-item' href='./controllers/deletePost.php?pid={$row['pid']}&loc=home'>Delete</a></li>
                        <li><a class='dropdown-item' href='./controllers/banUser.php?uid={$row['user_id']}&loc=home'>Ban</a></li>
                        <li><a class='dropdown-item' href='./controllers/unbanUser.php?uid={$row['user_id']}&loc=home'>unBan</a></li>
                    </ul>
                    </div>
                            <div class='card-body'>
                                <a href='./controllers/pfpPagelink.php?uid={$row2['uid']}&role=admin'><span><img alt='Profile Picture' src='./assets/img/profile-pictures/{$row2['first_name']}{$row2['last_name']}.jpg'  style='border-radius: 50%; margin: 2% 2% 2% 0%; width:8%; height: auto;' alt=''></span><h5 style='display: inline;' class='card-title'>{$row2['first_name']} {$row2['last_name']}</a>";
                                if($row2['isVerified']==1){
                                    echo "    <i class='bi bi-patch-check-fill'></i>";
                                }
                                echo"<span>  |  {$row['published_at']}</span></h5>
                                <p class='card-text'>{$row['caption']} </p>
                            </div>
                           
                    ".""."



                    <div id='carouselExampleIndicators' class='carousel slide' data-bs-ride='carousel' style='overflow: hidden;'>
                    <div class='carousel-inner'>";
                                echo "<div class='carousel-item active'>
                                                <img src='{$row['img_url']}' class='d-block w-100 '  style='width: 100%; max-height:400px ;object-fit: cover; overflow:hidden' alt='...'>
                                        </div>";
                                
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
        $sql = "SELECT * FROM post_like WHERE pid = {$row['pid']} AND uid = {$row['user_id']}";
        $ret5 = mysqli_query($conn, $sql);
        echo "{$count['count']}";
        echo " Likes</p>
        
            <div class='coms'><b><u><p>Comments:</p></u></b>";
                    $sql = "select first_name, content
            from post_comment as pc
            join page_user as pu on pc.uid = pu.uid
            where pid = {$row['pid']}
            ";


        $retCom = mysqli_query($conn, $sql);
        if (mysqli_num_rows($retCom) == 0) {
            echo "<p>No comments...</p>";
        } else {
            while ($coms = mysqli_fetch_assoc($retCom)) {
                echo "<p>{$coms['first_name']}: {$coms['content']}</p>";
            }
        }
        echo "</div></div></div>";
    }
  
      }

        ?>