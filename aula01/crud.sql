use db_escola;
 INSERT INTO tb_professor ( nome, email, cpf) VALUES ('chiquim das tapiocas','chiquim@email.com','3233123312322');

  INSERT INTO tb_professor ( nome, email, cpf) 
  VALUES ('chiquim das tapiocas','chiquim@email.com','3233123312322'),
  ('zesim das tapiocas','zesim@email.com','32345663312322'),
  ('maria das tapiocas','maria@email.com','32331777712322'),
  ('luiza das tapiocas','luiza@email.com','323312356562322');

DELETE FROM tb_professor WHERE id = 1;
UPDATE tb_professor SET nome='liza da caucaia' WHERE cpf = '323312356562322';
SELECT * FROM tb_professor;
SELECT nome, cpf FROM tb_professor;