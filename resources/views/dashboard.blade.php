<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PYTHON QUEST: ULTRA GAMIFIED</title>
  <style>
    :root{
      --primary-purple:#7B2CBF; /* lighter vibrant purple */
      --secondary-purple:#9D4EDD; /* softer accent purple */
      --accent-purple:#5A189A; /* strong button purple */
      --white:#ffffff;
      --light-gray:#fafafa;
      --dark-gray:#222;
    }

    body{
      margin:0;
      font-family: 'Comic Sans MS','Arial Rounded MT Bold', sans-serif;
      background: var(--light-gray);
      color:var(--dark-gray);
      overflow-x:hidden;
      position:relative;
    }

    /* Neon purple orbs */
    .orb{position:absolute; border-radius:50%; filter:blur(12px); opacity:0.6; animation: float 20s ease-in-out infinite; z-index:-1;}
    .orb.one{width:180px;height:180px; background:radial-gradient(circle, #7B2CBF, #5A189A); top:-40px; left:-40px;}
    .orb.two{width:140px;height:140px; background:radial-gradient(circle, #9D4EDD, #7B2CBF); bottom:-40px; right:-40px;}

    @keyframes float{0%,100%{transform:translateY(0);}50%{transform:translateY(-15px);}}

    .container{max-width:1200px; margin:0 auto; padding:20px; position:relative; z-index:1;}

    .game-header{background: linear-gradient(45deg, var(--primary-purple), var(--secondary-purple)); padding:20px; border-radius:20px; text-align:center; margin-bottom:30px; border:3px solid var(--white); box-shadow:0 0 20px var(--primary-purple); color:var(--white);}
    .game-header h1{font-size:3rem; margin:0;}
    .game-header p{font-size:1.2rem; margin:10px 0 0;}

    .player-stats{display:flex; justify-content:space-between; background:var(--white); border:2px solid var(--primary-purple); border-radius:15px; padding:15px; margin-bottom:30px; box-shadow:0 0 10px rgba(0,0,0,0.05);}
    .stat-box{text-align:center; flex:1; position:relative;}
    .stat-value{font-size:2rem; font-weight:bold; margin:5px 0; color:var(--accent-purple);}
    .stat-label{font-size:.9rem; color:var(--dark-gray); text-transform:uppercase;}

    .stage{background:var(--white); border:2px solid var(--primary-purple); border-radius:15px; margin-bottom:30px; overflow:hidden; box-shadow:0 0 10px rgba(0,0,0,0.05);}
    .stage-header{background:linear-gradient(90deg, var(--primary-purple), var(--secondary-purple)); padding:15px 20px; display:flex; justify-content:space-between; align-items:center; color:var(--white);} 
    .stage-title{font-size:1.5rem; margin:0;}

    .start-stage-btn{background:var(--secondary-purple); color:var(--white); border:none; padding:8px 20px; border-radius:30px; font-weight:bold; cursor:pointer; transition:all .3s; white-space:nowrap;} 
    .start-stage-btn:hover{transform:scale(1.05); box-shadow:0 0 15px var(--accent-purple)}

    .stage-status{background:var(--white); color:var(--accent-purple); padding:5px 15px; border-radius:20px; font-weight:bold; border:2px solid var(--secondary-purple)}
    .stage-status.completed{background:var(--accent-purple); color:var(--white)}
    .stage-status.in-progress{background:var(--secondary-purple); color:var(--white);}
    .stage-status.locked{background:#f3f3fa; color:#555; border:2px solid #d2b7f0;} 

    .levels-container{display:grid; grid-template-columns:repeat(auto-fill, minmax(300px, 1fr)); gap:20px; padding:20px;}
    .level-card{background:var(--light-gray); border-radius:10px; padding:20px; border:2px solid var(--secondary-purple); position:relative;}
    .level-title{font-size:1.2rem; margin:0 0 10px; color:var(--dark-gray)}
    .level-desc{font-size:.9rem; color:#555; margin:0 0 15px;}
    .level-status{position:absolute; top:15px; right:15px; background:var(--white); color:var(--accent-purple); padding:3px 10px; border-radius:15px; font-size:.8rem; border:1px solid var(--secondary-purple)}
    .level-progress{height:10px; background:#ddd; border-radius:5px; margin-top:15px; overflow:hidden;}
    .level-progress-bar{height:100%; background:linear-gradient(90deg, var(--primary-purple), var(--accent-purple)); width:0% !important;}
    .level-hint{margin-top:15px; padding:10px; background:rgba(123,44,191,0.05); border-left:3px solid var(--secondary-purple); font-style:italic; color:#444;}

    .stage-title-container{display:flex; align-items:center; gap:15px;}
    .level-status.locked{background:#f7f7fc; color:#555; border-color:#d2b7f0;}
  </style>
</head>
<body>
  <div class="orb one"></div>
  <div class="orb two"></div>

  <div class="container">
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