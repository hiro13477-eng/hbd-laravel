@extends('layouts.app')

@section('title', 'Happy Birthday - Sweet Birthday Message')

@section('content')
<div class="min-h-screen relative z-10 py-8">
    <div class="max-w-6xl mx-auto px-6">
       
            <button onclick="history.back()" class="back-button" aria-label="Back to previous page">
    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
    </svg>
</button>
             <!-- Header -->
        <div id="header" class="text-center mb-12">
            <div class="mb-6">
                <div class="text-6xl mb-4 animate-bounce">🎂</div>
                <h1 class="text-5xl font-bold mb-4 text-white drop-shadow-lg">
                    🎬 생일 축하해! 🎬
                </h1>
                <h2 class="text-3xl font-semibold text-pink-100 mb-4">Happy Birthday Special Message</h2>
                <p class="text-lg text-white/90 mb-8" id="birthdayMessage">
                    Video spesial dari seorang teman yang ingin mengucapkan selamat ulang tahun dengan cara yang manis! 💝✨
                </p>
            </div>
        </div>

        <!-- Main Video Player -->
        <div id="videoContainer" class="max-w-4xl mx-auto mb-12">
            <div class="bg-white/90 backdrop-blur-sm rounded-3xl p-8 shadow-2xl border border-pink-200">
                <div class="aspect-video bg-gradient-to-br from-pink-50 to-purple-50 rounded-2xl overflow-hidden shadow-lg relative">
                    <!-- Video Preview with Sweet Anime Birthday Theme -->
                    <div id="videoPreview" class="w-full h-full flex items-center justify-center cursor-pointer relative group" style="z-index: 10;">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/30"></div>
                        
                        <!-- Background image - sweet anime birthday theme -->
                        <img src="https://images.pexels.com/photos/1729808/pexels-photo-1729808.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="Sweet Birthday Celebration" class="absolute inset-0 w-full h-full object-cover">
                        
                        <div class="text-center text-white z-20 transform group-hover:scale-105 transition-all duration-300">
                            <div class="text-7xl mb-6 animate-pulse">▶️</div>
                            <h3 class="text-3xl font-bold mb-3 drop-shadow-lg" id="videoTitle">🎭 Sweet Birthday Message 🎂</h3>
                            <p class="text-xl font-semibold mb-2" id="videoSubtitle">Pesan Ulang Tahun yang Manis Untukmu</p>
                            <p class="text-sm opacity-90 mb-6">Video anime sweet yang dibuat khusus untuk hari spesialmu!</p>
                            
                            <div class="bg-gradient-to-r from-pink-500/80 to-purple-500/80 backdrop-blur-sm rounded-full px-8 py-3 inline-block hover:from-pink-600/80 hover:to-purple-600/80 transition-all duration-300 cursor-pointer" onclick="playVideo()">
                                <p class="text-sm font-medium flex items-center gap-2">
                                    <span>👑</span> Klik untuk menonton pesan spesialmu! <span>💖</span>
                                </p>
                            </div>
                        </div>
                        
                        <!-- Decorative elements -->
                        <div class="absolute top-6 right-6 text-yellow-300 text-3xl animate-bounce pointer-events-none">🎈</div>
                        <div class="absolute bottom-6 left-6 text-pink-300 text-2xl animate-pulse pointer-events-none">🎀</div>
                        <div class="absolute top-1/4 left-10 text-purple-200 text-xl animate-ping pointer-events-none">✨</div>
                        <div class="absolute bottom-1/3 right-12 text-yellow-200 text-lg animate-bounce delay-300 pointer-events-none">🌟</div>
                    </div>
                    
                    <!-- Actual video - YouTube embedded (initially hidden and no autoplay) -->
                    <div id="dramaVideo" class="w-full h-full hidden">
                        <iframe 
                            id="youtubeIframe"
                            width="100%" 
                            height="100%" 
                            src="" 
                            title="Sweet Birthday Message" 
                            frameborder="0" 
                            allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                            allowfullscreen
                            class="rounded-2xl">
                        </iframe>
                    </div>
                </div>
                
                <!-- Video Info -->
                <div id="videoInfo" class="mt-6 text-center">
                    <h3 class="text-3xl font-bold text-gray-800 mb-3" id="videoInfoTitle">🎭 Pesan Ulang Tahun yang Manis 🎂</h3>
                    <p class="text-gray-600 mb-4 text-lg" id="videoDescription">
                        Sebuah video anime sweet dengan pesan ulang tahun yang tulus dari seorang teman yang peduli denganmu! 💕
                    </p>
                    <div class="flex justify-center space-x-6 text-sm text-gray-500 flex-wrap gap-2">
                        <span class="bg-blue-50 px-3 py-1 rounded-full">🕐 Durasi: 2:30</span>
                        <span class="bg-pink-50 px-3 py-1 rounded-full">🎬 Genre: Sweet/Friendship</span>
                        <span class="bg-purple-50 px-3 py-1 rounded-full">⭐ Dibuat dengan Cinta</span>
                        <span class="bg-yellow-50 px-3 py-1 rounded-full">💝 Special Edition</span>
                    </div>
                    <div class="mt-4 text-xs text-gray-400">
                        <p class="mb-1">🎵 Background Music: Sweet Melody Collection</p>
                        <p class="mb-1">🎨 Style: Anime Sweet & Cute</p>
                        <p>💌 Pesan: "Selamat ulang tahun dari temanmu yang selalu mendukung!"</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Birthday Message Cards -->
        <div id="messagesSection" class="max-w-4xl mx-auto mb-12">
            <h3 class="text-3xl font-bold text-center mb-8 text-white drop-shadow-lg">
                💌 Pesan Spesial Untukmu
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Message 1 -->
                <div class="message-card bg-gradient-to-r from-pink-100 to-purple-100 rounded-2xl p-6 shadow-xl border border-pink-200 transform hover:scale-105 transition-all duration-300">
                    <div class="text-center mb-4">
                        <div class="text-4xl mb-2">👤</div>
                        <h4 class="font-bold text-gray-800">From Your Friend 💙</h4>
                    </div>
                    <p class="text-gray-700 text-center leading-relaxed" id="message1">
                        "Selamat ulang tahun, temanku! Semoga harimu dipenuhi dengan kebahagiaan dan senyuman." 
                        Kamu adalah orang yang luar biasa dan aku bangga bisa jadi temanmu! 🌟
                    </p>
                </div>

                <!-- Message 2 -->
                <div class="message-card bg-gradient-to-r from-blue-100 to-indigo-100 rounded-2xl p-6 shadow-xl border border-blue-200 transform hover:scale-105 transition-all duration-300">
                    <div class="text-center mb-4">
                        <div class="text-4xl mb-2">🎂</div>
                        <h4 class="font-bold text-gray-800">Wish Terbaik 🌸</h4>
                    </div>
                    <p class="text-gray-700 text-center leading-relaxed" id="message2">
                        "Di hari istimewa ini, aku berharap semua impianmu menjadi kenyataan." 
                        Tetap jadi dirimu yang menginspirasi dan selalu tersenyum! ✨
                    </p>
                </div>
            </div>
        </div>

        <!-- Final Birthday Wish -->
        <div id="finalWish" class="max-w-4xl mx-auto mt-12">
            <div class="bg-gradient-to-r from-pink-100/90 to-purple-100/90 backdrop-blur-sm rounded-3xl p-8 shadow-2xl border border-pink-200 text-center">
                <div class="text-6xl mb-4">🎂</div>
                <h3 class="text-3xl font-bold text-gray-800 mb-4" id="finalWishTitle">Selamat Ulang Tahun! 🎉</h3>
                <p class="text-lg text-gray-700 leading-relaxed mb-6" id="finalWishText">
                    Semoga tahun ini membawa kebahagiaan, kesuksesan, dan semua hal indah yang kamu impikan. 
                    Kamu layak mendapatkan yang terbaik di dunia! 
                </p>
                <p class="text-base text-gray-600 italic" id="finalWishQuote">
                    "Terima kasih sudah jadi teman yang luar biasa. Happy Birthday! 💕"
                </p>
                
                <!-- Birthday Cake Animation -->
                <div class="mt-8 text-8xl animate-pulse">
                    🎂✨🎈
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Floating Birthday Elements -->
<div id="floatingElements" class="fixed inset-0 pointer-events-none z-0">
    <div class="birthday-float absolute top-20 left-10 text-3xl animate-bounce delay-100">🎈</div>
    <div class="birthday-float absolute top-40 right-16 text-2xl animate-pulse delay-300">✨</div>
    <div class="birthday-float absolute bottom-32 left-20 text-4xl animate-bounce delay-500">🎂</div>
    <div class="birthday-float absolute bottom-20 right-10 text-2xl animate-ping delay-700">💝</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const videoPreview = document.getElementById('videoPreview');
    const dramaVideo = document.getElementById('dramaVideo');
    
    // Initialize music from the layout (keep it working properly)
    const layoutMusicToggle = document.getElementById('musicToggle');
    const youtubePlayer = document.getElementById('youtubePlayer');
    
    // Make sure the layout music button works properly on this page
    if (layoutMusicToggle && youtubePlayer) {
        // Start with music muted (as per app.blade.php design)
        let isPlaying = false;
        
        layoutMusicToggle.addEventListener('click', function() {
            if (isPlaying) {
                // Mute the background music
                youtubePlayer.src = '';
                layoutMusicToggle.querySelector('svg').innerHTML = '<path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z"></path><path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217z"></path>';
                layoutMusicToggle.classList.remove('music-playing');
                layoutMusicToggle.classList.add('bg-gray-100', 'hover:bg-gray-200', 'text-gray-600');
                layoutMusicToggle.classList.remove('bg-pink-100', 'hover:bg-pink-200', 'text-pink-600');
                isPlaying = false;
            } else {
                // Play background music
                youtubePlayer.src = 'https://www.youtube.com/embed/nAw2ooeubSQ?autoplay=1&loop=1&playlist=nAw2ooeubSQ&controls=0&showinfo=0&rel=0&modestbranding=1&iv_load_policy=3&fs=0&disablekb=1&mute=0';
                layoutMusicToggle.querySelector('svg').innerHTML = '<path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM15.657 6.343a1 1 0 011.414 0A9.972 9.972 0 0119 12a9.972 9.972 0 01-1.929 5.657 1 1 0 11-1.414-1.414A7.972 7.972 0 0017 12a7.972 7.972 0 00-1.343-4.243 1 1 0 010-1.414z"></path>';
                layoutMusicToggle.classList.add('music-playing');
                layoutMusicToggle.classList.remove('bg-gray-100', 'hover:bg-gray-200', 'text-gray-600');
                layoutMusicToggle.classList.add('bg-pink-100', 'hover:bg-pink-200', 'text-pink-600');
                isPlaying = true;
            }
        });
        
        // Add visual feedback when music is playing
        setInterval(() => {
            if (isPlaying) {
                if (Math.random() < 0.3) { // 30% chance every 2 seconds
                    createMusicNote();
                }
            }
        }, 2000);
    }
    
    // Get birthday date from localStorage or URL parameter
    const birthdayDate = localStorage.getItem('birthdayDate') || new URLSearchParams(window.location.search).get('date') || '??';
    
    // Update all texts with the selected date
    updateBirthdayTexts(birthdayDate);
    
    // Initial animations with sweet birthday theme
    gsap.fromTo("#header", 
        { opacity: 0, y: -50 },
        { opacity: 1, y: 0, duration: 1.5, ease: "bounce.out" }
    );

    gsap.fromTo("#videoContainer", 
        { opacity: 0, scale: 0.8, rotationY: -15 },
        { opacity: 1, scale: 1, rotationY: 0, duration: 1.2, ease: "back.out(1.7)", delay: 0.3 }
    );

    gsap.fromTo(".message-card", 
        { opacity: 0, y: 30 },
        { 
            opacity: 1, 
            y: 0, 
            duration: 0.8, 
            ease: "power2.out",
            stagger: 0.2,
            delay: 0.6
        }
    );

    gsap.fromTo("#finalWish", 
        { opacity: 0, y: 50 },
        { opacity: 1, y: 0, duration: 1, ease: "power2.out", delay: 0.8 }
    );

    // Floating elements animation
    gsap.to(".birthday-float", {
        y: -20,
        duration: 2,
        ease: "power2.inOut",
        yoyo: true,
        repeat: -1,
        stagger: 0.3
    });

    // Play main video with sweet birthday celebration effect
    videoPreview.addEventListener('click', function() {
        console.log('Video preview clicked!'); // Debug log
        
        // Get the YouTube iframe
        const youtubeIframe = document.getElementById('youtubeIframe');
        
        // Set the YouTube iframe src with the updated link and autoplay
        youtubeIframe.src = 'https://www.youtube.com/embed/TsLTtUTRKNs?autoplay=1&controls=1&rel=0&modestbranding=1';
        
        // Start animation to hide preview
        gsap.to(videoPreview, {
            opacity: 0,
            scale: 0.8,
            duration: 0.6,
            ease: "power2.in",
            onComplete: () => {
                // Hide preview, show video container
                videoPreview.style.display = 'none';
                dramaVideo.style.display = 'block';
                dramaVideo.classList.remove('hidden');
                
                // Animate video container appearance
                gsap.fromTo(dramaVideo,
                    { opacity: 0, scale: 0.8 },
                    { 
                        opacity: 1, 
                        scale: 1, 
                        duration: 0.6, 
                        ease: "back.out(1.7)",
                        onComplete: () => {
                            console.log('Video container shown'); // Debug log
                        }
                    }
                );
                
                // Create celebration effect
                createSweetCelebration();
                
                // Show sweet birthday message after delay
                setTimeout(() => {
                    showBirthdayMessage();
                }, 2000);
            }
        });
    });
});

