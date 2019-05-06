<?php 

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

/**
 * Class RobotsMigration_100
 */
class CreatePostsMigration_100 extends Migration
{
    /**
     * Define the table structure
     *
     * @return void
     */
    public function morph()
    {
    }

    /**
     * Run the migrations
     *
     * @return void
     */
    public function up()
    {

        $this->db->createTable("posts", null, array(
            "columns" => array(
                new Column("id", array(
                    "type"  => Column::TYPE_INTEGER,
                    "size"  => 10,
                    "notNull"       => true,
                    "autoIncrement" => true,
                )),
                new Column("name", array(
                    "type"    => Column::TYPE_VARCHAR,
                    "size"    => 70,
                    "notNull" => true,
                )),
                new Column("description", array(
                    "type"    => Column::TYPE_INTEGER,
                    "size"    => 11,
                    "notNull" => true,
                ))
            ),
            "indexes" => array(
                new Index("PRIMARY", array("id"))
            )
        ));
    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {

    }

}
