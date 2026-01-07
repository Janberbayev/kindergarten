@extends('layouts.app')

@section('content')
<div class="container main-content">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Welcome Card -->
            <div class="card border-0 shadow-lg mb-4" style="background: linear-gradient(135deg, #FF6B9D 0%, #FFC93C 100%);">
                <div class="card-body p-5 text-white text-center">
                    <h1 class="display-4 fw-bold mb-3">
                        <i class="bi bi-emoji-smile"></i> Welcome Back!
                    </h1>
                    <p class="lead">Hello, {{ Auth::user()->name }}! Ready for another fun day?</p>
                </div>
            </div>

            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Quick Actions -->
            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow h-100 feature-card">
                        <div class="card-body text-center">
                            <div class="feature-icon">
                                <i class="bi bi-file-earmark-text"></i>
                            </div>
                            <h5 class="fw-bold mb-3" style="color: #FF6B9D;">Articles</h5>
                            <p class="text-muted mb-3">View and manage articles</p>
                            @canany(['create articles', 'edit articles', 'delete articles', 'view articles'])
                                <a href="{{ route('articles.index') }}" class="btn btn-primary">
                                    <i class="bi bi-arrow-right"></i> Go to Articles
                                </a>
                            @else
                                <p class="text-muted small">No access</p>
                            @endcanany
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow h-100 feature-card">
                        <div class="card-body text-center">
                            <div class="feature-icon">
                                <i class="bi bi-people"></i>
                            </div>
                            <h5 class="fw-bold mb-3" style="color: #FFC93C;">Users</h5>
                            <p class="text-muted mb-3">Manage user accounts</p>
                            @can('manage users')
                                <a href="{{ route('users.index') }}" class="btn btn-primary">
                                    <i class="bi bi-arrow-right"></i> Manage Users
                                </a>
                            @else
                                <p class="text-muted small">No access</p>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow h-100 feature-card">
                        <div class="card-body text-center">
                            <div class="feature-icon">
                                <i class="bi bi-person-circle"></i>
                            </div>
                            <h5 class="fw-bold mb-3" style="color: #4ECDC4;">Profile</h5>
                            <p class="text-muted mb-3">View your profile information</p>
                            <p class="text-muted small">
                                <strong>Name:</strong> {{ Auth::user()->name }}<br>
                                <strong>Email:</strong> {{ Auth::user()->email }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Information Card -->
            <div class="card border-0 shadow-lg">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-3" style="color: #FF6B9D;">
                        <i class="bi bi-info-circle"></i> Quick Information
                    </h4>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    You are successfully logged in!
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-shield-check text-info me-2"></i>
                                    Your account is secure
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <i class="bi bi-calendar3 text-warning me-2"></i>
                                    Today: {{ now()->format('l, F j, Y') }}
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-clock text-primary me-2"></i>
                                    Time: {{ now()->format('g:i A') }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
