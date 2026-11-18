@extends('layouts.app')

@section('title', 'Something went wrong')

@section('content')
    <style>
        .error-hero {
            position: relative;
            overflow: hidden;
            border-radius: 1rem;
            padding: 3rem 1.5rem;
            text-align: center;
            color: #fff;
            background: linear-gradient(135deg, #7f1d1d 0%, #b91c1c 45%, #f97316 100%);
        }
        .error-hero::before,
        .error-hero::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
        }
        .error-hero::before { width: 18rem; height: 18rem; top: -6rem; left: -5rem; }
        .error-hero::after  { width: 14rem; height: 14rem; bottom: -5rem; right: -4rem; }
        .error-hero > * { position: relative; z-index: 1; }
        .error-hero svg { max-width: 100%; height: auto; }
        .error-code { letter-spacing: 0.4em; font-size: 0.9rem; opacity: 0.85; }
        @media (prefers-reduced-motion: no-preference) {
            .error-hero .pulse { animation: pulse 2.4s ease-in-out infinite; transform-origin: center; }
            @keyframes pulse { 0%, 100% { opacity: 1; } 50% { opacity: 0.55; } }
        }
    </style>

    <div class="error-hero">
        <svg width="160" height="160" viewBox="0 0 160 160" role="img" aria-label="Warning sign">
            <path d="M80 18 L148 138 H12 Z" fill="#fff" fill-opacity="0.95" stroke="#fde68a" stroke-width="6" stroke-linejoin="round"/>
            <rect x="73" y="58" width="14" height="46" rx="7" fill="#b91c1c"/>
            <circle class="pulse" cx="80" cy="120" r="8" fill="#b91c1c"/>
            <path d="M24 40 l8 8 m0 -8 l-8 8" stroke="#fde68a" stroke-width="4" stroke-linecap="round"/>
            <path d="M128 52 l8 8 m0 -8 l-8 8" stroke="#fde68a" stroke-width="4" stroke-linecap="round"/>
        </svg>

        <p class="error-code mt-3 mb-1">ERROR 500</p>
        <h1 class="mb-3">Something went wrong</h1>
        <p class="mb-4">We hit a problem on our side and couldn't finish loading this page. It has been recorded, and it isn't anything you did.</p>
        <a href="{{ route('books.index') }}" class="btn btn-light">Try the list again</a>
    </div>
@endsection