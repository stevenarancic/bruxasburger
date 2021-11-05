<?php

namespace app\model\itens_cardapio;

class ItemCardapio
{
    private $id;
    private $categoria_id;
    private $imagem;
    private $nome;
    private $descricao;

    public function __construct($nome, $descricao, $categoria_id, $imagem)
    {
        $this->setNome($nome);
        $this->setDescricao($descricao);
        $this->setCategoriaId($categoria_id);
        $this->setImagem($imagem);
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
     * Get the value of descricao
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get the value of categoria_id
     */
    public function getCategoriaId()
    {
        return $this->categoria_id;
    }

    /**
     * Set the value of categoria_id
     *
     * @return  self
     */
    public function setCategoriaId($categoria_id)
    {
        $this->categoria_id = $categoria_id;

        return $this;
    }

    /**
     * Get the value of imagem
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * Set the value of imagem
     *
     * @return  self
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;

        return $this;
    }
}