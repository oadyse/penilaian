@include('layout.header')
<!-- Wrapper Start -->
<div class="wrapper">
    @include('layout.sidebar')
    @include('layout.topnav')

    <div class="content-page">
        <div class="row">
            <div class="col-lg-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        @if (Auth::user()->role == 'admin')
                            <h4 class="card-title"> Welcome, SuperAdmin</h4>
                        @elseif (Auth::user()->role == 'guru')
                            <h4 class="card-title"> Welcome, {{ Auth::user()->dosen->nama }}</h4>
                        @elseif (Auth::user()->role == 'siswa')
                            <h4 class="card-title"> Welcome, {{ Auth::user()->siswa->nama }}</h4>
                        @endif
                        <p class="card-text">
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Wrapper End-->
@include('layout.footer')

<!-- Backend Bundle JavaScript -->
{{-- @include('layout.script') --}}
</body>

</html>
