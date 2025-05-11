@props([
    'type' => 'success', // success, danger, warning, info
    'message' => null,
])

@php
    $alertClass = match ($type) {
        'success' => 'alert-success',
        'danger' => 'alert-danger',
        'warning' => 'alert-warning',
        default => 'alert-info',
    };
@endphp

<div class="alert {{ $alertClass }} alert-dismissible alert-has-icon show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        {{ $message }}
    </div>
</div>
