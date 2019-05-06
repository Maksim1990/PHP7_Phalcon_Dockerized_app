<?php

use Phalcon\Db\Column;
use Phalcon\Db\Index;

class GenerateController extends ControllerBase
{

    public function indexAction()
    {
        $migrations=array(
            "posts"=>array(
                "columns" => array(
                    new Column("id", array(
                        "type" => Column::TYPE_INTEGER,
                        "size" => 10,
                        "notNull" => true,
                        "autoIncrement" => true,
                    )),
                    new Column("name", array(
                        "type" => Column::TYPE_VARCHAR,
                        "size" => 70,
                        "notNull" => true,
                    )),
                    new Column("description", array(
                        "type" => Column::TYPE_INTEGER,
                        "size" => 11,
                        "notNull" => true,
                    ))
                ),
                "indexes" => array(
                    new Index("PRIMARY", array("id"))
                )
            ),
        );

        foreach ($migrations as $table=>$schema){
            $this->runMigration($table, $schema);
        }

    }

    public function runMigration($table, $schema){
        try {
            $this->db->createTable($table, null, $schema);
            echo "Table '".$table."' successfully created\n";
        } catch (\Exception $exception) {
            switch ($exception->getCode()) {
                case "42S01":
                    echo "Table '".$table."' already exists\n";
                    break;
                default:
                    echo "Unknown error happened";
            }
        }
    }

}

