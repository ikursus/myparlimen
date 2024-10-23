@extends('layout.template-induk')

@push('css-tambahan')
<style>
    .container {
        display: flex;
        justify-content: center;
        padding: 20px;
    }

    .u-shape {
        display: grid;
        grid-template-columns: repeat(15, 20px);
        gap: 2px;
    }

    .box {
        width: 20px;
        height: 20px;
        border-radius: 2px;
        transition: all 0.3s;
        position: relative;
    }

    .box:hover {
        transform: scale(1.1);
        z-index: 2;
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }

    .box.hidden {
        visibility: hidden;
    }

    /* Tooltip style */
    .box:hover::after {
        content: attr(data-user);
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(0, 0, 0, 0.8);
        color: white;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        white-space: nowrap;
        z-index: 1000;
    }

    .legend {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 20px;
        padding: 10px;
        background: #f8f9fa;
        border-radius: 8px;
    }

    .legend-item {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .legend-color {
        width: 20px;
        height: 20px;
        border-radius: 2px;
    }
</style>
@endpush

@section('isi-kandungan-utama-halaman')
@php
    // Get AhliParlimen data and convert to array
    $users = $ahliParlimen->toArray();

    if (empty($users)) {
        throw new Exception('No AhliParlimen data available');
    }

    // Now shuffle the array
    shuffle($users);

    // Collect unique colors for legend, using collection methods
    $uniqueParties = collect($users)
        ->groupBy('parti_color')
        ->map(function ($group) {
            return [
                'color' => $group->first()['parti_color'],
                'label' => $group->first()['label'],
                'count' => count($group)
            ];
        });

    $userIndex = 0;
@endphp

<div class="container">
    <div>
        <div class="u-shape">
            @php
            $totalCols = 15;
            $totalRows = 15;
            $middleCol = floor($totalCols / 2);

            for ($i = 0; $i < $totalRows * $totalCols; $i++) {
                $row = floor($i / $totalCols);
                $col = $i % $totalCols;

                // Check if this position should have a visible box
                $isVisible = ($col < 3 || $col >= 12) || ($row >= 12);

                if ($isVisible) {
                    $user = $users[$userIndex] ?? null;
                    // Left side of U (including bottom left) is kerajaan
                    $expectedLabel = ($col < $middleCol || ($row >= 12 && $col < $middleCol))
                        ? 'kerajaan'
                        : 'pembangkang';

                    // Find next user with matching label
                    while ($user && $user['label'] !== $expectedLabel) {
                        $userIndex++;
                        $user = $users[$userIndex] ?? null;
                    }

                    if ($user) {
                        echo sprintf(
                            '<div class="box" style="background-color: %s" data-user="ID: %s - %s (%s)"></div>',
                            $user['parti_color'],
                            $user['id'],
                            $user['name'],
                            ucfirst($user['label'])
                        );
                        $userIndex++;
                    }
                } else {
                    echo '<div class="box hidden"></div>';
                }
            }
            @endphp
        </div>

        <div class="legend">
            @foreach($uniqueParties as $party)
                <div class="legend-item">
                    <div class="legend-color" style="background-color: {{ $party['color'] }}"></div>
                    <span>{{ ucfirst($party['label']) }} ({{ $party['count'] }})</span>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
