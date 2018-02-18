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

## Instruction:
- before you run generator please read word document 'Gen - instruction'

## Instalation & Run:
### Generator:
- open file 'person.ent' in editor (atom, notepad++, brackets..)
- write your example (model)
- from main folder open command window and write commands:
- To check your website example do step 1, to generate example do step 2
 1. textx check entity.tx person.ent
 2. python entity_codegen.py

### Generated-App:
- copy 'srcgen' folder in xampp/htdocs
- rename folder 'srcgen'  to your model name, for example: 'WebApp ThisIsAppAndFolderName', folder name will be 'ThisIsAppAndFolderName'.
- run xampp and press start 'Apache' and 'MySQL'
- type in browser http://localhost/FOLDERNAME/createdatabase.php
- type in browser http://localhost/FOLDERNAME/index.php

