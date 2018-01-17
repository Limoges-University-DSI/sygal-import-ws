<?php
namespace FirstRest\V1\Rest\Ping;

class PingEntity
{
    protected $id;
    protected $value;

    /**
     * PingEntity constructor.
     *
     * @param $id
     * @param $value
     */
    public function __construct($id, $value)
    {
        $this->id = $id;
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return PingEntity
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return PingEntity
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }


}
