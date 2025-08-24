@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700;800&display=swap');
    
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        font-family: 'Figtree', sans-serif;
        background: linear-gradient(135deg, #fce4ec 0%, #f8bbd9 50%, #f48fb1 100%);
        min-height: 100vh;
        overflow-x: hidden;
    }
    
    .container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 20px;
        position: relative;
        z-index: 10;
        background: rgba(255, 255, 255, 0.4);
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        min-height: 90vh;
    }
    
    /* Confetti Animation */
    .confetti {
        position: fixed;
        top: -10px;
        left: 50%;
        width: 10px;
        height: 10px;
        background: #ff6b9d;
        animation: confettiFall 3s linear infinite;
        z-index: 1000;
    }
    
    .confetti:nth-child(odd) {
        background: #f48fb1;
        width: 8px;
        height: 8px;
        animation-delay: -0.5s;
    }
    
    .confetti:nth-child(3n) {
        background: #e91e63;
        width: 6px;
        height: 6px;
        animation-delay: -1s;
    }
    
    .confetti:nth-child(4n) {
        background: #ec407a;
        animation-delay: -1.5s;
    }
    
    .confetti:nth-child(5n) {
        background: #ad1457;
        animation-delay: -2s;
    }
    
    @keyframes confettiFall {
        0% {
            transform: translateY(-100vh) rotate(0deg);
            opacity: 1;
        }
        100% {
            transform: translateY(100vh) rotate(720deg);
            opacity: 0;
        }
    }
    
    /* True Focus Header */
    .header-container {
        text-align: center;
        margin-bottom: 60px;
        padding: 40px 20px;
        position: relative;
    }
    
    .true-focus-title {
        font-size: clamp(2.5rem, 6vw, 4.5rem);
        font-weight: 800;
        position: relative;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        color: #2d3748;
        margin-bottom: 30px;
        min-height: 100px;
    }
    
    .word {
        display: inline-block;
        margin: 8px 12px;
        transition: all 0.8s ease;
        filter: blur(3px);
        opacity: 0.3;
        position: relative;
        padding: 12px 20px;
        border-radius: 12px;
    }
    
    .word.active {
        filter: blur(0px);
        opacity: 1;
        color: #2d3748;
        background: linear-gradient(135deg, rgba(255, 107, 157, 0.15), rgba(255, 107, 157, 0.05));
        border: 2px solid rgba(255, 107, 157, 0.6);
        box-shadow: 0 0 30px rgba(255, 107, 157, 0.4), inset 0 0 20px rgba(255, 107, 157, 0.1);
        transform: scale(1.08);
    }
    
    .subtitle {
        font-size: clamp(1.4rem, 3.5vw, 2rem);
        color: #4a5568;
        font-weight: 600;
        opacity: 0;
        animation: fadeInUp 1s ease 1s forwards;
        margin-bottom: 40px;
        background: linear-gradient(135deg, #ff6b9d, #e91e63);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Initial Empty State */
    .gallery-placeholder {
        text-align: center;
        padding: 100px 20px;
        margin: 80px 0;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0.3));
        border-radius: 25px;
        border: 2px dashed #f48fb1;
        transition: all 0.3s ease;
    }
    
    .gallery-placeholder.hidden {
        opacity: 0;
        transform: scale(0.9);
        pointer-events: none;
    }
    
    .placeholder-icon {
        font-size: 4rem;
        color: #f48fb1;
        margin-bottom: 20px;
        animation: float 3s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    
    .placeholder-text {
        font-size: 1.5rem;
        color: #ad1457;
        font-weight: 500;
    }
    
    /* Laser Printing Animation */
    .laser-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #880e4f 0%, #ad1457 100%);
        z-index: 3000;
        display: none;
        overflow: hidden;
    }
    
    .laser-container.active {
        display: block;
    }
    
    .laser-screen {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 90%;
        max-width: 1200px;
        height: 80%;
        background: #000;
        border: 4px solid #ff6b9d;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 0 50px rgba(255, 107, 157, 0.3);
    }
    
    .laser-header {
        background: linear-gradient(90deg, #ff6b9d 0%, #e91e63 100%);
        color: #fff;
        padding: 20px;
        font-size: 1.2rem;
        font-weight: 700;
        text-align: center;
    }
    
    .laser-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 30px;
        padding: 40px;
        height: calc(100% - 80px);
        overflow-y: auto;
    }
    
    .laser-item {
        background: #111;
        border: 2px solid #ff6b9d;
        border-radius: 12px;
        overflow: hidden;
        position: relative;
        opacity: 0;
        transform: scale(0.8);
    }
    
    .laser-item.printing {
        animation: laserPrint 2s ease forwards;
    }
    
    @keyframes laserPrint {
        0% {
            opacity: 0;
            transform: scale(0.8);
            border-color: #ff0000;
        }
        30% {
            opacity: 0.3;
            transform: scale(0.95);
            border-color: #ffff00;
        }
        60% {
            opacity: 0.7;
            transform: scale(1.02);
            border-color: #ff6b9d;
        }
        100% {
            opacity: 1;
            transform: scale(1);
            border-color: #ff6b9d;
        }
    }
    
    .laser-item img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        filter: brightness(0);
        transition: filter 0.5s ease;
    }
    
    .laser-item.printing img {
        animation: imageReveal 2s ease forwards;
    }
    
    @keyframes imageReveal {
        0% { 
            filter: brightness(0) contrast(0);
        }
        50% { 
            filter: brightness(0.5) contrast(2) hue-rotate(90deg);
        }
        100% { 
            filter: brightness(1) contrast(1) hue-rotate(0deg);
        }
    }
    
    .laser-item .laser-info {
        padding: 15px;
        background: linear-gradient(135deg, #001100, #003300);
        border-top: 1px solid #ff6b9d;
    }
    
    .laser-item h3 {
        color: #ff6b9d;
        font-size: 1rem;
        font-weight: 600;
        margin: 0;
        text-shadow: 0 0 10px rgba(255, 107, 157, 0.5);
    }
    
    .laser-beam {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, transparent, #ff0000, #ffff00, #ff6b9d, transparent);
        animation: laserScan 2s ease;
        z-index: 10;
    }
    
    @keyframes laserScan {
        0% { 
            transform: translateY(0) scaleX(0);
            opacity: 1;
        }
        50% { 
            transform: translateY(100px) scaleX(1);
            opacity: 1;
        }
        100% { 
            transform: translateY(200px) scaleX(0);
            opacity: 0;
        }
    }
    
    .printing-status {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        color: #ff6b9d;
        font-size: 1.2rem;
        font-weight: 600;
        text-shadow: 0 0 10px rgba(255, 107, 157, 0.5);
        animation: blink 1s infinite;
    }
    
    @keyframes blink {
        0%, 50% { opacity: 1; }
        51%, 100% { opacity: 0.3; }
    }
    
    /* Horizontal Gallery */
    .horizontal-gallery-container {
        position: relative;
        width: 100%;
        height: 500px;
        margin: 60px auto;
        display: none;
        border-radius: 20px;
        overflow: hidden;
        background: linear-gradient(135deg, #880e4f 0%, #ad1457 100%);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }
    
    .horizontal-gallery-container.active {
        display: block;
        animation: galleryAppear 1s ease forwards;
    }
    
    @keyframes galleryAppear {
        from {
            opacity: 0;
            transform: scale(0.9) translateY(50px);
        }
        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }
    
    .gallery-header {
        background: linear-gradient(90deg, #ff6b9d 0%, #e91e63 100%);
        color: #fff;
        padding: 15px;
        text-align: center;
        font-size: 1.2rem;
        font-weight: 700;
    }
    
    .gallery-scroll-container {
        width: 100%;
        height: calc(100% - 60px);
        overflow-x: auto;
        overflow-y: hidden;
        padding: 30px 0;
        scrollbar-width: thin;
        scrollbar-color: #ff6b9d #880e4f;
    }
    
    .gallery-scroll-container::-webkit-scrollbar {
        height: 8px;
    }
    
    .gallery-scroll-container::-webkit-scrollbar-track {
        background: #880e4f;
    }
    
    .gallery-scroll-container::-webkit-scrollbar-thumb {
        background: linear-gradient(90deg, #ff6b9d, #e91e63);
        border-radius: 4px;
    }
    
    .gallery-items {
        display: flex;
        gap: 30px;
        padding: 0 40px;
        height: 100%;
        min-width: max-content;
    }
    
    .gallery-item {
        flex-shrink: 0;
        width: 320px;
        height: 400px;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
        transition: all 0.4s ease;
        cursor: pointer;
        background: linear-gradient(135deg, #ad1457 0%, #880e4f 100%);
        border: 2px solid rgba(255, 255, 255, 0.1);
        opacity: 0;
        transform: translateY(30px);
        animation: itemSlideIn 0.6s ease forwards;
    }
    
    .gallery-item:nth-child(1) { animation-delay: 0.1s; }
    .gallery-item:nth-child(2) { animation-delay: 0.2s; }
    .gallery-item:nth-child(3) { animation-delay: 0.3s; }
    .gallery-item:nth-child(4) { animation-delay: 0.4s; }
    .gallery-item:nth-child(5) { animation-delay: 0.5s; }
    
    @keyframes itemSlideIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .gallery-item img {
        width: 100%;
        height: 75%;
        object-fit: cover;
        transition: all 0.3s ease;
    }
    
    .gallery-item .item-info {
        padding: 20px;
        text-align: center;
        height: 25%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6));
    }
    
    .gallery-item .item-info h3 {
        font-size: 1.1rem;
        font-weight: 700;
        color: #ffffff;
        margin: 0;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
    }
    
    .gallery-item:hover {
        transform: translateY(-10px) scale(1.05);
        z-index: 10;
        box-shadow: 0 40px 80px rgba(0, 0, 0, 0.6);
        border-color: rgba(255, 107, 157, 0.5);
    }
    
    .gallery-item:hover img {
        filter: brightness(1.1) contrast(1.1);
    }
    
    /* Print Button */
    .print-button-container {
        text-align: center;
        margin: 80px 0;
    }
    
    .print-btn {
        background: linear-gradient(135deg, #ff6b9d 0%, #e91e63 100%);
        color: white;
        border: none;
        padding: 18px 40px;
        border-radius: 50px;
        font-size: 1.3rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.4s ease;
        box-shadow: 0 10px 30px rgba(255, 107, 157, 0.3);
        position: relative;
        overflow: hidden;
    }
    
    .print-btn:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 20px 40px rgba(255, 107, 157, 0.4);
    }
    
    .print-btn:active {
        transform: translateY(-2px) scale(1.02);
    }
    
    .print-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }
    
    .print-btn:hover::before {
        left: 100%;
    }
    
    /* Lightbox */
    .lightbox {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.95);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 4000;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .lightbox.active {
        opacity: 1;
    }
    
    .lightbox img {
        max-width: 90%;
        max-height: 90%;
        border-radius: 15px;
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.7);
    }
    
    .lightbox .close {
        position: absolute;
        top: 40px;
        right: 50px;
        color: white;
        font-size: 50px;
        cursor: pointer;
        z-index: 4001;
        transition: all 0.3s ease;
    }
    
    .lightbox .close:hover {
        color: #ff6b9d;
        transform: scale(1.2);
    }
    
    /* Closing Message */
    .closing-message {
        text-align: center;
        padding: 80px 20px;
        margin-top: 100px;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.5));
        border-radius: 25px;
        backdrop-filter: blur(6px);
        border: 1px solid rgba(255, 255, 255, 0.4);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }
    
    .closing-text {
        font-size: clamp(1.8rem, 4.5vw, 3rem);
        font-weight: 800;
        background: linear-gradient(135deg, #ff6b9d 0%, #e91e63 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 30px;
        animation: colorShift 4s ease-in-out infinite;
    }
    
    @keyframes colorShift {
        0%, 100% {
            background: linear-gradient(135deg, #ff6b9d 0%, #e91e63 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        50% {
            background: linear-gradient(135deg, #ec407a 0%, #f48fb1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
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

    /* Responsive Design */
    @media (max-width: 768px) {
        .back-button {
            top: 20px;
            left: 20px;
            width: 45px;
            height: 45px;
        }
        
        .back-button svg {
            width: 20px;
            height: 20px;
        }
        
        .container {
            padding: 15px;
            margin: 10px;
        }
        
        .horizontal-gallery-container {
            height: 400px;
        }
        
        .gallery-item {
            width: 250px;
            height: 320px;
        }
        
        .laser-grid {
            grid-template-columns: 1fr;
            padding: 20px;
        }
        
        .true-focus-title {
            min-height: 80px;
        }
        
        .word {
            margin: 4px 8px;
            padding: 8px 16px;
        }
    }
    
    @media (max-width: 480px) {
        .gallery-item {
            width: 220px;
            height: 280px;
        }
        
        .horizontal-gallery-container {
            height: 350px;
        }
        
        .laser-screen {
            width: 95%;
            height: 85%;
        }
    }
</style>

<!-- Back Button - Outside Container -->
<button onclick="history.back()" class="back-button" aria-label="Back to previous page">
    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
    </svg>
</button>

<div class="container">
    <div id="confetti-container"></div>
    
    <div class="header-container">
        <h1 class="true-focus-title" id="trueFocusTitle">
            <span class="word">Gallery</span>
            <span class="word">Special</span>
            <span class="word">for</span>
            <span class="word">Violyn</span>
        </h1>
        <p class="subtitle">Teman Level 0 yang paling spesial ✨</p>
    </div>
    
    <div class="gallery-placeholder" id="galleryPlaceholder">
        <div class="placeholder-icon">📸</div>
        <p class="placeholder-text">Galeri kosong, tekan tombol cetak untuk memulai!</p>
    </div>
    
    <div class="print-button-container">
        <button class="print-btn" onclick="startLaserPrinting()">
            🖨️ Cetak Galeri Violyn
        </button>
    </div>
    
    <div class="horizontal-gallery-container" id="horizontalGalleryContainer">
        <div class="gallery-header">
            📸 Gallery Special Violyn - Swipe untuk melihat semua foto
        </div>
        <div class="gallery-scroll-container" id="galleryScrollContainer">
            <div class="gallery-items" id="galleryItems"></div>
        </div>
    </div>
    
    <div class="closing-message">
        <p class="closing-text">Terima kasih sudah jadi teman, Violyn 💙</p>
        <p style="color: #4a5568; font-size: 1.4rem; font-weight: 500;">Semoga persahabatan kita selalu indah seperti galeri ini</p>
    </div>
</div>

<div class="laser-container" id="laserContainer">
    <div class="laser-screen">
        <div class="laser-header">
            🖨️ LASER PRINTER - Mencetak Galeri Violyn
        </div>
        <div class="laser-grid" id="laserGrid"></div>
        <div class="printing-status" id="printingStatus">Initializing printer...</div>
    </div>
</div>

<div class="lightbox" id="lightbox">
    <span class="close" onclick="closeLightbox()">&times;</span>
    <img id="lightboxImg" src="" alt="">
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const photos = [
        {
            src: '/images/PIO1.jpg',
            title: 'Violyn Memory #1'
        },
        {
            src: '/images/PIO2.jpg',
            title: 'Violyn Memory #2'
        },
        {
            src: '/images/PIO3.jpg',
            title: 'Violyn Memory #3'
        },
        {
            src: '/images/PIO4.jpg',
            title: 'Violyn Memory #4'
        },
        {
            src: '/images/PIO5.jpg',
            title: 'Violyn Memory #5'
        }
    ];
    
    let isLaserComplete = false;
    
    function createConfetti() {
        const confettiContainer = document.getElementById('confetti-container');
        for (let i = 0; i < 50; i++) {
            const confetti = document.createElement('div');
            confetti.className = 'confetti';
            confetti.style.left = Math.random() * 100 + '%';
            confetti.style.animationDelay = Math.random() * 3 + 's';
            confetti.style.animationDuration = (Math.random() * 2 + 2) + 's';
            confettiContainer.appendChild(confetti);
        }
        
        setTimeout(() => {
            confettiContainer.innerHTML = '';
        }, 5000);
    }
    
    function initTrueFocus() {
        const words = document.querySelectorAll('.word');
        let currentIndex = 0;
        
        function updateFocus() {
            words.forEach((word, index) => {
                word.classList.remove('active');
                if (index === currentIndex) {
                    word.classList.add('active');
                }
            });
            
            currentIndex = (currentIndex + 1) % words.length;
        }
        
        updateFocus();
        setInterval(updateFocus, 1000);
    }
    
    window.startLaserPrinting = function() {
        const laserContainer = document.getElementById('laserContainer');
        const laserGrid = document.getElementById('laserGrid');
        const printingStatus = document.getElementById('printingStatus');
        const placeholder = document.getElementById('galleryPlaceholder');
        
        placeholder.classList.add('hidden');
        laserContainer.classList.add('active');
        laserGrid.innerHTML = '';
        
        const statusMessages = [
            'Initializing printer...',
            'Warming up laser...',
            'Loading image data...',
            'Starting print sequence...',
            'Printing image 1/5...',
            'Printing image 2/5...',
            'Printing image 3/5...',
            'Printing image 4/5...',
            'Printing image 5/5...',
            'Finalizing prints...',
            'Print complete! Switching to gallery view...'
        ];
        
        let statusIndex = 0;
        
        const statusInterval = setInterval(() => {
            if (statusIndex < statusMessages.length) {
                printingStatus.textContent = statusMessages[statusIndex];
                statusIndex++;
                
                if (statusIndex === statusMessages.length) {
                    clearInterval(statusInterval);
                    setTimeout(() => {
                        closeLaserAndShowGallery();
                    }, 1500);
                }
            }
        }, 800);
        
        photos.forEach((photo, index) => {
            const laserItem = document.createElement('div');
            laserItem.className = 'laser-item';
            laserItem.innerHTML = `
                <div class="laser-beam"></div>
                <img src="${photo.src}" alt="${photo.title}">
                <div class="laser-info">
                    <h3>${photo.title}</h3>
                </div>
            `;
            
            laserGrid.appendChild(laserItem);
            
            setTimeout(() => {
                laserItem.classList.add('printing');
            }, (index + 4) * 800);
        });
    }
    
    function closeLaserAndShowGallery() {
        const laserContainer = document.getElementById('laserContainer');
        const horizontalContainer = document.getElementById('horizontalGalleryContainer');
        
        laserContainer.classList.remove('active');
        
        setTimeout(() => {
            horizontalContainer.classList.add('active');
            createHorizontalGallery();
            isLaserComplete = true;
        }, 500);
    }
    
    function createHorizontalGallery() {
        const galleryItems = document.getElementById('galleryItems');
        galleryItems.innerHTML = '';
        
        photos.forEach((photo, index) => {
            const item = document.createElement('div');
            item.className = 'gallery-item';
            item.innerHTML = `
                <img src="${photo.src}" alt="${photo.title}" loading="lazy">
                <div class="item-info">
                    <h3>${photo.title}</h3>
                </div>
            `;
            
            item.addEventListener('click', () => openLightbox(photo.src, photo.title));
            galleryItems.appendChild(item);
        });
        
        const scrollContainer = document.getElementById('galleryScrollContainer');
        scrollContainer.style.scrollBehavior = 'smooth';
    }
    
    function openLightbox(src, title) {
        const lightbox = document.getElementById('lightbox');
        const img = document.getElementById('lightboxImg');
        img.src = src;
        img.alt = title;
        lightbox.style.display = 'flex';
        setTimeout(() => lightbox.classList.add('active'), 10);
    }
    
    window.closeLightbox = function() {
        const lightbox = document.getElementById('lightbox');
        lightbox.classList.remove('active');
        setTimeout(() => {
            lightbox.style.display = 'none';
        }, 300);
    }
    
    document.getElementById('lightbox').addEventListener('click', function(e) {
        if (e.target === this) {
            closeLightbox();
        }
    });
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeLightbox();
        }
    });
    
    createConfetti();
    initTrueFocus();
});
</script>
@endsection