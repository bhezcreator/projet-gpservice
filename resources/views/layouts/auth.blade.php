<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('assets/css/line-awesome.min.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARH - @yield('title')</title>
    <style>
        :root {
            --bg: #0f172a;
            --card: #1e293b;
            --text: #fff;
            --primary: #007bff;
            --secondary: #4fc3f7;
            --border: #007bff69;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;}
        body { min-height: 100vh; display: flex; justify-content: center; align-items: center; background-color: var(--bg); color: var(--text); transition: background 0.5s ease, color 0.5s ease;}
        .container { text-align: center; background-color: var(--card); padding: 3rem 2rem; border-radius: 16px; box-shadow: 0 8px 30px rgba(0,0,0,0.1); max-width: 400px; width: 90%; }
        h1 { font-size: 2rem; margin-bottom: 2rem; background: linear-gradient(90deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;}
        form { display: flex; flex-direction: column; gap: 1rem; }
        input { padding: 0.8rem; border-radius: 8px; border: 1px solid var(--border); background: #111827; color: #fff;outline: none; } 
        button { padding: 0.8rem; border: none; border-radius: 50px; background: var(--primary); color: #fff; cursor: pointer; transition: 0.3s; }
        button:hover { background: var(--secondary); }
        a { color: var(--secondary); text-decoration: none; font-size: 0.9rem; }
        .error { color: #ff6b6b; font-size: 0.9rem; }

        
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
