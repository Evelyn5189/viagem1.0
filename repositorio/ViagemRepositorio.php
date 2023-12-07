<?php
class ViagemRepositorio
{
    private $conn; // Sua conexão com o banco de dados
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function cadastrar(Viagem $viagem)
    {
        $sql = "INSERT INTO viagens (tipo, nome, 
        imagem, preco) VALUES (?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "sssd",
            $viagem->getTipo(),
            $viagem->getNome(),
            $viagem->getImagemDiretorio(),
            $viagem->getPreco()
        );

        // Executa a consulta preparada e verifica o sucesso
        $success = $stmt->execute();

        // Fecha a declaração
        $stmt->close();

        // Retorna um indicador de sucesso
        return $success;
    }


    public function listarViagens()
    {
        $sql = "SELECT * FROM viagens where tipo = 'Viagem' 
        ORDER BY preco";
        $result = $this->conn->query($sql);

        $viagens = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $viagem = new Viagem(
                    $row['id'],
                    $row['tipo'],
                    $row['nome'],
                    $row['preco'],
                    $row['imagem']
                    
                );
                $viagens[] = $viagem;
            }
        }

        return $viagens;
    }
    public function atualizarViagem(Viagem $viagem)
    {
        $imagem = $viagem->getImagem();
        if (empty($imagem)) {
            // Prepara a declaração SQL
            $sql = "UPDATE viagens SET tipo = ?, nome = ?,  preco = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);

            // Extrai os atributos do objeto Viagem
            $tipo = $viagem->getTipo();
            $nome = $viagem->getNome();

            $preco = $viagem->getPreco();
            $id = $viagem->getId();

            // Vincula os parâmetros
            $stmt->bind_param(
                'ssdi',
                $tipo,
                $nome,

                $preco,
                $id
            );
            // Executa a declaração preparada
            $resultado = $stmt->execute();

            // Fecha a declaração
            $stmt->close();

            return $resultado;
        } else {
            // Prepara a declaração SQL
            $sql = "UPDATE viagens SET tipo = ?, nome = ?, imagem = ?, preco = ? WHERE id = ?";

            $stmt = $this->conn->prepare($sql);
            // Extrai os atributos do objeto Produto
            $tipo = $viagem->getTipo();
            $nome = $viagem->getNome();
            $imagem = $viagem->getImagemDiretorio();
            $preco = $viagem->getPreco();
            $id = $viagem->getId();

            // Vincula os parâmetros
            $stmt->bind_param(
                'sssdi',
                $tipo,
                $nome,
                $imagem,
                $preco,
                $id
            );
            // Executa a declaração preparada
            $resultado = $stmt->execute();

            // Fecha a declaração
            $stmt->close();

            return $resultado;
        }
    }

    public function listarViagemPorId($id)
    {
        $sql = "SELECT * FROM viagens WHERE tipo = 'Viagem' 
            AND id = ? ORDER BY preco LIMIT 1";

        // Prepara a declaração SQL
        $stmt = $this->conn->prepare($sql);

        // Vincula o parâmetro
        $stmt->bind_param('i', $id);

        // Executa a consulta preparada
        $stmt->execute();

        // Obtém os resultados
        $result = $stmt->get_result();

        $viagem = null;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $viagem = new Viagem(
                $row['id'],
                $row['tipo'],
                $row['nome'],
                $row['preco'],
                $row['imagem']
                
            );
        }

        // Fecha a declaração
        $stmt->close();

        return $viagem;
    }


    public function excluirViagemPorId($id)
    {
        $sql = "DELETE FROM viagens WHERE  
             id = ?";

        // Prepara a declaração SQL
        $stmt = $this->conn->prepare($sql);

        // Vincula o parâmetro
        $stmt->bind_param('i', $id);

        // Executa a consulta preparada
        $success = $stmt->execute();

        // Fecha a declaração
        $stmt->close();

        return $success;
    }

    public function buscarTodos()
    {
        $sql = "SELECT * FROM viagens ORDER BY tipo, preco";
        $result = $this->conn->query($sql);

        $viagens = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $viagem = new Viagem(
                    $row['id'],
                    $row['tipo'],
                    $row['nome'],
                    $row['preco'],
                    $row['imagem']
                    
                );
                $viagens[] = $viagem;
            }
        }

        return $viagens;
    }
}
