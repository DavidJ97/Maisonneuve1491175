<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   
   <title>Réseau M9 - @yield('titre')</title>

   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
   <link href="{{ asset('css/style.css') }}" rel="stylesheet">

   <style>

    /* Enlève le surlignage des liens */
a {
    text-decoration: none !important; /* Enlève le surlignement par défaut */
    color: inherit; /* Garde la couleur naturelle ou héritée */
}

/* Ajoute un effet optionnel au survol */
a:hover {
    text-decoration: underline; /* Ajoute un soulignement au survol, optionnel */
    color: #003366; /* Change légèrement la couleur au survol, si nécessaire */
}

/* Spécifiquement pour la navigation */
.nav-link {
    text-decoration: none !important;
}

.nav-link:hover {
    text-decoration: none; /* Aucun soulignement même au survol */
    color: #0056b3; /* Optionnel : Changer la couleur pour signaler le survol */
}

       body {
           min-height: 100vh;
           display: flex;
           flex-direction: column;
           background: linear-gradient(-45deg, #003366, #2BB1E5, #ffffff, #87CEEB);
           background-size: 400% 400%;
           animation: gradient 15s ease infinite;
       }

       @keyframes gradient {
           0% { background-position: 0% 50%; }
           50% { background-position: 100% 50%; }
           100% { background-position: 0% 50%; }
       }

         .navbar, .card, .table, footer {
              background-color: rgba(255, 342, 255, 0.9) !important;
              backdrop-filter: blur(10px);
         }
     

       footer {
           margin-top: auto;
           position: sticky;
           bottom: 0;
       }

       .logo-reseau-m9 {
           height: 40px;
           display: flex;
           align-items: center;
           gap: 10px;
       }
       
       .logo-wave {
           fill: #2BB1E5;
       }
       
       .logo-text-reseau {
           font-family: 'Nunito', sans-serif;
           font-weight: 600;
           color: #003366;
           font-size: 1.5rem;
       }

       .logo-text-m9 {
           font-family: 'Nunito', sans-serif;
           font-weight: 600;
           color: #2BB1E5;
           font-size: 1.5rem;
       }
       
       .logo-subtitle {
           font-family: 'Nunito', sans-serif;
           font-size: 0.875rem;
           color: #666;
           display: block;
       }
       

       main {
           flex: 1;
       }
   </style>
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-light">
       <div class="container">
           <a class="navbar-brand" href="{{ url('/') }}">
               <div class="logo-reseau-m9">
                   <svg width="40" height="40" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                       <path class="logo-wave" d="M10,50 Q25,30 40,50 Q55,70 70,50 Q85,30 90,50" stroke-width="8" stroke="#2BB1E5" fill="none"/>
                   </svg>
                   <div>
                       <span class="logo-text-reseau">Réseau</span><span class="logo-text-m9"> M9</span>
                       <span class="logo-subtitle">LA VOIX DU COLLÈGE</span>
                   </div>
               </div>
           </a>
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
               <span class="navbar-toggler-icon"></span>
           </button>
           
           <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav me-auto">
                   <li class="nav-item">
                       <a class="nav-link" href="{{ route('home') }}">
                           <i class="bi bi-house-fill me-1"></i>{{ __('messages.home') }}
                       </a>
                   </li>
                   @auth
                       <li class="nav-item">
                           <a class="nav-link" href="{{ route('etudiant.index') }}">
                               <i class="bi bi-people-fill me-1"></i>{{ __('messages.students') }}
                           </a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="{{ route('articles.index') }}">
                               <i class="bi bi-chat-dots-fill me-1"></i>{{ __('messages.forum') }}
                           </a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="{{ route('documents.index') }}">
                               <i class="bi bi-file-earmark-text-fill me-1"></i>{{ __('messages.documents') }}
                           </a>
                       </li>
                   @endauth
               </ul>

               <ul class="navbar-nav">
                   <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                           <i class="bi bi-globe me-1"></i>{{ __('messages.language') }}
                       </a>
                       <ul class="dropdown-menu dropdown-menu-end">
                           <li>
                               <a class="dropdown-item" href="{{ route('lang', 'fr') }}">Français</a>
                           </li>
                           <li>
                               <a class="dropdown-item" href="{{ route('lang', 'en') }}">English</a>
                           </li>
                       </ul>
                   </li>

                   @guest
                       <li class="nav-item">
                           <a class="nav-link" href="{{ route('login') }}">
                               <i class="bi bi-box-arrow-in-right me-1"></i>{{ __('messages.login') }}
                           </a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="{{ route('register') }}">
                               <i class="bi bi-person-plus-fill me-1"></i>{{ __('messages.register') }}
                           </a>
                       </li>
                   @else
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                               <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name }}
                           </a>
                           <ul class="dropdown-menu dropdown-menu-end">
                               <li>
                                   <form action="{{ route('logout') }}" method="POST">
                                       @csrf
                                       <button type="submit" class="dropdown-item">
                                           <i class="bi bi-box-arrow-right me-1"></i>{{ __('messages.logout') }}
                                       </button>
                                   </form>
                               </li>
                           </ul>
                       </li>
                   @endguest
               </ul>
           </div>
       </div>
   </nav>

   <main class="container my-4">
       @if(session('success'))
           <div class="alert alert-success alert-dismissible fade show">
               {{ session('success') }}
               <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
           </div>
       @endif

       @if(session('error'))
           <div class="alert alert-danger alert-dismissible fade show">
               {{ session('error') }}
               <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
           </div>
       @endif

       @yield('contenu')
   </main>

   <footer class="py-3">
       <div class="container text-center">
           <p class="mb-0 text-muted">&copy; {{ date('Y') }} Réseau M9. {{ __('messages.all_rights_reserved') }}</p>
       </div>
   </footer>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>