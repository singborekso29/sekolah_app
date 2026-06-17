<div class="bg-dark text-white p-3 vh-100" style="width:250px;">
    <h5>MENU</h5>
    <hr>

    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a href="/dashboard" class="nav-link text-white">
                Dashboard
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="/guru" class="nav-link text-white">
                Data Guru
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="/siswa" class="nav-link text-white">
                Data Siswa
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="/role" class="nav-link text-white">
                Role User
            </a>
        </li>

        <li class="nav-item mt-4">

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="btn btn-danger w-100">
                    Logout
                </button>
            </form>

        </li>
    </ul>
</div>