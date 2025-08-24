@extends('layouts.app')

@section('title', 'Loading... 잠시만요!')

@section('content')
<div id="loadingScreen" class="fixed inset-0 bg-gradient-to-br from-pink-100 via-purple-50 to-blue-50 flex items-center justify-center z-50">
    <div class="text-center">
        <!-- Animated Korean Food -->
        <div class="mb-8">
            <div id="tteokbokki" class="inline-block mx-4 text-6xl transform rotate-0">🍢</div>
            <div id="ramyeon" class="inline-block mx-4 text-6xl transform rotate-0">🍜</div>
            <div id="kimbap" class="inline-block mx-4 text-6xl transform rotate-0">🍱</div>
        </div>
        
        <!-- Loading Text -->
        <div id="loadingText" class="korean-font">
            <h2 class="text-3xl font-bold text-pink-600 mb-2">잠시만요...</h2>
            <p class="text-lg text-gray-600">Sebentar ya... Sedang menyiapkan kejutan!</p>
        </div>
        
        <!-- Progress Bar -->
        <div class="w-64 bg-pink-200 rounded-full h-2 mt-6 mx-auto overflow-hidden">
            <div id="progressBar" class="bg-gradient-to-r from-pink-400 to-purple-400 h-full rounded-full w-0 transition-all duration-300"></div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animate food items spinning
    gsap.to("#tteokbokki", {
        rotation: 360,
        duration: 2,
        repeat: -1,
        ease: "none"
    });
    
    gsap.to("#ramyeon", {
        rotation: -360,
        duration: 2.5,
        repeat: -1,
        ease: "none",
        delay: 0.5
    });
    
    gsap.to("#kimbap", {
        rotation: 360,
        duration: 3,
        repeat: -1,
        ease: "none",
        delay: 1
    });

    // Animate loading text
    gsap.fromTo("#loadingText", 
        { opacity: 0, y: 30 },
        { opacity: 1, y: 0, duration: 1, ease: "bounce.out", delay: 0.5 }
    );

    // Progress bar animation
    gsap.to("#progressBar", {
        width: "100%",
        duration: 3,
        ease: "power2.out"
    });

    // Transition to first page after loading
    setTimeout(() => {
        gsap.to("#loadingScreen", {
            opacity: 0,
            duration: 1,
            onComplete: () => {
                window.location.href = "{{ route('question1') }}";
            }
        });
    }, 3500);
});
</script>
@endsection