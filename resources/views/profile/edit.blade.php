@extends('layouts.app')

@section('content')
<style>
    .profile-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #8B5CF6 50%, #A855F7 75%, #C084FC 100%);
        min-height: 100vh;
        padding: 4rem 0;
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
        background: rgba(255, 255, 255, 0.08);
        animation: float 8s ease-in-out infinite;
    }

    .shape-1 {
        width: 200px;
        height: 200px;
        top: 15%;
        left: 10%;
        animation-delay: -2s;
    }

    .shape-2 {
        width: 120px;
        height: 120px;
        top: 60%;
        right: 15%;
        animation-delay: -4s;
    }

    .shape-3 {
        width: 180px;
        height: 180px;
        bottom: 10%;
        left: 20%;
        animation-delay: -1s;
    }

    .shape-4 {
        width: 100px;
        height: 100px;
        top: 25%;
        right: 30%;
        animation-delay: -3s;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg) scale(1); }
        33% { transform: translateY(-30px) rotate(120deg) scale(1.1); }
        66% { transform: translateY(20px) rotate(240deg) scale(0.9); }
    }

    /* Particle system */
    .particles {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .particle {
        position: absolute;
        width: 3px;
        height: 3px;
        background: rgba(255, 255, 255, 0.7);
        border-radius: 50%;
        animation: particle-rise 10s linear infinite;
    }

    @keyframes particle-rise {
        0% {
            transform: translateY(100vh) rotate(0deg);
            opacity: 0;
        }
        10% {
            opacity: 1;
        }
        90% {
            opacity: 1;
        }
        100% {
            transform: translateY(-100px) rotate(360deg);
            opacity: 0;
        }
    }

    /* Main container */
    .profile-container {
        max-width: 36rem;
        margin: 0 auto;
        padding: 3rem;
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(25px);
        border-radius: 28px;
        border: 1px solid rgba(255, 255, 255, 0.18);
        box-shadow: 
            0 32px 64px rgba(0, 0, 0, 0.25),
            inset 0 1px 0 rgba(255, 255, 255, 0.1);
        position: relative;
        z-index: 1;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .profile-container:hover {
        transform: translateY(-8px);
        box-shadow: 
            0 40px 80px rgba(0, 0, 0, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.15);
    }

    /* Header section */
    .profile-header {
        text-align: center;
        margin-bottom: 3rem;
        position: relative;
    }

    .profile-icon-wrapper {
        position: relative;
        display: inline-block;
        margin-bottom: 1.5rem;
    }

    .profile-icon {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: linear-gradient(135deg, #8B5CF6, #EC4899, #F59E0B);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 48px;
        box-shadow: 
            0 20px 40px rgba(139, 92, 246, 0.4),
            inset 0 2px 4px rgba(255, 255, 255, 0.1);
        animation: profile-glow 3s ease-in-out infinite alternate;
        border: 3px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }

    .profile-icon:hover {
        transform: scale(1.05) rotate(5deg);
        box-shadow: 
            0 25px 50px rgba(139, 92, 246, 0.6),
            inset 0 2px 4px rgba(255, 255, 255, 0.2);
    }

    .profile-icon::before {
        content: "👤";
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
    }

    @keyframes profile-glow {
        0% { 
            box-shadow: 
                0 20px 40px rgba(139, 92, 246, 0.4),
                inset 0 2px 4px rgba(255, 255, 255, 0.1);
        }
        100% { 
            box-shadow: 
                0 25px 50px rgba(236, 72, 153, 0.5),
                inset 0 2px 4px rgba(255, 255, 255, 0.2);
        }
    }

    .profile-title {
        color: white;
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        text-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        background: linear-gradient(135deg, #ffffff, #e0e7ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Form styling */
    .form-group {
        margin-bottom: 2rem;
        position: relative;
    }

    .form-label {
        display: block;
        color: rgba(255, 255, 255, 0.95);
        font-size: 0.95rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        letter-spacing: 0.5px;
    }

    .form-input {
        width: 100%;
        padding: 1.25rem 1.5rem;
        background: rgba(255, 255, 255, 0.08);
        border: 2px solid rgba(255, 255, 255, 0.15);
        border-radius: 16px;
        color: white;
        font-size: 1rem;
        font-weight: 500;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        backdrop-filter: blur(10px);
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .form-input::placeholder {
        color: rgba(255, 255, 255, 0.4);
        font-weight: 400;
    }

    .form-input:focus {
        outline: none;
        border-color: rgba(168, 85, 247, 0.8);
        background: rgba(255, 255, 255, 0.12);
        box-shadow: 
            0 0 0 4px rgba(168, 85, 247, 0.15),
            0 8px 25px rgba(168, 85, 247, 0.2),
            inset 0 2px 4px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    .form-input:focus + .input-icon {
        color: #A855F7;
        transform: scale(1.2);
    }

    /* Input icons */
    .input-wrapper {
        position: relative;
    }

    .input-icon {
        position: absolute;
        right: 1.25rem;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.25rem;
        color: rgba(255, 255, 255, 0.4);
        transition: all 0.3s ease;
        pointer-events: none;
    }

    /* Submit button */
    .submit-section {
        text-align: center;
        margin-top: 2.5rem;
    }

    .submit-btn {
        background: linear-gradient(135deg, #8B5CF6, #EC4899);
        color: white;
        padding: 1.25rem 3rem;
        border: none;
        border-radius: 16px;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        box-shadow: 
            0 8px 25px rgba(139, 92, 246, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 0.1);
    }

    .submit-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .submit-btn:hover::before {
        left: 100%;
    }

    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 
            0 15px 35px rgba(139, 92, 246, 0.5),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        background: linear-gradient(135deg, #7C3AED, #DB2777);
    }

    .submit-btn:active {
        transform: translateY(-1px);
    }

    /* Loading state */
    .loading .submit-btn {
        opacity: 0.8;
        cursor: not-allowed;
        background: linear-gradient(135deg, #6B21A8, #BE185D);
    }

    /* Success animation */
    @keyframes success-bounce {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    .success-animation {
        animation: success-bounce 0.6s ease-in-out;
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .profile-section {
            padding: 2rem 1rem;
        }
        
        .profile-container {
            padding: 2rem 1.5rem;
            margin: 0 1rem;
        }
        
        .profile-title {
            font-size: 2rem;
        }
        
        .profile-icon {
            width: 100px;
            height: 100px;
            font-size: 40px;
        }
        
        .form-input {
            padding: 1rem 1.25rem;
        }
        
        .submit-btn {
            width: 100%;
            padding: 1.25rem;
        }
    }

    /* Focus states for accessibility */
    .form-input:focus,
    .submit-btn:focus {
        outline: 2px solid rgba(168, 85, 247, 0.5);
        outline-offset: 2px;
    }

    /* Smooth transitions for all interactive elements */
    * {
        transition-duration: 0.3s;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }
</style>

<div class="profile-section">
    <!-- Animated background -->
    <div class="bg-animation">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        <div class="floating-shape shape-3"></div>
        <div class="floating-shape shape-4"></div>
    </div>

    <!-- Particles -->
    <div class="particles" id="particles"></div>

    <div class="profile-container">
        <div class="profile-header">
            <div class="profile-icon-wrapper">
                <div class="profile-icon"></div>
            </div>
            <h2 class="profile-title">Profile Settings</h2>
        </div>

        <form method="post" action="{{ route('profile.update') }}" id="profileForm">
            @csrf
            @method('patch')

            <div class="form-group">
                <label class="form-label">Name :</label>
                <div class="input-wrapper">
                    <input 
                        name="name" 
                        value="{{ old('name', auth()->user()->name) }}"
                        class="form-input"
                        placeholder="Enter your full name"
                    />
                    <span class="input-icon">👤</span>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Email :</label>
                <div class="input-wrapper">
                    <input 
                        name="email" 
                        type="email" 
                        value="{{ old('email', auth()->user()->email) }}"
                        class="form-input"
                        placeholder="Enter your email address"
                    />
                    <span class="input-icon">📧</span>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Old password :</label>
                <div class="input-wrapper">
                    <input 
                        name="current_password" 
                        type="password"
                        class="form-input"
                        placeholder="Enter your current password"
                    />
                    <span class="input-icon">🔒</span>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">New password :</label>
                <div class="input-wrapper">
                    <input 
                        name="password" 
                        type="password"
                        class="form-input"
                        placeholder="Enter your new password"
                    />
                    <span class="input-icon">🗝️</span>
                </div>
            </div>

            <div class="submit-section">
                <button type="submit" class="submit-btn">
                    ✨ Save Changes ✨
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Create floating particles
    function createParticles() {
        const particlesContainer = document.getElementById('particles');
        const particleCount = 60;

        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 10 + 's';
            particle.style.animationDuration = (Math.random() * 4 + 6) + 's';
            particlesContainer.appendChild(particle);
        }
    }

    // Enhanced form interactions
    function setupFormInteractions() {
        const form = document.getElementById('profileForm');
        const container = document.querySelector('.profile-container');
        const inputs = document.querySelectorAll('.form-input');

        // Input focus animations
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                const label = this.parentElement.parentElement.querySelector('.form-label');
                if (label) {
                    label.style.color = '#A855F7';
                    label.style.transform = 'translateY(-2px)';
                }
            });

            input.addEventListener('blur', function() {
                const label = this.parentElement.parentElement.querySelector('.form-label');
                if (label) {
                    label.style.color = 'rgba(255, 255, 255, 0.95)';
                    label.style.transform = 'translateY(0)';
                }
            });
        });

        // Form submission with animation
form.addEventListener('submit', function(e) {
    e.preventDefault();

    container.classList.add('loading');

    setTimeout(() => {
        container.classList.remove('loading');
        container.classList.add('success-animation');

        // Submit the real form
        form.submit(); // ✅ add this line

    }, 1500);
});


    // 3D hover effect for container
    function setup3DHoverEffect() {
        const container = document.querySelector('.profile-container');
        
        container.addEventListener('mousemove', function(e) {
            const rect = container.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;
            
            const rotateX = (y / rect.height) * 20;
            const rotateY = (x / rect.width) * 20;
            
            container.style.transform = `translateY(-8px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
        });

        container.addEventListener('mouseleave', function() {
            container.style.transform = 'translateY(-8px) rotateX(0deg) rotateY(0deg)';
        });
    }

    // Initialize all features
    createParticles();
    setupFormInteractions();
    setup3DHoverEffect();
});
</script>
@endsection