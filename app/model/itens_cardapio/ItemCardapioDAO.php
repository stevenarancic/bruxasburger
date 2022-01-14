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
        $sql = "SELECT *, item.nome as item_nome, item.id as item_id FROM cardapio_item as item INNER JOIN cardapio_categoria as categoria ON item.categoria_id = categoria.id";

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
        $sql = "UPDATE cardapio_item SET imagem = :imagem, nome = :nome, descricao = :descricao, categoria_id = :categoria_id WHERE id = :id";

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

    public function createImagemItemCardapio($nomeDaImagem, $caminhoAtualImagem)
    {
        $caminhoSalvamentoImagem = "../../../assets/img/cardapio_itens/{$nomeDaImagem}";

        if (!file_exists('../../../assets/img/cardapio_itens/')) {
            mkdir('../../../assets/img/cardapio_itens/', 0777, true);
        }

        move_uploaded_file($caminhoAtualImagem, $caminhoSalvamentoImagem);
    }

    public function updateImagemItemCardapio($nomeImagem)
    {
        $caminhoAtualImagem = $_FILES['imagem_item_cardapio']['tmp_name'];
        $caminhoNovaImagem = "../../../assets/img/cardapio_itens/{$nomeImagem}";

        if (!file_exists('../../../assets/img/cardapio_itens/')) {
            mkdir('../../../assets/img/cardapio_itens/', 0777, true);
        }

        if (file_exists($caminhoNovaImagem)) {
            if ($nomeImagem != "") {
                if (unlink($caminhoNovaImagem)) {
                    move_uploaded_file($caminhoAtualImagem, $caminhoNovaImagem);
                } else {
                    echo "A imagem {$nomeImagem} não pode ser apagada!";
                }
            }
        } else {
            if ($nomeImagem != "") {
                move_uploaded_file($caminhoAtualImagem, $caminhoNovaImagem);
            }
        }
    }

    public function deleteImagemItemCardapio($id)
    {
        $sql = "SELECT imagem FROM cardapio_item WHERE id = {$id}";

        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            foreach ($stmt->fetchAll(\PDO::FETCH_ASSOC) as $key => $item) {
                unlink("../../../assets/img/cardapio_itens/{$item['imagem']}");
            }
        } else {
            return "Item não encontrado :(";
        }
    }
}