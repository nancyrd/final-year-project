<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Purple Dreams</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #8B5CF6 50%, #A855F7 75%, #C084FC 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        /* Animated background elements */
        .bg-animation {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .floating-shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 6s ease-in-out infinite;
        }

        .shape-1 {
            width: 120px;
            height: 120px;
            top: 10%;
            left: 10%;
            animation-delay: -2s;
        }

        .shape-2 {
            width: 80px;
            height: 80px;
            top: 70%;
            right: 15%;
            animation-delay: -4s;
        }

        .shape-3 {
            width: 150px;
            height: 150px;
            bottom: 20%;
            left: 20%;
            animation-delay: -1s;
        }

        .shape-4 {
            width: 60px;
            height: 60px;
            top: 30%;
            right: 30%;
            animation-delay: -3s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(180deg); }
        }

        /* Particle effect */
        .particles {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(255, 255, 255, 0.6);
            border-radius: 50%;
            animation: particle-float 8s linear infinite;
        }

        @keyframes particle-float {
            0% {
                transform: translateY(100vh) scale(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) scale(1);
                opacity: 0;
            }
        }

        /* Main container */
        .container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 40px;
            width: 100%;
            max-width: 480px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 1;
            transform: translateY(0);
            transition: all 0.3s ease;
        }

        .container:hover {
            transform: translateY(-5px);
            box-shadow: 0 35px 70px rgba(0, 0, 0, 0.3);
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }

        .logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #8B5CF6, #EC4899);
            border-radius: 20px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(139, 92, 246, 0.4);
            animation: pulse-glow 2s ease-in-out infinite alternate;
        }

        @keyframes pulse-glow {
            0% { box-shadow: 0 10px 30px rgba(139, 92, 246, 0.4); }
            100% { box-shadow: 0 15px 40px rgba(139, 92, 246, 0.6); }
        }

        .logo::before {
            content: "🔐";
            font-size: 32px;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .title {
            color: white;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 8px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .subtitle {
            color: rgba(255, 255, 255, 0.8);
            font-size: 16px;
            font-weight: 400;
        }

        /* Form styling */
        .form-group {
            margin-bottom: 24px;
            position: relative;
        }

        .form-label {
            display: block;
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
            transition: all 0.3s ease;
        }

        .form-input {
            width: 100%;
            padding: 16px 20px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            color: white;
            font-size: 16px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .form-input:focus {
            outline: none;
            border-color: #A855F7;
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.3);
            transform: scale(1.02);
        }

        .form-input:focus + .input-icon {
            color: #A855F7;
            transform: scale(1.1);
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.5);
            font-size: 20px;
            transition: all 0.3s ease;
            pointer-events: none;
        }

        /* Checkbox styling */
        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 24px;
        }

        .checkbox-input {
            width: 18px;
            height: 18px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 6px;
            margin-right: 12px;
            cursor: pointer;
            position: relative;
            transition: all 0.3s ease;
            appearance: none;
        }

        .checkbox-input:checked {
            background: #A855F7;
            border-color: #A855F7;
        }

        .checkbox-input:checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 12px;
            font-weight: bold;
        }

        .checkbox-label {
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            cursor: pointer;
            user-select: none;
        }

        /* Bottom section */
        .form-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 12px;
        }

        .forgot-link {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
            position: relative;
        }

        .forgot-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 50%;
            background: #A855F7;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .forgot-link:hover::after {
            width: 100%;
        }

        .forgot-link:hover {
            color: #A855F7;
        }

        /* Submit button */
        .submit-btn {
            padding: 16px 32px;
            background: linear-gradient(135deg, #8B5CF6, #EC4899);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(139, 92, 246, 0.4);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .submit-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        /* Loading spinner */
        .spinner {
            width: 18px;
            height: 18px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            display: none;
            margin-right: 8px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Success animation */
        @keyframes success-pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .success {
            animation: success-pulse 0.6s ease-in-out;
        }

        /* Alert message */
        .alert {
            background: rgba(16, 185, 129, 0.2);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #6EE7B7;
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 24px;
            backdrop-filter: blur(10px);
            font-size: 14px;
            display: none;
        }

        .alert.show {
            display: block;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .container {
                margin: 20px;
                padding: 30px 24px;
            }
            
            .title {
                font-size: 28px;
            }

            .form-bottom {
                flex-direction: column;
                gap: 16px;
                align-items: stretch;
            }

            .submit-btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Animated background -->
    <div class="bg-animation">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        <div class="floating-shape shape-3"></div>
        <div class="floating-shape shape-4"></div>
    </div>

    <!-- Particles -->
    <div class="particles" id="particles"></div>

    <div class="container">
        <div class="header">
            <div class="logo"></div>
            <h1 class="title">Welcome Back</h1>
            <p class="subtitle">Login to continue learning Python</p>
        </div>
        
        <!-- Alert message -->
        <div class="alert" id="alertMessage"></div>
        
       <form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Address -->
    <div class="form-group">
        <label for="email" class="form-label">Email Address</label>
        <div class="input-wrapper">
            <input 
                id="email" 
                class="form-input" 
                type="email" 
                name="email" 
                required 
                autofocus 
                placeholder="Enter your email address"
            />
            <span class="input-icon">📧</span>
        </div>
    </div>

    <!-- Password -->
    <div class="form-group">
        <label for="password" class="form-label">Password</label>
        <div class="input-wrapper">
            <input 
                id="password" 
                class="form-input" 
                type="password" 
                name="password" 
                required 
                placeholder="Enter your password"
            />
            <span class="input-icon">🔒</span>
        </div>
    </div>

    <!-- Remember Me -->
    <div class="checkbox-group">
        <input type="checkbox" class="checkbox-input" id="remember_me" name="remember">
        <label class="checkbox-label" for="remember_me">Remember Me</label>
    </div>

    <div class="form-bottom">
        <a class="forgot-link" href="{{ route('password.request') }}">Forgot your password?</a>
        <button type="submit" class="submit-btn" id="loginBtn">
            <span class="spinner" id="spinner"></span>
          
    <span id="btnText">Log in ✨</span>
         
        </button>
    </div>
</form>
 <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add particle animations
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 50;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 8 + 's';
                particle.style.animationDuration = (Math.random() * 3 + 5) + 's';
                particlesContainer.appendChild(particle);
            }
        }

        // Input focus animations
        const inputs = document.querySelectorAll('.form-input');
        inputs.forEach(input => {
            input.addEventListener('focus', function () {
                this.parentElement.parentElement.querySelector('.form-label').style.color = '#A855F7';
            });

            input.addEventListener('blur', function () {
                this.parentElement.parentElement.querySelector('.form-label').style.color = 'rgba(255, 255, 255, 0.9)';
            });
        });

        // 3D hover effect
        const container = document.querySelector('.container');
        document.addEventListener('mousemove', function (e) {
            const rect = container.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;

            if (e.target.closest('.container')) {
                container.style.transform = `translateY(-5px) rotateX(${y / 50}deg) rotateY(${x / 50}deg)`;
            }
        });
        container.addEventListener('mouseleave', function () {
            this.style.transform = 'translateY(-5px) rotateX(0deg) rotateY(0deg)';
        });

        createParticles(); // init particles
    });
</script>
</body>
</html>