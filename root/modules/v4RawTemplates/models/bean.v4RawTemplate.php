<?php return; ?>

detail
	type: bean
	bean_file: modules/v4RawTemplates/v4RawTemplate.php
	duplicate_merge: false
	table_name: pdf_templates
	primary_key: id
	default_order_by: name
	reportable: false
hooks
	before_save
		--
			class_function: before_save

fields
	app.id
	app.date_entered
	app.date_modified
	app.modified_user
	app.created_by_user
	app.deleted
	name
		vname: LBL_NAME
		type: name
		len: 150
		required: true

	template_module
		vname: LBL_MODULE
		type: varchar
		required: true
    template_type
		vname: LBL_TYPE
		type: varchar
		len: 100
        default: profile
	template
		type: text
    std
		type: bool
		default: 1

