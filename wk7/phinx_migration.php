<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTable extends AbstractMigration
{
    public function change()
    {
        // create the table
        $table = $this->table('monster');
        $table->addColumn('Name', 'string', ['limit' => 20, 'null' => false])
              ->addColumn('Image', 'binary', ['null' => false])
              ->addColumn('Audio', 'binary', ['null' => false])
              ->create();
    }
}
?>