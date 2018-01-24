# PHP-Web-App-Code-Generator
simple example of web app php code generator

## Requirements:
### Generator:
- python 3  (download from https://www.python.org/)
- arpeggio  (pip install arpeggio)
- textx  (pip install textx)
- jinja2  (pip install jinja2)

### Generated-App:
- php 5
- xampp
- mysql

## Instalation:
### Generator:
- open file 'person.ent' in editor (atom, notepad++, brackets..)
- write your example
- from main folder open command window and write commands:
- To check your website example 1, to generate example 2
 1. textx check entity.tx person.ent
 2. python entity_codegen.py
- last step is to folder 'srcgen' rename to 'david' and do next 'Generated-App' steps.
### Generated-App:
- copy 'david' folder in xampp/htdocs
- run xampp and press start 'Apache' and 'MySQL'
- type in browser http://localhost/david/createdatabase.php
- type in browser http://localhost/david/index.php
