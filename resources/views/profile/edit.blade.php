@extends('layouts.mainApp')

@section('title','Profile')

@push('head')
<style>
  :root{
    --primary-purple:#7B2CBF;
    --secondary-purple:#9D4EDD;
    --accent-purple:#5A189A;
    --bg:#fafafa;
    --panel:#ffffff;
    --ink:#222;
    --muted:#666;
    --border:#d2b7f0;
    --danger:#F44336;
  }
  body{ background: var(--bg); }

  .profile-card{
    max-width: 720px;
    margin: 2rem auto;
    background: var(--panel);
    border: 2px solid var(--border);
    border-radius: 20px;
    box-shadow: 0 0 10px rgba(0,0,0,.05);
    padding: 2rem;
  }

  .profile-head{ display:flex; align-items:center; gap:16px; margin-bottom:1.5rem; }
  .avatar{
    width:72px;height:72px;border-radius:50%;
    display:grid;place-items:center;font-size:2rem;color:#fff;
    background: linear-gradient(135deg, var(--primary-purple), var(--secondary-purple));
    box-shadow: 0 6px 16px rgba(123,44,191,.35);
  }
  .title-wrap h2{ margin:0; font-size:1.75rem; color:var(--accent-purple); }
  .title-wrap p{ margin:.25rem 0 0; color:var(--muted); font-size:.95rem; }

  .form-grid{ display:grid; gap:1.25rem; }
  .form-group label{ display:block; font-weight:700; color:var(--ink); margin-bottom:.5rem; }
  .input-wrap{ position:relative; }
  .input-wrap .icon{
    position:absolute; right:12px; top:50%; transform:translateY(-50%);
    font-size:1.1rem; color:#9a8ec7; pointer-events:none;
  }
  .form-control{
    width:100%; padding:1rem 2.5rem 1rem 1rem;
    background:#f7f4fe; border:1px solid var(--border);
    border-radius:14px; font-size:1rem; color:var(--ink);
    transition: border-color .2s, box-shadow .2s, background .2s;
  }
  .form-control::placeholder{ color:#9a8ec7; }
  .form-control:focus{
    outline:none; border-color: var(--secondary-purple);
    box-shadow: 0 0 0 4px rgba(157,78,221,.15); background:#fff;
  }

  .error-text{ color:var(--danger); font-size:.9rem; margin-top:.35rem; }
  .form-control.is-invalid{ border-color: var(--danger); box-shadow:0 0 0 3px rgba(244,67,54,.15); }

  .section-sep{ margin:.5rem 0 0; padding-top:1.25rem; border-top:2px dashed var(--border); }

  .actions{ display:flex; justify-content:flex-end; gap:.75rem; margin-top:1rem; }
  .btn{ border:none; cursor:pointer; font-weight:800; border-radius:999px; padding:.9rem 1.6rem;
        transition: transform .15s, box-shadow .2s, background .2s; }
  .btn-primary{ background: var(--secondary-purple); color:#fff; }
  .btn-primary:hover{ background:var(--accent-purple); transform:translateY(-1px); box-shadow:0 8px 18px rgba(90,24,154,.3); }
  .btn-ghost{ background:#f3ecff; color:var(--accent-purple); }
  .btn-ghost:hover{ background:#eae0ff; }
</style>
@endpush

@section('content')
  <div class="profile-card">
    <div class="profile-head">
      <div class="avatar">👤</div>
      <div class="title-wrap">
        <h2>Profile Settings</h2>
        <p>Manage your account info and password.</p>
      </div>
    </div>

    {{-- Flash success (optional) --}}
    @if (session('status'))
      <div style="margin-bottom:1rem;padding:.75rem 1rem;border:1px solid #c7efcf;background:#eafff0;color:#175d2b;border-radius:12px;">
        {{ session('status') }}
      </div>
    @endif

    <form id="profileForm" method="post" action="{{ route('profile.update') }}">
      @csrf
      @method('patch')

      <div class="form-grid">
        {{-- Name --}}
        <div class="form-group">
          <label for="name">Name</label>
          <div class="input-wrap">
            <input id="name" name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', auth()->user()->name) }}"
                   placeholder="Your full name">
            <span class="icon">👤</span>
          </div>
          @error('name')
            <div class="error-text">{{ $message }}</div>
          @enderror
        </div>

        {{-- Email --}}
        <div class="form-group">
          <label for="email">Email</label>
          <div class="input-wrap">
            <input id="email" type="email" name="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email', auth()->user()->email) }}"
                   placeholder="you@example.com">
            <span class="icon">📧</span>
          </div>
          @error('email')
            <div class="error-text">{{ $message }}</div>
          @enderror
        </div>

        <div class="section-sep"></div>

        {{-- Current password --}}
        <div class="form-group">
          <label for="current_password">Current password</label>
          <div class="input-wrap">
            <input id="current_password" type="password" name="current_password"
                   class="form-control @error('current_password') is-invalid @enderror"
                   placeholder="Enter current password">
            <span class="icon">🔒</span>
          </div>
          @error('current_password')
            <div class="error-text">{{ $message }}</div>
          @enderror
        </div>

        {{-- New password --}}
        <div class="form-group">
          <label for="password">New password</label>
          <div class="input-wrap">
            <input id="password" type="password" name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   placeholder="Enter new password">
            <span class="icon">🗝️</span>
          </div>
          @error('password')
            <div class="error-text">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="actions">
        <button type="button" class="btn btn-ghost" onclick="window.history.back()">Cancel</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
  </div>
@endsection

@push('scripts')
<script>
  const form = document.getElementById('profileForm');
  form?.addEventListener('submit', () => {
    const btn = form.querySelector('.btn-primary');
    if (btn) {
      btn.style.transform = 'translateY(-1px)';
      setTimeout(() => { btn.style.transform = ''; }, 200);
    }
  });
</script>
@endpush