// Create sweet birthday celebration effect
function createSweetCelebration() {
    const container = document.getElementById('videoContainer');
    const rect = container.getBoundingClientRect();
    
    const sweetEmojis = ['🎉', '🎂', '🎈', '💝', '🎁', '✨', '🌟', '💕', '🎊', '🥳', '🌸', '💖', '🦋', '🌺'];
    
    for (let i = 0; i < 25; i++) {
        const celebrate = document.createElement('div');
        celebrate.innerHTML = sweetEmojis[Math.floor(Math.random() * sweetEmojis.length)];
        celebrate.className = 'fixed text-3xl pointer-events-none z-40';
        celebrate.style.left = rect.left + Math.random() * rect.width + 'px';
        celebrate.style.top = rect.top + Math.random() * rect.height + 'px';
        document.body.appendChild(celebrate);
        
        gsap.to(celebrate, {
            y: -150,
            x: (Math.random() - 0.5) * 300,
            scale: 0,
            rotation: Math.random() * 720,
            duration: 3,
            ease: "power2.out",
            onComplete: () => celebrate.remove()
        });
    }
}

// Show birthday message overlay with notification style
function showBirthdayMessage() {
    const message = document.createElement('div');
    message.className = 'fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4';
    message.innerHTML = `
        <div class="bg-white rounded-2xl p-6 shadow-2xl border border-pink-200 max-w-md w-full mx-auto transform scale-0 transition-all duration-300 ease-out">
            <div class="flex items-start space-x-3">
                <div class="flex-shrink-0">
                    <div class="text-3xl">🎂</div>
                </div>
                <div class="flex-1">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-lg font-bold text-gray-800">Happy Birthday! 🎉</h3>
                        <button onclick="this.closest('.fixed').remove()" class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <p class="text-gray-600 text-sm mb-3 leading-relaxed" id="birthdayPopupMessage">
                        Semoga hari spesialmu dipenuhi kebahagiaan dan cinta dari orang-orang terdekat!
                    </p>
                    <div class="bg-gradient-to-r from-pink-50 to-purple-50 p-3 rounded-xl mb-4">
                        <p class="text-xs font-medium text-gray-700 italic" id="birthdayPopupQuote">
                            "Kamu adalah teman yang luar biasa! 💕"
                        </p>
                    </div>
                    <div class="flex justify-end">
                        <button onclick="this.closest('.fixed').remove()" 
                                class="px-4 py-2 bg-gradient-to-r from-pink-500 to-purple-500 text-white text-sm rounded-lg hover:from-pink-600 hover:to-purple-600 transition-all duration-300 shadow-lg">
                            Thank You! ✨
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    document.body.appendChild(message);
    
    // Scale in animation
    setTimeout(() => {
        const messageBox = message.querySelector('.bg-white');
        messageBox.style.transform = 'scale(1)';
    }, 100);
    
    // Auto remove after 8 seconds
    setTimeout(() => {
        if (message.parentElement) {
            const messageBox = message.querySelector('.bg-white');
            messageBox.style.transform = 'scale(0)';
            setTimeout(() => message.remove(), 300);
        }
    }, 8000);
}

// Create continuous sweet sparkle effect
function createSweetSparkles() {
    const sparkleEmojis = ['✨', '🌟', '💫', '⭐', '🌸', '💖', '🦋'];
    
    for (let i = 0; i < 10; i++) {
        const sparkle = document.createElement('div');
        sparkle.innerHTML = sparkleEmojis[Math.floor(Math.random() * sparkleEmojis.length)];
        sparkle.className = 'fixed text-2xl pointer-events-none z-40';
        sparkle.style.left = Math.random() * window.innerWidth + 'px';
        sparkle.style.top = Math.random() * window.innerHeight + 'px';
        document.body.appendChild(sparkle);
        
        gsap.to(sparkle, {
            y: -200,
            x: (Math.random() - 0.5) * 400,
            scale: 0,
            rotation: Math.random() * 360,
            duration: 2.5,
            ease: "power2.out",
            onComplete: () => sparkle.remove()
        });
    }
}

// Add some continuous sweet ambiance
setInterval(() => {
    if (Math.random() < 0.15) { // 15% chance every 2 seconds
        createSweetSparkles();
    }
}, 2000);

// Alternative click handler as backup
window.playVideo = function() {
    console.log('Manual play video called');
    const videoPreview = document.getElementById('videoPreview');
    const dramaVideo = document.getElementById('dramaVideo');
    const youtubeIframe = document.getElementById('youtubeIframe');
    
    // Set YouTube source with the updated link
    youtubeIframe.src = 'https://www.youtube.com/embed/TsLTtUTRKNs?autoplay=1&controls=1&rel=0&modestbranding=1';
    
    // Hide preview, show video
    videoPreview.style.display = 'none';
    dramaVideo.style.display = 'block';
    dramaVideo.classList.remove('hidden');
    
    createSweetCelebration();
    
    setTimeout(() => {
        showBirthdayMessage();
    }, 2000);
};

// Create floating music note animation (same as app.blade.php)
function createMusicNote() {
    const musicButton = document.getElementById('musicToggle');
    if (!musicButton) return;
    
    const rect = musicButton.getBoundingClientRect();
    
    const note = document.createElement('div');
    note.innerHTML = '♪';
    note.className = 'fixed text-pink-400 text-sm pointer-events-none z-40';
    note.style.left = rect.left + 'px';
    note.style.top = rect.top + 'px';
    document.body.appendChild(note);
    
    // GSAP animation for the note
    gsap.to(note, {
        y: -50,
        x: Math.random() * 40 - 20,
        scale: 0,
        rotation: Math.random() * 360,
        duration: 2,
        ease: "power2.out",
        onComplete: () => note.remove()
    });
}

// Function to update all birthday texts based on selected date
function updateBirthdayTexts(date) {
    const dateText = date !== '??' ? `tanggal ${date}` : 'hari spesialmu';
    const dayText = date !== '??' ? `tanggal ${date}` : 'hari ini';
    
    // Update main header
    document.getElementById('birthdayMessage').innerHTML = 
        `Video spesial dari seorang teman yang ingin mengucapkan selamat ulang tahun ${dateText} dengan cara yang manis! 💝✨`;
    
    // Update video preview
    document.getElementById('videoTitle').innerHTML = 
        `🎭 Sweet Birthday Message ${date !== '??' ? `(${date})` : ''} 🎂`;
    document.getElementById('videoSubtitle').innerHTML = 
        `Pesan Ulang Tahun ${dateText === 'hari spesialmu' ? 'yang Manis' : 'Tanggal ' + date} Untukmu`;
    
    // Update video info
    document.getElementById('videoInfoTitle').innerHTML = 
        `🎭 Pesan Ulang Tahun ${dateText === 'hari spesialmu' ? 'yang Manis' : 'Tanggal ' + date} 🎂`;
    document.getElementById('videoDescription').innerHTML = 
        `Sebuah video anime sweet dengan pesan ulang tahun ${dateText} yang tulus dari seorang teman yang peduli denganmu! 💕`;
    
    // Update message cards
    document.getElementById('message1').innerHTML = 
        `"Selamat ulang tahun ${dateText}, temanku! Semoga harimu dipenuhi dengan kebahagiaan dan senyuman." 
        Kamu adalah orang yang luar biasa dan aku bangga bisa jadi temanmu! 🌟`;
    
    document.getElementById('message2').innerHTML = 
        `"Di ${dayText} yang istimewa, aku berharap semua impianmu menjadi kenyataan." 
        Tetap jadi dirimu yang menginspirasi dan selalu tersenyum! ✨`;
    
    // Update final wish
    document.getElementById('finalWishTitle').innerHTML = 
        `Selamat Ulang Tahun ${date !== '??' ? 'Tanggal ' + date : ''}! 🎉`;
    document.getElementById('finalWishText').innerHTML = 
        `Semoga ${dayText} dan tahun ini membawa kebahagiaan, kesuksesan, dan semua hal indah yang kamu impikan. 
        Kamu layak mendapatkan yang terbaik di dunia!`;
    document.getElementById('finalWishQuote').innerHTML = 
        `"Terima kasih sudah jadi teman yang luar biasa. Happy Birthday ${date !== '??' ? 'tanggal ' + date : ''}! 💕"`;
    
    // Update popup messages
    if (document.getElementById('birthdayPopupMessage')) {
        document.getElementById('birthdayPopupMessage').innerHTML = 
            `Semoga ${dayText} yang spesial dipenuhi kebahagiaan dan cinta dari orang-orang terdekat!`;
    }
    if (document.getElementById('birthdayPopupQuote')) {
        document.getElementById('birthdayPopupQuote').innerHTML = 
            `"Selamat ulang tahun ${dateText}! Kamu adalah teman yang luar biasa! 💕"`;
    }
}
</script>

<style>
.glow {
    text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
}

.card-hover {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card-hover:hover {
    transform: translateY(-5px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.korean-font {
    font-family: 'Noto Sans KR', sans-serif;
}

.gradient-bg {
    background: linear-gradient(135deg, #ffeef8 0%, #f0f9ff 50%, #f0fdf4 100%);
}

.floating {
    animation: floating 3s ease-in-out infinite;
}

@keyframes floating {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

.food-emoji {
    font-size: 2.5rem;
    filter: drop-shadow(0 4px 8px rgba(0,0,0,0.1));
}

/* Sweet themed animations */
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.birthday-float {
    animation: float 3s ease-in-out infinite;
}

/* Custom scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
}

/* Sweet hover effects */
.message-card:hover {
    transform: translateY(-8px) scale(1.03);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
}


 /* Back Button */
    .back-button {
        position: fixed;
        top: 30px;
        left: 30px;
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #ff6b9d 0%, #e91e63 100%);
        border: none;
        border-radius: 50%;
        color: white;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 10px 25px rgba(255, 107, 157, 0.3);
        transition: all 0.3s ease;
        z-index: 5000;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.2);
    }
    
    .back-button:hover {
        transform: translateY(-3px) scale(1.1);
        box-shadow: 0 15px 35px rgba(255, 107, 157, 0.4);
        background: linear-gradient(135deg, #e91e63 0%, #ad1457 100%);
    }
    
    .back-button:active {
        transform: translateY(-1px) scale(1.05);
    }
    
    .back-button svg {
        width: 24px;
        height: 24px;
        transition: transform 0.3s ease;
    }
    
    .back-button:hover svg {
        transform: translateX(-2px);
    }

</style>
@endsection