@extends('layouts.login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5">
            <div class="card login-card">
                <div class="card-header text-center">
                    <h4 class="mb-0">{{ __('Welcome Back') }}</h4>
                    <p class="text-muted small mb-0">{{ __('Sign in to your account') }}</p>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" id="loginForm">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <div class="input-group-animated">
                                <span class="input-icon">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input id="email" 
                                       type="email" 
                                       class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       required 
                                       autocomplete="email" 
                                       autofocus
                                       placeholder="your@email.com">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <div class="input-group-animated">
                                <span class="input-icon">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input id="password" 
                                       type="password" 
                                       class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                       name="password" 
                                       required 
                                       autocomplete="current-password"
                                       placeholder="••••••••">
                                <button type="button" class="password-toggle" id="togglePassword">
                                    <i class="bi bi-eye" id="toggleIcon"></i>
                                </button>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       name="remember" 
                                       id="remember" 
                                       {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <a class="text-decoration-none" href="{{ route('password.request') }}">
                                    {{ __('Forgot Password?') }}
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100 login-btn">
                            <span class="btn-text">{{ __('Login') }}</span>
                            <span class="btn-loader d-none">
                                <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                {{ __('Logging in...') }}
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.login-card {
    border: none;
    border-radius: 16px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    animation: slideUp 0.5s ease-out;
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

.login-card .card-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 2rem;
    border: none;
}

.login-card .card-body {
    padding: 2rem;
}

.input-group-animated {
    position: relative;
}

.input-icon {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: #6c757d;
    z-index: 10;
    transition: color 0.3s ease;
}

.input-group-animated input {
    padding-left: 48px;
    padding-right: 48px;
    border: 2px solid #e9ecef;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.input-group-animated input:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
    transform: translateY(-2px);
}

.input-group-animated input:focus ~ .input-icon,
.input-group-animated input:focus + .input-icon {
    color: #667eea;
}

.password-toggle {
    position: absolute;
    right: 16px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #6c757d;
    cursor: pointer;
    z-index: 10;
    transition: all 0.3s ease;
    padding: 4px 8px;
}

.password-toggle:hover {
    color: #667eea;
    transform: translateY(-50%) scale(1.1);
}

.form-check-input:checked {
    background-color: #667eea;
    border-color: #667eea;
}

.form-check-input:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
}

.login-btn {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    border-radius: 10px;
    padding: 14px;
    font-weight: 600;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.login-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s ease;
}

.login-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
}

.login-btn:hover::before {
    left: 100%;
}

.login-btn:active {
    transform: translateY(0);
}

.login-btn.loading {
    pointer-events: none;
}

.form-label {
    font-weight: 600;
    color: #495057;
    margin-bottom: 0.5rem;
}

a {
    color: #667eea;
    transition: color 0.3s ease;
}

a:hover {
    color: #764ba2;
}

/* Floating label animation */
.input-group-animated input:focus::placeholder {
    opacity: 0.5;
    transform: translateY(-4px);
}

/* Error state animation */
.is-invalid {
    animation: shake 0.5s;
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
    20%, 40%, 60%, 80% { transform: translateX(5px); }
}

/* Responsive */
@media (max-width: 576px) {
    .login-card .card-header,
    .login-card .card-body {
        padding: 1.5rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Password toggle
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');

    if (togglePassword) {
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            toggleIcon.classList.toggle('bi-eye');
            toggleIcon.classList.toggle('bi-eye-slash');
        });
    }

    // Form submission animation
    const loginForm = document.getElementById('loginForm');
    const loginBtn = document.querySelector('.login-btn');
    
    if (loginForm) {
        loginForm.addEventListener('submit', function() {
            loginBtn.classList.add('loading');
            loginBtn.querySelector('.btn-text').classList.add('d-none');
            loginBtn.querySelector('.btn-loader').classList.remove('d-none');
        });
    }

    // Input focus animation
    const inputs = document.querySelectorAll('.input-group-animated input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    });
});
</script>

<!-- Add Bootstrap Icons if not already included -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
@endsection
