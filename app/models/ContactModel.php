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
            $this->createTable();
        } catch (Exception $e) {
            // Registrar o erro em um arquivo de log
            error_log("Erro ao inicializar o banco de dados: " . $e->getMessage());
            throw new Exception("Erro ao conectar ao banco de dados. Por favor, contate o administrador.");
        }
    }

    private function createTable()
    {
        $query = "CREATE TABLE IF NOT EXISTS contatos (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome TEXT NOT NULL,
            email TEXT NOT NULL,
            telefone TEXT NOT NULL,
            servico TEXT NOT NULL,
            mensagem TEXT,
            observacao TEXT,
            prazo_projeto TEXT,
            prefere_whatsapp INTEGER DEFAULT 0,
            data_envio DATETIME DEFAULT CURRENT_TIMESTAMP
        )";
        
        $this->db->exec($query);

        // Verificar se as novas colunas existem
        $result = $this->db->query("PRAGMA table_info(contatos)");
        $hasPrazo = false;
        $hasWhatsapp = false;
        $hasObservacao = false;
        
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            if ($row['name'] === 'observacao') {
                $hasObservacao = true;
            }
            if ($row['name'] === 'prazo_projeto') {
                $hasPrazo = true;
            }
            if ($row['name'] === 'prefere_whatsapp') {
                $hasWhatsapp = true;
            }
        }
        
        // Adicionar as colunas se não existirem
        if (!$hasObservacao) {
            $this->db->exec("ALTER TABLE contatos ADD COLUMN observacao TEXT");
        }
        if (!$hasPrazo) {
            $this->db->exec("ALTER TABLE contatos ADD COLUMN prazo_projeto TEXT");
        }
        if (!$hasWhatsapp) {
            $this->db->exec("ALTER TABLE contatos ADD COLUMN prefere_whatsapp INTEGER DEFAULT 0");
        }
    }

    public function save($data)
    {
        try {
            $stmt = $this->db->prepare('
                INSERT INTO contatos (
                    nome, email, telefone, servico, mensagem, 
                    observacao, prazo_projeto, prefere_whatsapp
                )
                VALUES (
                    :nome, :email, :telefone, :servico, :mensagem,
                    :observacao, :prazo_projeto, :prefere_whatsapp
                )
            ');

            $stmt->bindValue(':nome', $data['nome'], SQLITE3_TEXT);
            $stmt->bindValue(':email', $data['email'], SQLITE3_TEXT);
            $stmt->bindValue(':telefone', $data['telefone'], SQLITE3_TEXT);
            $stmt->bindValue(':servico', $data['servico'], SQLITE3_TEXT);
            $stmt->bindValue(':mensagem', $data['mensagem'], SQLITE3_TEXT);
            $stmt->bindValue(':observacao', isset($data['observacao']) ? $data['observacao'] : '', SQLITE3_TEXT);
            $stmt->bindValue(':prazo_projeto', isset($data['prazo_projeto']) ? $data['prazo_projeto'] : '', SQLITE3_TEXT);
            $stmt->bindValue(':prefere_whatsapp', isset($data['prefere_whatsapp']) ? 1 : 0, SQLITE3_INTEGER);

            $result = $stmt->execute();
            
            if ($result) {
                // Retornar o ID do último registro inserido
                return $this->db->lastInsertRowID();
            }
            
            return false;
        } catch (Exception $e) {
            error_log("Erro ao salvar contato: " . $e->getMessage());
            return false;
        }
    }

    public function getAll()
    {
        try {
            $result = $this->db->query('SELECT * FROM contatos ORDER BY data_envio DESC');
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
            $stmt = $this->db->prepare('DELETE FROM contatos WHERE id = :id');
            $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Erro ao excluir contato: " . $e->getMessage());
            return false;
        }
    }

    public function update($id, $data)
    {
        try {
            $stmt = $this->db->prepare("
                UPDATE contatos 
                SET nome = :nome,
                    email = :email,
                    telefone = :telefone,
                    servico = :servico,
                    mensagem = :mensagem,
                    observacao = :observacao,
                    prazo_projeto = :prazo_projeto,
                    prefere_whatsapp = :prefere_whatsapp
                WHERE id = :id
            ");
            
            $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
            $stmt->bindValue(':nome', $data['nome'], SQLITE3_TEXT);
            $stmt->bindValue(':email', $data['email'], SQLITE3_TEXT);
            $stmt->bindValue(':telefone', $data['telefone'], SQLITE3_TEXT);
            $stmt->bindValue(':servico', $data['servico'], SQLITE3_TEXT);
            $stmt->bindValue(':mensagem', $data['mensagem'], SQLITE3_TEXT);
            $stmt->bindValue(':observacao', isset($data['observacao']) ? $data['observacao'] : '', SQLITE3_TEXT);
            $stmt->bindValue(':prazo_projeto', isset($data['prazo_projeto']) ? $data['prazo_projeto'] : '', SQLITE3_TEXT);
            $stmt->bindValue(':prefere_whatsapp', isset($data['prefere_whatsapp']) ? 1 : 0, SQLITE3_INTEGER);
            
            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Erro ao atualizar contato: " . $e->getMessage());
            return false;
        }
    }
} 