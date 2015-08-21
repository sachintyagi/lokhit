UPDATE  `plans_details` SET `duration` =  '180' WHERE  `plans_details`.`id` =13;
INSERT INTO  `plans_details` (
`id` ,
`plan_id` ,
`duration` ,
`duration_type` ,
`installment_type` ,
`interest_rate` ,
`status` ,
`created_at` ,
`created_by` ,
`updated_at` ,
`updated_by` ,
`is_deleted`
)
VALUES (
NULL ,  '3',  '365',  'D',  'Per Day',  '5.5',  '1', '2015-08-18 00:00:00',  '1', 
CURRENT_TIMESTAMP ,  '1',  '0');

UPDATE  `plan_formula_test` SET `deposit_amount` =  '1800',
`maturity_ammount` =  '18450' WHERE `plan_formula_test`.`id` =121;

UPDATE  `plan_formula_test` SET `deposit_amount` =  '36000',
`maturity_ammount` =  '36900' WHERE `plan_formula_test`.`id` =122;



UPDATE  `plan_formula_test` SET `deposit_amount` =  '54000',
`maturity_ammount` =  '55350' WHERE `plan_formula_test`.`id` =123
;

UPDATE  `plan_formula_test` SET `deposit_amount` =  '72000',
`maturity_ammount` =  '73800' WHERE `plan_formula_test`.`id` =124
;

UPDATE  `plan_formula_test` SET `deposit_amount` =  '90000',
`maturity_ammount` =  '92250' WHERE `plan_formula_test`.`id` =125
;

UPDATE  `plan_formula_test` SET `deposit_amount` =  '108000',
`maturity_ammount` =  '110700' WHERE `plan_formula_test`.`id` =126
;
UPDATE  `plan_formula_test` SET `deposit_amount` =  '126000',
`maturity_ammount` =  '129150' WHERE `plan_formula_test`.`id` =127
;
UPDATE  `plan_formula_test` SET `deposit_amount` =  '144000',
`maturity_ammount` =  '147600' WHERE `plan_formula_test`.`id` =128
;
UPDATE  `plan_formula_test` SET `deposit_amount` =  '162000',
`maturity_ammount` =  '166050' WHERE `plan_formula_test`.`id` =129;
;

INSERT INTO  `plan_formula_test` (
`id` ,
`plan_id` ,
`plan_details_id` ,
`amount` ,
`deposit_amount` ,
`maturity_ammount`
)
VALUES (
	NULL ,  '3',  '13',  '1000',  '180000',  '184500'
);

INSERT INTO  `plan_formula_test` (
`id` ,
`plan_id` ,
`plan_details_id` ,
`amount` ,
`deposit_amount` ,
`maturity_ammount`
)
VALUES 
(NULL ,  '3',  '14',  '100',  '36500',  '38507'),
(NULL ,  '3',  '14',  '200',  '73000',  '77015'),
(NULL ,  '3',  '14',  '300',  '109500',  '115522'),
(NULL ,  '3',  '14',  '400',  '146000',  '154030'),
(NULL ,  '3',  '14',  '500',  '182500',  '192537'),
(NULL ,  '3',  '14',  '600',  '219000',  '231045'),
(NULL ,  '3',  '14',  '700',  '255000',  '265992'),
(NULL ,  '3',  '14',  '800',  '292000',  '308060'),
(NULL ,  '3',  '14',  '900',  '325500',  '343402'),
(NULL ,  '3',  '14',  '1000',  '365000',  '385075')
;
