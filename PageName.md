# Installation instructions #

In short, you have to do the following three steps:

**1. Copy source files**

Source control contains the following files:

**`mail_queue`** - folder where actual mails are queued. This folder contains the file called `dummy` which can be deleted.

**`phpbatchmail.lib.php`** – php source code file where function `batch_mail` is defined. This function takes the same parameters as PHP's function `mail`, and it should be called instead of later one.

**`mail_next.php`** – PHP script that actually sends queued mails. It should be executed by `cron` as often as you like.

**`propeties.ini`** – configuration file necessary for `mail_next.php` script. It defines the maximum number of queued mails that are going to be sent in each script run.

**2. Include `phpbatchmail.lib.php` in your source code and call `batch_mail` instead of `mail`**

**3. Set up `cron` to run `mail_next.php` as frequent as you want**

Instructions for this step are different on each hosting environment. If you don’t know how to set up scheduler to run the script in regular intervals, the best would be to ask your hosting provider for help.


**That should be it!**