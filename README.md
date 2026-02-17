# Sobre
Tema de WordPress com foco em simplicidade e legibilidade, com o mínimo de intermediários.
- CSS moderno sem sass e sem pré-processadores
- Javascript vanilla (sem Jquery)
- Sem task runners (Grunt, Gulp, Webpack, etc.)

# Comandos úteis localhost
- Permissão geral de escrita local
```sudo chmod -R 777 /Users/rafaelortman/Sites```
- Permissão de esrita no wp-config local
```define( 'FS_METHOD', 'direct' );```
- Live reload do tema
```npx browser-sync start --proxy "localhost/sites/wordpress" --files "**/*.php, **/*.css, **/*.js"```

# Plugins
- Carbon fields (dependência)
- Editor Clássico (recomendação)
- SVG Support
- Better Search Replace
- CPT UI
- GTranslate