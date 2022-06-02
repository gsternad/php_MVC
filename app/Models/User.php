<?php

namespace App\Models;

use PDO;
use PDOException;
use App\Core\Config;
use App\Core\Database;

/**
 * Loads database connection.
 */
class User
{
    /** @var array|PDO|null */
    private $instance;
    /** @var $id */
    protected $id;
    /** @var $username */
    protected $username;
    /** @var $password */
    protected $password;
    /** @var $name */
    protected $name;
    /** @var $surname */
    protected $surname;

    /**
     * Loads Database instance
     */
    public function __construct()
    {
        $this->instance = Database::getInstance();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->surname;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param $id
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param $username
     * @return void
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param $password
     * @return void
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param $surname
     * @return void
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * CRUO operations
     */

    /**
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
        // IMPLEMENT
    }

    /**
     * @param string $query
     * @param array|null $params
     * @param string $type
     * @return mixed
     */
    public function read(string $query, ?array $params, string $type = 'fetchAll')
    {
        $dbh = $this->instance->prepare($query);
        $dbh->execute($params);
        return $dbh ->{$type}();
    }

    /**
     * @param int $id
     * @param array $data
     * @return void
     */
    public function update(int $id, array $data)
    {
        // IMPLEMENT
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {
        // IMPLEMENT
    }

    /**
     * Wrappers
     */

    /**
     * Poor man's reflection class to populate the list.
     *
     * @param $result
     * @return $this
     * @note WIP - for future use.
     */
    public function populate($result) : User
    {
        $property = $result;
        do {
            foreach ($result AS $k => $v) {
                if (!is_array($v)) {
                    $this->{$k} = $v;
                    unset($property[$k]);
                }
                else {
                    $this->{$v[0]} = $v[1];
                }
            }
        }
        while (property_exists($this, $property));
        return $this;
    }
}

