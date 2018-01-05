"""
An example how to generate java code from textX model using jinja2
template engine (http://jinja.pocoo.org/docs/dev/)
"""
import os
from os.path import exists, dirname, join
import jinja2
from entity_test import get_entity_mm


def php_api(this_folder, debug):

    entity_mm = get_entity_mm(debug)

    # Build Person model from person.ent file
    person_model = entity_mm.model_from_file(join(this_folder, 'person.ent'))

    # Create output folder
    srcgen_folder = join(this_folder, 'srcgen/services')
    if not exists(srcgen_folder):
        os.makedirs(srcgen_folder)



    # Initialize template engine.
    jinja_env = jinja2.Environment(
        loader=jinja2.FileSystemLoader(this_folder),
        trim_blocks=True,
        lstrip_blocks=True)

    # Register filter for mapping Entity type names to Java type names.


    # Load Java template
    template = jinja_env.get_template('backend/templates/php_api.template')
    for ent in person_model.classes:
            with open(join(srcgen_folder,
                           "%s.php" % 'api'), 'w') as f:
                f.write(template.render(ent=ent))


if __name__ == "__main__":
    main()
