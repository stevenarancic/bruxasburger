<?php

namespace app\model\filiais;

class ImagemFilial
{
    private $id, $filial_id, $nome;

    public function __construct($filial_id, $nome)
    {
        $this->setFilialId($filial_id);
        $this->setNome($nome);
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getFilialId()
    {
        return $this->filial_id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setFilialId($filial_id)
    {
        $this->filial_id = $filial_id;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }
}