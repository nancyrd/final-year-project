


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PythonLearn - Code Your Future</title>
    
    <!-- Bootstrap 5.3 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Fira+Code:wght@400;500;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --warning-gradient: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            --dark-bg: #0f0f23;
            --card-bg: rgba(255, 255, 255, 0.95);
            --text-primary: #2d3748;
            --text-secondary: #718096;
            --border-color: rgba(255, 255, 255, 0.2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--text-primary);
            overflow-x: hidden;
        }

        /* Animated Background */
        .hero-section {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            position: relative;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
            animation: drift 20s linear infinite;
        }

        @keyframes drift {
            0% { transform: translateX(0px); }
            100% { transform: translateX(-60px); }
        }

        /* Floating Elements */
        .floating-element {
            position: absolute;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
        }

        .floating-element:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .floating-element:nth-child(3) {
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(10deg); }
        }

        /* Navigation */
        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-link {
            font-weight: 500;
            color: var(--text-primary) !important;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            color: #667eea !important;
            transform: translateY(-2px);
        }

        /* Buttons */
        .btn-gradient {
            background: var(--primary-gradient);
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-gradient:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        .btn-gradient::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn-gradient:hover::before {
            left: 100%;
        }

        .btn-outline-gradient {
            background: transparent;
            border: 2px solid transparent;
            background-clip: padding-box;
            position: relative;
            padding: 10px 28px;
            border-radius: 50px;
            font-weight: 600;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-outline-gradient::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
            margin: -2px;
            border-radius: inherit;
            background: var(--primary-gradient);
        }

        .btn-outline-gradient:hover {
            background: var(--primary-gradient);
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        /* Hero Content */
        .hero-content {
            z-index: 2;
            position: relative;
        }

        .hero-title {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 800;
            color: white;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: clamp(1.1rem, 2vw, 1.3rem);
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2rem;
            font-weight: 400;
        }

        .python-logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #3776ab 0%, #ffd343 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
            margin-bottom: 1rem;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

        /* Feature Cards */
        .feature-card {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: white;
            margin: 0 auto 1.5rem;
        }

        .feature-icon.beginner { background: var(--success-gradient); }
        .feature-icon.interactive { background: var(--warning-gradient); }
        .feature-icon.practical { background: var(--secondary-gradient); }

        /* Stats Section */
        .stats-section {
            background: var(--dark-bg);
            color: white;
            padding: 4rem 0;
        }

        .stat-item {
            text-align: center;
            padding: 2rem 1rem;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: block;
        }

        .stat-label {
            color: rgba(255, 255, 255, 0.7);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
        }

        /* Code Preview */
        .code-preview {
            background: #1a1a2e;
            border-radius: 15px;
            padding: 2rem;
            font-family: 'Fira Code', monospace;
            color: #e94560;
            position: relative;
            overflow: hidden;
        }

        .code-preview::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 30px;
            background: #16213e;
            display: flex;
            align-items: center;
            padding: 0 1rem;
        }

        .code-preview::after {
            content: '● ● ●';
            position: absolute;
            top: 8px;
            left: 15px;
            color: #e94560;
            font-size: 0.8rem;
        }

        .code-line {
            margin: 0.5rem 0;
            padding-left: 1rem;
        }

        .code-comment { color: #6c7293; }
        .code-keyword { color: #bb86fc; }
        .code-string { color: #4fc3f7; }
        .code-function { color: #81c784; }

        /* Testimonials */
        .testimonial-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin: 1rem;
            position: relative;
        }

        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: -10px;
            left: 20px;
            font-size: 4rem;
            color: #667eea;
            font-family: serif;
        }

        .student-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1.2rem;
        }

        /* Footer */
        .footer {
            background: var(--dark-bg);
            color: white;
            padding: 3rem 0 1rem;
        }

        .footer-title {
            color: white;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .footer-link {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: #667eea;
        }

        /* Animations */
        .fade-in-up {
            animation: fadeInUp 0.8s ease forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        .fade-in-up.delay-1 { animation-delay: 0.2s; }
        .fade-in-up.delay-2 { animation-delay: 0.4s; }
        .fade-in-up.delay-3 { animation-delay: 0.6s; }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-section {
                text-align: center;
            }
            
            .feature-card {
                margin-bottom: 2rem;
            }
            
            .code-preview {
                font-size: 0.8rem;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-gradient);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

   .dashboard {
        background: linear-gradient(to right, #f3f4f6, #e5e7eb);
        min-height: 100vh;
        padding: 3rem 2rem;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .welcome-heading {
        font-size: 2.5rem;
        font-weight: 800;
        background: linear-gradient(90deg, #8b5cf6, #ec4899);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 0.5rem;
        text-align: center;
    }

    .welcome-subtext {
        font-size: 1.1rem;
        color: #4b5563;
        text-align: center;
        max-width: 700px;
        margin-bottom: 2.5rem;
    }

    .module-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        width: 100%;
        max-width: 1000px;
    }

    .module-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .module-card:hover {
        transform: translateY(-5px);
        border-color: #8b5cf6;
    }

    .module-title {
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: #111827;
    }

    .module-description {
        font-size: 0.95rem;
        color: #6b7280;
        margin-bottom: 1.5rem;
    }

    .module-button {
        padding: 0.75rem 1rem;
        font-weight: 600;
        font-size: 0.95rem;
        border-radius: 10px;
        border: none;
        transition: all 0.3s ease;
    }

    .module-button.active {
        background: linear-gradient(to right, #8b5cf6, #ec4899);
        color: white;
        cursor: pointer;
    }

    .module-button.locked {
        background: #d1d5db;
        color: #6b7280;
        cursor: not-allowed;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.3rem;
    }

    .module-button.locked i {
        font-size: 1rem;
    }






    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="fab fa-python me-2"></i>PythonLearn
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#features">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#courses">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#testimonials">Reviews</a>
                </li>

          @if (Auth::check()) <!-- Check if user is logged in -->
    <li class="nav-item dropdown">
        <!-- Use href="#" to trigger the dropdown without navigating anywhere -->
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
        </a>
        <!-- Dropdown menu -->
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </li>
        </ul>
    </li>
@else <!-- Show login/register links if not logged in -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">Login</a>
    </li>
    <li class="nav-item ms-2">
        <a class="btn btn-gradient text-white" href="{{ route('register') }}">Get Started</a>
    </li>
@endif
            </ul>
        </div>
    </div>
</nav>

    <!-- Hero Section -->
    
<div class="dashboard">
    <h1 class="welcome-heading">Welcome to Your Python Journey!</h1>
    <p class="welcome-subtext">
        Learn Python programming step by step with our interactive modules designed for non-CS students.
    </p>

    <div class="module-grid">
        <div class="module-card">
            <div>
                <h3 class="module-title">Level 1: Basics</h3>
                <p class="module-description">Get started with variables, data types, and basic operations.</p>
            </div>
            <button class="module-button active">Start Learning 🚀</button>
        </div>

        <div class="module-card">
            <div>
                <h3 class="module-title">Level 2: Control Structures</h3>
                <p class="module-description">Learn about if/else statements, loops, and more.</p>
            </div>
            <button class="module-button locked">
                <i class="fas fa-lock"></i>
                Start Learning
            </button>
        </div>

        <div class="module-card">
            <div>
                <h3 class="module-title">Level 3: Functions & Lists</h3>
                <p class="module-description">Dive into functions, lists, and dictionaries.</p>
            </div>
            <button class="module-button locked">
                <i class="fas fa-lock"></i>
                Start Learning
            </button>
        </div>
    </div>
</div>
