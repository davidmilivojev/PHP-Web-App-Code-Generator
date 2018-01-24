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
from backend.php_createdb import php_createdb
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
from backend.php_user import php_user
from backend.php_login import php_login
from backend.php_logout import php_logout
from backend.php_userclass import php_userclass
from backend.php_userdal import php_userdal
from backend.php_createuser import php_createuser
from backend.php_partHide import php_partHide
from backend.php_actions import php_actions
from backend.php_actionViews import php_actionViews
from backend.php_actionView import php_actionView
from backend.php_actionEdit import php_actionEdit
from backend.php_actionCreate import php_actionCreate
from backend.html_index import html_index
from backend.html_delete import html_delete
from backend.html_controlpanel import html_controlpanel
from backend.html_create import html_create
from backend.html_edit import html_edit

def main(debug=False):
    this_folder = dirname(__file__)

    css_style(this_folder, debug)
    svg_picture(this_folder, debug)
    htaccess(this_folder, debug)
    xml_config(this_folder, debug)
    php_class(this_folder, debug)
    php_createdb(this_folder, debug)
    php_validatorFormater(this_folder, debug)
    php_validator(this_folder, debug)
    php_utility(this_folder, debug)
    php_rest(this_folder, debug)
    php_commonDatabaseMethods(this_folder, debug)
    php_dalRezUpita(this_folder, debug)
    php_dal(this_folder, debug)
    php_api(this_folder, debug)
    php_sideMenu(this_folder, debug)
    php_menu(this_folder, debug)
    php_dalDefault(this_folder, debug)
    php_user(this_folder, debug)
    php_login(this_folder, debug)
    php_logout(this_folder, debug)
    php_userclass(this_folder, debug)
    php_userdal(this_folder, debug)
    php_createuser(this_folder, debug)
    html_index(this_folder, debug)
    html_delete(this_folder, debug)
    html_controlpanel(this_folder, debug)
    html_create(this_folder, debug)
    html_edit(this_folder, debug)
    php_partHide(this_folder, debug)
    php_actions(this_folder, debug)
    php_actionViews(this_folder, debug)
    php_actionView(this_folder, debug)
    php_actionEdit(this_folder, debug)
    php_actionCreate(this_folder, debug)


if __name__ == "__main__":
    main()
