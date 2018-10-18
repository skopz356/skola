#awk '{gsub(/"skoladatabase"/,"root")}' test/conn.php
ex -sc '%s/skoladatabase/root/g|x' test/conn.php
ex -sc '%s/skolada//g|x' test/conn.php
ex -sc '%s/skoladatabase/projekt/g|x' test/conn.php
