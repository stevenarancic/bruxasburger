<?php

namespace app\model\categorias;

use app\model\Conexao;
use PDO;

class CategoriaDAO
{
    public function createCategoria(Categoria $categoria)
    {
        $sql = "INSERT INTO cardapio_categoria(nome, icone) VALUES(:nome, :icone)";

        $stmt = Conexao::getInstance()->prepare($sql);

        $stmt->bindValue(':nome', $categoria->getNome());
        $stmt->bindValue(':icone', $categoria->getIcone());

        $stmt->execute();
    }

    public function readCategoria()
    {
        $sql = "SELECT * FROM cardapio_categoria";

        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return "Nada encontrado :(";
        }
    }

    public function filtrarCategoria($id)
    {
        $sql = "SELECT * FROM cardapio_categoria WHERE id = :id";

        $stmt = Conexao::getInstance()->prepare($sql);

        $stmt->bindValue(':id', $id);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            return "Categoria não encontrada :(";
        }
    }

    public function updateCategoria(Categoria $categoria)
    {
        $sql = "UPDATE cardapio_categoria SET nome = :nome, icone = :icone WHERE id = :id";

        $stmt = Conexao::getInstance()->prepare($sql);

        $stmt->bindValue(':nome', $categoria->getNome());
        $stmt->bindValue(':icone', $categoria->getIcone());
        $stmt->bindValue(':id', $categoria->getId());

        $stmt->execute();
    }

    public function deleteCategoria($id)
    {
        $sql = "DELETE FROM cardapio_categoria WHERE id = :id";

        $stmt = Conexao::getInstance()->prepare($sql);

        $stmt->bindValue(':id', $id);

        $stmt->execute();
    }
}