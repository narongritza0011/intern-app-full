UPDATE districts set name_th = replace(name_th, '*', '') , name_en = replace(name_en, '*', '');
UPDATE amphures set name_th = replace(name_th, '*', '') , name_en = replace(name_en, '*', '');

INSERT INTO `amphures` (`id`, `code`, `name_th`, `name_en`, `province_id`, `created_at`, `updated_at`) VALUES (NULL, '9682', 'กัลยาณิวัฒนา', 'Galayani Vadhana', '38', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

alter table `students` add `zip_code` int null after `district_id`;

update students 
LEFT JOIN districts on districts.id = students.district_id
set students.zip_code = districts.zip_code;

DELETE t1 FROM districts t1
INNER JOIN districts t2 
WHERE 
    t1.id > t2.id AND 
    t1.name_th = t2.name_th AND
    t1.amphure_id = t2.amphure_id AND
    t1.zip_code = 0;

DELETE t1 FROM districts t1
INNER JOIN districts t2 
WHERE 
    t1.id < t2.id AND 
    t1.name_th = t2.name_th AND
    t1.amphure_id = t2.amphure_id AND
    t1.zip_code = 0;