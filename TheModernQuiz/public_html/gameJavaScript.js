/**
Leslie Col-iteng 000772220
Date: December 4 2018

This is the javscript file for the index.html
It handles a click event that from the index html.
It gets the input from the user and determines if it is the right answer.
Hides and shows table one at a time.

I, Leslie Col-iteng, 000772220, certify that this material 
is my original work. No other person's work has been used 
without due acknowledgement.
*/



/**
 * sets and displays the score
 * @type Number
 */
var score = 0;

/**
 * keeps track of the question number
 * @type Number
 */
var questionCounter = 0;

/**
 * Shows the question, gets the user input and determines if the answer is correct.
 * 
 * @param {type} whichQuestion - keeps track of which submit button was used
 * @returns {undefined}
 */
function load(whichQuestion) {
    
     //checks the answer for question 1
     //hides this table and reveals the 2nd table
     // updates the score on the second table
    if (whichQuestion === "question1"){
        if((document.getElementById('optionC1').checked))
        {
            score = score + 1;
            document.getElementById("score2").innerHTML = score;
            document.getElementById('question1Table').style.display = 'none';
            document.getElementById('question2Table').style.display = "table";
        }else if(!(document.getElementById('optionA1').checked) && !(document.getElementById('optionB1').checked) && !(document.getElementById('optionC1').checked) && !(document.getElementById('optionD1').checked)){
            document.getElementById('status1').innerHTML = "Please Select one of the choices";
        }else{
            document.getElementById('question1Table').style.display = 'none';
            document.getElementById('question2Table').style.display = "table";
        }
        questionCounter++;
    }
    
    //checks the answer for question 2
    //hides this table and reveals the 3rd table
    //updates the score on the 3rd table
    if(whichQuestion === "question2"){
        if(((document.getElementById('answerQ2').value) === '2'))
        {
            score = score + 1;
            document.getElementById('question2Table').style.display = 'none';
            document.getElementById("score3").innerHTML = score;
            document.getElementById('question3Table').style.display = 'table';
        }else if(document.getElementById('answerQ2').value === null || document.getElementById('answerQ2').value === ""){
            document.getElementById('status2').innerHTML = "Please Enter a number";
        }else{
            document.getElementById('question2Table').style.display = 'none';
            document.getElementById("score3").innerHTML = score;
            document.getElementById('question3Table').style.display = 'table';
        }
        questionCounter++;
    }
    
    //checks the answer for question 3
    //hides this table and reveals the 4th table
    //updates the score on the 4th table
    if(whichQuestion === "question3"){
        if(document.getElementById("optionFalse3").checked){
            score = score + 1;
            document.getElementById('question3Table').style.display = 'none';
            document.getElementById('question4Table').style.display = 'table';
            document.getElementById("score4").innerHTML = score;
        }else if(!(document.getElementById("optionFalse3").checked) && !(document.getElementById("optionTrue3").checked)){
            document.getElementById('status3').innerHTML = "Please Select True or False";
        }else{
            document.getElementById('question3Table').style.display = 'none';
            document.getElementById('question4Table').style.display = 'table';
            document.getElementById("score4").innerHTML = score;    
        }
        questionCounter++;
    } 
    
    //checks the answer for question 4
    //hides this table and reveals the 5th table
    //updates the score on the 5th table
    if(whichQuestion === "question4"){
        if(document.getElementById("question4").value === "8"){
            score = score + 1;
            document.getElementById('question4Table').style.display = 'none';
            document.getElementById('question5Table').style.display = 'table';
            document.getElementById("score5").innerHTML = score;
        }else if(document.getElementById("question4").value === null){
            document.getElementById('status4').innerHTML = "Please Select from one of the options";
        }else{
            document.getElementById('question4Table').style.display = 'none';
            document.getElementById('question5Table').style.display = 'table';
            document.getElementById("score5").innerHTML = score;
        }
        questionCounter++;
    }
    
    //checks the answer for question 5
    //hides this table and reveals the results table
    if(whichQuestion === "question5"){
        if(document.getElementById("optionB5").checked){
            score = score + 1;
            document.getElementById('question5Table').style.display = 'none';
            document.getElementById('resultTable').style.display = 'table';
            document.getElementById("score5").innerHTML = score; 
        }else if(!(document.getElementById("optionA5").checked) && !(document.getElementById("optionB5").checked) && !(document.getElementById("optionC5").checked) && !(document.getElementById("optionD5").checked)){
            document.getElementById('status5').innerHTML = "Please select one from the options";
        }else{
            document.getElementById('question5Table').style.display = 'none';
            document.getElementById('resultTable').style.display = 'table';
            document.getElementById("score5").innerHTML = score;
        }
        questionCounter++;
    }
    
    console.log(score);
    console.log(document.getElementById("question4").value);
    console.log(document.getElementById('answerQ2').value);
}

