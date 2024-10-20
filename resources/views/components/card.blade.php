@props([
    'collapsed' => false,
    'title' => 'Card Title Here',
    'header' => true,
    'toolbar' => true,
    'collapsible' => true,
    'collapsibleTitle' => "Toggle Card",
    'reloadable' => false,
    'reloadableTitle' => "Reload Card",
    'removable' => false,
    'removableTitle' => "Remove Card",
])
<div
    {{-- @class(['card card-custom', 'card-collapsed' => $collapsed]) --}}
    {{ $attributes->class(['card card-custom', 'card-collapsed' => $collapsed]) }}
    x-data="{ open : {!! !$collapsed !!} }"
    data-card="true"
>
    @if ($header)
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">{{ $title }}</h3>
        </div>
        @if ($toolbar)
            <div class="card-toolbar">
                @if ($collapsible)
                <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="{{ $collapsibleTitle}}" x-on:click.prevent="open = !open">
                    <i class="ki ki-arrow-down icon-nm"></i>
                </a>
                @endif
                @if ($reloadable)
                <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="reload" data-toggle="tooltip" data-placement="top" title="{{ $reloadableTitle }}">
                    <i class="ki ki-reload icon-nm"></i>
                </a>
                @endif
                @if ($removable)
                <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary" data-card-tool="remove" data-toggle="tooltip" data-placement="top" title="{{ $removableTitle }}">
                    <i class="ki ki-close icon-nm"></i>
                </a>
                @endif
            </div>
        @endif
    </div>
    @endif
    <div x-show="open">
        {{ $slot }}
    </div>
</div>
