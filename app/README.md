# Repositório de estudo
***
Estou realizando alguns testes no servidor web Caddy como um proxy reverso para o PHP-FPM. <br>
No primeiro momento estou apenas realizando um teste com acesso simples em um script PHP. Estou adicionando o arquivo de
configuração do PHP-FPM para emular problemas de picos de acessos e como posso lidar com esses problemas.

Um resumo sobre as configs do php-fpm que testei:

```
- pm = dynamic
  - Esta é a forma com que o processo master, ou seja, o processo que gerencia e controla a distribuição das tarefas para os workers disponíveis (children).
  - Ele pode ser configurado para:
    - static
      - Cria uma quantidade fixa de workers, que irão processar os scripts 
    - dynamic
      - Trabalha com um pouco mais de flexibilidade, podendo aumentar ou diminuir a quantidade de workers dinamicamente, dependendo do número de requisições que chegam ao servidor.
    - ondemand
      - Cria workes apenas quando há requisições para processar. E mata após o período de idle definido. 
- pm.max_children = 5
  - Máximo de workers que podem ser criados.
- pm.start_servers = 2
  - Número de workers que sempre iniciam ao iniciar o servidor.
- pm.process_idle_timeout = 10s
  - Tempo de inatividade do processo antes de ser morto.
- pm.min_spare_servers = 1
  - Número mínimo de workers ociosos que devem estar prontos para receber processos
- pm.max_spare_servers = 3
  - Número máximo de workers ociosos que devem estar prontos para receber processos
```

Outro ponto que observei sobre o assunto foi o cáuculo que pode ser feito para definir o pm.max_children: <br>
Basicamente temos que dividir o valor de memória que cada processo consome, pela quantidade de memória máxima que o 
servidor  disponibiliza. <br>
e.g: script usa 60MBs por processo e nosso servidor possui 1GB de RAM:
<br> ```1024mb / 60mb = ~17``` <br>
Então podemos definir o valor de pm.max_children como 16 para termos uma margem segura.
