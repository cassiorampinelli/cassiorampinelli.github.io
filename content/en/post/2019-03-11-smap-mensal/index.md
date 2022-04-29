---
title: "SMAP Mensal no R com o ggplo2 e gráfico animado - Um singelo Exemplo"
author: "Cássio Rampinelli"
date: 2019-03-11T21:13:14-05:00
categories: ["SMAP","Modelo Hidrologico"]
tags: ["SMAP", "modelo hidrologico", "ggplot2","gganimate"]
subtitle: ''
summary: ''
authors: []
lastmod: '2019-03-11T13:14-05:00'
featured: no
image:
  placement: 2
  caption: ''
  focal_point: ''
  preview_only: no
projects: []
---

Os principais objetivos deste post são:

* mostrar passo a passo o código em R do modelo hidrológico SMAP para passos de tempo mensal;
* verificar como converter uma série de dados diários em mensais manipulando datas por meio do pacote "**dplyr**" e "**lubridate**"; 
* verificar como plotar os resultados utilizando o pacote "**ggplot2**" do R; e
* usar o pacote "**gganimate**" para animar nosso gráfico.

Ao Final, além de entender o modelo SMAP para passos de tempo mensal você poderá gerar um gráfico animado como este apresentado acima.

**Click neste Link:** http://rpubs.com/cassiorampinelli/475339 para acessar o Tutorial Completo.
