
<nav class="border-b border-border px-6">
    <div class="max-w-7xl mx-auto h-16 flex justify-between items-center">
        <div>
            <a href="/">
                <img src="/images/logo.png" alt="Idea" width="100">
            </a>
        </div>
        <div class="flex gap-5 items-center">
            @auth
                <form action="/logout" method="POST">
                    @csrf
                    <button>Log Out</button>
                </form>
            @endauth
            @guest
                    <a href="/register" class="btn">Register</a>
                    <a href="/login">Sign In</a>
            @endguest

        </div>
    </div>
</nav>
