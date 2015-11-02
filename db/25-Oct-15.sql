ALTER TABLE `member_installments` ADD `late_fee` FLOAT(10,2) NULL AFTER `receipt_number`;

ALTER TABLE `member_installments` ADD `due_date` DATETIME NULL DEFAULT NULL AFTER `late_fee`;

ALTER TABLE `member_investments` ADD `next_due_date` DATETIME NULL DEFAULT NULL AFTER `deposit_amount`;

