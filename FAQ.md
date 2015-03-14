# Frequently asked questions #

**1. It is written on your website that script doesn't use any database for scheduling mails. Then how is it doing that?**

We wanted to avoid any extra system requirements so it was simpler to use file system instead. Each mail is encoded in JSON (that's where PHP 5.2.0 or greater requirement comes from) and saved as a separate file.

**2. Is there a facility in your script which allows admin/script installer to set/limit number of mails to be sent in 1 hour? After that script will queue rest of the mails and send it when limit gets reset.**

There is a somewhat similar facility. You can define how many mails you want to be sent in each cron run. For example, you can set your cron to run every 10 minutes and each time send at most 20 mails. You can limit the number of mails sent in one hour only if cron runs once an hour. You set the number of mails sent in properties file, and you set up cron using whatever is provided on your hosting system.