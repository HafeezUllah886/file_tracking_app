<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Delete - File Tracking System</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-hover: #1d4ed8;
            --secondary-color: #64748b;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --danger-hover: #dc2626;
            --bg-secondary: #f8fafc;
            --bg-tertiary: #f1f5f9;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --border-color: #e2e8f0;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --card-bg: #ffffff;
        }
        
        [data-theme="dark"] {
            --bg-secondary: #1e293b;
            --bg-tertiary: #334155;
            --text-primary: #f1f5f9;
            --text-secondary: #94a3b8;
            --border-color: #334155;
            --card-bg: #1e293b;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-secondary);
            color: var(--text-primary);
            min-height: 100vh;
            transition: all 0.3s ease;
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        .header {
            background: var(--card-bg);
            border-bottom: 1px solid var(--border-color);
            padding: 1.5rem 0;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .header-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .back-btn {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            border: 2px solid var(--border-color);
            background: var(--bg-secondary);
            color: var(--text-primary);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .back-btn:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }
        
        h1 {
            font-size: 1.75rem;
            font-weight: 700;
        }
        
        .breadcrumbs {
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin-top: 0.25rem;
        }
        
        .breadcrumbs a {
            color: var(--primary-color);
            text-decoration: none;
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
        }
        
        .toggle-switch.active::before {
            transform: translateX(28px);
        }
        
        .main-content {
            padding: 3rem 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 100px);
        }
        
        .confirmation-container {
            width: 100%;
            max-width: 600px;
        }
        
        .warning-card {
            background: var(--card-bg);
            border-radius: 24px;
            padding: 3rem;
            box-shadow: var(--shadow-lg);
            border: 2px solid var(--border-color);
            position: relative;
        }
        
        .warning-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--danger-color), var(--danger-hover));
            border-radius: 24px 24px 0 0;
        }
        
        .warning-header {
            display: flex;
            align-items: center;
            gap: 1.25rem;
            margin-bottom: 2rem;
            padding-bottom: 2rem;
            border-bottom: 2px solid var(--border-color);
        }
        
        .warning-icon {
            width: 72px;
            height: 72px;
            border-radius: 18px;
            background: rgba(239, 68, 68, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--danger-color);
            flex-shrink: 0;
        }
        
        .warning-icon .material-icons {
            font-size: 40px;
        }
        
        .warning-title-section h2 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .warning-title-section p {
            font-size: 1rem;
            color: var(--text-secondary);
        }
        
        .alert-box {
            background: rgba(239, 68, 68, 0.05);
            border: 2px solid var(--danger-color);
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            display: flex;
            gap: 1rem;
        }
        
        .alert-icon {
            color: var(--danger-color);
            font-size: 28px;
            flex-shrink: 0;
        }
        
        .alert-content h3 {
            font-size: 1rem;
            font-weight: 700;
            color: var(--danger-color);
            margin-bottom: 0.5rem;
        }
        
        .alert-content p {
            font-size: 0.9rem;
            color: var(--text-secondary);
            line-height: 1.6;
        }
        
        .item-info-card {
            background: var(--bg-secondary);
            border-radius: 16px;
            padding: 1.75rem;
            margin-bottom: 2rem;
            border: 1px solid var(--border-color);
        }
        
        .item-info-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.25rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border-color);
        }
        
        .item-info-header .material-icons {
            font-size: 24px;
            color: var(--primary-color);
        }
        
        .item-info-title {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .item-details {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .detail-label {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-secondary);
        }
        
        .detail-value {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-primary);
        }
        
        .file-id-badge {
            font-family: 'Monaco', monospace;
            font-size: 0.9rem;
            color: var(--primary-color);
            background: rgba(37, 99, 235, 0.1);
            padding: 0.375rem 0.875rem;
            border-radius: 8px;
        }
        
        .password-section {
            margin-bottom: 2.5rem;
        }
        
        .section-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
        }
        
        .password-input-wrapper {
            position: relative;
        }
        
        .form-input {
            width: 100%;
            padding: 1rem 3.5rem 1rem 1.25rem;
            border: 2px solid var(--border-color);
            border-radius: 14px;
            background: var(--bg-secondary);
            color: var(--text-primary);
            font-size: 1rem;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--danger-color);
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
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
            padding: 0;
            transition: color 0.3s ease;
        }
        
        .password-toggle:hover {
            color: var(--danger-color);
        }
        
        .password-hint {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 0.75rem;
            font-size: 0.85rem;
            color: var(--text-secondary);
        }
        
        .action-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        
        .btn {
            padding: 1rem 2rem;
            border-radius: 14px;
            font-size: 1.05rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            border: none;
        }
        
        .btn-secondary {
            background: transparent;
            border: 2px solid var(--border-color);
            color: var(--text-primary);
        }
        
        .btn-secondary:hover {
            background: var(--bg-secondary);
            border-color: var(--text-secondary);
        }
        
        .btn-danger {
            background: linear-gradient(135deg, var(--danger-color), var(--danger-hover));
            color: white;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.25);
        }
        
        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(239, 68, 68, 0.3);
        }
        
        .btn-danger:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none !important;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 0 1rem;
            }
            
            .warning-card {
                padding: 2rem 1.5rem;
            }
            
            .warning-header {
                flex-direction: column;
                text-align: center;
            }
            
            .action-buttons {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="header-left">
                    <a class="back-btn" style="text-decoration:none" href="{{ route('file.tracking', $file->id) }}">
                        <i class="material-icons">arrow_back</i>
                    </a>
                    <div>
                        <h1>Confirm Delete</h1>
                        <div class="breadcrumbs">
                            <a href="{{ route('dashboard') }}">Dashboard</a> / <a href="{{ route('files.index') }}">All Files</a> / Delete Confirmation
                        </div>
                    </div>
                </div>
                
                <div class="theme-toggle">
                    <i class="material-icons" style="font-size: 20px; color: var(--text-secondary);">light_mode</i>
                    <div class="toggle-switch" id="themeToggle" onclick="toggleTheme()"></div>
                    <i class="material-icons" style="font-size: 20px; color: var(--text-secondary);">dark_mode</i>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="confirmation-container">
                <form class="warning-card" method="POST" action="{{ route('files.destroy', $file->id) }}">
                    @csrf
                    @method('DELETE')
                    <!-- Warning Header -->
                    <div class="warning-header">
                        <div class="warning-icon">
                            <i class="material-icons">warning</i>
                        </div>
                        <div class="warning-title-section">
                            <h2>Delete File</h2>
                            <p>You are about to permanently delete this file</p>
                        </div>
                    </div>
                    
                    <!-- Alert Box -->
                    <div class="alert-box">
                        <i class="material-icons alert-icon">error</i>
                        <div class="alert-content">
                            <h3>This action cannot be undone!</h3>
                            <p>Once deleted, this file and all its associated data will be permanently removed from the system.</p>
                        </div>
                    </div>
                    
                    <!-- Item Info -->
                    <div class="item-info-card">
                        <div class="item-info-header">
                            <i class="material-icons">description</i>
                            <span class="item-info-title">File Details</span>
                        </div>
                        <div class="item-details">
                            <div class="detail-row">
                                <span class="detail-label">File Name:</span>
                                <span class="detail-value">{{ $file->patient_name }}</span>
                            </div>
                            <div class="detail-row">
                                <span class="detail-label">File ID:</span>
                                <span class="file-id-badge">{{ $file->file_no }}</span>
                            </div>
                            <div class="detail-row">
                                <span class="detail-label">Patient No:</span>
                                <span class="detail-value">{{ $file->reg_no }}</span>
                            </div>
                            <div class="detail-row">
                                <span class="detail-label">Status:</span>
                                <span class="detail-value" style="color: var(--warning-color);">{{ $file->status }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Password Section -->
                    <div class="password-section">
                        <label class="section-label">
                            <i class="material-icons" style="font-size: 20px; color: var(--text-secondary);">lock</i>
                            Enter your password to confirm deletion
                        </label>
                        <div class="password-input-wrapper">
                            <input type="password" name="password" class="form-input" id="confirmPassword" placeholder="Enter your password" oninput="checkPassword()" required>
                            <button type="button" class="password-toggle" onclick="togglePassword()">
                                <i class="material-icons" id="passwordIcon">visibility</i>
                            </button>
                        </div>
                        <div class="password-hint">
                            <i class="material-icons" style="font-size: 16px;">info</i>
                            <span>Password is required to perform this action</span>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <a href="{{ route('file.tracking', $file->id) }}" class="btn btn-secondary" style="text-decoration:none">
                            <i class="material-icons">cancel</i>
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-danger" id="deleteBtn" disabled>
                            <i class="material-icons">delete_forever</i>
                            Delete Permanently
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    @include('layout.snakebar')

    <script>
        // Trigger flash message after DOM is ready
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                showSnackbar("{{ session('success') }}", 'success');
            @elseif(session('error'))
                showSnackbar("{{ session('error') }}", 'error');
            @endif
        });

        function showSnackbar(message, type) {
            type = type || 'success';
            var sb   = document.getElementById('snackbar');
            var icon = document.getElementById('snackbarIcon');
            if (!sb) return;

            document.getElementById('snackbarMsg').textContent = message;
            sb.className = 'snackbar' + (type === 'error' ? ' error' : '');
            icon.textContent = type === 'error' ? 'error_outline' : 'check_circle';

            sb.classList.add('show');
            setTimeout(function() { sb.classList.remove('show'); }, 4000);
        }
        
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
        
        function togglePassword() {
            const passwordInput = document.getElementById('confirmPassword');
            const passwordIcon = document.getElementById('passwordIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.textContent = 'visibility_off';
            } else {
                passwordInput.type = 'password';
                passwordIcon.textContent = 'visibility';
            }
        }
        
        function checkPassword() {
            const password = document.getElementById('confirmPassword').value;
            const deleteBtn = document.getElementById('deleteBtn');
            
            deleteBtn.disabled = password.length === 0;
        }
    </script>
</body>
</html>