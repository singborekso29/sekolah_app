<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand" href="/dashboard">
            SMP Muhammadiyah Bojong Nangka
        </a>

        <div>

            <a href="/dashboard" class="btn btn-light">
                Dashboard
            </a>

            <a href="/guru" class="btn btn-warning">
                Guru
            </a>
            <a href="/siswa" class="btn btn-warning">
                Siswa
            </a>

            <form action="{{ route('logout') }}" method="POST" class="d-inline">

                @csrf

                <button type="submit" class="btn btn-danger">

                    Logout

                </button>

            </form>

        </div>

    </div>

</nav>