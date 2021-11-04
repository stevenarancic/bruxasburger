<?php

namespace app\model\itens_cardapio;

use app\model\Conexao;
use app\model\itens_cardapio\ItemCardapio;

class ItemCardapioDAO
{
    public function createItemCardapio(ItemCardapio $itemCardapio)
    {
        $sql = "INSERT INTO cardapio_item(imagem, nome, descricao, categoria_id) VALUES(:imagem, :nome, :descricao, :categoria_id)";

        $stmt = Conexao::getInstance()->prepare($sql);

        $stmt->bindValue(':imagem', $itemCardapio->getImagem());
        $stmt->bindValue(':nome', $itemCardapio->getNome());
        $stmt->bindValue(':descricao', $itemCardapio->getDescricao());
        $stmt->bindValue(':categoria_id', $itemCardapio->getCategoriaId());

        $stmt->execute();
    }

    public function readItemCardapio()
    {
        $sql = "SELECT *, item.nome as item_nome FROM cardapio_item as item INNER JOIN cardapio_categoria as categoria ON item.categoria_id = categoria.id";

        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            return "Nenhum item foi cadastrado :(";
        }
    }

    public function filtrarItemCardapio($id)
    {
        $sql = "SELECT * FROM cardapio_item WHERE id = :id";

        $stmt = Conexao::getInstance()->prepare($sql);

        $stmt->bindValue(':id', $id);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            return "Item não encontrado :(";
        }
    }

    public function updateItemCardapio(ItemCardapio $itemCardapio)
    {
        $sql = "UPDATE cardapio_item SET imagem = :imagem nome = :nome, descricao = :descricao, categoria_id = :categoria_id WHERE id = :id";

        $stmt = Conexao::getInstance()->prepare($sql);

        $stmt->bindValue(':imagem', $itemCardapio->getImagem());
        $stmt->bindValue(':nome', $itemCardapio->getNome());
        $stmt->bindValue(':descricao', $itemCardapio->getDescricao());
        $stmt->bindValue(':categoria_id', $itemCardapio->getCategoriaId());
        $stmt->bindValue(':id', $itemCardapio->getId());

        $stmt->execute();
    }

    public function deleteItemCardapio($id)
    {
        $sql = "DELETE FROM cardapio_item WHERE id = :id";

        $stmt = Conexao::getInstance()->prepare($sql);

        $stmt->bindValue(':id', $id);

        $stmt->execute();
    }
}