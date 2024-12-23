<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/news.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" type="image/png" href="logo1.png">
    <title>News - Formula 1</title>
</head>

<body>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <main>
        <section class="hero">
            <header>
                <nav>
                    <div class="logo-container">
                        <a href="{{ url('/') }}">
                            <img src="logo.png" alt="Logo" class="logo">
                        </a>
                    </div>
                    <div class="links">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                        </ul>

                        <ul>
                            <li><a href="{{ url('/news') }}">News</a></li>
                        </ul>
                        <ul>
                            <li><a href="{{ url('/scores') }}">Scores</a></li>
                        </ul>

                        @auth
                        <ul>
                            <li>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                            </li>
                        </ul>
                        @endauth

                        @guest
                        <ul>
                            <li><a href="{{ url('/login') }}">Sign in</a></li>
                        </ul>
                        @endguest
                    </div>
                </nav>
            </header>
            <h1>Latest News</h1>
        </section>

        <div class="news-container">
        @if(auth()->check() && auth()->user()->is_admin)
            <a href="{{ url('/create_news') }}" class="btn">Add News</a>
            @endif

            @foreach ($noticias as $noticia)
            <div class="news-item" data-id="{{ $noticia->id }}">
                <h2>{{ $noticia->titulo }}</h2>
                <h4>{{ $noticia->tipo }}</h4> 
                <h3>{{ $noticia->descricao }}</h3>
                <a href="{{ $noticia->link }}" class="btn">For more</a>

                <div class="actions">
                    @if(auth()->check() && auth()->user()->is_admin)
                    <a href="{{ route('noticias.edit', $noticia->id) }}" class="btn btn-primary">Edit</a>
                    @endif
                    @if(auth()->check() && auth()->user()->is_admin)
                    <button class="btn btn-danger btn-delete-news" data-id="{{ $noticia->id }}">Delete</button>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

    </main>
</body>


<script>
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
            } else {
                entry.target.classList.remove('show');
            }
        });
    });

    const newsItems = document.querySelectorAll('.news-item');
    newsItems.forEach((item) => observer.observe(item));

    $(document).ready(function() {
        $('.btn-delete-news').click(function(e) {
            e.preventDefault(); 

            var newsId = $(this).data('id'); 

            if (confirm('Are you sure you want to delete this news?')) {
                $.ajax({
                    url: '/noticias/' + newsId, 
                    type: 'DELETE', 
                    data: {
                        _token: '{{ csrf_token() }}' 
                    },
                    success: function(response) {
                        $('.news-item[data-id="' + newsId + '"]').remove();
                        alert("News deleted successfully!"); 
                    },
                    error: function(xhr) {
                        console.error('An error has occurred. Please try again.'); 
                        alert('Error deleting the news.'); 
                    }
                });
            }
        });
    });
</script>

</html>