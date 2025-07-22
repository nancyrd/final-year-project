@extends('layouts.app')

@section('content')
<div class="bg-white">

    {{-- Hero Section --}}
    <section class="text-center py-20 bg-gradient-to-br from-purple-100 to-white">
        <div class="max-w-4xl mx-auto px-6">
            <h1 class="text-5xl font-extrabold text-gray-900 leading-tight">
                Learn Python the Fun Way
            </h1>
            <p class="mt-4 text-lg text-gray-600">
                No experience? No problem. Start with real examples, get instant feedback, and level up as you learn.
            </p>
            <a href="{{ route('register') }}"
                class="mt-8 inline-block bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg font-semibold text-lg shadow-md transition">
                Let’s Get Started 🚀
            </a>
        </div>
    </section>

    {{-- Our Objectives --}}
    <section class="py-16 bg-white text-center">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-extrabold text-purple-700 mb-12">Our Objectives</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
                <div class="bg-gray-50 p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-gray-800">User-Friendly Platform</h3>
                    <p class="text-sm text-gray-600 mt-2">Design and develop a web-based platform tailored for non-CS students.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-gray-800">Structured Learning</h3>
                    <p class="text-sm text-gray-600 mt-2">Progressive levels covering fundamental Python topics.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-gray-800">Interactive Assessments</h3>
                    <p class="text-sm text-gray-600 mt-2">Pre and post-assessment MCQs to measure understanding.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-gray-800">Hands-On Practice</h3>
                    <p class="text-sm text-gray-600 mt-2">Interactive coding exercises and problem-solving tasks.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Why Learn Python --}}
    <section class="bg-gray-100 py-16 text-center">
        <div class="max-w-5xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-purple-700 mb-8">Why Learn Python?</h2>
            <div class="grid md:grid-cols-3 gap-6 text-left">
                <div>
                    <ul class="text-gray-700 list-disc list-inside text-sm">
                        <li>Data science 🧪</li>
                        <li>Web development 🌐</li>
                        <li>Automation ⚙️</li>
                        <li>Machine learning 🤖</li>
                        <li>Education 📚</li>
                    </ul>
                </div>
                <div>
                    <ul class="text-gray-700 list-disc list-inside text-sm">
                        <li>Beginner-friendly (clear syntax)</li>
                        <li>Versatile (works everywhere)</li>
                        <li>In-demand (millions of jobs use it)</li>
                    </ul>
                </div>
                <div>
                    <ul class="text-gray-700 list-disc list-inside text-sm">
                        <li>Analyze data</li>
                        <li>Automate boring tasks</li>
                        <li>Build simple apps</li>
                        <li>Create games</li>
                        <li>Understand how tech works</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>



    {{-- Platform Benefits Section --}}
    <section class="py-16 bg-white">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-extrabold text-purple-700">Platform Benefits Section</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto px-4">
            <x-home.benefit emoji="🍀" title="Modular Lessons" desc="Learn one small topic at a time" />
            <x-home.benefit emoji="🖥️" title="Interactive Coding" desc="Practice while you learn" />
            <x-home.benefit emoji="🔍" title="No Prior Knowledge Needed" desc="We explain everything" />
            <x-home.benefit emoji="📊" title="Track Your Progress" desc="Know how far you’ve come" />
            <x-home.benefit emoji="🧠" title="Real Feedback & Hints" desc="You’re never stuck alone" />
            <x-home.benefit emoji="🎓" title="Built for Beginners" desc="Created for non-CS students" />
        </div>
        <div class="text-center mt-10">
            <h3 class="text-2xl font-semibold text-purple-700">Ready to Learn Python?</h3>
            <p class="mt-2 text-gray-600">👉 Start your journey in under 30 seconds.<br>🔒 No credit card, no downloads — just learn.</p>
        </div>
    </section>

    {{-- How It Works --}}
    <section class="bg-gray-100 py-16">
        <div class="max-w-6xl mx-auto text-center px-4">
            <h2 class="text-3xl font-bold mb-8 text-gray-800">How It Works</h2>
            <div class="grid md:grid-cols-3 gap-8 text-left">
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-xl font-bold mb-2 text-purple-700">1. Choose a Topic</h3>
                    <p class="text-gray-600">Start with Variables, Loops, or Functions. Choose what you want to learn and unlock levels.</p>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-xl font-bold mb-2 text-purple-700">2. Learn & Play</h3>
                    <p class="text-gray-600">Read, try, and play through challenges. Get feedback instantly as you go.</p>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-xl font-bold mb-2 text-purple-700">3. Earn & Progress</h3>
                    <p class="text-gray-600">Earn XP, badges, and unlock more levels as your skills grow.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Levels Sneak Peek --}}
    <section class="py-16 bg-white text-center">
        <h2 class="text-3xl font-bold text-gray-900">Explore Our Levels</h2>
        <p class="text-gray-600 mt-2 mb-8">Each level builds on the one before. It’s like a game… but for Python.</p>
        <div class="flex flex-wrap justify-center gap-6 max-w-4xl mx-auto px-4">
            <div class="bg-purple-100 px-6 py-4 rounded-lg shadow text-left w-60">
                <h3 class="font-bold text-lg text-purple-800">Level 1: Variables</h3>
                <p class="text-sm text-gray-700">Understand data types and assignments.</p>
            </div>
            <div class="bg-purple-100 px-6 py-4 rounded-lg shadow text-left w-60">
                <h3 class="font-bold text-lg text-purple-800">Level 2: Loops</h3>
                <p class="text-sm text-gray-700">Master `for` and `while` to repeat like a pro.</p>
            </div>
            <div class="bg-purple-100 px-6 py-4 rounded-lg shadow text-left w-60">
                <h3 class="font-bold text-lg text-purple-800">Level 3: Functions</h3>
                <p class="text-sm text-gray-700">Build reusable logic blocks and call them anytime.</p>
            </div>
        </div>
        <a href="{{ route('register') }}"
           class="mt-10 inline-block bg-purple-600 text-white px-6 py-3 rounded-md text-lg shadow hover:bg-purple-700 transition">
           Join Now & Unlock Level 1
        </a>
    </section>

    {{-- Footer --}}
    <footer class="bg-gray-50 text-center py-8 border-t text-sm text-gray-500">
        &copy; {{ date('Y') }} Python Learn. Built with 💻 and ☕.
    </footer>
</div>
@endsection
