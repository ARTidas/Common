$(document).ready(function() {
    let questions = [];
    let currentQuestionIndex = 0;

    // Fetch questions from the JSON file
    $.getJSON(trivia_json_file_url, function(data) {
        questions = data;
        updateQuestionCounter(); // Update total number after fetching
    });

    // Start button click event
    $("#start-button").on("click", function() {
        $("#welcome-screen").hide();
        $("#trivia-content").show();
        displayQuestion();
    });

    // Function to shuffle answers
    function shuffle(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
    }

    // Function to display the current question and shuffled answers
    function displayQuestion() {
        $("#next-question").hide();
        const question = questions[currentQuestionIndex];
        $("#question").text(question.question);
    
        // Create a shuffled list of answers
        const answers = [...question.answers];
        shuffle(answers);
    
        // Display answers with initial color (same as background) and apply the fade-in effect
        $("#answers").empty();
        answers.forEach(answer => {
            const answerButton = $("<button>")
                .addClass("answer-button")
                .text(answer)
                .on("click", () => checkAnswer(answer, question.answers[0]));
            $("#answers").append(answerButton);
        });
    
        // Trigger the fade-in effect by adding the 'visible' class after a short delay
        setTimeout(() => {
            $(".answer-button").addClass("visible");
        }, 3000); // Small delay to ensure the initial color is applied

        // Update question counter
        updateQuestionCounter();
    }

    // Function to check if the selected answer is correct
    function checkAnswer(selectedAnswer, correctAnswer) {
        $(".answer-button").off("click"); // Disable further clicks temporarily
        if (selectedAnswer === correctAnswer) {
            $(`button:contains(${selectedAnswer})`).addClass("correct");

            // Add a slight delay before allowing the click to proceed
            setTimeout(() => {
                $(document).one("click", nextQuestion);
            }, 500);
        } else {
            $(`button:contains(${selectedAnswer})`).addClass("incorrect");
            setTimeout(() => {
                // Allow re-selection by re-enabling the buttons
                //$(".answer-button").removeClass("incorrect").on("click", function() {
                $(".answer-button").on("click", function() {
                    checkAnswer($(this).text(), correctAnswer);
                });
            }, 1000); // Flash red and re-enable buttons after a delay
        }
    }

    // Function to proceed to the next question
    function nextQuestion() {
        currentQuestionIndex++;
        if (currentQuestionIndex < questions.length) {
            displayQuestion();
        } else {
            $("#question").text("Trivia complete!");
            $("#answers").empty();
            $("#question-counter").hide(); // Hide counter on completion
        }
    }

    // Function to update the question counter
    function updateQuestionCounter() {
        $("#question-counter").text(`Question ${currentQuestionIndex + 1} / ${questions.length}`);
    }

});