# Starlink Data Bundle Request Demo (PHP)

This school-project demo sends the selected data bundle and phone number to Telegram. After that succeeds, it opens an additional-message page; submitting that message sends it as a separate Telegram notification and shows a five-minute on-page countdown. It does not process payments or collect PINs, passwords, or verification codes.

## Configure Telegram
Set environment variables `TELEGRAM_BOT_TOKEN` and `TELEGRAM_CHAT_ID` on your PHP host. For local XAMPP, you can alternatively create `C:/xampp/private/telegram-config.php` outside `htdocs`:

```php
<?php
return ['bot_token' => 'YOUR_BOT_TOKEN', 'chat_id' => 'YOUR_CHAT_ID'];
```

Enable PHP cURL and use HTTPS on hosted deployments. Never commit bot tokens to GitHub.

## Run locally
1. Put this folder in `C:/xampp/htdocs/starlink-school-demo/`.
2. Configure the Telegram credentials above.
3. Start Apache and open `http://localhost/starlink-school-demo/index.php`.
4. Select a plan and submit a phone number. After the first Telegram send succeeds, enter an additional message and submit it.

The countdown keeps the confirmation page visible for five minutes; it does not represent a payment or activation. Vercel's standard runtime does not natively execute PHP.
