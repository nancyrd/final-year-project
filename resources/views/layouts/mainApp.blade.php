<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Python Quest')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  @vite(['resources/css/app.css','resources/js/app.js']) {{-- if you use Vite; otherwise remove --}}
  <style>
    :root{
      --primary-purple:#7B2CBF;   /* headers / accents */
      --secondary-purple:#9D4EDD; /* buttons / highlights */
      --accent-purple:#5A189A;    /* hovers / emphasis   */
      --bg:#fafafa;
      --panel:#ffffff;
      --ink:#222;
      --muted:#666;
      --border:#d2b7f0;
    }
    html,body{margin:0; background:var(--bg); color:var(--ink); font-family: "Arial Rounded MT Bold", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;}
    .container{max-width:1200px; margin:0 auto; padding:16px;}
    /* Navbar */
    .nav{
      position: sticky; top:0; z-index:40;
      background: var(--panel);
      border-bottom: 2px solid var(--border);
      box-shadow: 0 6px 14px rgba(0,0,0,.05);
    }
    .nav-inner{display:flex; align-items:center; justify-content:space-between; gap:12px; padding:12px 16px;}
    .brand{display:flex; align-items:center; gap:10px; text-decoration:none;}
    .brand-title{font-size:1.2rem; font-weight:900; color:var(--accent-purple); letter-spacing:.5px}
    .brand-badge{
      width:28px; height:28px; border-radius:8px; display:grid; place-items:center;
      background: linear-gradient(135deg, var(--primary-purple), var(--secondary-purple)); color:#fff; font-weight:900;
      box-shadow:0 4px 10px rgba(123,44,191,.35);
    }
    .nav-links{display:flex; align-items:center; gap:8px; flex-wrap:wrap}
    .nav-link{
      text-decoration:none; font-weight:700; font-size:.95rem;
      color:var(--accent-purple); padding:8px 12px; border-radius:999px;
      transition:all .2s;
    }
    .nav-link:hover{background:#f3ecff;}
    .nav-link.active{background:var(--secondary-purple); color:#fff; box-shadow:0 6px 14px rgba(157,78,221,.35)}
    /* Mobile toggle */
    .nav-toggle{display:none; background:transparent; border:none; font-size:1.4rem; color:var(--accent-purple)}
    @media (max-width: 720px){
      .nav-links{display:none; width:100%;}
      .nav-links.open{display:flex; flex-direction:column; align-items:flex-start; padding:8px 0;}
      .nav-toggle{display:block;}
      .nav-inner{flex-wrap:wrap;}
    }
    /* Footer */
    .footer{
      margin-top:32px; padding:18px 0; color:var(--muted);
      border-top: 2px solid var(--border); background:var(--panel);
    }
    .footer small a{color:var(--accent-purple); text-decoration:none}
    .footer small a:hover{text-decoration:underline}
  </style>
  @stack('head')
</head>
<body>
  @include('partials.navbar')

  <main class="container">
    @yield('content')
  </main>

  @includeWhen(View::exists('partials.footer'), 'partials.footer')

  <script>
    // mobile nav toggler
    document.addEventListener('DOMContentLoaded', () => {
      const toggle = document.querySelector('[data-nav-toggle]');
      const links  = document.querySelector('[data-nav-links]');
      if(toggle && links){
        toggle.addEventListener('click', () => links.classList.toggle('open'));
      }
    });
  </script>
  @stack('scripts')
</body>
</html>
