<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '생일 축하해요! 🎂')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .korean-font {
            font-family: 'Noto Sans KR', 'Inter', sans-serif;
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
        
        .glow {
            text-shadow: 0 0 20px rgba(236, 72, 153, 0.3);
        }
        
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-hover:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        /* Hide YouTube iframe visually */
        #youtubePlayer {
            position: fixed;
            top: -9999px;
            left: -9999px;
            width: 1px;
            height: 1px;
            opacity: 0;
            pointer-events: none;
        }

        /* Music button animation */
        .music-playing {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        /* Canvas styling */
        #bgCanvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            pointer-events: none;
        }

        /* Ensure content is above canvas */
        .content-layer {
            position: relative;
            z-index: 10;
        }

        /* Parallax mouse effect */
        .parallax-element {
            transition: transform 0.1s ease-out;
        }
    </style>
</head>
<body class="korean-font gradient-bg min-h-screen">
    <!-- Three.js Canvas Background -->
    <canvas id="bgCanvas"></canvas>
    
    <!-- Content Layer -->
    <div class="content-layer">
        @yield('content')
        
        <!-- Default Birthday Content if no content is yielded -->
        @hasSection('content')
        @else
        <div class="min-h-screen flex items-center justify-center px-4">
            <div class="text-center space-y-8 max-w-4xl mx-auto">
                <!-- Main Title -->
                <div class="parallax-element" data-speed="0.02">
                    <h1 class="text-6xl md:text-8xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 glow">
                        🎉 생일 축하해요! 🎂
                    </h1>
                </div>
                
                <!-- Subtitle -->
                <div class="parallax-element" data-speed="0.03">
                    <p class="text-xl md:text-2xl text-gray-700 font-medium">
                        특별한 당신의 특별한 날을 축하합니다
                    </p>
                </div>
                
                <!-- Birthday Cards -->
                <div class="grid md:grid-cols-3 gap-6 mt-12">
                    <div class="card-hover bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg parallax-element" data-speed="0.01">
                        <div class="text-4xl mb-4">🎈</div>
                        <h3 class="font-bold text-lg text-gray-800 mb-2">축하의 마음</h3>
                        <p class="text-gray-600">언제나 행복하고 건강하세요!</p>
                    </div>
                    
                    <div class="card-hover bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg parallax-element" data-speed="0.015">
                        <div class="text-4xl mb-4">🎁</div>
                        <h3 class="font-bold text-lg text-gray-800 mb-2">소중한 하루</h3>
                        <p class="text-gray-600">오늘 하루 특별한 추억 만드세요!</p>
                    </div>
                    
                    <div class="card-hover bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg parallax-element" data-speed="0.02">
                        <div class="text-4xl mb-4">🌟</div>
                        <h3 class="font-bold text-lg text-gray-800 mb-2">빛나는 미래</h3>
                        <p class="text-gray-600">앞으로도 더 멋진 일들이 기다려요!</p>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    
    <!-- Hidden YouTube iframe for background music -->
    <iframe 
        id="youtubePlayer"
        width="560" 
        height="315" 
        src="" 
        title="Background Music" 
        frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
        allowfullscreen>
    </iframe>

    <!-- Audio controls -->
    <div class="fixed bottom-4 right-4 z-50">
        <button id="musicToggle" class="bg-white/80 backdrop-blur-sm hover:bg-white/90 text-gray-600 p-3 rounded-full shadow-lg transition-all duration-300">
            <svg id="musicIcon" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z"></path>
                <path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217z"></path>
            </svg>
        </button>
    </div>

    <script>
    // Three.js Ballpit Animation with Improved Physics
    class BallpitAnimation {
        constructor() {
            this.canvas = document.getElementById('bgCanvas');
            this.mouse = { x: 0, y: 0, prevX: 0, prevY: 0 };
            this.init();
            this.setupEventListeners();
            this.animate();
        }

        init() {
            // Scene setup
            this.scene = new THREE.Scene();
            this.camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
            this.renderer = new THREE.WebGLRenderer({ 
                canvas: this.canvas, 
                alpha: true, 
                antialias: true 
            });
            
            this.renderer.setSize(window.innerWidth, window.innerHeight);
            this.renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
            this.renderer.toneMapping = THREE.ACESFilmicToneMapping;
            
            // Camera position for full screen view
            this.camera.position.z = 18;
            
            // Lighting - brighter for colorful balls
            const ambientLight = new THREE.AmbientLight(0xffffff, 0.7);
            this.scene.add(ambientLight);
            
            const pointLight = new THREE.PointLight(0xff6b9d, 1.2, 100);
            pointLight.position.set(10, 10, 10);
            this.scene.add(pointLight);
            
            const pointLight2 = new THREE.PointLight(0x6bcfff, 1.0, 100);
            pointLight2.position.set(-10, -10, 5);
            this.scene.add(pointLight2);
            
            const pointLight3 = new THREE.PointLight(0x6bff9d, 0.8, 100);
            pointLight3.position.set(0, 15, -5);
            this.scene.add(pointLight3);
            
            // Create balls
            this.balls = [];
            this.createBalls();
        }

        createBalls() {
            const colors = [
                0xff6b9d, // bright pink
                0x6bcfff, // bright blue
                0x9d6bff, // bright purple
                0x6bff9d, // bright green
                0xffb66b, // bright orange
                0xff6b6b, // bright red
                0x6bffff, // bright cyan
                0xffff6b, // bright yellow
                0xff9d6b, // coral
                0x6b9dff, // sky blue
                0xb66bff, // violet
                0x9dff6b  // lime
            ];

            const ballCount = 60; // Good amount for full screen coverage
            
            for (let i = 0; i < ballCount; i++) {
                const geometry = new THREE.SphereGeometry(0.4 + Math.random() * 0.6, 32, 16);
                const material = new THREE.MeshPhysicalMaterial({
                    color: colors[Math.floor(Math.random() * colors.length)],
                    metalness: 0.3,
                    roughness: 0.4,
                    clearcoat: 1.0,
                    clearcoatRoughness: 0.1,
                    opacity: 1.0,
                    transparent: false,
                });
                
                const ball = new THREE.Mesh(geometry, material);
                
                // Posisikan bola tersebar merata di seluruh layar
                ball.position.set(
                    (Math.random() - 0.5) * 30, // Lebar penyebaran
                    (Math.random() - 0.5) * 20, // Tinggi penyebaran merata
                    (Math.random() - 0.5) * 15  // Kedalaman
                );
                
                // Kecepatan awal random untuk gerakan natural
                ball.velocity = new THREE.Vector3(
                    (Math.random() - 0.5) * 0.01, // Kecepatan horizontal kecil
                    (Math.random() - 0.5) * 0.01, // Kecepatan vertikal kecil
                    (Math.random() - 0.5) * 0.01  // Kecepatan Z kecil
                );
                
                ball.originalColor = material.color.getHex();
                ball.radius = geometry.parameters.radius;
                
                this.scene.add(ball);
                this.balls.push(ball);
            }
        }

        setupEventListeners() {
            window.addEventListener('mousemove', (event) => {
                this.mouse.prevX = this.mouse.x;
                this.mouse.prevY = this.mouse.y;
                this.mouse.x = (event.clientX / window.innerWidth) * 2 - 1;
                this.mouse.y = -(event.clientY / window.innerHeight) * 2 + 1;
            });

            window.addEventListener('touchmove', (event) => {
                if (event.touches.length > 0) {
                    this.mouse.prevX = this.mouse.x;
                    this.mouse.prevY = this.mouse.y;
                    this.mouse.x = (event.touches[0].clientX / window.innerWidth) * 2 - 1;
                    this.mouse.y = -(event.touches[0].clientY / window.innerHeight) * 2 + 1;
                }
            });
            
            window.addEventListener('resize', () => {
                this.camera.aspect = window.innerWidth / window.innerHeight;
                this.camera.updateProjectionMatrix();
                this.renderer.setSize(window.innerWidth, window.innerHeight);
            });
        }

        updateBalls() {
            const mouseForce = 0.001; // Dikurangi dari 0.003 jadi lebih halus
            const mouseRadius = 4; // Dikurangi sedikit dari 5
            const damping = 0.997; // Damping lebih besar untuk gerakan lebih smooth
            const bounds = { x: 18, y: 12, z: 10 };
            const bounceStrength = 0.8; // Pantulan lebih lembut
            const gravity = 0; // Gravitasi super ringan (0.1x dari biasanya)
            
            this.balls.forEach((ball, index) => {
                // ENHANCED MOUSE INTERACTION - Lebih responsif dan interaktif
                const mouseWorldX = this.mouse.x * 15;
                const mouseWorldY = this.mouse.y * 10;
                const mouseDistance = Math.sqrt(
                    Math.pow(ball.position.x - mouseWorldX, 2) +
                    Math.pow(ball.position.y - mouseWorldY, 2)
                );
                
                if (mouseDistance < mouseRadius) {
                    // Calculate mouse movement velocity
                    const mouseDeltaX = this.mouse.x - this.mouse.prevX;
                    const mouseDeltaY = this.mouse.y - this.mouse.prevY;
                    
                    // Push away from mouse dengan efek yang lebih kuat
                    const forceX = (ball.position.x - mouseWorldX) / mouseDistance;
                    const forceY = (ball.position.y - mouseWorldY) / mouseDistance;
                    
                    // Tambah efek mouse movement - lebih halus
                    ball.velocity.x += forceX * mouseForce + mouseDeltaX * 0.2; // Dikurangi dari 0.5
                    ball.velocity.y += forceY * mouseForce + mouseDeltaY * 0.2; // Dikurangi dari 0.5
                    
                    // Efek visual yang lebih menarik
                    const intensity = 1 - (mouseDistance / mouseRadius);
                    const flashColor = intensity > 0.7 ? 0xffffff : 
                                     intensity > 0.4 ? 0xffff88 : 0xff88ff;
                    
                    ball.material.color.setHex(flashColor);
                    setTimeout(() => {
                        ball.material.color.setHex(ball.originalColor);
                    }, 150);
                    
                    // Tambah rotasi saat berinteraksi dengan mouse - lebih halus
                    ball.rotation.x += mouseDeltaY * 0.2; // Dikurangi dari 0.5
                    ball.rotation.y += mouseDeltaX * 0.2; // Dikurangi dari 0.5
                }
                
                // GRAVITASI RINGAN - Membuat bola perlahan turun
                ball.velocity.y -= gravity;
                
                // Random forces untuk variasi gerakan - lebih halus
                if (Math.random() < 0.0005) { // Dikurangi dari 0.001
                    ball.velocity.x += (Math.random() - 0.5) * 0.0002; // Dikurangi dari 0.0005
                    ball.velocity.y += (Math.random() - 0.5) * 0.0002;
                    ball.velocity.z += (Math.random() - 0.5) * 0.0002;
                }
                
                // Update posisi berdasarkan kecepatan
                ball.position.add(ball.velocity);
                
                // BOUNCING - Pantulan dari semua sisi
                if (Math.abs(ball.position.x) > bounds.x) {
                    ball.position.x = Math.sign(ball.position.x) * bounds.x;
                    ball.velocity.x *= -bounceStrength;
                }
                
                if (Math.abs(ball.position.y) > bounds.y) {
                    ball.position.y = Math.sign(ball.position.y) * bounds.y;
                    ball.velocity.y *= -bounceStrength;
                }
                
                if (Math.abs(ball.position.z) > bounds.z) {
                    ball.position.z = Math.sign(ball.position.z) * bounds.z;
                    ball.velocity.z *= -bounceStrength;
                }
                
                // Ball collision
                for (let i = index + 1; i < this.balls.length; i++) {
                    const otherBall = this.balls[i];
                    const distance = ball.position.distanceTo(otherBall.position);
                    const minDistance = ball.radius + otherBall.radius;
                    
                    if (distance < minDistance && distance > 0) {
                        const overlap = minDistance - distance;
                        const direction = ball.position.clone().sub(otherBall.position).normalize();
                        
                        // Pisahkan bola
                        ball.position.add(direction.clone().multiplyScalar(overlap * 0.5));
                        otherBall.position.sub(direction.clone().multiplyScalar(overlap * 0.5));
                        
                        // Tukar kecepatan untuk collision
                        const relativeVelocity = ball.velocity.clone().sub(otherBall.velocity);
                        const separatingVelocity = relativeVelocity.dot(direction);
                        
                        if (separatingVelocity < 0) {
                            const impulse = direction.clone().multiplyScalar(separatingVelocity * 0.9);
                            ball.velocity.sub(impulse);
                            otherBall.velocity.add(impulse);
                        }
                    }
                }
                
                // Damping untuk stabilitas
                ball.velocity.multiplyScalar(damping);
                
                // Rotasi berdasarkan gerakan
                ball.rotation.x += ball.velocity.y * 0.1;
                ball.rotation.y += ball.velocity.x * 0.1;
                ball.rotation.z += ball.velocity.z * 0.1;
                
                // Hilangkan failsafe untuk gravity karena tidak ada gravity lagi
            });
        }

        animate() {
            requestAnimationFrame(() => this.animate());
            
            this.updateBalls();
            this.renderer.render(this.scene, this.camera);
        }
    }

    // Parallax effect for UI elements
    function initParallax() {
        const parallaxElements = document.querySelectorAll('.parallax-element');
        let mouseX = 0, mouseY = 0;
        
        document.addEventListener('mousemove', (e) => {
            mouseX = (e.clientX / window.innerWidth - 0.5) * 2;
            mouseY = (e.clientY / window.innerHeight - 0.5) * 2;
            
            parallaxElements.forEach(element => {
                const speed = parseFloat(element.dataset.speed) || 0.02;
                const x = mouseX * speed * 100;
                const y = mouseY * speed * 100;
                element.style.transform = `translate(${x}px, ${y}px)`;
            });
        });
    }

    // Music control functionality
    function initMusicControl() {
        const musicToggle = document.getElementById('musicToggle');
        const musicIcon = document.getElementById('musicIcon');
        const youtubePlayer = document.getElementById('youtubePlayer');
        
        let isPlaying = false;
        
        musicToggle.addEventListener('click', function() {
            if (isPlaying) {
                // Stop music
                youtubePlayer.src = '';
                musicIcon.innerHTML = '<path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z"></path><path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217z"></path>';
                musicToggle.classList.remove('music-playing', 'bg-pink-100', 'text-pink-600');
                musicToggle.classList.add('bg-white/80', 'text-gray-600');
                isPlaying = false;
            } else {
                // Start music (Happy Birthday song)
                youtubePlayer.src = 'https://www.youtube.com/embed/nAw2ooeubSQ?autoplay=1&loop=1&playlist=nAw2ooeubSQ&controls=0&showinfo=0&rel=0&modestbranding=1&iv_load_policy=3&fs=0&disablekb=1&mute=0';
                musicIcon.innerHTML = '<path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM15.657 6.343a1 1 0 011.414 0A9.972 9.972 0 0119 12a9.972 9.972 0 01-1.929 5.657 1 1 0 11-1.414-1.414A7.972 7.972 0 0017 12a7.972 7.972 0 00-1.343-4.243 1 1 0 010-1.414z"></path>';
                musicToggle.classList.add('music-playing', 'bg-pink-100', 'text-pink-600');
                musicToggle.classList.remove('bg-white/80', 'text-gray-600');
                isPlaying = true;
            }
        });

        // Create floating music notes when playing
        setInterval(() => {
            if (isPlaying && Math.random() < 0.3) {
                createMusicNote();
            }
        }, 2000);
    }

    // Create floating music note animation
    function createMusicNote() {
        const musicButton = document.getElementById('musicToggle');
        const rect = musicButton.getBoundingClientRect();
        
        const note = document.createElement('div');
        note.innerHTML = '♪';
        note.className = 'fixed text-pink-400 text-lg pointer-events-none z-40';
        note.style.left = rect.left + 'px';
        note.style.top = rect.top + 'px';
        document.body.appendChild(note);
        
        // GSAP animation for the note
        gsap.to(note, {
            y: -60,
            x: Math.random() * 50 - 25,
            scale: 0,
            rotation: Math.random() * 360,
            duration: 2.5,
            ease: "power2.out",
            onComplete: () => note.remove()
        });
    }

    // Initialize everything when DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Three.js Ballpit
        new BallpitAnimation();
        
        // Initialize parallax effect
        initParallax();
        
        // Initialize music controls
        initMusicControl();
        
        // Add some entrance animations
        gsap.timeline()
            .from('.parallax-element', {
                opacity: 0,
                y: 50,
                duration: 1,
                stagger: 0.2,
                ease: "power2.out"
            })
            .from('.card-hover', {
                opacity: 0,
                scale: 0.8,
                duration: 0.8,
                stagger: 0.1,
                ease: "back.out(1.7)"
            }, "-=0.5");
    });
    </script>
</body>