/**
 * 
 * Shows and Animates the progress bar and result
 * 
 * @returns {undefined}
 */
function move(){
            /**
             * displays the progress bar
             * @type Element progress bar
             */
            var progressBar = document.getElementById("progressBar");
            /**
             * width of the progress bar
             * @type Number
             */
            var width = 1;
            /**
             * determines the max width of the progress bar
             * @type Number
             */
            var maxWidth = score * 20;
            /**
             * Sets the speed on how fast the image is updated each width increment
             * @type type
             */
            var interval = setInterval(fill, 15);
            
            
            /**
             * Increment the witdth of the progress bar, stop when it is equal to the maxWidth
             * @returns {undefined}
             */
            function fill(){
                if(width >= maxWidth){
                    clearInterval(interval);
                }else{
                    //RGB values
                    var red = 255;
                    var green = 215 - width;
                    var blue = 128 - (width + 30);
                    width++;
                    progressBar.style.width = width + '%';
                    progressBar.style.backgroundColor = 'rgb('+red+','+green+','+blue+')'; //change color while incrementing
                }
                
                // determines the the text and color of the text based on the score
                if(width === 1){
                    document.getElementById("scoreLabel").style.color = 'rgb(153, 0, 0)';
                    document.getElementById("scoreLabel").innerHTML = "0/5";
                    document.getElementById("finalResult").style.color = 'rgb(153, 0, 0)';
                    document.getElementById("finalResult").innerHTML = "Very Bad! You are a Die-Hard Conspiracy Theorist. Know your Facts!";
                }else if((width <= 20) && (width > 1)){
                    document.getElementById("scoreLabel").style.color = 'rgb(255, 153, 51)';
                    document.getElementById("scoreLabel").innerHTML = "1/5";
                    document.getElementById("finalResult").style.color = 'rgb(255, 153, 51)';
                    document.getElementById("finalResult").innerHTML = "Bad!, Not everything you read from the internet is true!";
                }else if(width <= 40){
                    document.getElementById("scoreLabel").style.color = 'rgb(255, 204, 0)';
                    document.getElementById("scoreLabel").innerHTML = "2/5";
                    document.getElementById("finalResult").style.color = 'rgb(255, 204, 0)';
                    document.getElementById("finalResult").innerHTML = "Still Bad, Know your facts!";
                }else if(width <= 60){
                    document.getElementById("scoreLabel").style.color = 'rgb(255, 255, 0)';
                    document.getElementById("scoreLabel").innerHTML = "3/5";
                    document.getElementById("finalResult").style.color = 'rgb(255, 255, 0)';
                    document.getElementById("finalResult").innerHTML = "Good, You just need a little bit more reading and you will be on the right track.";
                }else if(width <= 80){
                    document.getElementById("scoreLabel").style.color = 'rgb(204, 255, 102)';
                    document.getElementById("scoreLabel").innerHTML = "4/5";
                    document.getElementById("finalResult").style.color = 'rgb(204, 255, 102)';
                    document.getElementById("finalResult").innerHTML = "Very Good, You might have just misread a questions or something.";
                }else{
                    document.getElementById("scoreLabel").style.color = 'rgb(153, 204, 0)';
                    document.getElementById("scoreLabel").innerHTML = "5/5";
                    document.getElementById("finalResult").style.color = 'rgb(153, 204, 0)';
                    document.getElementById("finalResult").innerHTML = "Excellent, You are a model citezen!";
                }
            }
        }

