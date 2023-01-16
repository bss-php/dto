<?php

return bss-php\Fixer\Config::make()
    ->in(__DIR__)
    ->preset(
        new bss-php\Fixer\Presets\PrettyLaravel()
    )
    ->out();
