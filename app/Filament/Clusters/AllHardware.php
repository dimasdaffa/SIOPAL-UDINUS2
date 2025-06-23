<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class AllHardware extends Cluster
{
    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $navigationLabel = 'Data Hardware';

    protected static ?int $navigationSort = 10;

    // If you want to customize the cluster URL path
    protected static ?string $slug = 'hardware';

    // To explain in the navigation what this cluster is for
    protected static ?string $navigationGroup = 'MASTER DATA';
}
