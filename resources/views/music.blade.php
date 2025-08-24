@extends('layouts.app')

@section('title', '음악 - Olivia Rodrigo')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;700&display=swap');
    
    .korean-font {
        font-family: 'Noto Sans KR', sans-serif;
    }
    
    .glow {
        text-shadow: 0 0 20px rgba(236, 72, 153, 0.5);
    }
    
    .card-hover {
        transition: all 0.15s ease-out;
    }
    
    .card-hover:hover {
        transform: translateY(-1px) scale(1.02);
        box-shadow: 0 4px 12px rgba(255, 255, 255, 0.1);
        /* Jangan ubah background - biarkan animasi shine tetap jalan */
    }
    
    .card-hover:active {
        transform: translateY(0px) scale(1.01);
        transition: all 0.08s ease-in;
    }
    
    .eq-bar {
        animation: equalizer 0.8s ease-in-out infinite alternate;
        height: 8px;
    }
    
    @keyframes equalizer {
        0% { height: 8px; }
        100% { height: 40px; }
    }
    
    .birthday-banner {
        background: linear-gradient(45deg, #ffd700, #ff69b4, #ffd700);
        animation: shine 2s ease-in-out infinite alternate;
    }
    
    @keyframes shine {
        0% { 
            box-shadow: 0 0 20px rgba(255, 105, 180, 0.5);
        }
        100% { 
            box-shadow: 0 0 40px rgba(255, 105, 180, 0.8);
        }
    }
    
    /* Shine yang tidak terganggu transform */
    @keyframes shineContainer {
        0% { 
            box-shadow: 0 0 15px rgba(255, 105, 180, 0.4), 0 4px 12px rgba(255, 255, 255, 0.1);
        }
        100% { 
            box-shadow: 0 0 30px rgba(255, 105, 180, 0.7), 0 4px 12px rgba(255, 255, 255, 0.1);
        }
    }
    
    .vinyl-spin {
        animation: vinyl-rotate 3s linear infinite;
    }
    
    @keyframes vinyl-rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    .heart-float {
        position: fixed;
        pointer-events: none;
        z-index: 1000;
        animation: heart-float 4s linear infinite;
    }
    
    @keyframes heart-float {
        0% { 
            transform: translateY(100vh) scale(0.5);
            opacity: 0;
        }
        10% {
            opacity: 1;
        }
        90% {
            opacity: 1;
        }
        100% { 
            transform: translateY(-100px) scale(1.2);
            opacity: 0;
        }
    }

    .audio-upload-btn {
        background: linear-gradient(45deg, #EC4899, #F59E0B);
        border: none;
        padding: 8px 16px;
        border-radius: 20px;
        color: white;
        font-size: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .audio-upload-btn:hover {
        transform: scale(1.03);
        box-shadow: 0 2px 8px rgba(236, 72, 153, 0.3);
        /* Jangan ubah background button */
    }

    .audio-status {
        font-size: 10px;
        padding: 4px 8px;
        border-radius: 12px;
        margin-top: 4px;
    }

    .audio-loaded {
        background: rgba(34, 197, 94, 0.2);
        color: #16a34a;
    }

    .audio-not-loaded {
        background: rgba(239, 68, 68, 0.2);
        color: #dc2626;
    }

    /* Override layout background for music page */
    body {
        background: linear-gradient(135deg, #ffeef8 0%, #f0f9ff 50%, #f0fdf4 100%) !important;
    }

    /* Fix playlist container visibility */
    #playlistContainer {
        opacity: 1 !important;
        visibility: visible !important;
        display: block !important;
    }

    /* Unified container styling - transparan blur dengan garis bercahaya */
    .unified-container {
        background: rgba(255, 255, 255, 0.15) !important;
        backdrop-filter: blur(12px) !important;
        border: 1px solid rgba(255, 255, 255, 0.2) !important;
        animation: shine 2s ease-in-out infinite alternate;
    }
    
    /* Birthday banner juga transparan blur dengan garis bercahaya */
    .birthday-banner {
        background: rgba(255, 255, 255, 0.15) !important;
        backdrop-filter: blur(12px) !important;
        border: 1px solid rgba(255, 255, 255, 0.2) !important;
        animation: shine 2s ease-in-out infinite alternate;
    }
    
    /* Progress bar functionality - RESTORED */
    #progressBar {
        transition: width 0.1s linear !important;
        background: linear-gradient(to right, #EC4899, #F59E0B) !important;
    }

    #progressContainer {
        background: #e5e7eb !important;
        position: relative;
        cursor: pointer;
    }
    
    /* Reduced button animations */
    .control-btn {
        transition: all 0.15s ease !important;
    }
    
    .control-btn:hover {
        transform: scale(1.05) !important;
    }
    
    .control-btn:active {
        transform: scale(0.98) !important;
        transition: all 0.1s ease !important;
    }
    
    /* Playlist item hover yang lebih halus - tetap pertahankan garis bercahaya */
    .playlist-item {
        transition: all 0.15s ease-out !important;
    }
    
    .playlist-item:hover {
        transform: translateY(-1px) scale(1.02) !important;
        box-shadow: 0 4px 12px rgba(255, 255, 255, 0.1) !important;
        /* Jangan ubah background - biarkan animasi shine tetap jalan */
    }
    
    .playlist-item:active {
        transform: translateY(0px) scale(1.01) !important;
        transition: all 0.08s ease-in !important;
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

<div class="min-h-screen relative py-8">
    <!-- Birthday Banner for Violyn -->
    <div class="birthday-banner unified-container text-center py-4 mb-8 mx-4 rounded-2xl">
        <h2 class="text-2xl font-bold text-pink-800">🎂 SELAMAT ULANG TAHUN VIOLYN! 🎉</h2>
        <p class="text-pink-700">생일 축하해요! Happy Birthday Beautiful! 💖</p>
    </div>

    <!-- Floating Hearts -->
    <div id="heartContainer"></div>
    
    <div class="max-w-6xl mx-auto px-6">
        <!-- Header -->
        <div id="header" class="text-center mb-12">
<!-- Back Button - Outside Container -->
<button onclick="history.back()" class="back-button" aria-label="Back to previous page">
    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
    </svg>
</button>
            
            <h1 class="text-5xl font-bold korean-font mb-4 glow text-gray-800">
                🎵 Olivia Rodrigo 🎵
            </h1>
            <h2 class="text-3xl font-semibold text-gray-700 mb-4">For Violyn 💜</h2>
            <p class="text-lg text-gray-600 mb-8">
                Playlist hits terbaik untuk hari spesial Violyn! 🎶✨
            </p>
            
            <!-- Instructions for ready to play -->
            <div class="unified-container rounded-xl p-4 max-w-2xl mx-auto text-gray-700 text-sm shadow-lg">
                <p class="mb-2">🎵 <strong>Ready to Play!</strong></p>
                <p>Semua lagu Olivia Rodrigo sudah siap diputar untuk Violyn!</p>
                <p>Klik play button atau pilih lagu dari playlist di bawah 💖</p>
            </div>
        </div>

        <!-- Music Player -->
        <div id="musicPlayer" class="max-w-4xl mx-auto mb-12">
            <div class="unified-container rounded-3xl p-8 shadow-2xl">
                <!-- Main Player -->
                <div class="text-center mb-8">
                    <div id="albumCover" class="w-64 h-64 mx-auto mb-6 rounded-3xl shadow-2xl overflow-hidden relative">
                        <img id="currentCover" src="https://images.pexels.com/photos/3861958/pexels-photo-3861958.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Album Cover" class="w-full h-full object-cover">
                        <div id="vinyl" class="absolute inset-0 bg-black/20 rounded-full border-4 border-white opacity-0 transition-all duration-500">
                            <div class="absolute inset-8 bg-black rounded-full flex items-center justify-center">
                                <div class="w-6 h-6 bg-white rounded-full"></div>
                            </div>
                        </div>
                    </div>
                    
                    <h3 id="currentTitle" class="text-2xl font-bold text-gray-800 mb-2">good 4 u</h3>
                    <p id="currentArtist" class="text-lg text-gray-600 mb-4">Olivia Rodrigo</p>
                    
                    <!-- Audio Status -->
                    <div id="audioStatus" class="inline-block audio-status audio-loaded mb-4">
                        Ready to play! 🎵
                    </div>
                    
                    <!-- Progress Bar -->
                    <div class="w-full bg-gray-200 rounded-full h-2 mb-4 overflow-hidden cursor-pointer" id="progressContainer">
                        <div id="progressBar" class="bg-gradient-to-r from-pink-400 to-orange-400 h-full rounded-full" style="width: 0%"></div>
                    </div>
                    
                    <div class="flex justify-between text-sm text-gray-500 mb-6">
                        <span id="currentTime">0:00</span>
                        <span id="totalTime">2:58</span>
                    </div>

                    <!-- Controls -->
                    <div class="flex justify-center items-center space-x-6">
                        <button id="prevBtn" class="control-btn bg-gray-100 hover:bg-gray-200 text-gray-600 p-3 rounded-full shadow-lg">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6 6h2v12H6zm3.5 6l8.5 6V6z"/>
                            </svg>
                        </button>
                        
                        <button id="playBtn" class="control-btn bg-gradient-to-r from-pink-500 to-orange-500 hover:from-pink-600 hover:to-orange-600 text-white p-4 rounded-full shadow-lg">
                            <svg id="playIcon" class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </button>
                        
                        <button id="nextBtn" class="control-btn bg-gray-100 hover:bg-gray-200 text-gray-600 p-3 rounded-full shadow-lg">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6 18l8.5-6L6 6v12zM16 6v12h2V6h-2z"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Volume Control -->
                    <div class="flex items-center justify-center space-x-4 mt-6">
                        <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02z"/>
                        </svg>
                        <input type="range" id="volumeSlider" min="0" max="100" value="70" class="w-32 h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                        <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/>
                        </svg>
                    </div>
                </div>

                <!-- Equalizer Animation -->
                <div id="equalizer" class="flex justify-center items-end space-x-1 h-16 mb-6 opacity-0">
                    <div class="eq-bar bg-gradient-to-t from-pink-400 to-pink-300 w-2 rounded-full"></div>
                    <div class="eq-bar bg-gradient-to-t from-orange-400 to-orange-300 w-2 rounded-full"></div>
                    <div class="eq-bar bg-gradient-to-t from-pink-400 to-pink-300 w-2 rounded-full"></div>
                    <div class="eq-bar bg-gradient-to-t from-orange-400 to-orange-300 w-2 rounded-full"></div>
                    <div class="eq-bar bg-gradient-to-t from-pink-400 to-pink-300 w-2 rounded-full"></div>
                    <div class="eq-bar bg-gradient-to-t from-orange-400 to-orange-300 w-2 rounded-full"></div>
                    <div class="eq-bar bg-gradient-to-t from-pink-400 to-pink-300 w-2 rounded-full"></div>
                    <div class="eq-bar bg-gradient-to-t from-orange-400 to-orange-300 w-2 rounded-full"></div>
                </div>

                <!-- Hidden Audio Element -->
                <audio id="audioPlayer" preload="metadata" crossorigin="anonymous">
                    <source src="" type="audio/mpeg">
                </audio>
            </div>
        </div>

        <!-- Playlist -->
        <div id="playlist" class="max-w-4xl mx-auto">
            <h3 class="text-3xl font-bold korean-font text-center mb-8 text-gray-800">🎼 Olivia Rodrigo Playlist</h3>
            
            <div class="space-y-4" id="playlistContainer" style="opacity: 1; visibility: visible; display: block;">
                <!-- Playlist items will be generated by JavaScript -->
            </div>
        </div>

        <!-- Birthday Message for Violyn -->
        <div class="text-center mt-12 unified-container rounded-2xl p-6 mx-4 shadow-lg">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">🎂 생일 축하해요 Violyn! 🎉</h2>
            <p class="text-xl text-gray-700 mb-2">Selamat Ulang Tahun Violyn!</p>
            <p class="text-lg text-gray-600">Semoga hari spesialmu penuh dengan musik indah dan kebahagiaan! 💖✨</p>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Create birthday hearts for Violyn
    function createBirthdayHearts() {
        const heartContainer = document.getElementById('heartContainer') || document.body;
        
        for (let i = 0; i < 3; i++) {
            setTimeout(() => {
                const heart = document.createElement('div');
                heart.className = 'heart-float';
                heart.innerHTML = ['💖', '💜', '🎂', '🎉', '✨'][Math.floor(Math.random() * 5)];
                heart.style.left = Math.random() * 100 + 'vw';
                heart.style.fontSize = (Math.random() * 15 + 15) + 'px';
                heartContainer.appendChild(heart);
                
                setTimeout(() => {
                    if (heart.parentNode) {
                        heart.parentNode.removeChild(heart);
                    }
                }, 4000);
            }, i * 1000);
        }
    }

    // Start hearts and repeat
    createBirthdayHearts();
    setInterval(createBirthdayHearts, 8000);

    // Enhanced playlist with direct audio files
    const playlist = [
        {
            title: "good 4 u",
            artist: "Olivia Rodrigo",
            korean: "굿 포 유",
            cover: "https://images.pexels.com/photos/3861958/pexels-photo-3861958.jpeg?auto=compress&cs=tinysrgb&w=600",
            duration: "2:58",
            audioFile: "/storage/audio/olivia-rodrigo/good-4-u.mp3",
            audioLoaded: true
        },
        {
            title: "drivers license",
            artist: "Olivia Rodrigo",
            korean: "드라이버스 라이센스",
            cover: "https://images.pexels.com/photos/3944091/pexels-photo-3944091.jpeg?auto=compress&cs=tinysrgb&w=600",
            duration: "4:02",
            audioFile: "/storage/audio/olivia-rodrigo/drivers-license.mp3",
            audioLoaded: true
        },
        {
            title: "vampire",
            artist: "Olivia Rodrigo",
            korean: "뱀파이어",
            cover: "https://images.pexels.com/photos/4199100/pexels-photo-4199100.jpeg?auto=compress&cs=tinysrgb&w=600",
            duration: "3:39",
            audioFile: "/storage/audio/olivia-rodrigo/vampire.mp3",
            audioLoaded: true
        },
        {
            title: "deja vu",
            artist: "Olivia Rodrigo",
            korean: "데자뷰",
            cover: "https://images.pexels.com/photos/3616956/pexels-photo-3616956.jpeg?auto=compress&cs=tinysrgb&w=600",
            duration: "3:35",
            audioFile: "/storage/audio/olivia-rodrigo/deja-vu.mp3",
            audioLoaded: true
        },
        {
            title: "anything",
            artist: "Olivia Rodrigo",
            korean: "애니씽",
            cover: "https://images.pexels.com/photos/4553618/pexels-photo-4553618.jpeg?auto=compress&cs=tinysrgb&w=600",
            duration: "3:12",
            audioFile: "/storage/audio/olivia-rodrigo/anything.mp3",
            audioLoaded: true
        },
        {
            title: "traitor",
            artist: "Olivia Rodrigo",
            korean: "트레이터",
            cover: "https://images.pexels.com/photos/3756766/pexels-photo-3756766.jpeg?auto=compress&cs=tinysrgb&w=600",
            duration: "3:49",
            audioFile: "/storage/audio/olivia-rodrigo/traitor.mp3",
            audioLoaded: true
        }
    ];

    let currentTrack = 0;
    let isPlaying = false;
    let equalizerInterval = null;
    let isUserSeeking = false; // Flag untuk mencegah konflik saat user sedang drag
    const audioPlayer = document.getElementById('audioPlayer');

    // DOM elements
    const playBtn = document.getElementById('playBtn');
    const playIcon = document.getElementById('playIcon');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const currentTitle = document.getElementById('currentTitle');
    const currentArtist = document.getElementById('currentArtist');
    const currentCover = document.getElementById('currentCover');
    const progressBar = document.getElementById('progressBar');
    const progressContainer = document.getElementById('progressContainer');
    const currentTime = document.getElementById('currentTime');
    const totalTime = document.getElementById('totalTime');
    const volumeSlider = document.getElementById('volumeSlider');
    const equalizer = document.getElementById('equalizer');
    const vinyl = document.getElementById('vinyl');
    const playlistContainer = document.getElementById('playlistContainer');
    const audioStatus = document.getElementById('audioStatus');

    // Generate playlist - pastikan container terlihat
    function generatePlaylist() {
        // Pastikan container terlihat
        playlistContainer.style.display = 'block';
        playlistContainer.style.opacity = '1';
        playlistContainer.style.visibility = 'visible';
        
        playlistContainer.innerHTML = '';
        
        playlist.forEach((track, index) => {
            const playlistItem = document.createElement('div');
            playlistItem.className = `playlist-item unified-container rounded-2xl p-4 shadow-lg cursor-pointer ${index === currentTrack ? 'ring-2 ring-pink-600' : ''}`;
            
            playlistItem.innerHTML = `
                <div class="flex items-center space-x-4">
                    <img src="${track.cover}" alt="${track.title}" class="w-16 h-16 rounded-xl object-cover shadow-md">
                    <div class="flex-1">
                        <h4 class="font-bold text-gray-800">${track.title}</h4>
                        <p class="text-sm text-gray-600">${track.artist}</p>
                        <p class="text-xs text-pink-500 korean-font">${track.korean}</p>
                    </div>
                    <div class="text-center">
                        <p class="text-sm text-gray-500 mb-2">${track.duration}</p>
                        <div class="mb-2">
                            ${index === currentTrack && isPlaying ? '<div class="text-lg animate-pulse">🎵</div>' : '<div class="text-lg opacity-50">🎵</div>'}
                        </div>
                        <div class="audio-status audio-loaded">
                            ✅ Ready
                        </div>
                    </div>
                </div>
            `;
            
            // Add click event to the entire item
            playlistItem.addEventListener('click', () => {
                selectTrack(index);
            });
            
            playlistContainer.appendChild(playlistItem);
        });
        
        console.log('Playlist generated, container visible:', playlistContainer.style.display);
    }

    // Global function for track selection
    function selectTrack(index) {
        currentTrack = index;
        loadTrack();
        generatePlaylist();
        
        // Auto play immediately when track is selected
        setTimeout(() => {
            togglePlay();
        }, 200);
    }

    // Load track
    function loadTrack() {
        const track = playlist[currentTrack];
        currentTitle.textContent = track.title;
        currentArtist.textContent = track.artist;
        currentCover.src = track.cover;
        totalTime.textContent = track.duration;
        
        // All tracks have audio now
        audioStatus.textContent = `Ready: ${track.title} 🎵`;
        audioStatus.className = 'inline-block audio-status audio-loaded';
        audioPlayer.src = track.audioFile;
        audioPlayer.load();
        
        // Reset progress
        progressBar.style.width = '0%';
        currentTime.textContent = '0:00';
        
        console.log('Track loaded:', track.title, track.audioFile);
    }

    // Toggle play/pause
    function togglePlay() {
        const track = playlist[currentTrack];
        
        if (isPlaying) {
            audioPlayer.pause();
            isPlaying = false;
            playIcon.innerHTML = '<path d="M8 5v14l11-7z"/>';
            
            // Hide equalizer and stop vinyl
            equalizer.style.opacity = '0';
            vinyl.style.opacity = '0';
            vinyl.classList.remove('vinyl-spin');
            stopEqualizer();
        } else {
            // Play audio
            audioPlayer.play().then(() => {
                console.log('Playing:', track.title);
                isPlaying = true;
                playIcon.innerHTML = '<path d="M6 4h4v16H6V4zm8 0h4v16h-4V4z"/>';
                
                // Show visual effects
                equalizer.style.opacity = '1';
                vinyl.style.opacity = '1';
                vinyl.classList.add('vinyl-spin');
                startEqualizer();
                createMusicEffect();
                audioStatus.textContent = `♪ Playing: ${track.title}`;
            }).catch(e => {
                console.error('Audio play failed:', e);
                showNotification('Failed to play audio. Please check the file path.', 'error');
                audioStatus.textContent = 'Error loading audio file';
            });
        }
        generatePlaylist();
    }

    // Update audio progress - PERBAIKAN UTAMA
    function updateProgress() {
        if (audioPlayer.duration && !isNaN(audioPlayer.duration) && !isUserSeeking) {
            const progressPercent = (audioPlayer.currentTime / audioPlayer.duration) * 100;
            progressBar.style.width = `${Math.min(100, Math.max(0, progressPercent))}%`;
            
            // Update current time
            const minutes = Math.floor(audioPlayer.currentTime / 60);
            const seconds = Math.floor(audioPlayer.currentTime % 60);
            currentTime.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        }
    }

    // Update total time when metadata loads
    function updateTotalTime() {
        if (audioPlayer.duration && !isNaN(audioPlayer.duration)) {
            const minutes = Math.floor(audioPlayer.duration / 60);
            const seconds = Math.floor(audioPlayer.duration % 60);
            totalTime.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        }
    }

    // Equalizer animation
    function startEqualizer() {
        if (equalizerInterval) {
            clearInterval(equalizerInterval);
        }
        
        const bars = document.querySelectorAll('.eq-bar');
        equalizerInterval = setInterval(() => {
            if (isPlaying) {
                bars.forEach(bar => {
                    bar.style.height = Math.random() * 40 + 10 + 'px';
                });
            }
        }, 200);
    }

    function stopEqualizer() {
        if (equalizerInterval) {
            clearInterval(equalizerInterval);
            equalizerInterval = null;
        }
        const bars = document.querySelectorAll('.eq-bar');
        bars.forEach(bar => {
            bar.style.height = '8px';
        });
    }

    // Music effect for Violyn's birthday
    function createMusicEffect() {
        for (let i = 0; i < 5; i++) {
            setTimeout(() => {
                const note = document.createElement('div');
                note.innerHTML = ['🎵', '🎶', '💜', '💖', '🎂'][Math.floor(Math.random() * 5)];
                note.className = 'fixed text-2xl pointer-events-none z-50 transition-all duration-3000';
                note.style.left = Math.random() * window.innerWidth + 'px';
                note.style.top = window.innerHeight + 'px';
                note.style.color = ['#EC4899', '#F59E0B', '#8B5CF6'][Math.floor(Math.random() * 3)];
                document.body.appendChild(note);
                
                // Animate upward
                let pos = window.innerHeight;
                const animation = setInterval(() => {
                    pos -= 3;
                    note.style.top = pos + 'px';
                    note.style.transform = `translateX(${Math.sin(pos/50) * 30}px) rotate(${pos/10}deg)`;
                    note.style.opacity = Math.max(0, pos / window.innerHeight);
                    
                    if (pos < -100) {
                        clearInterval(animation);
                        if (note.parentNode) {
                            note.parentNode.removeChild(note);
                        }
                    }
                }, 50);
            }, i * 500);
        }
    }

    // Set volume
    function setVolume() {
        audioPlayer.volume = volumeSlider.value / 100;
    }

    // Show notification
    function showNotification(message, type) {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transition-all duration-300 ${
            type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
        }`;
        notification.textContent = message;
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.transform = 'translateY(-100px)';
            notification.style.opacity = '0';
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.parentNode.removeChild(notification);
                }
            }, 300);
        }, 3000);
    }

    // PERBAIKAN SEEK FUNCTIONALITY
    progressContainer.addEventListener('click', function(e) {
        if (audioPlayer.duration && !isNaN(audioPlayer.duration)) {
            const progressWidth = this.clientWidth;
            const clickX = e.offsetX;
            const newTime = (clickX / progressWidth) * audioPlayer.duration;
            
            // Set flag untuk mencegah update otomatis sementara
            isUserSeeking = true;
            audioPlayer.currentTime = newTime;
            
            // Update progress bar secara manual
            const newPercent = (newTime / audioPlayer.duration) * 100;
            progressBar.style.width = `${Math.min(100, Math.max(0, newPercent))}%`;
            
            // Reset flag setelah delay singkat
            setTimeout(() => {
                isUserSeeking = false;
            }, 100);
        }
    });

    // Event listeners
    playBtn.addEventListener('click', togglePlay);
    
    prevBtn.addEventListener('click', function() {
        currentTrack = (currentTrack - 1 + playlist.length) % playlist.length;
        loadTrack();
        generatePlaylist();
    });
    
    nextBtn.addEventListener('click', function() {
        currentTrack = (currentTrack + 1) % playlist.length;
        loadTrack();
        generatePlaylist();
    });
    
    audioPlayer.addEventListener('timeupdate', updateProgress);
    audioPlayer.addEventListener('loadedmetadata', updateTotalTime);
    
    audioPlayer.addEventListener('ended', function() {
        // Auto-advance to next track
        currentTrack = (currentTrack + 1) % playlist.length;
        loadTrack();
        generatePlaylist();
        
        // Auto-play next track
        setTimeout(() => {
            togglePlay();
        }, 500);
    });
    
    // Handle audio loading errors
    audioPlayer.addEventListener('error', function(e) {
        console.error('Audio error:', e);
        showNotification('Error playing audio. Please try uploading the file again.', 'error');
        
        // Reset player state
        isPlaying = false;
        playIcon.innerHTML = '<path d="M8 5v14l11-7z"/>';
        equalizer.style.opacity = '0';
        vinyl.style.opacity = '0';
        vinyl.classList.remove('vinyl-spin');
        stopEqualizer();
    });
    
    audioPlayer.addEventListener('canplay', function() {
        console.log('Audio ready to play:', playlist[currentTrack].title);
    });
    
    audioPlayer.addEventListener('loadstart', function() {
        console.log('Audio loading started:', playlist[currentTrack].title);
    });
    
    // PERBAIKAN: Tambahkan event listener untuk seeked
    audioPlayer.addEventListener('seeked', function() {
        isUserSeeking = false;
        console.log('Seek completed to:', audioPlayer.currentTime);
    });
    
    volumeSlider.addEventListener('input', setVolume);

    // Initialize player
    loadTrack();
    
    // PERBAIKAN: Pastikan playlist dimuat setelah DOM ready
    setTimeout(() => {
        generatePlaylist();
        console.log('Playlist container after init:', document.getElementById('playlistContainer'));
    }, 100);
    
    setVolume();

    // Add sparkle effects on interactions
    document.addEventListener('click', function(e) {
        if (e.target.closest('.card-hover') || e.target.closest('.audio-upload-btn')) {
            createSparkles(e.target.closest('.card-hover') || e.target);
        }
    });

    function createSparkles(element) {
        const rect = element.getBoundingClientRect();
        for (let i = 0; i < 3; i++) {
            setTimeout(() => {
                const sparkle = document.createElement('div');
                sparkle.innerHTML = '✨';
                sparkle.className = 'fixed pointer-events-none z-50 text-yellow-400 text-xl';
                sparkle.style.left = rect.left + Math.random() * rect.width + 'px';
                sparkle.style.top = rect.top + Math.random() * rect.height + 'px';
                document.body.appendChild(sparkle);
                
                setTimeout(() => {
                    sparkle.style.transform = 'translateY(-30px) scale(0)';
                    sparkle.style.opacity = '0';
                    sparkle.style.transition = 'all 1s ease-out';
                    setTimeout(() => {
                        if (sparkle.parentNode) {
                            sparkle.parentNode.removeChild(sparkle);
                        }
                    }, 1000);
                }, 50);
            }, i * 200);
        }
    }

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        // Prevent default only for our shortcuts
        switch(e.code) {
            case 'Space':
                if (e.target.tagName !== 'INPUT' && e.target.tagName !== 'TEXTAREA') {
                    e.preventDefault();
                    togglePlay();
                }
                break;
            case 'ArrowLeft':
                if (e.target.tagName !== 'INPUT' && e.target.tagName !== 'TEXTAREA') {
                    e.preventDefault();
                    // Previous track
                    currentTrack = (currentTrack - 1 + playlist.length) % playlist.length;
                    loadTrack();
                    generatePlaylist();
                }
                break;
            case 'ArrowRight':
                if (e.target.tagName !== 'INPUT' && e.target.tagName !== 'TEXTAREA') {
                    e.preventDefault();
                    // Next track
                    currentTrack = (currentTrack + 1) % playlist.length;
                    loadTrack();
                    generatePlaylist();
                }
                break;
            case 'ArrowUp':
                if (e.target.tagName !== 'INPUT' && e.target.tagName !== 'TEXTAREA') {
                    e.preventDefault();
                    // Volume up
                    volumeSlider.value = Math.min(100, parseInt(volumeSlider.value) + 10);
                    setVolume();
                }
                break;
            case 'ArrowDown':
                if (e.target.tagName !== 'INPUT' && e.target.tagName !== 'TEXTAREA') {
                    e.preventDefault();
                    // Volume down
                    volumeSlider.value = Math.max(0, parseInt(volumeSlider.value) - 10);
                    setVolume();
                }
                break;
        }
    });

    // PERBAIKAN: Progress bar mouse events untuk drag
    let isDragging = false;
    
    progressContainer.addEventListener('mousedown', function(e) {
        isDragging = true;
        isUserSeeking = true;
        updateProgressFromMouse(e);
    });
    
    document.addEventListener('mousemove', function(e) {
        if (isDragging) {
            updateProgressFromMouse(e);
        }
    });
    
    document.addEventListener('mouseup', function() {
        if (isDragging) {
            isDragging = false;
            setTimeout(() => {
                isUserSeeking = false;
            }, 100);
        }
    });
    
    function updateProgressFromMouse(e) {
        if (audioPlayer.duration && !isNaN(audioPlayer.duration)) {
            const rect = progressContainer.getBoundingClientRect();
            const clickX = e.clientX - rect.left;
            const progressWidth = rect.width;
            const newTime = Math.max(0, Math.min(audioPlayer.duration, (clickX / progressWidth) * audioPlayer.duration));
            
            audioPlayer.currentTime = newTime;
            
            // Update progress bar visual
            const newPercent = (newTime / audioPlayer.duration) * 100;
            progressBar.style.width = `${Math.min(100, Math.max(0, newPercent))}%`;
            
            // Update time display
            const minutes = Math.floor(newTime / 60);
            const seconds = Math.floor(newTime % 60);
            currentTime.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        }
    }

    // Touch events untuk mobile
    progressContainer.addEventListener('touchstart', function(e) {
        e.preventDefault();
        isDragging = true;
        isUserSeeking = true;
        const touch = e.touches[0];
        updateProgressFromTouch(touch);
    });
    
    document.addEventListener('touchmove', function(e) {
        if (isDragging) {
            e.preventDefault();
            const touch = e.touches[0];
            updateProgressFromTouch(touch);
        }
    });
    
    document.addEventListener('touchend', function() {
        if (isDragging) {
            isDragging = false;
            setTimeout(() => {
                isUserSeeking = false;
            }, 100);
        }
    });
    
    function updateProgressFromTouch(touch) {
        if (audioPlayer.duration && !isNaN(audioPlayer.duration)) {
            const rect = progressContainer.getBoundingClientRect();
            const touchX = touch.clientX - rect.left;
            const progressWidth = rect.width;
            const newTime = Math.max(0, Math.min(audioPlayer.duration, (touchX / progressWidth) * audioPlayer.duration));
            
            audioPlayer.currentTime = newTime;
            
            // Update progress bar visual
            const newPercent = (newTime / audioPlayer.duration) * 100;
            progressBar.style.width = `${Math.min(100, Math.max(0, newPercent))}%`;
            
            // Update time display
            const minutes = Math.floor(newTime / 60);
            const seconds = Math.floor(newTime % 60);
            currentTime.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        }
    }

    console.log('🎵 Olivia Rodrigo Music Player for Violyn loaded! 🎉');
    console.log('Features: Fixed playlist visibility and progress bar functionality!');
    
    // PERBAIKAN: Force playlist visibility pada load
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('playlistContainer');
        if (container) {
            container.style.display = 'block';
            container.style.opacity = '1';
            container.style.visibility = 'visible';
            console.log('Force playlist container visible');
        }
    });
});
</script>
@endsection