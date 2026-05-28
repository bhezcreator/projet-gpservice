<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GP-SERVICES - @yield('title')</title>
        <!-- Line Awesome -->
        <link rel="stylesheet" href="{{ asset('assets/css/line-awesome.min.css') }}">
        <style>
                :root {
                    --bg: #0f172a;
                    --card: #1e293b;
                    --text: #fff;
                    --primary: #007bff;
                    --secondary: #4fc3f7;
                    --border: #007bff69;
                }

            body.dark {
            --bg: #0f172a;
            --card: #1e293b;
            --text: #e5e7eb;
            --border: #334155;
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
            background: linear-gradient(135deg, var(--bg), var(--secondary));
            transition: background 0.5s ease, color 0.5s ease;
            color: var(--text);
            text-align: center;
            padding: 2rem;
            }

            .container {
            background-color: var(--card);
            padding: 4rem 3rem;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
            max-width: 500px;
            width: 100%;
            opacity: 0;
            transform: translateY(50px);
            animation: fadeInUp 1s forwards;
            }

            @keyframes fadeInUp {
            to { opacity: 1; transform: translateY(0); }
            }

            .error-code {
            font-size: 6rem;
            font-weight: bold;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
            animation: pop 1s forwards;
            }

            @keyframes pop {
            0% { transform: scale(0.8); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
            }

            .error-message {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            color: var(--text);
            }

            .btn-home {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background-color: var(--primary);
            color: #fff;
            padding: 0.8rem 1.8rem;
            border-radius: 50px;
            text-decoration: none;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
            }

            .btn-home:hover {
            background-color: var(--secondary);
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            }

            /* Dark mode transition */
            body, .container {
            transition: all 0.5s ease;
            }

            /* Responsive */
            @media (max-width: 480px) {
            .error-code { font-size: 4rem; }
            .error-message { font-size: 1.2rem; }
            .btn-home { padding: 0.7rem 1.5rem; font-size: 1rem; }
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
        </style>
    </head>
    <body>
        <!-- Loader -->
        <div id="loader">
            <div class="spinner"></div>
            <div class="loader-text">Chargement...</div>
            <i class="la la-rocket la-2x" style="margin-top: 1rem; color: var(--primary); animation: bounce 1s infinite;"></i>
        </div>

        @yield('content')

        <script>
            // Mode sombre avec Line Awesome toggle (facultatif)
            const toggleDark = document.getElementById('toggleDark');
            if(toggleDark){
            const icon = toggleDark.querySelector('i');
            const toggleDarkMode = () => {
                document.body.classList.toggle('dark');
                document.cookie = `darkMode=${document.body.classList.contains('dark')}; path=/; max-age=31536000`;
                icon.classList.toggle('la-moon');
                icon.classList.toggle('la-sun');
            }
            toggleDark.addEventListener('click', toggleDarkMode);

            const cookies = document.cookie.split('; ').reduce((acc, c) => {
                const [key, val] = c.split('=');
                acc[key] = val;
                return acc;
            }, {});
            if(cookies.darkMode === 'true') document.body.classList.add('dark');
            }
        </script>

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
