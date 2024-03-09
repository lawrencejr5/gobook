<?php

include_once "../backend/database.php";
$uID = $_SESSION['id'];

$database = new Database;



if(isset($_GET['query'])){
    $input = $_GET['query'];
    $database = new Database;
    $return = [];
    $data['search'] = $database -> search($input);
    if(empty($input)){
        $data['search'] = "empty";
    }elseif($data['search'] == "Does not exist"){
        $data['search'] = "Does not exist";
    }
    else{
        $database -> search($input);
        // echo json_encode("good");
        
    }



    // echo $input;
}else{
    $data['search'] = "";
}

if (isset($_GET['query'])) {

?>

    <h4>Search results for <span style="color: rgb(24, 119, 242); text-transform: uppercase;"><?php echo $input ?></span></h4>
<?php
}
?>
<?php
if ($data['search'] == "empty") {
    echo "Nothing searched";
} elseif ($data['search'] == "Does not exist") {
    echo "No records found for ". $input;
} else {
    foreach ($data['search'] as $d) {
        $id = $d['id'];
        $username = $d['username'];
        $fullname = $d['fullname'];
        $profilepic = $d['profile_pic'];
        $dept = $d['department'];
        $verified = $d['verified'];

?>

        <a href="../discover/view_account/?id=<?= $id ?>">
            <div class="find_frns_lay" style="display: block;">
                <!--<img src="../assets/profilePics/<?= $profilepic ?>" style="border-radius: 50%; width: 80px; height: 80px;" width="10px" height="10px" />-->
                <!--<div class="find_frns_details">-->
                    <!--<form method="post">-->
                        <h6 style="text-transform: capitalize; color: black;"><?= $fullname ?>
                            <?php if ($verified == "yes") { ?>
                                <i class="bi bi-patch-check-fill verified" style="color: rgb(24,119,242); font-size: 12px;"></i></b>
                            <?php } ?>
                        </h6>
                        <small style="text-transform: capitalize; color: black;">@<?= $username ?></small>.
                        <small style="text-transform: capitalize; color: black;"><?= $dept ?></small><br>

                    <!--</form>-->
                <!--</div>-->
            </div>
        </a>
<?php
    }
}
?>