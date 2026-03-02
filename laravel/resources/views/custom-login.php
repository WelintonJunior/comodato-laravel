<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Login') ?></title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #3b82f6;
            --primary-hover: #2563eb;
            --secondary-color: #64748b;
            --background-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--background-gradient);
            padding: 20px;
        }
        
        .login-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 420px;
            overflow: hidden;
        }
        
        .login-header {
            background: linear-gradient(135deg, var(--primary-color), #8b5cf6);
            color: white;
            padding: 32px 24px;
            text-align: center;
        }
        
        .login-body {
            padding: 32px 24px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .input-group {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--secondary-color);
            z-index: 10;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 16px 12px 44px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #f8fafc;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            background: white;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .btn-login {
            width: 100%;
            padding: 14px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .btn-login:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
        }
        
        .alert-error {
            background: #fee2e2;
            border: 1px solid #fecaca;
            color: #dc2626;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .logo {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 32px;
        }
        
        .system-name {
            font-size: 18px;
            color: #6b7280;
            text-align: center;
            margin-top: 15px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="logo">
                    <i class="fas fa-lock"></i>
                </div>
                <h1 style="font-size: 28px; margin-bottom: 8px;">Sistema</h1>
                <p style="opacity: 0.9;">Autenticação de Usuário</p>
            </div>
            
            <div class="login-body">
                <?php if(session('error') || isset($errors) && $errors->any()): ?>
                    <div class="alert-error">
                        <i class="fas fa-exclamation-circle"></i>
                        <span><?= session('error') ?? $errors->first() ?></span>
                    </div>
                <?php endif; ?>
                
                <?php if(session('success')): ?>
                    <div class="alert-success" style="background: #d1fae5; border: 1px solid #a7f3d0; color: #065f46; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
                        <i class="fas fa-check-circle"></i>
                        <span><?= session('success') ?></span>
                    </div>
                <?php endif; ?>
                
                <form method="POST" action="<?= route('custom.login.submit') ?>">
                    <?= csrf_field() ?>
                    
                    <div class="form-group">
                        <label for="login" style="display: block; margin-bottom: 8px; color: #334155; font-weight: 500;">
                            Usuário
                        </label>
                        <div class="input-group">
                            <div class="input-icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <input 
                                type="text" 
                                id="login" 
                                name="login" 
                                class="form-control" 
                                placeholder="Digite seu usuário"
                                value="<?= old('login') ?>"
                                required
                                autofocus
                                autocomplete="username"
                            >
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="password" style="display: block; margin-bottom: 8px; color: #334155; font-weight: 500;">
                            Senha
                        </label>
                        <div class="input-group">
                            <div class="input-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                class="form-control" 
                                placeholder="Digite sua senha"
                                required
                                autocomplete="current-password"
                            >
                            <button 
                                type="button" 
                                onclick="togglePassword()"
                                style="position: absolute; right: 14px; top: 50%; transform: translateY(-50%); background: none; border: none; color: var(--secondary-color); cursor: pointer;"
                            >
                                <i class="fas fa-eye" id="eye-icon"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div style="margin: 20px 0; display: flex; align-items: center;">
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; color: var(--secondary-color);">
                            <input type="checkbox" name="remember" id="remember" <?= old('remember') ? 'checked' : '' ?>>
                            <span>Manter conectado</span>
                        </label>
                    </div>
                    
                    <button type="submit" class="btn-login">
                        <i class="fas fa-sign-in-alt"></i>
                        Entrar no Sistema
                    </button>
                    
                    <div class="system-name">
                        Versão 1.0
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
        
        // Foco automático no campo de login
        document.getElementById('login').focus();
        
        // Prevenir reenvio do formulário
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
        
        // Submeter formulário com Enter
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Enter' && 
                (document.activeElement.id === 'login' || 
                 document.activeElement.id === 'password')) {
                event.preventDefault();
                document.querySelector('form').submit();
            }
        });
        
        // Limpar mensagens de erro após 5 segundos
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert-error, .alert-success');
            alerts.forEach(alert => {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);
    </script>
</body>
</html>