<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Tracking System - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-hover: #1d4ed8;
            --secondary-color: #64748b;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --info-color: #3b82f6;
            --accent-color: #8b5cf6;
            --danger-color: #ef4444;
            
            --bg-primary: #ffffff;
            --bg-secondary: #f8fafc;
            --bg-tertiary: #f1f5f9;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --border-color: #e2e8f0;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --card-bg: #ffffff;
        }
        
        [data-theme="dark"] {
            --bg-primary: #0f172a;
            --bg-secondary: #1e293b;
            --bg-tertiary: #334155;
            --text-primary: #f1f5f9;
            --text-secondary: #94a3b8;
            --border-color: #334155;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3), 0 2px 4px -1px rgba(0, 0, 0, 0.2);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.4), 0 4px 6px -2px rgba(0, 0, 0, 0.2);
            --card-bg: #1e293b;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: var(--bg-secondary);
            color: var(--text-primary);
            min-height: 100vh;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        
        .login-container {
            width: 100%;
            max-width: 480px;
            position: relative;
        }
        
        /* Theme Toggle */
        .theme-toggle-wrapper {
            position: absolute;
            top: -60px;
            right: 0;
        }
        
        .theme-toggle {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .toggle-switch {
            position: relative;
            width: 60px;
            height: 32px;
            background: var(--bg-tertiary);
            border-radius: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid var(--border-color);
        }
        
        .toggle-switch.active {
            background: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .toggle-switch::before {
            content: '';
            position: absolute;
            width: 24px;
            height: 24px;
            background: white;
            border-radius: 50%;
            top: 2px;
            left: 2px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        
        .toggle-switch.active::before {
            transform: translateX(28px);
        }
        
        .toggle-icons {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }
        
        .toggle-icons .material-icons {
            font-size: 20px;
            color: var(--text-secondary);
        }
        
        /* Login Card */
        .login-card {
            background: var(--card-bg);
            border-radius: 24px;
            padding: 3rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
            animation: slideUp 0.5s ease;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .logo-section {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .logo-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color), var(--info-color));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin: 0 auto 1.5rem;
            box-shadow: 0 8px 16px rgba(37, 99, 235, 0.3);
        }
        
        .logo-icon .material-icons {
            font-size: 48px;
        }
        
        .logo-text h1 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            letter-spacing: -0.5px;
        }
        
        .logo-text p {
            font-size: 1rem;
            color: var(--text-secondary);
            font-weight: 400;
        }
        
        /* Login Form */
        .login-form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .form-label {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .form-label .material-icons {
            font-size: 18px;
            color: var(--text-secondary);
        }
        
        .input-wrapper {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            font-size: 22px;
            pointer-events: none;
        }
        
        .form-input {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            border: 2px solid var(--border-color);
            border-radius: 12px;
            background: var(--bg-secondary);
            color: var(--text-primary);
            font-size: 1rem;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }
        
        .form-input::placeholder {
            color: var(--text-secondary);
        }
        
        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-secondary);
            cursor: pointer;
            padding: 0.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .password-toggle:hover {
            color: var(--primary-color);
        }
        
        .password-toggle .material-icons {
            font-size: 22px;
        }
        
        .password-input {
            padding-right: 3rem;
        }
        
        /* Options Row */
        .options-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: -0.5rem;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
        }
        
        .checkbox {
            width: 20px;
            height: 20px;
            border: 2px solid var(--border-color);
            border-radius: 6px;
            background: var(--bg-secondary);
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .checkbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }
        
        .checkbox.checked {
            background: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .checkbox.checked::after {
            content: '✓';
            position: absolute;
            color: white;
            font-size: 14px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-weight: bold;
        }
        
        .remember-label {
            font-size: 0.9rem;
            color: var(--text-secondary);
            user-select: none;
        }
        
        .forgot-link {
            font-size: 0.9rem;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .forgot-link:hover {
            color: var(--primary-hover);
            text-decoration: underline;
        }
        
        /* Login Button */
        .login-btn {
            width: 100%;
            padding: 1rem;
            background: var(--primary-color);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            position: relative;
            overflow: hidden;
        }
        
        .login-btn:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(37, 99, 235, 0.3);
        }
        
        .login-btn:active {
            transform: translateY(0);
        }
        
        .login-btn .material-icons {
            font-size: 24px;
        }
        
        .login-btn.loading {
            color: transparent;
        }
        
        .login-btn.loading::after {
            content: '';
            position: absolute;
            width: 24px;
            height: 24px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }
        
        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
        
        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 1.5rem 0;
        }
        
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border-color);
        }
        
        .divider span {
            font-size: 0.9rem;
            color: var(--text-secondary);
            font-weight: 500;
        }
        
        /* Social Login */
        .social-login {
            display: flex;
            gap: 1rem;
        }
        
        .social-btn {
            flex: 1;
            padding: 0.875rem;
            border: 2px solid var(--border-color);
            border-radius: 12px;
            background: transparent;
            color: var(--text-primary);
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        
        .social-btn:hover {
            background: var(--bg-secondary);
            border-color: var(--primary-color);
            transform: translateY(-2px);
        }
        
        .social-btn img {
            width: 20px;
            height: 20px;
        }
        
        /* Sign Up Link */
        .signup-link {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border-color);
        }
        
        .signup-link p {
            font-size: 0.95rem;
            color: var(--text-secondary);
        }
        
        .signup-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .signup-link a:hover {
            color: var(--primary-hover);
            text-decoration: underline;
        }
        
        /* Background Decoration */
        .bg-decoration {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            overflow: hidden;
            z-index: -1;
        }
        
        .circle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
        }
        
        .circle-1 {
            width: 600px;
            height: 600px;
            background: linear-gradient(135deg, var(--primary-color), var(--info-color));
            top: -200px;
            right: -200px;
        }
        
        .circle-2 {
            width: 400px;
            height: 400px;
            background: linear-gradient(135deg, var(--accent-color), var(--success-color));
            bottom: -100px;
            left: -100px;
        }
        
        /* Responsive */
        @media (max-width: 640px) {
            .login-card {
                padding: 2rem 1.5rem;
            }
            
            .logo-icon {
                width: 64px;
                height: 64px;
            }
            
            .logo-icon .material-icons {
                font-size: 36px;
            }
            
            .logo-text h1 {
                font-size: 1.75rem;
            }
            
            .options-row {
                flex-direction: column;
                gap: 0.75rem;
                align-items: flex-start;
            }
            
            .social-login {
                flex-direction: column;
            }
            
            .theme-toggle-wrapper {
                top: -50px;
            }
        }
    </style>
