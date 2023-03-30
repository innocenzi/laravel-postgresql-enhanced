<?php

declare(strict_types=1);

namespace Tpetry\PostgresqlEnhanced\Schema\Grammars;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Fluent;

trait GrammarTable
{
    /**
     * Compile a table unlogged command.
     */
    public function compileUnlogged(Blueprint $blueprint, Fluent $command): string
    {
        return match ((bool) $command->get('value')) {
            true => "alter table {$this->wrapTable($blueprint->getTable())} set unlogged",
            false => "alter table {$this->wrapTable($blueprint->getTable())} set logged",
        };
    }
}
