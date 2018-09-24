<?php

declare(strict_types=1);

namespace BudgetPlanner\Migration;

use Illuminate\Database\Capsule\Manager as Capsule;
use Phinx\Migration\AbstractMigration;

class Migration extends AbstractMigration
{
    /** @var \Illuminate\Database\Capsule\Manager $capsule */
    protected $capsule;
    /** @var \Illuminate\Database\Schema\Builder $scheme */
    protected $scheme;

    public function init() {
        // Setup connection
        $this->capsule = new Capsule;
        $this->capsule->addConnection([
            'driver' => env('DB_DRIVER'),
            'host' => env('DB_HOST'),
            'port' => env('DB_PORT', ''),
            'database' => env('DB_DATABASE'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'charset' => env('DB_CHARSET'),
            'collation' => env('DB_COLLATION'),
            'prefix' => env('DB_PREFIX', ''),
        ]);
        $this->capsule->setAsGlobal();
        $this->capsule->bootEloquent();
        $this->scheme = $this->capsule->schema();
    }
}
