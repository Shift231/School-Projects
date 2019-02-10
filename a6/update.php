<!DOCTYPE html>
<!--
This page is responsible for creating news feed and adding it to the existing database.
It will have to inputs, The title and the content.
It can add upto 5 news feed data at the same time.

NOTE: 
    Functional but still very buggy, one's you remove a table. you wont be able to add a new one if the submition = 5.
    You have to reload to reset.

December, 12, 2018
@author Leslie Col-iteng

I, Leslie Col-iteng, 000772220, certify that this material 
is my original work. No other person's work has been used 
without due acknowledgment. 
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>UpdateMe! Update Page</title>
        <script type="text/javascript"></script>
        <script type="text/javascript" src="js/jquery-1.10.0.js"></script>
        <link rel="stylesheet" type="text/css" href="css/updateMeCss.css">
    </head>

    <body>
        <aside id = "submitAll">
            <p><button type="submit" class="submitAllButton" id="submitAllButton">Submit All</button></p>
        </aside>
        <div class="container">
            <div class="header"> 
                <header>
                    <table id="headerTable"> 
                        <tr>
                            <td><h1>Add News Feed</h1></td>
                        </tr>
                    </table>
                </header>
            </div>

            <div class="content" >
                
                <!-- The form and table that takes in the user input -->
                <!-- Responsible for sending the information to the processData.php that sends it to the database -->
                <form method="post" action="processData.php">
                    <table class="inputWIndow" id="theTable1">
                        <tr>
                            <td><input type="text" class="titleInput" id="titleInput1" placeholder="Enter Title" name="titleInput1"><button type="button" class="xButton" id="xButton1">X</button></td>
                        </tr>

                        <tr>
                            <td><textarea rows="30" cols="50" placeholder="Fill in the Title and this area to show button..." id="newsFeed1" name="content1"></textarea></td>
                        </tr>

                        <tr>
                            <td><button type="submit" class="submitInput" id="submitInput1">Submit</button></td>
                        </tr>
                    </table>
                    <br>

                    <table class="inputWIndow" id="theTable2">
                        <tr>
                            <td><input type="text" class="titleInput" id="titleInput2" placeholder="Enter Title2" name="titleInput2"><button type="button" class="xButton" id="xButton2">X</button></td>
                        </tr>

                        <tr>
                            <td><textarea rows="30" cols="50" placeholder="Enter Newsfeed here..." id="newsFeed2" name="content2"></textarea></td>
                        </tr>
                        
                        <tr>
                            <td><button type="submit" class="submitInput" id="submitInput2">Submit</button></td>
                        </tr>

                    </table>
                    <br>

                    <table class="inputWIndow" id="theTable3">
                        <tr>
                            <td><input type="text" class="titleInput" id="titleInput3" placeholder="Enter Title3" name="titleInput3"><button type="button" class="xButton" id="xButton3">X</button></td>
                        </tr>

                        <tr>
                            <td><textarea rows="30" cols="50" placeholder="Enter Newsfeed here..." id="newsFeed3" name="content3"></textarea></td>
                        </tr>
                        
                        <tr>
                            <td><button type="submit" class="submitInput" id="submitInput3">Submit</button></td>
                        </tr>
                        
                    </table>
                    <br>

                    <table class="inputWIndow" id="theTable4">
                        <tr>
                            <td><input type="text" class="titleInput" id="titleInput4" placeholder="Enter Title" name="titleInput4"><button type="button" class="xButton" id="xButton4">X</button></td>
                        </tr>

                        <tr>
                            <td><textarea rows="30" cols="50" placeholder="Enter Newsfeed here..." id="newsFeed4" name="content4"></textarea></td>
                        </tr>
                        
                        <tr>
                            <td><button type="submit" class="submitInput" id="submitInput4">Submit</button></td>
                        </tr>

                    </table>
                    <br>

                    <table class="inputWIndow" id="theTable5">
                        <tr>
                            <td><input type="text" class="titleInput" id="titleInput5" placeholder="Enter Title" name="titleInput5"><button type="button" class="xButton" id="xButton5">X</button></td>
                        </tr>

                        <tr>
                            <td><textarea rows="30" cols="50" placeholder="Enter Newsfeed here..." id="newsFeed5" name="content5"></textarea></td>
                        </tr>
                        
                        <tr>
                            <td><button type="submit" class="submitInput" id="submitInput5">Submit</button></td>
                        </tr>
                    </table>
                    <br>
                    <br>
                    <br>
                    <br>
                </form>
            </div>

            <div class="footer">
                <footer>
                    <table id="footerDiv">
                        <tr>
                            <td><h3>Add Another News Feed Window<button type="button" id="addNewFeed" >Add Window</button></h3></td>
                        </tr>
                    </table>
                </footer>
            </div>
        </div>
        
        <script>
        $(document).ready(function() {
            // hides and shows the submit button for ttable one
            $(".submitInput").css("visibility","hidden"); 
            var count = 1;
            var submition = 2;
            
            /**
             * adds a new news feed window where the user can type in another data
             */
            $("#addNewFeed").click(function(){
                $(".submitInput").css("display","none"); 
                if(submition < 6){
                var xRemove = "#xButton"+count;
                var table = "#theTable"+submition;
                $(xRemove).hide();
                $(table).css("display", "table");
                console.log(table);
                submition++;
                count++;
                $("#submitAll").css("display", "table");
                }else{
                alert("You have reached the maximum number of simultaneous updload. Please Submit and reload the page. Thank You!");
                }
            });
            
            /**
             * responsible for submitting multiple news feed data
             */
            $("#submitAllButton").click(function() {
                $("#submitInput1").click(); //clicks the specific button
                $("#submitInput2").click();
                $("#submitInput3").click();
                $("#submitInput4").click();
                $("#submitInput5").click();
            });
            
            /**
             * show the submit button if the title and text area are filled
             */
            $("#newsFeed1").keyup(function(){
                if($(this).val()===""){
                    $(".submitInput").css("visibility","hidden"); 
                }else{
                     $(".submitInput").css("visibility","visible"); 
                }
            });
            
            
            //removes the specified table if the xButton is clicked
            $("#xButton1").click(function(){
                $("#theTable1").remove();
                count--;
            });
            
            //removes the specified table if the xButton is clicked
            $("#xButton2").click(function(){
                $("#theTable2").remove();
                $("#xButton1").show();
                count--;
            });
            
            //removes the specified table if the xButton is clicked
            $("#xButton3").click(function(){
                $("#theTable3").remove();
                $("#xButton2").show();
                count--;
            });
            
            //removes the specified table if the xButton is clicked
            $("#xButton4").click(function(){
                $("#theTable4").remove();
                $("#xButton3").show();
                count--;
            });
            
            //removes the specified table if the xButton is clicked
            $("#xButton5").click(function(){
                $("#theTable5").remove();
                $("#xButton4").show();
                count--;
            });
        });
        </script>
        
    </body>
</html>
