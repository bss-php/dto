<?php

return bssphp\Fixer\Config::make()
    ->in(__DIR__)
    ->preset(
        new bssphp\Fixer\Presets\PrettyLaravel()
    )
    ->out();
