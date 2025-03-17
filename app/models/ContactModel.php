<?php

class ContactModel
{
    private $db;

    public function __construct()
    {
        $this->initDatabase();
    }

    private function initDatabase()
    {
        try {
            // Verificar se o diretório pai existe e tem permissões de escrita
            $dbDir = dirname(DB_FILE);
            if (!is_writable($dbDir)) {
                throw new Exception("O diretório '$dbDir' não tem permissões de escrita.");
            }

            // Se o arquivo não existe, verificar se podemos criar
            if (!file_exists(DB_FILE)) {
                $testFile = @fopen(DB_FILE, 'w');
                if ($testFile === false) {
                    throw new Exception("Não foi possível criar o arquivo do banco de dados em '" . DB_FILE . "'");
                }
                fclose($testFile);
            }

            // Verificar se o arquivo do banco de dados tem permissões de escrita
            if (file_exists(DB_FILE) && !is_writable(DB_FILE)) {
                throw new Exception("O arquivo do banco de dados não tem permissões de escrita.");
            }

            // Conectar ao banco de dados
            $this->db = new SQLite3(DB_FILE);
            $this->db->enableExceptions(true);

            // Criar tabela se não existir
            $this->db->exec('
                CREATE TABLE IF NOT EXISTS contacts (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    nome TEXT NOT NULL,
                    email TEXT NOT NULL,
                    telefone TEXT,
                    servico TEXT NOT NULL,
                    mensagem TEXT,
                    data_envio DATETIME DEFAULT CURRENT_TIMESTAMP
                )
            ');
        } catch (Exception $e) {
            // Registrar o erro em um arquivo de log
            error_log("Erro ao inicializar o banco de dados: " . $e->getMessage());
            throw new Exception("Erro ao conectar ao banco de dados. Por favor, contate o administrador.");
        }
    }

    public function save($data)
    {
        try {
            $stmt = $this->db->prepare('
                INSERT INTO contacts (nome, email, telefone, servico, mensagem)
                VALUES (:nome, :email, :telefone, :servico, :mensagem)
            ');

            $stmt->bindValue(':nome', $data['nome'], SQLITE3_TEXT);
            $stmt->bindValue(':email', $data['email'], SQLITE3_TEXT);
            $stmt->bindValue(':telefone', $data['telefone'], SQLITE3_TEXT);
            $stmt->bindValue(':servico', $data['servico'], SQLITE3_TEXT);
            $stmt->bindValue(':mensagem', $data['mensagem'], SQLITE3_TEXT);

            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Erro ao salvar contato: " . $e->getMessage());
            return false;
        }
    }

    public function getAll()
    {
        try {
            $result = $this->db->query('SELECT * FROM contacts ORDER BY data_envio DESC');
            $contacts = [];

            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                $contacts[] = $row;
            }

            return $contacts;
        } catch (Exception $e) {
            error_log("Erro ao buscar contatos: " . $e->getMessage());
            return [];
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->db->prepare('DELETE FROM contacts WHERE id = :id');
            $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Erro ao excluir contato: " . $e->getMessage());
            return false;
        }
    }
} 