<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $stageTitle }} Pre-Assessment</title>
    <style>
  :root{
    /* Dashboard palette */
    --primary-purple:#7B2CBF;   /* headers / accents */
    --secondary-purple:#9D4EDD; /* buttons / highlights */
    --accent-purple:#5A189A;    /* hovers / emphasis */
    --incorrect-red:#F44336;

    --bg:#fafafa;
    --panel:#ffffff;
    --muted:#555;
    --border:#d2b7f0;           /* subtle purple border */
  }

  body{
    font-family: 'Arial Rounded MT Bold', sans-serif;
    background: var(--bg);
    color:#222;
    margin:0;
    padding:20px;
  }

  .quiz-container{
    max-width:800px;
    margin:2rem auto;
    padding:2rem;
    background: var(--panel);
    border: 2px solid var(--border);
    border-radius:20px;
    box-shadow:0 0 10px rgba(0,0,0,.05);
  }

  .question-container{display:none;}
  .question-container.active{display:block; animation:fadeIn .5s;}
  @keyframes fadeIn{from{opacity:0}to{opacity:1}}

  .question-text{
    font-size:1.3rem;
    color: var(--primary-purple);
    margin-bottom:1.5rem;
  }

  .options{margin-left:1rem;}

  .option{
    margin:1rem 0;
    padding:1rem;
    background:#f7f4fe;                 /* very light purple */
    border-radius:10px;
    border:1px solid var(--border);
    transition:all .3s;
  }
  .option:hover{
    background:#f2e9ff;
    border-color: var(--secondary-purple);
  }

  .option label{display:flex; align-items:center; cursor:pointer;}
  .option input[type="radio"]{
    margin-right:1rem;
    accent-color: var(--secondary-purple);
  }

  .quiz-nav{
    display:flex;
    justify-content:space-between;
    margin-top:2rem;
  }

  .quiz-btn{
    background: var(--secondary-purple);
    color:#fff;
    border:none;
    padding:.8rem 1.5rem;
    border-radius:30px;
    font-weight:bold;
    cursor:pointer;
    transition:all .3s;
  }
  .quiz-btn:hover{
    background: var(--accent-purple);
    transform:scale(1.05);
  }
  .quiz-btn:disabled{
    background:#e6e2f6;
    color:#9a8ec7;
    cursor:not-allowed;
  }

  #submit-btn{
    background: var(--primary-purple);
    color:#fff;
    display:none;
  }
  #submit-btn:hover{
    background: var(--accent-purple);
    box-shadow:0 0 12px rgba(123,44,191,.4);
  }

  .result-container{
    display:none;
    text-align:center;
    padding:2rem;
    margin-top:2rem;
    background: var(--panel);
    border-radius:20px;
    border:2px solid var(--border);
  }

  .score{
    font-size:2rem;
    font-weight:bold;
    margin:1rem 0;
    color:#222;
  }
  .perfect-score{
    color:#2e7d32;
    text-shadow:none;
  }
  .low-score{color: var(--incorrect-red);}

  .progress-indicator{
    text-align:center;
    margin:1rem 0;
    color: var(--muted);
  }
</style>

