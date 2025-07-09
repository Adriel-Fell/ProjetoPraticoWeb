-- -----------------------------------------------------
-- Table cliente
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS clientes (
  id SERIAL,
  nome VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  genero VARCHAR(2555) NOT NULL,
  temapreferido VARCHAR(255) NULL,
  PRIMARY KEY (id))
;
-- -----------------------------------------------------
-- Table livros
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS livros (
  id SERIAL,
  titulo VARCHAR(255) NOT NULL,
  tema VARCHAR(255) NOT NULL,
  autor VARCHAR(255) NOT NULL,
  PRIMARY KEY (id))
;
-- -----------------------------------------------------
-- Table alocacoes
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS alocacoes (
  id SERIAL PRIMARY KEY,
  Clientes_id INT NOT NULL,
  Livros_id INT NOT NULL,
  dataalocacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_alocacao_Clientes
    FOREIGN KEY (Clientes_id)
    REFERENCES Clientes (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_alocacao_Livros1
    FOREIGN KEY (Livros_id)
    REFERENCES Livros (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);
