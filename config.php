Username and password for data base are default

Base have two tables
First table users
	This table store informations for all users, and have next fields:
		user_id - Unique id or User , PRIMARY KEY
		name - User's first name and last name
		username - usernamme for logging on account, same unique for all users
		password - password for logging  on account, user chooses , max length 30 characters
		email - user's email
		phone_number - user's number
Second table phone_numbers
	This table store all user's contacts
		name - Contact's first and last name
		phone_number - Contact's phone number
		user_id - Uses for set owner of contact,  FOREIGN KEY
	