# Studio Belle - Sistema Corporativo de Gestão de Agendamentos

O **Studio Belle** é uma solução corporativa de alto desempenho para a gestão de agendamentos e fluxo operacional de centros de estética. Projetado sob os princípios de modularidade e segurança, o sistema oferece uma experiência robusta para a administração de recursos, controle de disponibilidade de profissionais e análise de métricas de negócio em tempo real.

---

## Stack Tecnológica

### Core Infrastructure

<p align="left"> 
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP" /> 
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL" /> 
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript" /> 
  <img src="https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap" /> 
  <img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="HTML5" /> 
  <img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3" /> 
</p>

### Bibliotecas e Componentes

* **FullCalendar Engine:** Gerenciamento complexo de estados de calendário e eventos assíncronos.
* **Chart.js:** Engine para renderização de gráficos estatísticos e dashboards analíticos.
* **Bootstrap Icons:** Biblioteca de ícones vetoriais nativa.
* **PDO (PHP Data Objects):** Interface de abstração de dados com suporte a Prepared Statements para mitigação de SQL Injection.
* **PHP Sessions:** Gestão de estado e controle de acesso persistente.

---

## Arquitetura do Sistema

### 1. Hierarquia de Usuários

O sistema possui níveis de acesso distintos, garantindo que cada tipo de usuário visualize apenas as funcionalidades pertinentes:

* **Administrador (Admin):**

  * Tela de gerenciamento completo do Studio Belle.
  * Cadastra e gerencia **profissionais**, **serviços**, **agendamentos** e **dashboards de métricas**.
  * Controle de status operacional dos profissionais (Ativo/Inativo).
  * Gestão de usuários e permissões.

* **Usuário Comum:**

  * Landing page para conhecer o Studio Belle e visualizar serviços.
  * Pode realizar agendamentos e consultar seus próprios compromissos.
  * Sem acesso à gestão de profissionais, serviços ou dashboards de métricas.

### 2. Dashboard de Business Intelligence (BI)

Interface focada em tomada de decisão, convertendo agendamentos em dados estratégicos:

* **Métricas de Performance:** Contagem dinâmica de clientes ativos e taxa de ocupação dos profissionais.
* **Análise de Tendências:** Gráfico de linhas para volume de agendamentos (últimos 7 dias) e gráfico de barras para serviços líderes.
* **Monitoramento de Status:** Visualização do funil de conversão (Marcado vs. Concluído vs. Cancelado).

### 3. Engine de Agendamento

* **Sincronização Bidirecional:** Consumo de API interna (`calendario.php`) para atualização de eventos via JSON.
* **Lógica de Colisão:** Backend validando a disponibilidade de horários, impedindo conflitos de agenda por profissional.
* **Localização:** Interface totalmente adaptada para o padrão PT-BR (meses, dias da semana e horários).

### 4. Gestão de Entidades (CRUD)

* **Recursos Humanos:** Gerenciamento de profissionais com controle de status operacional (Ativo/Inativo).
* **CRM Simplificado:** Base de dados de clientes com histórico de interações.
* **Service Catalog:** Gestão de serviços com suporte a descrições técnicas e ativos de imagem.
