@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Level 1: Introduction to Variables</h2>

    <p>In Python, variables are used to store data. For example:</p>

    <pre><code class="language-python">
x = 5
name = "Alice"
is_student = True
    </code></pre>

    <h4 class="mt-4">Mini Task:</h4>
    <p>Declare a variable named <code>age</code> and assign your age to it.</p>

    <form action="#" method="POST">
        @csrf
        <textarea name="code" rows="5" class="form-control" placeholder="Write your code here..."></textarea>
        <button type="submit" class="btn btn-success mt-3">Submit</button>
    </form>
</div>
@endsection
