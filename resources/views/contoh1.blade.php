@extends('layouts.app')

@section('title', 'Kamu ulang tahun kan?')

@section('content')
<div class="min-h-screen flex items-center justify-center relative z-10">
    <div class="max-w-2xl mx-auto text-center px-6">
        <!-- Main Question -->
        <div id="questionCard" class="bg-white/80 backdrop-blur-sm rounded-3xl p-12 shadow-2xl border border-pink-100">
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-gray-800 mb-4 korean-font">
                    🎂 Kamu bulan ini ulang tahun kan? 🎂
                </h1>
                <p class="text-lg text-gray-600">
                    Jawab dengan jujur ya... aku sudah tau jawabannya kok! 😊
                </p>
            </div>

            <!-- Buttons -->
            <div class="flex gap-6 justify-center items-center">
                <button id="btnYes" class="bg-gradient-to-r from-pink-400 to-rose-400 hover:from-pink-500 hover:to-rose-500 text-white px-12 py-4 rounded-full text-xl font-semibold shadow-lg transition-all duration-300 transform hover:scale-105">
                    네! (Iya)
                </button>
                
                <button id="btnNo" class="bg-gradient-to-r from-gray-300 to-gray-400 hover:from-gray-400 hover:to-gray-500 text-gray-700 px-12 py-4 rounded-full text-xl font-semibold shadow-lg transition-all duration-300 cursor-pointer">
                    아니요 (Enggak)
                </button>
            </div>
            
            <p id="trickText" class="text-sm text-pink-500 mt-4 opacity-0">
                Hehe, tombol ini nakal! Coba yang sebelah 😜
            </p>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initial animations
    gsap.fromTo("#questionCard", 
        { opacity: 0, scale: 0.8, y: 50 },
        { opacity: 1, scale: 1, y: 0, duration: 1, ease: "back.out(1.7)" }
    );

    const btnYes = document.getElementById('btnYes');
    const btnNo = document.getElementById('btnNo');
    const trickText = document.getElementById('trickText');
    
    let dodgeCount = 0;
    const dodgeMessages = [
        "Ups! Tombolnya kabur! 🏃‍♂️",
        "Wah, nakal banget sih! 😆",
        "Masa enggak ulang tahun? 🤔",
        "Oke, oke, aku percaya deh... TIDAK! 😝"
    ];

    // Yes button - proceed to next page
    btnYes.addEventListener('click', function() {
        gsap.to(btnYes, {
            scale: 1.2,
            duration: 0.2,
            yoyo: true,
            repeat: 1,
            onComplete: () => {
                gsap.to("#questionCard", {
                    opacity: 0,
                    scale: 0.8,
                    duration: 0.8,
                    ease: "back.in(1.7)",
                    onComplete: () => {
                        window.location.href = "{{ route('question2') }}";
                    }
                });
            }
        });
    });

    // No button - dodge effect
    btnNo.addEventListener('click', function(e) {
        e.preventDefault();
        
        dodgeCount++;
        const randomX = (Math.random() - 0.5) * 300;
        const randomY = (Math.random() - 0.5) * 200;
        
        gsap.to(btnNo, {
            x: randomX,
            y: randomY,
            duration: 0.5,
            ease: "back.out(1.7)",
            onComplete: () => {
                // Show trick text with rotation
                gsap.to(trickText, {
                    opacity: 1,
                    duration: 0.3
                });
                
                trickText.textContent = dodgeMessages[Math.min(dodgeCount - 1, dodgeMessages.length - 1)];
                
                // Reset position after a while
                setTimeout(() => {
                    gsap.to(btnNo, {
                        x: 0,
                        y: 0,
                        duration: 0.8,
                        ease: "elastic.out(1, 0.3)"
                    });
                    
                    gsap.to(trickText, {
                        opacity: 0,
                        duration: 0.3,
                        delay: 1
                    });
                }, 2000);
            }
        });
        
        // Add shake effect to the whole card
        gsap.to("#questionCard", {
            x: 10,
            duration: 0.1,
            yoyo: true,
            repeat: 3
        });
    });
});
</script>
@endsection