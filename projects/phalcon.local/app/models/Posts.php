<?php

class Posts extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var integer
     */
    public $description;

    public $title;
    /**
     * @var string
     *
     */

    public $slug;
    /**
     * @var string
     *
     */

    public $content;
    /**
     * @var string
     *
     */

    public $created;
    /**
     * @var integer
     *
     */

    public $users_id;
    /**
     * @var integer
     *
     */

    public $categories_id;
    /**
     * Initializer method for model.
     */


    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("phalconDB");
        $this->setSource("posts");
        $this->belongsTo("users_id", "Users", "id");
        //$this->belongsTo("categories_id", "Categories", "id");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'posts';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Posts[]|Posts|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Posts|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
