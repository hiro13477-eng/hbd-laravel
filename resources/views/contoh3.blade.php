@extends('layouts.app')

@section('title', '생일 축하해요! Menu Utama')

@section('content')
<!-- Confetti Background -->
<div id="confetti-container" class="fixed inset-0 pointer-events-none z-20"></div>

<div class="min-h-screen relative z-10 py-8">
    <div class="max-w-6xl mx-auto px-6">
        <!-- Main Birthday Greeting -->
        <div id="mainGreeting" class="text-center mb-12">
            <h1 class="text-6xl font-bold korean-font mb-4 glow" style="background: linear-gradient(45deg, #ec4899, #8b5cf6); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                생일 축하해요! 🎉
            </h1>
            <h2 class="text-3xl font-semibold text-gray-700 mb-2">
                Selamat Ulang Tahun!
            </h2>
            <p class="text-xl text-gray-600 mb-6">
                Semoga harimu seindah drama favoritmu! ✨
            </p>
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-4 inline-block shadow-lg">
                <p class="text-lg text-pink-600 font-semibold">
                    🗓️ Tanggal Ulang Tahun: <span class="text-2xl">{{ $birthdayDate }}</span>
                </p>
            </div>
        </div>

        <!-- Menu Cards -->
        <div id="menuGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Gallery Card -->
            <div class="menu-card card-hover bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-2xl border border-pink-100 text-center cursor-pointer" onclick="navigateTo('{{ route('gallery') }}')">
                <div class="text-6xl mb-4">📸</div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2 korean-font">갤러리</h3>
                <h4 class="text-xl font-semibold text-pink-600 mb-3">Galeri Foto</h4>
                <p class="text-gray-600">Cetak foto siapa nih?!! 🤭📸</p>
            </div>

            <!-- Comic Card -->
            <div class="menu-card card-hover bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-2xl border border-pink-100 text-center cursor-pointer" onclick="navigateTo('{{ route('comic') }}')">
                <div class="text-6xl mb-4">📚</div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2 korean-font">만화</h3>
                <h4 class="text-xl font-semibold text-purple-600 mb-3">Short Comic</h4>
                <p class="text-gray-600">Komik-komikan aja sih... 😆📚</p>
            </div>

            <!-- Drama Card -->
            <div class="menu-card card-hover bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-2xl border border-pink-100 text-center cursor-pointer" onclick="navigateTo('{{ route('drama') }}')">
                <div class="text-6xl mb-4">🎬</div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2 korean-font">드라마</h3>
                <h4 class="text-xl font-semibold text-blue-600 mb-3">Short Video</h4>
                <p class="text-gray-600">Short video... entah apa isinya! 🎬✨</p>
            </div>

            <!-- Music Card -->
            <div class="menu-card card-hover bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-2xl border border-pink-100 text-center cursor-pointer" onclick="navigateTo('{{ route('music') }}')">
                <div class="text-6xl mb-4">🎵</div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2 korean-font">음악</h3>
                <h4 class="text-xl font-semibold text-green-600 mb-3">Lagu Favorit</h4>
                <p class="text-gray-600">Lagu yang kamu suka maybe??? 🎵</p>
            </div>

            <!-- Secret Message Card -->
            <div class="menu-card card-hover bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-2xl border border-pink-100 text-center cursor-pointer" onclick="navigateTo('{{ route('secret') }}')">
                <div class="text-6xl mb-4">💌</div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2 korean-font">비밀 메시지</h3>
                <h4 class="text-xl font-semibold text-rose-600 mb-3">Apa ya ini???</h4>
                <p class="text-gray-600">Jangan di-pencet entar... 🙈</p>
            </div>

            <!-- Back Home Card -->
            <div class="menu-card card-hover bg-gradient-to-br from-orange-100 to-yellow-100 rounded-3xl p-8 shadow-2xl border border-orange-200 text-center cursor-pointer" onclick="navigateTo('{{ route('home') }}')">
                <div class="text-6xl mb-4">🏠</div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">홈으로</h3>
                <h4 class="text-xl font-semibold text-orange-600 mb-3">Kembali ke Awal</h4>
                <p class="text-gray-600">Mulai lagi dari loading screen 🔄</p>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initial animations
    gsap.fromTo("#mainGreeting", 
        { opacity: 0, y: -100 },
        { opacity: 1, y: 0, duration: 1.5, ease: "bounce.out" }
    );

    // Animate menu cards with stagger
    gsap.fromTo(".menu-card", 
        { opacity: 0, scale: 0.5, y: 100 },
        { 
            opacity: 1, 
            scale: 1, 
            y: 0, 
            duration: 1, 
            ease: "back.out(1.7)",
            stagger: 0.2,
            delay: 0.5
        }
    );

    // Create confetti effect
    createConfetti();

    // Auto-play background music after user interaction
    setTimeout(() => {
        const bgMusic = document.getElementById('bgMusic');
        bgMusic.play().catch(e => console.log('Audio autoplay prevented'));
    }, 2000);
});

function navigateTo(url) {
    gsap.to(".menu-card", {
        scale: 0.8,
        opacity: 0.8,
        duration: 0.5,
        onComplete: () => {
            window.location.href = url;
        }
    });
}

function createConfetti() {
    const container = document.getElementById('confetti-container');
    const colors = ['#ec4899', '#8b5cf6', '#06b6d4', '#10b981', '#f59e0b'];
    
    for (let i = 0; i < 50; i++) {
        const confetti = document.createElement('div');
        confetti.className = 'absolute w-3 h-3 rounded-full opacity-80';
        confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
        confetti.style.left = Math.random() * window.innerWidth + 'px';
        confetti.style.top = '-10px';
        container.appendChild(confetti);
        
        gsap.to(confetti, {
            y: window.innerHeight + 20,
            x: (Math.random() - 0.5) * 200,
            rotation: Math.random() * 360,
            duration: Math.random() * 3 + 3,
            ease: "power2.out",
            onComplete: () => confetti.remove()
        });
        
        // Delay between confetti
        gsap.delayedCall(Math.random() * 5, () => {});
    }
}

// Music toggle functionality
document.addEventListener('DOMContentLoaded', function() {
    const musicToggle = document.getElementById('musicToggle');
    const bgMusic = document.getElementById('bgMusic');
    const musicIcon = document.getElementById('musicIcon');
    let isPlaying = false;

    musicToggle.addEventListener('click', function() {
        if (isPlaying) {
            bgMusic.pause();
            musicIcon.innerHTML = '<path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217z"></path>';
        } else {
            bgMusic.play();
            musicIcon.innerHTML = '<path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM15.657 6.343a1 1 0 011.414 0A9.972 9.972 0 0119 12a9.972 9.972 0 01-1.929 5.657 1 1 0 11-1.414-1.414A7.972 7.972 0 0017 12a7.972 7.972 0 00-1.343-4.243 1 1 0 010-1.414z"></path>';
        }
        isPlaying = !isPlaying;
    });
});
</script>
@endsection