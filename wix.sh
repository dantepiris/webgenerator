aux1=$1


mkdir $aux1
echo $aux1 | cat > $aux1/index.php
mkdir $aux1/css
mkdir $aux1/css/user
echo | cat > $aux1/css/user/estilo.css
mkdir $aux1/css/admin
echo | cat > $aux1/css/admin/estilo.cs
mkdir $aux1/img

mkdir $aux1/img/avatars
mkdir $aux1/img/buttons
mkdir $aux1/img/products
mkdir $aux1/img/pets
mkdir $aux1/js
mkdir $aux1/js/validations
echo | cat > $aux1/js/validations/login.js
echo | cat > $aux1/js/validations/register.js
mkdir $aux1/js/effects
echo | cat > $aux1/js/effects/panel.js
mkdir $aux1/tpl
echo | cat > $aux1/tpl/main.tpl
echo | cat > $aux1/tpl/login.tpl
echo | cat > $aux1/tpl/register.tpl
echo | cat > $aux1/tpl/panel.tpl
echo | cat > $aux1/tpl/profile.tpl
echo | cat > $aux1/tpl/crud.tpl
mkdir $aux1/php
echo | cat > $aux1/php/create.php
echo | cat > $aux1/php/read.php
echo | cat > $aux1/php/update.php
echo | cat > $aux1/php/delete.php
echo | cat > $aux1/php/dbconect.php







