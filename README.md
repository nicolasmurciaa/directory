# Dynamic PhoneDirectory for Asterisk and Yealink

Created by https://github.com/hbonath/yealinkxml

updated by me.

How to setup

1. Go to mysql and use a asterisk database:
   ![image](https://user-images.githubusercontent.com/47614279/209568681-ccd3cc63-8cb9-48d9-a847-7678630a165b.png)
2. Run a sentence "SELECT name,extension FROM users ORDER BY extension;" , At the end, you'll see the number of extension that you have, for this cas 98.
  ![image](https://user-images.githubusercontent.com/47614279/209568719-3994386d-6484-40d2-afda-fbd292712818.png)
3. Go to phonebook.php, and edit:
    $usuarios = 98; // Cantidad extensiones encontradas por variable $sql
4. the you can go to the web and found the directory updated.
    http://yourserver/directory/phoonebook.php

  

  
