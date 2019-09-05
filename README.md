# Test Intelipost - Magento
### Requirements:
* <= Magento 1.9.x 

Instalação:
---
#### Opção 1 (Modman):
* Na raiz do magento utilize o Modman para clonar o projeto:
```
modman clone https://github.com/rafaelneris/intelipost-orders.git
```
Obs: O Symlink deverá estar ativo.

#### Opção 2:
* Baixar o zip do projeto
* Descompactar na raiz do projeto

Obs: Esse método não é uma boa prática do Magento. 

Configuração:
---
Tendo o módulo configurado, o próximo passo é configurar a API KEY da Intelipost para que possa realizar a integração com a API.

1. * No Admin do Magento vá em System -> Configuration
    * No menu ao lado esquerdo (Configuration) vá em **Intelipost - Orders Management->Intelipost Settings**
    * Configure sua API-Key