</head>
<body>
    <div class="quiz-container">
        <h1>{{ $stageTitle }} Pre-Assessment</h1>
        <p style="text-align: center;">Answer these 5 questions to unlock levels</p>
        
        <form id="quiz-form">
            <!-- Question 1 -->
            <div class="question-container active" id="question-1">
                <div class="question-text">1. What symbol is used for single-line comments in Python?</div>
                <div class="options">
                    <div class="option">
                        <label>
                            <input type="radio" name="q1" value="a" required> //
                        </label>
                    </div>
                    <div class="option">
                        <label>
                            <input type="radio" name="q1" value="b" required> #
                        </label>
                    </div>
                    <div class="option">
                        <label>
                            <input type="radio" name="q1" value="c" required> --
                        </label>
                    </div>
                </div>
                <div class="quiz-nav">
                    <button type="button" class="quiz-btn" disabled>Previous</button>
                    <button type="button" class="quiz-btn next-btn">Next</button>
                </div>
            </div>
            
            <!-- Question 2 -->
            <div class="question-container" id="question-2">
                <div class="question-text">2. Which of these is NOT a valid Python data type?</div>
                <div class="options">
                    <div class="option">
                        <label>
                            <input type="radio" name="q2" value="a" required> int
                        </label>
                    </div>
                    <div class="option">
                        <label>
                            <input type="radio" name="q2" value="b" required> str
                        </label>
                    </div>
                    <div class="option">
                        <label>
                            <input type="radio" name="q2" value="c" required> char
                        </label>
                    </div>
                </div>
                <div class="quiz-nav">
                    <button type="button" class="quiz-btn prev-btn">Previous</button>
                    <button type="button" class="quiz-btn next-btn">Next</button>
                </div>
            </div>
            
            <!-- Question 3 -->
            <div class="question-container" id="question-3">
                <div class="question-text">3. What is the output of: print(3 + 2 * 2)</div>
                <div class="options">
                    <div class="option">
                        <label>
                            <input type="radio" name="q3" value="a" required> 10
                        </label>
                    </div>
                    <div class="option">
                        <label>
                            <input type="radio" name="q3" value="b" required> 7
                        </label>
                    </div>
                    <div class="option">
                        <label>
                            <input type="radio" name="q3" value="c" required> 12
                        </label>
                    </div>
                </div>
                <div class="quiz-nav">
                    <button type="button" class="quiz-btn prev-btn">Previous</button>
                    <button type="button" class="quiz-btn next-btn">Next</button>
                </div>
            </div>
            
            <!-- Question 4 -->
            <div class="question-container" id="question-4">
                <div class="question-text">4. How do you create a variable with the value 5?</div>
                <div class="options">
                    <div class="option">
                        <label>
                            <input type="radio" name="q4" value="a" required> variable = 5
                        </label>
                    </div>
                    <div class="option">
                        <label>
                            <input type="radio" name="q4" value="b" required> 5 = variable
                        </label>
                    </div>
                    <div class="option">
                        <label>
                            <input type="radio" name="q4" value="c" required> var variable 5
                        </label>
                    </div>
                </div>
                <div class="quiz-nav">
                    <button type="button" class="quiz-btn prev-btn">Previous</button>
                    <button type="button" class="quiz-btn next-btn">Next</button>
                </div>
            </div>
            
            <!-- Question 5 -->
            <div class="question-container" id="question-5">
                <div class="question-text">5. What does the print() function do?</div>
                <div class="options">
                    <div class="option">
                        <label>
                            <input type="radio" name="q5" value="a" required> Creates a new file
                        </label>
                    </div>
                    <div class="option">
                        <label>
                            <input type="radio" name="q5" value="b" required> Displays output to the screen
                        </label>
                    </div>
                    <div class="option">
                        <label>
                            <input type="radio" name="q5" value="c" required> Performs a calculation
                        </label>
                    </div>
                </div>
                <div class="quiz-nav">
                    <button type="button" class="quiz-btn prev-btn">Previous</button>
                    <button type="button" id="submit-btn">Submit Quiz</button>
                </div>
            </div>
            
            <div class="progress-indicator" id="progress">
                Question 1 of 5
            </div>
        </form>
        
        <div class="result-container" id="result-container">
            <h2>Your Results</h2>
            <div id="score-display" class="score"></div>
            <div id="unlock-message"></div>
            <a href="/dashboard" class="quiz-btn" style="margin-top: 1rem;">Continue to Learning</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const questions = document.querySelectorAll('.question-container');
            const nextButtons = document.querySelectorAll('.next-btn');
            const prevButtons = document.querySelectorAll('.prev-btn');
            const submitButton = document.getElementById('submit-btn');
            const progressIndicator = document.getElementById('progress');
            const resultContainer = document.getElementById('result-container');
            const scoreDisplay = document.getElementById('score-display');
            const unlockMessage = document.getElementById('unlock-message');
            const continueBtn = document.querySelector('#result-container .quiz-btn');
            
            let currentQuestion = 0;
            
            // Update progress indicator
            function updateProgress() {
                progressIndicator.textContent = `Question ${currentQuestion + 1} of ${questions.length}`;
            }
            
            // Show current question
            function showQuestion(index) {
                questions.forEach((q, i) => {
                    q.classList.toggle('active', i === index);
                });
                
                // Hide submit button until last question
                submitButton.style.display = (index === questions.length - 1) ? 'block' : 'none';
                
                updateProgress();
            }
            
            // Next button click
            nextButtons.forEach(button => {
                button.addEventListener('click', function() {
                    if (currentQuestion < questions.length - 1) {
                        currentQuestion++;
                        showQuestion(currentQuestion);
                    }
                });
            });
            
            // Previous button click
            prevButtons.forEach(button => {
                button.addEventListener('click', function() {
                    if (currentQuestion > 0) {
                        currentQuestion--;
                        showQuestion(currentQuestion);
                    }
                });
            });
            
            // Submit quiz
            submitButton.addEventListener('click', async function() {
                const answers = {
                    q1: 'b', // #
                    q2: 'c', // char
                    q3: 'b', // 7
                    q4: 'a', // variable = 5
                    q5: 'b'  // Displays output
                };
                
                let score = 0;
                
                // Check answers
                for (let i = 1; i <= questions.length; i++) {
                    const selected = document.querySelector(`input[name="q${i}"]:checked`);
                    if (selected && selected.value === answers[`q${i}`]) {
                        score++;
                    }
                }
                
                // Calculate percentage
                const percentage = (score / questions.length) * 100;
                
                // Display results
                scoreDisplay.textContent = `Score: ${score}/${questions.length}`;
                
                if (score === questions.length) {
                    scoreDisplay.className = 'score perfect-score';
                    unlockMessage.innerHTML = `
                        <p>🎉 Perfect score! All levels unlocked!</p>
                        <p>You can start with any level you want.</p>
                    `;
                    continueBtn.href = "{{ route('stage.level', ['stage' => $stageName, 'level' => 1]) }}";
                    
                    // Unlock all levels (server-side)
                    try {
                        const response = await fetch('/stage/{{ $stageName }}/submit-assessment', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                score: percentage,
                                unlocked_all: true
                            })
                        });
                        
                        if (!response.ok) {
                            throw new Error('Failed to save results');
                        }
                    } catch (error) {
                        console.error('Error:', error);
                    }
                } else {
                    scoreDisplay.className = 'score low-score';
                    unlockMessage.innerHTML = `
                        <p>You unlocked Level 1. Complete it to unlock more levels!</p>
                    `;
                    continueBtn.href = "{{ route('stage.level', ['stage' => $stageName, 'level' => 1]) }}";
                }
                
                // Show results
                resultContainer.style.display = 'block';
                resultContainer.scrollIntoView({ behavior: 'smooth' });
            });
            
            // Initialize
            showQuestion(0);
        });
    </script>
</body>
</html>