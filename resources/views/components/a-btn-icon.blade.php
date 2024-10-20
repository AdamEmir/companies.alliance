@props([
    'circle' => true,
    'size' => 'sm'
])
<a
    {{
        $attributes->class([
            'btn btn-icon',
            'btn-' . $size,
            'btn-circle' => $circle
        ])
    }}
    {{ $attributes }}
>
    {{ $slot }}
</a>
