ALTER TABLE `member_investments` ADD UNIQUE(`cf_number`);

ALTER TABLE `members` ADD UNIQUE( `member_id`);

UPDATE `plan_formula_test` SET `plan_details_id` = '3' WHERE `plan_formula_test`.`id` = 30;

UPDATE `plan_formula_test` SET `maturity_ammount` = '16423' WHERE `plan_formula_test`.`id` = 82;
UPDATE `plan_formula_test` SET `maturity_ammount` = '41057' WHERE `plan_formula_test`.`id` = 85;

UPDATE `plan_formula_test` SET `maturity_ammount` = '16423' WHERE `plan_formula_test`.`id` = 92;
UPDATE `plan_formula_test` SET `maturity_ammount` = '41057' WHERE `plan_formula_test`.`id` = 95;

UPDATE `plan_formula_test` SET `maturity_ammount` = '16423' WHERE `plan_formula_test`.`id` = 102;
UPDATE `plan_formula_test` SET `maturity_ammount` = '41057' WHERE `plan_formula_test`.`id` = 105;

UPDATE `plan_formula_test` SET `maturity_ammount` = '16423' WHERE `plan_formula_test`.`id` = 112;
UPDATE `plan_formula_test` SET `maturity_ammount` = '41057' WHERE `plan_formula_test`.`id` = 115;
