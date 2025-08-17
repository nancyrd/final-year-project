@extends('layouts.mainApp')

@section('title','Level 1 · Variables')

@push('head')
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

  body{ background: var(--bg); }

  .level-wrap{
    max-width: 900px;
    margin: 2rem auto;
    padding: 0 1rem;
  }

  .card{
    background: var(--panel);
    border: 2px solid var(--border);
    border-radius: 18px;
    box-shadow: 0 0 10px rgba(0,0,0,.05);
    padding: 1.5rem;
  }

  .lvl-title{
    margin: 0 0 .75rem;
    font-weight: 800;
    color: var(--accent-purple);
    font-size: clamp(1.35rem, 1.1rem + 1vw, 1.75rem);
  }

  .lead{ color: var(--ink); margin: 0 0 1rem; }

  /* Code block */
  .code-block{
    margin: 1rem 0 1.25rem;
    background: #f7f4fe;
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 1rem 1.2rem;
    overflow-x: auto;
    font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, "Liberation Mono", monospace;
    font-size: .95rem;
    color: #2b2b2b;
  }
  .code-block code{ white-space: pre; display:block; }

  .mini-title{
    margin: 1rem 0 .35rem;
    font-size: 1.05rem;
    color: var(--primary-purple);
    font-weight: 800;
  }

  /* Form */
  .form-group{ margin-top:.5rem; }
  .form-control{
    width:100%; min-height: 140px; resize: vertical;
    padding: .9rem 1rem;
    border:1px solid var(--border);
    border-radius: 14px;
    background:#fff; color: var(--ink);
    transition: border-color .2s, box-shadow .2s;
    font-size: .98rem;
  }
  .form-control::placeholder{ color:#9a8ec7; }
  .form-control:focus{
    outline:none;
    border-color: var(--secondary-purple);
    box-shadow: 0 0 0 4px rgba(157,78,221,.15);
  }

  .btn{
    border:none; cursor:pointer; font-weight:800; border-radius: 999px;
    padding:.9rem 1.6rem; transition: transform .15s, box-shadow .2s, background .2s;
    display:inline-flex; align-items:center; gap:.5rem;
  }
  .btn-primary{ background: var(--secondary-purple); color:#fff; }
  .btn-primary:hover{ background: var(--accent-purple); transform: translateY(-1px); box-shadow:0 8px 18px rgba(90,24,154,.3); }

  .hint{ color: var(--muted); margin-top:.35rem; font-size:.95rem; }
</style>
@endpush

@section('content')
  <div class="level-wrap">
    <div class="card">
      <h2 class="lvl-title">Level 1: Introduction to Variables</h2>

      <p class="lead">In Python, variables are used to store data. For example:</p>

      <pre class="code-block"><code class="language-python">x = 5
name = "Alice"
is_student = True</code></pre>

      <h4 class="mini-title">Mini Task</h4>
      <p>Declare a variable named <code>age</code> and assign your age to it.</p>

      <form action="#" method="POST">
        @csrf
        <div class="form-group">
          <textarea name="code" class="form-control" placeholder="Write your code here..."></textarea>
          <div class="hint">Tip: e.g. <code>age = 18</code></div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
      </form>
    </div>
  </div>
@endsection
