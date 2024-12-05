@extends('layouts.app')

@section('titre', __('messages.welcome'))

@section('contenu')
<div class="h-screen bg-gradient-to-b from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
   <div class="container mx-auto px-4 py-16">
       <div class="text-center">
           <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-8">
               {{ __('messages.welcome_to') }} {{ config('app.name') }}
           </h1>

           @guest
               <div class="space-y-4">
                   <p class="text-xl text-gray-600 dark:text-gray-300">
                       {{ __('messages.welcome_message') }}
                   </p>
                   <div class="flex justify-center gap-4 mt-8">
                       <a href="{{ route('login') }}" class="btn btn-primary">
                           {{ __('messages.login') }}
                       </a>
                       <a href="{{ route('register') }}" class="btn btn-secondary">
                           {{ __('messages.register') }}
                       </a>
                   </div>
               </div>
           @else
               <div class="grid md:grid-cols-3 gap-8 mt-12">
               <a href="{{ route('etudiant.index') }}" class="card hover:shadow-lg transition">
                       <div class="p-6">
                           <h2 class="text-xl font-semibold mb-4">{{ __('messages.students') }}</h2>
                           <p class="text-gray-600 dark:text-gray-400">
                               {{ __('messages.students_description') }}
                           </p>
                       </div>
                   </a>

                   <a href="{{ route('articles.index') }}" class="card hover:shadow-lg transition">
                       <div class="p-6">
                           <h2 class="text-xl font-semibold mb-4">{{ __('messages.forum') }}</h2>
                           <p class="text-gray-600 dark:text-gray-400">
                               {{ __('messages.forum_description') }}
                           </p>
                       </div>
                   </a>

                   <a href="{{ route('documents.index') }}" class="card hover:shadow-lg transition">
                       <div class="p-6">
                           <h2 class="text-xl font-semibold mb-4">{{ __('messages.documents') }}</h2>
                           <p class="text-gray-600 dark:text-gray-400">
                               {{ __('messages.documents_description') }}
                           </p>
                       </div>
                   </a>
               </div>
           @endguest
       </div>
   </div>
</div>
@endsection