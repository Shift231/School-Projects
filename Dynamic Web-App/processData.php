<?php 
/**
 * php file that takes input from the update.php
 * responsible for creating a new data in the database
 * 
 * December, 12, 2018
 * @author Leslie Col-iteng
 *
 *I, Leslie Col-iteng, 000772220, certify that this material 
 *is my original work. No other person's work has been used 
 *without due acknowledgment.
 * 
 */
        
        //takes all parameters that were submitted by the update.php file
        $title1 = filter_input(INPUT_POST, "titleInput1", FILTER_SANITIZE_SPECIAL_CHARS);
        $content1 = filter_input(INPUT_POST, "content1", FILTER_SANITIZE_SPECIAL_CHARS);
        
        $title2 = filter_input(INPUT_POST, "titleInput2", FILTER_SANITIZE_SPECIAL_CHARS);
        $content2 = filter_input(INPUT_POST, "content2", FILTER_SANITIZE_SPECIAL_CHARS);
        
        $title3 = filter_input(INPUT_POST, "titleInput3", FILTER_SANITIZE_SPECIAL_CHARS);
        $content3 = filter_input(INPUT_POST, "content3", FILTER_SANITIZE_SPECIAL_CHARS);
        
        $title4 = filter_input(INPUT_POST, "titleInput4", FILTER_SANITIZE_SPECIAL_CHARS);
        $content4 = filter_input(INPUT_POST, "content4", FILTER_SANITIZE_SPECIAL_CHARS);
        
        $title5 = filter_input(INPUT_POST, "titleInput5", FILTER_SANITIZE_SPECIAL_CHARS);
        $content5 = filter_input(INPUT_POST, "content5", FILTER_SANITIZE_SPECIAL_CHARS);
        
        try {
            $dbh = new PDO("mysql:host=localhost;dbname=000772220", "000772220", "19951212");
        } catch (Exception $e) {
            die("Connection Error! Can't Connect to Database");
        }

        //create a script that would insert the data into the database. Checks if the data is empty.
        if(($title5 !== "" && $content5 !== "")){
            $insert = "INSERT INTO  `UpdateMe` (  `Title` ,  `Feed_Content` ) 
                       VALUES ( '$title1','$content1' ),('$title2','$content2'),('$title3','$content3'),('$title4','$content4'),('$title5','$content5')";    
        }elseif(($title4 !== "" && $content4 !== "")){
            $insert = "INSERT INTO  `UpdateMe` (  `Title` ,  `Feed_Content` ) 
                       VALUES ( '$title1','$content1' ),('$title2','$content2'),('$title3','$content3'),('$title4','$content4')";
        }elseif(($title3 !== "" && $content3 !== "")){
            $insert = "INSERT INTO  `UpdateMe` (  `Title` ,  `Feed_Content` ) 
                       VALUES ( '$title1','$content1' ),('$title2','$content2'),('$title3','$content3')";
        }elseif(($title2 !== "" && $content2 !== "")){
            $insert = "INSERT INTO  `UpdateMe` (  `Title` ,  `Feed_Content` ) 
                       VALUES ( '$title1','$content1' ),('$title2','$content2')";
        }else{
            $insert = "INSERT INTO  `UpdateMe` (  `Title` ,  `Feed_Content` ) 
                       VALUES ( '$title1','$content1' )";
        }
        $stmt = $dbh->prepare($insert);
        $success = $stmt->execute();
        
        
        // if successful, reload the and display the update.php page
        if ($success) {
            header("location: update.php");
            }
?>

