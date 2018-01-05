"""
An example how to generate java code from textX model using jinja2
template engine (http://jinja.pocoo.org/docs/dev/)
"""
import os
from os import mkdir
from os.path import exists, dirname, join
import jinja2
from entity_test import get_entity_mm

from backend.php_class import php_class
from backend.css_style import css_style
from backend.htaccess import htaccess
from backend.xml_config import xml_config
from backend.svg_picture import svg_picture
from backend.php_validatorFormater import php_validatorFormater
from backend.php_validator import php_validator
from backend.php_utility import php_utility
from backend.php_rest import php_rest
from backend.php_sideMenu import php_sideMenu
from backend.php_menu import php_menu
from backend.php_commonDatabaseMethods import php_commonDatabaseMethods
from backend.php_dalRezUpita import php_dalRezUpita
from backend.php_dalDefault import php_dalDefault
from backend.php_dal import php_dal
from backend.php_api import php_api
from backend.html_index import html_index




def main(debug=False):
    this_folder = dirname(__file__)

    css_style(this_folder, debug)
    svg_picture(this_folder, debug)
    htaccess(this_folder, debug)
    xml_config(this_folder, debug)
    php_class(this_folder, debug)
    php_validatorFormater(this_folder, debug)
    php_validator(this_folder, debug)
    php_utility(this_folder, debug)
    php_rest(this_folder, debug)
    php_commonDatabaseMethods(this_folder, debug)
    php_dalRezUpita(this_folder, debug)
    php_dal(this_folder, debug)
    html_index(this_folder, debug)
    php_api(this_folder, debug)
    php_sideMenu(this_folder, debug)
    php_menu(this_folder, debug)
    php_dalDefault(this_folder, debug)


if __name__ == "__main__":
    main()
