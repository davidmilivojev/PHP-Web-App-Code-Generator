"""
An example how to generate java code from textX model using jinja2
template engine (http://jinja.pocoo.org/docs/dev/)
"""
import os
from os.path import exists, dirname, join
import jinja2
from entity_test import get_entity_mm


def php_partHide(this_folder, debug):

    entity_mm = get_entity_mm(debug)

    # Build Person model from person.ent file
    person_model = entity_mm.model_from_file(join(this_folder, 'person.ent'))

    def phptype(s):
        """
        Maps type names from PrimitiveType to PHP.
        """
        return {
                'anytype':'anytype',
        }.get(s.name, s.name)

    # Create output folder
    srcgen_folder = join(this_folder, 'srcgen/parts')
    if not exists(srcgen_folder):
        os.makedirs(srcgen_folder)



    # Initialize template engine.
    jinja_env = jinja2.Environment(
        loader=jinja2.FileSystemLoader(this_folder),
        trim_blocks=True,
        lstrip_blocks=True)

    # Register filter for mapping Entity type names to Java type names.
    jinja_env.filters['phptype'] = phptype

    # Load Java template
    template = jinja_env.get_template('backend/templates/php_partHide.template')

    for ent in person_model.classes:
        for entity in ent.entities:
            if not entity.detail:
            # For each entity generate java file
                with open(join(srcgen_folder,
                               "part%s.php" % entity.name.capitalize()), 'w') as f:
                    f.write(template.render(entity=entity))


if __name__ == "__main__":
    main()
