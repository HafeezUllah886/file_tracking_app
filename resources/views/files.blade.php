<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Tracking System - All Files</title>
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
            --overlay-bg: rgba(0, 0, 0, 0.5);
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
            --overlay-bg: rgba(0, 0, 0, 0.7);
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
        }

        .breadcrumbs a:hover {
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
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
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

        /* Summary Cards */
        .summary-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .summary-card {
            background: var(--card-bg);
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .summary-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
        }

        .summary-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .summary-card:nth-child(1)::before {
            background: linear-gradient(90deg, var(--info-color), #0284c7);
        }

        .summary-card:nth-child(2)::before {
            background: linear-gradient(90deg, var(--info-color), #0284c7);
        }

        .summary-card:nth-child(3)::before {
            background: linear-gradient(90deg, var(--warning-color), #d97706);
        }

        .summary-card:nth-child(4)::before {
            background: linear-gradient(90deg, var(--primary-color), #1d4ed8);
        }

        .summary-card:nth-child(5)::before {
            background: linear-gradient(90deg, var(--success-color), #059669);
        }

        .summary-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            font-size: 24px;
        }

        .summary-card:nth-child(1) .summary-icon {
            background: rgba(59, 130, 246, 0.15);
            color: var(--info-color);
        }

        .summary-card:nth-child(2) .summary-icon {
            background: rgba(59, 130, 246, 0.15);
            color: var(--info-color);
        }

        .summary-card:nth-child(3) .summary-icon {
            background: rgba(245, 158, 11, 0.15);
            color: var(--warning-color);
        }

        .summary-card:nth-child(4) .summary-icon {
            background: rgba(37, 99, 235, 0.15);
            color: var(--primary-color);
        }

        .summary-card:nth-child(5) .summary-icon {
            background: rgba(16, 185, 129, 0.15);
            color: var(--success-color);
        }

        .summary-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.25rem;
        }

        .summary-label {
            font-size: 0.9rem;
            color: var(--text-secondary);
            font-weight: 500;
        }

        /* Search & Filters Section */
        .search-filters-section {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
            margin-bottom: 2rem;
        }

        .search-container {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .search-input {
            width: 100%;
            padding: 1rem 1.5rem 1rem 3.5rem;
            font-size: 1.05rem;
            border: 2px solid var(--border-color);
            border-radius: 14px;
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

        .search-icon {
            position: absolute;
            left: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            font-size: 24px;
        }

        .filters-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 1.25rem;
            margin-bottom: 1.5rem;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .filter-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .filter-input,
        .filter-select {
            padding: 0.75rem 1rem;
            border: 2px solid var(--border-color);
            border-radius: 10px;
            background: var(--bg-secondary);
            color: var(--text-primary);
            font-size: 0.95rem;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
        }

        .filter-input:focus,
        .filter-select:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .filter-select {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 18px;
            padding-right: 2.5rem;
        }

        .filter-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
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

        /* Bulk Actions */
        .bulk-actions {
            background: var(--bg-secondary);
            border-radius: 12px;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            display: none;
            align-items: center;
            justify-content: space-between;
            border: 2px solid var(--primary-color);
        }

        .bulk-actions.active {
            display: flex;
        }

        .bulk-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--text-primary);
            font-weight: 600;
        }

        .bulk-info .material-icons {
            color: var(--primary-color);
        }

        .bulk-buttons {
            display: flex;
            gap: 0.75rem;
        }

        .btn-small {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
        }

        /* Files Table */
        .files-table-container {
            background: var(--card-bg);
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
            overflow: hidden;
        }

        .files-table {
            width: 100%;
            border-collapse: collapse;
        }

        .files-table thead {
            background: linear-gradient(135deg, var(--bg-secondary), var(--bg-tertiary));
        }

        .files-table thead th {
            padding: 1.25rem 1rem;
            text-align: left;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid var(--border-color);
        }

        .files-table tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid var(--border-color);
        }

        .files-table tbody tr:hover {
            background: var(--bg-secondary);
        }

        .files-table tbody tr:last-child {
            border-bottom: none;
        }

        .files-table tbody td {
            padding: 1.25rem 1rem;
            color: var(--text-primary);
            font-size: 0.95rem;
        }

        .custom-checkbox {
            width: 20px;
            height: 20px;
            border: 2px solid var(--border-color);
            border-radius: 4px;
            background: var(--card-bg);
            cursor: pointer;
            position: relative;
            transition: all 0.3s ease;
        }

        .custom-checkbox.checked {
            background: var(--primary-color);
            border-color: var(--primary-color);
        }

        .custom-checkbox.checked::after {
            content: '✓';
            position: absolute;
            color: white;
            font-size: 12px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-weight: bold;
        }

        .file-id {
            font-family: 'Monaco', 'Courier New', monospace;
            font-weight: 600;
            color: var(--primary-color);
            background: rgba(37, 99, 235, 0.08);
            padding: 0.375rem 0.75rem;
            border-radius: 6px;
            font-size: 0.85rem;
        }

        .patient-info {
            display: flex;
            flex-direction: column;
        }

        .patient-name {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.125rem;
        }

        .patient-number {
            font-size: 0.8rem;
            color: var(--text-secondary);
        }

        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            display: inline-block;
        }

        .status-received {
            background: rgba(59, 130, 246, 0.12);
            color: var(--info-color);
        }

        .status-typed {
            background: rgba(245, 158, 11, 0.12);
            color: var(--warning-color);
        }

        .status-signed {
            background: rgba(37, 99, 235, 0.12);
            color: var(--primary-color);
        }

        .status-dispatched {
            background: rgba(16, 185, 129, 0.12);
            color: var(--success-color);
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            background: transparent;
            color: var(--text-secondary);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .action-btn:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }

        .action-btn.danger:hover {
            background: var(--danger-color);
            border-color: var(--danger-color);
        }

        .action-btn .material-icons {
            font-size: 18px;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem;
            border-top: 2px solid var(--border-color);
            flex-wrap: wrap;
            gap: 1rem;
        }

        .pagination-info {
            font-size: 0.9rem;
            color: var(--text-secondary);
        }

        .pagination-controls {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .page-btn {
            min-width: 40px;
            height: 40px;
            padding: 0 0.75rem;
            border-radius: 8px;
            border: 2px solid var(--border-color);
            background: var(--card-bg);
            color: var(--text-primary);
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .page-btn:hover:not(:disabled) {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }

        .page-btn.active {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }

        .page-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
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
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
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

        .form-input,
        .form-select,
        .form-textarea {
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

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
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

        /* Responsive */
        @media (max-width: 1200px) {
            .files-table-container {
                overflow-x: auto;
            }

            .files-table {
                min-width: 1200px;
            }
        }

        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
            }

            .summary-cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .filters-grid {
                grid-template-columns: 1fr;
            }

            .filter-actions {
                justify-content: stretch;
            }

            .filter-actions .btn {
                flex: 1;
            }

            .bulk-actions {
                flex-direction: column;
                gap: 1rem;
            }

            .pagination {
                flex-direction: column;
                align-items: stretch;
            }

            .pagination-controls {
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .summary-cards {
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
                    <a href="{{ route('dashboard') }}" style="text-decoration: none;" class="back-btn">
                        <i class="material-icons">arrow_back</i>
                    </a>
                    <div class="page-info">
                        <h1>All Files</h1>
                        <div class="breadcrumbs">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                            <span>/</span>
                            <span>All Files</span>
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
            <form action="{{ route('files.index') }}" method="GET">
                <div class="search-filters-section">
                    <div class="search-container">
                        <i class="material-icons search-icon">search</i>
                        <input type="text" name="search" value="{{ $search }}" class="search-input"
                            placeholder="Search by file ID, patient name, patient number, or any keyword...">
                    </div>

                    <div class="filters-grid">
                        <div class="filter-group">
                            <label class="filter-label">Status</label>
                            <select class="filter-select" name="status">
                                <option value="">All Status</option>
                                <option value="Pending" {{ $status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Typed" {{ $status == 'Typed' ? 'selected' : '' }}>Typed</option>
                                <option value="Received Back" {{ $status == 'Received Back' ? 'selected' : '' }}>
                                    Received Back</option>
                                <option value="Specialist" {{ $status == 'Specialist' ? 'selected' : '' }}>Specialist
                                </option>
                                <option value="Member I" {{ $status == 'Member I' ? 'selected' : '' }}>Member I</option>
                                <option value="Member II" {{ $status == 'Member II' ? 'selected' : '' }}>Member II
                                </option>
                                <option value="Member III" {{ $status == 'Member III' ? 'selected' : '' }}>Member III
                                </option>
                                <option value="Commandant" {{ $status == 'Commandant' ? 'selected' : '' }}>Commandant
                                </option>
                                <option value="Dispatched" {{ $status == 'Dispatched' ? 'selected' : '' }}>Dispatched
                                </option>
                                <option value="With Issue" {{ $status == 'With Issue' ? 'selected' : '' }}>With
                                    Issue</option>
                            </select>
                        </div>

                        <div class="filter-group">
                            <label class="filter-label">Date From</label>
                            <input type="date" value="{{ $start }}" name="start" class="filter-input">
                        </div>

                        <div class="filter-group">
                            <label class="filter-label">Date To</label>
                            <input type="date" value="{{ $end }}" name="end" class="filter-input">
                        </div>

                        <div class="filter-group">
                            <label class="filter-label">Unit</label>
                            <select class="filter-select" name="unit">
                                <option value="">All Units</option>
                                @foreach ($units as $u)
                                    <option value="{{ $u }}" {{ $unit == $u ? 'selected' : '' }}>
                                        {{ $u }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="filter-group">
                            <label class="filter-label">Wing</label>
                            <select class="filter-select" name="wing">
                                <option value="">All Wings</option>
                                @foreach ($wings as $w)
                                    <option value="{{ $w }}" {{ $wing == $w ? 'selected' : '' }}>
                                        {{ $w }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="filter-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="material-icons">filter_list</i>
                            Apply Filters
                        </button>
                    </div>
                </div>
            </form>

            <!-- Bulk Actions -->
            <div class="bulk-actions" id="bulkActions">
                <div class="bulk-info">
                    <i class="material-icons">check_circle</i>
                    <span><span id="selectedCount">0</span> files selected</span>
                </div>
                <div class="bulk-buttons">
                    <button class="btn btn-secondary btn-small" onclick="showBulkStatusModal()">
                        <i class="material-icons">published_with_changes</i>
                        Change Status
                    </button>
                    <button class="btn btn-secondary btn-small">
                        <i class="material-icons">download</i>
                        Export
                    </button>
                    <button class="btn btn-secondary btn-small danger"
                        style="border-color: var(--danger-color); color: var(--danger-color);">
                        <i class="material-icons">delete</i>
                        Delete
                    </button>
                </div>
            </div>

            <!-- Files Table -->
            <div class="files-table-container">
                <table class="files-table">
                    <thead>
                        <tr>
                            <th>File ID</th>
                            <th>Patient Info</th>
                            <th>Unit</th>
                            <th>Wing</th>
                            <th>Status</th>
                            <th>Last Update</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($files as $file)
                            <tr>
                                <td><span class="file-id">{{ $file->file_no }}</span></td>
                                <td>
                                    <div class="patient-info">
                                        <span class="patient-name">{{ $file->patient_name }}</span>
                                        <span class="patient-number">{{ $file->reg_no }}</span>
                                    </div>
                                </td>
                                <td>{{ $file->unit }}</td>
                                <td>{{ $file->wing }}</td>
                                <td>
                                    @php
                                        $badgeClass = match (strtolower($file->status)) {
                                            'pending' => 'status-received',
                                            'typed',
                                            'received back',
                                            'specialist',
                                            'member i',
                                            'member ii',
                                            'member iii',
                                            'commandant'
                                                => 'status-typed',
                                            'signed' => 'status-signed',
                                            'dispatched' => 'status-dispatched',
                                            'with issue' => 'status-warning',
                                            default => 'status-received',
                                        };
                                    @endphp
                                    <span class="status-badge {{ $badgeClass }}">{{ $file->status }}</span>
                                </td>
                                <td>
                                    <div class="patient-info">
                                        <span class="patient-name">
                                            @if ($file->statusHistories->first())
                                                {{ date('M d, Y', strtotime($file->statusHistories->first()->date)) }}
                                            @else
                                                {{ $file->created_at->format('M d, Y') }}
                                            @endif
                                        </span>
                                        <span class="patient-number">
                                            @if ($file->statusHistories->first())
                                                {{ $file->statusHistories->first()->notes }}
                                            @else
                                                {{ $file->notes }}
                                            @endif
                                        </span>
                                    </div>

                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('file.tracking', $file->id) }}"
                                            style="text-decoration:none" class="action-btn" title="View Tracking">
                                            <i class="material-icons">visibility</i>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="text-align: center; padding: 2rem;">
                                    <div style="color: var(--text-secondary);">
                                        <i class="material-icons"
                                            style="font-size: 48px; opacity: 0.5;">folder_off</i>
                                        <p style="margin-top: 1rem;">No files found matching your filters.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination -->
                @if ($files->hasPages())
                    <div class="pagination"
                        style="justify-content: center; border-top: 1px solid var(--border-color); padding-top: 1rem;">
                        {{ $files->links() }}
                    </div>
                @endif
            </div>
        </div>
    </main>


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

        // Checkbox functionality
        function toggleCheckbox(checkbox) {
            checkbox.classList.toggle('checked');
            updateBulkActions();
        }

        function toggleSelectAll(headerCheckbox) {
            const checkboxes = document.querySelectorAll('.files-table tbody .custom-checkbox');
            const isChecked = headerCheckbox.classList.contains('checked');

            checkboxes.forEach(checkbox => {
                if (isChecked) {
                    checkbox.classList.remove('checked');
                } else {
                    checkbox.classList.add('checked');
                }
            });

            headerCheckbox.classList.toggle('checked');
            updateBulkActions();
        }

        function updateBulkActions() {
            const checkboxes = document.querySelectorAll('.files-table tbody .custom-checkbox.checked');
            const bulkActions = document.getElementById('bulkActions');
            const selectedCount = document.getElementById('selectedCount');

            selectedCount.textContent = checkboxes.length;

            if (checkboxes.length > 0) {
                bulkActions.classList.add('active');
            } else {
                bulkActions.classList.remove('active');
            }
        }

        // Status Modal
        function showStatusModal(fileId, patientName, currentStatus) {
            document.getElementById('modalFileId').textContent = fileId;
            document.getElementById('modalPatientName').textContent = patientName;
            document.getElementById('modalCurrentStatus').textContent = currentStatus;

            // Set current date/time
            const now = new Date();
            now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
            document.getElementById('statusDateTime').value = now.toISOString().slice(0, 16);

            document.getElementById('statusModal').classList.add('active');
        }

        function showBulkStatusModal() {
            const checkboxes = document.querySelectorAll('.files-table tbody .custom-checkbox.checked');
            const count = checkboxes.length;

            document.getElementById('modalFileId').textContent = `${count} files selected`;
            document.getElementById('modalPatientName').textContent = 'Bulk Status Change';
            document.getElementById('modalCurrentStatus').textContent = 'Multiple files';

            // Set current date/time
            const now = new Date();
            now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
            document.getElementById('statusDateTime').value = now.toISOString().slice(0, 16);

            document.getElementById('statusModal').classList.add('active');
        }

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
    </script>
</body>

</html>
