<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Tracking History</title>
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
            max-width: 1200px;
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
            font-size: 1.5rem;
            font-weight: 600;
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
        
        .content-wrapper {
            display: grid;
            grid-template-columns: 1fr 320px;
            gap: 2rem;
        }
        
        /* File Summary Card */
        .file-summary {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
            margin-bottom: 2rem;
        }
        
        .file-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid var(--border-color);
        }
        
        .file-title-section {
            flex: 1;
        }
        
        .file-id-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(37, 99, 235, 0.1);
            color: var(--primary-color);
            padding: 0.5rem 1rem;
            border-radius: 10px;
            font-family: 'Monaco', 'Courier New', monospace;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .file-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }
        
        .file-subtitle {
            font-size: 1rem;
            color: var(--text-secondary);
        }
        
        .status-badge-large {
            padding: 0.625rem 1.5rem;
            border-radius: 25px;
            font-size: 0.95rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }
        
        .status-received {
            background: rgba(59, 130, 246, 0.15);
            color: var(--info-color);
        }
        
        .status-typed {
            background: rgba(245, 158, 11, 0.15);
            color: var(--warning-color);
        }
        
        .status-signed {
            background: rgba(37, 99, 235, 0.15);
            color: var(--primary-color);
        }
        
        .status-dispatched {
            background: rgba(16, 185, 129, 0.15);
            color: var(--success-color);
        }
        
        .file-details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }
        
        .detail-item {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .detail-label {
            font-size: 0.8rem;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }
        
        .detail-value {
            font-size: 1rem;
            color: var(--text-primary);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .detail-value .material-icons {
            font-size: 20px;
            color: var(--text-secondary);
        }
        
        /* Progress Tracker */
        .progress-tracker {
            background: var(--card-bg);
            border-radius: 16px;
            padding: 1.5rem 2rem;
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
            margin-bottom: 2rem;
        }
        
        .progress-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 1.5rem;
        }
        
        .progress-steps {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }
        
        .progress-steps::before {
            content: '';
            position: absolute;
            top: 24px;
            left: 48px;
            right: 48px;
            height: 3px;
            background: var(--border-color);
            z-index: 1;
        }
        
        .progress-step {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.75rem;
            position: relative;
            z-index: 2;
        }
        
        .step-circle {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: var(--bg-secondary);
            border: 3px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .step-circle .material-icons {
            font-size: 24px;
            color: var(--text-secondary);
        }
        
        .progress-step.completed .step-circle {
            background: var(--success-color);
            border-color: var(--success-color);
        }
        
        .progress-step.completed .step-circle .material-icons {
            color: white;
        }
        
        .progress-step.active .step-circle {
            background: var(--primary-color);
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.2);
        }
        
        .progress-step.active.issue .step-circle {
            background: var(--danger-color);
            border-color: var(--danger-color);
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.2);
        }
        
        .progress-step.active .step-circle .material-icons {
            color: white;
        }
        
        .step-label {
            font-size: 0.85rem;
            color: var(--text-secondary);
            font-weight: 500;
            text-align: center;
        }
        
        .progress-step.completed .step-label,
        .progress-step.active .step-label {
            color: var(--text-primary);
            font-weight: 600;
        }
        
        /* Timeline */
        .timeline-section {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
        }
        
        .timeline-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid var(--border-color);
        }
        
        .timeline-title {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-primary);
        }
        
        .timeline-title .material-icons {
            font-size: 28px;
            color: var(--primary-color);
        }
        
        .filter-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.625rem 1.25rem;
            background: var(--bg-secondary);
            border: 2px solid var(--border-color);
            border-radius: 10px;
            color: var(--text-primary);
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .filter-btn:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }
        
        .timeline {
            position: relative;
            padding-left: 3rem;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            left: 20px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: var(--border-color);
        }
        
        .timeline-item {
            position: relative;
            padding-bottom: 2rem;
        }
        
        .timeline-item:last-child {
            padding-bottom: 0;
        }
        
        .timeline-dot {
            position: absolute;
            left: -3rem;
            top: 0;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--card-bg);
            border: 3px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
        }
        .quick-action-btn.danger {
            color: var(--danger-color);
        }
        
        .quick-action-btn.danger:hover {
            background: var(--danger-color);
            border-color: var(--danger-color);
            color: white;
        }
        
        .timeline-dot .material-icons {
            font-size: 20px;
            color: var(--text-secondary);
        }
        
        .timeline-item.created .timeline-dot {
            background: var(--success-color);
            border-color: var(--success-color);
        }
        
        .timeline-item.created .timeline-dot .material-icons {
            color: white;
        }
        
        .timeline-item.status-change .timeline-dot {
            background: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .timeline-item.status-change .timeline-dot .material-icons {
            color: white;
        }
        
        .timeline-item.note .timeline-dot {
            background: var(--warning-color);
            border-color: var(--warning-color);
        }
        
        .timeline-item.note .timeline-dot .material-icons {
            color: white;
        }
        
        .timeline-content {
            background: var(--bg-secondary);
            border-radius: 16px;
            padding: 1.5rem;
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }
        
        .timeline-content:hover {
            box-shadow: var(--shadow);
        }
        
        .timeline-header-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }
        
        .timeline-action {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .action-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .action-time {
            font-size: 0.85rem;
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .timeline-user {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--info-color));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            font-weight: 600;
        }
        
        .user-info {
            display: flex;
            flex-direction: column;
        }
        
        .user-name {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-primary);
        }
        
        .user-dept {
            font-size: 0.8rem;
            color: var(--text-secondary);
        }
        
        .status-change-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: var(--card-bg);
            border-radius: 10px;
            font-size: 0.9rem;
            margin-top: 0.75rem;
        }
        
        .status-from {
            color: var(--text-secondary);
            text-decoration: line-through;
        }
        
        .status-arrow {
            color: var(--text-secondary);
        }
        
        .status-to {
            font-weight: 600;
        }
        
        .status-to.received {
            color: var(--info-color);
        }
        
        .status-to.typed {
            color: var(--warning-color);
        }
        
        .status-to.signed {
            color: var(--primary-color);
        }
        
        .status-to.dispatched {
            color: var(--success-color);
        }
        
        .timeline-notes {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--border-color);
            font-size: 0.95rem;
            color: var(--text-secondary);
            line-height: 1.6;
            font-style: italic;
        }
        
        /* Sidebar */
        .sidebar {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        
        .sidebar-card {
            background: var(--card-bg);
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
        }
        
        .sidebar-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .sidebar-title .material-icons {
            font-size: 24px;
            color: var(--primary-color);
        }
        
        .quick-actions {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }
        
        .quick-action-btn {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.875rem 1rem;
            background: var(--bg-secondary);
            border: 2px solid var(--border-color);
            border-radius: 12px;
            color: var(--text-primary);
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .quick-action-btn:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }
        
        .quick-action-btn .material-icons {
            font-size: 22px;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        
        .stat-item {
            text-align: center;
            padding: 1rem;
            background: var(--bg-secondary);
            border-radius: 12px;
        }
        
        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.25rem;
        }
        
        .stat-label {
            font-size: 0.8rem;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }
        
        /* Responsive */
        @media (max-width: 1024px) {
            .content-wrapper {
                grid-template-columns: 1fr;
            }
            
            .sidebar {
                order: -1;
            }
        }
        
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
            }
            
            .file-header {
                flex-direction: column;
                gap: 1rem;
            }
            
            .file-details-grid {
                grid-template-columns: 1fr 1fr;
            }
            
            .progress-steps {
                flex-wrap: wrap;
                gap: 1.5rem;
            }
            
            .progress-steps::before {
                display: none;
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
                <div class="header-left">
                    <a class="back-btn" href="{{ route('dashboard') }}" style="text-decoration:none;">
                        <i class="material-icons">arrow_back</i>
                    </a>
                    <div class="page-info">
                        <h1>File Tracking History</h1>
                        <div class="breadcrumbs">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                            <span>/</span>
                            <a href="#">Files</a>
                            <span>/</span>
                            <span>{{$file->file_no}}</span>
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
            <!-- File Summary -->
            <div class="file-summary">
                <div class="file-header">
                    <div class="file-title-section">
                        <div class="file-id-badge">
                            <i class="material-icons" style="font-size: 18px;">folder</i>
                            {{ $file->file_no }}
                        </div>
                        <h2 class="file-title">{{ $file->patient_name }}</h2>
                    </div>
                    <div class="status-badge-large status-typed">{{ $file->status }}</div>
                </div>
                
                <div class="file-details-grid">
                    <div class="detail-item">
                        <span class="detail-label">Patient No.</span>
                        <span class="detail-value">
                            <i class="material-icons">badge</i>
                            {{ $file->reg_no }}
                        </span>
                    </div>
                   
                    <div class="detail-item">
                        <span class="detail-label">Unit</span>
                        <span class="detail-value">
                            <i class="material-icons">domain</i>
                            {{ $file->unit }}
                        </span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Wing</span>
                        <span class="detail-value">
                            <i class="material-icons">meeting_room</i>
                            {{ $file->wing }}
                        </span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Last Updated</span>
                        <span class="detail-value">
                            <i class="material-icons">update</i>
                            {{ date('M d, Y', strtotime($file->statusLatest()->date)) }}
                        </span>
                    </div>
                </div>
            </div>
            
            <!-- Progress Tracker -->
            <div class="progress-tracker">
                <h3 class="progress-title">File Progress</h3>
                <div class="progress-steps">
                    <div class="progress-step {{ $file->status === 'Pending' ? 'active' : ($file->status === 'With Issue' || $file->status === 'Typed' || $file->status === 'Received Back' || $file->status === 'Specialist' || $file->status === 'Member I' || $file->status === 'Member II' || $file->status === 'Member III' || $file->status === 'Commandant' || $file->status === 'Dispatched' ? 'completed' : '') }}">
                        <div class="step-circle">
                            <i class="material-icons">{{ $file->status === 'Pending' ? 'hourglass_empty' : 'check' }}</i>
                        </div>
                        <span class="step-label">Pending</span>
                    </div>
                    <div class="progress-step {{ $file->status === 'With Issue' ? 'active issue' : ($file->status === 'Typed' || $file->status === 'Received Back' || $file->status === 'Specialist' || $file->status === 'Member I' || $file->status === 'Member II' || $file->status === 'Member III' || $file->status === 'Commandant' || $file->status === 'Dispatched' ? 'completed' : '') }}">
                        <div class="step-circle">
                            <i class="material-icons">{{ $file->status === 'With Issue' ? 'error' : 'check' }}</i>
                        </div>
                        <span class="step-label">With Issue</span>
                    </div>
                    <div class="progress-step {{ $file->status === 'Typed' ? 'active' : ($file->status === 'Received Back' || $file->status === 'Specialist' || $file->status === 'Member I' || $file->status === 'Member II' || $file->status === 'Member III' || $file->status === 'Commandant' || $file->status === 'Dispatched' ? 'completed' : '') }}">
                        <div class="step-circle">
                            <i class="material-icons">{{ $file->status === 'Typed' ? 'keyboard' : 'check' }}</i>
                        </div>
                        <span class="step-label">Typed</span>
                    </div>
                    <div class="progress-step {{ $file->status === 'Received Back' ? 'active' : ($file->status === 'Specialist' || $file->status === 'Member I' || $file->status === 'Member II' || $file->status === 'Member III' || $file->status === 'Commandant' || $file->status === 'Dispatched' ? 'completed' : '') }}">
                        <div class="step-circle">
                            <i class="material-icons">{{ $file->status === 'Received Back' ? 'assignment_return' : 'check' }}</i>
                        </div>
                        <span class="step-label">Received Back</span>
                    </div>
                    <div class="progress-step {{ $file->status === 'Specialist' ? 'active' : ($file->status === 'Member I' || $file->status === 'Member II' || $file->status === 'Member III' || $file->status === 'Commandant' || $file->status === 'Dispatched' ? 'completed' : '') }}">
                        <div class="step-circle">
                            <i class="material-icons">{{ $file->status === 'Specialist' ? 'psychology' : 'check' }}</i>
                        </div>
                        <span class="step-label">Specialist</span>
                    </div>
                    <div class="progress-step {{ $file->status === 'Member I' ? 'active' : ($file->status === 'Member II' || $file->status === 'Member III' || $file->status === 'Commandant' || $file->status === 'Dispatched' ? 'completed' : '') }}">
                        <div class="step-circle">
                            <i class="material-icons">{{ $file->status === 'Member I' ? 'person' : 'check' }}</i>
                        </div>
                        <span class="step-label">Member I</span>
                    </div>
                    <div class="progress-step {{ $file->status === 'Member II' ? 'active' : ($file->status === 'Member III' || $file->status === 'Commandant' || $file->status === 'Dispatched' ? 'completed' : '') }}">
                        <div class="step-circle">
                            <i class="material-icons">{{ $file->status === 'Member II' ? 'person_2' : 'check' }}</i>
                        </div>
                        <span class="step-label">Member II</span>
                    </div>
                    <div class="progress-step {{ $file->status === 'Member III' ? 'active' : ($file->status === 'Commandant' || $file->status === 'Dispatched' ? 'completed' : '') }}">
                        <div class="step-circle">
                            <i class="material-icons">{{ $file->status === 'Member III' ? 'group' : 'check' }}</i>
                        </div>
                        <span class="step-label">Member III</span>
                    </div>
                    <div class="progress-step {{ $file->status === 'Commandant' ? 'active' : ($file->status === 'Dispatched' ? 'completed' : '') }}">
                        <div class="step-circle">
                            <i class="material-icons">{{ $file->status === 'Commandant' ? 'military_tech' : 'check' }}</i>
                        </div>
                        <span class="step-label">Commandant</span>
                    </div>
                    <div class="progress-step {{ $file->status === 'Dispatched' ? 'active' : '' }}">
                        <div class="step-circle">
                            <i class="material-icons">{{ $file->status === 'Dispatched' ? 'local_shipping' : 'radio_button_unchecked' }}</i>
                        </div>
                        <span class="step-label">Dispatched</span>
                    </div>
                </div>
            </div>
            
            <div class="content-wrapper">
                <!-- Timeline -->
                <div class="timeline-section">
                    <div class="timeline-header">
                        <h3 class="timeline-title">
                            <i class="material-icons">history</i>
                            Activity Timeline
                        </h3>
                        
                    </div>
                    
                    <div class="timeline">
                        @foreach($file->statusHistories as $index => $history)
                            @php
                                $isFirst = $loop->last; // last in the loop = oldest record (since sorted by latest)
                                $previousStatus = !$loop->last ? $file->statusHistories[$loop->index + 1]->status : null;
                                $userInitials = $history->user ? collect(explode(' ', $history->user->name))->map(fn($w) => strtoupper(substr($w, 0, 1)))->implode('') : '??';
                            @endphp
                            <div class="timeline-item {{ $isFirst ? 'created' : 'status-change' }}">
                                <div class="timeline-dot">
                                    <i class="material-icons">{{ $isFirst ? 'add_circle' : 'published_with_changes' }}</i>
                                </div>
                                <div class="timeline-content">
                                    <div class="timeline-header-row">
                                        <div class="timeline-action">
                                            <span class="action-title">
                                                @if($isFirst)
                                                    <i class="material-icons" style="font-size: 20px; color: var(--success-color);">create_new_folder</i>
                                                    File Created
                                                @else
                                                    <i class="material-icons" style="font-size: 20px; color: var(--primary-color);">sync_alt</i>
                                                    Status Changed
                                                @endif
                                            </span>
                                            <span class="action-time">
                                                <i class="material-icons" style="font-size: 16px;">schedule</i>
                                                {{ date('M d, Y', strtotime($history->date)) }}
                                            </span>
                                        </div>
                                        <div class="timeline-user">
                                            <div class="user-avatar">{{ $userInitials }}</div>
                                            <div class="user-info">
                                                <span class="user-name">{{ $history->user->name ?? 'Unknown' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @if(!$isFirst && $previousStatus)
                                        <div class="status-change-badge">
                                            <span class="status-from">{{ $previousStatus }}</span>
                                            <i class="material-icons status-arrow">arrow_forward</i>
                                            <span class="status-to {{ strtolower($history->status) }}">{{ $history->status }}</span>
                                        </div>
                                    @endif
                                    @if($history->notes)
                                        <p class="timeline-notes">
                                            {{ $history->notes }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        @if($file->statusHistories->isEmpty())
                            <div style="text-align: center; padding: 2rem; color: var(--text-secondary);">
                                <i class="material-icons" style="font-size: 48px; opacity: 0.5;">history</i>
                                <p>No history records found.</p>
                            </div>
                        @endif
                    </div>
                </div>
                
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Quick Actions -->
                    <div class="sidebar-card">
                        <h3 class="sidebar-title">
                            <i class="material-icons">flash_on</i>
                            Quick Actions
                        </h3>
                        <div class="quick-actions">
                            
                            <button class="quick-action-btn" onclick="showStatusModal()">
                                <i class="material-icons"  >published_with_changes</i>
                                Update Status
                            </button>
                            <button class="quick-action-btn" onclick="openModal()">
                                <i class="material-icons">edit</i>
                                Edit File
                            </button>
                            <a href="{{ route('files.confirm-delete', $file->id) }}" class="quick-action-btn danger" style="text-decoration:none">
                                <i class="material-icons">delete</i>
                                Delete File
                            </a>
                        </div>
                    </div>
                    
                    <!-- Statistics -->
                    <div class="sidebar-card">
                        <h3 class="sidebar-title">
                            <i class="material-icons">analytics</i>
                            Statistics
                        </h3>
                        @php
                            $histories = $file->statusHistories;
                            $totalActivities = $histories->count();
                            $uniqueUsers = $histories->pluck('user_id')->unique()->count();
                            $firstDate = $histories->last() ? $histories->last()->date : $file->created_at;
                            $daysActive = \Carbon\Carbon::parse($firstDate)->diffInDays(now()) + 1;
                        @endphp
                        <div class="stats-grid">
                            <div class="stat-item">
                                <div class="stat-value">{{ number_format($daysActive,0) }}</div>
                                <div class="stat-label">Days Active</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">{{ $totalActivities }}</div>
                                <div class="stat-label">Activities</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">{{ $uniqueUsers }}</div>
                                <div class="stat-label">Users</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">{{ $totalActivities > 0 ? $totalActivities - 1 : 0 }}</div>
                                <div class="stat-label">Status Changes</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                        <span class="info-value" id="modalFileId">{{$file->file_no}}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Patient Name:</span>
                        <span class="info-value" id="modalPatientName">{{$file->patient_name}}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Current Status:</span>
                        <span class="info-value" id="modalCurrentStatus">{{$file->status}}</span>
                    </div>
                </div>
                <input type="hidden" value="{{ $file->id }}" id="status_id" name="status_id">
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
                                <option value="With Issue">With Issue</option>
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


     <div class="modal-overlay" id="newFileModal">
        <div class="modal">
            <div class="modal-header">
                <div class="modal-title">
                    <i class="material-icons">add_circle</i>
                    <h2>Create New File</h2>
                </div>
                <button class="modal-close" onclick="closeModal()">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <form method="POST" action="{{ route('files.update', $file->id) }}">
            @csrf
            @method('put')
            <div class="modal-body">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="material-icons">badge</i>
                                Patient No.
                            </label>
                            <input type="text" name="reg_no" class="form-input" value="{{ $file->reg_no }}" placeholder="Enter patient number" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                <i class="material-icons">person</i>
                                Name
                            </label>
                            <input type="text" name="patient_name" class="form-input" value="{{ $file->patient_name }}" placeholder="Enter patient name" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                <i class="material-icons">domain</i>
                                Unit
                            </label>
                            <input type="text" name="unit" class="form-input" value="{{ $file->unit }}" placeholder="Enter unit" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                <i class="material-icons">meeting_room</i>
                                Wing
                            </label>
                            <input type="text" name="wing" class="form-input" value="{{ $file->wing }}" placeholder="Enter wing" required>
                        </div>
                        
                    </div>
               
            </div>
            
            <div class="modal-footer">
                <button class="btn btn-secondary" onclick="closeModal()">
                    <i class="material-icons">cancel</i>
                    Cancel
                </button>
                <button class="btn btn-primary" type="submit">
                    <i class="material-icons">save</i>
                    Update File
                </button>
            </div>
             </form>
        </div>
    </div>
     @include('layout.snakebar')
    
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


         function showStatusModal() {
           
            
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



          // Modal Functions
        function openModal() {
            document.getElementById('newFileModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        
        function closeModal() {
            document.getElementById('newFileModal').classList.remove('active');
            document.body.style.overflow = 'auto';
            document.getElementById('newFileForm').reset();
        }
        
        function saveFile() {
            const form = document.getElementById('newFileForm');
            if (form.checkValidity()) {
                // Here you would typically send data to backend
                alert('File created successfully!');
                closeModal();
            } else {
                form.reportValidity();
            }
        }
        
        // Close modal on overlay click
        document.getElementById('newFileModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
</body>
</html>