ALTER TABLE `member_investments` CHANGE `installment_type_id` `installment_type` VARCHAR(255) NOT NULL;

ALTER TABLE `member_investments` CHANGE `installment_date` `installment_date` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;

ALTER TABLE `member_investments` ADD `last_installment_date` DATE NULL DEFAULT NULL AFTER `total_installment`;

ALTER TABLE `member_investments` ADD `created_by` INT(11) NOT NULL AFTER `end_date`, ADD `created_at` DATETIME NULL DEFAULT NULL AFTER `created_by`, ADD `updated_by` INT(11) NOT NULL AFTER `created_at`, ADD `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `updated_by`;

UPDATE `users` SET `name`='Sachin Tyagi' WHERE `id`='1';
UPDATE `users` SET `name`='Hardeep Sharma' WHERE `id`='2';
