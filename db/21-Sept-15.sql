ALTER TABLE `member_investments` ADD `is_deleted` TINYINT(1) NOT NULL DEFAULT '0' AFTER `updated_at`;

ALTER TABLE `member_installments` ADD `receipt_number` VARCHAR(200) NOT NULL AFTER `ammount`, ADD `installment_number` INT(4) NULL DEFAULT '1' AFTER `receipt_number`;

UPDATE `plans_details` SET `installment_type` = 'Per Day (180)' WHERE `plans_details`.`id` = 13;