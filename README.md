<p align="center">
    <img src="https://github.com/antoniellybergami/Sistema-de-Os/blob/Sistema_Os_Branch_antonielly/public/assets/img/logo-pref.png?raw=true" width="100" alt="Logo">
</p>


# Sobre o TOTEM

## Objetivo
O Totem fornece  acesso a algumas informações referentes às secretarias da prefeitura. Fornecendo acesso ao mapa das salas, geração de senhas para atendimento, informações a alguns órgãos da cidade, entre outros. O objetivo dele é facilitar o acesso a essas informações de forma rápida e eficiente. 


## Tecnologias Utilizadas

- <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="100" align="center" alt="Laravel Logo"> 



## Como Utilizar?
O totem funciona como um grande menu interativo, onde as opções são apresentadas de forma intuitiva. A navegação é feita por meio de seleções numéricas, permitindo que o usuário explore as categorias disponíveis até encontrar a informação desejada.




## Rodando o Sistema
1) Clone o repositório;
2) Atualize as dependências do Composer: `Composer Update`;
3) Gere a chave da aplicação: `php artisan key:generate`;
4) Crie o link para armazenamento: `php artisan storage:link`;
5) Copie o arquivo .env_example para um novo .env: `cp .env_example .env`;
6) Configure no .env os dados referentes ao banco de dados e host;
7) Execute as migrações e popule o banco de dados: `php artisan migrate:fresh --seed`;
8) Compile os assets do front: `npm run build`;
9) Inicie o ambiente de desenvolvimento do frontend: `npm run dev`;
10) Por fim, inicie o serivdor do Laravel: `php artisan serve.`

\
\
\
\
\
\
\
\
\
_Desenvolvido por: [Secretaria de Ciência, Tecnologia, Inovação, Educação Profissional e Trabalho](https://www.saomateus.es.gov.br/secretaria/ciencia-tecnologia-inovacao-educacao-profissional-e-trabalho)._
