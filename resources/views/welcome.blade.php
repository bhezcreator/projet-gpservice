<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('assets/css/line-awesome.min.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPSERVICE - Accueil</title>
    <style>
        :root {
            --bg: #0f172a;
            --card: #1e293b;
            --text: #fff;
            --primary: #007bff;
            --secondary: #4fc3f7;
            --border: #6b6b6b;
        }

        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
          min-height: 100vh;
          display: flex;
          justify-content: center;
          align-items: center;
          color: var(--text);
          position: relative;
          overflow: hidden;

          background: linear-gradient(
            -45deg,
            #0f172a,
            #111c33,
            #0b1220,
            #1e293b
          );
          background-size: 400% 400%;
          animation: gradientBG 15s ease infinite;
        }

        /* Animation du fond principal */
        @keyframes gradientBG {
          0% {
            background-position: 0% 50%;
          }
          50% {
            background-position: 100% 50%;
          }
          100% {
            background-position: 0% 50%;
          }
        }

        /* Couche de lumière flottante */
        body::before {
          content: "";
          position: absolute;
          width: 600px;
          height: 600px;
          background: radial-gradient(
            circle,
            rgba(79, 195, 247, 0.25),
            transparent 60%
          );
          top: -200px;
          left: -200px;
          animation: floatLight 12s ease-in-out infinite;
          filter: blur(40px);
        }

        /* Deuxième lumière */
        body::after {
          content: "";
          position: absolute;
          width: 500px;
          height: 500px;
          background: radial-gradient(
            circle,
            rgba(0, 123, 255, 0.18),
            transparent 60%
          );
          bottom: -150px;
          right: -150px;
          animation: floatLight2 14s ease-in-out infinite;
          filter: blur(50px);
        }

        /* Animations des lumières */
        @keyframes floatLight {
          0% { transform: translate(0, 0); }
          50% { transform: translate(120px, 80px); }
          100% { transform: translate(0, 0); }
        }

        @keyframes floatLight2 {
          0% { transform: translate(0, 0); }
          50% { transform: translate(-100px, -60px); }
          100% { transform: translate(0, 0); }
        }

        #loader.body {
        background: var(--bg);
        color: var(--text);
        overflow: hidden;
        }

        /* Loader overlay */
        #loader {
        position: fixed;
        top: 0; left: 0;
        width: 100vw;
        height: 100vh;
        background: var(--bg);
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        z-index: 9999;
        transition: opacity 0.5s ease;
        }

        /* Spinner animation */
        .spinner {
        border: 6px solid var(--secondary);
        border-top: 6px solid var(--primary);
        border-radius: 50%;
        width: 60px;
        height: 60px;
        animation: spin 1s linear infinite;
        margin-bottom: 1rem;
        }

        @keyframes spin {
        0% { transform: rotate(0deg);}
        100% { transform: rotate(360deg);}
        }

        .loader-text {
        font-size: 1.2rem;
        font-weight: bold;
        color: white;
        animation: fadeIn 1s ease-in-out infinite alternate;
        }

        @keyframes fadeIn {
        0% { opacity: 0.3; }
        100% { opacity: 1; }
        }

        /* Contenu de la page (masqué au départ) */
        #content {
        opacity: 0;
        transition: opacity 0.5s ease;
        }

        .container {
        text-align: center;
        background-color: var(--card);
        padding: 4rem 2rem;
        border-radius: 16px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.1);
        max-width: 450px;
        width: 90%;
        opacity: 0;
        transform: translateY(50px);
        animation: fadeInUp 1s forwards;
        }

        @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
        }

        h1 {
        font-size: 2.2rem;
        margin-bottom: 2rem;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: textPop 1s forwards;
        }

        @keyframes textPop {
        0% { transform: scale(0.8); opacity: 0; }
        100% { transform: scale(1); opacity: 1; }
        }

        .btn-login {
        display: inline-block;
        background: var(--primary);
        color: #fff;
        padding: 0.8rem 2rem;
        border: none;
        border-radius: 50px;
        font-size: 1.1rem;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        animation: btnPop 1.2s forwards;
        }

        .btn-login:hover {
        background: var(--secondary);
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        @keyframes btnPop {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
        }

        /* Responsive */
        @media (max-width: 480px) {
        h1 {
            font-size: 1.8rem;
        }
        .btn-login {
            padding: 0.7rem 1.5rem;
            font-size: 1rem;
        }
        }

    </style>
</head>

<body>
    <!-- Loader -->
    <div id="loader">
        <div class="spinner"></div>
        <div class="loader-text">Chargement...</div>
        <i class="la la-rocket la-2x" style="margin-top: 1rem; color: var(--primary); animation: bounce 1s infinite;"></i>
    </div>

    <div class="container">
        <h1>GP-SERVICES</h1>
        <a href="/login" class="btn-login">SE CONNECTER<i class="las la-angle-right"></i></a>
    </div>

    <script>
    // Loading page 
        // Animation bounce pour l'icône
        const style = document.createElement('style');
        style.innerHTML = `
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }
        `;
        document.head.appendChild(style);

        // Simulation de chargement (remplacer avec ton vrai chargement)
        window.addEventListener('load', () => {
        setTimeout(() => {
            const loader = document.getElementById('loader');
            const content = document.getElementById('content');
            loader.style.opacity = '0';
            setTimeout(() => loader.style.display = 'none', 500);
            content.style.opacity = '1';
        }, 1500); // 1.5s de loader
        });
    </script>
</body>
</html>
