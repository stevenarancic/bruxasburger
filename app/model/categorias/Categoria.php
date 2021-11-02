<?php

namespace app\model\categorias;

class Categoria
{
    private $id;
    private $nome;
    private $icone;

    public function __construct($nome, $icone)
    {
        $this->setNome($nome);
        $this->setIcone($icone);
    }

    /**
     * Get the value of id
     */
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

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of icone
     */
    public function getIcone()
    {
        return $this->icone;
    }

    /**
     * Set the value of icone
     *
     * @return  self
     */
    public function setIcone($icone)
    {
        $this->icone = $icone;

        return $this;
    }
}