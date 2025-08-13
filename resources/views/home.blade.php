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
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
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
    <a class="nav-link" href="{{ route('stage.show', ['stage' => 1]) }}">
        <i class="fas fa-book me-1"></i> Start Learning
    </a>
</li>



                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Reviews</a>
                    </li>
                 <li class="nav-item">
    <a class="nav-link" href="{{ route('login') }}">Login</a>

</li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-gradient text-white" href="/register">Get Started</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <!-- Floating Elements -->
        <div class="floating-element">
            <i class="fab fa-python" style="font-size: 3rem; color: white;"></i>
        </div>
        <div class="floating-element">
            <i class="fas fa-code" style="font-size: 2.5rem; color: white;"></i>
        </div>
        <div class="floating-element">
            <i class="fas fa-laptop-code" style="font-size: 3rem; color: white;"></i>
        </div>

        <div class="container hero-content">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="python-logo fade-in-up">
                        <i class="fab fa-python"></i>
                    </div>
                    <h1 class="hero-title fade-in-up delay-1">
                        Learn Python<br>
                        <span style="background: linear-gradient(135deg, #ffd343 0%, #ff6b6b 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">The Fun Way</span>
                    </h1>
                    <p class="hero-subtitle fade-in-up delay-2">
                        Master Python programming with interactive lessons designed specifically for non-CS students. 
                        No prior experience needed - just curiosity and determination!
                    </p>
                    <div class="fade-in-up delay-3">
                        <a href="/register" class="btn btn-gradient me-3 mb-3">
                            <i class="fas fa-rocket me-2"></i>Start Learning Free
                        </a>
                        <a href="#features" class="btn btn-outline-gradient mb-3">
                            <i class="fas fa-play me-2"></i>Watch Demo
                        </a>
                    </div>
                    <div class="mt-4 fade-in-up delay-3">
                        <small style="color: rgba(255,255,255,0.8);">
                            <i class="fas fa-users me-2"></i>Join 10,000+ students already learning
                        </small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="code-preview fade-in-up delay-2">
                        <div class="code-line">
                            <span class="code-comment"># Your first Python program</span>
                        </div>
                        <div class="code-line">
                            <span class="code-keyword">def</span> <span class="code-function">welcome_student</span>():
                        </div>
                        <div class="code-line" style="padding-left: 2rem;">
                            <span class="code-keyword">name</span> = <span class="code-string">"Future Programmer"</span>
                        </div>
                        <div class="code-line" style="padding-left: 2rem;">
                            <span class="code-keyword">print</span>(<span class="code-string">f"Hello {name}!"</span>)
                        </div>
                        <div class="code-line" style="padding-left: 2rem;">
                            <span class="code-keyword">print</span>(<span class="code-string">"Let's build amazing things!"</span>)
                        </div>
                        <div class="code-line"></div>
                        <div class="code-line">
                            <span class="code-comment"># Call the function</span>
                        </div>
                        <div class="code-line">
                            <span class="code-function">welcome_student</span>()
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <span class="stat-number">10K+</span>
                        <div class="stat-label">Students</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <span class="stat-number">95%</span>
                        <div class="stat-label">Success Rate</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <span class="stat-number">50+</span>
                        <div class="stat-label">Projects</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <span class="stat-number">24/7</span>
                        <div class="stat-label">Support</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-5" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="display-4 fw-bold mb-3">Why Choose PythonLearn?</h2>
                    <p class="lead text-muted">Designed specifically for beginners with no programming background</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon beginner">
                            <i class="fas fa-seedling"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Beginner Friendly</h4>
                        <p class="text-muted">Start from absolute zero. No technical jargon, just plain English explanations that make sense.</p>
                        <ul class="list-unstyled text-start mt-3">
                            <li><i class="fas fa-check text-success me-2"></i>Step-by-step guidance</li>
                            <li><i class="fas fa-check text-success me-2"></i>Visual learning aids</li>
                            <li><i class="fas fa-check text-success me-2"></i>Real-world examples</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon interactive">
                            <i class="fas fa-gamepad"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Interactive Learning</h4>
                        <p class="text-muted">Learn by doing with our hands-on exercises and instant feedback system.</p>
                        <ul class="list-unstyled text-start mt-3">
                            <li><i class="fas fa-check text-success me-2"></i>Code playground</li>
                            <li><i class="fas fa-check text-success me-2"></i>Instant results</li>
                            <li><i class="fas fa-check text-success me-2"></i>Gamified progress</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon practical">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Practical Projects</h4>
                        <p class="text-muted">Build real applications that you can show off to friends and future employers.</p>
                        <ul class="list-unstyled text-start mt-3">
                            <li><i class="fas fa-check text-success me-2"></i>Portfolio projects</li>
                            <li><i class="fas fa-check text-success me-2"></i>Industry tools</li>
                            <li><i class="fas fa-check text-success me-2"></i>Career guidance</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Course Preview -->
    <section id="courses" class="py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="display-4 fw-bold mb-3">What You'll Learn</h2>
                    <p class="lead text-muted">Comprehensive curriculum designed for complete beginners</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="card border-0 shadow-lg h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-primary bg-gradient rounded-circle p-3 me-3">
                                    <i class="fas fa-play text-white"></i>
                                </div>
                                <h5 class="card-title mb-0">Python Fundamentals</h5>
                            </div>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Variables and Data Types</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Control Flow (if/else, loops)</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Functions and Modules</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Error Handling</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadow-lg h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-success bg-gradient rounded-circle p-3 me-3">
                                    <i class="fas fa-database text-white"></i>
                                </div>
                                <h5 class="card-title mb-0">Data & Web</h5>
                            </div>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Working with Files</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Web Scraping Basics</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>APIs and JSON</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Simple Web Apps</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials" class="py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="display-4 fw-bold text-white mb-3">What Students Say</h2>
                    <p class="lead text-white-50">Real feedback from real students</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="testimonial-card">
                        <p class="mb-4">"I never thought I could code, but PythonLearn made it so easy and fun! The explanations are crystal clear."</p>
                        <div class="d-flex align-items-center">
                            <div class="student-avatar me-3">SM</div>
                            <div>
                                <h6 class="mb-0">Sarah Mitchell</h6>
                                <small class="text-muted">Marketing Student</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-card">
                        <p class="mb-4">"The interactive exercises kept me engaged throughout. I built my first web scraper in just 3 weeks!"</p>
                        <div class="d-flex align-items-center">
                            <div class="student-avatar me-3">JD</div>
                            <div>
                                <h6 class="mb-0">John Davis</h6>
                                <small class="text-muted">Business Student</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-card">
                        <p class="mb-4">"Perfect for beginners! The step-by-step approach helped me understand concepts I thought were impossible."</p>
                        <div class="d-flex align-items-center">
                            <div class="student-avatar me-3">AL</div>
                            <div>
                                <h6 class="mb-0">Anna Lopez</h6>
                                <small class="text-muted">Art Student</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5" style="background: var(--dark-bg);">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="display-4 fw-bold text-white mb-3">Ready to Start Your Coding Journey?</h2>
                    <p class="lead text-white-50 mb-4">Join thousands of students who have already transformed their careers with Python</p>
                    <div>
                        <a href="/register" class="btn btn-gradient btn-lg me-3">
                            <i class="fas fa-rocket me-2"></i>Start Free Trial
                        </a>
                        <a href="/login" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                