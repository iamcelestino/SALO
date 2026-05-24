<?php
declare(strict_types=1);

namespace App\Contracts;

interface SkillInterface extends BaseInterface
{
    public function findByName(string $name): ?array;
}

