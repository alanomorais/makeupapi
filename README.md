
# Projeto MakeupApi

Realizar consulta em uma api, recebendo produtos e grava no banco de dados.

git clone https://github.com/alanomorais/makeupapi.git

Criando estrutura do banco: php artisan migrate
Serão criadas as tabelas products e product_colors

Para consumir a api, execute o comando na raiz do projeto: php artisan get:api

Será consumida a API e os produtos serão inseridos na base de dados.

Também poderá ser acesso via API através dos endpoints 

 /api/v1/products
 
 /api/v1/product/{code}


