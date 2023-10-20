@if(session('success'))
    <script type="module">flash('success', '{{ session('success') }}')</script>
@endif

@if(session('error'))
    <script type="module">flash('error', '{{ session('error') }}')</script>
@endif
