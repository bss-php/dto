<?php

declare(strict_types=1);

namespace bss-php\dto\Cases;

class CamelCase extends AbstractCase
{
    protected function formatKeys(array $keys): array
    {
        return array_map(static fn (string $key) => lcfirst(self::toPascalCase($key)), $keys);
    }
}
