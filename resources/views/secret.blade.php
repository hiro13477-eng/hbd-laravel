@extends('layouts.app')

@section('title', '만화 - Birthday Chat Story')

@section('content')

<style>
    /* ---- Root Variables & Base Styles ---- */
    :root {
        --shadow-soft: 0 8px 32px rgba(0, 0, 0, 0.1);
        --border-dashed: 2px dashed #ec4899;
        --primary-color: #ec4899;
        --accent-color: #f472b6;
        --glow-red: 0 0 10px rgba(236, 72, 153, 0.5);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body, html {
        font-family: sans-serif;
        line-height: 1.6;
        color: #374151;
        overflow-x: hidden;
        min-height: 100vh;
    }

    /* ---- Main Container ---- */
    .main-container {
        min-height: 100vh;
        width: 100%;
        padding: 2rem 0;
        position: relative;
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


    /* ---- Content Wrapper ---- */
    .content-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        padding: 5rem 1.5rem 3rem;
        position: relative;
    }

    /* ---- Container Styling (Menu Card) ---- */
    .content-container {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
        border-radius: 1.5rem;
        padding: 1.5rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        border: 1px solid #fbcfe8;
        text-align: center;
        cursor: pointer;
        position: relative;
        overflow: visible;
        width: 100%;
        display: block;
        margin-bottom: 2rem;
    }

    .content-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border: var(--border-dashed);
        border-radius: 1.5rem;
        box-shadow: var(--glow-red);
        animation: border-shimmer 3s ease-in-out infinite;
        pointer-events: none;
    }

    .content-container:hover {
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        transform: translateY(-2px);
    }

    @keyframes border-shimmer {
        0%, 100% { border-color: rgba(236, 72, 153, 0.6); box-shadow: 0 0 10px rgba(236, 72, 153, 0.3); }
        50% { border-color: rgba(236, 72, 153, 1); box-shadow: 0 0 15px rgba(236, 72, 153, 0.7); }
    }

    /* ---- Typing Effect ---- */
    .typing-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
        min-height: 150px;
        padding: 1.5rem 0;
    }

    .typing-text {
        font-size: 2.25rem;
        font-weight: 700;
        color: #374151;
        text-align: center;
        white-space: nowrap;
        overflow: hidden;
        border-right: 3px solid #374151;
        width: 0;
        display: block;
    }

    .typing-text.typing {
        animation: cursor-blink 0.8s step-end infinite;
    }

    @keyframes cursor-blink {
        0%, 50% { border-color: #374151; }
        51%, 100% { border-color: transparent; }
    }

    /* ---- Jokes Text ---- */
    .jokes-text {
        font-size: 1.125rem;
        line-height: 1.7;
        text-align: center;
        color: #374151;
    }

    .jokes-text p {
        margin-bottom: 0.75rem;
        position: relative;
        padding-left: 1.5rem;
    }

    .jokes-text p::before {
        content: '•';
        position: absolute;
        left: 0;
        color: #ec4899;
        font-size: 1.5rem;
    }

    /* ---- Secret Box ---- */
    .secret-box {
        border: 3px dashed #ec4899;
        border-radius: 1.5rem;
        padding: 1.5rem;
        transition: all 0.3s ease;
    }

    .secret-box:hover {
        border-color: #f472b6;
        box-shadow: 0 0 15px rgba(236, 72, 153, 0.3);
    }

    .secret-text {
        font-size: 1.125rem;
        line-height: 1.7;
        text-align: center;
        color: #374151;
    }

    .secret-text p {
        margin-bottom: 0.75rem;
    }

    /* ---- Modal Button ---- */
    .button-section {
        display: flex;
        justify-content: center;
        padding: 2rem 0;
    }

    .modal-button {
        background: #ec4899;
        color: white;
        border: none;
        padding: 1rem 2.5rem;
        border-radius: 50px;
        font-size: 1.125rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(236, 72, 153, 0.4);
        min-width: 200px;
    }

    .modal-button:hover {
        background: #f472b6;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(236, 72, 153, 0.6);
    }

    /* ---- Signature ---- */
    .signature {
        font-size: 1rem;
        font-style: italic;
        color: #374151;
        text-align: center;
    }

    /* ---- Modal Styles ---- */
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    .modal-overlay.show {
        opacity: 1;
        visibility: visible;
    }

    .modal {
        background: linear-gradient(135deg, #fce7f3, #ffe4e1);
        border-radius: 1.5rem;
        padding: 2rem;
        max-width: 90vw;
        max-height: 90vh;
        width: 800px;
        overflow-y: auto;
        transform: scale(0.8);
        transition: transform 0.3s ease;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        position: relative;
    }

    .modal-overlay.show .modal {
        transform: scale(1);
    }

    .modal-close {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: #fff;
        border: none;
        border-radius: 50%;
        width: 2rem;
        height: 2rem;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .modal-close:hover {
        background: #e5e7eb;
        transform: rotate(90deg);
    }

    .modal h2, .praise-section h3 {
        text-align: center;
    }

    /* ---- Surprise Button ---- */
    .surprise-button {
        background: #ec4899;
        color: white;
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 50px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(236, 72, 153, 0.4);
        margin: 1rem auto;
        display: block;
    }

    .surprise-button:hover {
        background: #f472b6;
        transform: scale(1.05);
        box-shadow: 0 8px 25px rgba(236, 72, 153, 0.6);
    }

    /* ---- Surprise Content ---- */
    .surprise-content {
        display: none;
        font-size: 1.25rem;
        font-weight: 700;
        color: #ec4899;
        text-align: center;
        margin-top: 1rem;
        animation: pop-in 0.5s ease-out;
    }

    .surprise-content.show {
        display: block;
    }

    @keyframes pop-in {
        0% { transform: scale(0); opacity: 0; }
        100% { transform: scale(1); opacity: 1; }
    }

    /* ---- Praise Content ---- */
    .praise-section {
        margin-bottom: 1.5rem;
    }

    .praise-section h3 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: #374151;
    }

    .praise-chips {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 1rem;
        justify-content: center;
    }

    .chip {
        padding: 0.5rem 1rem;
        background: rgba(236, 72, 153, 0.1);
        border: 1px solid rgba(236, 72, 153, 0.3);
        border-radius: 20px;
        font-size: 0.875rem;
        color: #374151;
        transition: all 0.2s ease;
    }

    .chip:hover {
        background: rgba(236, 72, 153, 0.2);
        transform: translateY(-1px);
    }

    .praise-paragraph {
        font-size: 1rem;
        line-height: 1.7;
        text-align: center;
        color: #374151;
    }

    /* ---- Confetti Canvas ---- */
    #confettiCanvas {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 50%;
        pointer-events: none;
        z-index: 10;
    }

    /* ---- Animations ---- */
    @keyframes fade-in-up {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .fade-in {
        animation: fade-in-up 0.6s ease-out forwards;
    }

    /* ---- Responsive Design ---- */
    @media (max-width: 768px) {
        .content-wrapper {
            padding: 4rem 1rem 2rem;
        }

        .content-container {
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        .typing-text {
            font-size: 1.75rem;
        }

        .typing-container {
            gap: 0.75rem;
            min-height: 120px;
            padding: 1rem 0;
        }

        .modal {
            padding: 1.5rem;
            width: 95vw;
        }

        .modal-button, .surprise-button {
            padding: 0.75rem 2rem;
            font-size: 1rem;
        }

        .button-section {
            padding: 1.5rem 0;
        }
    }

    @media (max-width: 480px) {
        .typing-text {
            font-size: 1.5rem;
        }

        .content-container {
            padding: 0.75rem;
        }

        .modal-button, .surprise-button {
            min-width: 160px;
        }

        .chip {
            font-size: 0.75rem;
            padding: 0.375rem 0.75rem;
        }
    }
</style>

<div class="main-container">
    <!-- Back Button -->
    <button onclick="history.back()" class="back-button" aria-label="Back to previous page">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
    </button>

    <div class="content-wrapper">
        <!-- Typing Animation -->
        <div class="content-container fade-in">
            <div class="typing-container">
                <div class="typing-text" id="typingText"></div>
            </div>
        </div>

        <!-- Jokes Thread -->
        <div class="content-container fade-in">
            <div class="jokes-text">
                <p>Kenapa kue ulang tahun selalu jadi penutup? 🤔</p>
                <p>Karena semua orang nunggu momen tiup lilin! 🕯️</p>
                <p>Tapi tahu nggak, Viloyn, ada rahasia di hari ulang tahunmu... 🤫</p>
                <p>Kamu nggak cuma nambah umur, tapi juga nambah pesona yang bikin temen level 0 ini grogi nulis beginian! 😅</p>
            </div>
        </div>

        <!-- Secret Box -->
        <div class="content-container fade-in">
            <div class="secret-box">
                <div class="secret-text">
                    <p>Aku cuma temen level 0 tanpa skill khusus, tapi aku punya misi: bikin kamu senyum di hari ulang tahun!</p>
                    <p>Sejujurnya, aku ngefans sama kamu, tapi cuma dari jauh aja, hehe.</p>
                    <p>Maaf ya, aku nggak tahu tanggal ultahmu pasti, jadi bikin web ini biar kelihatan effort 😅</p>
                </div>
            </div>
        </div>

        <!-- Modal Button -->
        <div class="button-section">
            <button class="modal-button" id="openModal" aria-label="Open praise modal">
                Pesan Buat Viloyn
            </button>
        </div>

        <!-- Signature -->
        <div class="content-container fade-in">
            <div class="signature">
                — Dari temen level 0-mu
            </div>
        </div>
    </div>

    <!-- Modal Popup -->
    <div class="modal-overlay" id="modalOverlay" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
        <div class="modal">
            <canvas id="confettiCanvas"></canvas>
            <button class="modal-close" id="closeModal" aria-label="Close modal">
                <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </button>

            <h2 id="modalTitle" style="font-size: 1.75rem; font-weight: 700;">
                Pujian Spesial untuk Viloyn
            </h2>

            <!-- Surprise Button -->
            <button class="surprise-button" id="surpriseButton">Coba Deh Pencet</button>
            <div class="surprise-content" id="surpriseContent">
                <p>🎉 Viloyn, kamu adalah bintang di hari ini! Bersinar terus ya! 🌟</p>
            </div>

            <!-- Penampilan -->
            <div class="praise-section">
                <h3>✨ Penampilan & Pesona</h3>
                <div class="praise-chips">
                    <span class="chip">cantik</span>
                    <span class="chip">anggun</span>
                    <span class="chip">glowing</span>
                    <span class="chip">stylish</span>
                    <span class="chip">memesona</span>
                    <span class="chip">charming</span>
                    <span class="chip">elegan</span>
                    <span class="chip">kece</span>
                </div>
                <p class="praise-paragraph">
                    Viloyn, kamu punya pesona yang bikin orang susah kedip! Aura kamu selalu cerah, dan gaya kamu selalu kece tapi tetap natural. Kamu bener-bener bikin suasana jadi lebih hidup.
                </p>
            </div>

            <!-- Kepribadian -->
            <div class="praise-section">
                <h3>💖 Kepribadian & Karakter</h3>
                <div class="praise-chips">
                    <span class="chip">baik hati</span>
                    <span class="chip">tulus</span>
                    <span class="chip">ramah</span>
                    <span class="chip">ceria</span>
                    <span class="chip">empatik</span>
                    <span class="chip">humoris</span>
                    <span class="chip">rendah hati</span>
                    <span class="chip">pengertian</span>
                </div>
                <p class="praise-paragraph">
                    Kepribadianmu hangat dan tulus, Viloyn. Kamu bikin orang nyaman buat cerita apa aja, dan kebaikan hatimu itu bener-bener terasa. Kamu orang yang bikin dunia jadi lebih baik!
                </p>
            </div>

            <!-- Kepintaran & Bakat -->
            <div class="praise-section">
                <h3>🧠 Kepintaran & Bakat</h3>
                <div class="praise-chips">
                    <span class="chip">pintar</span>
                    <span class="chip">kreatif</span>
                    <span class="chip">rajin</span>
                    <span class="chip">multitalenta</span>
                    <span class="chip">cepat belajar</span>
                    <span class="chip">inovatif</span>
                    <span class="chip">problem-solver</span>
                    <span class="chip">berbakat</span>
                </div>
                <p class="praise-paragraph">
                    Kecerdasanmu nggak cuma di buku, tapi juga cara kamu nyelesain masalah dengan kreatif. Bakatmu bikin orang kagum, dan kerja kerasmu bikin kamu makin bersinar!
                </p>
            </div>

            <!-- Vibes & Aura -->
            <div class="praise-section">
                <h3>✨ Vibes & Aura</h3>
                <div class="praise-chips">
                    <span class="chip">karismatik</span>
                    <span class="chip">inspiratif</span>
                    <span class="chip">positif</span>
                    <span class="chip">cool</span>
                    <span class="chip">uplifting</span>
                    <span class="chip">queen vibes</span>
                </div>
                <p class="praise-paragraph">
                    Kamu punya aura yang bikin orang pengen deket sama kamu. Vibes positifmu menular, dan kamu bener-bener punya main character energy yang iconic!
                </p>
            </div>

            <!-- SMA Life -->
            <div class="praise-section">
                <h3>🎓 Kehidupan SMA Kelas 10</h3>
                <div class="praise-chips">
                    <span class="chip">adaptif</span>
                    <span class="chip">friendly</span>
                    <span class="chip">team player</span>
                    <span class="chip">rajin</span>
                    <span class="chip">natural leader</span>
                    <span class="chip">inspiratif</span>
                </div>
                <p class="praise-paragraph">
                    Masuk SMA kelas 10 pasti tantangan, tapi kamu handle dengan keren! Cara kamu adaptasi dan bikin temen baru bikin kamu jadi panutan di sekolah.
                </p>
            </div>

            <!-- Birthday Wishes -->
            <div class="praise-section">
                <h3>🎂 Doa Ulang Tahun</h3>
                <div class="praise-chips">
                    <span class="chip">sehat selalu</span>
                    <span class="chip">bahagia terus</span>
                    <span class="chip">sukses gemilang</span>
                    <span class="chip">impian tercapai</span>
                    <span class="chip">glow up era</span>
                    <span class="chip">blessed always</span>
                </div>
                <p class="praise-paragraph">
                    Di ulang tahun ini, semoga kamu selalu sehat, bahagia, dan sukses di semua yang kamu lakuin. Semoga momen ini jadi awal dari petualangan baru yang luar biasa, Viloyn! 🎉
                </p>
            </div>

            <!-- Closing -->
            <div class="praise-section">
                <p class="praise-paragraph text-center" style="font-weight: 600;">
                    Viloyn, kamu adalah kombinasi sempurna dari kecantikan, kecerdasan, dan kebaikan hati. Semoga ulang tahun ini jadi momen paling spesial buatmu! 💖
                </p>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // ---- Typing Animation ----
    const typingText = document.getElementById('typingText');
    const texts = [
        'Selamat Ulang Tahun, Viloyn!',
        'Semoga Panjang Umur & Sehat Selalu',
        'Sukses Selalu & Bahagia Terus!'
    ];
    let currentTextIndex = 0;
    let currentCharIndex = 0;
    let isDeleting = false;

    function type() {
        const currentText = texts[currentTextIndex];
        typingText.textContent = currentText.slice(0, currentCharIndex);
        typingText.style.width = `${currentText.length}ch`;

        if (!isDeleting && currentCharIndex < currentText.length) {
            currentCharIndex++;
            setTimeout(type, 100);
        } else if (isDeleting && currentCharIndex > 0) {
            currentCharIndex--;
            setTimeout(type, 50);
        } else if (!isDeleting && currentCharIndex === currentText.length) {
            isDeleting = true;
            setTimeout(type, 1500);
        } else if (isDeleting && currentCharIndex === 0) {
            isDeleting = false;
            currentTextIndex = (currentTextIndex + 1) % texts.length;
            setTimeout(type, 500);
        }
    }

    if (typingText) {
        typingText.classList.add('typing');
        type();
    }

    // ---- Modal Functionality ----
    const modalElements = {
        openBtn: document.getElementById('openModal'),
        closeBtn: document.getElementById('closeModal'),
        overlay: document.getElementById('modalOverlay'),
        modal: document.querySelector('.modal'),
        surpriseBtn: document.getElementById('surpriseButton'),
        surpriseContent: document.getElementById('surpriseContent')
    };

    let previousActiveElement = null;

    if (Object.values(modalElements).some(el => !el)) {
        console.error('Modal elements missing');
        return;
    }

    // ---- Confetti Animation ----
    const canvas = document.getElementById('confettiCanvas');
    const ctx = canvas.getContext('2d');
    let confetti = [];
    const colors = ['#ec4899', '#f472b6', '#667eea', '#764ba2'];

    function resizeCanvas() {
        canvas.width = modalElements.modal.offsetWidth;
        canvas.height = modalElements.modal.offsetHeight * 0.5; // Limit to top half
    }

    function createConfetti() {
        return {
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height - canvas.height, // Start above canvas
            radius: Math.random() * 5 + 2,
            color: colors[Math.floor(Math.random() * colors.length)],
            speed: Math.random() * 3 + 2,
            angle: Math.random() * Math.PI * 2
        };
    }

    function animateConfetti() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        confetti.forEach((particle, index) => {
            particle.y += particle.speed;
            particle.x += Math.sin(particle.angle) * 0.5;
            if (particle.y > canvas.height) confetti.splice(index, 1);
            ctx.beginPath();
            ctx.arc(particle.x, particle.y, particle.radius, 0, Math.PI * 2);
            ctx.fillStyle = particle.color;
            ctx.fill();
        });
        if (confetti.length > 0) requestAnimationFrame(animateConfetti);
    }

    const startConfetti = () => {
        resizeCanvas();
        confetti = Array(100).fill().map(createConfetti);
        animateConfetti();
    };

    const openModal = () => {
        previousActiveElement = document.activeElement;
        modalElements.overlay.classList.add('show');
        document.body.style.overflow = 'hidden';
        modalElements.closeBtn.focus();
        document.querySelector('.main-container').setAttribute('aria-hidden', 'true');
        startConfetti();
    };

    const closeModal = () => {
        modalElements.overlay.classList.remove('show');
        document.body.style.overflow = '';
        document.querySelector('.main-container').removeAttribute('aria-hidden');
        if (previousActiveElement) previousActiveElement.focus();
        confetti = [];
        ctx.clearRect(0, 0, canvas.width, canvas.height);
    };

    modalElements.openBtn.addEventListener('click', openModal);
    modalElements.closeBtn.addEventListener('click', closeModal);
    modalElements.overlay.addEventListener('click', e => {
        if (e.target === modalElements.overlay) closeModal();
    });
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && modalElements.overlay.classList.contains('show')) closeModal();
    });

    // ---- Surprise Button Functionality ----
    modalElements.surpriseBtn.addEventListener('click', () => {
        modalElements.surpriseContent.classList.toggle('show');
        if (modalElements.surpriseContent.classList.contains('show')) {
            startConfetti();
        }
    });

    // ---- Focus Trap ----
    document.addEventListener('keydown', e => {
        if (!modalElements.overlay.classList.contains('show') || e.key !== 'Tab') return;
        const focusable = modalElements.modal.querySelectorAll(
            'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
        );
        const [first, last] = [focusable[0], focusable[focusable.length - 1]];
        if (e.shiftKey && document.activeElement === first) {
            e.preventDefault();
            last.focus();
        } else if (!e.shiftKey && document.activeElement === last) {
            e.preventDefault();
            first.focus();
        }
    });

    // ---- Dynamic Layout Fix ----
    const fixLayout = () => {
        const containers = document.querySelectorAll('.content-container');
        let totalHeight = 0;

        containers.forEach((container, i) => {
            const rect = container.getBoundingClientRect();
            container.style.display = 'block';
            container.style.visibility = 'visible';
            container.style.opacity = '1';
            container.style.marginTop = i > 0 ? '2rem' : '0';
            totalHeight += rect.height + 32;
        });

        const mainContainer = document.querySelector('.main-container');
        if (mainContainer) {
            mainContainer.style.minHeight = Math.max(totalHeight + 150, window.innerHeight) + 'px';
        }
    };

    fixLayout();
    window.addEventListener('resize', fixLayout);

    // ---- Scroll Animations ----
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
                entry.target.style.willChange = 'auto';
            }
        });
    }, { threshold: 0.2 });

    document.querySelectorAll('.content-container').forEach(container => {
        container.style.opacity = '0';
        container.style.transform = 'translateY(20px)';
        container.style.willChange = 'transform, opacity';
        observer.observe(container);
    });

    // ---- Konami Code Easter Egg ----
    const konamiSequence = ['ArrowUp', 'ArrowUp', 'ArrowDown', 'ArrowDown', 'ArrowLeft', 'ArrowRight', 'ArrowLeft', 'ArrowRight', 'KeyB', 'KeyA'];
    let konamiCode = [];

    document.addEventListener('keydown', e => {
        konamiCode.push(e.code);
        if (konamiCode.length > konamiSequence.length) konamiCode.shift();
        if (konamiCode.join('') === konamiSequence.join('')) {
            const easterEgg = document.createElement('div');
            easterEgg.innerHTML = `
                <div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: rgba(0, 0, 0, 0.9); color: white; padding: 1.5rem; border-radius: 10px; z-index: 9999;">
                    <h3>🎉 Easter Egg Unlocked! 🎉</h3>
                    <p>Keren banget, Viloyn! Kamu nemu kode rahasia! 🌟</p>
                </div>
            `;
            document.body.appendChild(easterEgg);

            setTimeout(() => {
                easterEgg.remove();
            }, 2500);

            konamiCode = [];
        }
    });

    // ---- Smooth Scrolling ----
    document.documentElement.style.scrollBehavior = 'smooth';

    // ---- Page Load Animation ----
    const mainContainer = document.querySelector('.main-container');
    if (mainContainer) {
        mainContainer.style.opacity = '0';
        requestAnimationFrame(() => {
            mainContainer.style.transition = 'opacity 0.6s ease';
            mainContainer.style.opacity = '1';
        });
    }

    // ---- Console Message ----
    console.log(`
        🎂 Happy Birthday Viloyn! 🎂
        From your level 0 buddy: 
        "Semoga hari ini penuh kebahagiaan dan momen tak terlupakan!"
        P.S: Coba Konami Code untuk kejutan spesial! 😉
    `);
});
</script>

@endsection