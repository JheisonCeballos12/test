<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>

    <!-- Fuente y estilos rápidos -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1e293b, #0f172a);
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            width: 350px;
            color: white;
        }

        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 0.9rem;
            margin-bottom: 0.3rem;
        }

        input {
            padding: 0.7rem;
            border: none;
            border-radius: 10px;
            margin-bottom: 1rem;
            background: rgba(255, 255, 255, 0.15);
            color: white;
            outline: none;
        }

        input::placeholder {
            color: #cbd5e1;
        }

        button {
            padding: 0.8rem;
            background: #3b82f6;
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #2563eb;
        }

        .error {
            color: #f87171;
            text-align: center;
            margin-bottom: 1rem;
        }

        .footer {
            text-align: center;
            margin-top: 1rem;
            font-size: 0.85rem;
        }

        .footer a {
            color: #93c5fd;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Iniciar Sesión</h2>

        <!-- Muestra errores de validación -->
        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('log-in') }}">
            @csrf

            <label for="email">Correo electrónico</label>
            <input type="email" name="email" id="email" placeholder="Ingresa tu correo" required>

            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" placeholder="Ingresa tu contraseña" required>

            <button type="submit">Entrar</button>
        </form>

        <div class="footer">
            ¿No tienes cuenta? Regístrate</a>
        </div>
    </div>

</body>
</html>
