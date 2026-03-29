<?php
// Brevo (Sendinblue) Configuration
// IMPORTANT: This file contains sensitive API credentials. Do NOT commit this file to version control.
// Get these from your Brevo dashboard: https://app.brevo.com/ 

// Choose method: 'api' for Mailin API or 'smtp' for SMTP
define('BREVO_METHOD', 'smtp'); // Options: 'api' or 'smtp' - Using SMTP for reliability

// Mailin API Configuration (used when BREVO_METHOD = 'api')
define('BREVO_API_EMAIL', '9f1978001@smtp-brevo.com'); // Your Brevo API email/login
define('BREVO_API_KEY', 'fkBGWrZaAMYjPzgv'); // Your Brevo API key

// SMTP Configuration (used when BREVO_METHOD = 'smtp')
// If you want to use SMTP instead, change BREVO_METHOD to 'smtp' above
define('BREVO_SMTP_HOST', 'smtp-relay.brevo.com'); // SMTP server
define('BREVO_SMTP_PORT', 587); // SMTP port (587 for TLS, 465 for SSL)
define('BREVO_SMTP_USERNAME', '9f1978001@smtp-brevo.com'); // SMTP username
define('BREVO_SMTP_PASSWORD', 'fkBGWrZaAMYjPzgv'); // SMTP password

// Email addresses 
define('BREVO_FROM_EMAIL', 'info@ymsuccess.com'); // FROM: Brevo verified email (must be verified in Brevo)
define('BREVO_FROM_NAME', 'Ym Success Contact Form'); // FROM: Sender name
define('BREVO_TO_EMAIL', 'info@ymsuccess.com'); // TO: Your email to receive contact form messages
define('BREVO_TO_NAME', 'Info Ym Success'); // TO: Recipient name
 