</head>
<body>
    <!-- Background Decoration -->
    <div class="bg-decoration">
        <div class="circle circle-1"></div>
        <div class="circle circle-2"></div>
    </div>
    
    <div class="login-container">
        <!-- Theme Toggle -->
        <div class="theme-toggle-wrapper">
            <div class="theme-toggle">
                <div class="toggle-icons">
                    <i class="material-icons">light_mode</i>
                </div>
                <div class="toggle-switch" id="themeToggle" onclick="toggleTheme()"></div>
                <div class="toggle-icons">
                    <i class="material-icons">dark_mode</i>
                </div>
            </div>
        </div>
        
        <!-- Login Card -->
        <div class="login-card">
            <div class="logo-section">
                <div class="logo-icon">
                    <i class="material-icons">folder_open</i>
                </div>
                <div class="logo-text">
                    <h1>File Tracking System</h1>
                    <p>Sign in to your account</p>
                </div>
            </div>
            
            <form method="POST" action="{{ route('signin') }}" class="login-form" id="loginForm">
                @csrf
                <div class="form-group">
                    <label class="form-label">
                        <i class="material-icons">person</i>
                        Name
                    </label>
                    <div class="input-wrapper">
                        <i class="material-icons input-icon">person</i>
                        <input type="text" name="name" class="form-input" placeholder="Enter your name" value="{{ old('name') }}" required autofocus>
                    </div>
                    @error('name')
                        <p style="color: var(--danger-color); font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label class="form-label">
                        <i class="material-icons">lock</i>
                        Password
                    </label>
                    <div class="input-wrapper">
                        <i class="material-icons input-icon">vpn_key</i>
                        <input type="password" name="password" class="form-input password-input" id="passwordInput" placeholder="Enter your password" required>
                        <button type="button" class="password-toggle" onclick="togglePassword()">
                            <i class="material-icons" id="passwordToggleIcon">visibility_off</i>
                        </button>
                    </div>
                    @error('password')
                        <p style="color: var(--danger-color); font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p>
                    @enderror
                </div>
                
                
                <button type="submit" class="login-btn" id="loginBtn">
                    <span>Login</span>
                    <i class="material-icons">arrow_forward</i>
                </button>
            </form>
            
        </div>
    </div>
    
    <script>
        // Theme Toggle
        function toggleTheme() {
            const html = document.documentElement;
            const toggle = document.getElementById('themeToggle');
            
            if (html.getAttribute('data-theme') === 'light') {
                html.setAttribute('data-theme', 'dark');
                toggle.classList.add('active');
            } else {
                html.setAttribute('data-theme', 'light');
                toggle.classList.remove('active');
            }
        }
        
        // Password Toggle
        function togglePassword() {
            const passwordInput = document.getElementById('passwordInput');
            const toggleIcon = document.getElementById('passwordToggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.textContent = 'visibility';
            } else {
                passwordInput.type = 'password';
                toggleIcon.textContent = 'visibility_off';
            }
        }
        
        // Checkbox Toggle
        function toggleCheckbox() {
            const checkbox = document.getElementById('rememberCheckbox');
            const input = document.getElementById('rememberMe');
            
            input.checked = !input.checked;
            checkbox.classList.toggle('checked', input.checked);
        }
        
        // Handle Login
        function handleLogin(event) {
            event.preventDefault();
            
            const loginBtn = document.getElementById('loginBtn');
            loginBtn.classList.add('loading');
            loginBtn.disabled = true;
            
            // Simulate login process
            setTimeout(() => {
                loginBtn.classList.remove('loading');
                loginBtn.disabled = false;
                alert('Login successful! Redirecting to dashboard...');
                // Here you would typically redirect to the main page
                // window.location.href = 'admin-panel.html';
            }, 2000);
        }
        
        // Initialize checkbox state
        document.getElementById('rememberCheckbox').classList.add('checked');
        document.getElementById('rememberMe').checked = true;
    </script>
</body>
</html>