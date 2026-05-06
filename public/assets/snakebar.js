let _snackbarTimer = null;

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