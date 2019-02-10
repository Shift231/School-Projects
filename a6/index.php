<!DOCTYPE html>
<!--

Serves as the main page where the user can view his recent news feed. updates every half a second

December, 12, 2018
@author Leslie Col-iteng

I, Leslie Col-iteng, 000772220, certify that this material 
is my original work. No other person's work has been used 
without due acknowledgment. 
-->

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/mainCss.css">
        <script type="text/javascript" src="js/jquery-1.10.0.js"></script>
        <title>UpdateMe!</title>
    </head>
    <body>

        <header>
            <table class="mainHead"> 
                <tr>
                    <td><h1>Your Most Current Feed</h1></td>
                </tr>
            </table>
        </header>
        <br>
        <div id="container">

        </div>
        <script>
            $(document).ready(function () {
                var timer = setInterval(resend, 500); 
                
                /**
                 * resends a request every half a second
                 * 
                 */
                function resend() {
                    var request = new XMLHttpRequest();
                    request.open('GET', 'https://csunix.mohawkcollege.ca/~000772220/private/10065/a6/Json.php');
                    /**
                     * accesses the JSON file that was created by  the Json PHP and creates an array of the objects
                     * 
                     * @returns an array of news feed object
                     */
                    request.onload = function () {
                        var newsData = JSON.parse(request.responseText);
                        $("#container").html("");
                        addNewsFeed(newsData);
                    };
                    request.send();
                }
                /**
                 * 
                 * prepends the informations inside the body element
                 * 
                 * @param {type} data news feed object array
                 * @returns a news feed object data
                 */
                function addNewsFeed(data) {
                    for (var i = 0; i < data.length; i++) {
                        $("#container").prepend("<div><fieldset><legend>" + data[i].Title + "</legend><p>" + data[i].Feed_Content + "</p></fieldset></div><br><br>");
                    }
                }

            });
        </script>

    </body> 
</html>
