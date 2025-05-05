<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #000000, #121212, #1e1e1e);
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            overflow: hidden;
            position: relative;
        }
        
        #canvas-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }
        
        .content {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: 2rem;
            background-color: rgba(15, 15, 15, 0.8);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(100, 100, 100, 0.2);
            max-width: 90%;
            width: 600px;
        }
        
        h1 {
            font-size: 8rem;
            font-weight: 900;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, #00b8ff, #7d00ff);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 0 15px rgba(125, 0, 255, 0.5);
        }
        
        h2 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
        }
        
        p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        
        .btn {
            background: linear-gradient(45deg, #00b8ff, #7d00ff);
            color: white;
            border: none;
            padding: 12px 24px;
            font-size: 1.2rem;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 0 15px rgba(125, 0, 255, 0.5);
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        }
        
        .sport-selector {
            margin-top: 2rem;
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        
        .sport-btn {
            background-color: rgba(30, 30, 30, 0.8);
            border: 1px solid rgba(100, 100, 100, 0.5);
            color: #cccccc;
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .sport-btn.active {
            background: linear-gradient(45deg, #00b8ff, #7d00ff);
            color: white;
            border: none;
            box-shadow: 0 0 10px rgba(125, 0, 255, 0.5);
        }
        
        .sport-btn:hover {
            background-color: rgba(255, 255, 255, 0.4);
        }
        
        @media (max-width: 768px) {
            h1 {
                font-size: 6rem;
            }
            
            h2 {
                font-size: 1.8rem;
            }
        }
        
        @media (max-width: 480px) {
            h1 {
                font-size: 4rem;
            }
            
            h2 {
                font-size: 1.5rem;
            }
            
            p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div id="canvas-container"></div>
    
    <div class="content">
        <h1>404</h1>
        <h2>Out of Bounds!</h2>
        <p>The page you're looking for seems to have gone out of play. Let's get you back in the game!</p>
        <a href="/" class="btn">Back to Home</a>
    </div>
    
    <script>
        // Scene setup
        const container = document.getElementById('canvas-container');
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.z = 5;
        
        const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.setClearColor(0x000000, 0);
        container.appendChild(renderer.domElement);
        
        // Add star field background
        function createStars() {
            const starsGeometry = new THREE.BufferGeometry();
            const starsMaterial = new THREE.PointsMaterial({
                color: 0xffffff,
                size: 0.1,
                transparent: true,
                opacity: 0.8
            });
            
            const starsVertices = [];
            for (let i = 0; i < 1000; i++) {
                const x = (Math.random() - 0.5) * 100;
                const y = (Math.random() - 0.5) * 100;
                const z = (Math.random() - 0.5) * 100;
                starsVertices.push(x, y, z);
            }
            
            starsGeometry.setAttribute('position', new THREE.Float32BufferAttribute(starsVertices, 3));
            const stars = new THREE.Points(starsGeometry, starsMaterial);
            scene.add(stars);
        }
        
        createStars();
        
        // Lighting
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.3);
        scene.add(ambientLight);
        
        const directionalLight = new THREE.DirectionalLight(0x00b8ff, 1);
        directionalLight.position.set(1, 1, 1);
        scene.add(directionalLight);
        
        const purpleLight = new THREE.PointLight(0x7d00ff, 1.5, 10);
        purpleLight.position.set(-2, 1, 3);
        scene.add(purpleLight);
        
        // Ball objects
        let activeBall;
        
        // Ball geometries and materials
        const footballGeometry = new THREE.SphereGeometry(1, 32, 32);
        const footballMaterial = new THREE.MeshStandardMaterial({
            color: 0xffffff,
            roughness: 0.4,
            metalness: 0.1
        });
        
        const basketballGeometry = new THREE.SphereGeometry(1, 32, 32);
        const basketballMaterial = new THREE.MeshStandardMaterial({
            color: 0xe65c00,
            roughness: 0.7,
            metalness: 0.1
        });
        
        const tennisGeometry = new THREE.SphereGeometry(0.7, 32, 32);
        const tennisMaterial = new THREE.MeshStandardMaterial({
            color: 0xccff00,
            roughness: 0.8,
            metalness: 0
        });
        
        // Create balls
        const football = new THREE.Mesh(footballGeometry, footballMaterial);
        scene.add(football);
        
        const basketball = new THREE.Mesh(basketballGeometry, basketballMaterial);
        basketball.visible = false;
        scene.add(basketball);
        
        const tennis = new THREE.Mesh(tennisGeometry, tennisMaterial);
        tennis.visible = false;
        scene.add(tennis);
        
        // Football pattern (lines)
        const createFootballPattern = () => {
            // Create pentagons and hexagons for football
            const lineGeometry = new THREE.EdgesGeometry(new THREE.IcosahedronGeometry(1.01, 1));
            const lineMaterial = new THREE.LineBasicMaterial({ color: 0x000000, linewidth: 2 });
            const lines = new THREE.LineSegments(lineGeometry, lineMaterial);
            football.add(lines);
        };
        
        createFootballPattern();
        
        // Basketball pattern (lines)
        const createBasketballPattern = () => {
            // Horizontal lines
            for (let i = -0.8; i <= 0.8; i += 0.4) {
                const curve = new THREE.EllipseCurve(
                    0, 0,                // center
                    1, 1,                // x radius, y radius
                    0, 2 * Math.PI,      // start angle, end angle
                    false,               // clockwise
                    0                    // rotation
                );
                
                const points = curve.getPoints(50);
                const geometry = new THREE.BufferGeometry().setFromPoints(points);
                const material = new THREE.LineBasicMaterial({ color: 0x000000 });
                const ellipse = new THREE.Line(geometry, material);
                ellipse.rotation.x = Math.PI / 2;
                ellipse.position.y = i;
                basketball.add(ellipse);
            }
            
            // Vertical lines
            for (let i = 0; i < 2; i++) {
                const curve = new THREE.EllipseCurve(
                    0, 0,
                    1, 1,
                    0, 2 * Math.PI,
                    false,
                    0
                );
                
                const points = curve.getPoints(50);
                const geometry = new THREE.BufferGeometry().setFromPoints(points);
                const material = new THREE.LineBasicMaterial({ color: 0x000000 });
                const ellipse = new THREE.Line(geometry, material);
                ellipse.rotation.y = i * Math.PI / 2;
                basketball.add(ellipse);
            }
        };
        
        createBasketballPattern();
        
        // Tennis pattern (lines)
        const createTennisPattern = () => {
            // Tennis ball curve
            const curve = new THREE.CurvePath();
            
            const radius = 0.7;
            const startAngle = 0;
            const endAngle = Math.PI * 2;
            const curve1 = new THREE.EllipseCurve(
                0, 0,
                radius, radius,
                startAngle, endAngle,
                false,
                0
            );
            
            const points = curve1.getPoints(50);
            const geometry = new THREE.BufferGeometry().setFromPoints(points);
            const material = new THREE.LineBasicMaterial({ color: 0xffffff });
            
            const tennisLine1 = new THREE.Line(geometry, material);
            tennisLine1.rotation.x = Math.PI / 2;
            tennisLine1.rotation.y = Math.PI / 4;
            tennis.add(tennisLine1);
            
            const tennisLine2 = new THREE.Line(geometry, material);
            tennisLine2.rotation.x = Math.PI / 2;
            tennisLine2.rotation.y = -Math.PI / 4;
            tennis.add(tennisLine2);
        };
        
        createTennisPattern();
        
        // Set active ball and animation properties
        let ballVelocity = new THREE.Vector3(0.03, 0.05, 0.04);
        let gravity = new THREE.Vector3(0, -0.001, 0);
        let bounceDecay = 0.7;
        let bounds = {
            xMin: -10, xMax: 10,
            yMin: -5, yMax: 5,
            zMin: -10, zMax: 10
        };
        
        function switchSport(sport) {
            // Reset positions
            football.position.set(0, 0, 0);
            basketball.position.set(0, 0, 0);
            tennis.position.set(0, 0, 0);
            
            // Reset velocity for smoother transition
            ballVelocity = new THREE.Vector3(0.03, 0.05, 0.04);
            
            // Hide all balls
            football.visible = false;
            basketball.visible = false;
            tennis.visible = false;
            
            // Show selected ball
            switch(sport) {
                case 'football':
                    activeBall = football;
                    football.visible = true;
                    bounceDecay = 0.7;
                    break;
                case 'basketball':
                    activeBall = basketball;
                    basketball.visible = true;
                    bounceDecay = 0.85;
                    break;
                case 'tennis':
                    activeBall = tennis;
                    tennis.visible = true;
                    bounceDecay = 0.9;
                    break;
            }
            
            // Update active button
            document.querySelectorAll('.sport-btn').forEach(btn => {
                btn.classList.remove('active');
                if (btn.dataset.sport === sport) {
                    btn.classList.add('active');
                }
            });
        }
        
        // Set default ball
        switchSport('football');
        
        // Animation
        function animate() {
            requestAnimationFrame(animate);
            
            // Apply gravity and update position
            ballVelocity.add(gravity);
            activeBall.position.add(ballVelocity);
            
            // Rotate the ball
            activeBall.rotation.x += 0.01;
            activeBall.rotation.y += 0.01;
            
            // Bounce off the "walls"
            if (activeBall.position.x < bounds.xMin || activeBall.position.x > bounds.xMax) {
                ballVelocity.x *= -bounceDecay;
                activeBall.position.x = activeBall.position.x < bounds.xMin ? bounds.xMin : bounds.xMax;
            }
            
            if (activeBall.position.y < bounds.yMin || activeBall.position.y > bounds.yMax) {
                ballVelocity.y *= -bounceDecay;
                activeBall.position.y = activeBall.position.y < bounds.yMin ? bounds.yMin : bounds.yMax;
            }
            
            if (activeBall.position.z < bounds.zMin || activeBall.position.z > bounds.zMax) {
                ballVelocity.z *= -bounceDecay;
                activeBall.position.z = activeBall.position.z < bounds.zMin ? bounds.zMin : bounds.zMax;
            }
            
            renderer.render(scene, camera);
        }
        
        // Handle window resize
        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });
        
        // Sport selection buttons
        document.querySelectorAll('.sport-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                switchSport(btn.dataset.sport);
            });
        });
        
        // Start animation
        animate();
    </script>
</body>
</html>