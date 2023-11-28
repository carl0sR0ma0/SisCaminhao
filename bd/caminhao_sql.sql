USE sistema_caminhao;

CREATE TABLE caminhao (
    id integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
	placa VARCHAR(8) NOT NULL,
    nome VARCHAR(200),
    modelo VARCHAR(50),
    marca VARCHAR(50),
    eixos integer,
    quilometragem double,
    dt_proxima_troca date,
    quilometragem_proxima_troca double
);

CREATE TABLE historico_abastecimento (
    id_caminhao integer NOT NULL,
	dt_abastecimento date,
    qtd_litros integer,
    quilometragem double,
    PRIMARY KEY (id_caminhao, dt_abastecimento)
);

ALTER TABLE historico_abastecimento
 ADD FOREIGN KEY (id_caminhao) REFERENCES caminhao(id);
    
CREATE TABLE historico_manutencao (
    id_caminhao integer NOT NULL,
    dt_manutencao date,
	tipo VARCHAR(200),
    quilometragem double,
    quilometragem_proxima_troca double,
    dt_proxima_troca date,
    observacao VARCHAR(200)
    PRIMARY KEY (id_caminhao, dt_manutencao)
);

ALTER TABLE historico_manutencao
 ADD FOREIGN KEY (id_caminhao) REFERENCES caminhao(id);

DELIMITER $

CREATE TRIGGER Tgr_Abastecimento_Insert AFTER INSERT
ON historico_abastecimento
FOR EACH ROW
BEGIN
	UPDATE caminhao SET quilometragem =  NEW.quilometragem
WHERE id = NEW.id_caminhao;
END$

/* CREATE TRIGGER Tgr_ItensVenda_Delete AFTER DELETE
ON ItensVenda
FOR EACH ROW
BEGIN
	UPDATE Produtos SET Estoque = Estoque + OLD.Quantidade
WHERE Referencia = OLD.Produto;
END$
*/
DELIMITER ;

INSERT INTO caminhao VALUES (
	'ABC-0001',
    'CAMINHÃO DO IGOR',
    'STRALIS',
    'IVECO',
    6,
    1000,
    STR_TO_DATE('30-09-2023', '%d-%m-%Y'),
    10000
);

INSERT INTO caminhao VALUES (
	'XYZ-0001',
    'CAMINHÃO DO CARLIN',
    'STRALIS',
    'IVECO',
    3,
    4000,
    STR_TO_DATE('29-09-2023', '%d-%m-%Y'),
    14000
);

INSERT INTO historico_abastecimento VALUES (
	1,
    STR_TO_DATE('20-09-2023', '%d-%m-%Y'), 
    500,
    1300
);

INSERT INTO historico_abastecimento VALUES (
	1,
    STR_TO_DATE('24-09-2023', '%d-%m-%Y'), 
    600,
    4100
);

INSERT INTO historico_abastecimento VALUES (
	2,
    STR_TO_DATE('20-09-2023', '%d-%m-%Y'), 
    650,
    4200
);

INSERT INTO historico_abastecimento VALUES (
	2,
    STR_TO_DATE('24-09-2023', '%d-%m-%Y'), 
    700,
    6520
);

select * from historico_abastecimento;
select * from caminhao;