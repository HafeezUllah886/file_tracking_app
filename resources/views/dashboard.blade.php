<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Tracking System - Admin Panel</title>
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

        .logo-section {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--primary-color), var(--info-color));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .logo-icon .material-icons {
            font-size: 28px;
        }

        .logo-text h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-primary);
            letter-spacing: -0.5px;
        }

        .logo-text p {
            font-size: 0.875rem;
            color: var(--text-secondary);
            font-weight: 400;
        }

        /* Theme Toggle */
        .theme-toggle {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .toggle-label {
            font-size: 0.875rem;
            color: var(--text-secondary);
            font-weight: 500;
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
            padding: 3rem 0;
        }

        /* Search Section */
        .search-section {
            background: var(--card-bg);
            border-radius: 24px;
            padding: 3rem;
            box-shadow: var(--shadow-lg);
            margin-bottom: 2.5rem;
            border: 1px solid var(--border-color);
        }

        .search-title {
            text-align: center;
            margin-bottom: 2rem;
        }

        .search-title h2 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .search-title p {
            font-size: 1rem;
            color: var(--text-secondary);
        }

        .search-container {
            position: relative;
            max-width: 900px;
            margin: 0 auto;
        }

        .search-input {
            width: 100%;
            padding: 1.25rem 1.5rem 1.25rem 4rem;
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
            left: 1.5rem;
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

        /* Action Buttons */
        .actions-section {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .action-btn {
            background: var(--card-bg);
            border: 2px solid var(--border-color);
            border-radius: 20px;
            padding: 2.5rem 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 1.25rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .action-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--info-color));
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .action-btn:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary-color);
        }

        .action-btn:hover::before {
            transform: scaleX(1);
        }

        .action-btn:nth-child(2)::before {
            background: linear-gradient(90deg, var(--success-color), #059669);
        }

        .action-btn:nth-child(3)::before {
            background: linear-gradient(90deg, var(--accent-color), #7c3aed);
        }

        .action-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            transition: all 0.3s ease;
        }

        .action-btn:nth-child(1) .action-icon {
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.15), rgba(59, 130, 246, 0.15));
            color: var(--primary-color);
        }

        .action-btn:nth-child(2) .action-icon {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.15), rgba(5, 150, 105, 0.15));
            color: var(--success-color);
        }

        .action-btn:nth-child(3) .action-icon {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.15), rgba(124, 58, 237, 0.15));
            color: var(--accent-color);
        }

        .action-btn:hover .action-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .action-text h3 {
            font-size: 1.375rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.25rem;
        }

        .action-text p {
            font-size: 0.9rem;
            color: var(--text-secondary);
        }

        /* Info Tiles */
        .tiles-section {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .info-tile {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .info-tile::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
        }

        .info-tile:nth-child(1)::before {
            background: linear-gradient(90deg, var(--info-color), #0284c7);
        }

        .info-tile:nth-child(2)::before {
            background: linear-gradient(90deg, var(--warning-color), #d97706);
        }

        .info-tile:nth-child(3)::before {
            background: linear-gradient(90deg, #f43f5e, #e11d48);
        }

        .info-tile:nth-child(4)::before {
            background: linear-gradient(90deg, var(--primary-color), #1d4ed8);
        }

        .info-tile:nth-child(5)::before {
            background: linear-gradient(90deg, var(--success-color), #059669);
        }

        .info-tile:nth-child(6)::before {
            background: linear-gradient(90deg, var(--accent-color), #7c3aed);
        }

        .info-tile:nth-child(7)::before {
            background: linear-gradient(90deg, #14b8a6, #0d9488);
        }

        .info-tile:nth-child(8)::before {
            background: linear-gradient(90deg, #6366f1, #4f46e5);
        }

        .info-tile:nth-child(9)::before {
            background: linear-gradient(90deg, #b9e90eff, #a8d406ff);
        }

        .info-tile:nth-child(10)::before {
            background: linear-gradient(90deg, #f59e0b, #d97706);
        }

        .info-tile:nth-child(11)::before {
            background: linear-gradient(90deg, #06b6d4, #0891b2);
        }

        .info-tile:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .tile-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .tile-icon {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .info-tile:nth-child(1) .tile-icon {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.15), rgba(2, 132, 199, 0.15));
            color: var(--info-color);
        }

        .info-tile:nth-child(2) .tile-icon {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.15), rgba(217, 119, 6, 0.15));
            color: var(--warning-color);
        }

        .info-tile:nth-child(3) .tile-icon {
            background: linear-gradient(135deg, rgba(244, 63, 94, 0.15), rgba(225, 29, 72, 0.15));
            color: #f43f5e;
        }

        .info-tile:nth-child(4) .tile-icon {
            background: linear-gradient(135deg, rgba(29, 123, 246, 0.15), rgba(29, 107, 225, 0.15));
            color: #2d84edff;
        }

        .info-tile:nth-child(5) .tile-icon {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.15), rgba(5, 150, 105, 0.15));
            color: var(--success-color);
        }

        .tile-badge {
            padding: 0.375rem 0.875rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-tile:nth-child(1) .tile-badge {
            background: rgba(59, 130, 246, 0.1);
            color: var(--info-color);
        }

        .info-tile:nth-child(2) .tile-badge {
            background: rgba(245, 158, 11, 0.1);
            color: var(--warning-color);
        }


        .info-tile:nth-child(3) .tile-badge {
            background: rgba(244, 63, 94, 0.1);
            color: #f43f5e;
        }

        .info-tile:nth-child(4) .tile-badge {
            background: rgba(28, 86, 246, 0.1);
            color: #2362f6ff;
        }

        .info-tile:nth-child(5) .tile-badge {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success-color);
        }

        /* Tile 5 - Specialist (purple) */
        .info-tile:nth-child(6) .tile-icon {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.15), rgba(124, 58, 237, 0.15));
            color: var(--accent-color);
        }

        .info-tile:nth-child(6) .tile-badge {
            background: rgba(139, 92, 246, 0.1);
            color: var(--accent-color);
        }

        /* Tile 6 - Member I (teal) */
        .info-tile:nth-child(7) .tile-icon {
            background: linear-gradient(135deg, rgba(20, 184, 166, 0.15), rgba(13, 148, 136, 0.15));
            color: #14b8a6;
        }

        .info-tile:nth-child(7) .tile-badge {
            background: rgba(20, 184, 166, 0.1);
            color: #14b8a6;
        }

        /* Tile 7 - Member II (indigo) */
        .info-tile:nth-child(8) .tile-icon {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.15), rgba(79, 70, 229, 0.15));
            color: #6366f1;
        }

        .info-tile:nth-child(8) .tile-badge {
            background: rgba(99, 102, 241, 0.1);
            color: #6366f1;
        }

        /* Tile 8 - Member III (rose) */
        .info-tile:nth-child(9) .tile-icon {
            background: linear-gradient(135deg, rgba(142, 230, 33, 0.15), rgba(145, 245, 91, 0.15));
            color: #9ddd14ff;
        }

        .info-tile:nth-child(9) .tile-badge {
            background: rgba(179, 249, 93, 0.1);
            color: #9ddd14ff;
        }

        /* Tile 9 - Commandant (amber) */
        .info-tile:nth-child(10) .tile-icon {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.15), rgba(217, 119, 6, 0.15));
            color: #f59e0b;
        }

        .info-tile:nth-child(10) .tile-badge {
            background: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
        }

        /* Tile 10 - Dispatched (cyan) */
        .info-tile:nth-child(11) .tile-icon {
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.15), rgba(8, 145, 178, 0.15));
            color: #06b6d4;
        }

        .info-tile:nth-child(11) .tile-badge {
            background: rgba(6, 182, 212, 0.1);
            color: #06b6d4;
        }

        .tile-content {
            text-align: center;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .tile-content h3 {
            font-size: 2.75rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            line-height: 1;
        }

        .tile-content p {
            font-size: 1rem;
            color: var(--text-secondary);
            font-weight: 500;
        }

        .tile-trend {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--border-color);
        }

        .trend-icon {
            font-size: 20px;
        }

        .trend-up {
            color: var(--success-color);
        }

        .trend-down {
            color: #ef4444;
        }

        .trend-text {
            font-size: 0.875rem;
            color: var(--text-secondary);
        }

        .trend-value {
            font-weight: 600;
        }

        /* Recent Activity Table */
        .activity-section {
            background: var(--card-bg);
            border-radius: 24px;
            padding: 2rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .section-title h2 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .section-title .material-icons {
            font-size: 32px;
            color: var(--primary-color);
        }

        .view-all-btn {
            background: transparent;
            border: 2px solid var(--border-color);
            color: var(--primary-color);
            padding: 0.625rem 1.5rem;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .view-all-btn:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }

        .activity-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .activity-table thead th {
            background: var(--bg-secondary);
            padding: 1rem 1.25rem;
            text-align: left;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid var(--border-color);
        }

        .activity-table thead th:first-child {
            border-radius: 12px 0 0 0;
        }

        .activity-table thead th:last-child {
            border-radius: 0 12px 0 0;
        }

        .activity-table tbody tr {
            transition: all 0.3s ease;
        }

        .activity-table tbody tr:hover {
            background: var(--bg-secondary);
        }

        .activity-table tbody td {
            padding: 1.25rem;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-primary);
            font-size: 0.95rem;
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

        .file-name {
            font-weight: 500;
            color: var(--text-primary);
        }

        .activity-type {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .activity-type .material-icons {
            font-size: 20px;
            color: var(--text-secondary);
        }

        .status-badge {
            padding: 0.375rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            display: inline-block;
        }

        .status-completed {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success-color);
        }

        .status-pending {
            background: rgba(245, 158, 11, 0.1);
            color: var(--warning-color);
        }

        .status-processing {
            background: rgba(37, 99, 235, 0.1);
            color: var(--primary-color);
        }

        .status-dispatched {
            background: rgba(139, 92, 246, 0.1);
            color: var(--accent-color);
        }

        .user-info {
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

        .user-details {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 500;
            color: var(--text-primary);
            font-size: 0.9rem;
        }

        .user-dept {
            font-size: 0.8rem;
            color: var(--text-secondary);
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .action-icon-btn {
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

        .action-icon-btn:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }

        .action-icon-btn .material-icons {
            font-size: 18px;
        }

        .timestamp {
            color: var(--text-secondary);
            font-size: 0.85rem;
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
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            animation: slideUp 0.3s ease;
        }

        @keyframes slideUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 2rem 2rem 1.5rem;
            border-bottom: 1px solid var(--border-color);
        }

        .modal-title {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .modal-title h2 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .modal-title .material-icons {
            font-size: 32px;
            color: var(--primary-color);
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
        }

        .modal-body {
            padding: 2rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-group.full-width {
            grid-column: span 2;
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

        .form-input {
            padding: 0.875rem 1rem;
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

        select.form-input {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 20px;
            padding-right: 3rem;
        }

        textarea.form-input {
            resize: vertical;
            min-height: 100px;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            padding: 1.5rem 2rem 2rem;
            border-top: 1px solid var(--border-color);
        }

        .btn {
            padding: 0.875rem 2rem;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
            display: flex;
            align-items: center;
            gap: 0.5rem;
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

        .btn-primary {
            background: var(--primary-color);
            border: 2px solid var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-hover);
            border-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .tiles-section {
                grid-template-columns: repeat(2, 1fr);
            }

            .activity-table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }
        }

        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
            }

            .actions-section {
                grid-template-columns: 1fr;
            }

            .tiles-section {
                grid-template-columns: 1fr;
            }

            .search-section {
                padding: 2rem 1.5rem;
            }

            .search-btn {
                position: static;
                width: 100%;
                margin-top: 1rem;
                transform: none;
            }

            .search-btn:hover {
                transform: scale(1.02);
            }

            .section-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .activity-section {
                padding: 1.5rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full-width {
                grid-column: span 1;
            }

            .modal-footer {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
    <link href="{{ asset('style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo-section">
                    <div class="logo-icon">
                        <i class="material-icons">folder_open</i>
                    </div>
                    <div class="logo-text">
                        <h1>File Tracking System</h1>
                        <p>Admin Panel</p>
                    </div>
                </div>

                <div style="display: flex; align-items: center; gap: 1.5rem;">
                    <div class="theme-toggle">
                        <div class="toggle-icons">
                            <i class="material-icons">light_mode</i>
                        </div>
                        <div class="toggle-switch" id="themeToggle" onclick="toggleTheme()"></div>
                        <div class="toggle-icons">
                            <i class="material-icons">dark_mode</i>
                        </div>
                    </div>

                    <a href="{{ route('logout') }}"
                        style="display: flex; align-items: center; color: var(--danger-color); text-decoration: none; padding: 0.5rem; border-radius: 8px; transition: background-color 0.3s ease;"
                        onmouseover="this.style.backgroundColor='rgba(239, 68, 68, 0.1)'"
                        onmouseout="this.style.backgroundColor='transparent'" title="Logout">
                        <i class="material-icons" style="font-size: 24px;">logout</i>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Search Section -->
            <section class="search-section">
                <div class="search-title">
                    <h2>Global File Search</h2>
                    <p>Search across all files, documents, and records instantly</p>
                </div>
                <form action="{{ route('search') }}" method="GET" class="search-container">
                    <i class="material-icons search-icon">search</i>
                    <input type="text" name="query" class="search-input"
                        placeholder="Search files by name, ID, date, or any keyword...">
                    <button type="submit" class="search-btn">Search</button>
                </form>
            </section>

            <!-- Action Buttons -->
            <section class="actions-section">
                <div class="action-btn" onclick="openModal()">
                    <div class="action-icon">
                        <i class="material-icons">add_circle</i>
                    </div>
                    <div class="action-text">
                        <h3>New File</h3>
                        <p>Create a new file entry</p>
                    </div>
                </div>

                <a href="{{ route('files.index') }}" style="text-decoration: none;">
                    <div class="action-btn">
                        <div class="action-icon">
                            <i class="material-icons">view_list</i>
                        </div>
                        <div class="action-text">
                            <h3>List of Files</h3>
                            <p>View all registered files</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('settings') }}" style="text-decoration: none;">
                    <div class="action-btn">

                        <div class="action-icon">
                            <i class="material-icons">settings</i>
                        </div>
                        <div class="action-text">
                            <h3>Settings</h3>
                            <p>System configuration</p>
                        </div>

                    </div>
                </a>
            </section>

            <!-- Info Tiles -->
            <section class="tiles-section">
                <div class="info-tile">
                    <div class="tile-header">
                        <div class="tile-icon">
                            <i class="material-icons">folder</i>
                        </div>
                        <span class="tile-badge">All Time</span>
                    </div>
                    <div class="tile-content">
                        <h3>{{ number_format($total_files) }}</h3>
                        <p>Total Files</p>
                    </div>
                </div>

                <div class="info-tile">
                    <a href="{{ route('files.index', ['status' => 'Pending']) }}" style="text-decoration: none;">
                        <div class="tile-header">
                            <div class="tile-icon">
                                <i class="material-icons">pending_actions</i>
                            </div>
                            <span class="tile-badge">Active</span>
                        </div>
                        <div class="tile-content">
                            <h3>{{ number_format($pending_files) }}</h3>
                            <p>Pending</p>
                        </div>
                    </a>
                </div>

                <div class="info-tile">
                    <a href="{{ route('files.index', ['status' => 'With Issue']) }}" style="text-decoration: none;">
                        <div class="tile-header">
                            <div class="tile-icon">
                                <i class="material-icons">error</i>
                            </div>
                            <span class="tile-badge">Issues</span>
                        </div>
                        <div class="tile-content">
                            <h3>{{ number_format($issue_files) }}</h3>
                            <p>With Issues</p>
                        </div>
                    </a>
                </div>

                <div class="info-tile">
                    <a href="{{ route('files.index', ['status' => 'Typed']) }}" style="text-decoration: none;">
                        <div class="tile-header">
                            <div class="tile-icon">
                                <i class="material-icons">keyboard</i>
                            </div>
                            <span class="tile-badge">Typed</span>
                        </div>
                        <div class="tile-content">
                            <h3>{{ number_format($typed_files) }}</h3>
                            <p>Typed</p>
                        </div>
                    </a>
                </div>

                <div class="info-tile">
                    <a href="{{ route('files.index', ['status' => 'Received Back']) }}"
                        style="text-decoration: none;">
                        <div class="tile-header">
                            <div class="tile-icon">
                                <i class="material-icons">assignment_return</i>
                            </div>
                            <span class="tile-badge">Returned</span>
                        </div>
                        <div class="tile-content">
                            <h3>{{ number_format($received_back_files) }}</h3>
                            <p>Received Back</p>
                        </div>
                    </a>
                </div>

                <div class="info-tile">
                    <a href="{{ route('files.index', ['status' => 'Specialist']) }}" style="text-decoration: none;">
                        <div class="tile-header">
                            <div class="tile-icon">
                                <i class="material-icons">medical_services</i>
                            </div>
                            <span class="tile-badge">Specialist</span>
                        </div>
                        <div class="tile-content">
                            <h3>{{ number_format($specialist_files) }}</h3>
                            <p>Specialist</p>
                        </div>
                    </a>
                </div>

                <div class="info-tile">
                    <a href="{{ route('files.index', ['status' => 'Member I']) }}" style="text-decoration: none;">
                        <div class="tile-header">
                            <div class="tile-icon">
                                <i class="material-icons">person</i>
                            </div>
                            <span class="tile-badge">Member I</span>
                        </div>
                        <div class="tile-content">
                            <h3>{{ number_format($member_i) }}</h3>
                            <p>Member I</p>
                        </div>
                    </a>
                </div>

                <div class="info-tile">
                    <a href="{{ route('files.index', ['status' => 'Member II']) }}" style="text-decoration: none;">
                        <div class="tile-header">
                            <div class="tile-icon">
                                <i class="material-icons">person_outline</i>
                            </div>
                            <span class="tile-badge">Member II</span>
                        </div>
                        <div class="tile-content">
                            <h3>{{ number_format($member_ii) }}</h3>
                            <p>Member II</p>
                        </div>
                    </a>
                </div>

                <div class="info-tile">
                    <a href="{{ route('files.index', ['status' => 'Member III']) }}" style="text-decoration: none;">
                        <div class="tile-header">
                            <div class="tile-icon">
                                <i class="material-icons">supervised_user_circle</i>
                            </div>
                            <span class="tile-badge">Member III</span>
                        </div>
                        <div class="tile-content">
                            <h3>{{ number_format($member_iii) }}</h3>
                            <p>Member III</p>
                        </div>
                    </a>
                </div>

                <div class="info-tile">
                    <a href="{{ route('files.index', ['status' => 'Commandant']) }}" style="text-decoration: none;">
                        <div class="tile-header">
                            <div class="tile-icon">
                                <i class="material-icons">military_tech</i>
                            </div>
                            <span class="tile-badge">Commandant</span>
                        </div>
                        <div class="tile-content">
                            <h3>{{ number_format($commandant_files) }}</h3>
                            <p>Commandant</p>
                        </div>
                    </a>
                </div>

                <div class="info-tile">
                    <a href="{{ route('files.index', ['status' => 'Dispatched']) }}" style="text-decoration: none;">
                        <div class="tile-header">
                            <div class="tile-icon">
                                <i class="material-icons">local_shipping</i>
                            </div>
                            <span class="tile-badge">Completed</span>
                        </div>
                        <div class="tile-content">
                            <h3>{{ number_format($dispatched_files) }}</h3>
                            <p>Dispatched</p>
                        </div>
                    </a>
                </div>
            </section>

            {{-- 
            <section class="activity-section">
                <div class="section-header">
                    <div class="section-title">
                        <i class="material-icons">history</i>
                        <h2>Recent Activity</h2>
                    </div>
                    <button class="view-all-btn">
                        View All
                        <i class="material-icons">arrow_forward</i>
                    </button>
                </div>
                
                <table class="activity-table">
                    <thead>
                        <tr>
                            <th>Date & Time</th>
                            <th>File ID</th>
                            <th>File Name</th>
                            <th>Activity</th>
                            <th>Status</th>
                            <th>User</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="timestamp">
                                    <div>Mar 11, 2026</div>
                                    <div style="font-size: 0.75rem;">09:45 AM</div>
                                </div>
                            </td>
                            <td><span class="file-id">FLT-2026-001</span></td>
                            <td><span class="file-name">Budget Report Q1</span></td>
                            <td>
                                <div class="activity-type">
                                    <i class="material-icons">edit</i>
                                    <span>Updated</span>
                                </div>
                            </td>
                            <td><span class="status-badge status-processing">Processing</span></td>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">JD</div>
                                    <div class="user-details">
                                        <span class="user-name">John Doe</span>
                                        <span class="user-dept">Finance</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-icon-btn" title="View">
                                        <i class="material-icons">visibility</i>
                                    </button>
                                    <button class="action-icon-btn" title="Edit">
                                        <i class="material-icons">edit</i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="timestamp">
                                    <div>Mar 11, 2026</div>
                                    <div style="font-size: 0.75rem;">09:32 AM</div>
                                </div>
                            </td>
                            <td><span class="file-id">FLT-2026-002</span></td>
                            <td><span class="file-name">Employee Contract</span></td>
                            <td>
                                <div class="activity-type">
                                    <i class="material-icons">add_circle</i>
                                    <span>Created</span>
                                </div>
                            </td>
                            <td><span class="status-badge status-pending">Pending</span></td>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">SM</div>
                                    <div class="user-details">
                                        <span class="user-name">Sarah Miller</span>
                                        <span class="user-dept">HR</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-icon-btn" title="View">
                                        <i class="material-icons">visibility</i>
                                    </button>
                                    <button class="action-icon-btn" title="Edit">
                                        <i class="material-icons">edit</i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="timestamp">
                                    <div>Mar 11, 2026</div>
                                    <div style="font-size: 0.75rem;">09:15 AM</div>
                                </div>
                            </td>
                            <td><span class="file-id">FLT-2026-003</span></td>
                            <td><span class="file-name">Project Proposal</span></td>
                            <td>
                                <div class="activity-type">
                                    <i class="material-icons">local_shipping</i>
                                    <span>Dispatched</span>
                                </div>
                            </td>
                            <td><span class="status-badge status-dispatched">Dispatched</span></td>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">MJ</div>
                                    <div class="user-details">
                                        <span class="user-name">Mike Johnson</span>
                                        <span class="user-dept">Operations</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-icon-btn" title="View">
                                        <i class="material-icons">visibility</i>
                                    </button>
                                    <button class="action-icon-btn" title="Edit">
                                        <i class="material-icons">edit</i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="timestamp">
                                    <div>Mar 10, 2026</div>
                                    <div style="font-size: 0.75rem;">04:30 PM</div>
                                </div>
                            </td>
                            <td><span class="file-id">FLT-2026-004</span></td>
                            <td><span class="file-name">Invoice #INV-4521</span></td>
                            <td>
                                <div class="activity-type">
                                    <i class="material-icons">check_circle</i>
                                    <span>Completed</span>
                                </div>
                            </td>
                            <td><span class="status-badge status-completed">Completed</span></td>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">EW</div>
                                    <div class="user-details">
                                        <span class="user-name">Emily Wilson</span>
                                        <span class="user-dept">Accounts</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-icon-btn" title="View">
                                        <i class="material-icons">visibility</i>
                                    </button>
                                    <button class="action-icon-btn" title="Edit">
                                        <i class="material-icons">edit</i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="timestamp">
                                    <div>Mar 10, 2026</div>
                                    <div style="font-size: 0.75rem;">03:20 PM</div>
                                </div>
                            </td>
                            <td><span class="file-id">FLT-2026-005</span></td>
                            <td><span class="file-name">Legal Agreement</span></td>
                            <td>
                                <div class="activity-type">
                                    <i class="material-icons">edit</i>
                                    <span>Updated</span>
                                </div>
                            </td>
                            <td><span class="status-badge status-processing">Processing</span></td>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">RB</div>
                                    <div class="user-details">
                                        <span class="user-name">Robert Brown</span>
                                        <span class="user-dept">Legal</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-icon-btn" title="View">
                                        <i class="material-icons">visibility</i>
                                    </button>
                                    <button class="action-icon-btn" title="Edit">
                                        <i class="material-icons">edit</i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section> --}}
        </div>
    </main>

    <!-- New File Modal -->
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
            <form method="POST" action="{{ route('files.store') }}">

                <div class="modal-body">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="material-icons">badge</i>
                                Patient No.
                            </label>
                            <input type="text" name="reg_no" oninput="checkExist(this.value)" class="form-input"
                                placeholder="Enter patient number" required>
                            <span class="text-danger" id="exist_text"></span>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="material-icons">person</i>
                                Name
                            </label>
                            <input type="text" name="patient_name" class="form-input"
                                placeholder="Enter patient name" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="material-icons">domain</i>
                                Unit
                            </label>
                            <input type="text" name="unit" class="form-input" placeholder="Enter unit"
                                required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="material-icons">meeting_room</i>
                                Wing
                            </label>
                            <input type="text" name="wing" class="form-input" placeholder="Enter wing"
                                required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="material-icons">info</i>
                                Status
                            </label>
                            <select name="status" class="form-input" required>
                                <option value="">Select status</option>
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
                            <label class="form-label">
                                <i class="material-icons">event</i>
                                Date
                            </label>
                            <input type="date" name="date" value="{{ date('Y-m-d') }}" class="form-input"
                                required>
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label">
                                <i class="material-icons">note</i>
                                Notes
                            </label>
                            <textarea class="form-input" name="notes" placeholder="Enter additional notes..." rows="4"></textarea>
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
                        Save File
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('assets/jquery.min.js') }}"></script>

    <script>
        // Theme Toggle Functionality
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

        // Close modal on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });

        // Add smooth scroll behavior
        document.querySelectorAll('.action-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Animation already handled by CSS
            });
        });
    </script>

    @include('layout.snakebar')

    <script>
        let _snackbarTimer = null;

        function showSnackbar(message, type) {
            type = type || 'success';
            var sb = document.getElementById('snackbar');
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
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                showSnackbar("{{ session('success') }}", 'success');
            @elseif (session('error'))
                showSnackbar("{{ session('error') }}", 'error');
            @endif
        });

        function checkExist(reg_no) {
            var exist_text = document.getElementById('exist_text');
            if (reg_no) {
                $.ajax({
                    url: "{{ route('files.checkExist', ':reg_no') }}".replace(':reg_no', reg_no),
                    type: "get",
                    success: function(response) {
                        console.log(response);
                        if (response.exists) {
                            exist_text.textContent = response.message;
                            exist_text.style.color = "red";
                        } else {
                            exist_text.textContent = "";
                        }
                    }
                });
            }
        }
    </script>
</body>

</html>
