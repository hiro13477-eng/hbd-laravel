@extends('layouts.app')

@section('title', '만화 - Birthday Chat Story')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-rose-100 via-pink-100 to-red-100 py-6">
    <div class="max-w-4xl mx-auto px-4">
       <!-- Back Button - Outside Container -->
<button onclick="history.back()" class="back-button" aria-label="Back to previous page">
    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
    </svg>
</button>


        <!-- Comic Container with Glassmorphism -->
        <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl overflow-hidden border border-pink-100">
            <!-- Header -->
            <div class="bg-gradient-to-r from-rose-500 via-pink-500 to-red-500 text-white text-center py-8 px-6">
                <h1 class="text-3xl font-bold mb-2 korean-font">생일 대화 이야기</h1>
                <h2 class="text-xl mb-2">Birthday Chat Story</h2>
                <p class="text-rose-100 text-sm">Esal Ganteng anak wi kelassss</p>
            </div>

            <!-- Comic Panels Container -->
            <div class="comic-viewer relative">
                <!-- Panel 1 -->
                <div class="comic-panel active bg-gradient-to-br from-rose-50 via-pink-50 to-red-50 p-8" id="panel1">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start h-full min-h-[500px]">
                        <!-- Male Character -->
                        <div class="character-section text-center">
                            <div class="character-container relative mb-8">
                                <div class="character-frame mx-auto mb-4 relative">
                                    <div class="w-48 h-48 rounded-2xl overflow-hidden border-4 border-rose-300 shadow-xl mx-auto bg-white">
                                        <img src="{{ asset('images/mc.jpg') }}" 
                                             alt="MC Love Revolution" 
                                             class="w-full h-full object-cover"
                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                        <div class="w-full h-full bg-rose-100 flex items-center justify-center text-rose-400" style="display: none;">
                                            <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="absolute -top-2 -right-2 w-6 h-6 bg-green-400 border-2 border-white rounded-full animate-pulse"></div>
                                </div>
                                <div class="text-center mb-4">
                                    <span class="text-4xl">😊</span>
                                </div>
                            </div>
                            <div class="speech-bubble bg-white/80 backdrop-blur-sm p-6 rounded-2xl shadow-lg border border-rose-200 max-w-sm mx-auto">
                                <div class="speech-arrow"></div>
                                <p class="text-gray-700 font-medium">"Halo… masih inget aku nggak? Jangan-jangan kamu udah lupa wkwk."</p>
                            </div>
                        </div>

                        <!-- Female Character -->
                        <div class="character-section text-center">
                            <div class="character-container relative mb-8">
                                <div class="character-frame mx-auto mb-4 relative">
                                    <div class="w-48 h-48 rounded-2xl overflow-hidden border-4 border-pink-300 shadow-xl mx-auto bg-white">
                                        <img src="{{ asset('images/heroine.jpg') }}" 
                                             alt="Heroine" 
                                             class="w-full h-full object-cover"
                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                        <div class="w-full h-full bg-pink-100 flex items-center justify-center text-pink-400" style="display: none;">
                                            <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="absolute -top-2 -right-2 w-6 h-6 bg-green-400 border-2 border-white rounded-full animate-pulse" style="animation-delay: 0.5s;"></div>
                                </div>
                                <div class="text-center mb-4">
                                    <span class="text-4xl">😄</span>
                                </div>
                            </div>
                            <div class="speech-bubble bg-white/80 backdrop-blur-sm p-6 rounded-2xl shadow-lg border border-pink-200 max-w-sm mx-auto">
                                <div class="speech-arrow-right"></div>
                                <p class="text-gray-700 font-medium">"Lupa? Nggak lah… susah dilupain kamu."</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Panel 2 -->
                <div class="comic-panel bg-gradient-to-br from-rose-50 via-pink-50 to-red-50 p-8" id="panel2">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start h-full min-h-[500px]">
                        <!-- Male Character -->
                        <div class="character-section text-center">
                            <div class="character-container relative mb-8">
                                <div class="character-frame mx-auto mb-4 relative">
                                    <div class="w-48 h-48 rounded-2xl overflow-hidden border-4 border-rose-300 shadow-xl mx-auto bg-white">
                                        <img src="{{ asset('images/mc.jpg') }}" 
                                             alt="MC Love Revolution" 
                                             class="w-full h-full object-cover opacity-80"
                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                        <div class="w-full h-full bg-rose-100 flex items-center justify-center text-rose-400" style="display: none;">
                                            <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mb-4">
                                    <span class="text-4xl">😔</span>
                                </div>
                            </div>
                            <div class="speech-bubble bg-white/80 backdrop-blur-sm p-6 rounded-2xl shadow-lg border border-rose-200 max-w-sm mx-auto">
                                <p class="text-gray-700 font-medium">"Iya, aku kira kamu udah ilang beneran. Sebulan nggak ada kabar…"</p>
                            </div>
                        </div>

                        <!-- Female Character -->
                        <div class="character-section text-center">
                            <div class="character-container relative mb-8">
                                <div class="character-frame mx-auto mb-4 relative">
                                    <div class="w-48 h-48 rounded-2xl overflow-hidden border-4 border-pink-300 shadow-xl mx-auto bg-white">
                                        <img src="{{ asset('images/heroine.jpg') }}" 
                                             alt="Heroine" 
                                             class="w-full h-full object-cover"
                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                        <div class="w-full h-full bg-pink-100 flex items-center justify-center text-pink-400" style="display: none;">
                                            <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mb-4">
                                    <span class="text-4xl">😅</span>
                                </div>
                            </div>
                            <div class="speech-bubble bg-white/80 backdrop-blur-sm p-6 rounded-2xl shadow-lg border border-pink-200 max-w-sm mx-auto">
                                <p class="text-gray-700 font-medium">"Hehe… sorry ya, sibuk banget kemarin."</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Panel 3 - Birthday Special -->
                <div class="comic-panel bg-gradient-to-br from-rose-50 via-pink-50 to-red-50 p-8 relative overflow-hidden" id="panel3">
                    <!-- Birthday Decorations -->
                    <div class="birthday-decorations" id="birthdayDecorations">
                        <div class="floating-decoration" style="top: 20px; left: 20px;">🎈</div>
                        <div class="floating-decoration" style="top: 30px; right: 30px; animation-delay: 0.5s;">🎊</div>
                        <div class="floating-decoration" style="bottom: 30px; left: 60px; animation-delay: 1s;">✨</div>
                        <div class="floating-decoration" style="bottom: 20px; right: 20px; animation-delay: 1.5s;">🎂</div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start h-full min-h-[500px] relative z-10">
                        <!-- Male Character -->
                        <div class="character-section text-center">
                            <div class="character-container relative mb-8">
                                <div class="character-frame mx-auto mb-4 relative">
                                    <div class="w-48 h-48 rounded-2xl overflow-hidden border-4 border-amber-400 shadow-xl mx-auto bg-white">
                                        <img src="{{ asset('images/mc.jpg') }}" 
                                             alt="MC Love Revolution" 
                                             class="w-full h-full object-cover"
                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                        <div class="w-full h-full bg-rose-100 flex items-center justify-center text-rose-400" style="display: none;">
                                            <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="absolute -inset-2 border-2 border-amber-300 rounded-3xl animate-pulse opacity-50"></div>
                                </div>
                                <div class="text-center mb-4">
                                    <span class="text-4xl animate-pulse">😊</span>
                                </div>
                            </div>
                            <div class="speech-bubble bg-white/80 backdrop-blur-sm p-6 rounded-2xl shadow-lg border border-amber-200 max-w-sm mx-auto">
                                <p class="text-gray-700 font-medium">"Nggak apa-apa… yang penting kamu balik. Oh iya… <span class="text-red-500 font-bold text-lg">🎂 Happy Birthday ya</span> semoga hari ini seru buat kamu."</p>
                            </div>
                        </div>

                        <!-- Female Character -->
                        <div class="character-section text-center">
                            <div class="character-container relative mb-8">
                                <div class="character-frame mx-auto mb-4 relative">
                                    <div class="w-48 h-48 rounded-2xl overflow-hidden border-4 border-pink-300 shadow-xl mx-auto bg-white">
                                        <img src="{{ asset('images/heroine.jpg') }}" 
                                             alt="Heroine" 
                                             class="w-full h-full object-cover"
                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                        <div class="w-full h-full bg-pink-100 flex items-center justify-center text-pink-400" style="display: none;">
                                            <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="absolute -inset-2 border-2 border-pink-300 rounded-3xl animate-pulse opacity-50"></div>
                                </div>
                                <div class="text-center mb-4">
                                    <span class="text-4xl animate-pulse">🥰</span>
                                </div>
                            </div>
                            <div class="speech-bubble bg-white/80 backdrop-blur-sm p-6 rounded-2xl shadow-lg border border-pink-200 max-w-sm mx-auto">
                                <p class="text-gray-700 font-medium">"Awww… makasih, sweet banget."</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Panel 4 -->
                <div class="comic-panel bg-gradient-to-br from-rose-50 via-pink-50 to-purple-50 p-8" id="panel4">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start h-full min-h-[500px]">
                        <!-- Male Character -->
                        <div class="character-section text-center">
                            <div class="character-container relative mb-8">
                                <div class="character-frame mx-auto mb-4 relative">
                                    <div class="w-48 h-48 rounded-2xl overflow-hidden border-4 border-rose-300 shadow-xl mx-auto bg-white">
                                        <img src="{{ asset('images/mc.jpg') }}" 
                                             alt="MC Love Revolution" 
                                             class="w-full h-full object-cover"
                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                        <div class="w-full h-full bg-rose-100 flex items-center justify-center text-rose-400" style="display: none;">
                                            <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mb-4">
                                    <span class="text-4xl">😎</span>
                                </div>
                            </div>
                            <div class="speech-bubble bg-white/80 backdrop-blur-sm p-6 rounded-2xl shadow-lg border border-rose-200 max-w-sm mx-auto">
                                <p class="text-gray-700 font-medium">"kita kan udah sering ngobrol. Aku cuma kangen aja."</p>
                            </div>
                        </div>

                        <!-- Female Character -->
                        <div class="character-section text-center">
                            <div class="character-container relative mb-8">
                                <div class="character-frame mx-auto mb-4 relative">
                                    <div class="w-48 h-48 rounded-2xl overflow-hidden border-4 border-pink-300 shadow-xl mx-auto bg-white">
                                        <img src="{{ asset('images/heroine.jpg') }}" 
                                             alt="Heroine" 
                                             class="w-full h-full object-cover"
                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                        <div class="w-full h-full bg-pink-100 flex items-center justify-center text-pink-400" style="display: none;">
                                            <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mb-4">
                                    <span class="text-4xl">🤔</span>
                                </div>
                            </div>
                            <div class="speech-bubble bg-white/80 backdrop-blur-sm p-6 rounded-2xl shadow-lg border border-pink-200 max-w-sm mx-auto">
                                <p class="text-gray-700 font-medium">"Kangen main atau kangen aku?"</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Panel 5 - Romantic Final -->
                <div class="comic-panel bg-gradient-to-br from-red-50 via-rose-50 to-pink-50 p-8 relative overflow-hidden" id="panel5">
                    <!-- Floating Hearts -->
                    <div class="heart-decorations" id="heartDecorations">
                        <div class="floating-heart" style="top: 3rem; left: 3rem; font-size: 2rem;">💖</div>
                        <div class="floating-heart" style="top: 8rem; right: 3rem; font-size: 2rem; animation-delay: 0.8s;">💕</div>
                        <div class="floating-heart" style="bottom: 3rem; left: 8rem; font-size: 2rem; animation-delay: 0.3s;">💗</div>
                        <div class="floating-heart" style="bottom: 8rem; right: 8rem; font-size: 2rem; animation-delay: 1.2s;">💘</div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start h-full min-h-[500px] relative z-10">
                        <!-- Male Character -->
                        <div class="character-section text-center">
                            <div class="character-container relative mb-8">
                                <div class="character-frame mx-auto mb-4 relative">
                                    <div class="w-48 h-48 rounded-2xl overflow-hidden border-4 border-red-300 shadow-xl mx-auto bg-white">
                                        <img src="{{ asset('images/mc.jpg') }}" 
                                             alt="MC Love Revolution" 
                                             class="w-full h-full object-cover"
                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                        <div class="w-full h-full bg-rose-100 flex items-center justify-center text-rose-400" style="display: none;">
                                            <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="absolute -inset-3 border-2 border-red-300 rounded-3xl animate-ping opacity-30"></div>
                                </div>
                                <div class="text-center mb-4">
                                    <span class="text-4xl">😊</span>
                                </div>
                            </div>
                            <div class="speech-bubble bg-white/80 backdrop-blur-sm p-6 rounded-2xl shadow-lg border border-red-200 max-w-sm mx-auto">
                                <p class="text-gray-700 font-medium">"Hmm… dua-duanya, tapi yang penting jangan AFK lagi."</p>
                            </div>
                        </div>

                        <!-- Female Character -->
                        <div class="character-section text-center">
                            <div class="character-container relative mb-8">
                                <div class="character-frame mx-auto mb-4 relative">
                                    <div class="w-48 h-48 rounded-2xl overflow-hidden border-4 border-pink-300 shadow-xl mx-auto bg-white">
                                        <img src="{{ asset('images/heroine.jpg') }}" 
                                             alt="Heroine" 
                                             class="w-full h-full object-cover"
                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                        <div class="w-full h-full bg-pink-100 flex items-center justify-center text-pink-400" style="display: none;">
                                            <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="absolute -inset-3 border-2 border-pink-300 rounded-3xl animate-ping opacity-30"></div>
                                </div>
                                <div class="text-center mb-4">
                                    <span class="text-4xl">😉</span>
                                </div>
                            </div>
                            <div class="speech-bubble bg-white/80 backdrop-blur-sm p-6 rounded-2xl shadow-lg border border-pink-200 max-w-sm mx-auto">
                                <p class="text-gray-700 font-medium">"Hmm… kalau kangen aku, sering-sering chat dong."</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <div class="bg-white/80 backdrop-blur-sm px-8 py-6 flex justify-between items-center border-t border-pink-100">
                <button id="prevBtn" class="bg-rose-300 hover:bg-rose-400 text-rose-800 px-6 py-3 rounded-full font-semibold transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed">
                    ← 이전 (Previous)
                </button>
                
                <div class="flex space-x-2" id="panelIndicators">
                    <span class="panel-indicator w-3 h-3 bg-rose-500 rounded-full active"></span>
                    <span class="panel-indicator w-3 h-3 bg-rose-300 rounded-full"></span>
                    <span class="panel-indicator w-3 h-3 bg-rose-300 rounded-full"></span>
                    <span class="panel-indicator w-3 h-3 bg-rose-300 rounded-full"></span>
                    <span class="panel-indicator w-3 h-3 bg-rose-300 rounded-full"></span>
                </div>
                
                <button id="nextBtn" class="bg-rose-500 hover:bg-rose-600 text-white px-6 py-3 rounded-full font-semibold transition-all duration-300">
                    다음 (Next) →
                </button>
                
                <button id="readAgainBtn" class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 hidden">
                    🔄 다시 읽기 (Read Again)
                </button>
            </div>
        </div>
    </div>
