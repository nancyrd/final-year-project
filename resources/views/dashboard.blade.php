<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PYTHON QUEST: ULTRA GAMIFIED</title>
  <style>
    /* === OUTRAGEOUS STYLES === */
    :root {
      --python-yellow: #FFD43B;
      --python-blue: #4B8BBE;
      --python-dark: #306998;
      --neon-pink: #FF10F0;
      --neon-green: #39FF14;
      --neon-purple: #9400D3;
      --matrix-green: #00FF41;
    }

    @keyframes rainbow {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }

    @keyframes pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.05); }
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Comic Sans MS', 'Arial Rounded MT Bold', sans-serif;
      background: #000 url('data:image/svg+xml;utf8,<svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h100v100H0z" fill="%23000"/><path d="M20 20h60v60H20z" fill="%23111" stroke="%23339" stroke-width="2"/></svg>');
      color: white;
      overflow-x: hidden;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
      position: relative;
    }

    /* === HEADER: 8-BIT GAME TITLE === */
    .game-header {
      background: linear-gradient(45deg, var(--neon-pink), var(--neon-green), var(--neon-purple));
      background-size: 400% 400%;
      animation: rainbow 5s infinite;
      padding: 20px;
      border-radius: 20px;
      text-align: center;
      margin-bottom: 30px;
      border: 5px dashed white;
      box-shadow: 0 0 30px var(--neon-pink);
    }

    .game-header h1 {
      font-size: 3.5rem;
      margin: 0;
      text-shadow: 5px 5px 0 black, -2px -2px 0 var(--python-yellow);
      letter-spacing: 3px;
    }

    .game-header p {
      font-size: 1.5rem;
      margin: 10px 0 0;
      text-shadow: 2px 2px 0 black;
    }

    /* === PLAYER STATS: RPG-STYLE === */
    .player-stats {
      display: flex;
      justify-content: space-between;
      background: rgba(0, 0, 0, 0.7);
      border: 3px solid var(--python-yellow);
      border-radius: 15px;
      padding: 15px;
      margin-bottom: 30px;
      box-shadow: 0 0 20px var(--python-blue);
    }

    .stat-box {
      text-align: center;
      padding: 10px;
      flex: 1;
      position: relative;
    }

    .stat-box::after {
      content: "";
      position: absolute;
      right: 0;
      top: 10%;
      height: 80%;
      width: 2px;
      background: linear-gradient(to bottom, transparent, var(--neon-green), transparent);
    }

    .stat-box:last-child::after {
      display: none;
    }

    .stat-value {
      font-size: 2.5rem;
      font-weight: bold;
      margin: 5px 0;
      color: var(--python-yellow);
      text-shadow: 0 0 10px var(--neon-pink);
    }

    .stat-label {
      font-size: 1rem;
      color: white;
      text-transform: uppercase;
    }

    /* === STAGES: GAME WORLD MAP === */
    .stage {
      background: rgba(0, 0, 0, 0.8);
      border: 4px solid var(--python-blue);
      border-radius: 20px;
      margin-bottom: 30px;
      overflow: hidden;
      box-shadow: 0 0 25px var(--python-dark);
      position: relative;
    }

    .stage::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 5px;
      background: linear-gradient(90deg, var(--neon-pink), var(--neon-green), var(--neon-purple));
    }

    .stage-header {
      background: linear-gradient(90deg, var(--python-dark), var(--python-blue));
      padding: 15px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .stage-title-container {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .stage-title {
      font-size: 1.8rem;
      margin: 0;
      color: var(--python-yellow);
      text-shadow: 2px 2px 0 black;
    }

    .start-stage-btn {
      background: var(--neon-green);
      color: black;
      border: none;
      padding: 8px 20px;
      border-radius: 30px;
      font-weight: bold;
      cursor: pointer;
      box-shadow: 0 0 15px var(--neon-green);
      transition: all 0.3s;
      white-space: nowrap;
    }

    .start-stage-btn:hover {
      transform: scale(1.05);
      box-shadow: 0 0 25px var(--neon-green);
    }

    .stage-status {
      background: black;
      color: white;
      padding: 5px 15px;
      border-radius: 20px;
      font-weight: bold;
      border: 2px solid var(--neon-green);
    }

    .stage-status.completed {
      background: var(--neon-green);
      color: black;
    }

    .stage-status.in-progress {
      background: var(--python-yellow);
      color: black;
      animation: pulse 2s infinite;
    }

    .stage-status.locked {
      background: #333;
      color: #999;
    }

    .levels-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 20px;
      padding: 20px;
    }

    /* === LOCKED LEVEL CARDS === */
    .level-card {
      background: rgba(30, 30, 30, 0.9);
      border-radius: 15px;
      padding: 20px;
      border: 2px solid #444;
      position: relative;
      overflow: hidden;
      opacity: 0.7;
    }

    .level-card::before {
      content: "🔒";
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 3rem;
      opacity: 0.3;
    }

    .level-title {
      font-size: 1.5rem;
      margin: 0 0 10px;
      color: #aaa;
    }

    .level-desc {
      font-size: 0.9rem;
      color: #666;
      margin: 0 0 15px;
    }

    .level-status {
      position: absolute;
      top: 15px;
      right: 15px;
      background: #333;
      color: #999;
      padding: 3px 10px;
      border-radius: 15px;
      font-size: 0.8rem;
      border: 1px solid #555;
    }

    .level-progress {
      height: 10px;
      background: #333;
      border-radius: 5px;
      margin-top: 15px;
      overflow: hidden;
    }

    .level-progress-bar {
      height: 100%;
      background: #444;
      border-radius: 5px;
      width: 0% !important;
    }

    .level-hint {
      margin-top: 15px;
      padding: 10px;
      background: rgba(0, 0, 0, 0.5);
      border-left: 3px solid var(--neon-purple);
      font-style: italic;
      color: #666;
      position: relative;
    }

    .level-hint::before {
      content: "💡";
      position: absolute;
      left: -25px;
      top: 5px;
      font-size: 1.2rem;
      animation: float 3s infinite;
    }

    /* === SPECIAL EFFECTS === */
    .floating-snake {
      position: fixed;
      bottom: 20px;
      right: 20px;
      font-size: 4rem;
      animation: float 3s infinite, spin 10s linear infinite;
      filter: drop-shadow(0 0 10px var(--neon-green));
      z-index: 100;
      cursor: pointer;
    }

    .matrix-rain {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      opacity: 0.05;
      pointer-events: none;
    }
  </style>
</head>
<body>
  <!-- MATRIX RAIN BACKGROUND (VISUAL EFFECT) -->
  <div class="matrix-rain"></div>

  <!-- FLOATING PYTHON MASCOT -->
  <div class="floating-snake">🐍</div>

  <div class="container">
    <!-- GAME HEADER -->
    <header class="game-header">
      <h1>PYTHON QUEST</h1>
      <p>Level up your coding skills in this epic adventure!</p>
    </header>

    <!-- PLAYER STATS -->
    <div class="player-stats">
      <div class="stat-box">
        <div class="stat-label">Level</div>
        <div class="stat-value">5</div>
        <div class="stat-label">Code Novice</div>
      </div>
      <div class="stat-box">
        <div class="stat-label">XP</div>
        <div class="stat-value">1,240</div>
        <div class="stat-label">Points</div>
      </div>
      <div class="stat-box">
        <div class="stat-label">Streak</div>
        <div class="stat-value">7</div>
        <div class="stat-label">Days 🔥</div>
      </div>
      <div class="stat-box">
        <div class="stat-label">Coins</div>
        <div class="stat-value">320</div>
        <div class="stat-label">🪙</div>
      </div>
    </div>

    <!-- STAGE 1: VARIABLES CASTLE -->
   <div class="stage">
  <div class="stage-header">
    <div class="stage-title-container">
      <h2 class="stage-title">🏰 Variables Castle</h2>

      @php
          $unlocked = $stageData['variables']['unlocked_levels'] ?? [];
          $score = $stageData['variables']['score'] ?? null;
      @endphp

      @if ($score)
        <p style="color:lime; font-weight:bold;">Previous Score: {{ $score }}%</p>
      @endif

      <a href="{{ route('stage.pre-assessment', ['stageName' => 'variables']) }}" class="start-stage-btn">
        Start Level
      </a>
    </div>
    <span class="stage-status {{ $score >= 80 ? 'completed' : ($score ? 'in-progress' : 'locked') }}">
      {{ $score >= 80 ? 'COMPLETED' : ($score ? 'IN PROGRESS' : 'LOCKED') }}
    </span>
  </div>

  <div class="levels-container">
    @for ($i = 1; $i <= 3; $i++)
    <div class="level-card {{ in_array($i, $unlocked) ? '' : 'locked' }}">
      <span class="level-status {{ in_array($i, $unlocked) ? 'in-progress' : 'locked' }}">
        {{ in_array($i, $unlocked) ? 'UNLOCKED' : 'LOCKED' }}
      </span>

      <h3 class="level-title">Level {{ $i }}: @switch($i)
        @case(1) Basic Variables @break
        @case(2) Data Types @break
        @case(3) Type Conversion @break
      @endswitch</h3>

      <p class="level-desc">
        @switch($i)
          @case(1) Store and use simple data @break
          @case(2) Numbers, strings, and booleans @break
          @case(3) Change data types magically @break
        @endswitch
      </p>

      <div class="level-progress">
        <div class="level-progress-bar"></div>
      </div>

      <div class="level-hint">
        @switch($i)
          @case(1) "Variables are like labeled treasure chests!" @break
          @case(2) "type() is your inspection spell!" @break
          @case(3) "int(), float(), str() are your transformation spells!" @break
        @endswitch
      </div>
    </div>
    @endfor
  </div>
</div>
      
     
    <!-- STAGE 2: LOOPS LAGOON -->
    <div class="stage">
      <div class="stage-header">
        <div class="stage-title-container">
          <h2 class="stage-title">🌊 Loops Lagoon</h2>
          <a href="/stage/loops" class="start-stage-btn">Start Level</a>
        </div>
        <span class="stage-status locked">LOCKED</span>
      </div>
      <div class="levels-container">
        <!-- LEVEL 1 -->
        <div class="level-card">
          <span class="level-status locked">LOCKED</span>
          <h3 class="level-title">Level 1: For Loops</h3>
          <p class="level-desc">Iterate through sequences</p>
          <div class="level-progress">
            <div class="level-progress-bar"></div>
          </div>
          <div class="level-hint">
            "Like a rollercoaster going through each car!"
          </div>
        </div>
        
        <!-- LEVEL 2 -->
        <div class="level-card">
          <span class="level-status locked">LOCKED</span>
          <h3 class="level-title">Level 2: While Loops</h3>
          <p class="level-desc">Repeat while true</p>
          <div class="level-progress">
            <div class="level-progress-bar"></div>
          </div>
          <div class="level-hint">
            "Don't forget to update your condition or you'll loop forever!"
          </div>
        </div>
        
        <!-- LEVEL 3 -->
        <div class="level-card">
          <span class="level-status locked">LOCKED</span>
          <h3 class="level-title">Level 3: Nested Loops</h3>
          <p class="level-desc">Loops within loops</p>
          <div class="level-progress">
            <div class="level-progress-bar"></div>
          </div>
          <div class="level-hint">
            "Complete Level 2 or score 85+ on pre-assessment!"
          </div>
        </div>
      </div>
    </div>

    <!-- STAGE 3: FUNCTIONS FORTRESS -->
    <div class="stage">
      <div class="stage-header">
        <div class="stage-title-container">
          <h2 class="stage-title">⚔️ Functions Fortress</h2>
          <a href="/stage/functions" class="start-stage-btn">Start Level</a>
        </div>
        <span class="stage-status locked">LOCKED</span>
      </div>
      <div class="levels-container">
        <!-- LEVEL 1 -->
        <div class="level-card">
          <span class="level-status locked">LOCKED</span>
          <h3 class="level-title">Level 1: Basic Functions</h3>
          <p class="level-desc">Define and call functions</p>
          <div class="level-progress">
            <div class="level-progress-bar"></div>
          </div>
          <div class="level-hint">
            "Functions are like magic spells you can reuse!"
          </div>
        </div>
        
        <!-- LEVEL 2 -->
        <div class="level-card">
          <span class="level-status locked">LOCKED</span>
          <h3 class="level-title">Level 2: Parameters</h3>
          <p class="level-desc">Pass data into functions</p>
          <div class="level-progress">
            <div class="level-progress-bar"></div>
          </div>
          <div class="level-hint">
            "Parameters are ingredients for your function spells!"
          </div>
        </div>
        
        <!-- LEVEL 3 -->
        <div class="level-card">
          <span class="level-status locked">LOCKED</span>
          <h3 class="level-title">Level 3: Return Values</h3>
          <p class="level-desc">Get data back from functions</p>
          <div class="level-progress">
            <div class="level-progress-bar"></div>
          </div>
          <div class="level-hint">
            "Return is like the result of your magic spell!"
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>