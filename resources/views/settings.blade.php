<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Tracking System - Settings</title>
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
        
        /* Header */
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
            transform: translateX(-4px);
        }
        
        .page-info h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-primary);
        }
        
        .breadcrumbs {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin-top: 0.25rem;
        }
        
        .breadcrumbs a {
            color: var(--primary-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .breadcrumbs a:hover {
            color: var(--primary-hover);
            text-decoration: underline;
        }
        
        /* Theme Toggle */
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
        
        /* Main Content */
        .main-content {
            padding: 2.5rem 0;
        }
        
        .content-wrapper {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 2.5rem;
        }
        
        /* Sidebar */
        .sidebar {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
            height: fit-content;
            position: sticky;
            top: 120px;
        }
        
        .sidebar-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1.5rem;
            padding-bottom: 1.25rem;
            border-bottom: 2px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .sidebar-title .material-icons {
            font-size: 28px;
            color: var(--primary-color);
        }
        
        .sidebar-nav {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .nav-item {
            display: flex;
            align-items: center;
            gap: 0.875rem;
            padding: 1rem 1.25rem;
            border-radius: 14px;
            color: var(--text-secondary);
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.95rem;
            font-weight: 500;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }
        
        .nav-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: var(--primary-color);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }
        
        .nav-item:hover {
            background: var(--bg-secondary);
            color: var(--text-primary);
            transform: translateX(4px);
        }
        
        .nav-item.active {
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.12), rgba(59, 130, 246, 0.12));
            color: var(--primary-color);
            font-weight: 600;
            border-color: rgba(37, 99, 235, 0.2);
        }
        
        .nav-item.active::before {
            transform: scaleY(1);
        }
        
        .nav-item .material-icons {
            font-size: 24px;
        }
        
        /* Settings Content */
        .settings-content {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }
        
        .settings-section {
            display: none;
            animation: fadeIn 0.4s ease;
        }
        
        .settings-section.active {
            display: block;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .section-header {
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid var(--border-color);
        }
        
        .section-title {
            display: flex;
            align-items: center;
            gap: 0.875rem;
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-primary);
        }
        
        .section-title .material-icons {
            font-size: 36px;
            color: var(--primary-color);
        }
        
        /* Cards */
        .settings-card {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
            margin-bottom: 2rem;
            transition: all 0.3s ease;
        }
        
        .settings-card:hover {
            box-shadow: 0 15px 30px -5px rgba(0, 0, 0, 0.12);
        }
        
        .card-title {
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1.75rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .card-title .material-icons {
            font-size: 28px;
            color: var(--primary-color);
        }
        
        /* Backup Cards Grid */
        .backup-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
            gap: 2rem;
        }
        
        .backup-card {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            min-height: 400px;
        }
        
        .backup-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--info-color));
        }
        
        .backup-card:nth-child(2)::before {
            background: linear-gradient(90deg, var(--success-color), #059669);
        }
        
        .backup-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.15);
        }
        
        .backup-card-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 40px;
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.15), rgba(59, 130, 246, 0.15));
            color: var(--primary-color);
        }
        
        .backup-card:nth-child(2) .backup-card-icon {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.15), rgba(5, 150, 105, 0.15));
            color: var(--success-color);
        }
        
        .backup-card-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1rem;
            text-align: center;
        }
        
        .backup-card-description {
            font-size: 0.95rem;
            color: var(--text-secondary);
            line-height: 1.6;
            text-align: center;
            margin-bottom: 2rem;
            flex: 1;
        }
        
        /* File Input Wrapper */
        .file-input-wrapper {
            width: 100%;
            margin-bottom: 1.5rem;
        }
        
        .file-input-label {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2.5rem 1.5rem;
            border: 2px dashed var(--border-color);
            border-radius: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: var(--bg-secondary);
            position: relative;
        }
        
        .file-input-label:hover {
            border-color: var(--primary-color);
            background: rgba(37, 99, 235, 0.05);
        }
        
        .file-input-label.dragover {
            border-color: var(--primary-color);
            background: rgba(37, 99, 235, 0.08);
            transform: scale(1.02);
        }
        
        .file-input-label input[type="file"] {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }
        
        .file-input-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            pointer-events: none;
        }
        
        .file-input-icon {
            font-size: 48px;
            color: var(--text-secondary);
            transition: all 0.3s ease;
        }
        
        .file-input-label:hover .file-input-icon {
            color: var(--primary-color);
            transform: translateY(-4px);
        }
        
        .file-input-text {
            font-size: 1rem;
            color: var(--text-secondary);
            font-weight: 500;
        }
        
        .file-input-hint {
            font-size: 0.85rem;
            color: var(--text-secondary);
            opacity: 0.7;
        }
        
        /* File Name Display */
        .file-name-display {
            display: none;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 1.25rem;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(5, 150, 105, 0.1));
            border: 1px solid var(--success-color);
            border-radius: 12px;
            margin-top: 1rem;
        }
        
        .file-name-display.active {
            display: flex;
        }
        
        .file-name-display .material-icons {
            color: var(--success-color);
            font-size: 24px;
        }
        
        .file-name-text {
            flex: 1;
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text-primary);
            word-break: break-all;
        }
        
        .remove-file-btn {
            background: none;
            border: none;
            color: var(--danger-color);
            cursor: pointer;
            padding: 0.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            border-radius: 4px;
        }
        
        .remove-file-btn:hover {
            background: rgba(239, 68, 68, 0.1);
            transform: rotate(90deg);
        }
        
        /* Buttons */
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
            gap: 0.625rem;
            border: none;
            width: 100%;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--info-color));
            color: white;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.35);
        }
        
        .btn-success {
            background: linear-gradient(135deg, var(--success-color), #059669);
            color: white;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.25);
        }
        
        .btn-success:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(16, 185, 129, 0.35);
        }
        
        .btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none !important;
        }
        
        /* Password Form */
        .password-form {
            max-width: 650px;
        }
        
        .form-group {
            margin-bottom: 1.75rem;
        }
        
        .form-label {
            display: block;
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.625rem;
        }
        
        .form-input {
            width: 100%;
            padding: 0.875rem 1.125rem;
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
            transform: translateY(-1px);
        }
        
        .password-field {
            position: relative;
        }
        
        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 42px;
            background: none;
            border: none;
            color: var(--text-secondary);
            cursor: pointer;
            padding: 0;
            transition: color 0.3s ease;
        }
        
        .password-toggle:hover {
            color: var(--primary-color);
        }
        
        .password-strength {
            margin-top: 0.75rem;
        }
        
        .strength-bar {
            height: 6px;
            background: var(--border-color);
            border-radius: 3px;
            overflow: hidden;
            margin-bottom: 0.625rem;
        }
        
        .strength-fill {
            height: 100%;
            transition: all 0.3s ease;
            width: 0%;
            border-radius: 3px;
        }
        
        .strength-fill.weak {
            width: 33%;
            background: linear-gradient(90deg, var(--danger-color), #f87171);
        }
        
        .strength-fill.medium {
            width: 66%;
            background: linear-gradient(90deg, var(--warning-color), #fbbf24);
        }
        
        .strength-fill.strong {
            width: 100%;
            background: linear-gradient(90deg, var(--success-color), #34d399);
        }
        
        .strength-text {
            font-size: 0.875rem;
            color: var(--text-secondary);
            font-weight: 500;
        }
        
        .strength-text.weak {
            color: var(--danger-color);
        }
        
        .strength-text.medium {
            color: var(--warning-color);
        }
        
        .strength-text.strong {
            color: var(--success-color);
        }
        
        .requirements {
            background: linear-gradient(135deg, var(--bg-secondary), var(--bg-tertiary));
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border: 1px solid var(--border-color);
        }
        
        .requirements-title {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1rem;
        }
        
        .requirement {
            display: flex;
            align-items: center;
            gap: 0.625rem;
            font-size: 0.9rem;
            color: var(--text-secondary);
            margin-bottom: 0.625rem;
            transition: all 0.3s ease;
        }
        
        .requirement.met {
            color: var(--success-color);
        }
        
        .requirement .material-icons {
            font-size: 20px;
        }
        
        /* Security Settings */
        .security-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.25rem 1.5rem;
            background: linear-gradient(135deg, var(--bg-secondary), var(--bg-tertiary));
            border-radius: 16px;
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            margin-bottom: 1.25rem;
        }
        
        .security-item:last-child {
            margin-bottom: 0;
        }
        
        .security-item:hover {
            border-color: var(--primary-color);
            transform: translateX(4px);
        }
        
        .security-label {
            font-weight: 600;
            margin-bottom: 0.375rem;
            color: var(--text-primary);
        }
        
        .security-description {
            font-size: 0.875rem;
            color: var(--text-secondary);
        }
        
        /* Responsive */
        @media (max-width: 1024px) {
            .content-wrapper {
                grid-template-columns: 1fr;
            }
            
            .sidebar {
                position: static;
                order: -1;
            }
            
            .sidebar-nav {
                flex-direction: row;
                overflow-x: auto;
                gap: 0.75rem;
                padding-bottom: 0.5rem;
            }
            
            .nav-item {
                white-space: nowrap;
                flex-shrink: 0;
            }
        }
        
        @media (max-width: 768px) {
            .backup-cards {
                grid-template-columns: 1fr;
            }
            
            .backup-card {
                min-height: auto;
            }
            
            .btn {
                width: 100%;
            }
        }
        .rotating {
            animation: rotate 2s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>

    <link href="{{ asset('style.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="header-left">
                    <a href="{{ route('dashboard') }}" style="text-decoration: none;" class="back-btn">
                        <i class="material-icons">arrow_back</i>
                    </a>
                    <div class="page-info">
                        <h1>Settings</h1>
                        <div class="breadcrumbs">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                            <span>/</span>
                            <span>Settings</span>
                        </div>
                    </div>
                </div>
                
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
        </div>
    </header>
    
    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="content-wrapper">
                <!-- Sidebar -->
                <aside class="sidebar">
                    <h3 class="sidebar-title">
                        <i class="material-icons">settings</i>
                        Settings
                    </h3>
                    <nav class="sidebar-nav">
                        <div class="nav-item active" onclick="showSection('database', this)">
                            <i class="material-icons">storage</i>
                            <span>Database Backup</span>
                        </div>
                        <div class="nav-item" onclick="showSection('security', this)">
                            <i class="material-icons">security</i>
                            <span>Security</span>
                        </div>
                       
                    </nav>
                </aside>
                
                <!-- Settings Content -->
                <div class="settings-content">
                    <!-- Database Backup Section -->
                    <div class="settings-section active" id="database-section">
                        <div class="section-header">
                            <h2 class="section-title">
                                <i class="material-icons">storage</i>
                                Database Backup & Restore
                            </h2>
                        </div>
                        
                        <div class="backup-cards">
                            <!-- Download Backup Card -->
                            <div class="backup-card">
                                <div class="backup-card-icon">
                                    <i class="material-icons">cloud_download</i>
                                </div>
                                <h3 class="backup-card-title">Download Backup</h3>
                                <p class="backup-card-description">
                                    Download a complete backup of your database including all files, records, and system configurations.
                                </p>
                                <button class="btn btn-primary" onclick="downloadBackup()">
                                    <i class="material-icons">download</i>
                                    Download Backup
                                </button>
                            </div>
                            
                            <!-- Upload Backup Card -->
                            <div class="backup-card">
                                <div class="backup-card-icon">
                                    <i class="material-icons">cloud_upload</i>
                                </div>
                                <h3 class="backup-card-title">Upload Backup</h3>
                                <p class="backup-card-description">
                                    Restore your database from a backup file. This will replace all current data with the backup data.
                                </p>
                                <div class="file-input-wrapper">
                                    <label class="file-input-label" id="fileLabel">
                                        <input type="file" id="backupFile" accept=".sql,.zip,.backup" onchange="handleFileSelect(this)">
                                        <div class="file-input-content">
                                            <i class="material-icons file-input-icon">folder_open</i>
                                            <span class="file-input-text">Click to select backup file</span>
                                            <span class="file-input-hint">Supported: .sql, .zip, .backup</span>
                                        </div>
                                    </label>
                                    <div class="file-name-display" id="fileNameDisplay">
                                        <i class="material-icons">description</i>
                                        <span class="file-name-text" id="fileNameText"></span>
                                        <button class="remove-file-btn" onclick="removeFile()">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </div>
                                </div>
                                <button class="btn btn-success" id="uploadBtn" onclick="uploadBackup()" disabled>
                                    <i class="material-icons">upload</i>
                                    Upload & Restore
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Security Section -->
                    <div class="settings-section" id="security-section">
                        <div class="section-header">
                            <h2 class="section-title">
                                <i class="material-icons">security</i>
                                Security & Password
                            </h2>
                        </div>
                        
                        <!-- Change Password -->
                        <div class="settings-card">
                            <h3 class="card-title">
                                <i class="material-icons">lock</i>
                                Change Password
                            </h3>
                            <form class="password-form" method="POST" action="{{ route('settings.password') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Current Password</label>
                                    <input type="password" name="current_password" class="form-input" placeholder="Enter current password" required>
                                </div>
                                
                                <div class="form-group password-field">
                                    <label class="form-label">New Password</label>
                                    <input type="password" name="new_password" class="form-input" placeholder="Enter new password" id="newPassword" oninput="checkPasswordStrength()" required>
                                    <button type="button" class="password-toggle" onclick="togglePassword('newPassword')">
                                        <i class="material-icons">visibility</i>
                                    </button>
                                    <div class="password-strength">
                                        <div class="strength-bar">
                                            <div class="strength-fill" id="strengthFill"></div>
                                        </div>
                                        <span class="strength-text" id="strengthText">Password strength</span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Confirm New Password</label>
                                    <input type="password" name="new_password_confirmation" class="form-input" placeholder="Confirm new password" id="confirmNewPassword" oninput="checkPasswordMatch()" required>
                                </div>
                                
                                <div class="requirements">
                                    <div class="requirements-title">Password Requirements</div>
                                    <div class="requirement" id="req-length">
                                        <i class="material-icons">check_circle_outline</i>
                                        <span>Minimum 8 characters</span>
                                    </div>
                                    <div class="requirement" id="req-upper">
                                        <i class="material-icons">check_circle_outline</i>
                                        <span>At least one uppercase letter</span>
                                    </div>
                                    <div class="requirement" id="req-lower">
                                        <i class="material-icons">check_circle_outline</i>
                                        <span>At least one lowercase letter</span>
                                    </div>
                                    <div class="requirement" id="req-number">
                                        <i class="material-icons">check_circle_outline</i>
                                        <span>At least one number</span>
                                    </div>
                                    <div class="requirement" id="req-special">
                                        <i class="material-icons">check_circle_outline</i>
                                        <span>At least one special character (!@#$%^&*)</span>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary" style="width: auto;" id="updatePasswordBtn" disabled>
                                    <i class="material-icons">update</i>
                                    Update Password
                                </button>
                            </form>
                        </div>
                        
                        <!-- Security Settings -->
                       
                    </div>
                   
                </div>
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
        
        // Show Settings Section
        function showSection(section, element) {
            document.querySelectorAll('.settings-section').forEach(s => s.classList.remove('active'));
            document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
            document.getElementById(section + '-section').classList.add('active');
            element.classList.add('active');
        }
        
        // Download Backup
        function downloadBackup() {
            window.location.href = "{{ route('backups.download') }}";
            showSnackbar('Database backup download initiated.', 'success');
        }
        
        // Handle File Select
        function handleFileSelect(input) {
            const fileNameDisplay = document.getElementById('fileNameDisplay');
            const fileNameText = document.getElementById('fileNameText');
            const uploadBtn = document.getElementById('uploadBtn');
            
            if (input.files && input.files[0]) {
                fileNameText.textContent = input.files[0].name;
                fileNameDisplay.classList.add('active');
                uploadBtn.disabled = false;
            } else {
                fileNameDisplay.classList.remove('active');
                uploadBtn.disabled = true;
            }
        }
        
        // Remove File
        function removeFile() {
            const fileInput = document.getElementById('backupFile');
            const fileNameDisplay = document.getElementById('fileNameDisplay');
            const uploadBtn = document.getElementById('uploadBtn');
            
            fileInput.value = '';
            fileNameDisplay.classList.remove('active');
            uploadBtn.disabled = true;
        }
        
        // Upload Backup
        function uploadBackup() {
            const fileInput = document.getElementById('backupFile');
            if (fileInput.files && fileInput.files[0]) {
                const confirmation = confirm('Warning: This will replace all current data with the backup data. Are you sure you want to continue?');
                if (confirmation) {
                    const formData = new FormData();
                    formData.append('backup_file', fileInput.files[0]);
                    formData.append('_token', '{{ csrf_token() }}');

                    const uploadBtn = document.getElementById('uploadBtn');
                    const originalBtnContent = uploadBtn.innerHTML;
                    uploadBtn.disabled = true;
                    uploadBtn.innerHTML = '<i class="material-icons rotating">sync</i> Restoring...';

                    fetch("{{ route('backups.restore') }}", {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showSnackbar(data.success, 'success');
                            setTimeout(() => {
                                window.location.reload();
                            }, 2000);
                        } else {
                            showSnackbar(data.error || 'Check your internet connection or file format.', 'error');
                            uploadBtn.disabled = false;
                            uploadBtn.innerHTML = originalBtnContent;
                        }
                    })
                    .catch(error => {
                        showSnackbar('An error occurred during restoration.', 'error');
                        uploadBtn.disabled = false;
                        uploadBtn.innerHTML = originalBtnContent;
                    });
                }
            }
        }
        
        // Toggle Password Visibility
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const icon = event.currentTarget.querySelector('.material-icons');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.textContent = 'visibility_off';
            } else {
                input.type = 'password';
                icon.textContent = 'visibility';
            }
        }
        
        // Check Password Strength
        function checkPasswordStrength() {
            const password = document.getElementById('newPassword').value;
            const strengthFill = document.getElementById('strengthFill');
            const strengthText = document.getElementById('strengthText');
            
            const hasLength = password.length >= 8;
            const hasUpper = /[A-Z]/.test(password);
            const hasLower = /[a-z]/.test(password);
            const hasNumber = /[0-9]/.test(password);
            const hasSpecial = /[!@#$%^&*]/.test(password);
            
            updateRequirement('req-length', hasLength);
            updateRequirement('req-upper', hasUpper);
            updateRequirement('req-lower', hasLower);
            updateRequirement('req-number', hasNumber);
            updateRequirement('req-special', hasSpecial);
            
            const requirements = [hasLength, hasUpper, hasLower, hasNumber, hasSpecial];
            const metCount = requirements.filter(r => r).length;
            
            strengthFill.className = 'strength-fill';
            strengthText.className = 'strength-text';
            
            if (password.length === 0) {
                strengthFill.style.width = '0%';
                strengthText.textContent = 'Password strength';
            } else if (metCount <= 2) {
                strengthFill.classList.add('weak');
                strengthText.classList.add('weak');
                strengthText.textContent = 'Weak password';
            } else if (metCount <= 4) {
                strengthFill.classList.add('medium');
                strengthText.classList.add('medium');
                strengthText.textContent = 'Medium strength';
            } else {
                strengthFill.classList.add('strong');
                strengthText.classList.add('strong');
                strengthText.textContent = 'Strong password';
            }
            
            checkFormValidity();
        }
        
        function checkPasswordMatch() {
            checkFormValidity();
        }

        function checkFormValidity() {
            const password = document.getElementById('newPassword').value;
            const confirmPassword = document.getElementById('confirmNewPassword').value;
            const updateBtn = document.getElementById('updatePasswordBtn');
            
            const hasLength = password.length >= 8;
            const hasUpper = /[A-Z]/.test(password);
            const hasLower = /[a-z]/.test(password);
            const hasNumber = /[0-9]/.test(password);
            const hasSpecial = /[!@#$%^&*]/.test(password);
            
            const allMet = hasLength && hasUpper && hasLower && hasNumber && hasSpecial;
            const passwordsMatch = password === confirmPassword && password.length > 0;
            
            updateBtn.disabled = !(allMet && passwordsMatch);
        }
        
        function updateRequirement(id, isMet) {
            const element = document.getElementById(id);
            const icon = element.querySelector('.material-icons');
            
            if (isMet) {
                element.classList.add('met');
                icon.textContent = 'check_circle';
            } else {
                element.classList.remove('met');
                icon.textContent = 'check_circle_outline';
            }
        }
        
        // Drag and drop functionality
        const fileLabel = document.getElementById('fileLabel');
        
        fileLabel.addEventListener('dragover', (e) => {
            e.preventDefault();
            fileLabel.classList.add('dragover');
        });
        
        fileLabel.addEventListener('dragleave', () => {
            fileLabel.classList.remove('dragover');
        });
        
        fileLabel.addEventListener('drop', (e) => {
            e.preventDefault();
            fileLabel.classList.remove('dragover');
            const fileInput = document.getElementById('backupFile');
            fileInput.files = e.dataTransfer.files;
            handleFileSelect(fileInput);
        });
    </script>
</body>
</html>