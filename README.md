# Email Validation and Sending Example

This program validates an email address using the https://emailvalidation.io API and sends an email using the SendGrid API.
Setup

Requirements

- PHP 7.4 or later
- Composer

Installation

1. Clone the repository:

   git clone https://github.com/Ivarock/email-validation.git
   cd your-repository-name

2. Install dependencies

   composer install

3. Create a .env file and fill in environment variables with your credentials

   EMAIL_VALIDATION_API_KEY=your_email_validation_api_key
   SENDGRID_API_KEY=your_sendgrid_api_key
   VERIFIED_SENDER=your_verified_sender_email@example.com

4. Run the script

   php your_script_name.php
