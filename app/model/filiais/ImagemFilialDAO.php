<?php

namespace app\model\filiais;

use app\model\Conexao;

class ImagemFilialDAO
{
    public function createImagemFilial(ImagemFilial $imagem_filial)
    {
        $sql = "INSERT INTO imagem_filial(nome, filial_id) VALUES(:nome, :filial_id)";

        $stmt = Conexao::getInstance()->prepare($sql);

        $stmt->bindValue(':nome', $imagem_filial->getNome());
        $stmt->bindValue(':filial_id', $imagem_filial->getFilialId());

        $stmt->execute();
    }

    public function filtrarPorFilial($id)
    {
        $sql = "SELECT * FROM `imagem_filial` WHERE filial_id = {$id}";

        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            return "Nenhuma imagem cadastrada :(";
        }
    }

    // Serve para deletar apenas uma única imagem, usa o ID dessa mesma imagem
    public function deleteImagemFilial($id)
    {
        $sql = "DELETE FROM imagem_filial WHERE id = {$id}";
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();
    }

    // Serve para deletar todas as imagens da filial, usando o ID da filial
    public function deleteImagensFilial($filial_id)
    {
        $sql = "DELETE FROM imagem_filial WHERE filial_id = {$filial_id}";
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();
    }

    public function filtrarImagemPorId($id)
    {
        $sql = "SELECT * FROM `imagem_filial` WHERE id = {$id}";

        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            return "Nenhuma imagem cadastrada :(";
        }
    }
}