</div>

<style>
.korean-font {
    font-family: 'Noto Sans KR', 'Malgun Gothic', '맑은 고딕', sans-serif;
}

/* Panel Animation */
.comic-panel {
    display: none;
    animation: fadeInSlide 0.6s ease-out;
    position: relative;
    z-index: 1;
}

.comic-panel.active {
    display: block;
}

@keyframes fadeInSlide {
    from {
        opacity: 0;
        transform: translateX(30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Character Layout */
.character-container {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 280px;
}

.character-frame:hover {
    transform: scale(1.05);
    transition: transform 0.3s ease;
}

/* Speech Bubbles */
.speech-bubble {
    position: relative;
    margin-top: 20px;
}

.speech-bubble::before {
    content: '';
    position: absolute;
    top: -10px;
    left: 30px;
    width: 0;
    height: 0;
    border-left: 15px solid transparent;
    border-right: 15px solid transparent;
    border-bottom: 15px solid rgba(255, 255, 255, 0.8);
    filter: drop-shadow(0 -2px 2px rgba(0,0,0,0.1));
}

.speech-arrow-right::before {
    left: auto;
    right: 30px;
}

/* Decorations */
.birthday-decorations,
.heart-decorations {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 5;
}

.floating-decoration,
.floating-heart {
    position: absolute;
    font-size: 2rem;
    animation: gentle-bounce 3s ease-in-out infinite;
    opacity: 0.8;
}

.floating-heart {
    animation: gentle-pulse 3s ease-in-out infinite;
}

@keyframes gentle-bounce {
    0%, 100% { 
        transform: translateY(0px) rotate(0deg); 
    }
    50% { 
        transform: translateY(-10px) rotate(5deg); 
    }
}

@keyframes gentle-pulse {
    0%, 100% { 
        transform: scale(1) rotate(0deg); 
        opacity: 0.6; 
    }
    50% { 
        transform: scale(1.1) rotate(10deg); 
        opacity: 1; 
    }
}

/* Dynamic Effects */
.floating-effect {
    position: absolute;
    animation: floatUp 3s ease-out forwards;
    pointer-events: none;
    z-index: 20;
}

@keyframes floatUp {
    0% {
        opacity: 1;
        transform: translateY(0) scale(1) rotate(0deg);
    }
    100% {
        opacity: 0;
        transform: translateY(-100px) scale(0.5) rotate(360deg);
    }
}

/* Panel Indicators */
.panel-indicator {
    cursor: pointer;
    transition: all 0.3s ease;
}

.panel-indicator.active {
    background-color: #f43f5e !important;
    transform: scale(1.3);
    box-shadow: 0 0 10px rgba(244, 63, 94, 0.5);
}

.panel-indicator:hover {
    transform: scale(1.1);
    opacity: 0.8;
}

/* Swipe Animations */
.swipe-left {
    animation: swipeLeft 0.5s ease-out;
}

.swipe-right {
    animation: swipeRight 0.5s ease-out;
}

@keyframes swipeLeft {
    from { transform: translateX(0); }
    to { transform: translateX(-100%); }
}

@keyframes swipeRight {
    from { transform: translateX(0); }
    to { transform: translateX(100%); }
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .comic-panel {
        min-height: auto;
        padding: 20px;
    }
    
    .character-container {
        min-height: 220px;
        margin-bottom: 30px;
    }
    
    .character-frame > div {
        width: 120px !important;
        height: 120px !important;
    }
    
    .grid {
        grid-template-columns: 1fr !important;
        gap: 30px !important;
    }
    
    .speech-bubble {
        max-width: 280px !important;
        padding: 16px !important;
        font-size: 14px;
        margin-top: 15px;
    }
    
    .floating-decoration,
    .floating-heart {
        font-size: 1.5rem !important;
    }
}

/* Loading Animation */
.comic-panel.loading {
    opacity: 0.5;
    pointer-events: none;
}

/* Heart Beat Animation for Romance */
@keyframes heartbeat {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

.heartbeat {
    animation: heartbeat 1.5s ease-in-out infinite;
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Comic script loaded'); // Debug log
    
    // Get DOM elements with error checking
    const panels = document.querySelectorAll('.comic-panel');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const readAgainBtn = document.getElementById('readAgainBtn');
    const indicators = document.querySelectorAll('.panel-indicator');
    
    console.log('Found elements:', {
        panels: panels.length,
        prevBtn: !!prevBtn,
        nextBtn: !!nextBtn,
        readAgainBtn: !!readAgainBtn,
        indicators: indicators.length
    });
    
    let currentPanel = 0;
    let isAnimating = false;

    // Ensure elements exist
    if (!prevBtn || !nextBtn || panels.length === 0) {
        console.error('Required elements not found');
        return;
    }

    // Initialize
    updateDisplay();

    function updateDisplay() {
        console.log('Updating display, current panel:', currentPanel);
        
        // Show/hide panels
        panels.forEach((panel, index) => {
            if (index === currentPanel) {
                panel.classList.add('active');
                panel.style.display = 'block';
                console.log('Showing panel', index);
            } else {
                panel.classList.remove('active');
                panel.style.display = 'none';
            }
        });

        // Update indicators
        indicators.forEach((indicator, index) => {
            indicator.classList.remove('active');
            if (index === currentPanel) {
                indicator.classList.add('active');
                indicator.style.backgroundColor = '#f43f5e';
                indicator.style.transform = 'scale(1.3)';
            } else {
                indicator.style.backgroundColor = '#fda4af';
                indicator.style.transform = 'scale(1)';
            }
        });

        // Update navigation buttons
        if (prevBtn) {
            prevBtn.disabled = currentPanel === 0;
            prevBtn.style.opacity = currentPanel === 0 ? '0.5' : '1';
            prevBtn.style.cursor = currentPanel === 0 ? 'not-allowed' : 'pointer';
        }
        
        if (nextBtn && readAgainBtn) {
            if (currentPanel === panels.length - 1) {
                nextBtn.style.display = 'none';
                readAgainBtn.style.display = 'inline-block';
            } else {
                nextBtn.style.display = 'inline-block';
                readAgainBtn.style.display = 'none';
            }
        }

        // Trigger special effects based on panel
        setTimeout(() => triggerPanelEffects(), 500);
    }

    function triggerPanelEffects() {
        // Clear any existing effects
        clearEffects();
        
        // Panel-specific effects
        if (currentPanel === 2) { // Birthday panel
            setTimeout(createBirthdayEffect, 300);
        } else if (currentPanel === 4) { // Final romantic panel
            setTimeout(createHeartEffect, 300);
        }
    }

    function clearEffects() {
        // Remove any floating effects
        const existingEffects = document.querySelectorAll('.floating-effect');
        existingEffects.forEach(effect => effect.remove());
    }

    function createBirthdayEffect() {
        const panel = panels[2];
        const effectEmojis = ['🎉', '🎊', '🎂', '🎈', '✨', '🎁', '🌟'];
        
        for (let i = 0; i < 12; i++) {
            setTimeout(() => {
                const effect = document.createElement('div');
                effect.className = 'floating-effect';
                effect.innerHTML = effectEmojis[Math.floor(Math.random() * effectEmojis.length)];
                effect.style.cssText = `
                    position: absolute;
                    font-size: ${1.5 + Math.random()}rem;
                    left: ${Math.random() * 90}%;
                    top: ${Math.random() * 50 + 50}%;
                    z-index: 25;
                `;
                panel.appendChild(effect);
                
                // Remove after animation
                setTimeout(() => {
                    if (effect.parentNode) {
                        effect.remove();
                    }
                }, 3000);
            }, i * 200);
        }
    }

    function createHeartEffect() {
        const panel = panels[4];
        const heartEmojis = ['💖', '💕', '💗', '💘', '💝', '💞', '💓'];
        
        for (let i = 0; i < 10; i++) {
            setTimeout(() => {
                const heart = document.createElement('div');
                heart.className = 'floating-effect heartbeat';
                heart.innerHTML = heartEmojis[Math.floor(Math.random() * heartEmojis.length)];
                heart.style.cssText = `
                    position: absolute;
                    font-size: ${1.2 + Math.random() * 0.8}rem;
                    left: ${Math.random() * 90}%;
                    top: ${Math.random() * 40 + 60}%;
                    z-index: 25;
                    animation-delay: ${Math.random() * 2}s;
                `;
                panel.appendChild(heart);
                
                // Remove after animation
                setTimeout(() => {
                    if (heart.parentNode) {
                        heart.remove();
                    }
                }, 4000);
            }, i * 250);
        }
    }

    function nextPanel() {
        console.log('Next button clicked, current:', currentPanel, 'max:', panels.length - 1);
        
        if (currentPanel >= panels.length - 1) {
            console.log('Already at last panel');
            return;
        }
        
        isAnimating = true;
        currentPanel++;
        console.log('Moving to panel:', currentPanel);
        
        updateDisplay();
        
        setTimeout(() => {
            isAnimating = false;
        }, 600);
    }

    function prevPanel() {
        console.log('Previous button clicked, current:', currentPanel);
        
        if (currentPanel <= 0) {
            console.log('Already at first panel');
            return;
        }
        
        isAnimating = true;
        currentPanel--;
        console.log('Moving to panel:', currentPanel);
        
        updateDisplay();
        
        setTimeout(() => {
            isAnimating = false;
        }, 600);
    }

    function resetComic() {
        console.log('Reset comic clicked');
        
        isAnimating = true;
        currentPanel = 0;
        
        updateDisplay();
        
        setTimeout(() => {
            isAnimating = false;
        }, 600);
    }

    function goToPanel(panelIndex) {
        if (isAnimating || panelIndex === currentPanel || panelIndex < 0 || panelIndex >= panels.length) return;
        
        isAnimating = true;
        currentPanel = panelIndex;
        
        setTimeout(() => {
            updateDisplay();
            isAnimating = false;
        }, 100);
    }

    // Event Listeners with immediate binding
    if (nextBtn) {
        nextBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log('Next button event fired');
            nextPanel();
        });
        
        // Make sure button is clickable
        nextBtn.style.pointerEvents = 'auto';
        nextBtn.style.cursor = 'pointer';
        console.log('Next button event listener added');
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log('Previous button event fired');
            prevPanel();
        });
        
        // Make sure button is clickable
        prevBtn.style.pointerEvents = 'auto';
        prevBtn.style.cursor = 'pointer';
        console.log('Previous button event listener added');
    }

    if (readAgainBtn) {
        readAgainBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log('Read again button event fired');
            resetComic();
        });
        
        readAgainBtn.style.pointerEvents = 'auto';
        readAgainBtn.style.cursor = 'pointer';
        console.log('Read again button event listener added');
    }

    // Indicator clicks
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => goToPanel(index));
    });

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (isAnimating) return;
        
        switch(e.key) {
            case 'ArrowRight':
            case ' ':
                e.preventDefault();
                console.log('Keyboard: Next');
                nextPanel();
                break;
            case 'ArrowLeft':
                e.preventDefault();
                console.log('Keyboard: Previous');
                prevPanel();
                break;
            case 'Home':
                e.preventDefault();
                console.log('Keyboard: Reset');
                resetComic();
                break;
            case 'End':
                e.preventDefault();
                console.log('Keyboard: Last panel');
                goToPanel(panels.length - 1);
                break;
        }
    });

    // Simple click test - backup navigation
    document.addEventListener('click', function(e) {
        if (e.target.textContent && e.target.textContent.includes('다음')) {
            console.log('Backup next clicked');
            nextPanel();
        } else if (e.target.textContent && e.target.textContent.includes('이전')) {
            console.log('Backup prev clicked');
            prevPanel();
        } else if (e.target.textContent && e.target.textContent.includes('다시')) {
            console.log('Backup reset clicked');
            resetComic();
        }
    });

    console.log('All event listeners initialized');
});
</script>

@endsection