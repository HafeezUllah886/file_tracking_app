<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Tracking System - Search Results</title>
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
        
        .back-section {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .back-btn {
            width: 48px;
            height: 48px;
            border-radius: 12px;
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
        
        .page-info h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-primary);
            letter-spacing: -0.5px;
        }
        
        .breadcrumbs {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
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
            padding: 2rem 0;
        }
        
        /* Search Bar Section */
        .search-section {
            background: var(--card-bg);
            border-radius: 24px;
            padding: 2rem;
            box-shadow: var(--shadow);
            margin-bottom: 2rem;
            border: 1px solid var(--border-color);
        }
        
        .search-container {
            position: relative;
            max-width: 100%;
        }
        
        .search-input {
            width: 100%;
            padding: 1rem 1.5rem 1rem 3.5rem;
            font-size: 1.125rem;
            border: 2px solid var(--border-color);
            border-radius: 16px;
            background: var(--bg-secondary);
            color: var(--text-primary);
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
        }
        
        .search-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }
        
        .search-input::placeholder {
            color: var(--text-secondary);
        }
        
        .search-icon {
            position: absolute;
            left: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            font-size: 28px;
        }
        
        .search-btn {
            position: absolute;
            right: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
        }
        
        .search-btn:hover {
            background: var(--primary-hover);
            transform: translateY(-50%) scale(1.05);
        }
        
        /* Filters Section */
        .filters-section {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: var(--shadow);
            margin-bottom: 2rem;
            border: 1px solid var(--border-color);
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            align-items: center;
        }
        
        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            flex: 1;
            min-width: 150px;
        }
        
        .filter-label {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .filter-select {
            padding: 0.75rem 2.5rem 0.75rem 1rem;
            border: 2px solid var(--border-color);
            border-radius: 10px;
            background: var(--bg-secondary);
            color: var(--text-primary);
            font-size: 0.95rem;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 18px;
            transition: all 0.3s ease;
        }
        
        .filter-select:focus {
            outline: none;
            border-color: var(--primary-color);
        }
        
        .apply-filters-btn {
            padding: 0.75rem 2rem;
            background: var(--primary-color);
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            white-space: nowrap;
            align-self: flex-end;
        }
        
        .apply-filters-btn:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
        }
        
        /* Results Header */
        .results-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .results-info {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }
        
        .results-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-primary);
        }
        
        .results-count {
            font-size: 0.95rem;
            color: var(--text-secondary);
        }
        
        .results-count strong {
            color: var(--primary-color);
            font-weight: 600;
        }
        
        .view-controls {
            display: flex;
            gap: 0.5rem;
        }
        
        .view-btn {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            border: 2px solid var(--border-color);
            background: var(--bg-secondary);
            color: var(--text-secondary);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .view-btn:hover, .view-btn.active {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }
        
        /* Results Grid */
        .results-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .result-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .result-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--border-color);
        }
        
        .result-card.status-pending::before {
            background: var(--secondary-color);
        }
        
        .result-card.status-typed::before {
            background: var(--warning-color);
        }
        
        .result-card.status-received-back::before {
            background: var(--info-color);
        }
        
        .result-card.status-specialist::before {
            background: var(--accent-color);
        }
        
        .result-card.status-member-i::before {
            background: #0d9488;
        }
        
        .result-card.status-member-ii::before {
            background: #0284c7;
        }
        
        .result-card.status-member-iii::before {
            background: #c026d3;
        }
        
        .result-card.status-commandant::before {
            background: var(--danger-color);
        }
        
        .result-card.status-dispatched::before {
            background: var(--success-color);
        }
        
        .result-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }
        
        .result-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }
        
        .file-id {
            font-family: 'Monaco', 'Courier New', monospace;
            font-weight: 600;
            color: var(--primary-color);
            background: rgba(37, 99, 235, 0.08);
            padding: 0.375rem 0.75rem;
            border-radius: 8px;
            font-size: 0.85rem;
        }
        
        .status-badge {
            padding: 0.375rem 1rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }
        
        .status-pending-badge {
            background: rgba(100, 116, 139, 0.1);
            color: var(--secondary-color);
        }
        
        .status-typed-badge {
            background: rgba(245, 158, 11, 0.1);
            color: var(--warning-color);
        }
        
        .status-received-back-badge {
            background: rgba(59, 130, 246, 0.1);
            color: var(--info-color);
        }
        
        .status-specialist-badge {
            background: rgba(139, 92, 246, 0.1);
            color: var(--accent-color);
        }
        
        .status-member-i-badge {
            background: rgba(13, 148, 136, 0.1);
            color: #0d9488;
        }
        
        .status-member-ii-badge {
            background: rgba(2, 132, 199, 0.1);
            color: #0284c7;
        }
        
        .status-member-iii-badge {
            background: rgba(192, 38, 211, 0.1);
            color: #c026d3;
        }
        
        .status-commandant-badge {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger-color);
        }
        
        .status-dispatched-badge {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success-color);
        }
        
        .result-body {
            margin-bottom: 1rem;
        }
        
        .patient-name {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.75rem;
        }
        
        .result-details {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .detail-row {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            color: var(--text-secondary);
        }
        
        .detail-row .material-icons {
            font-size: 18px;
            color: var(--text-secondary);
        }
        
        .detail-label {
            font-weight: 500;
            min-width: 60px;
        }
        
        .notes-preview {
            margin-top: 0.75rem;
            padding-top: 0.75rem;
            border-top: 1px solid var(--border-color);
            font-size: 0.875rem;
            color: var(--text-secondary);
            font-style: italic;
            line-height: 1.5;
        }
        
        .result-footer {
            display: flex;
            gap: 0.5rem;
            padding-top: 1rem;
            border-top: 1px solid var(--border-color);
        }
        
        .action-btn {
            flex: 1;
            padding: 0.625rem;
            border-radius: 10px;
            border: 1px solid var(--border-color);
            background: var(--bg-secondary);
            color: var(--text-secondary);
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-family: 'Inter', sans-serif;
        }
        
        .action-btn:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }
        
        .action-btn.danger {
            color: var(--danger-color);
        }
        
        .action-btn.danger:hover {
            background: var(--danger-color);
            border-color: var(--danger-color);
            color: white;
        }
        
        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            margin-top: 2rem;
        }
        
        .pagination-btn {
            min-width: 44px;
            height: 44px;
            padding: 0 1rem;
            border-radius: 10px;
            border: 2px solid var(--border-color);
            background: var(--card-bg);
            color: var(--text-primary);
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        
        .pagination-btn:hover:not(:disabled) {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }
        
        .pagination-btn.active {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }
        
        .pagination-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        
        .pagination-info {
            padding: 0 1rem;
            font-size: 0.9rem;
            color: var(--text-secondary);
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
        }
        
        .empty-icon {
            width: 120px;
            height: 120px;
            margin: 0 auto 2rem;
            background: var(--bg-secondary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .empty-icon .material-icons {
            font-size: 64px;
            color: var(--text-secondary);
        }
        
        .empty-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }
        
        .empty-description {
            font-size: 1rem;
            color: var(--text-secondary);
            max-width: 500px;
            margin: 0 auto;
        }
        
        /* Responsive */
        @media (max-width: 1200px) {
            .results-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            }
        }
        
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
            }
            
            .back-section {
                width: 100%;
            }
            
            .results-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
            
            .filters-section {
                flex-direction: column;
                align-items: stretch;
            }
            
            .filter-group {
                width: 100%;
            }
            
            .results-grid {
                grid-template-columns: 1fr;
            }
            
            .pagination {
                flex-wrap: wrap;
            }
        }

         /* Modal */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: var(--overlay-bg);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            padding: 1rem;
            backdrop-filter: blur(8px);
            animation: fadeIn 0.3s ease;
        }
        
        .modal-overlay.active {
            display: flex;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .modal {
            background: var(--card-bg);
            border-radius: 24px;
            width: 100%;
            max-width: 550px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.35);
            animation: slideUp 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        @keyframes slideUp {
            from {
                transform: translateY(30px) scale(0.95);
                opacity: 0;
            }
            to {
                transform: translateY(0) scale(1);
                opacity: 1;
            }
        }
        
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.75rem 2rem;
            border-bottom: 2px solid var(--border-color);
        }
        
        .modal-title {
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .modal-title .material-icons {
            color: var(--primary-color);
            font-size: 28px;
        }
        
        .modal-close {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            border: none;
            background: var(--bg-secondary);
            color: var(--text-secondary);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .modal-close:hover {
            background: var(--danger-color);
            color: white;
            transform: rotate(90deg);
        }
        
        .modal-body {
            padding: 2rem;
        }

          .current-info {
            background: linear-gradient(135deg, var(--bg-secondary), var(--bg-tertiary));
            border-radius: 12px;
            padding: 1.25rem;
            margin-bottom: 1.5rem;
            border: 1px solid var(--border-color);
        }
         .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
        }
        
        .info-row:last-child {
            margin-bottom: 0;
        }
        
        .info-label {
            font-weight: 600;
            color: var(--text-secondary);
            font-size: 0.9rem;
        }
        
        .info-value {
            font-weight: 600;
            color: var(--text-primary);
            font-size: 0.95rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            display: block;
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }
        
        .form-input, .form-select, .form-textarea {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid var(--border-color);
            border-radius: 12px;
            background: var(--bg-secondary);
            color: var(--text-primary);
            font-size: 1rem;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
        }
        
        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }
        
        .form-select {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 20px;
            padding-right: 3rem;
        }
        
        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }
        
        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            padding: 1.5rem 2rem;
            border-top: 2px solid var(--border-color);
            background: var(--bg-secondary);
            border-radius: 0 0 24px 24px;
        }

          .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: none;
        }
        
        .btn-secondary {
            background: transparent;
            border: 2px solid var(--border-color);
            color: var(--text-primary);
        }
        
        .btn-secondary:hover {
            background: var(--bg-secondary);
        }
        
        .btn-primary {
            background: var(--primary-color);
            color: white;
        }
        
        .btn-primary:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
        }
    </style>

    <link href="{{ asset('style.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="back-section">
                    <a class="back-btn" href="{{ route('dashboard') }}" style="text-decoration:none;">
                        <i class="material-icons">arrow_back</i>
                    </a>
                    <div class="page-info">
                        <h1>Search Results</h1>
                        <div class="breadcrumbs">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                            <span>/</span>
                            <span>Search Results for "{{ $query }}"</span>
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
            <!-- Search Section -->
            <section class="search-section">
                <div class="search-container">
                    <form action="{{ route('search') }}" method="GET" class="search-container">
                    <i class="material-icons search-icon">search</i>
                    <input type="text" name="query"  class="search-input" placeholder="Search files by name, ID, patient, or any keyword..." value="{{ $query }}">
                    <button type="submit" class="search-btn">Search</button>
                    </form>
                </div>
            </section>
            
            <!-- Results Header -->
            <div class="results-header">
                <div class="results-info">
                    <h2 class="results-title">Search Results</h2>
                    <p class="results-count">Found <strong>{{$files->count()}}</strong> results for "{{ $query }}"</p>
                </div>
                
                <div class="view-controls">
                    <button class="view-btn active" id="gridView" title="Grid View">
                        <i class="material-icons">grid_view</i>
                    </button>
                    <button class="view-btn" id="listView" title="List View">
                        <i class="material-icons">view_list</i>
                    </button>
                </div>
            </div>
            
            <!-- Results Grid -->
            <div class="results-grid">
                <!-- Result Card 1 -->
                @foreach ($files as $file)
                <div class="result-card status-{{ \Illuminate\Support\Str::slug($file->status) }}">
                    <div class="result-header">
                        <span class="file-id">{{$file->file_no}}</span>
                        <span class="status-badge status-{{ \Illuminate\Support\Str::slug($file->status) }}-badge">{{$file->status}}</span>
                    </div>
                    <div class="result-body">
                        <h3 class="patient-name">{{$file->patient_name}}</h3>
                        <div class="result-details">
                            <div class="detail-row">
                                <i class="material-icons">badge</i>
                                <span class="detail-label">No:</span>
                                <span>{{$file->reg_no}}</span>
                            </div>
                            <div class="detail-row">
                                <i class="material-icons">domain</i>
                                <span class="detail-label">Unit:</span>
                                <span>{{$file->unit}}</span>
                            </div>
                            <div class="detail-row">
                                <i class="material-icons">meeting_room</i>
                                <span class="detail-label">Wing:</span>
                                <span>{{$file->wing}}</span>
                            </div>
                            <div class="detail-row">
                                <i class="material-icons">event</i>
                                <span class="detail-label">Date:</span>
                                <span>{{date('d M Y', strtotime($file->statusLatest()->date))}}</span>
                            </div>
                        </div>
                        <p class="notes-preview">{{$file->statusLatest()->notes}}</p>
                    </div>
                    <div class="result-footer">
                        <a class="action-btn" href="{{ route('file.tracking', $file->id) }}" style="text-decoration:none;">
                            <i class="material-icons">visibility</i>
                        </a>
                        <button class="action-btn">
                            <i class="material-icons" onclick="showStatusModal({{ $file->id }},'{{ $file->file_no }}', '{{ $file->patient_name }}', '{{ $file->status }}')">published_with_changes</i>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
           
           {{--  <div class="pagination">
                <button class="pagination-btn" disabled>
                    <i class="material-icons">chevron_left</i>
                </button>
                <button class="pagination-btn active">1</button>
                <button class="pagination-btn">2</button>
                <button class="pagination-btn">3</button>
                <button class="pagination-btn">4</button>
                <span class="pagination-info">...</span>
                <button class="pagination-btn">8</button>
                <button class="pagination-btn">
                    <i class="material-icons">chevron_right</i>
                </button>
            </div> --}}
        </div>
    </main>
     <div class="modal-overlay" id="statusModal">
        <div class="modal">
            <div class="modal-header">
                <h3 class="modal-title">
                    <i class="material-icons">published_with_changes</i>
                    Change File Status
                </h3>
                <button class="modal-close" onclick="closeStatusModal()">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <form method="post" action="{{ route('file.status') }}">
                @csrf
            <div class="modal-body">
                <div class="current-info">
                    <div class="info-row">
                        <span class="info-label">File ID:</span>
                        <span class="info-value" id="modalFileId">FLT-2026-001</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Patient Name:</span>
                        <span class="info-value" id="modalPatientName">John Smith</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Current Status:</span>
                        <span class="info-value" id="modalCurrentStatus">Typed</span>
                    </div>
                </div>
                <input type="hidden" value="" id="status_id" name="status_id">
                <div class="form-group">
                    <label class="form-label">New Status</label>
                    <select class="form-select" name="status" required id="newStatus">
                        <option value="">Select Status</option>
                        <option value="Pending">Pending</option>
                                <option value="Typed">Typed</option>
                                <option value="Received Back">Received Back</option>
                                <option value="Specialist">Specialist</option>
                                <option value="Member I">Member I</option>
                                <option value="Member II">Member II</option>
                                <option value="Member III">Member III</option>
                                <option value="Commandant">Commandant</option>
                                <option value="Dispatched">Dispatched</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Date</label>
                    <input type="date" value="{{ date('Y-m-d') }}" name="date" class="form-input" id="statusDateTime">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Notes / Comments (Optional)</label>
                    <textarea class="form-textarea" name="notes" placeholder="Add any notes or comments about this status change..." id="statusNotes"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" onclick="closeStatusModal()">Cancel</button>
                <button class="btn btn-primary" type="submit">
                    <i class="material-icons">check_circle</i>
                    Confirm Change
                </button>
            </div>
        </form>
        </div>
    </div>
     @include('layout.snakebar')
   
    
    <script>
         function showStatusModal(id, fileId, patientName, currentStatus) {
            document.getElementById('status_id').value = id;
            document.getElementById('modalFileId').textContent = fileId;
            document.getElementById('modalPatientName').textContent = patientName;
            document.getElementById('modalCurrentStatus').textContent = currentStatus;
            
            
            document.getElementById('statusModal').classList.add('active');
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
        
        // View Toggle
        document.getElementById('gridView').addEventListener('click', function() {
            this.classList.add('active');
            document.getElementById('listView').classList.remove('active');
            document.querySelector('.results-grid').style.gridTemplateColumns = 'repeat(auto-fill, minmax(350px, 1fr))';
        });
        
        document.getElementById('listView').addEventListener('click', function() {
            this.classList.add('active');
            document.getElementById('gridView').classList.remove('active');
            document.querySelector('.results-grid').style.gridTemplateColumns = '1fr';
        });

         function closeStatusModal() {
            document.getElementById('statusModal').classList.remove('active');
            document.getElementById('newStatus').value = '';
            document.getElementById('statusNotes').value = '';
        }
        
        function confirmStatusChange() {
            const newStatus = document.getElementById('newStatus').value;
            
            if (!newStatus) {
                alert('Please select a new status');
                return;
            }
            
            alert('Status changed successfully!');
            closeStatusModal();
            
            // Uncheck all checkboxes after status change
            document.querySelectorAll('.custom-checkbox').forEach(checkbox => {
                checkbox.classList.remove('checked');
            });
            updateBulkActions();
        }
        
        // Close modal on overlay click
        document.getElementById('statusModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeStatusModal();
            }
        });
        
        // Close modal on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeStatusModal();
            }
        });

          function showSnackbar(message, type) {
            type = type || 'success';
            var sb   = document.getElementById('snackbar');
            var icon = document.getElementById('snackbarIcon');
            if (!sb) return;

            // Cancel any running hide timer
            if (_snackbarTimer) {
                clearTimeout(_snackbarTimer);
                _snackbarTimer = null;
            }

            // Reset first so the slide-in transition replays
            sb.classList.remove('show');
            void sb.offsetWidth;

            document.getElementById('snackbarMsg').textContent = message;
            sb.className = 'snackbar' + (type === 'error' ? ' error' : '');
            icon.textContent = type === 'error' ? 'error_outline' : 'check_circle';

            sb.classList.add('show');
            _snackbarTimer = setTimeout(hideSnackbar, 4000);
        }

        
        function hideSnackbar() {
            var sb = document.getElementById('snackbar');
            if (sb) sb.classList.remove('show');
            _snackbarTimer = null;
        }



         // Trigger flash message after DOM is ready
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                showSnackbar("{{ session('success') }}", 'success');
            @elseif(session('error'))
                showSnackbar("{{ session('error') }}", 'error');
            @endif
        });
    </script>
</body>
</html>