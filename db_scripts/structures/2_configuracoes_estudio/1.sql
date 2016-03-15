ALTER TABLE `estudio`
ADD COLUMN `valor_padrao_aula`  int(10) UNSIGNED NULL DEFAULT 0 AFTER `foto`,
ADD COLUMN `valor_padrao_aula_dupla`  int(10) UNSIGNED NULL DEFAULT 0 AFTER `valor_padrao_aula`;