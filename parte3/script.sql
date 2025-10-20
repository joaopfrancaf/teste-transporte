USE appdb;

CREATE TABLE motoristas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  cnh VARCHAR(20) NOT NULL UNIQUE,
  telefone VARCHAR(20)
);

CREATE TABLE clientes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(120) NOT NULL,
  cidade VARCHAR(80)
);

CREATE TABLE entregas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  motorista_id INT NOT NULL,
  cliente_id INT NOT NULL,
  data DATE NOT NULL,
  destino VARCHAR(120) NOT NULL,
  status ENUM('pendente','em_transito','entregue','cancelada') NOT NULL,
  FOREIGN KEY (motorista_id) REFERENCES motoristas(id),
  FOREIGN KEY (cliente_id)  REFERENCES clientes(id)
);

INSERT INTO motoristas (nome, cnh, telefone) VALUES
  ('Carlos Silva', 'CNH12345678', '(51) 99999-1111'),
  ('Ana Souza',    'CNH87654321', '(51) 98888-2222'),
  ('João Pereira', 'CNH11223344', '(51) 97777-3333');

INSERT INTO clientes (nome, cidade) VALUES
  ('Loja Central',      'Porto Alegre'),
  ('Mercado Bom Preço', 'Canoas'),
  ('Farmácia Vida',     'São Leopoldo');

INSERT INTO entregas (motorista_id, cliente_id, data, destino, status) VALUES
  (1, 1, '2025-10-18', 'Av. Borges de Medeiros, 1000 - Porto Alegre', 'entregue'),
  (2, 2, '2025-10-19', 'Rua Florianópolis, 250 - Canoas',             'em_transito'),
  (3, 3, '2025-10-20', 'Rua Independência, 45 - São Leopoldo',        'pendente');
